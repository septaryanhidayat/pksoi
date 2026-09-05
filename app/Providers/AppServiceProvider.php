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

        if (config('app.env') === 'production' || str_starts_with((string) config('app.url'), 'https://')) {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }

        View::composer('*', function ($view) {
            if (Schema::hasTable('settings')) {
                $view->with('siteSettings', Setting::all()->pluck('value', 'key')->toArray());
            } else {
                $view->with('siteSettings', []);
            }
        });

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
