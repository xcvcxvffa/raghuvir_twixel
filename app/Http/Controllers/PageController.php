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
        return view('products');
    }

    public function productDetails($product = 'atta')
    {
        
        $product_data = [
            'atta' => [
                'title' => 'Raghuvir Chakki Atta',
                'sizes' => '5kg, 30kg',
                'description' => 'Raghuvir Hygienic Chakki Atta is made from premium quality wheat, clean and pure, rich in natural dietary fiber and nutrients. We process our wheat hygienically to keep the moisture low, ensuring fresh, soft, and healthy rotis for your family.',
            ],
            'bati' => [
                'title' => 'Raghuvir Bati Atta',
                'sizes' => '30kg',
                'description' => 'Raghuvir Bati Atta is specially milled to the perfect texture for making delicious, authentic Batis. Ground from handpicked premium wheat grains, it ensures your Batis are crispy on the outside and soft on the inside.',
            ],
            'wheat' => [
                'title' => 'Raghuvir Wheat Atta',
                'sizes' => '49kg',
                'description' => 'Raghuvir Wheat Atta is high-quality commercial grade flour, ideal for bulk baking, catering, and home use. Milled under strict quality controls to maintain its nutritional integrity and excellent baking properties.',
            ],
            'maida' => [
                'title' => 'Raghuvir Premium Maida',
                'sizes' => '30kg, 50kg',
                'description' => 'Raghuvir Premium Maida is finely milled and refined to produce white, smooth flour. Excellent for baking breads, pastries, naans, and other premium bakery items, offering superior elasticity and texture.',
            ],
            'suji' => [
                'title' => 'Raghuvir Fine Suji',
                'sizes' => '30kg, 50kg',
                'description' => 'Raghuvir Fine Suji (Semolina) is granulated from premium durum wheat. Perfect for making delicious halwa, upma, idlis, and crispy snacks, ensuring the perfect crunch and texture every time.',
            ],
            'bran' => [
                'title' => 'Raghuvir Wheat Bran',
                'sizes' => '30kg, 40kg',
                'description' => 'Raghuvir Wheat Bran is high-fiber, premium quality coarse bran derived from clean wheat milling. Ideal for nutritional supplements, healthy baking, or animal feed, maintaining clean and organic standards.',
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
