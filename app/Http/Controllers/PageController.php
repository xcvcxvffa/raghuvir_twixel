<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Lead;
use App\Services\DynamicMailService;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        $latestBlogs = Blog::published()
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        $featuredProducts = \App\Models\Product::active()
            ->orderBy('is_featured', 'desc')
            ->orderBy('sort_order', 'asc')
            ->take(6)
            ->get();

        return view('index', compact('latestBlogs', 'featuredProducts'));
    }

    public function homeV2()
    {
        return view('index-2');
    }

    public function homeV3()
    {
        return view('index-3');
    }

    public function homeV4()
    {
        return view('index-4');
    }

    public function about()
    {
        return view('about');
    }

    public function services()
    {
        return view('services');
    }

    public function serviceDetails()
    {
        return view('service-single');
    }

    public function blog(Request $request)
    {
        $query = Blog::published();

        if ($request->filled('search')) {
            $query->search($request->input('search'));
        }

        if ($request->filled('category') && $request->input('category') !== 'all') {
            $query->category($request->input('category'));
        }

        $blogs = $query->orderBy('published_at', 'desc')
            ->paginate(6)
            ->withQueryString();

        $categories = Blog::published()
            ->select('category')
            ->selectRaw('count(*) as count')
            ->groupBy('category')
            ->get();

        $recentBlogs = Blog::published()
            ->orderBy('published_at', 'desc')
            ->take(4)
            ->get();

        return view('blog', compact('blogs', 'categories', 'recentBlogs'));
    }

    public function blogDetails(?string $slug = null)
    {
        if (empty($slug)) {
            $blog = Blog::published()->orderBy('published_at', 'desc')->firstOrFail();
            return redirect()->route('blog.single', $blog->slug);
        }

        $blog = Blog::published()->where('slug', $slug)->firstOrFail();

        // Increment view count safely
        $blog->increment('views_count');

        // Previous & Next articles
        $publishedAt = $blog->published_at ?? $blog->created_at;
        $prevBlog = Blog::published()
            ->where('published_at', '<', $publishedAt)
            ->orderBy('published_at', 'desc')
            ->first();

        $nextBlog = Blog::published()
            ->where('published_at', '>', $publishedAt)
            ->orderBy('published_at', 'asc')
            ->first();

        // Recent posts for sidebar / recommendations
        $recentBlogs = Blog::published()
            ->where('id', '!=', $blog->id)
            ->orderBy('published_at', 'desc')
            ->take(3)
            ->get();

        return view('blog-single', compact('blog', 'prevBlog', 'nextBlog', 'recentBlogs'));
    }

    public function blogDetailsRedirect(?string $slug = null)
    {
        if ($slug) {
            return redirect()->route('blog.single', $slug);
        }
        $latest = Blog::published()->orderBy('published_at', 'desc')->first();
        if ($latest) {
            return redirect()->route('blog.single', $latest->slug);
        }
        return redirect()->route('blog');
    }

    public function products()
    {
        $products = \App\Models\Product::active()->orderBy('sort_order', 'asc')->get();

        return view('products', compact('products'));
    }

    public function productDetails($product = 'atta')
    {
        // Candidate slugs supporting both shorthand and full aliases
        $candidateSlugs = match ($product) {
            'atta', 'whole-wheat-atta' => ['atta', 'whole-wheat-atta'],
            'bati', 'bati-atta' => ['bati', 'bati-atta'],
            'wheat', 'wheat-bran' => ['wheat', 'wheat-bran'],
            default => [$product],
        };

        $productModel = \App\Models\Product::active()->whereIn('slug', $candidateSlugs)->first();

        if (!$productModel) {
            $productModel = \App\Models\Product::active()->first() ?? new \App\Models\Product([
                'name' => 'Whole Wheat Atta',
                'slug' => 'atta',
                'subtitle' => '100% Pure & Farm Fresh',
                'category' => 'Wheat Flour',
                'short_description' => 'Raghuvir Hygienic Chakki Atta is made from premium quality wheat, clean and pure, rich in natural dietary fiber and nutrients.',
                'detailed_description' => 'Raghuvir Whole Wheat Atta brings the goodness of carefully selected wheat to your kitchen.',
                'sizes' => ['5kg', '30kg'],
                'image' => 'images/product_atta_white.jpg',
            ]);
        }

        // Related products for bottom showcase
        $relatedProducts = \App\Models\Product::active()
            ->where('id', '!=', $productModel->id)
            ->orderBy('sort_order', 'asc')
            ->take(3)
            ->get();

        // Dynamic Quality & Process Highlights (6 cards)
        $highlights = [
            [
                'title' => in_array($productModel->slug, ['atta', 'whole-wheat-atta']) ? '100% Wheat Flour' : ($productModel->category ?: '100% Pure Flour'),
                'tag' => 'Pure & Natural',
            ],
            [
                'title' => match ($productModel->slug) {
                    'bati', 'bati-atta' => 'Coarse Stone Ground',
                    'wheat', 'wheat-bran' => 'Roller & Chakki Milled',
                    default => ($productModel->processing ? \Illuminate\Support\Str::limit($productModel->processing, 18) : 'Chakki Ground'),
                },
                'tag' => match ($productModel->slug) {
                    'bati', 'bati-atta' => 'Traditional Coarse',
                    'wheat', 'wheat-bran' => 'High Fiber Milled',
                    default => 'Stone Milled',
                },
            ],
            [
                'title' => 'Carefully Selected',
                'tag' => match ($productModel->slug) {
                    'bati', 'bati-atta' => 'Golden Hard Wheat',
                    'wheat', 'wheat-bran' => 'High Fiber Wheat',
                    default => ($productModel->main_ingredient ? \Illuminate\Support\Str::limit($productModel->main_ingredient, 15) : 'Finest Wheat'),
                },
            ],
            [
                'title' => 'Hygienically Processed',
                'tag' => '100% Clean',
            ],
            [
                'title' => 'Consistent Quality',
                'tag' => 'Quality Assured',
            ],
            [
                'title' => match ($productModel->slug) {
                    'bati', 'bati-atta' => 'Dal Bati & Churma',
                    'wheat', 'wheat-bran' => 'Bulk & Commercial',
                    default => 'Everyday Cooking',
                },
                'tag' => match ($productModel->slug) {
                    'bati', 'bati-atta' => 'Crispy & Wholesome',
                    'wheat', 'wheat-bran' => 'High Fiber & Yield',
                    default => 'Soft & Fluffy',
                },
            ],
        ];

        // Dynamic Purity & Quality Promise Bullets
        $purity_bullets = match ($productModel->slug) {
            'bati', 'bati-atta' => [
                'Specially chosen golden grains milled to the authentic coarse texture.',
                'Processed in hygienic, traditional stone chakki mill environment.',
                'Zero artificial additives, maida, or chemical enhancers.',
                'Formulated to deliver traditional crispy outer crust and melt-in-mouth softness for Dal Bati & Churma.',
            ],
            'wheat', 'wheat-bran' => [
                '100% Pure nutrient-rich wheat bran milled from premium grade wheat.',
                'Strict moisture & hygiene controls ensuring consistent bulk output.',
                'High natural dietary fiber content with zero chemical adulterants.',
                'Ideal high-yield performance for commercial kitchens, bakers, and caterers.',
            ],
            default => [
                '100% Pure Whole Wheat, carefully selected and cleaned.',
                'Processed in hygienic, moisture-controlled mill environment.',
                'Zero added preservatives, chemicals, or artificial bleaches.',
                'Retains dietary fiber to ensure naturally soft and tasty rotis.',
            ],
        };

        $data = [
            'productModel' => $productModel,
            'product' => $productModel,
            'slug' => $productModel->slug,
            'title' => $productModel->name,
            'subtitle' => $productModel->subtitle,
            'sizes' => $productModel->sizes_string,
            'category' => $productModel->category,
            'main_ingredient' => $productModel->main_ingredient,
            'processing' => $productModel->processing,
            'suitable_for' => $productModel->suitable_for,
            'packaging' => $productModel->packaging,
            'shelf_life' => $productModel->shelf_life,
            'storage' => $productModel->storage,
            'quote' => $productModel->quote,
            'description' => $productModel->short_description,
            'detailed_description' => $productModel->detailed_description,
            'image' => $productModel->image_url,
            'gallery_images' => $productModel->gallery_urls,
            'energy_kcal' => $productModel->energy_kcal,
            'protein_g' => $productModel->protein_g,
            'carbs_g' => $productModel->carbs_g,
            'fat_g' => $productModel->fat_g,
            'nutrition_details' => $productModel->nutrition_details ?? [],
            'ideal_for' => $productModel->ideal_for_list,
            'specifications' => $productModel->specifications_list,
            'highlights' => $highlights,
            'purity_bullets' => $purity_bullets,
            'relatedProducts' => $relatedProducts,
            'meta_title' => $productModel->meta_title ?: ($productModel->name . ' - Raghuvir Atta'),
            'meta_description' => $productModel->meta_description ?: ($productModel->short_description ?: 'Experience pure stone-ground quality with Raghuvir Atta.'),
            'meta_keywords' => $productModel->meta_keywords ?: ($productModel->name . ', raghuvir atta, ' . $productModel->category),
        ];

        return view('product-single', $data);
    }

    public function team()
    {
        return view('team');
    }

    public function teamDetails()
    {
        return view('team-single');
    }

    public function pricing()
    {
        return view('pricing');
    }

    public function testimonials()
    {
        return view('testimonials');
    }

    public function imageGallery()
    {
        $images = \App\Models\Gallery::active()->images()->ordered()->get();
        $categories = $images->pluck('category')->filter()->unique()->values();

        return view('image-gallery', compact('images', 'categories'));
    }

    public function videoGallery()
    {
        $videos = \App\Models\Gallery::active()->videos()->ordered()->get();
        $categories = $videos->pluck('category')->filter()->unique()->values();

        return view('video-gallery', compact('videos', 'categories'));
    }

    public function faqs()
    {
        return view('faqs');
    }

    public function pageNotFound()
    {
        return view('errors.404');
    }

    public function contact($product = null, $size = null)
    {
        return view('contact', compact('product', 'size'));
    }

    /**
     * Handle product inquiry popup form submission.
     */
    public function submitInquiry(Request $request)
    {
        // 1. Honeypot bot protection (reject automated bots filling hidden trap fields)
        if (!empty($request->input('website')) || !empty($request->input('b_title')) || !empty($request->input('address_hp'))) {
            return $request->expectsJson() || $request->ajax()
                ? response()->json(['success' => true, 'message' => 'Thank you! Your inquiry has been submitted. We will contact you shortly.'])
                : back()->with('success', 'Thank you! Your inquiry has been submitted.');
        }

        $validated = $request->validate([
            'name'             => ['required', 'string', 'max:120'],
            'phone'            => ['required', 'string', 'regex:/^[0-9+\-\s()]{7,25}$/'],
            'email'            => ['nullable', 'email', 'max:191'],
            'product_interest' => ['nullable', 'string', 'max:255'],
            'quantity'         => ['nullable', 'string', 'max:100'],
            'message'          => ['nullable', 'string', 'max:1000'],
        ], [
            'phone.regex'      => 'Please provide a valid contact phone number.',
        ]);

        // 2. Strict Input Sanitization to prevent Stored XSS
        $sanitizedName            = strip_tags(trim($validated['name']));
        $sanitizedPhone           = strip_tags(trim($validated['phone']));
        $sanitizedEmail           = !empty($validated['email']) ? filter_var(trim($validated['email']), FILTER_SANITIZE_EMAIL) : null;
        $sanitizedProductInterest = !empty($validated['product_interest']) ? strip_tags(trim($validated['product_interest'])) : null;
        $sanitizedQuantity        = !empty($validated['quantity']) ? strip_tags(trim($validated['quantity'])) : null;
        $sanitizedMessage         = !empty($validated['message']) ? strip_tags(trim($validated['message'])) : null;

        $lead = Lead::create([
            'name'             => $sanitizedName,
            'phone'            => $sanitizedPhone,
            'email'            => $sanitizedEmail,
            'product_interest' => $sanitizedProductInterest,
            'quantity'         => $sanitizedQuantity,
            'message'          => $sanitizedMessage,
            'source'           => 'product_inquiry_popup',
            'status'           => 'new',
            'ip_address'       => $request->ip(),
            'user_agent'       => substr($request->userAgent() ?? '', 0, 255),
        ]);

        // Safely send admin notification and customer auto-reply without failing lead creation
        DynamicMailService::sendSafely($lead);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Thank you! Your inquiry has been submitted. We will contact you shortly.']);
        }

        return back()->with('success', 'Thank you! Your inquiry has been submitted.');
    }

    /**
     * Handle Contact Us page form submission.
     */
    public function submitContact(Request $request)
    {
        // 1. Honeypot bot protection
        if (!empty($request->input('website')) || !empty($request->input('b_title')) || !empty($request->input('address_hp'))) {
            return $request->expectsJson() || $request->ajax()
                ? response()->json(['success' => true, 'message' => 'Thank you! Your message has been sent successfully. We will get back to you shortly.'])
                : back()->with('success', 'Thank you! Your message has been sent successfully. We will get back to you shortly.');
        }

        $validated = $request->validate([
            'fname'            => ['nullable', 'string', 'max:60'],
            'lname'            => ['nullable', 'string', 'max:60'],
            'name'             => ['nullable', 'string', 'max:120'],
            'email'            => ['required', 'email', 'max:191'],
            'phone'            => ['required', 'string', 'regex:/^[0-9+\-\s()]{7,25}$/'],
            'product_interest' => ['nullable', 'string', 'max:255'],
            'message'          => ['nullable', 'string', 'max:2000'],
        ], [
            'phone.regex'      => 'Please provide a valid contact phone number.',
        ]);

        $fullName = trim(($request->input('fname', '') . ' ' . $request->input('lname', '')));
        if (empty($fullName)) {
            $fullName = $request->input('name') ?: 'Website Visitor';
        }

        // 2. Strict Input Sanitization
        $sanitizedName            = strip_tags(trim($fullName));
        $sanitizedPhone           = strip_tags(trim($validated['phone']));
        $sanitizedEmail           = filter_var(trim($validated['email']), FILTER_SANITIZE_EMAIL);
        $sanitizedProductInterest = !empty($validated['product_interest']) ? strip_tags(trim($validated['product_interest'])) : 'General Contact Inquiry';
        $sanitizedMessage         = !empty($validated['message']) ? strip_tags(trim($validated['message'])) : null;

        $lead = Lead::create([
            'name'             => $sanitizedName,
            'phone'            => $sanitizedPhone,
            'email'            => $sanitizedEmail,
            'product_interest' => $sanitizedProductInterest,
            'quantity'         => null,
            'message'          => $sanitizedMessage,
            'source'           => 'contact_page',
            'status'           => 'new',
            'ip_address'       => $request->ip(),
            'user_agent'       => substr($request->userAgent() ?? '', 0, 255),
        ]);

        // Safely send admin notification and customer auto-reply without failing lead creation
        DynamicMailService::sendSafely($lead);

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you! Your message has been sent successfully. We will get back to you shortly.',
            ]);
        }

        return back()->with('success', 'Thank you! Your message has been sent successfully. We will get back to you shortly.');
    }
}
