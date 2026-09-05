<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminFeedbackController;
use App\Http\Controllers\Admin\AdminPostController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BidangController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DewanController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

// === AUTHENTICATION ROUTES ===
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// === ADMIN CMS PANEL ROUTES (PROTECTED) ===
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Posts Management
    Route::resource('posts', AdminPostController::class);

    // Feedbacks / Aspirasi Inbox
    Route::get('/feedbacks', [AdminFeedbackController::class, 'index'])->name('feedbacks.index');
    Route::post('/feedbacks/{feedback}/read', [AdminFeedbackController::class, 'markAsRead'])->name('feedbacks.read');
    Route::delete('/feedbacks/{feedback}', [AdminFeedbackController::class, 'destroy'])->name('feedbacks.destroy');

    // Website Settings
    Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings.index');
    Route::post('/settings', [AdminSettingController::class, 'update'])->name('settings.update');
});

// === FRONTEND PUBLIC ROUTES ===

// Beranda (Homepage)
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/beranda', fn() => redirect()->route('home'));

// Berita & Artikel
Route::get('/artikel', [ArticleController::class, 'index'])->name('artikel.index');
Route::get('/artikel/{slug}', [ArticleController::class, 'show'])->name('artikel.show');
Route::get('/kategori/{slug}', [ArticleController::class, 'category'])->name('kategori.show');
Route::get('/tag/{slug}', [ArticleController::class, 'tag'])->name('tag.show');

// Profil Pages
Route::get('/sambutan-ketua-dpd', [PageController::class, 'sambutan'])->name('page.sambutan');
Route::get('/tentang-kami', [PageController::class, 'tentangKami'])->name('page.tentang-kami');
Route::get('/visi-dan-misi', [PageController::class, 'visiMisi'])->name('page.visi-misi');
Route::get('/sejarah', [PageController::class, 'sejarah'])->name('page.sejarah');
Route::get('/struktur-kepengurusan', [PageController::class, 'struktur'])->name('page.struktur');
Route::get('/privacy-policy', [PageController::class, 'privacyPolicy'])->name('page.privacy-policy');

// Anggota Dewan Fraksi PKS
Route::get('/anggota-dewan', [DewanController::class, 'index'])->name('dewan.index');

// Bidang DPD
Route::get('/bidang', [BidangController::class, 'index'])->name('bidang.index');
Route::get('/bidang/{slug}', [BidangController::class, 'show'])->name('bidang.show');

// Informasi (Agenda, Pengumuman, Testimonial, Video, Galeri)
Route::get('/agenda', [InformationController::class, 'agenda'])->name('agenda.index');
Route::get('/agenda/{slug}', [InformationController::class, 'agendaShow'])->name('agenda.show');
Route::get('/pengumuman', [InformationController::class, 'pengumuman'])->name('pengumuman.index');
Route::get('/pengumuman/{slug}', [InformationController::class, 'pengumumanShow'])->name('pengumuman.show');
Route::get('/testimonial', [InformationController::class, 'testimonial'])->name('testimonial.index');
Route::get('/video', [InformationController::class, 'video'])->name('video.index');
Route::get('/galeri', [InformationController::class, 'galeri'])->name('galeri.index');

// Download & Media
Route::get('/download', [DownloadController::class, 'index'])->name('download.index');
Route::get('/e-book', [DownloadController::class, 'ebook'])->name('download.ebook');
Route::get('/hymne-mars-pks', [DownloadController::class, 'hymneMars'])->name('download.hymne-mars');
Route::get('/logo', [DownloadController::class, 'logo'])->name('download.logo');
Route::get('/unduh/{id}', [DownloadController::class, 'downloadFile'])->name('download.file');

// DPC PKS se-Ogan Ilir
Route::get('/dpc', [PageController::class, 'dpc'])->name('dpc.index');
Route::get('/dpc-pks', [PageController::class, 'dpc']);

// Hubungi & Donasi
Route::get('/hubungi', [ContactController::class, 'hubungi'])->name('hubungi');
Route::post('/hubungi', [ContactController::class, 'submitFeedback'])->name('feedback.store');
Route::post('/hubungi-store', [ContactController::class, 'submitFeedback'])->name('hubungi.store');
Route::get('/donasi', [ContactController::class, 'donasi'])->name('donasi');

// Legacy URL Fallback for WordPress images: /wp-content/uploads/{path}
Route::get('/wp-content/uploads/{path}', function (string $path) {
    // Check if webp version exists
    $baseName = pathinfo($path, PATHINFO_DIRNAME) . '/' . pathinfo($path, PATHINFO_FILENAME);
    $webpPath = public_path('uploads/' . trim($baseName, '/') . '.webp');
    if (file_exists($webpPath)) {
        return response()->file($webpPath);
    }
    // Check original
    $originalPath = public_path('uploads/' . $path);
    if (file_exists($originalPath)) {
        return response()->file($originalPath);
    }
    abort(404);
})->where('path', '.*');

// Generic page fallback route
Route::get('/{slug}', [PageController::class, 'show'])->name('page.show');
