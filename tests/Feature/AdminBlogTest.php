<?php

namespace Tests\Feature;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminBlogTest extends TestCase
{
    protected User $adminUser;

    protected function setUp(): void
    {
        parent::setUp();

        $this->adminUser = User::firstOrCreate(
            ['email' => 'admin@raghuvir.com'],
            [
                'name' => 'Raghuvir Administrator',
                'password' => bcrypt('Admin@12345'),
                'role' => 'admin',
            ]
        );
    }

    public function test_guest_cannot_access_admin_blogs()
    {
        $response = $this->get('/admin/blogs');
        $response->assertRedirect('/admin/login');
    }

    public function test_admin_can_view_blogs_index()
    {
        $response = $this->actingAs($this->adminUser)->get('/admin/blogs');
        $response->assertStatus(200);
        $response->assertSee('Blog Articles');
    }

    public function test_admin_can_create_blog_article()
    {
        Storage::fake('public');

        $image = UploadedFile::fake()->image('test-article.jpg', 800, 600);

        $response = $this->actingAs($this->adminUser)->post('/admin/blogs', [
            'title' => 'Test Article on Wheat Quality',
            'excerpt' => 'A brief test excerpt about wheat testing.',
            'content' => '<p>Comprehensive testing of moisture and protein content in wheat.</p>',
            'category' => 'Quality & Standards',
            'tags' => 'Testing, Wheat, Lab',
            'author_name' => 'Lab Lead',
            'is_published' => '1',
            'image' => $image,
        ]);

        $response->assertRedirect('/admin/blogs');
        $this->assertDatabaseHas('blogs', [
            'title' => 'Test Article on Wheat Quality',
            'slug' => 'test-article-on-wheat-quality',
            'category' => 'Quality & Standards',
            'is_published' => true,
        ]);
    }

    public function test_admin_can_toggle_blog_status()
    {
        $blog = Blog::firstOrCreate(
            ['slug' => 'toggle-test-article'],
            [
                'title' => 'Toggle Test Article',
                'content' => '<p>Content for toggle test.</p>',
                'category' => 'Health & Nutrition',
                'is_published' => true,
            ]
        );

        $this->assertTrue($blog->is_published);

        $response = $this->actingAs($this->adminUser)
            ->post("/admin/blogs/{$blog->id}/toggle-status");

        $response->assertStatus(302);
        $blog->refresh();
        $this->assertFalse($blog->is_published);
    }

    public function test_public_blog_listing_loads_successfully()
    {
        $response = $this->get('/blog');
        $response->assertStatus(200);
        $response->assertSee('Our Blog & Stories');
    }

    public function test_public_blog_single_loads_and_increments_views()
    {
        $blog = Blog::where('is_published', true)->first();
        $this->assertNotNull($blog);

        $initialViews = $blog->views_count;

        $response = $this->get("/blog/{$blog->slug}");
        $response->assertStatus(200);
        $response->assertSee($blog->title);

        $blog->refresh();
        $this->assertEquals($initialViews + 1, $blog->views_count);
    }

    public function test_public_home_page_displays_latest_blogs()
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('Latest Blogs');
    }
}
