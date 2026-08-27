<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'home'])->name('home');
Route::get('/home-v2', [PageController::class, 'homeV2'])->name('home-v2');
Route::get('/home-v3', [PageController::class, 'homeV3'])->name('home-v3');
Route::get('/home-v4', [PageController::class, 'homeV4'])->name('home-v4');

Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/services', [PageController::class, 'services'])->name('services');
Route::get('/service-details', [PageController::class, 'serviceDetails'])->name('service-details');
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/blog-details', [PageController::class, 'blogDetails'])->name('blog-details');
Route::get('/products', [PageController::class, 'products'])->name('products');
Route::get('/product/{product?}', [PageController::class, 'productDetails'])->name('product-details');
Route::get('/team', [PageController::class, 'team'])->name('team');
Route::get('/team-details', [PageController::class, 'teamDetails'])->name('team-details');
Route::get('/pricing', [PageController::class, 'pricing'])->name('pricing');
Route::get('/testimonials', [PageController::class, 'testimonials'])->name('testimonials');
Route::get('/image-gallery', [PageController::class, 'imageGallery'])->name('image-gallery');
Route::get('/video-gallery', [PageController::class, 'videoGallery'])->name('video-gallery');
Route::get('/faqs', [PageController::class, 'faqs'])->name('faqs');
Route::get('/404', [PageController::class, 'pageNotFound'])->name('404');
Route::get('/contact/{product?}/{size?}', [PageController::class, 'contact'])->name('contact');
