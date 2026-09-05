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
use App\Models\Setting;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_posts' => Post::where('type', 'post')->count(),
            'total_views' => Post::where('type', 'post')->sum('views_count'),
            'visitor_hits' => Cache::get('pks_visitor_hits', 53534),
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

        return view('admin.dashboard', compact('stats', 'recentPosts', 'recentLogs', 'recentThreats'));
    }
}
