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
Route::post('/contact/submit', [PageController::class, 'submitContact'])->name('contact.submit')->middleware('throttle:10,1');
Route::post('/inquiry/submit', [PageController::class, 'submitInquiry'])->name('inquiry.submit')->middleware('throttle:10,1');
Route::get('/sitemap.xml', [\App\Http\Controllers\SitemapController::class, 'index'])->name('sitemap');

/*
|--------------------------------------------------------------------------
| Admin Panel Routes
|--------------------------------------------------------------------------
*/
use App\Http\Controllers\Admin\AuthController as AdminAuthController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\SettingController as AdminSettingController;
use App\Http\Controllers\Admin\EmailSettingController as AdminEmailSettingController;
use App\Http\Controllers\Admin\BlogController as AdminBlogController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\LeadController as AdminLeadController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\PageBannerController as AdminPageBannerController;
use App\Http\Controllers\Admin\PageSeoController as AdminPageSeoController;
use App\Http\Controllers\Admin\WebmasterController as AdminWebmasterController;
use App\Http\Controllers\Admin\NotificationController as AdminNotificationController;

Route::prefix('admin')->name('admin.')->group(function () {
    // Guest Routes
    Route::middleware('guest')->group(function () {
        Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
        Route::post('/login', [AdminAuthController::class, 'login'])->name('login.submit')->middleware('throttle:10,1');
    });

    // Authenticated Admin Routes
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/', fn () => redirect()->route('admin.dashboard'));
        Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');

        // Customer Inquiries & Leads Management
        Route::get('/leads', [AdminLeadController::class, 'index'])->name('leads.index');
        Route::get('/leads/export', [AdminLeadController::class, 'exportCsv'])->name('leads.export');
        Route::post('/leads/bulk-action', [AdminLeadController::class, 'bulkAction'])->name('leads.bulk-action');
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

        // Page Banners & Breadcrumb Hero Management
        Route::get('/banners', [AdminPageBannerController::class, 'index'])->name('banners.index');
        Route::get('/banners/{banner}/edit', [AdminPageBannerController::class, 'edit'])->name('banners.edit');
        Route::post('/banners/{banner}/update', [AdminPageBannerController::class, 'update'])->name('banners.update');
        Route::post('/banners/{banner}/reset', [AdminPageBannerController::class, 'reset'])->name('banners.reset');
        Route::post('/banners/quick-upload', [AdminPageBannerController::class, 'quickUpload'])->name('banners.quick-upload');

        // Page SEO & Meta Tags Management
        Route::get('/seo', [AdminPageSeoController::class, 'index'])->name('seo.index');
        Route::post('/seo/analytics', [AdminPageSeoController::class, 'updateAnalytics'])->name('seo.analytics.update');
        Route::post('/seo/robots-txt', [AdminPageSeoController::class, 'updateRobotsTxt'])->name('seo.robots.update');
        Route::get('/seo/{seo}/edit', [AdminPageSeoController::class, 'edit'])->name('seo.edit');
        Route::post('/seo/{seo}/update', [AdminPageSeoController::class, 'update'])->name('seo.update');
        Route::post('/seo/{seo}/remove-og-image', [AdminPageSeoController::class, 'removeOgImage'])->name('seo.remove-og-image');
        Route::post('/seo/{seo}/toggle-robots', [AdminPageSeoController::class, 'toggleRobots'])->name('seo.toggle-robots');
        Route::get('/seo/{seo}/auto-generate', [AdminPageSeoController::class, 'autoGenerate'])->name('seo.auto-generate');

        // Webmaster Tools & Analytics Hub (Standalone Module)
        Route::get('/webmaster', [AdminWebmasterController::class, 'index'])->name('webmaster.index');
        Route::post('/webmaster', [AdminWebmasterController::class, 'update'])->name('webmaster.update');
        Route::post('/webmaster/robots-txt', [AdminWebmasterController::class, 'updateRobots'])->name('webmaster.robots');

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

        // Email & SMTP Configuration
        Route::get('/settings/email', [AdminEmailSettingController::class, 'index'])->name('settings.email');
        Route::post('/settings/email', [AdminEmailSettingController::class, 'update'])->name('settings.email.update');
        Route::post('/settings/email/test', [AdminEmailSettingController::class, 'sendTestEmail'])->name('settings.email.test');

        // Real-Time Notifications Hub
        Route::get('/notifications', [AdminNotificationController::class, 'getLatest'])->name('notifications.latest');
        Route::post('/notifications/mark-all-read', [AdminNotificationController::class, 'markAllAsRead'])->name('notifications.mark-all-read');
        Route::post('/notifications/{notification}/read', [AdminNotificationController::class, 'markAsRead'])->name('notifications.read');
        Route::delete('/notifications/clear', [AdminNotificationController::class, 'clearAll'])->name('notifications.clear');

        // Database Migrations & Optimization Runner (Protected by auth and admin middleware)
        Route::match(['get', 'post'], '/migrate', function (\Illuminate\Http\Request $request) {

            try {
                \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
                $output = \Illuminate\Support\Facades\Artisan::output();

                if (class_exists(\Database\Seeders\PageSeoSeeder::class)) {
                    \Illuminate\Support\Facades\Artisan::call('db:seed', ['--class' => 'PageSeoSeeder', '--force' => true]);
                    $output .= "\n" . \Illuminate\Support\Facades\Artisan::output();
                }

                \Illuminate\Support\Facades\Artisan::call('optimize:clear');
                $output .= "\n" . \Illuminate\Support\Facades\Artisan::output();

                return response("<html><body style='background:#0f172a;color:#10b981;font-family:sans-serif;padding:30px;line-height:1.6;'><div style='max-width:800px;margin:0 auto;'><h2 style='color:#10b981;'>✅ Migrations & Tables Updated Successfully!</h2><pre style='background:#1e293b;padding:20px;border-radius:8px;color:#94a3b8;font-family:monospace;white-space:pre-wrap;'>" . htmlspecialchars($output) . "</pre><div style='margin-top:20px;'><a href='/admin/seo' style='display:inline-block;padding:12px 24px;background:#ef801c;color:#fff;text-decoration:none;border-radius:6px;font-weight:bold;'>Go to Page SEO</a> <a href='/admin/dashboard' style='display:inline-block;padding:12px 24px;background:#334155;color:#fff;text-decoration:none;border-radius:6px;font-weight:bold;margin-left:10px;'>Back to Dashboard</a></div></div></body></html>");
            } catch (\Throwable $e) {
                return response("<html><body style='background:#0f172a;color:#ef4444;font-family:sans-serif;padding:30px;'><div style='max-width:800px;margin:0 auto;'><h2 style='color:#ef4444;'>❌ Migration Error</h2><pre style='background:#1e293b;padding:20px;border-radius:8px;color:#f87171;font-family:monospace;white-space:pre-wrap;'>" . htmlspecialchars($e->getMessage()) . "</pre></div></body></html>", 500);
            }
        })->name('migrate');
    });
});
