<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * Test that all mapped page routes return status 200.
     */
    public function test_all_routes_return_successful_response(): void
    {
        $routes = [
            '/',
            '/home-v2',
            '/home-v3',
            '/home-v4',
            '/about',
            '/services',
            '/service-details',
            '/blog',
            '/blog-details',
            '/products',
            '/product-details',
            '/team',
            '/team-details',
            '/pricing',
            '/testimonials',
            '/image-gallery',
            '/video-gallery',
            '/faqs',
            '/404',
            '/contact',
        ];

        foreach ($routes as $route) {
            $response = $this->get($route);
            $response->assertStatus(200);
        }
    }
}
