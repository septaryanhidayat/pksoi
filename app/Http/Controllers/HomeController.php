<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\AnggotaDewan;
use App\Models\Bidang;
use App\Models\Pengumuman;
use App\Models\Post;
use App\Models\Testimonial;
use App\Models\Video;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Hero slides data
        $heroSlides = [
            [
                'title' => 'Selamat Datang di Website Resmi DPD PKS Ogan Ilir',
                'subtitle' => 'Bersama Melayani Rakyat dan Membangun Kabupaten Ogan Ilir yang Adil, Sejahtera, dan Bermartabat.',
                'image' => '/uploads/2024/01/cd1787310f135df61a8832283565af3b.webp',
                'btn_text' => 'Sambutan Pimpinan',
                'btn_link' => '/sambutan-ketua-dpd',
            ],
            [
                'title' => 'PKS Berkhidmat untuk Rakyat',
                'subtitle' => 'Konsisten Memperjuangkan Hak-Hak Rakyat, Pendidikan, Pertanian, dan Kesejahteraan Umat.',
                'image' => '/uploads/2025/09/58.webp',
                'btn_text' => 'Profil Kami',
                'btn_link' => '/tentang-kami',
            ],
            [
                'title' => 'Ayo Bergabung Bersama Kami!',
                'subtitle' => 'Jadilah Bagian dari Gerakan Kebaikan dan Perubahan Nyata untuk Bangsa Indonesia.',
                'image' => '/uploads/2025/09/WhatsApp-Image-2025-09-07-at-18.01.10-1.webp',
                'btn_text' => 'Daftar Anggota PKS',
                'btn_link' => 'https://daftar.pks.id',
            ],
        ];

        // Sambutan Ketua DPD page
        $sambutan = Post::where('type', 'page')->where('slug', 'sambutan-ketua-dpd')->first();

        // Latest 6 articles
        $latestPosts = Post::posts()
            ->published()
            ->with(['categories', 'author'])
            ->latest('published_at')
            ->take(6)
            ->get();

        // Latest 4 Agendas
        $agendas = Agenda::where('status', 'publish')
            ->orderBy('event_date', 'desc')
            ->take(4)
            ->get();

        // Latest 4 Announcements
        $announcements = Pengumuman::where('status', 'publish')
            ->latest()
            ->take(4)
            ->get();

        // Videos
        $videos = Video::latest()->take(3)->get();

        // Testimonials
        $testimonials = Testimonial::where('status', 'publish')->get();

        // Dewan
        $dewan = AnggotaDewan::orderBy('order', 'asc')->get();

        // Bidang
        $bidangs = Bidang::orderBy('order', 'asc')->get();

        return view('frontend.home', compact(
            'heroSlides',
            'sambutan',
            'latestPosts',
            'agendas',
            'announcements',
            'videos',
            'testimonials',
            'dewan',
            'bidangs'
        ));
    }
}
