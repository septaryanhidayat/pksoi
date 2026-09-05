<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ActivityLog;
use App\Models\Post;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AdminMediaController extends Controller
{
    public function index()
    {
        $photos = Post::where('type', 'attachment')->orWhere('type', 'gallery')->latest()->paginate(16, ['*'], 'photos_page');
        $videos = Video::latest()->paginate(10, ['*'], 'videos_page');
        return view('admin.media.index', compact('photos', 'videos'));
    }

    public function storePhoto(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'required|image|max:5120',
        ]);

        $file = $request->file('image');
        $filename = time() . '_' . Str::slug($request->input('title')) . '.webp';
        $file->move(public_path('uploads/galeri'), $filename);

        $photo = Post::create([
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')) . '-' . time(),
            'type' => 'gallery',
            'status' => 'publish',
            'featured_image' => '/uploads/galeri/' . $filename,
            'content' => $request->input('description') ?? '',
            'author_id' => Auth::id(),
            'published_at' => now(),
        ]);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name,
            'action' => 'gallery_create',
            'description' => "Menambahkan foto ke Galeri: {$photo->title}",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'status' => 'info',
        ]);

        return back()->with('success', 'Foto berhasil ditambahkan ke Galeri.');
    }

    public function destroyPhoto(Request $request, Post $photo)
    {
        $title = $photo->title;
        $photo->delete();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name,
            'action' => 'gallery_delete',
            'description' => "Menghapus foto dari Galeri: {$title}",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'status' => 'warning',
        ]);

        return back()->with('success', 'Foto berhasil dihapus.');
    }

    public function storeVideo(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'youtube_url' => 'required|url',
            'description' => 'nullable|string',
        ]);

        // Extract YouTube video ID
        preg_match('/(?:youtu\.be\/|youtube\.com\/(?:embed\/|v\/|watch\?v=|watch\?.+&v=))([\w-]{11})/', $validated['youtube_url'], $matches);
        $youtubeId = $matches[1] ?? '';

        $video = Video::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']) . '-' . time(),
            'youtube_url' => $validated['youtube_url'],
            'youtube_id' => $youtubeId,
            'description' => $validated['description'] ?? '',
        ]);

        ActivityLog::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name,
            'action' => 'video_create',
            'description' => "Menambahkan Video YouTube: {$video->title}",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'status' => 'info',
        ]);

        return back()->with('success', 'Video YouTube berhasil ditambahkan.');
    }

    public function destroyVideo(Request $request, Video $video)
    {
        $title = $video->title;
        $video->delete();

        ActivityLog::create([
            'user_id' => Auth::id(),
            'user_name' => Auth::user()->name,
            'action' => 'video_delete',
            'description' => "Menghapus Video YouTube: {$title}",
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'status' => 'warning',
        ]);

        return back()->with('success', 'Video YouTube berhasil dihapus.');
    }
}
