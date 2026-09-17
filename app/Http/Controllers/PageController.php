<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('index');
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

    public function blog()
    {
        return view('blog');
    }

    public function blogDetails()
    {
        return view('blog-single');
    }

    public function products()
    {
        $products = [
            [
                'slug' => 'bati',
                'title' => 'Bati Atta',
                'subtitle' => '100% Pure & Farm Fresh',
                'sizes' => ['5kg', '30kg'],
                'description' => 'Raghuvir Bati Atta is specially milled to the perfect texture for making delicious, authentic Batis. Ground from handpicked premium wheat grains, it ensures your Batis are crispy on the outside and soft on the inside.',
                'image' => 'images/product_atta_white.jpg',
            ],
            [
                'slug' => 'atta',
                'title' => 'Whole Wheat Atta',
                'subtitle' => '100% Pure & Farm Fresh',
                'sizes' => ['5kg', '30kg'],
                'description' => 'Raghuvir Hygienic Chakki Atta is made from premium quality wheat, clean and pure, rich in natural dietary fiber and nutrients. Fresh, soft, and healthy rotis for your family.',
                'image' => 'images/product_atta_white.jpg',
            ],
            [
                'slug' => 'wheat',
                'title' => 'Wheat Bran',
                'subtitle' => '100% Pure & Farm Fresh',
                'sizes' => ['49kg'],
                'description' => 'Raghuvir Wheat Bran is high-quality, rich in dietary fiber — ideal for bulk baking, catering, and commercial kitchens. Milled under strict quality controls.',
                'image' => 'images/product_atta_white.jpg',
            ]
        ];

        return view('products', compact('products'));
    }

    public function productDetails($product = 'atta')
    {
        $product_data = [
            'bati' => [
                'slug' => 'bati',
                'title' => 'Bati Atta',
                'sizes' => '5kg, 30kg',
                'category' => 'Coarse Wheat Flour',
                'main_ingredient' => 'Premium Wheat',
                'processing' => 'Traditional Coarse Ground',
                'suitable_for' => 'Dal Bati, Churma & Traditional Dishes',
                'packaging' => 'Hygienic & Secure Packaging',
                'quote' => 'Specially Milled for Crispy, Soft & Authentic Batis.',
                'description' => 'Raghuvir Bati Atta is specially milled to the perfect texture for making delicious, authentic Batis. Ground from handpicked premium wheat grains, it ensures your Batis are crispy on the outside and soft on the inside.',
                'detailed_description' => 'Raghuvir Bati Atta is specially milled to the perfect coarse texture required for making authentic Rajasthani & Malwi Batis, Baflas, and Churma. Ground from handpicked premium golden wheat grains, it provides excellent crust crispiness while keeping the inside delightfully soft and fragrant.',
            ],
            'atta' => [
                'slug' => 'atta',
                'title' => 'Whole Wheat Atta',
                'sizes' => '5kg, 30kg',
                'category' => 'Wheat Flour',
                'main_ingredient' => 'Wheat',
                'processing' => 'Chakki Ground',
                'suitable_for' => 'Everyday Indian Cooking',
                'packaging' => 'Hygienic & Secure Packaging',
                'quote' => 'From Carefully Selected Wheat to Your Everyday Kitchen.',
                'description' => 'Raghuvir Hygienic Whole Wheat Atta is made from premium quality wheat, clean and pure, rich in natural dietary fiber and nutrients. We process our wheat hygienically to keep the moisture low, ensuring fresh, soft, and healthy rotis for your family.',
                'detailed_description' => 'Raghuvir Whole Wheat Atta brings the goodness of carefully selected wheat to your kitchen. The wheat goes through a careful cleaning and grinding process to create quality atta suitable for everyday Indian meals. It retains dietary fiber and natural goodness, ensuring your rotis, parathas, and theplas stay wonderfully soft and wholesome throughout the day.',
            ],
            'wheat' => [
                'slug' => 'wheat',
                'title' => 'Wheat Bran',
                'sizes' => '49kg',
                'category' => 'Wheat Bran',
                'main_ingredient' => 'Pure Wheat',
                'processing' => 'Chakki Ground & Roller Processed',
                'suitable_for' => 'Bulk Baking, Catering & Commercial Kitchens',
                'packaging' => 'Hygienic & Heavy Duty Packaging',
                'quote' => 'Consistent Quality & Superior Performance in Every Bag.',
                'description' => 'Raghuvir Wheat Bran is high-quality, fiber-rich flour ideal for bulk baking, catering, and home use. Milled under strict quality controls to maintain its nutritional integrity and excellent baking properties.',
                'detailed_description' => 'Raghuvir Wheat Bran is commercial-grade high-yield flour formulated specifically for bulk cooking, industrial catering, restaurants, and active kitchens. Processed under stringent moisture and hygiene controls, it delivers consistent dough elasticity, high water absorption, and superior puffing.',
            ]
        ];
        
        $data = isset($product_data[$product]) ? $product_data[$product] : $product_data['atta'];
        
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
        return view('image-gallery');
    }

    public function videoGallery()
    {
        return view('video-gallery');
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
}
