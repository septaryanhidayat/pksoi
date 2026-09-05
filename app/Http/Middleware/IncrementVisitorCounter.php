<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class IncrementVisitorCounter
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $counterFile = storage_path('app/visitor_hits.txt');

        if (! file_exists($counterFile)) {
            @file_put_contents($counterFile, '53512');
        }

        $hits = (int) @file_get_contents($counterFile);
        if ($hits < 53512) {
            $hits = 53512;
        }

        // Tambah counter setiap kali halaman web dibuka (GET request non-API / non-Asset)
        if ($request->isMethod('GET') && ! $request->is('up', 'api/*', 'livewire/*', 'filament/*')) {
            $hits++;
            @file_put_contents($counterFile, (string) $hits);
        }

        // Format angka dengan titik pemisah ribuan (misal: 53.513)
        View::share('visitorHits', number_format($hits, 0, ',', '.'));

        return $next($request);
    }
}
