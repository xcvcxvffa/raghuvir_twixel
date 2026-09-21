<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('page_banners', function (Blueprint $table) {
            $table->id();
            $table->string('page_key')->unique();
            $table->string('page_name');
            $table->string('page_route')->nullable();
            $table->string('banner_image')->nullable();
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Seed initial default pages
        $defaultPages = [
            [
                'page_key' => 'about',
                'page_name' => 'About Us',
                'page_route' => '/about',
                'title' => 'About Us',
                'subtitle' => 'Know our story, heritage & tradition of pure chakki fresh flour',
            ],
            [
                'page_key' => 'products',
                'page_name' => 'Our Products',
                'page_route' => '/products',
                'title' => 'Our Products',
                'subtitle' => 'Explore 100% natural, farm-fresh flour varieties',
            ],
            [
                'page_key' => 'product-details',
                'page_name' => 'Product Details',
                'page_route' => '/product/{product}',
                'title' => 'Product Details',
                'subtitle' => 'Pure quality, natural processing & packaging information',
            ],
            [
                'page_key' => 'blog',
                'page_name' => 'Blog & Articles',
                'page_route' => '/blog',
                'title' => 'Blog & Articles',
                'subtitle' => 'Health tips, traditional recipes & farming insights',
            ],
            [
                'page_key' => 'blog-single',
                'page_name' => 'Single Blog Post',
                'page_route' => '/blog/{slug}',
                'title' => 'Article Details',
                'subtitle' => 'Read our latest updates and healthy living guide',
            ],
            [
                'page_key' => 'contact',
                'page_name' => 'Contact Us',
                'page_route' => '/contact',
                'title' => 'Contact Us',
                'subtitle' => 'Get in touch for wholesale, distribution & product inquiries',
            ],
            [
                'page_key' => 'image-gallery',
                'page_name' => 'Photo Gallery',
                'page_route' => '/image-gallery',
                'title' => 'Photo Gallery',
                'subtitle' => 'Glimpse into our state-of-the-art chakki mill & packaging facility',
            ],
            [
                'page_key' => 'video-gallery',
                'page_name' => 'Video Gallery',
                'page_route' => '/video-gallery',
                'title' => 'Video Gallery',
                'subtitle' => 'Watch our modern grain cleaning & stone-ground milling process',
            ],
            [
                'page_key' => 'services',
                'page_name' => 'Quality & Services',
                'page_route' => '/services',
                'title' => 'Quality & Services',
                'subtitle' => 'Committed to hygienic processing & highest nutrition retention',
            ],
            [
                'page_key' => 'service-details',
                'page_name' => 'Service Details',
                'page_route' => '/service-details',
                'title' => 'Service Details',
                'subtitle' => 'In-depth overview of our quality standards',
            ],
            [
                'page_key' => 'team',
                'page_name' => 'Our Team',
                'page_route' => '/team',
                'title' => 'Our Team',
                'subtitle' => 'The dedicated team behind Raghuvir Atta',
            ],
            [
                'page_key' => 'team-details',
                'page_name' => 'Team Details',
                'page_route' => '/team-details',
                'title' => 'Team Details',
                'subtitle' => 'Meet our management & master millers',
            ],
            [
                'page_key' => 'testimonials',
                'page_name' => 'Customer Reviews',
                'page_route' => '/testimonials',
                'title' => 'Customer Reviews',
                'subtitle' => 'What families and chefs say about our chakki fresh flour',
            ],
            [
                'page_key' => 'faqs',
                'page_name' => 'Frequently Asked Questions',
                'page_route' => '/faqs',
                'title' => 'FAQs',
                'subtitle' => 'Common questions about grain sourcing, shelf life & orders',
            ],
            [
                'page_key' => 'pricing',
                'page_name' => 'Pricing & Bulk Orders',
                'page_route' => '/pricing',
                'title' => 'Pricing Plans',
                'subtitle' => 'Transparent wholesale and retail pricing plans',
            ],
            [
                'page_key' => '404',
                'page_name' => '404 Page Not Found',
                'page_route' => '/404',
                'title' => 'Page Not Found',
                'subtitle' => 'The requested page could not be located',
            ],
        ];

        $now = now();
        foreach ($defaultPages as &$p) {
            $p['banner_image'] = null; // null means fallback to default brudcamp_about.png
            $p['is_active'] = true;
            $p['created_at'] = $now;
            $p['updated_at'] = $now;
        }

        \Illuminate\Support\Facades\DB::table('page_banners')->insert($defaultPages);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('page_banners');
    }
};
