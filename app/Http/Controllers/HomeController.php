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
        // 1. Hero slides data
        $heroSlides = [
            [
                'title' => 'Selamat Datang di Website Resmi',
                'subtitle' => 'DPD PKS Kabupaten Ogan Ilir',
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
                'title' => 'Ayo Bergabung Bersama DPD PKS Ogan Ilir',
                'subtitle' => 'Pelayanan, Pemberdayaan, dan Pembelaan untuk Rakyat.',
                'image' => '/uploads/2025/09/WhatsApp-Image-2025-09-07-at-18.01.10-1.webp',
                'btn_text' => 'Daftar Sekarang',
                'btn_link' => 'https://daftar.pks.id',
            ],
        ];

        // 2. Sambutan Ketua DPD page
        $sambutan = Post::where('type', 'page')->where('slug', 'sambutan-ketua-dpd')->first();

        // 3. Ambil semua post publik untuk fallback
        $allPosts = Post::posts()
            ->published()
            ->with(['categories'])
            ->latest('published_at')
            ->take(30)
            ->get();

        $featuredPost = $allPosts->first();
        $sidePosts = $allPosts->slice(1, 4);

        // 4. Berita Fraksi PKS (Section 3 - 8 posts / 2 baris x 4 kolom)
        $fraksiPosts = Post::posts()
            ->published()
            ->with(['categories'])
            ->where(function ($q) {
                $q->whereHas('categories', fn($c) => $c->whereIn('slug', ['fraksi', 'dprd-oi', 'kedewanan']))
                  ->orWhereHas('tags', fn($t) => $t->whereIn('slug', ['fraksi', 'dprd-oi']));
            })
            ->latest('published_at')
            ->take(8)
            ->get();

        if ($fraksiPosts->count() < 8) {
            $fraksiPosts = $allPosts->slice(5, 8);
        }

        // 5. Berita Nasional (Section 4 Kolom 1 - 6 posts)
        $nasionalPosts = Post::posts()
            ->published()
            ->with(['categories'])
            ->whereHas('categories', fn($c) => $c->where('slug', 'nasional'))
            ->latest('published_at')
            ->take(6)
            ->get();

        if ($nasionalPosts->count() < 4) {
            $nasionalPosts = $allPosts->take(6);
        }

        // 6. Berita Daerah (Section 4 Kolom 2 - 6 posts)
        $daerahPosts = Post::posts()
            ->published()
            ->with(['categories'])
            ->whereHas('categories', fn($c) => $c->whereIn('slug', ['ogan-ilir', 'berita', 'kegiatan']))
            ->latest('published_at')
            ->take(6)
            ->get();

        if ($daerahPosts->count() < 4) {
            $daerahPosts = $allPosts->slice(2, 6);
        }

        // 7. Kabar Senayan (Section 5 - 8 posts / 2 baris x 4 kolom)
        $senayanPosts = Post::posts()
            ->published()
            ->with(['categories'])
            ->where(function ($q) {
                $q->whereHas('categories', fn($c) => $c->whereIn('slug', ['senayan', 'dpr-ri']))
                  ->orWhereHas('tags', fn($t) => $t->whereIn('slug', ['senayan', 'dpr-ri']));
            })
            ->latest('published_at')
            ->take(8)
            ->get();

        if ($senayanPosts->count() < 8) {
            $senayanPosts = $allPosts->slice(8, 8);
        }

        // 8. Anggota Dewan Fraksi PKS (Section 6-9 - 4 dewan)
        $dewan = AnggotaDewan::orderBy('order', 'asc')->take(4)->get();

        // 9. Video Kegiatan (Section 10 - 6 videos / 2 baris x 3 kolom)
        $videos = Video::latest()->take(6)->get();

        // 10. Pengumuman & Agenda (Section 12 - 4 items each)
        $announcements = Pengumuman::where('status', 'publish')->latest()->take(4)->get();
        $agendas = Agenda::where('status', 'publish')->orderBy('event_date', 'desc')->take(4)->get();

        // 11. Galeri Foto Kegiatan (Section 13 - 8 curated photos)
        $galleryPhotos = [
            ['url' => '/uploads/2025/09/307495481_398980005757910_2475236702264106801_n-1.webp', 'title' => 'Rapat Kerja Pengurus DPD PKS Ogan Ilir'],
            ['url' => '/uploads/2025/09/20220907_150002-1140x570-1.webp', 'title' => 'Pelayanan Advokasi dan Temu Konstituen Fraksi PKS'],
            ['url' => '/uploads/2025/09/17.webp', 'title' => 'Silaturahmi Tokoh Masyarakat Kabupaten Ogan Ilir'],
            ['url' => '/uploads/2025/09/48.webp', 'title' => 'Bakti Sosial dan Layanan Kesehatan Gratis PKS'],
            ['url' => '/uploads/2025/09/40.webp', 'title' => 'Konsolidasi Struktur DPC se-Kabupaten Ogan Ilir'],
            ['url' => '/uploads/2025/09/5-scaled.webp', 'title' => 'Kegiatan Kepemudaan dan Olahraga Bersama PKS Muda'],
            ['url' => '/uploads/2025/09/19.webp', 'title' => 'Pemberdayaan UMKM dan Pelatihan Kewirausahaan UPA'],
            ['url' => '/uploads/2025/09/22.webp', 'title' => 'Peringatan Hari Besar Nasional & Keagamaan'],
        ];

        // 12. E-Books (Section 15 - Etalase Cover E-Book Slider)
        $ebookDownloads = \App\Models\Download::where('category_type', 'E-Book')->get();
        $ebookCovers = [
            "Ma'rifatullah" => '/uploads/2025/09/Marifatullah.jpg.webp',
            "Kurikulum" => '/uploads/2025/09/Cover-Kurikulum-Pembinaan-Dai-Muda-320x455.jpg.webp',
            "Ghazwul" => '/uploads/2025/09/Ghazwul-Fikri-320x448.jpg.webp',
            "Qur'an" => '/uploads/2025/09/Marifatul-Quran-320x448.jpg.webp',
            "Olahraga" => '/uploads/2025/10/ADAB-OLAHRAGA.webp',
            "Bidayah" => '/uploads/2025/09/Marifatullah.jpg.webp',
        ];

        if ($ebookDownloads->isNotEmpty()) {
            $ebooks = $ebookDownloads->map(function ($dl) use ($ebookCovers) {
                $cover = '/uploads/2025/09/Marifatullah.jpg.webp';
                foreach ($ebookCovers as $key => $img) {
                    if (stripos($dl->title, $key) !== false) {
                        $cover = $img;
                        break;
                    }
                }
                return [
                    'id' => $dl->id,
                    'title' => $dl->title,
                    'cover' => $cover,
                    'pdf' => route('download.file', $dl->id, false),
                    'direct_file' => $dl->file_path,
                ];
            })->toArray();
        } else {
            $ebooks = [
                [
                    'id' => 4,
                    'title' => "Ma'rifatullah",
                    'cover' => '/uploads/2025/09/Marifatullah.jpg.webp',
                    'pdf' => route('download.file', 4, false),
                ],
                [
                    'id' => 7,
                    'title' => 'Kurikulum Pembinaan Da\'i Muda',
                    'cover' => '/uploads/2025/09/Cover-Kurikulum-Pembinaan-Dai-Muda-320x455.jpg.webp',
                    'pdf' => route('download.file', 7, false),
                ],
                [
                    'id' => 6,
                    'title' => 'Ghazwul Fikri',
                    'cover' => '/uploads/2025/09/Ghazwul-Fikri-320x448.jpg.webp',
                    'pdf' => route('download.file', 6, false),
                ],
                [
                    'id' => 5,
                    'title' => "Ma'rifatul Qur'an",
                    'cover' => '/uploads/2025/09/Marifatul-Quran-320x448.jpg.webp',
                    'pdf' => route('download.file', 5, false),
                ],
                [
                    'id' => 9,
                    'title' => 'Adab Olahraga',
                    'cover' => '/uploads/2025/10/ADAB-OLAHRAGA.webp',
                    'pdf' => route('download.file', 9, false),
                ],
            ];
        }

        // 13. Testimonials (Section 16 - 4 items)
        $testimonials = Testimonial::where('status', 'publish')->take(4)->get();

        // 14. Visitor counter hits diambil dari middleware / global shared
        $visitorHits = view()->shared('visitorHits') ?? '53.512';

        return view('frontend.home', compact(
            'heroSlides',
            'sambutan',
            'featuredPost',
            'sidePosts',
            'fraksiPosts',
            'nasionalPosts',
            'daerahPosts',
            'senayanPosts',
            'dewan',
            'videos',
            'announcements',
            'agendas',
            'galleryPhotos',
            'ebooks',
            'testimonials',
            'visitorHits'
        ));
    }
}
