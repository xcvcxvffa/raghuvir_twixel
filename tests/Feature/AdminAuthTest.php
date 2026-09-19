<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AdminAuthTest extends TestCase
{
    public function test_guest_is_redirected_to_admin_login_when_accessing_dashboard(): void
    {
        $response = $this->get('/admin/dashboard');

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.login'));
    }

    public function test_admin_login_page_renders_successfully(): void
    {
        $response = $this->get('/admin/login');

        $response->assertStatus(200);
        $response->assertSee('Raghuvir Admin');
        $response->assertSee('admin@raghuvir.com');
    }

    public function test_admin_can_login_with_correct_credentials(): void
    {
        $response = $this->post('/admin/login', [
            'email' => 'admin@raghuvir.com',
            'password' => 'Admin@12345',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.dashboard'));
        $this->assertAuthenticated();
    }

    public function test_admin_cannot_login_with_invalid_password(): void
    {
        $response = $this->post('/admin/login', [
            'email' => 'admin@raghuvir.com',
            'password' => 'WrongPassword123',
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_authenticated_admin_can_view_dashboard(): void
    {
        $admin = User::where('email', 'admin@raghuvir.com')->first();

        $response = $this->actingAs($admin)->get('/admin/dashboard');

        $response->assertStatus(200);
        $response->assertSee('Executive Dashboard');
        $response->assertSee('raghuvir_admin');
    }

    public function test_admin_can_logout_successfully(): void
    {
        $admin = User::where('email', 'admin@raghuvir.com')->first();

        $response = $this->actingAs($admin)->post('/admin/logout');

        $response->assertStatus(302);
        $response->assertRedirect(route('admin.login'));
        $this->assertGuest();
    }
}
