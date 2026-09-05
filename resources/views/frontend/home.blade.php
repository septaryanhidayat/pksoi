@extends('layouts.frontend')

@section('title', 'DPD PKS Ogan Ilir - Berkhidmat untuk Rakyat')

@section('content')
{{-- ========================================================
     SECTION #0: HERO SLIDER & FLOATING MENU UTAMA
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
    <div class="relative h-[420px] sm:h-[500px] lg:h-[580px] w-full overflow-hidden">
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
                <div class="absolute inset-0 bg-gradient-to-t md:bg-gradient-to-r from-black/85 via-black/55 to-transparent"></div>

                <div class="absolute inset-0 flex items-center">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                        <div class="max-w-2xl text-white space-y-3 sm:space-y-5 text-center md:text-left">
                            <span class="inline-block bg-[#FE6000] text-white text-[11px] sm:text-xs uppercase font-bold tracking-wider px-3.5 py-1.5 rounded-full shadow-md">
                                DPD PKS KABUPATEN OGAN ILIR
                            </span>
                            <h1 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-tight" x-text="slide.title"></h1>
                            <p class="text-xs sm:text-base text-gray-200 font-light leading-relaxed max-w-xl mx-auto md:mx-0" x-text="slide.subtitle"></p>
                            <div class="pt-2 flex flex-wrap justify-center md:justify-start gap-3">
                                <a :href="slide.btn_link" class="inline-flex items-center bg-[#FE6000] hover:bg-[#d85200] text-white px-6 py-2.5 sm:py-3 rounded-full font-semibold text-xs sm:text-sm shadow-lg hover:shadow-xl transition">
                                    <span x-text="slide.btn_text"></span>
                                    <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                                </a>
                                <a href="{{ route('artikel.index') }}" class="inline-flex items-center bg-white/20 hover:bg-white/30 backdrop-blur text-white border border-white/30 px-5 py-2.5 sm:py-3 rounded-full font-semibold text-xs sm:text-sm transition">
                                    <i class="fa-solid fa-newspaper mr-2"></i> Berita Terkini
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>

    {{-- Carousel Controls --}}
    <button @click="activeSlide = (activeSlide - 1 + slides.length) % slides.length" class="hidden sm:flex absolute left-4 top-1/2 -translate-y-1/2 bg-black/40 hover:bg-[#FE6000] text-white w-10 h-10 rounded-full items-center justify-center transition backdrop-blur z-20" aria-label="Previous Slide">
        <i class="fa-solid fa-chevron-left"></i>
    </button>
    <button @click="activeSlide = (activeSlide + 1) % slides.length" class="hidden sm:flex absolute right-4 top-1/2 -translate-y-1/2 bg-black/40 hover:bg-[#FE6000] text-white w-10 h-10 rounded-full items-center justify-center transition backdrop-blur z-20" aria-label="Next Slide">
        <i class="fa-solid fa-chevron-right"></i>
    </button>

    {{-- Dots --}}
    <div class="absolute bottom-16 sm:bottom-20 left-1/2 -translate-x-1/2 flex space-x-2 z-20">
        <template x-for="(slide, idx) in slides" :key="idx">
            <button @click="activeSlide = idx" class="h-2 rounded-full transition-all duration-300" :class="activeSlide === idx ? 'w-8 bg-[#FE6000]' : 'w-2 bg-white/60 hover:bg-white'"></button>
        </template>
    </div>
</section>

{{-- FLOATING MENU UTAMA (Desktop 8 Kolom vs Mobile 4 Kolom x 2 Baris) --}}
<div class="max-w-6xl mx-auto px-4 sm:px-6 relative z-30 -mt-10 sm:-mt-14">
    <div class="bg-white rounded-2xl shadow-xl border border-gray-100 p-5 sm:p-6">
        <div class="flex items-center justify-between pb-4 mb-4 border-b border-gray-100">
            <h2 class="text-base sm:text-lg font-extrabold text-[#353434] flex items-center">
                <span class="w-2.5 h-2.5 rounded-full bg-[#FE6000] mr-2.5 inline-block"></span>
                Menu Utama
            </h2>
            <a href="{{ route('download.index') }}" class="bg-[#FE6000] hover:bg-[#d85200] text-white text-xs font-semibold px-4 py-1.5 rounded-full transition shadow-sm flex items-center">
                <i class="fa-solid fa-download mr-1.5 text-[11px]"></i> Download
            </a>
        </div>

        {{-- DESKTOP: 8 Kolom Berjajar 1 Baris --}}
        <div class="hidden md:grid md:grid-cols-8 gap-3 text-center">
            <a href="{{ route('artikel.index') }}" class="group p-2 rounded-xl hover:bg-orange-50 transition">
                <div class="w-12 h-12 mx-auto rounded-full bg-orange-100 text-[#FE6000] group-hover:bg-[#FE6000] group-hover:text-white flex items-center justify-center text-lg mb-2 transition shadow-sm">
                    <i class="fa-solid fa-newspaper"></i>
                </div>
                <span class="text-xs font-bold text-gray-800 group-hover:text-[#FE6000] block">Berita</span>
            </a>
            <a href="{{ route('dewan.index') }}" class="group p-2 rounded-xl hover:bg-orange-50 transition">
                <div class="w-12 h-12 mx-auto rounded-full bg-orange-100 text-[#FE6000] group-hover:bg-[#FE6000] group-hover:text-white flex items-center justify-center text-lg mb-2 transition shadow-sm">
                    <i class="fa-solid fa-user-tie"></i>
                </div>
                <span class="text-xs font-bold text-gray-800 group-hover:text-[#FE6000] block">Fraksi PKS</span>
            </a>
            <a href="{{ route('page.tentang-kami') }}" class="group p-2 rounded-xl hover:bg-orange-50 transition">
                <div class="w-12 h-12 mx-auto rounded-full bg-orange-100 text-[#FE6000] group-hover:bg-[#FE6000] group-hover:text-white flex items-center justify-center text-lg mb-2 transition shadow-sm">
                    <i class="fa-solid fa-users"></i>
                </div>
                <span class="text-xs font-bold text-gray-800 group-hover:text-[#FE6000] block">Profil DPD</span>
            </a>
            <a href="{{ route('dpc.index') }}" class="group p-2 rounded-xl hover:bg-orange-50 transition">
                <div class="w-12 h-12 mx-auto rounded-full bg-orange-100 text-[#FE6000] group-hover:bg-[#FE6000] group-hover:text-white flex items-center justify-center text-lg mb-2 transition shadow-sm">
                    <i class="fa-solid fa-landmark"></i>
                </div>
                <span class="text-xs font-bold text-gray-800 group-hover:text-[#FE6000] block">DPC PKS</span>
            </a>
            <a href="{{ route('agenda.index') }}" class="group p-2 rounded-xl hover:bg-orange-50 transition">
                <div class="w-12 h-12 mx-auto rounded-full bg-orange-100 text-[#FE6000] group-hover:bg-[#FE6000] group-hover:text-white flex items-center justify-center text-lg mb-2 transition shadow-sm">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
                <span class="text-xs font-bold text-gray-800 group-hover:text-[#FE6000] block">Agenda</span>
            </a>
            <a href="{{ route('pengumuman.index') }}" class="group p-2 rounded-xl hover:bg-orange-50 transition">
                <div class="w-12 h-12 mx-auto rounded-full bg-orange-100 text-[#FE6000] group-hover:bg-[#FE6000] group-hover:text-white flex items-center justify-center text-lg mb-2 transition shadow-sm">
                    <i class="fa-solid fa-bullhorn"></i>
                </div>
                <span class="text-xs font-bold text-gray-800 group-hover:text-[#FE6000] block">Pengumuman</span>
            </a>
            <a href="{{ route('galeri.index') }}" class="group p-2 rounded-xl hover:bg-orange-50 transition">
                <div class="w-12 h-12 mx-auto rounded-full bg-orange-100 text-[#FE6000] group-hover:bg-[#FE6000] group-hover:text-white flex items-center justify-center text-lg mb-2 transition shadow-sm">
                    <i class="fa-solid fa-images"></i>
                </div>
                <span class="text-xs font-bold text-gray-800 group-hover:text-[#FE6000] block">Galeri</span>
            </a>
            <a href="{{ route('download.index') }}" class="group p-2 rounded-xl hover:bg-orange-50 transition">
                <div class="w-12 h-12 mx-auto rounded-full bg-orange-100 text-[#FE6000] group-hover:bg-[#FE6000] group-hover:text-white flex items-center justify-center text-lg mb-2 transition shadow-sm">
                    <i class="fa-solid fa-download"></i>
                </div>
                <span class="text-xs font-bold text-gray-800 group-hover:text-[#FE6000] block">Unduhan</span>
            </a>
        </div>

        {{-- MOBILE: 4 Kolom x 2 Baris Grid --}}
        <div class="grid md:hidden grid-cols-4 gap-3 text-center">
            <a href="{{ route('artikel.index') }}" class="p-2 rounded-xl hover:bg-orange-50 transition">
                <div class="w-11 h-11 mx-auto rounded-full bg-orange-100 text-[#FE6000] flex items-center justify-center text-base mb-1 shadow-sm">
                    <i class="fa-solid fa-newspaper"></i>
                </div>
                <span class="text-[11px] font-bold text-gray-800 block">Berita</span>
            </a>
            <a href="{{ route('dewan.index') }}" class="p-2 rounded-xl hover:bg-orange-50 transition">
                <div class="w-11 h-11 mx-auto rounded-full bg-orange-100 text-[#FE6000] flex items-center justify-center text-base mb-1 shadow-sm">
                    <i class="fa-solid fa-user-tie"></i>
                </div>
                <span class="text-[11px] font-bold text-gray-800 block">Fraksi PKS</span>
            </a>
            <a href="{{ route('page.tentang-kami') }}" class="p-2 rounded-xl hover:bg-orange-50 transition">
                <div class="w-11 h-11 mx-auto rounded-full bg-orange-100 text-[#FE6000] flex items-center justify-center text-base mb-1 shadow-sm">
                    <i class="fa-solid fa-users"></i>
                </div>
                <span class="text-[11px] font-bold text-gray-800 block">Profil DPD</span>
            </a>
            <a href="{{ route('dpc.index') }}" class="p-2 rounded-xl hover:bg-orange-50 transition">
                <div class="w-11 h-11 mx-auto rounded-full bg-orange-100 text-[#FE6000] flex items-center justify-center text-base mb-1 shadow-sm">
                    <i class="fa-solid fa-landmark"></i>
                </div>
                <span class="text-[11px] font-bold text-gray-800 block">DPC PKS</span>
            </a>
            <a href="{{ route('agenda.index') }}" class="p-2 rounded-xl hover:bg-orange-50 transition">
                <div class="w-11 h-11 mx-auto rounded-full bg-orange-100 text-[#FE6000] flex items-center justify-center text-base mb-1 shadow-sm">
                    <i class="fa-solid fa-calendar-days"></i>
                </div>
                <span class="text-[11px] font-bold text-gray-800 block">Agenda</span>
            </a>
            <a href="{{ route('pengumuman.index') }}" class="p-2 rounded-xl hover:bg-orange-50 transition">
                <div class="w-11 h-11 mx-auto rounded-full bg-orange-100 text-[#FE6000] flex items-center justify-center text-base mb-1 shadow-sm">
                    <i class="fa-solid fa-bullhorn"></i>
                </div>
                <span class="text-[11px] font-bold text-gray-800 block">Pengumuman</span>
            </a>
            <a href="{{ route('galeri.index') }}" class="p-2 rounded-xl hover:bg-orange-50 transition">
                <div class="w-11 h-11 mx-auto rounded-full bg-orange-100 text-[#FE6000] flex items-center justify-center text-base mb-1 shadow-sm">
                    <i class="fa-solid fa-images"></i>
                </div>
                <span class="text-[11px] font-bold text-gray-800 block">Galeri</span>
            </a>
            <a href="{{ route('download.index') }}" class="p-2 rounded-xl hover:bg-orange-50 transition">
                <div class="w-11 h-11 mx-auto rounded-full bg-orange-100 text-[#FE6000] flex items-center justify-center text-base mb-1 shadow-sm">
                    <i class="fa-solid fa-download"></i>
                </div>
                <span class="text-[11px] font-bold text-gray-800 block">Unduhan</span>
            </a>
        </div>
    </div>
</div>


{{-- ========================================================
     SECTION #1: SAMBUTAN KETUA DPD
     ======================================================== --}}
<section class="py-12 sm:py-16 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-8 items-center">
            
            {{-- Foto Ketua DPD --}}
            <div class="lg:col-span-5 text-center">
                <div class="relative inline-block">
                    <div class="rounded-3xl overflow-hidden shadow-xl border-4 border-orange-100 max-w-[320px] sm:max-w-[360px] mx-auto bg-gradient-to-b from-orange-50 to-orange-100">
                        <img src="/uploads/2025/09/DSC06059-removebg-preview.webp" alt="Ketua DPD PKS Ogan Ilir" class="w-full h-auto object-cover transform hover:scale-105 transition duration-300" onerror="this.src='/uploads/2024/01/cd1787310f135df61a8832283565af3b.webp'">
                    </div>
                    <div class="mt-4">
                        <h3 class="font-extrabold text-gray-900 text-lg sm:text-xl">H. Husnul Anam, S.H.I.</h3>
                        <p class="text-xs sm:text-sm font-semibold text-[#FE6000]">Ketua DPD PKS Kabupaten Ogan Ilir</p>
                    </div>
                </div>
            </div>

            {{-- Isi Sambutan --}}
            <div class="lg:col-span-7 space-y-4">
                <div class="text-[#FE6000] text-4xl opacity-75">
                    <i class="fa-solid fa-quote-left"></i>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-[#353434] tracking-tight">
                    Sambutan Ketua DPD
                </h2>
                <div class="w-16 h-1 bg-[#FE6000] rounded-full"></div>
                <div class="text-gray-600 text-sm sm:text-base leading-relaxed space-y-3">
                    <p class="font-medium text-gray-800">
                        "Bismillahirrohmanirrohim. Assalamu'alaikum Warahmatullahi Wabarakatuh."
                    </p>
                    <p>
                        Puji syukur senantiasa kita panjatkan ke hadirat Allah SWT, atas limpahan rahmat dan karunia-Nya. Selamat datang di Website Resmi Dewan Pengurus Daerah Partai Keadilan Sejahtera (DPD PKS) Kabupaten Ogan Ilir.
                    </p>
                    <p>
                        Website ini kami hadirkan sebagai sarana komunikasi, transparansi informasi, serta jembatan aspirasi antara PKS dan seluruh lapisan masyarakat Ogan Ilir. Kami terus berkomitmen melayani rakyat dengan sepenuh hati, menghadirkan keadilan, dan memperjuangkan kesejahteraan umat.
                    </p>
                </div>
                <div class="pt-4 flex flex-wrap gap-3">
                    <a href="{{ route('page.sambutan') }}" class="bg-[#FE6000] hover:bg-[#d85200] text-white text-xs sm:text-sm font-semibold px-6 py-2.5 rounded-full shadow-md transition">
                        Baca Sambutan Lengkap
                    </a>
                    <a href="{{ route('page.visi-misi') }}" class="bg-gray-800 hover:bg-black text-white text-xs sm:text-sm font-semibold px-6 py-2.5 rounded-full shadow-md transition">
                        Visi & Misi
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ========================================================
     SECTION #2: ARTIKEL & BERITA (Headline Utama + 3 Samping)
     ======================================================== --}}
<section class="py-12 bg-gray-50 border-t border-gray-100">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h2 class="text-xl sm:text-2xl font-extrabold text-[#353434] flex items-center">
                    <span class="w-2.5 h-2.5 rounded-full bg-[#FE6000] mr-2"></span>
                    Artikel & Berita
                </h2>
                <div class="w-12 h-0.5 bg-[#FE6000] mt-1"></div>
            </div>
            <a href="{{ route('artikel.index') }}" class="text-xs sm:text-sm font-semibold text-[#FE6000] hover:underline flex items-center">
                Lihat Semua <i class="fa-solid fa-arrow-right ml-1.5 text-xs"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
            
            {{-- Big Headline Card (60% Desktop) --}}
            @if($featuredPost)
            <div class="lg:col-span-7">
                <article class="bg-white rounded-2xl shadow-md overflow-hidden border border-gray-100 h-full flex flex-col group">
                    <div class="relative h-60 sm:h-80 overflow-hidden bg-gray-100">
                        <img src="{{ $featuredPost->featured_image_url }}" alt="{{ $featuredPost->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500">
                        @if($featuredPost->categories->isNotEmpty())
                        <span class="absolute top-3 left-3 bg-[#FE6000] text-white text-[11px] font-bold px-3 py-1 rounded-full shadow">
                            {{ $featuredPost->categories->first()->name }}
                        </span>
                        @endif
                    </div>
                    <div class="p-5 sm:p-6 flex-1 flex flex-col justify-between">
                        <div class="space-y-2">
                            <div class="text-xs text-gray-400 flex items-center space-x-3">
                                <span><i class="fa-regular fa-calendar-check mr-1 text-[#FE6000]"></i> {{ $featuredPost->published_at ? $featuredPost->published_at->translatedFormat('d F Y') : '-' }}</span>
                                <span><i class="fa-regular fa-eye mr-1 text-[#FE6000]"></i> {{ $featuredPost->views_count }} views</span>
                            </div>
                            <h3 class="text-lg sm:text-xl font-bold text-gray-900 group-hover:text-[#FE6000] transition line-clamp-2">
                                <a href="{{ route('artikel.show', $featuredPost->slug) }}">
                                    {{ $featuredPost->title }}
                                </a>
                            </h3>
                            <p class="text-xs sm:text-sm text-gray-600 line-clamp-3 leading-relaxed">
                                {{ $featuredPost->excerpt }}
                            </p>
                        </div>
                        <div class="pt-4 mt-4 border-t border-gray-100 flex justify-end">
                            <a href="{{ route('artikel.show', $featuredPost->slug) }}" class="text-xs font-bold text-[#FE6000] hover:text-[#d85200] flex items-center">
                                Selengkapnya <i class="fa-solid fa-angle-right ml-1"></i>
                            </a>
                        </div>
                    </div>
                </article>
            </div>
            @endif

            {{-- 3 Articles Side Stack (40% Desktop) --}}
            <div class="lg:col-span-5 flex flex-col justify-between space-y-4">
                <div class="space-y-3">
                    @foreach($sidePosts as $post)
                    <article class="bg-white p-3.5 rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition flex items-center space-x-3.5 group">
                        <div class="w-24 h-24 sm:w-28 sm:h-24 flex-shrink-0 rounded-lg overflow-hidden bg-gray-100">
                            <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="text-[10px] text-gray-400 mb-1 flex items-center space-x-2">
                                @if($post->categories->isNotEmpty())
                                <span class="text-[#FE6000] font-semibold">{{ $post->categories->first()->name }}</span>
                                <span>•</span>
                                @endif
                                <span>{{ $post->published_at ? $post->published_at->translatedFormat('d M Y') : '' }}</span>
                            </div>
                            <h4 class="text-xs sm:text-sm font-bold text-gray-900 group-hover:text-[#FE6000] transition line-clamp-2 leading-snug">
                                <a href="{{ route('artikel.show', $post->slug) }}">
                                    {{ $post->title }}
                                </a>
                            </h4>
                        </div>
                    </article>
                    @endforeach
                </div>

                <a href="{{ route('artikel.index') }}" class="w-full text-center bg-[#FE6000] hover:bg-[#d85200] text-white text-xs font-bold py-3 rounded-xl transition shadow-sm block">
                    Lihat Semua Berita <i class="fa-solid fa-arrow-right ml-1"></i>
                </a>
            </div>

        </div>
    </div>
</section>


{{-- ========================================================
     SECTION #3: BERITA FRAKSI PKS (Desktop 4 Col vs Mobile 1 Col)
     ======================================================== --}}
<section class="py-12 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="text-center max-w-2xl mx-auto mb-8">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#353434] tracking-tight">
                Berita Fraksi PKS
            </h2>
            <p class="text-xs sm:text-sm text-gray-500 mt-1">
                Kabar dan Aktivitas terbaru Anggota DPRD Kabupaten Ogan Ilir Fraksi PKS
            </p>
            <div class="w-16 h-1 bg-[#FE6000] mx-auto mt-2 rounded-full"></div>
        </div>

        {{-- Responsive Grid: Desktop 4 columns, Mobile 1 column --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($fraksiPosts as $post)
            <article class="bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition overflow-hidden flex flex-col group">
                <div class="h-44 overflow-hidden bg-gray-100 relative">
                    <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-2.5 left-2.5 bg-[#FE6000] text-white text-[10px] font-bold px-2.5 py-0.5 rounded-full shadow">
                        Fraksi PKS
                    </span>
                </div>
                <div class="p-4 flex-1 flex flex-col justify-between">
                    <div>
                        <div class="text-[11px] text-gray-400 mb-1.5 flex items-center">
                            <i class="fa-regular fa-calendar mr-1 text-[#FE6000]"></i>
                            <span>{{ $post->published_at ? $post->published_at->translatedFormat('d M Y') : '' }}</span>
                        </div>
                        <h3 class="font-bold text-xs sm:text-sm text-gray-900 group-hover:text-[#FE6000] transition line-clamp-2 leading-snug">
                            <a href="{{ route('artikel.show', $post->slug) }}">
                                {{ $post->title }}
                            </a>
                        </h3>
                    </div>
                    <div class="pt-3 mt-3 border-t border-gray-100 flex justify-end">
                        <a href="{{ route('artikel.show', $post->slug) }}" class="text-[11px] font-bold text-[#FE6000] hover:underline">
                            Baca Berita <i class="fa-solid fa-angle-right ml-0.5"></i>
                        </a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('artikel.index') }}?kategori=fraksi" class="inline-flex items-center bg-[#FE6000] hover:bg-[#d85200] text-white font-bold text-xs sm:text-sm px-7 py-2.5 rounded-full shadow transition">
                Lebih Banyak <i class="fa-solid fa-chevron-down ml-2 text-xs"></i>
            </a>
        </div>
    </div>
</section>


{{-- ========================================================
     SECTION #4: NASIONAL & DAERAH (Desktop 2-Col Side-by-Side vs Mobile Sequential)
     ======================================================== --}}
<section class="py-12 bg-gray-50 border-y border-gray-100">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            {{-- KOLOM 1: NASIONAL --}}
            <div class="bg-white p-5 sm:p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between pb-3 mb-4 border-b border-gray-100">
                        <h3 class="text-lg font-extrabold text-[#353434] flex items-center">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#FE6000] mr-2"></span>
                            Nasional
                        </h3>
                        <span class="text-xs text-gray-400 font-medium">Kabar Nusantara</span>
                    </div>

                    <div class="space-y-3">
                        @foreach($nasionalPosts as $post)
                        <article class="flex items-center space-x-3 group pb-3 border-b border-gray-50 last:border-0 last:pb-0">
                            <div class="w-16 h-16 sm:w-20 sm:h-16 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0">
                                <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-[10px] text-gray-400 mb-1">
                                    {{ $post->published_at ? $post->published_at->translatedFormat('d F Y') : '' }}
                                </div>
                                <h4 class="text-xs sm:text-sm font-bold text-gray-900 group-hover:text-[#FE6000] transition line-clamp-2 leading-snug">
                                    <a href="{{ route('artikel.show', $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h4>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>

                <div class="pt-5 mt-4">
                    <a href="{{ route('artikel.index') }}?kategori=nasional" class="block w-full text-center bg-[#FE6000] hover:bg-[#d85200] text-white font-bold text-xs py-2.5 rounded-xl shadow-sm transition">
                        Lihat Semua Berita Nasional <i class="fa-solid fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>

            {{-- KOLOM 2: DAERAH --}}
            <div class="bg-white p-5 sm:p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between pb-3 mb-4 border-b border-gray-100">
                        <h3 class="text-lg font-extrabold text-[#353434] flex items-center">
                            <span class="w-2.5 h-2.5 rounded-full bg-[#FE6000] mr-2"></span>
                            Daerah
                        </h3>
                        <span class="text-xs text-gray-400 font-medium">Kabar Ogan Ilir</span>
                    </div>

                    <div class="space-y-3">
                        @foreach($daerahPosts as $post)
                        <article class="flex items-center space-x-3 group pb-3 border-b border-gray-50 last:border-0 last:pb-0">
                            <div class="w-16 h-16 sm:w-20 sm:h-16 rounded-lg overflow-hidden bg-gray-100 flex-shrink-0">
                                <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            </div>
                            <div class="flex-1 min-w-0">
                                <div class="text-[10px] text-gray-400 mb-1">
                                    {{ $post->published_at ? $post->published_at->translatedFormat('d F Y') : '' }}
                                </div>
                                <h4 class="text-xs sm:text-sm font-bold text-gray-900 group-hover:text-[#FE6000] transition line-clamp-2 leading-snug">
                                    <a href="{{ route('artikel.show', $post->slug) }}">
                                        {{ $post->title }}
                                    </a>
                                </h4>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>

                <div class="pt-5 mt-4">
                    <a href="{{ route('artikel.index') }}?kategori=ogan-ilir" class="block w-full text-center bg-[#FE6000] hover:bg-[#d85200] text-white font-bold text-xs py-2.5 rounded-xl shadow-sm transition">
                        Lihat Semua Berita Daerah <i class="fa-solid fa-arrow-right ml-1"></i>
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ========================================================
     SECTION #5: KABAR SENAYAN (DPR RI Fraksi PKS)
     ======================================================== --}}
<section class="py-12 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="text-center max-w-2xl mx-auto mb-8">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#353434] tracking-tight">
                Kabar Senayan
            </h2>
            <p class="text-xs sm:text-sm text-gray-500 mt-1">
                Kabar dan Aktivitas terbaru Anggota DPR RI Fraksi PKS
            </p>
            <div class="w-16 h-1 bg-[#FE6000] mx-auto mt-2 rounded-full"></div>
        </div>

        {{-- Desktop 4 col, Mobile 1 col --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($senayanPosts as $post)
            <article class="bg-white rounded-xl border border-gray-100 shadow-sm hover:shadow-md transition overflow-hidden flex flex-col group">
                <div class="h-44 overflow-hidden bg-gray-100 relative">
                    <img src="{{ $post->featured_image_url }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                    <span class="absolute top-2.5 left-2.5 bg-gray-900 text-white text-[10px] font-bold px-2.5 py-0.5 rounded-full shadow">
                        Senayan
                    </span>
                </div>
                <div class="p-4 flex-1 flex flex-col justify-between">
                    <div>
                        <div class="text-[11px] text-gray-400 mb-1.5 flex items-center">
                            <i class="fa-regular fa-calendar mr-1 text-[#FE6000]"></i>
                            <span>{{ $post->published_at ? $post->published_at->translatedFormat('d M Y') : '' }}</span>
                        </div>
                        <h3 class="font-bold text-xs sm:text-sm text-gray-900 group-hover:text-[#FE6000] transition line-clamp-2 leading-snug">
                            <a href="{{ route('artikel.show', $post->slug) }}">
                                {{ $post->title }}
                            </a>
                        </h3>
                    </div>
                    <div class="pt-3 mt-3 border-t border-gray-100 flex justify-end">
                        <a href="{{ route('artikel.show', $post->slug) }}" class="text-[11px] font-bold text-[#FE6000] hover:underline">
                            Baca Berita <i class="fa-solid fa-angle-right ml-0.5"></i>
                        </a>
                    </div>
                </div>
            </article>
            @endforeach
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('artikel.index') }}?kategori=senayan" class="inline-flex items-center bg-[#FE6000] hover:bg-[#d85200] text-white font-bold text-xs sm:text-sm px-7 py-2.5 rounded-full shadow transition">
                Lebih Banyak <i class="fa-solid fa-chevron-down ml-2 text-xs"></i>
            </a>
        </div>
    </div>
</section>


{{-- ========================================================
     SECTION #6 - 9: ANGGOTA DPRD FRAKSI PKS
     DESKTOP: 4 Kolom 1 Baris (Section #8)
     MOBILE: 2 Kolom x 2 Baris / 2x2 Grid (Section #7)
     ======================================================== --}}
<section class="py-12 bg-gray-50 border-t border-gray-100">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="text-center max-w-2xl mx-auto mb-8">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#353434] tracking-tight">
                Anggota DPRD Fraksi PKS
            </h2>
            <p class="text-xs sm:text-sm text-gray-500 mt-1">
                Kabar dan Aktivitas terbaru Anggota Legislatif PKS Ogan Ilir
            </p>
            <div class="w-16 h-1 bg-[#FE6000] mx-auto mt-2 rounded-full"></div>
        </div>

        {{-- DESKTOP VIEW (Section #8: 4 Kolom 1 Baris) --}}
        <div class="hidden md:grid md:grid-cols-4 gap-6">
            @foreach($dewan as $d)
            <div class="bg-white rounded-2xl p-4 shadow-sm border border-gray-100 text-center group hover:shadow-lg transition transform hover:-translate-y-1">
                <div class="h-64 rounded-xl overflow-hidden mb-3 bg-gray-100">
                    <img src="{{ $d->photo_url }}" alt="{{ $d->name }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-300" onerror="this.src='/uploads/2024/01/cd1787310f135df61a8832283565af3b.webp'">
                </div>
                <h3 class="font-extrabold text-sm text-gray-900 group-hover:text-[#FE6000] transition">
                    {{ $d->name }}
                </h3>
                <p class="text-xs text-gray-500 mt-0.5 font-medium">
                    {{ $d->position }}
                </p>
            </div>
            @endforeach
        </div>

        {{-- MOBILE VIEW (Section #7: 2 Kolom x 2 Baris / 2x2 Grid) --}}
        <div class="grid md:hidden grid-cols-2 gap-3.5">
            @foreach($dewan as $d)
            <div class="bg-white rounded-xl p-2.5 shadow-sm border border-gray-100 text-center">
                <div class="h-44 rounded-lg overflow-hidden mb-2 bg-gray-100">
                    <img src="{{ $d->photo_url }}" alt="{{ $d->name }}" class="w-full h-full object-cover object-top" onerror="this.src='/uploads/2024/01/cd1787310f135df61a8832283565af3b.webp'">
                </div>
                <h3 class="font-extrabold text-xs text-gray-900 leading-tight">
                    {{ $d->name }}
                </h3>
                <p class="text-[10px] text-gray-500 mt-0.5">
                    {{ $d->position }}
                </p>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('dewan.index') }}" class="inline-flex items-center bg-[#FE6000] hover:bg-[#d85200] text-white font-bold text-xs sm:text-sm px-6 py-2.5 rounded-full shadow transition">
                Lihat Semua Anggota Dewan <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
            </a>
        </div>
    </div>
</section>


{{-- ========================================================
     SECTION #10: VIDEO KEGIATAN (Desktop 3 Col vs Mobile 1 Col)
     ======================================================== --}}
<section class="py-12 bg-gray-900 text-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="text-center max-w-2xl mx-auto mb-8">
            <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                Video
            </h2>
            <p class="text-xs sm:text-sm text-gray-400 mt-1">
                Kabar dan Aktivitas terbaru dalam bentuk video
            </p>
            <div class="w-16 h-1 bg-[#FE6000] mx-auto mt-2 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($videos as $v)
            <div class="bg-gray-800 rounded-xl overflow-hidden border border-gray-700 shadow-md group">
                <div class="relative aspect-video bg-black">
                    @if($v->youtube_id)
                    <iframe class="w-full h-full" src="https://www.youtube.com/embed/{{ $v->youtube_id }}" title="{{ $v->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    @else
                    <a href="{{ $v->youtube_url }}" target="_blank" class="block w-full h-full relative flex items-center justify-center">
                        <img src="https://img.youtube.com/vi/{{ $v->youtube_id }}/hqdefault.jpg" alt="{{ $v->title }}" class="w-full h-full object-cover">
                        <div class="absolute inset-0 bg-black/40 flex items-center justify-center group-hover:bg-black/20 transition">
                            <i class="fa-brands fa-youtube text-red-600 text-5xl"></i>
                        </div>
                    </a>
                    @endif
                </div>
                <div class="p-4">
                    <h3 class="font-bold text-xs sm:text-sm text-gray-100 line-clamp-2 leading-snug group-hover:text-[#FE6000] transition">
                        {{ $v->title }}
                    </h3>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('video.index') }}" class="inline-flex items-center bg-[#FE6000] hover:bg-[#d85200] text-white font-bold text-xs sm:text-sm px-6 py-2.5 rounded-full shadow transition">
                Video Lainnya <i class="fa-solid fa-play ml-2 text-[10px]"></i>
            </a>
        </div>
    </div>
</section>


{{-- ========================================================
     SECTION #12: PENGUMUMAN & AGENDA (Desktop 2-Col vs Mobile Sequential)
     ======================================================== --}}
<section class="py-12 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            {{-- PENGUMUMAN --}}
            <div class="bg-gray-50 p-5 sm:p-6 rounded-2xl border border-gray-100 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between pb-3 mb-4 border-b border-gray-200">
                        <h3 class="text-lg font-extrabold text-[#353434] flex items-center">
                            <i class="fa-solid fa-bullhorn text-[#FE6000] mr-2"></i>
                            Pengumuman
                        </h3>
                        <a href="{{ route('pengumuman.index') }}" class="text-xs font-semibold text-[#FE6000] hover:underline">
                            Lihat Semua
                        </a>
                    </div>

                    <div class="space-y-3">
                        @foreach($announcements as $ann)
                        <article class="bg-white p-3.5 rounded-xl border border-gray-100 shadow-sm hover:border-orange-200 transition">
                            <div class="text-[10px] text-gray-400 mb-1 flex items-center">
                                <i class="fa-regular fa-clock mr-1 text-[#FE6000]"></i>
                                {{ $ann->created_at ? $ann->created_at->translatedFormat('d F Y') : '' }}
                            </div>
                            <h4 class="font-bold text-xs sm:text-sm text-gray-900 hover:text-[#FE6000] transition">
                                <a href="{{ route('pengumuman.show', $ann->slug) }}">
                                    {{ $ann->title }}
                                </a>
                            </h4>
                        </article>
                        @endforeach
                    </div>
                </div>

                <div class="pt-4 mt-4">
                    <a href="{{ route('pengumuman.index') }}" class="block w-full text-center bg-[#FE6000] hover:bg-[#d85200] text-white font-bold text-xs py-2.5 rounded-xl shadow-sm transition">
                        Lihat Semua Pengumuman
                    </a>
                </div>
            </div>

            {{-- AGENDA --}}
            <div class="bg-gray-50 p-5 sm:p-6 rounded-2xl border border-gray-100 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between pb-3 mb-4 border-b border-gray-200">
                        <h3 class="text-lg font-extrabold text-[#353434] flex items-center">
                            <i class="fa-solid fa-calendar-days text-[#FE6000] mr-2"></i>
                            Agenda
                        </h3>
                        <a href="{{ route('agenda.index') }}" class="text-xs font-semibold text-[#FE6000] hover:underline">
                            Lihat Semua
                        </a>
                    </div>

                    <div class="space-y-3">
                        @foreach($agendas as $agenda)
                        <article class="bg-white p-3.5 rounded-xl border border-gray-100 shadow-sm hover:border-orange-200 transition flex items-center space-x-3.5">
                            {{-- Tanggal Oranye Besar di Kiri --}}
                            <div class="w-14 h-14 rounded-xl bg-[#FE6000] text-white flex flex-col items-center justify-center flex-shrink-0 shadow">
                                <span class="text-base font-extrabold leading-none">
                                    {{ $agenda->event_date ? $agenda->event_date->format('d') : date('d') }}
                                </span>
                                <span class="text-[10px] font-bold uppercase tracking-wider mt-0.5">
                                    {{ $agenda->event_date ? $agenda->event_date->translatedFormat('M') : date('M') }}
                                </span>
                            </div>
                            <div class="flex-1 min-w-0">
                                <h4 class="font-bold text-xs sm:text-sm text-gray-900 hover:text-[#FE6000] transition line-clamp-1">
                                    <a href="{{ route('agenda.show', $agenda->slug) }}">
                                        {{ $agenda->title }}
                                    </a>
                                </h4>
                                <div class="text-[11px] text-gray-500 mt-1 flex items-center space-x-2 truncate">
                                    @if($agenda->location)
                                    <span><i class="fa-solid fa-location-dot mr-1 text-gray-400"></i> {{ $agenda->location }}</span>
                                    @endif
                                </div>
                            </div>
                        </article>
                        @endforeach
                    </div>
                </div>

                <div class="pt-4 mt-4">
                    <a href="{{ route('agenda.index') }}" class="block w-full text-center bg-[#FE6000] hover:bg-[#d85200] text-white font-bold text-xs py-2.5 rounded-xl shadow-sm transition">
                        Lihat Semua Agenda
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>


{{-- ========================================================
     SECTION #13: GALERI FOTO KEGIATAN (Desktop 4 Col vs Mobile 2 Col)
     ======================================================== --}}
<section class="py-12 bg-gray-950 text-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="text-center max-w-2xl mx-auto mb-8">
            <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight">
                Galeri
            </h2>
            <p class="text-xs sm:text-sm text-gray-400 mt-1">
                Kabar dan Aktivitas terbaru dalam dokumentasi visual
            </p>
            <div class="w-16 h-1 bg-[#FE6000] mx-auto mt-2 rounded-full"></div>
        </div>

        {{-- Grid: Desktop 4 columns, Mobile 2 columns --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-3 sm:gap-4">
            @foreach($galleryPhotos as $photo)
            <div class="group relative rounded-xl overflow-hidden shadow-md aspect-square bg-gray-800">
                <img src="{{ $photo['url'] }}" alt="{{ $photo['title'] }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex items-end p-3">
                    <span class="text-xs text-white font-medium line-clamp-2">
                        {{ $photo['title'] }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('galeri.index') }}" class="inline-flex items-center bg-[#FE6000] hover:bg-[#d85200] text-white font-bold text-xs sm:text-sm px-6 py-2.5 rounded-full shadow transition">
                Selengkapnya <i class="fa-solid fa-images ml-2 text-xs"></i>
            </a>
        </div>
    </div>
</section>


{{-- ========================================================
     SECTION #14: CALL TO ACTION BANNER (Gabung PKS)
     ======================================================== --}}
<section class="relative bg-gradient-to-r from-orange-600 to-[#FE6000] text-white py-12 px-4 sm:px-6 overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <img src="/uploads/2024/01/cd1787310f135df61a8832283565af3b.webp" alt="Background" class="w-full h-full object-cover">
    </div>
    <div class="max-w-6xl mx-auto relative z-10 flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
        <div>
            <h2 class="text-2xl sm:text-3xl font-black tracking-tight">
                Ayo Bergabung Bersama DPD PKS Ogan Ilir
            </h2>
            <p class="text-xs sm:text-sm text-orange-100 mt-1 max-w-xl">
                Pelayanan, Pemberdayaan, dan Pembelaan untuk Rakyat. Bersama kita wujudkan Ogan Ilir yang religius, maju, dan sejahtera.
            </p>
        </div>
        <a href="https://daftar.pks.id" target="_blank" class="bg-white text-[#FE6000] hover:bg-orange-50 font-extrabold text-xs sm:text-sm px-7 py-3 rounded-full shadow-lg hover:shadow-xl transition flex-shrink-0">
            Daftar Sekarang <i class="fa-solid fa-user-plus ml-1.5"></i>
        </a>
    </div>
</section>


{{-- ========================================================
     SECTION #15: DOWNLOAD E-BOOK (Desktop 4 Col vs Mobile 2 Col)
     ======================================================== --}}
<section class="py-14 bg-gray-950 text-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <h2 class="text-2xl sm:text-3xl font-extrabold tracking-tight text-[#FE6000]">
                Download E-Book
            </h2>
            <p class="text-xs sm:text-sm text-gray-300 mt-1">
                Dapatkan E-Book Gratis Materi Dakwah dan Pembinaan Umat
            </p>
            <div class="w-16 h-1 bg-[#FE6000] mx-auto mt-2 rounded-full"></div>
        </div>

        {{-- Desktop 4 col, Mobile 2 col --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 sm:gap-6">
            @foreach($ebooks as $eb)
            <div class="bg-gray-900 rounded-2xl p-3 sm:p-4 border border-gray-800 flex flex-col justify-between group hover:border-[#FE6000] transition">
                <div class="aspect-[3/4] rounded-xl overflow-hidden mb-3 bg-gray-800 shadow-lg">
                    <img src="{{ $eb['cover'] }}" alt="{{ $eb['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                </div>
                <div>
                    <h3 class="font-bold text-xs sm:text-sm text-white line-clamp-2 mb-1 group-hover:text-[#FE6000] transition">
                        {{ $eb['title'] }}
                    </h3>
                    <p class="text-[10px] sm:text-xs text-gray-400 line-clamp-2 leading-relaxed mb-3">
                        {{ $eb['desc'] }}
                    </p>
                </div>
                <a href="{{ $eb['pdf'] }}" target="_blank" class="block w-full text-center bg-[#FE6000] hover:bg-[#d85200] text-white text-[11px] sm:text-xs font-bold py-2 rounded-lg transition shadow">
                    <i class="fa-solid fa-download mr-1"></i> Unduh E-Book
                </a>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('download.ebook') }}" class="inline-flex items-center bg-[#FE6000] hover:bg-[#d85200] text-white font-bold text-xs sm:text-sm px-6 py-2.5 rounded-full shadow transition">
                Download Selengkapnya <i class="fa-solid fa-book-open ml-2 text-xs"></i>
            </a>
        </div>
    </div>
</section>


{{-- ========================================================
     SECTION #16: TESTIMONIAL
     ======================================================== --}}
<section class="py-12 bg-white">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="text-center max-w-2xl mx-auto mb-8">
            <h2 class="text-2xl sm:text-3xl font-extrabold text-[#353434] tracking-tight">
                Testimonial
            </h2>
            <p class="text-xs sm:text-sm text-gray-500 mt-1">
                Komentar Masyarakat tentang DPD PKS Ogan Ilir
            </p>
            <div class="w-16 h-1 bg-[#FE6000] mx-auto mt-2 rounded-full"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($testimonials as $t)
            <div class="bg-gray-50 p-5 rounded-2xl border border-gray-100 shadow-sm flex flex-col justify-between">
                <div class="space-y-3">
                    <div class="text-[#FE6000] text-xl">
                        <i class="fa-solid fa-quote-left"></i>
                    </div>
                    <p class="text-xs sm:text-sm text-gray-600 leading-relaxed italic line-clamp-4">
                        "{{ $t->content }}"
                    </p>
                </div>
                <div class="pt-4 mt-4 border-t border-gray-200/60 flex items-center space-x-3">
                    <div class="w-10 h-10 rounded-full overflow-hidden bg-orange-100 flex items-center justify-center text-[#FE6000] font-bold text-xs flex-shrink-0">
                        @if($t->photo)
                        <img src="{{ $t->photo }}" alt="{{ $t->name }}" class="w-full h-full object-cover">
                        @else
                        {{ substr($t->name, 0, 1) }}
                        @endif
                    </div>
                    <div class="min-w-0">
                        <h4 class="font-bold text-xs text-gray-900 truncate">{{ $t->name }}</h4>
                        <p class="text-[10px] text-gray-400 truncate">{{ $t->profession ?? 'Masyarakat Ogan Ilir' }}</p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="text-center mt-8">
            <a href="{{ route('testimonial.index') }}" class="inline-flex items-center bg-[#FE6000] hover:bg-[#d85200] text-white font-bold text-xs sm:text-sm px-6 py-2.5 rounded-full shadow transition">
                Lihat Semua Testimoni <i class="fa-solid fa-comments ml-2 text-xs"></i>
            </a>
        </div>
    </div>
</section>


{{-- ========================================================
     SECTION #17: BOTTOM QUICK ACTION CARDS
     ======================================================== --}}
<section class="py-8 bg-gray-50 border-t border-gray-200">
    <div class="max-w-6xl mx-auto px-4 sm:px-6">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            
            <a href="https://daftar.pks.id" target="_blank" class="bg-white p-4 rounded-xl border-t-4 border-[#FE6000] shadow-sm hover:shadow-md transition flex items-center space-x-3.5 group">
                <div class="w-12 h-12 rounded-full bg-orange-50 text-[#FE6000] flex items-center justify-center text-xl flex-shrink-0 group-hover:bg-[#FE6000] group-hover:text-white transition">
                    <i class="fa-solid fa-id-card"></i>
                </div>
                <div>
                    <h4 class="font-bold text-sm text-gray-900 group-hover:text-[#FE6000] transition">Daftar PKS Online</h4>
                    <p class="text-xs text-gray-500">Bergabung menjadi anggota resmi</p>
                </div>
            </a>

            <a href="https://wa.me/6282280041658" target="_blank" class="bg-white p-4 rounded-xl border-t-4 border-green-500 shadow-sm hover:shadow-md transition flex items-center space-x-3.5 group">
                <div class="w-12 h-12 rounded-full bg-green-50 text-green-600 flex items-center justify-center text-xl flex-shrink-0 group-hover:bg-green-500 group-hover:text-white transition">
                    <i class="fa-brands fa-whatsapp"></i>
                </div>
                <div>
                    <h4 class="font-bold text-sm text-gray-900 group-hover:text-green-600 transition">Hubungi via WhatsApp</h4>
                    <p class="text-xs text-gray-500">Layanan pengaduan & aspirasi</p>
                </div>
            </a>

            <a href="{{ route('donasi') }}" class="bg-white p-4 rounded-xl border-t-4 border-yellow-500 shadow-sm hover:shadow-md transition flex items-center space-x-3.5 group">
                <div class="w-12 h-12 rounded-full bg-yellow-50 text-yellow-600 flex items-center justify-center text-xl flex-shrink-0 group-hover:bg-yellow-500 group-hover:text-white transition">
                    <i class="fa-solid fa-hand-holding-heart"></i>
                </div>
                <div>
                    <h4 class="font-bold text-sm text-gray-900 group-hover:text-yellow-600 transition">Donasi Perjuangan</h4>
                    <p class="text-xs text-gray-500">Dukung program sosial dakwah</p>
                </div>
            </a>

        </div>
    </div>
</section>


{{-- ========================================================
     SECTION #18: ORANGE SUBSCRIPTION BAR & FOOTER WITH VISITOR COUNTER
     ======================================================== --}}
<section class="bg-[#FE6000] text-white py-6">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 flex flex-col md:flex-row items-center justify-between gap-4">
        <div>
            <h3 class="text-lg font-black tracking-tight">Dapatkan Berita & Info PKS Terkini</h3>
            <p class="text-xs text-orange-100">Langganan kabar perjuangan dan program pelayanan DPD PKS Ogan Ilir</p>
        </div>
        <form action="{{ route('hubungi.store') }}" method="POST" class="flex w-full md:w-auto max-w-md gap-2">
            @csrf
            <input type="text" name="whatsapp" placeholder="Nomor WhatsApp Anda..." required class="bg-white text-gray-800 text-xs px-4 py-2.5 rounded-full focus:outline-none flex-1">
            <input type="hidden" name="name" value="Langganan WhatsApp">
            <input type="hidden" name="message" value="Permohonan berlangganan info berita PKS Ogan Ilir">
            <button type="submit" class="bg-gray-900 hover:bg-black text-white font-bold text-xs px-5 py-2.5 rounded-full transition shadow">
                Daftar
            </button>
        </form>
    </div>
</section>

{{-- VISITOR COUNTER WIDGET (Di Atas Footer / Bagian Bawah) --}}
<section class="bg-[#111827] text-white py-4 border-t border-gray-800">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 flex flex-col sm:flex-row items-center justify-between gap-3 text-center sm:text-left">
        <div class="flex items-center space-x-3">
            <i class="fa-solid fa-chart-line text-[#FE6000] text-xl"></i>
            <div>
                <span class="text-xs text-gray-400 block font-medium">Statistik Pengunjung Website</span>
                <span class="text-[11px] text-gray-500">Live Visitor Counter DPD PKS Ogan Ilir</span>
            </div>
        </div>
        <div class="bg-black/60 border border-gray-700 px-5 py-1.5 rounded-lg flex items-center space-x-3 shadow-inner">
            <span class="text-xs font-semibold text-gray-400 uppercase tracking-wider">Total Hits:</span>
            <span class="text-lg sm:text-xl font-mono font-extrabold text-[#FE6000] tracking-widest">
                {{ $visitorHits }}
            </span>
        </div>
    </div>
</section>
@endsection
