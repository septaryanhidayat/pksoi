@extends('layouts.frontend')

@section('title', 'DPD PKS Ogan Ilir - Berkhidmat untuk Rakyat')

@section('content')
{{-- ========================================================
     SECTION #0: HERO SLIDER (Rata Tengah, Ukuran Sesuai Web Lama)
     ======================================================== --}}
<section class="relative bg-gray-950 overflow-hidden" x-data="{
    activeSlide: 0,
    slides: {{ Js::from($heroSlides) }},
    autoSlide() {
        setInterval(() => {
            this.activeSlide = (this.activeSlide + 1) % this.slides.length;
        }, 6500);
    }
}" x-init="autoSlide()">
    {{-- Banner Images & Content --}}
    <div class="relative h-[380px] sm:h-[440px] lg:h-[490px] w-full overflow-hidden">
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="activeSlide === index" 
                 x-transition:enter="transition ease-out duration-700" 
                 x-transition:enter-start="opacity-0 scale-105" 
                 x-transition:enter-end="opacity-100 scale-100" 
                 x-transition:leave="transition ease-in duration-500" 
                 x-transition:leave-start="opacity-100" 
                 x-transition:leave-end="opacity-0" 
                 class="absolute inset-0">
                
                <img :src="slide.image" :alt="slide.title" class="w-full h-full object-cover object-center brightness-60">
                <div class="absolute inset-0 bg-black/55"></div>

                {{-- Konten Rata Tengah Persis Seperti Web Lama --}}
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center text-white space-y-3">
                        <h1 class="text-3xl sm:text-4xl md:text-5xl font-black tracking-tight drop-shadow-lg leading-tight" x-text="slide.title"></h1>
                        <p class="text-sm sm:text-base md:text-lg text-gray-100 font-medium max-w-2xl mx-auto drop-shadow" x-text="slide.subtitle"></p>
                        <div class="pt-3 flex justify-center">
                            <a :href="slide.btn_link" class="inline-flex items-center justify-center bg-[#ff5001] hover:bg-[#e04500] text-white px-8 py-3 rounded-full font-extrabold text-xs sm:text-sm shadow-xl transition transform hover:scale-105">
                                <span x-text="slide.btn_text"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>

    {{-- Carousel Controls (Panah Samping Kiri & Kanan) --}}
    <button @click="activeSlide = (activeSlide - 1 + slides.length) % slides.length" class="absolute left-3 sm:left-6 top-1/2 -translate-y-1/2 bg-black/60 hover:bg-[#ff5001] text-white w-11 h-11 rounded-full flex items-center justify-center transition backdrop-blur z-20 shadow-lg" aria-label="Slide sebelumnya">
        <i class="fa-solid fa-chevron-left text-xs sm:text-sm" aria-hidden="true"></i>
    </button>
    <button @click="activeSlide = (activeSlide + 1) % slides.length" class="absolute right-3 sm:right-6 top-1/2 -translate-y-1/2 bg-black/60 hover:bg-[#ff5001] text-white w-11 h-11 rounded-full flex items-center justify-center transition backdrop-blur z-20 shadow-lg" aria-label="Slide berikutnya">
        <i class="fa-solid fa-chevron-right text-xs sm:text-sm" aria-hidden="true"></i>
    </button>

    {{-- Dots Pagination di Tengah (Min touch target 32px with visual 10px dot) --}}
    <div class="absolute bottom-12 sm:bottom-16 left-1/2 -translate-x-1/2 flex space-x-1 z-20">
        <template x-for="(slide, idx) in slides" :key="idx">
            <button @click="activeSlide = idx" class="w-8 h-8 flex items-center justify-center cursor-pointer" :aria-label="'Pilih slide ' + (idx + 1)">
                <span class="h-2.5 rounded-full transition-all duration-300" :class="activeSlide === idx ? 'w-6 bg-[#ff5001]' : 'w-2.5 bg-white/70 hover:bg-white'"></span>
            </button>
        </template>
    </div>
</section>

{{-- ========================================================
     SECTION: FLOATING QUICK ICONS / MENU UTAMA (Ikon Besar Kombinasi Hitam & Oranye Asli)
     ======================================================== --}}
<div x-data="{ showDownloadModal: false }" class="max-w-6xl mx-auto px-4 sm:px-6 relative z-30 -mt-8 sm:-mt-10 reveal-fade-up">
    <div class="bg-white rounded-3xl shadow-2xl border border-gray-100 p-5 sm:p-7">
        <div class="flex items-center justify-between pb-4 mb-4 border-b border-gray-100">
            <h2 class="text-base sm:text-lg font-black text-gray-900 tracking-tight">
                Menu Utama
            </h2>
            <button @click="showDownloadModal = true" type="button" aria-label="Buka Pilihan Download" class="bg-black hover:bg-gray-900 text-[#ff5001] text-xs font-black px-4 py-2 rounded-full transition shadow flex items-center space-x-1.5 cursor-pointer transform hover:scale-105 min-h-[44px]">
                <span>Download</span>
                <i class="fa-solid fa-download text-[11px]" aria-hidden="true"></i>
            </button>
        </div>

        @php
            $dbQuickMenus = \App\Models\QuickMenu::active()->orderBy('order', 'asc')->get();
            if ($dbQuickMenus->isEmpty()) {
                $quickMenus = collect([
                    (object)['name' => 'Sambutan', 'icon' => '/uploads/2025/09/ICON-Sambupatan.webp', 'url' => route('page.sambutan'), 'is_image' => true],
                    (object)['name' => 'Profil', 'icon' => '/uploads/2025/09/ICON-About.webp', 'url' => route('page.tentang-kami'), 'is_image' => true],
                    (object)['name' => 'Fraksi', 'icon' => '/uploads/2025/09/ICON-Dewan.webp', 'url' => route('dewan.index'), 'is_image' => true],
                    (object)['name' => 'Bidang', 'icon' => '/uploads/2025/09/ICON-Bidang.webp', 'url' => route('bidang.index'), 'is_image' => true],
                    (object)['name' => 'Berita', 'icon' => '/uploads/2025/09/ICON-Berita.webp', 'url' => route('artikel.index'), 'is_image' => true],
                    (object)['name' => 'Pengumuman', 'icon' => '/uploads/2025/09/ICON-Pengumuman.webp', 'url' => route('pengumuman.index'), 'is_image' => true],
                    (object)['name' => 'Video', 'icon' => '/uploads/2025/09/ICON-Video.webp', 'url' => route('video.index'), 'is_image' => true],
                    (object)['name' => 'Agenda', 'icon' => '/uploads/2025/09/ICON-Agenda.webp', 'url' => route('agenda.index'), 'is_image' => true],
                ]);
            } else {
                $quickMenus = $dbQuickMenus;
            }
        @endphp

        {{-- DESKTOP VIEW: 8 Kolom Kartu Berbingkai dengan Ikon Asli Besar --}}
        <div class="hidden md:grid md:grid-cols-8 gap-3 text-center" style="grid-template-columns: repeat(8, minmax(0, 1fr));">
            @foreach($quickMenus as $qm)
            <a href="{{ $qm->url }}" class="group block p-3 rounded-2xl border border-gray-300 hover:border-[#c2410c] hover:shadow-lg transition bg-white transform hover:-translate-y-1" aria-label="Menu {{ $qm->name }}">
                <div class="h-16 flex items-center justify-center mb-1.5">
                    @if($qm->is_image)
                        <img src="{{ $qm->icon }}" alt="Ikon {{ $qm->name }}" class="max-h-full max-w-full object-contain group-hover:scale-108 transition duration-300" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
                    @else
                        <i class="{{ $qm->icon }} text-3xl text-[#c2410c]" aria-hidden="true"></i>
                    @endif
                </div>
                <span class="text-xs font-bold text-[#c2410c] block truncate">{{ $qm->name }}</span>
            </a>
            @endforeach
        </div>

        {{-- MOBILE VIEW: 4 Kolom x 2 Baris Kartu Berbingkai --}}
        <div class="grid md:hidden grid-cols-4 gap-2.5 text-center" style="grid-template-columns: repeat(4, minmax(0, 1fr));">
            @foreach($quickMenus as $qm)
            <a href="{{ $qm->url }}" class="p-2.5 rounded-2xl border border-gray-300 hover:border-[#c2410c] hover:shadow-md transition bg-white" aria-label="Menu {{ $qm->name }}">
                <div class="h-12 flex items-center justify-center mb-1">
                    @if($qm->is_image)
                        <img src="{{ $qm->icon }}" alt="Ikon {{ $qm->name }}" class="max-h-full max-w-full object-contain" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
                    @else
                        <i class="{{ $qm->icon }} text-2xl text-[#c2410c]" aria-hidden="true"></i>
                    @endif
                </div>
                <span class="text-[11px] font-bold text-[#c2410c] block truncate">{{ $qm->name }}</span>
            </a>
            @endforeach
        </div>
    </div>

    {{-- POPUP MODAL DOWNLOAD (PERSIS SCREENSHOT REFERENSI WEB LAMA) --}}
    <div x-show="showDownloadModal" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         @keydown.escape.window="showDownloadModal = false"
         class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black/70 backdrop-blur-xs"
         style="display: none;">
         
        {{-- Backdrop click to close --}}
        <div class="fixed inset-0" @click="showDownloadModal = false"></div>

        {{-- Modal Box Container --}}
        <div x-show="showDownloadModal"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95"
             x-transition:enter-end="opacity-100 scale-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100 scale-100"
             x-transition:leave-end="opacity-0 scale-95"
             class="relative bg-white rounded-3xl shadow-2xl max-w-2xl w-full p-6 sm:p-8 border border-gray-100 z-10">

            {{-- Tombol Close X Hitam di Pojok Kanan Atas (Persis Screenshot) --}}
            <button @click="showDownloadModal = false" type="button" class="absolute top-4 right-4 sm:top-5 sm:right-5 w-9 h-9 rounded-lg bg-black text-white hover:bg-gray-800 transition flex items-center justify-center shadow-md cursor-pointer" aria-label="Tutup Pilihan Download">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>

            {{-- Judul DOWNLOAD & Garis Bawah --}}
            <div class="text-center mb-6 sm:mb-8">
                <h3 class="text-2xl sm:text-3xl font-black text-[#1e1e1e] tracking-wider uppercase">
                    DOWNLOAD
                </h3>
                <div class="w-24 sm:w-28 h-0.5 bg-black mx-auto mt-2"></div>
            </div>

            {{-- 3 Kartu Berbingkai Oranye (MARS, E-BOOK, LOGO) Sesuai Screenshot --}}
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 sm:gap-5">
                {{-- Kartu 1: MARS --}}
                <a href="{{ route('download.hymne-mars') }}" class="group block bg-white rounded-3xl border-2 border-[#ff5001] p-5 text-center hover:shadow-xl hover:scale-103 transition duration-200 flex flex-col items-center justify-between" aria-label="Download Mars dan Hymne PKS">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 bg-[#1e1e1e] rounded-2xl flex items-center justify-center p-3 mb-4 shadow-md group-hover:scale-105 transition">
                        <img src="/uploads/2023/08/Icon-Vote.webp" alt="Mars dan Hymne PKS" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h4 class="text-base sm:text-lg font-black text-[#c2410c] tracking-wide uppercase">MARS</h4>
                        <p class="text-[11px] text-gray-700 font-medium leading-snug mt-1.5">
                            Download Mars & Hymne Partai Keadilan Sejahtera
                        </p>
                    </div>
                </a>

                {{-- Kartu 2: E-BOOK --}}
                <a href="{{ route('download.ebook') }}" class="group block bg-white rounded-3xl border-2 border-[#ff5001] p-5 text-center hover:shadow-xl hover:scale-103 transition duration-200 flex flex-col items-center justify-between" aria-label="Download E-Book Materi Dakwah PKS">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 bg-[#1e1e1e] rounded-2xl flex items-center justify-center p-3 mb-4 shadow-md group-hover:scale-105 transition">
                        <img src="/uploads/2023/08/Icon-Adm.webp" alt="E-Book PKS" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h4 class="text-base sm:text-lg font-black text-[#c2410c] tracking-wide uppercase">E-BOOK</h4>
                        <p class="text-[11px] text-gray-700 font-medium leading-snug mt-1.5">
                            Download E-Book Materi Dakwah Gratis
                        </p>
                    </div>
                </a>

                {{-- Kartu 3: LOGO --}}
                <a href="{{ route('download.logo') }}" class="group block bg-white rounded-3xl border-2 border-[#ff5001] p-5 text-center hover:shadow-xl hover:scale-103 transition duration-200 flex flex-col items-center justify-between" aria-label="Download Logo Resmi PKS">
                    <div class="w-20 h-20 sm:w-24 sm:h-24 bg-[#1e1e1e] rounded-2xl flex items-center justify-center p-3 mb-4 shadow-md group-hover:scale-105 transition">
                        <img src="/uploads/2023/08/Icon-UMKM.webp" alt="Logo Resmi PKS" class="w-full h-full object-contain">
                    </div>
                    <div>
                        <h4 class="text-base sm:text-lg font-black text-[#c2410c] tracking-wide uppercase">LOGO</h4>
                        <p class="text-[11px] text-gray-700 font-medium leading-snug mt-1.5">
                            Download Logo Resmi Partai Keadilan Sejahtera
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

{{-- ========================================================
     SECTION #1: SAMBUTAN KETUA DPD (Foto Besar & Teks Rata Tengah Persis Web Lama)
     ======================================================== --}}
<section class="py-14 sm:py-20 bg-white overflow-hidden">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-14 items-center">
            
            {{-- Foto Ketua DPD (Besar Dominan di Kiri Sesuai Referensi Web Lama) --}}
            <div class="lg:col-span-6 reveal-fade-up delay-1">
                <div class="max-w-md sm:max-w-lg mx-auto">
                    <div class="rounded-3xl overflow-hidden shadow-2xl border border-gray-100 bg-gradient-to-b from-orange-50 to-orange-100">
                        <img src="/uploads/2025/09/DPD-Profile-2.webp" alt="Foto H. Husnul Anam, S.HI - Ketua DPD PKS Ogan Ilir" class="w-full h-auto object-cover transform hover:scale-102 transition duration-500" onerror="this.src='/uploads/2024/01/cd1787310f135df61a8832283565af3b.webp'">
                    </div>
                    <p class="font-extrabold text-gray-900 text-lg sm:text-xl text-center mt-3.5 tracking-tight">
                        H. Husnul Anam, S.HI
                    </p>
                </div>
            </div>

            {{-- Isi Sambutan (Semuanya Rata Tengah Sesuai Referensi Web Lama) --}}
            <div class="lg:col-span-6 space-y-4 reveal-fade-up delay-2 text-center">
                {{-- Ikon Kutipan Ganda Abu-Abu di Tengah --}}
                <div class="text-4xl sm:text-5xl text-gray-300 flex justify-center leading-none mb-1" aria-hidden="true">
                    <i class="fa-solid fa-quote-left"></i>
                </div>
                
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight text-center">
                    Sambutan Ketua DPD
                </h2>

                {{-- Kalimat Sambutan Dipotong Pendek Seperti Web Lama --}}
                <p class="text-xs sm:text-sm text-gray-700 leading-relaxed max-w-lg mx-auto font-normal text-center">
                    Assalamu'alaikum Warahmatullahi Wabarakatuh. Alhamdulillah, kami bersyukur kepada Allah SWT atas segala rahmat dan karunia-Nya, sehingga kami dapat hadirkan platform ini sebagai jembatan komunikasi antara Partai Keadilan Sejahtera dengan masyarakat Kabupaten Ogan Ilir ya...
                </p>

                {{-- Garis Pemisah Hitam Tipis di Tengah --}}
                <div class="w-24 h-[1.5px] bg-gray-700 mx-auto my-5"></div>

                {{-- Tombol Berjejer di Tengah (Sambutan Oranye & Visi Misi Hitam) --}}
                <div class="flex items-center justify-center space-x-3.5 pt-2">
                    <a href="{{ route('page.sambutan') }}" class="bg-[#ff5001] hover:bg-[#d84400] text-white px-6 py-2.5 rounded-full font-bold text-xs sm:text-sm shadow-md hover:shadow-lg transition flex items-center space-x-2">
                        <i class="fa-solid fa-graduation-cap"></i>
                        <span>Sambutan</span>
                    </a>
                    <a href="{{ route('page.visi-misi') }}" class="bg-black hover:bg-gray-900 text-white px-6 py-2.5 rounded-full font-bold text-xs sm:text-sm shadow-md hover:shadow-lg transition flex items-center space-x-2">
                        <span>Visi Misi</span>
                        <i class="fa-regular fa-circle-dot"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ========================================================
     SECTION #2: ARTIKEL & BERITA (Headline Utama + 3 Samping)
     ======================================================== --}}
<section class="py-12 bg-gray-50 border-t border-gray-100 overflow-hidden">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="mb-6 flex flex-col sm:flex-row items-center justify-between text-center sm:text-left gap-3 reveal-fade-up">
            <div>
                <h2 class="text-xl sm:text-2xl font-extrabold text-[#353434] flex items-center justify-center sm:justify-start">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#c2410c] mr-2" aria-hidden="true"></span>
                    Artikel & Berita
                </h2>
                <div class="w-12 h-0.5 bg-[#c2410c] mt-1 mx-auto sm:mx-0"></div>
            </div>
            <a href="{{ route('artikel.index') }}" aria-label="Lihat Semua Artikel dan Berita" class="text-xs sm:text-sm font-semibold text-[#c2410c] hover:underline flex items-center">
                Lihat Semua <i class="fa-solid fa-arrow-right ml-1.5 text-xs" aria-hidden="true"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            
            {{-- Big Headline Card (60% Desktop) --}}
            @if($featuredPost)
            <div class="lg:col-span-7 reveal-fade-up delay-1">
                <article class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 h-full flex flex-col group">
                    <div class="relative h-60 sm:h-80 overflow-hidden bg-gray-100">
                        <img src="{{ $featuredPost->featured_image_url }}" alt="{{ $featuredPost->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        @if($featuredPost->categories->isNotEmpty())
                        <span class="absolute top-3 left-3 bg-[#c2410c] text-white text-[11px] font-bold px-3 py-1 rounded-full shadow">
                            {{ $featuredPost->categories->first()->name }}
                        </span>
                        @endif
                    </div>
                    <div class="p-5 sm:p-6 flex-1 flex flex-col justify-between">
                        <div class="space-y-2">
                            <div class="text-xs text-gray-600 flex items-center space-x-3">
                                <span><i class="fa-regular fa-calendar-check mr-1 text-[#c2410c]" aria-hidden="true"></i> {{ $featuredPost->published_at ? $featuredPost->published_at->translatedFormat('d F Y') : '-' }}</span>
                                <span><i class="fa-regular fa-eye mr-1 text-[#c2410c]" aria-hidden="true"></i> {{ $featuredPost->views_count }} views</span>
                            </div>
                            <h3 class="text-lg sm:text-xl font-bold text-gray-900 group-hover:text-[#c2410c] transition line-clamp-2">
                                <a href="{{ route('artikel.show', $featuredPost->slug) }}">
                                    {{ $featuredPost->title }}
                                </a>
                            </h3>
                            <p class="text-xs sm:text-sm text-gray-700 line-clamp-3 leading-relaxed">
                                {{ $featuredPost->excerpt }}
                            </p>
                        </div>
                        <div class="pt-4 mt-4 border-t border-gray-100 flex justify-end">
                            <a href="{{ route('artikel.show', $featuredPost->slug) }}" aria-label="Baca selengkapnya tentang {{ $featuredPost->title }}" class="text-xs font-bold text-[#c2410c] hover:text-[#9a3412] flex items-center">
                                Selengkapnya <i class="fa-solid fa-angle-right ml-1" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </article>
            </div>
            @endif

            {{-- 4 Articles Side Stack (40% Desktop - Rapi & Sejajar Tanpa Ruang Kosong) --}}
            <div class="lg:col-span-5 flex flex-col justify-between space-y-3 reveal-fade-up delay-2">
                <div class="space-y-2.5 flex-1 flex flex-col justify-between">
                    @foreach($sidePosts as $post)
                    <article class="bg-white p-3 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition flex items-center space-x-3 group">
                        <div class="w-20 h-20 sm:w-24 sm:h-20 flex-shrink-0 rounded-lg overflow-hidden bg-gray-100">
                            <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="text-[11px] text-gray-600 mb-1 flex items-center space-x-2">
                                @if($post->categories->isNotEmpty())
                                <span class="text-[#c2410c] font-semibold">{{ $post->categories->first()->name }}</span>
                                <span aria-hidden="true">•</span>
                                @endif
                                <span>{{ $post->published_at ? $post->published_at->translatedFormat('d M Y') : '' }}</span>
                            </div>
                            <h3 class="text-xs sm:text-sm font-bold text-gray-900 group-hover:text-[#c2410c] transition line-clamp-2 leading-snug">
                                <a href="{{ route('artikel.show', $post->slug) }}">
                                    {{ $post->title }}
                                </a>
                            </h3>
                        </div>
                    </article>
                    @endforeach
                </div>

                <a href="{{ route('artikel.index') }}" aria-label="Lihat Semua Berita dan Artikel" class="w-full text-center bg-[#c2410c] hover:bg-[#9a3412] text-white text-xs font-bold py-3 rounded-xl transition shadow-sm block mt-2">
                    Lihat Semua Berita <i class="fa-solid fa-arrow-right ml-1" aria-hidden="true"></i>
                </a>
            </div>

        </div>
    </div>
</section>


{{-- ========================================================
     SECTION #3: BERITA FRAKSI PKS (Desktop 4 Col x 2 Row = 8 Posts)
     ======================================================== --}}
<section class="py-12 bg-white overflow-hidden">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="text-center max-w-2xl mx-auto mb-8 reveal-fade-up">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#c2410c] tracking-tight">
                Berita Fraksi PKS
            </h2>
            <p class="text-xs sm:text-sm text-gray-700 mt-1 font-medium">
                Kabar dan Aktivitas terbaru Anggota DPRD Kabupaten Ogan Ilir Fraksi PKS
            </p>
            <div class="w-16 h-0.5 bg-black mx-auto mt-2.5 rounded-full"></div>
        </div>

        {{-- 2 Baris: Desktop 4 kolom, Mobile 1 kolom --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($fraksiPosts as $index => $post)
            <article class="flex flex-col group reveal-fade-up delay-{{ ($index % 4) + 1 }}">
                <div class="aspect-[16/10] overflow-hidden rounded-2xl bg-gray-100 shadow-sm relative">
                    <a href="{{ route('artikel.show', $post->slug) }}" class="block w-full h-full" aria-label="Baca berita: {{ $post->title }}">
                        <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    </a>
                </div>
                <div class="pt-3 flex-1 flex flex-col justify-between">
                    <h3 class="font-extrabold text-xs sm:text-sm text-gray-900 group-hover:text-[#c2410c] transition line-clamp-2 leading-snug">
                        <a href="{{ route('artikel.show', $post->slug) }}">
                            {{ $post->title }}
                        </a>
                    </h3>
                    <div class="text-[11px] sm:text-xs text-[#c2410c] mt-1.5 font-medium">
                        {{ $post->published_at ? $post->published_at->translatedFormat('j F Y') : '' }}
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <div class="text-center mt-8 reveal-fade-up">
            <a href="{{ route('artikel.index') }}?kategori=fraksi" aria-label="Lihat Lebih Banyak Berita Fraksi PKS" class="inline-flex items-center bg-[#c2410c] hover:bg-[#9a3412] text-white font-bold text-xs sm:text-sm px-7 py-2.5 rounded-full shadow transition">
                Lebih Banyak <i class="fa-solid fa-chevron-down ml-2 text-xs" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</section>


{{-- ========================================================
     SECTION #4: NASIONAL & DAERAH (Desktop 2-Col Side-by-Side vs Mobile Sequential)
     ======================================================== --}}
<section class="py-12 bg-gray-50 border-y border-gray-100 overflow-hidden">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            {{-- KOLOM 1: NASIONAL --}}
            <div class="bg-white p-5 sm:p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between reveal-fade-up delay-1">
                <div>
                    <div class="flex items-center justify-between pb-3 mb-4 border-b border-gray-100">
                        <h2 class="text-lg font-extrabold text-[#353434] flex items-center">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#c2410c] mr-2" aria-hidden="true"></span>
                            Nasional
                        </h2>
                        <span class="text-xs text-gray-600 font-medium">Kabar Nusantara</span>
                    </div>

                    <div class="space-y-3">
                        @foreach($nasionalPosts as $post)
                        <article class="flex items-center space-x-3 group pb-3 border-b border-gray-50 last:border-0 last:pb-0">
                            <div class="w-16 h-16 sm:w-20 sm:h-16 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0">
                                <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-[11px] text-gray-600 mb-1">
                                    {{ $post->published_at ? $post->published_at->translatedFormat('d F Y') : '' }}
                                </div>
                                <h3 class="text-xs sm:text-sm font-bold text-gray-900 group-hover:text-[#c2410c] transition line-clamp-2 leading-snug">
                                    <a href="{{ route('artikel.show', $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h3>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>

                <div class="pt-5 mt-4">
                    <a href="{{ route('artikel.index') }}?kategori=nasional" aria-label="Lihat Semua Berita Nasional" class="block w-full text-center bg-[#c2410c] hover:bg-[#9a3412] text-white font-bold text-xs py-2.5 rounded-xl shadow-sm transition">
                        Lihat Semua Berita Nasional <i class="fa-solid fa-arrow-right ml-1" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

            {{-- KOLOM 2: DAERAH --}}
            <div class="bg-white p-5 sm:p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between reveal-fade-up delay-2">
                <div>
                    <div class="flex items-center justify-between pb-3 mb-4 border-b border-gray-100">
                        <h2 class="text-lg font-extrabold text-[#353434] flex items-center">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#c2410c] mr-2" aria-hidden="true"></span>
                            Daerah
                        </h2>
                        <span class="text-xs text-gray-600 font-medium">Kabar Ogan Ilir</span>
                    </div>

                    <div class="space-y-3">
                        @foreach($daerahPosts as $post)
                        <article class="flex items-center space-x-3 group pb-3 border-b border-gray-50 last:border-0 last:pb-0">
                            <div class="w-16 h-16 sm:w-20 sm:h-16 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0">
                                <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-[11px] text-gray-600 mb-1">
                                    {{ $post->published_at ? $post->published_at->translatedFormat('d F Y') : '' }}
                                </div>
                                <h3 class="text-xs sm:text-sm font-bold text-gray-900 group-hover:text-[#c2410c] transition line-clamp-2 leading-snug">
                                    <a href="{{ route('artikel.show', $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h3>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>

                <div class="pt-5 mt-4">
                    <a href="{{ route('artikel.index') }}?kategori=ogan-ilir" aria-label="Lihat Semua Berita Daerah Ogan Ilir" class="block w-full text-center bg-[#c2410c] hover:bg-[#9a3412] text-white font-bold text-xs py-2.5 rounded-xl shadow-sm transition">
                        Lihat Semua Berita Daerah <i class="fa-solid fa-arrow-right ml-1" aria-hidden="true"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ========================================================
     SECTION #5: KABAR SENAYAN (DPR RI Fraksi PKS - 4 Col x 2 Row = 8 Posts)
     ======================================================== --}}
<section class="py-12 bg-white overflow-hidden">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="text-center max-w-2xl mx-auto mb-8 reveal-fade-up">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#c2410c] tracking-tight">
                Kabar Senayan
            </h2>
            <p class="text-xs sm:text-sm text-gray-700 mt-1 font-medium">
                Kabar dan Aktivitas terbaru Anggota DPR RI Fraksi PKS
            </p>
            <div class="w-16 h-0.5 bg-black mx-auto mt-2.5 rounded-full"></div>
        </div>

        {{-- 2 Baris: Desktop 4 col, Mobile 1 col --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($senayanPosts as $index => $post)
            <article class="flex flex-col group reveal-fade-up delay-{{ ($index % 4) + 1 }}">
                <div class="aspect-[16/10] overflow-hidden rounded-2xl bg-gray-100 shadow-sm relative">
                    <a href="{{ route('artikel.show', $post->slug) }}" class="block w-full h-full" aria-label="Baca berita Senayan: {{ $post->title }}">
                        <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    </a>
                </div>
                <div class="pt-3 flex-1 flex flex-col justify-between">
                    <h3 class="font-extrabold text-xs sm:text-sm text-gray-900 group-hover:text-[#c2410c] transition line-clamp-2 leading-snug">
                        <a href="{{ route('artikel.show', $post->slug) }}">
                            {{ $post->title }}
                        </a>
                    </h3>
                    <div class="text-[11px] sm:text-xs text-[#c2410c] mt-1.5 font-medium">
                        {{ $post->published_at ? $post->published_at->translatedFormat('j F Y') : '' }}
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <div class="text-center mt-8 reveal-fade-up">
            <a href="{{ route('artikel.index') }}?kategori=senayan" aria-label="Lihat Lebih Banyak Berita Senayan" class="inline-flex items-center bg-[#c2410c] hover:bg-[#9a3412] text-white font-bold text-xs sm:text-sm px-7 py-2.5 rounded-full shadow transition">
                Lebih Banyak <i class="fa-solid fa-chevron-down ml-2 text-xs" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</section>


{{-- ========================================================
     SECTION #6 - 9: ANGGOTA DPRD FRAKSI PKS
     DESKTOP: 4 Kolom 1 Baris (Section #8)
     MOBILE: 2 Kolom x 2 Baris / 2x2 Grid (Section #7)
     ======================================================== --}}
<section class="py-12 bg-gray-50 border-t border-gray-100 overflow-hidden">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="text-center max-w-2xl mx-auto mb-8 reveal-fade-up">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#353434] tracking-tight">
                Anggota DPRD Fraksi PKS
            </h2>
            <p class="text-xs sm:text-sm text-gray-600 mt-1">
                Kabar dan Aktivitas terbaru Anggota Legislatif PKS Ogan Ilir
            </p>
            <div class="w-16 h-1 bg-[#c2410c] mx-auto mt-2 rounded-full"></div>
        </div>

        {{-- DESKTOP VIEW (Section #8: 4 Kolom 1 Baris) --}}
        <div class="hidden md:grid md:grid-cols-4 gap-6">
            @foreach($dewan as $index => $d)
            <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100 text-center group hover:shadow-lg transition transform hover:-translate-y-1 reveal-fade-up delay-{{ $index + 1 }}">
                <div class="h-64 rounded-xl overflow-hidden mb-3 bg-gray-100">
                    <img src="{{ $d->photo_url }}" alt="Foto {{ $d->name }} - {{ $d->position }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-300" onerror="this.src='/uploads/2024/01/cd1787310f135df61a8832283565af3b.webp'">
                </div>
                <h3 class="font-extrabold text-sm text-gray-900 group-hover:text-[#c2410c] transition">
                    {{ $d->name }}
                </h3>
                <p class="text-xs text-gray-600 mt-0.5 font-medium">
                    {{ $d->position }}
                </p>
            </div>
            @endforeach
        </div>

        {{-- MOBILE VIEW (Section #7: 2 Kolom x 2 Baris / 2x2 Grid) --}}
        <div class="grid md:hidden grid-cols-2 gap-3.5">
            @foreach($dewan as $index => $d)
            <div class="bg-white rounded-xl p-2.5 shadow-sm border border-gray-100 text-center reveal-fade-up delay-{{ $index + 1 }}">
                <div class="h-44 rounded-lg overflow-hidden mb-2 bg-gray-100">
                    <img src="{{ $d->photo_url }}" alt="Foto {{ $d->name }} - {{ $d->position }}" class="w-full h-full object-cover object-top" onerror="this.src='/uploads/2024/01/cd1787310f135df61a8832283565af3b.webp'">
                </div>
                <h3 class="font-extrabold text-xs text-gray-900 leading-tight">
                    {{ $d->name }}
                </h3>
                <p class="text-[10px] text-gray-600 mt-0.5">
                    {{ $d->position }}
                </p>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-8 reveal-fade-up">
            <a href="{{ route('dewan.index') }}" aria-label="Lihat Semua Anggota Dewan Fraksi PKS" class="inline-flex items-center bg-[#c2410c] hover:bg-[#9a3412] text-white font-bold text-xs sm:text-sm px-6 py-2.5 rounded-full shadow transition">
                Lihat Semua Anggota Dewan <i class="fa-solid fa-arrow-right ml-2 text-xs" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</section>


{{-- ========================================================
     SECTION #10: VIDEO KEGIATAN (Desktop 3 Col x 2 Row = 6 Videos)
     ======================================================== --}}
<section class="py-14 bg-gray-900 text-white overflow-hidden relative">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 relative z-10">
        <div class="text-center max-w-2xl mx-auto mb-10 reveal-fade-up">
            <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-white">
                Video
            </h2>
            <p class="text-xs sm:text-sm text-[#FE6000] mt-1 font-semibold">
                Video DPD PKS Ogan Ilir
            </p>
            <div class="w-16 h-0.5 bg-gray-400 mx-auto mt-2.5 rounded-full"></div>
        </div>

        {{-- 2 Baris: 3 kolom x 2 baris = 6 Video --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($videos as $index => $v)
            <div class="bg-black rounded-2xl overflow-hidden shadow-lg border border-gray-800 flex flex-col justify-between group reveal-fade-up delay-{{ ($index % 3) + 1 }}">
                <button type="button" class="w-full text-left relative aspect-video bg-gray-950 overflow-hidden cursor-pointer group/vid block focus:outline-none" onclick="playHomeVideo(this, '{{ $v->youtube_id }}', '{{ addslashes($v->title) }}')" aria-label="Putar video: {{ $v->title }}">
                    <img src="{{ $v->thumbnail_url }}" 
                         alt="Thumbnail video: {{ $v->title }}" 
                         class="w-full h-full object-cover transition-transform duration-500 group-hover/vid:scale-105"
                         loading="lazy"
                         onerror="this.src='https://img.youtube.com/vi/{{ $v->youtube_id }}/hqdefault.jpg'">
                    <div class="absolute inset-0 bg-black/30 group-hover/vid:bg-black/10 transition flex items-center justify-center" aria-hidden="true">
                        <div class="w-14 h-14 rounded-full bg-red-600/90 text-white flex items-center justify-center shadow-xl group-hover/vid:scale-110 group-hover/vid:bg-red-600 transition-all">
                            <i class="fa-solid fa-play text-xl ml-1"></i>
                        </div>
                    </div>
                </button>
                <div class="bg-white py-3.5 px-4 rounded-b-2xl text-center">
                    <h3 class="font-bold text-xs sm:text-sm text-gray-900 truncate group-hover:text-[#c2410c] transition" title="{{ $v->title }}">
                        {{ $v->title }}
                    </h3>
                </div>
            </div>
            @endforeach
        </div>

        <script>
        function playHomeVideo(el, id, title) {
            if (!id) return;
            el.onclick = null;
            el.innerHTML = '<iframe class="w-full h-full absolute inset-0" src="https://www.youtube.com/embed/' + encodeURIComponent(id) + '?autoplay=1&rel=0" title="' + (title || 'YouTube video') + '" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
        }
        </script>

        <div class="text-center mt-10 reveal-fade-up">
            <a href="{{ route('video.index') }}" aria-label="Lihat Video DPD PKS Lainnya" class="inline-flex items-center bg-[#c2410c] hover:bg-[#9a3412] text-white font-bold text-xs sm:text-sm px-7 py-2.5 rounded-full shadow-lg transition">
                Video Lainnya <i class="fa-solid fa-play ml-2 text-[10px]" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</section>


{{-- ========================================================
     SECTION #12: PENGUMUMAN & AGENDA (Desktop 2-Col vs Mobile Sequential)
     ======================================================== --}}
<section class="py-12 bg-white overflow-hidden">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            {{-- PENGUMUMAN --}}
            <div class="bg-gray-50 p-5 sm:p-6 rounded-2xl border border-gray-100 flex flex-col justify-between reveal-fade-up delay-1">
                <div>
                    <div class="flex items-center justify-between pb-3 mb-4 border-b border-gray-200">
                        <h2 class="text-lg font-extrabold text-[#353434] flex items-center">
                            <i class="fa-solid fa-bullhorn text-[#c2410c] mr-2" aria-hidden="true"></i>
                            Pengumuman
                        </h2>
                        <a href="{{ route('pengumuman.index') }}" aria-label="Lihat Semua Pengumuman" class="text-xs font-semibold text-[#c2410c] hover:underline">
                            Lihat Semua
                        </a>
                    </div>

                    <div class="space-y-3">
                        @foreach($announcements as $ann)
                        <article class="bg-white p-3.5 rounded-xl border border-gray-100 shadow-sm hover:border-orange-200 transition">
                            <div class="text-[11px] text-gray-600 mb-1 flex items-center">
                                <i class="fa-regular fa-clock mr-1 text-[#c2410c]" aria-hidden="true"></i>
                                {{ $ann->created_at ? $ann->created_at->translatedFormat('d F Y') : '' }}
                            </div>
                            <h3 class="font-bold text-xs sm:text-sm text-gray-900 hover:text-[#c2410c] transition">
                                <a href="{{ route('pengumuman.show', $ann->slug) }}">
                                    {{ $ann->title }}
                                </a>
                            </h3>
                        </article>
                        @endforeach
                    </div>
                </div>

                <div class="pt-4 mt-4">
                    <a href="{{ route('pengumuman.index') }}" aria-label="Lihat Semua Pengumuman DPD PKS" class="block w-full text-center bg-[#c2410c] hover:bg-[#9a3412] text-white font-bold text-xs py-2.5 rounded-xl shadow-sm transition">
                        Lihat Semua Pengumuman
                    </a>
                </div>
            </div>

            {{-- AGENDA --}}
            <div class="bg-gray-50 p-5 sm:p-6 rounded-2xl border border-gray-100 flex flex-col justify-between reveal-fade-up delay-2">
                <div>
                    <div class="flex items-center justify-between pb-3 mb-4 border-b border-gray-200">
                        <h2 class="text-lg font-extrabold text-[#353434] flex items-center">
                            <i class="fa-solid fa-calendar-days text-[#c2410c] mr-2" aria-hidden="true"></i>
                            Agenda
                        </h2>
                        <a href="{{ route('agenda.index') }}" aria-label="Lihat Semua Agenda Kegiatan" class="text-xs font-semibold text-[#c2410c] hover:underline">
                            Lihat Semua
                        </a>
                    </div>

                    <div class="space-y-3">
                        @foreach($agendas as $agenda)
                        <article class="bg-white p-3.5 rounded-xl border border-gray-100 shadow-sm hover:border-orange-200 transition flex items-center space-x-3.5">
                            {{-- Tanggal Oranye Besar di Kiri --}}
                            <div class="w-14 h-14 rounded-xl bg-[#c2410c] text-white flex flex-col items-center justify-center flex-shrink-0 shadow">
                                <span class="text-base font-extrabold leading-none">
                                    {{ $agenda->event_date ? $agenda->event_date->format('d') : date('d') }}
                                </span>
                                <span class="text-[10px] font-bold uppercase tracking-wider mt-0.5">
                                    {{ $agenda->event_date ? $agenda->event_date->translatedFormat('M') : date('M') }}
                                </span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h3 class="font-bold text-xs sm:text-sm text-gray-900 hover:text-[#c2410c] transition line-clamp-1">
                                    <a href="{{ route('agenda.show', $agenda->slug) }}">
                                        {{ $agenda->title }}
                                    </a>
                                </h3>
                                <div class="text-[11px] text-gray-600 mt-1 flex items-center space-x-2 truncate">
                                    @if($agenda->location)
                                    <span><i class="fa-solid fa-location-dot mr-1 text-gray-500" aria-hidden="true"></i> {{ $agenda->location }}</span>
                                    @endif
                                </div>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>

                <div class="pt-4 mt-4">
                    <a href="{{ route('agenda.index') }}" aria-label="Lihat Semua Agenda Kegiatan DPD PKS" class="block w-full text-center bg-[#c2410c] hover:bg-[#9a3412] text-white font-bold text-xs py-2.5 rounded-xl shadow-sm transition">
                        Lihat Semua Agenda
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

{{-- ========================================================
     SECTION #13: GALERI FOTO KEGIATAN (2 Baris Slider Otomatis Sesuai Screenshot)
     ======================================================== --}}
<section class="py-14 bg-gray-100 overflow-hidden">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        
        {{-- Card Hitam Pekat Rounded Persis Gambar Referensi --}}
        <div class="bg-black text-white rounded-3xl p-6 sm:p-10 border border-neutral-800 shadow-2xl reveal-fade-up">
            
            {{-- Header Rata Tengah --}}
            <div class="text-center max-w-2xl mx-auto mb-8">
                <h2 class="text-2xl sm:text-3xl font-black tracking-tight text-white">
                    Galeri
                </h2>
                <p class="text-xs sm:text-sm text-[#ff5001] font-semibold mt-1">
                    Dokumentasi Kegiatan DPD PKS Ogan Ilir
                </p>
                <div class="w-16 h-0.5 bg-gray-400 mx-auto mt-2 rounded-full"></div>
            </div>

            {{-- BARIS 1: Slider Otomatis Foto Kegiatan (3 Kolom Desktop) --}}
            <div x-data="{
                current: 0,
                photos: {{ Js::from($galleryRow1 ?? $galleryPhotos) }},
                perView: 3,
                timer: null,
                updatePerView() {
                    if (window.innerWidth < 640) {
                        this.perView = 1;
                    } else if (window.innerWidth < 1024) {
                        this.perView = 2;
                    } else {
                        this.perView = 3;
                    }
                },
                maxIndex() {
                    return Math.max(0, this.photos.length - this.perView);
                },
                next() {
                    if (this.current >= this.maxIndex()) {
                        this.current = 0;
                    } else {
                        this.current++;
                    }
                },
                prev() {
                    if (this.current <= 0) {
                        this.current = this.maxIndex();
                    } else {
                        this.current--;
                    }
                },
                start() {
                    this.timer = setInterval(() => this.next(), 3500);
                },
                stop() {
                    clearInterval(this.timer);
                }
            }" x-init="updatePerView(); window.addEventListener('resize', () => updatePerView()); start()" @mouseenter="stop()" @mouseleave="start()" class="relative px-2 sm:px-4 mb-4">
                
                {{-- Track Baris 1 --}}
                <div class="overflow-hidden py-2">
                    <div class="flex transition-transform duration-500 ease-out" :style="'transform: translateX(-' + (current * (100 / perView)) + '%)'">
                        <template x-for="(photo, index) in photos" :key="index">
                            <div class="flex-shrink-0 px-2 sm:px-2.5" :style="'width: ' + (100 / perView) + '%'">
                                <a href="{{ route('galeri.index') }}" class="group block relative rounded-2xl overflow-hidden shadow-xl bg-neutral-900 border border-neutral-800 transform hover:scale-103 transition duration-300 h-64 sm:h-72 lg:h-80 w-full" :aria-label="'Lihat foto kegiatan: ' + photo.title">
                                    <img :src="photo.url" :alt="photo.title" class="w-full h-full object-cover object-center group-hover:scale-108 transition duration-500">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end p-3 sm:p-4" aria-hidden="true">
                                        <span class="text-xs text-white font-medium line-clamp-2" x-text="photo.title"></span>
                                    </div>
                                </a>
                            </div>
                        </template>
                    </div>
                </div>

                {{-- Controls Panah Kiri & Kanan Baris 1 (Touch target 44px+) --}}
                <button @click="prev()" class="absolute left-0 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-black/70 hover:bg-[#ff5001] text-white flex items-center justify-center transition border border-neutral-700 shadow-xl z-20" aria-label="Foto sebelumnya baris 1">
                    <i class="fa-solid fa-chevron-left text-xs sm:text-sm" aria-hidden="true"></i>
                </button>
                <button @click="next()" class="absolute right-0 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-black/70 hover:bg-[#ff5001] text-white flex items-center justify-center transition border border-neutral-700 shadow-xl z-20" aria-label="Foto berikutnya baris 1">
                    <i class="fa-solid fa-chevron-right text-xs sm:text-sm" aria-hidden="true"></i>
                </button>
            </div>

            {{-- BARIS 2: Slider Otomatis Foto Kegiatan (4 Kolom Desktop) --}}
            <div x-data="{
                current: 0,
                photos: {{ Js::from($galleryRow2 ?? $galleryPhotos) }},
                perView: 4,
                timer: null,
                updatePerView() {
                    if (window.innerWidth < 640) {
                        this.perView = 2;
                    } else if (window.innerWidth < 1024) {
                        this.perView = 3;
                    } else {
                        this.perView = 4;
                    }
                },
                maxIndex() {
                    return Math.max(0, this.photos.length - this.perView);
                },
                next() {
                    if (this.current >= this.maxIndex()) {
                        this.current = 0;
                    } else {
                        this.current++;
                    }
                },
                prev() {
                    if (this.current <= 0) {
                        this.current = this.maxIndex();
                    } else {
                        this.current--;
                    }
                },
                start() {
                    this.timer = setInterval(() => this.next(), 4200);
                },
                stop() {
                    clearInterval(this.timer);
                }
            }" x-init="updatePerView(); window.addEventListener('resize', () => updatePerView()); start()" @mouseenter="stop()" @mouseleave="start()" class="relative px-2 sm:px-4">
                
                {{-- Track Baris 2 --}}
                <div class="overflow-hidden py-2">
                    <div class="flex transition-transform duration-500 ease-out" :style="'transform: translateX(-' + (current * (100 / perView)) + '%)'">
                        <template x-for="(photo, index) in photos" :key="index">
                            <div class="flex-shrink-0 px-2 sm:px-2.5" :style="'width: ' + (100 / perView) + '%'">
                                <a href="{{ route('galeri.index') }}" class="group block relative rounded-2xl overflow-hidden shadow-lg bg-neutral-900 border border-neutral-800 transform hover:scale-103 transition duration-300 h-44 sm:h-52 lg:h-60 w-full" :aria-label="'Lihat foto kegiatan: ' + photo.title">
                                    <img :src="photo.url" :alt="photo.title" class="w-full h-full object-cover object-center group-hover:scale-108 transition duration-500">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/85 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end p-3" aria-hidden="true">
                                        <span class="text-xs text-white font-medium line-clamp-2" x-text="photo.title"></span>
                                    </div>
                                </a>
                            </div>
                        </template>
                    </div>
                </div>

                {{-- Controls Panah Kiri & Kanan Baris 2 (Touch target 44px+) --}}
                <button @click="prev()" class="absolute left-0 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-black/70 hover:bg-[#ff5001] text-white flex items-center justify-center transition border border-neutral-700 shadow-xl z-20" aria-label="Foto sebelumnya baris 2">
                    <i class="fa-solid fa-chevron-left text-xs sm:text-sm" aria-hidden="true"></i>
                </button>
                <button @click="next()" class="absolute right-0 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-black/70 hover:bg-[#ff5001] text-white flex items-center justify-center transition border border-neutral-700 shadow-xl z-20" aria-label="Foto berikutnya baris 2">
                    <i class="fa-solid fa-chevron-right text-xs sm:text-sm" aria-hidden="true"></i>
                </button>
            </div>

            {{-- Tombol Kapsul Oranye Selengkapnya Menuju /galeri --}}
            <div class="pt-8 flex justify-center">
                <a href="{{ route('galeri.index') }}" aria-label="Lihat Selengkapnya Galeri Foto Kegiatan" class="bg-[#ff5001] hover:bg-[#e04500] text-white font-extrabold text-xs sm:text-sm px-8 py-3 rounded-xl shadow-xl transition flex items-center space-x-2 transform hover:scale-105 min-h-[44px]">
                    <i class="fa-solid fa-images" aria-hidden="true"></i>
                    <span>Selengkapnya</span>
                </a>
            </div>

        </div>

    </div>
</section>


{{-- ========================================================
     SECTION #14: CALL TO ACTION BANNER (Gabung PKS)
     ======================================================== --}}
<section class="relative bg-gradient-to-r from-orange-700 to-[#c2410c] text-white py-12 px-4 sm:px-6 overflow-hidden reveal-fade-up">
    <div class="absolute inset-0 opacity-10">
        <img src="/uploads/2024/01/cd1787310f135df61a8832283565af3b.webp" alt="" aria-hidden="true" class="w-full h-full object-cover">
    </div>
    <div class="max-w-6xl mx-auto relative z-10 flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
        <div>
            <h2 class="text-2xl sm:text-3xl font-black tracking-tight">
                Ayo Bergabung Bersama DPD PKS Ogan Ilir
            </h2>
            <p class="text-xs sm:text-sm text-white mt-1 max-w-xl">
                Pelayanan, Pemberdayaan, dan Pembelaan untuk Rakyat. Bersama kita wujudkan Ogan Ilir yang religius, maju, dan sejahtera.
            </p>
        </div>
        <a href="https://daftar.pks.id" target="_blank" aria-label="Daftar Sekarang Menjadi Anggota PKS" class="bg-white text-[#c2410c] hover:bg-orange-50 font-extrabold text-xs sm:text-sm px-7 py-3 rounded-full shadow-lg hover:shadow-xl transition flex-shrink-0 min-h-[44px] flex items-center">
            Daftar Sekarang <i class="fa-solid fa-user-plus ml-1.5" aria-hidden="true"></i>
        </a>
    </div>
</section>


{{-- ========================================================
     SECTION #15: DOWNLOAD E-BOOK (Auto-Slider Etalase Cover Buku Persis Screenshot)
     ======================================================== --}}
<section class="py-14 bg-gray-100 overflow-hidden">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        
        {{-- Card Hitam Pekat Rounded Persis Gambar Referensi --}}
        <div class="bg-black text-white rounded-3xl p-6 sm:p-10 border border-neutral-800 shadow-2xl reveal-fade-up">
            
            {{-- Header Rata Tengah --}}
            <div class="text-center max-w-2xl mx-auto mb-8">
                <h2 class="text-2xl sm:text-3xl font-black tracking-tight text-white">
                    Download E-Book
                </h2>
                <p class="text-xs sm:text-sm text-[#ff5001] font-semibold mt-1">
                    Dapatkan E-Book Gratis Materi Dakwah
                </p>
                <div class="w-16 h-0.5 bg-gray-400 mx-auto mt-2 rounded-full"></div>
            </div>

            {{-- Slider Etalase Cover Buku (Otomatis Geser, Tanpa Tombol Unduh Per Buku) --}}
            <div x-data="{
                current: 0,
                items: {{ Js::from($ebooks) }},
                perView: 4,
                timer: null,
                updatePerView() {
                    if (window.innerWidth < 640) {
                        this.perView = 1;
                    } else if (window.innerWidth < 1024) {
                        this.perView = 2;
                    } else {
                        this.perView = 4;
                    }
                },
                maxIndex() {
                    return Math.max(0, this.items.length - this.perView);
                },
                next() {
                    if (this.current >= this.maxIndex()) {
                        this.current = 0;
                    } else {
                        this.current++;
                    }
                },
                prev() {
                    if (this.current <= 0) {
                        this.current = this.maxIndex();
                    } else {
                        this.current--;
                    }
                },
                start() {
                    this.timer = setInterval(() => this.next(), 3500);
                },
                stop() {
                    clearInterval(this.timer);
                }
            }" x-init="updatePerView(); window.addEventListener('resize', () => updatePerView()); start()" @mouseenter="stop()" @mouseleave="start()" class="relative px-2 sm:px-4">
                
                {{-- Carousel Track --}}
                <div class="overflow-hidden py-3">
                    <div class="flex transition-transform duration-500 ease-out" :style="'transform: translateX(-' + (current * (100 / perView)) + '%)'">
                        <template x-for="(eb, idx) in items" :key="idx">
                            <div class="flex-shrink-0 px-2.5 sm:px-3" :style="'width: ' + (100 / perView) + '%'">
                                <a href="{{ route('download.ebook') }}" class="group block relative rounded-2xl overflow-hidden shadow-2xl bg-neutral-900 border border-neutral-800 transform hover:scale-104 transition duration-300 cursor-pointer h-72 sm:h-80 lg:h-96 w-full" :aria-label="'Download e-book: ' + eb.title">
                                    <img :src="eb.cover" :alt="eb.title" class="w-full h-full object-cover object-center group-hover:scale-106 transition duration-500">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end justify-center p-3 text-center" aria-hidden="true">
                                        <span class="text-xs font-bold text-white truncate max-w-full" x-text="eb.title"></span>
                                    </div>
                                </a>
                            </div>
                        </template>
                    </div>
                </div>

                {{-- Tombol Navigasi Panah Kiri & Kanan Melayang di Sisi Slider (Touch target 44px+) --}}
                <button @click="prev()" class="absolute left-0 sm:left-1 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-black/70 hover:bg-[#ff5001] text-white flex items-center justify-center transition border border-neutral-700 shadow-2xl z-20" aria-label="E-book sebelumnya">
                    <i class="fa-solid fa-chevron-left text-xs sm:text-sm" aria-hidden="true"></i>
                </button>
                <button @click="next()" class="absolute right-0 sm:right-1 top-1/2 -translate-y-1/2 w-11 h-11 rounded-full bg-black/70 hover:bg-[#ff5001] text-white flex items-center justify-center transition border border-neutral-700 shadow-2xl z-20" aria-label="E-book berikutnya">
                    <i class="fa-solid fa-chevron-right text-xs sm:text-sm" aria-hidden="true"></i>
                </button>

                {{-- Tombol Oranye Kapsul Download Menuju Halaman /e-book --}}
                <div class="pt-6 flex justify-center">
                    <a href="{{ route('download.ebook') }}" aria-label="Download E-Book Materi Dakwah PKS" class="bg-[#ff5001] hover:bg-[#e04500] text-white font-black text-xs sm:text-sm px-8 py-3 rounded-2xl shadow-xl transition flex items-center space-x-2 transform hover:scale-105 min-h-[44px]">
                        <i class="fa-solid fa-download" aria-hidden="true"></i>
                        <span>Download</span>
                    </a>
                </div>

            </div>

        </div>

    </div>
</section>


{{-- ========================================================
     SECTION #16: TESTIMONIAL
     ======================================================== --}}
<section class="py-12 bg-white overflow-hidden">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="text-center max-w-2xl mx-auto mb-8 reveal-fade-up">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#353434] tracking-tight">
                Testimonial
            </h2>
            <p class="text-xs sm:text-sm text-gray-600 mt-1">
                Komentar Masyarakat tentang DPD PKS Ogan Ilir
            </p>
            <div class="w-16 h-1 bg-[#c2410c] mx-auto mt-2 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($testimonials as $index => $t)
            <div class="bg-gray-50 p-5 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between reveal-fade-up delay-{{ $index + 1 }}">
                <div class="space-y-3">
                    <div class="text-[#c2410c] text-xl" aria-hidden="true">
                        <i class="fa-solid fa-quote-left"></i>
                    </div>
                    <p class="text-xs sm:text-sm text-gray-700 leading-relaxed italic line-clamp-4">
                        "{{ $t->content }}"
                    </p>
                </div>
                <div class="pt-4 mt-4 border-t border-gray-200/60 flex flex-col sm:flex-row items-center sm:items-start text-center sm:text-left space-y-2 sm:space-y-0 sm:space-x-3">
                    <div class="w-10 h-10 rounded-full overflow-hidden bg-orange-100 flex items-center justify-center text-[#c2410c] font-bold text-xs flex-shrink-0 mx-auto sm:mx-0">
                        <img src="{{ $t->photo_url }}" alt="Foto profil {{ $t->name }}" class="w-full h-full object-cover" onerror="this.src='/uploads/2023/08/user-2.webp'">
                    </div>
                    <div class="min-w-0">
                        <h3 class="font-bold text-xs text-gray-900 truncate text-center sm:text-left">{{ $t->name }}</h3>
                        <p class="text-[11px] text-gray-600 truncate text-center sm:text-left">{{ $t->profession ?? 'Masyarakat Ogan Ilir' }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-8 reveal-fade-up">
            <a href="{{ route('testimonial.index') }}" aria-label="Lihat Semua Testimonial Masyarakat" class="inline-flex items-center bg-[#c2410c] hover:bg-[#9a3412] text-white font-bold text-xs sm:text-sm px-6 py-2.5 rounded-full shadow transition">
                Lihat Semua Testimoni <i class="fa-solid fa-comments ml-2 text-xs" aria-hidden="true"></i>
            </a>
        </div>
    </div>
</section>


{{-- ========================================================
     SECTION #17: BOTTOM QUICK ACTION CARDS
     ======================================================== --}}
<section class="py-8 bg-gray-50 border-t border-gray-200 overflow-hidden" aria-label="Aksi dan Layanan Cepat">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <h2 class="sr-only">Aksi dan Layanan Cepat</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            
            <a href="https://daftar.pks.id" target="_blank" class="bg-white p-4 rounded-xl border-t-4 border-[#c2410c] shadow-sm hover:shadow-md transition flex items-center space-x-3.5 group reveal-fade-up delay-1" aria-label="Daftar PKS Online Resmi">
                <div class="w-12 h-12 rounded-full bg-orange-50 text-[#c2410c] flex items-center justify-center text-xl flex-shrink-0 group-hover:bg-[#c2410c] group-hover:text-white transition" aria-hidden="true">
                    <i class="fa-solid fa-id-card"></i>
                </div>
                <div>
                    <h3 class="font-bold text-sm text-gray-900 group-hover:text-[#c2410c] transition">Daftar PKS Online</h3>
                    <p class="text-xs text-gray-600">Bergabung menjadi anggota resmi</p>
                </div>
            </a>

            <a href="https://wa.me/6282280041658" target="_blank" class="bg-white p-4 rounded-xl border-t-4 border-green-500 shadow-sm hover:shadow-md transition flex items-center space-x-3.5 group reveal-fade-up delay-2" aria-label="Hubungi DPD PKS via WhatsApp">
                <div class="w-12 h-12 rounded-full bg-green-50 text-green-600 flex items-center justify-center text-xl flex-shrink-0 group-hover:bg-green-500 group-hover:text-white transition" aria-hidden="true">
                    <i class="fa-brands fa-whatsapp"></i>
                </div>
                <div>
                    <h3 class="font-bold text-sm text-gray-900 group-hover:text-green-600 transition">Hubungi via WhatsApp</h3>
                    <p class="text-xs text-gray-600">Layanan pengaduan & aspirasi</p>
                </div>
            </a>

            <a href="{{ route('donasi') }}" class="bg-white p-4 rounded-xl border-t-4 border-yellow-500 shadow-sm hover:shadow-md transition flex items-center space-x-3.5 group reveal-fade-up delay-3" aria-label="Donasi Perjuangan Dakwah PKS">
                <div class="w-12 h-12 rounded-full bg-yellow-50 text-yellow-600 flex items-center justify-center text-xl flex-shrink-0 group-hover:bg-yellow-500 group-hover:text-white transition" aria-hidden="true">
                    <i class="fa-solid fa-hand-holding-heart"></i>
                </div>
                <div>
                    <h3 class="font-bold text-sm text-gray-900 group-hover:text-yellow-600 transition">Donasi Perjuangan</h3>
                    <p class="text-xs text-gray-600">Dukung program sosial dakwah</p>
                </div>
            </a>

        </div>
    </div>
</section>

@endsection
