<?php

namespace Tests\Feature;

use App\Models\PageSeo;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class PageSeoTest extends TestCase
{
    /**
     * Test guest cannot access admin SEO management.
     */
    public function test_guest_cannot_access_page_seo(): void
    {
        $response = $this->get(route('admin.seo.index'));
        $response->assertRedirect(route('admin.login'));
    }

    /**
     * Test admin can view page SEO index.
     */
    public function test_admin_can_view_page_seo_index(): void
    {
        $admin = User::first() ?? User::factory()->create(['role' => 'admin', 'is_admin' => true]);

        $response = $this->actingAs($admin)->get(route('admin.seo.index'));

        $response->assertStatus(200);
        $response->assertSee('Page SEO &amp; Meta Tags Management', false);
        $response->assertSee('Average SEO Health Score');
        $response->assertSee('Google Search Indexing');
        $response->assertSee('Home Page');
        $response->assertSee('About Us');
        $response->assertSee('Our Products');
    }

    /**
     * Test admin can view edit form for a page SEO record.
     */
    public function test_admin_can_view_seo_edit_form(): void
    {
        $admin = User::first() ?? User::factory()->create(['role' => 'admin', 'is_admin' => true]);
        $seo = PageSeo::where('page_key', 'about')->firstOrFail();

        $response = $this->actingAs($admin)->get(route('admin.seo.edit', $seo->id));

        $response->assertStatus(200);
        $response->assertSee('SEO Settings');
        $response->assertSee('Google Search Snippet');
        $response->assertSee('Social Media Open Graph &amp; Twitter Cards', false);
        $response->assertSee('Structured Data &amp; JSON-LD Schema', false);
    }

    /**
     * Test admin can update SEO metadata.
     */
    public function test_admin_can_update_seo_metadata(): void
    {
        $admin = User::first() ?? User::factory()->create(['role' => 'admin', 'is_admin' => true]);
        $seo = PageSeo::where('page_key', 'about')->firstOrFail();

        $response = $this->actingAs($admin)->post(route('admin.seo.update', $seo->id), [
            'meta_title'       => 'Updated Pure Atta About Us Title | Raghuvir',
            'meta_description' => 'Updated meta description with high quality nutritional facts and grain heritage details.',
            'meta_keywords'    => 'updated, chakki, flour, raghuvir',
            'robots'           => 'index, follow',
            'schema_type'      => 'AboutPage',
        ]);

        $response->assertRedirect(route('admin.seo.index'));
        $response->assertSessionHas('success');

        $seo->refresh();
        $this->assertEquals('Updated Pure Atta About Us Title | Raghuvir', $seo->meta_title);
        $this->assertEquals('Updated meta description with high quality nutritional facts and grain heritage details.', $seo->meta_description);
    }

    /**
     * Test public pages dynamically render injected SEO tags.
     */
    public function test_public_pages_render_dynamic_seo_tags(): void
    {
        $homeSeo = PageSeo::where('page_key', 'home')->first();
        $this->assertNotNull($homeSeo);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('<meta property="og:type" content="website">', false);
        $response->assertSee('<meta name="robots" content="' . $homeSeo->robots . '">', false);
        $response->assertSee('application/ld+json', false);
    }
}
