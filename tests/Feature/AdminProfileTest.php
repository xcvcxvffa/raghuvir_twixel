<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminProfileTest extends TestCase
{
    public function test_guest_cannot_access_profile_settings(): void
    {
        $response = $this->get('/admin/profile');
        $response->assertStatus(302);
        $response->assertRedirect(route('admin.login'));
    }

    public function test_authenticated_admin_can_view_profile_settings(): void
    {
        $admin = User::where('email', 'admin@raghuvir.com')->first();

        $response = $this->actingAs($admin)->get('/admin/profile');

        $response->assertStatus(200);
        $response->assertSee('Account & Profile Settings');
        $response->assertSee('Personal Information');
        $response->assertSee('Security & Password');
    }

    public function test_admin_can_update_personal_information(): void
    {
        $admin = User::where('email', 'admin@raghuvir.com')->first();

        $response = $this->actingAs($admin)->put('/admin/profile', [
            'name' => 'Raghuvir Master Admin',
            'email' => 'admin@raghuvir.com',
            'phone' => '+91 97254 27727',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('success');

        $admin->refresh();
        $this->assertEquals('Raghuvir Master Admin', $admin->name);
        $this->assertEquals('+91 97254 27727', $admin->phone);
    }

    public function test_admin_can_update_password_with_correct_current_password(): void
    {
        $admin = User::where('email', 'admin@raghuvir.com')->first();

        $response = $this->actingAs($admin)->put('/admin/profile/password', [
            'current_password' => 'Admin@12345',
            'password' => 'NewSecret@987',
            'password_confirmation' => 'NewSecret@987',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('success');

        $admin->refresh();
        $this->assertTrue(Hash::check('NewSecret@987', $admin->password));

        // Restore original password
        $admin->password = Hash::make('Admin@12345');
        $admin->save();
    }

    public function test_admin_cannot_update_password_with_incorrect_current_password(): void
    {
        $admin = User::where('email', 'admin@raghuvir.com')->first();

        $response = $this->actingAs($admin)->put('/admin/profile/password', [
            'current_password' => 'WrongCurrentPassword',
            'password' => 'NewSecret@987',
            'password_confirmation' => 'NewSecret@987',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('current_password');
    }

    public function test_admin_can_upload_and_remove_avatar(): void
    {
        Storage::fake('public');
        $admin = User::where('email', 'admin@raghuvir.com')->first();

        $file = UploadedFile::fake()->image('my-avatar.png', 200, 200);

        $response = $this->actingAs($admin)->post('/admin/profile/avatar', [
            'avatar' => $file,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHas('success');

        $admin->refresh();
        $this->assertNotNull($admin->avatar);
        Storage::disk('public')->assertExists($admin->avatar);

        // Test delete avatar
        $deleteResponse = $this->actingAs($admin)->delete('/admin/profile/avatar');
        $deleteResponse->assertStatus(302);

        $admin->refresh();
        $this->assertNull($admin->avatar);
    }
}
