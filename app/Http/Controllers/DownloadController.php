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

    public function downloadFile($id)
    {
        $download = is_numeric($id)
            ? Download::find($id)
            : Download::where('file_path', 'like', '%' . $id . '%')->orWhere('title', 'like', '%' . $id . '%')->first();

        if (! $download) {
            $cleanParam = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, trim((string) $id, '/\\'));
            if (file_exists(public_path($cleanParam))) {
                return response()->download(public_path($cleanParam));
            }
            if (file_exists(public_path('uploads' . DIRECTORY_SEPARATOR . $cleanParam))) {
                return response()->download(public_path('uploads' . DIRECTORY_SEPARATOR . $cleanParam));
            }
            // Search in subdirectories of public/uploads
            $found = glob(public_path('uploads' . DIRECTORY_SEPARATOR . '*' . DIRECTORY_SEPARATOR . '*' . DIRECTORY_SEPARATOR . basename($cleanParam)));
            if (! empty($found) && file_exists($found[0])) {
                return response()->download($found[0]);
            }
            abort(404, 'Berkas unduhan tidak ditemukan.');
        }

        $download->increment('download_count');

        $relativePath = str_replace(['/', '\\'], DIRECTORY_SEPARATOR, trim($download->file_path, '/\\'));
        $fullPath = public_path($relativePath);

        if (! file_exists($fullPath)) {
            if (file_exists(public_path('uploads' . DIRECTORY_SEPARATOR . $relativePath))) {
                $fullPath = public_path('uploads' . DIRECTORY_SEPARATOR . $relativePath);
            } elseif (file_exists(storage_path('app/public/' . $relativePath))) {
                $fullPath = storage_path('app/public/' . $relativePath);
            }
        }

        if (file_exists($fullPath)) {
            $ext = strtolower(pathinfo($fullPath, PATHINFO_EXTENSION));
            $mimeType = match ($ext) {
                'pdf' => 'application/pdf',
                'mp3' => 'audio/mpeg',
                'png' => 'image/png',
                'jpg', 'jpeg' => 'image/jpeg',
                'webp' => 'image/webp',
                'zip' => 'application/zip',
                'doc' => 'application/msword',
                'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                default => 'application/octet-stream',
            };

            return response()->download($fullPath, basename($fullPath), [
                'Content-Type' => $mimeType,
            ]);
        }

        if (filter_var($download->file_path, FILTER_VALIDATE_URL)) {
            return redirect()->away($download->file_path);
        }

        return redirect()->route('download.index')->with('error', 'File dokumen asli tidak ditemukan di server.');
    }
}
