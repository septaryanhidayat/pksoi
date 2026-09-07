<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Setting;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

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

        // Dual-domain asset support: Jika web diakses melalui domain pusat (oganilir.pks.id),
        // arahkan aset Vite dan publik ke https://pksoganilir.com agar styling dan JS selalu sinkron.
        if (! $this->app->runningInConsole()) {
            $host = request()->getHost();
            if ($host && (str_ends_with($host, 'pks.id') || $host === 'oganilir.pks.id')) {
                config(['app.asset_url' => 'https://pksoganilir.com']);
                Vite::createAssetPathsUsing(fn ($path) => 'https://pksoganilir.com/'.ltrim($path, '/'));
            }
        }

        if (config('app.env') === 'production' || str_starts_with((string) config('app.url'), 'https://')) {
            URL::forceScheme('https');
        }

        View::composer('*', function ($view) {
            try {
                if (Schema::hasTable('settings')) {
                    $view->with('siteSettings', Setting::all()->pluck('value', 'key')->toArray());

                    return;
                }
            } catch (\Throwable $e) {
                // Database not yet connected or migrating
            }
            $view->with('siteSettings', []);
        });

        try {
            if (Schema::hasTable('categories')) {
                $headerCategories = Category::withCount('posts')
                    ->orderBy('posts_count', 'desc')
                    ->take(8)
                    ->get();
                View::share('headerCategories', $headerCategories);
            } else {
                View::share('headerCategories', collect());
            }
        } catch (\Throwable $e) {
            View::share('headerCategories', collect());
        }
    }
}
