<?php

namespace Tests\Feature;

use App\Models\PageBanner;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminPageBannerTest extends TestCase
{
    /**
     * Test guest is redirected to login.
     */
    public function test_guest_cannot_access_page_banners(): void
    {
        $response = $this->get(route('admin.banners.index'));
        $response->assertRedirect(route('admin.login'));
    }

    /**
     * Test admin can view banners index with specs.
     */
    public function test_admin_can_view_page_banners_index(): void
    {
        $admin = User::first() ?? User::factory()->create(['role' => 'admin', 'is_admin' => true]);

        $response = $this->actingAs($admin)->get(route('admin.banners.index'));

        $response->assertStatus(200);
        $response->assertSee('Page Breadcrumb &amp; Hero Banners', false);
        $response->assertSee('1920 × 500 px');
        $response->assertSee('About Us');
        $response->assertSee('Our Products');
        $response->assertSee('Contact Us');
    }

    /**
     * Test admin can quick upload a custom banner image.
     */
    public function test_admin_can_upload_custom_banner_image(): void
    {
        Storage::fake('public');

        $admin = User::first() ?? User::factory()->create(['role' => 'admin', 'is_admin' => true]);
        $banner = PageBanner::where('page_key', 'about')->firstOrFail();

        $file = UploadedFile::fake()->image('about_custom_hero.webp', 1920, 500);

        $response = $this->actingAs($admin)->post(route('admin.banners.quick-upload'), [
            'banner_id' => $banner->id,
            'banner_image' => $file,
        ]);

        $response->assertRedirect(route('admin.banners.index'));
        $response->assertSessionHas('success');

        $banner->refresh();
        $this->assertNotNull($banner->banner_image);
        Storage::disk('public')->assertExists($banner->banner_image);

        // Verify PageBanner::getImage('about') points to the new uploaded image
        $this->assertStringContainsString('storage/' . $banner->banner_image, PageBanner::getImage('about'));
    }

    /**
     * Test admin can reset custom banner to default.
     */
    public function test_admin_can_reset_banner_to_default(): void
    {
        Storage::fake('public');

        $admin = User::first() ?? User::factory()->create(['role' => 'admin', 'is_admin' => true]);
        $banner = PageBanner::where('page_key', 'about')->firstOrFail();

        // Put dummy image
        $file = UploadedFile::fake()->image('about.jpg');
        $path = $file->store('banners', 'public');
        $banner->banner_image = $path;
        $banner->save();

        $response = $this->actingAs($admin)->post(route('admin.banners.reset', $banner));

        $response->assertRedirect(route('admin.banners.index'));
        $response->assertSessionHas('success');

        $banner->refresh();
        $this->assertNull($banner->banner_image);
        Storage::disk('public')->assertMissing($path);

        // Should return default image
        $this->assertEquals(asset(PageBanner::DEFAULT_IMAGE), PageBanner::getImage('about'));
    }

    /**
     * Test frontend page displays the banner image in HTML.
     */
    public function test_frontend_about_page_renders_with_banner(): void
    {
        $response = $this->get(route('about'));
        $response->assertStatus(200);
        $response->assertSee('page-header bg-section dark-section parallaxie', false);
        $response->assertSee('data-image="', false);
    }
}
