@extends('layouts.frontend')

@section('title', 'Download E-Book Gratis - DPD PKS Ogan Ilir')
@section('meta_description', 'Kumpulan E-Book materi dakwah Islam, tarbiyah, modul kurikulum, dan buku digital gratis dari PKS Ogan Ilir.')

@section('content')
{{-- HERO HEADER --}}
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <a href="{{ route('download.index') }}" class="hover:text-white transition">Download</a>
            <span>/</span>
            <span class="text-[#fdb913]">E-Book</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">E-Book & Panduan Digital</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">
            Buku saku, pedoman pembinaan, modul tarbiyah, dan literatur pemikiran Islam resmi.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 space-y-12">
    
    {{-- HEADER KONTEN --}}
    <div class="text-center max-w-2xl mx-auto">
        <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider block">DOWNLOAD E-BOOK GRATIS</span>
        <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight mt-1">
            Materi Dakwah Islam
        </h2>
        <p class="text-xs sm:text-sm text-gray-500 mt-1">Silakan unduh dan pelajari materi-materi keislaman dan pembinaan kader untuk memperluas wawasan keilmuan.</p>
        <div class="w-16 h-1 bg-[#f37023] mx-auto rounded-full mt-3"></div>
    </div>

    @php
        $ebooks = [
            [
                'id' => 4,
                'title' => "Ma'rifatullah",
                'cover' => '/uploads/2025/09/Marifatullah.jpg.webp',
                'description' => "Ebook Ma’rifatullah ini berisi 17 materi tarbiyah (pembinaan) yang membahas tentang pengenalan terhadap Allah SWT; mengapa penting bagi manusia untuk mengenal Rabb-nya, bagaimana mengenal-Nya melalui ayat-ayat kauniyah dan qauliyah, serta bagaimana dampak pengenalan tersebut terhadap ketakwaan dan ibadah seorang hamba.",
                'pdf' => route('download.file', 4, false),
                'badge' => 'Tarbiyah Islamiyah'
            ],
            [
                'id' => 5,
                'title' => "Ma'rifatul Qur'an",
                'cover' => '/uploads/2025/09/Marifatul-Quran-320x448.jpg.webp',
                'description' => "Ebook Ma’rifatul Qur’an ini memuat 5 materi tarbiyah (pembinaan) yang membahas secara ringkas pengenalan mendasar terhadap Al-Qur’an. Apa yang dimaksud dengan Al-Qur’an, urgensi berinteraksi dengannya, keutamaannya, serta bagaimana adab membaca, mentadabburi, dan mengamalkannya dalam kehidupan sehari-hari.",
                'pdf' => route('download.file', 5, false),
                'badge' => 'Ulumul Qur\'an'
            ],
            [
                'id' => 6,
                'title' => "Ghazwul Fikri",
                'cover' => '/uploads/2025/09/Ghazwul-Fikri-320x448.jpg.webp',
                'description' => "Ebook Ghazwul Fikri ini memuat 6 materi tarbiyah (pembinaan) yang membahas tentang bagaimana umat Islam di awal abad 19 mengalami invasi pemikiran yang sistematis; strategi penyusupan pemikiran, sarana-sarana yang digunakan, serta langkah strategis membentengi umat dari bahaya perang pemikiran.",
                'pdf' => route('download.file', 6, false),
                'badge' => 'Pemikiran Islam'
            ],
            [
                'id' => 7,
                'title' => "Kurikulum Pembinaan Da'i Muda",
                'cover' => '/uploads/2025/09/Cover-Kurikulum-Pembinaan-Dai-Muda-320x455.jpg.webp',
                'description' => "Ebook Kurikulum Pembinaan Da’i Muda ini berisi kumpulan materi dasar-dasar aqidah, fiqih, dan akhlak Islam yang disusun sebagai kurikulum dalam kegiatan pembinaan dakwah pemuda dan da'i muda.",
                'pdf' => route('download.file', 7, false),
                'badge' => 'Kurikulum Kader'
            ],
            [
                'id' => 8,
                'title' => "Al-Bidayah Wan Nihayah",
                'cover' => '/uploads/2025/09/Screenshot-2025-09-18-171506.webp',
                'description' => "Ebook Al-Bidayah Wan Nihayah Sesungguhnya kitab tarikh karya imam al-Hafizh Ibnu Katsir yang populer dengan julukan al-Bidayah wan Nihayah merupakan rujukan utama sejarah penciptaan langit bumi, kisah para Nabi, hingga akhir zaman.",
                'pdf' => route('download.file', 8, false),
                'badge' => 'Tarikh Islam'
            ],
            [
                'id' => 9,
                'title' => "Adab Olahraga di Tempat Umum",
                'cover' => '/uploads/2025/10/ADAB-OLAHRAGA.webp',
                'description' => "Ebook Adab Olahraga di Tempat Umum menjelaskan bahwa Islam tidak melarang perempuan dan laki-laki tampil berolahraga di tempat umum. Islam juga sangat peduli pada kesehatan jasmani, dengan tetap membimbing adab, pakaian, dan etika sesuai syariat.",
                'pdf' => route('download.file', 9, false),
                'badge' => 'Fiqih Praktis'
            ],
        ];
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($ebooks as $idx => $eb)
            <div class="bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl border border-gray-100 transition transform hover:-translate-y-1.5 flex flex-col justify-between reveal-fade-up delay-{{ $idx % 3 }}">
                <div class="p-6 sm:p-8 space-y-5">
                    {{-- COVER IMAGE --}}
                    <div class="h-64 rounded-2xl overflow-hidden shadow-md bg-gray-100 flex items-center justify-center relative group">
                        <img src="{{ $eb['cover'] }}" alt="{{ $eb['title'] }}" class="h-full w-auto max-w-full object-contain group-hover:scale-105 transition duration-500" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
                        <span class="absolute top-3 left-3 bg-[#f37023] text-white text-[10px] font-bold px-2.5 py-0.5 rounded-full shadow">
                            {{ $eb['badge'] }}
                        </span>
                    </div>

                    {{-- JUDUL & DESKRIPSI --}}
                    <div>
                        <h3 class="text-lg font-extrabold text-gray-900 leading-snug">
                            {{ $eb['title'] }}
                        </h3>
                        <p class="text-xs text-gray-600 mt-2 line-clamp-4 leading-relaxed font-light">
                            {{ $eb['description'] }}
                        </p>
                    </div>
                </div>

                {{-- BUTTON DOWNLOAD --}}
                <div class="p-6 pt-0 border-t border-gray-100 mt-2">
                    <a href="{{ $eb['pdf'] }}" class="w-full bg-[#f37023] hover:bg-[#d85c14] text-white py-3 rounded-xl text-xs font-bold shadow transition flex items-center justify-center space-x-2">
                        <i class="fa-regular fa-circle-down text-base"></i>
                        <span>Download E-Book (PDF)</span>
                    </a>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
