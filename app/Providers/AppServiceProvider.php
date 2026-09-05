<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useTailwind();

        if (Schema::hasTable('settings')) {
            $settings = Setting::all()->pluck('value', 'key')->toArray();
            View::share('siteSettings', $settings);
        } else {
            View::share('siteSettings', []);
        }

        if (Schema::hasTable('categories')) {
            $headerCategories = Category::withCount('posts')
                ->orderBy('posts_count', 'desc')
                ->take(8)
                ->get();
            View::share('headerCategories', $headerCategories);
        } else {
            View::share('headerCategories', collect());
        }
    }
}
