<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\Post;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function index()
    {
        $downloads = Download::orderBy('id', 'asc')->paginate(12);
        return view('frontend.download.index', compact('downloads'));
    }

    public function ebook()
    {
        $page = Post::pages()->where('slug', 'e-book')->first();
        $ebooks = Download::where('category_type', 'E-Book')->orWhere('file_type', 'PDF')->get();
        return view('frontend.download.ebook', compact('page', 'ebooks'));
    }

    public function hymneMars()
    {
        $page = Post::pages()->where('slug', 'hymne-mars-pks')->first();
        $audioFiles = Download::where('file_type', 'MP3')->orWhere('title', 'like', '%Mars%')->orWhere('title', 'like', '%Hymne%')->get();
        return view('frontend.download.hymne-mars', compact('page', 'audioFiles'));
    }

    public function logo()
    {
        $page = Post::pages()->where('slug', 'logo')->first();
        $logoDownloads = Download::where('title', 'like', '%Logo%')->get();
        return view('frontend.download.logo', compact('page', 'logoDownloads'));
    }

    public function downloadFile(int $id)
    {
        $download = Download::findOrFail($id);
        $download->increment('download_count');

        $relativePath = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, trim($download->file_path, '/\\'));
        $fullPath = public_path($relativePath);

        if (file_exists($fullPath)) {
            $mimeType = match (strtolower(pathinfo($fullPath, PATHINFO_EXTENSION))) {
                'pdf' => 'application/pdf',
                'mp3' => 'audio/mpeg',
                'png' => 'image/png',
                'jpg', 'jpeg' => 'image/jpeg',
                'webp' => 'image/webp',
                default => 'application/octet-stream',
            };

            return response()->download($fullPath, basename($fullPath), [
                'Content-Type' => $mimeType,
                'Content-Disposition' => 'attachment; filename="' . basename($fullPath) . '"',
            ]);
        }

        return redirect($download->file_path);
    }
}
