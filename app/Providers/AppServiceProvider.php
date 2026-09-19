<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        if (file_exists(app_path('Helpers/SettingsHelper.php'))) {
            require_once app_path('Helpers/SettingsHelper.php');
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        view()->composer(['partials.footer', 'partials.header'], function ($view) {
            try {
                if (\Illuminate\Support\Facades\Schema::hasTable('products')) {
                    $footerProducts = \App\Models\Product::active()
                        ->orderBy('sort_order', 'asc')
                        ->take(6)
                        ->get();
                    $view->with('footerProducts', $footerProducts);
                }
            } catch (\Throwable $e) {
                // Ignore DB connection errors during early bootstrapping / CLI
            }
        });
    }
}
