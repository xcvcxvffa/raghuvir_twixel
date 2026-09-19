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
Route::get('/blog/{slug}', [PageController::class, 'blogDetails'])->name('blog.single');
Route::get('/blog-details/{slug?}', [PageController::class, 'blogDetailsRedirect'])->name('blog-details');
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

/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\LeadController as AdminLeadController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;

Route::prefix('admin')->name('admin.')->group(function () {
    // Guest Routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit');
    });

    // Authenticated Admin Routes
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/', fn () => redirect()->route('admin.dashboard'));
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        // Customer Inquiries & Leads Management
        Route::get('/leads', [AdminLeadController::class, 'index'])->name('leads.index');
        Route::post('/leads/{lead}/status', [AdminLeadController::class, 'updateStatus'])->name('leads.status');
        Route::post('/leads/{lead}/notes', [AdminLeadController::class, 'updateNotes'])->name('leads.notes');
        Route::delete('/leads/{lead}', [AdminLeadController::class, 'destroy'])->name('leads.destroy');

        // Product Management
        Route::resource('products', AdminProductController::class)->except(['show']);
        Route::post('/products/{product}/toggle-status', [AdminProductController::class, 'toggleStatus'])->name('products.toggle-status');
        Route::post('/products/{product}/toggle-featured', [AdminProductController::class, 'toggleFeatured'])->name('products.toggle-featured');

        // Blog Management
        Route::resource('blogs', AdminBlogController::class)->except(['show']);
        Route::post('/blogs/{blog}/toggle-status', [AdminBlogController::class, 'toggleStatus'])->name('blogs.toggle-status');

        // Media Gallery Management
        Route::resource('galleries', AdminGalleryController::class)->except(['show']);
        Route::post('/galleries/{gallery}/toggle-status', [AdminGalleryController::class, 'toggleStatus'])->name('galleries.toggle-status');
        Route::post('/galleries/bulk-action', [AdminGalleryController::class, 'bulkAction'])->name('galleries.bulk-action');

        // Profile & Account Settings
        Route::get('/profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
        Route::put('/profile', [AdminProfileController::class, 'update'])->name('profile.update');
        Route::put('/profile/password', [AdminProfileController::class, 'updatePassword'])->name('profile.password');
        Route::post('/profile/avatar', [AdminProfileController::class, 'updateAvatar'])->name('profile.avatar');
        Route::delete('/profile/avatar', [AdminProfileController::class, 'removeAvatar'])->name('profile.avatar.remove');

        // Site Settings
        Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [AdminSettingController::class, 'update'])->name('settings.update');
        Route::post('/settings/resolve-map', [AdminSettingController::class, 'resolveMap'])->name('settings.resolve-map');
    });
});
