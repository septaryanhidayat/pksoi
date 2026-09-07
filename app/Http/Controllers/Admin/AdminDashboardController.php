<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Agenda;
use App\Models\AnggotaDewan;
use App\Models\Bidang;
use App\Models\Download;
use App\Models\Dpc;
use App\Models\Feedback;
use App\Models\Pengumuman;
use App\Models\Post;
use App\Models\User;
use App\Models\Video;
use App\Models\VisitorLog;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Schema;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $hasVisitorLogs = false;
        $todayVisitors = 0;
        $todayPageviews = 0;
        $weekVisitors = 0;
        $topTodayPages = collect();
        $topTodayReferrers = collect();
        $topCities = collect();

        try {
            if (Schema::hasTable('visitor_logs')) {
                $hasVisitorLogs = true;
                $todayVisitors = VisitorLog::humans()->today()->distinct('ip_address')->count('ip_address');
                $todayPageviews = VisitorLog::humans()->today()->count();
                $weekVisitors = VisitorLog::humans()->recentDays(7)->distinct('ip_address')->count('ip_address');

                $topTodayPages = VisitorLog::humans()->today()
                    ->select('path')
                    ->selectRaw('MAX(page_title) as title, count(*) as views')
                    ->groupBy('path')
                    ->orderByDesc('views')
                    ->take(4)
                    ->get();

                $topTodayReferrers = VisitorLog::humans()->today()
                    ->select('referer_source')
                    ->selectRaw('count(*) as total')
                    ->groupBy('referer_source')
                    ->orderByDesc('total')
                    ->take(4)
                    ->get();

                $topCities = VisitorLog::humans()->recentDays(7)
                    ->whereNotNull('city')
                    ->select('city', 'region')
                    ->selectRaw('count(*) as total')
                    ->groupBy('city', 'region')
                    ->orderByDesc('total')
                    ->take(4)
                    ->get();
            }
        } catch (\Throwable $e) {
            $hasVisitorLogs = false;
        }

        $stats = [
            'total_posts' => Post::where('type', 'post')->count(),
            'total_views' => Post::where('type', 'post')->sum('views_count'),
            'visitor_hits' => Cache::get('pks_visitor_hits', 53534),
            'today_visitors' => $todayVisitors,
            'today_pageviews' => $todayPageviews,
            'week_visitors' => $weekVisitors,
            'total_dewan' => AnggotaDewan::count(),
            'total_bidang' => Bidang::count(),
            'total_dpc' => Dpc::count(),
            'total_agendas' => Agenda::count(),
            'total_pengumuman' => Pengumuman::count(),
            'total_downloads' => Download::count(),
            'total_users' => User::count(),
            'total_photos' => Post::where('type', 'gallery')->orWhere('type', 'attachment')->count(),
            'total_videos' => Video::count(),
            'total_feedbacks' => Feedback::count(),
            'unread_feedbacks' => Feedback::where('status', 'unread')->count(),
            'security_threats' => ActivityLog::where('status', 'danger')->count(),
            'security_warnings' => ActivityLog::where('status', 'warning')->count(),
        ];

        $recentPosts = Post::where('type', 'post')->latest()->take(6)->get();
        $recentLogs = ActivityLog::latest()->take(8)->get();
        $recentThreats = ActivityLog::where('status', 'danger')->latest()->take(4)->get();

        return view('admin.dashboard', compact(
            'stats',
            'recentPosts',
            'recentLogs',
            'recentThreats',
            'topTodayPages',
            'topTodayReferrers',
            'topCities',
            'hasVisitorLogs'
        ));
    }

    /**
     * Jalankan migrasi database dari dashboard admin (berguna untuk hosting tanpa akses SSH).
     */
    public function runMigration()
    {
        try {
            Artisan::call('migrate', ['--force' => true]);
            $output = Artisan::output();

            return back()->with('success', 'Migrasi database berhasil dijalankan! '.(trim($output) ?: 'Tabel berhasil dibuat.'));
        } catch (\Throwable $e) {
            return back()->with('error', 'Gagal menjalankan migrasi: '.$e->getMessage());
        }
    }
}
