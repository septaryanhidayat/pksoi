<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agenda;
use App\Models\AnggotaDewan;
use App\Models\Bidang;
use App\Models\Download;
use App\Models\Feedback;
use App\Models\Pengumuman;
use App\Models\Post;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_posts' => Post::posts()->count(),
            'total_views' => Post::posts()->sum('views_count'),
            'total_agendas' => Agenda::count(),
            'total_pengumuman' => Pengumuman::count(),
            'total_dewan' => AnggotaDewan::count(),
            'total_bidang' => Bidang::count(),
            'total_downloads' => Download::count(),
            'total_feedbacks' => Feedback::count(),
            'unread_feedbacks' => Feedback::where('status', 'unread')->count(),
        ];

        $recentPosts = Post::posts()->latest()->take(5)->get();
        $recentFeedbacks = Feedback::latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'recentPosts', 'recentFeedbacks'));
    }
}
