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
use Illuminate\Support\Facades\Cache;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_posts' => Post::where('type', 'post')->count(),
            'total_views' => Post::where('type', 'post')->sum('views_count'),
            'visitor_hits' => Cache::get('pks_visitor_hits', 53534),
            'today_visitors' => VisitorLog::humans()->today()->distinct('ip_address')->count('ip_address'),
            'today_pageviews' => VisitorLog::humans()->today()->count(),
            'week_visitors' => VisitorLog::humans()->recentDays(7)->distinct('ip_address')->count('ip_address'),
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

        // Data analitik ringkas untuk dashboard utama
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

        return view('admin.dashboard', compact(
            'stats',
            'recentPosts',
            'recentLogs',
            'recentThreats',
            'topTodayPages',
            'topTodayReferrers',
            'topCities'
        ));
    }
}
