<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Blog;
use App\Models\PageSeo;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    /**
     * Generate and serve real-time dynamic XML Sitemap.
     */
    public function index(): Response
    {
        $baseUrl = url('/');

        // Static routes with their priority, change frequency, and lastmod
        $staticRoutes = [
            ['name' => 'home',           'priority' => '1.0', 'changefreq' => 'daily'],
            ['name' => 'about',          'priority' => '0.8', 'changefreq' => 'monthly'],
            ['name' => 'products',       'priority' => '0.9', 'changefreq' => 'weekly'],
            ['name' => 'services',       'priority' => '0.8', 'changefreq' => 'monthly'],
            ['name' => 'blog',           'priority' => '0.8', 'changefreq' => 'daily'],
            ['name' => 'contact',        'priority' => '0.8', 'changefreq' => 'monthly'],
            ['name' => 'image-gallery',  'priority' => '0.7', 'changefreq' => 'monthly'],
            ['name' => 'video-gallery',  'priority' => '0.7', 'changefreq' => 'monthly'],
            ['name' => 'pricing',        'priority' => '0.7', 'changefreq' => 'monthly'],
            ['name' => 'testimonials',   'priority' => '0.7', 'changefreq' => 'monthly'],
            ['name' => 'faqs',           'priority' => '0.7', 'changefreq' => 'monthly'],
            ['name' => 'team',           'priority' => '0.6', 'changefreq' => 'monthly'],
        ];

        // Retrieve active products
        $products = Product::where('is_active', true)
            ->orderBy('updated_at', 'desc')
            ->get(['id', 'slug', 'name', 'image', 'updated_at']);

        // Retrieve published blogs
        $blogs = Blog::where('is_published', true)
            ->orderBy('updated_at', 'desc')
            ->get(['id', 'slug', 'title', 'image', 'updated_at']);

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" ';
        $xml .= 'xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . "\n";

        // 1. Static Pages
        foreach ($staticRoutes as $item) {
            $loc = route($item['name']);
            $pageSeo = PageSeo::where('page_key', $item['name'])->first();

            // Skip if set to noindex
            if ($pageSeo && str_contains(strtolower($pageSeo->robots ?? ''), 'noindex')) {
                continue;
            }

            $lastmod = $pageSeo?->updated_at ? $pageSeo->updated_at->tz('UTC')->toAtomString() : now()->tz('UTC')->toAtomString();

            $xml .= "    <url>\n";
            $xml .= "        <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
            $xml .= "        <lastmod>{$lastmod}</lastmod>\n";
            $xml .= "        <changefreq>{$item['changefreq']}</changefreq>\n";
            $xml .= "        <priority>{$item['priority']}</priority>\n";
            $xml .= "    </url>\n";
        }

        // 2. Dynamic Products
        foreach ($products as $product) {
            $loc = route('product-details', ['product' => $product->slug]);
            $lastmod = $product->updated_at ? $product->updated_at->tz('UTC')->toAtomString() : now()->tz('UTC')->toAtomString();

            $xml .= "    <url>\n";
            $xml .= "        <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
            $xml .= "        <lastmod>{$lastmod}</lastmod>\n";
            $xml .= "        <changefreq>weekly</changefreq>\n";
            $xml .= "        <priority>0.9</priority>\n";

            if ($product->image) {
                $imgUrl = asset('storage/' . ltrim($product->image, '/'));
                $xml .= "        <image:image>\n";
                $xml .= "            <image:loc>" . htmlspecialchars($imgUrl, ENT_XML1) . "</image:loc>\n";
                $xml .= "            <image:title>" . htmlspecialchars($product->name, ENT_XML1) . "</image:title>\n";
                $xml .= "        </image:image>\n";
            }

            $xml .= "    </url>\n";
        }

        // 3. Dynamic Blogs
        foreach ($blogs as $blog) {
            $loc = route('blog.single', ['slug' => $blog->slug]);
            $lastmod = $blog->updated_at ? $blog->updated_at->tz('UTC')->toAtomString() : now()->tz('UTC')->toAtomString();

            $xml .= "    <url>\n";
            $xml .= "        <loc>" . htmlspecialchars($loc, ENT_XML1) . "</loc>\n";
            $xml .= "        <lastmod>{$lastmod}</lastmod>\n";
            $xml .= "        <changefreq>monthly</changefreq>\n";
            $xml .= "        <priority>0.8</priority>\n";

            if ($blog->image) {
                $imgUrl = asset('storage/' . ltrim($blog->image, '/'));
                $xml .= "        <image:image>\n";
                $xml .= "            <image:loc>" . htmlspecialchars($imgUrl, ENT_XML1) . "</image:loc>\n";
                $xml .= "            <image:title>" . htmlspecialchars($blog->title, ENT_XML1) . "</image:title>\n";
                $xml .= "        </image:image>\n";
            }

            $xml .= "    </url>\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200, [
            'Content-Type' => 'application/xml; charset=utf-8',
            'X-Robots-Tag' => 'noindex, follow',
        ]);
    }
}
