@extends('layouts.frontend')

@section('title', 'DPD PKS Ogan Ilir - Berkhidmat untuk Rakyat')

@section('content')
{{-- HERO CAROUSEL SLIDER --}}
<section class="relative bg-gray-900 overflow-hidden" x-data="{
    activeSlide: 0,
    slides: {{ Js::from($heroSlides) }},
    autoSlide() {
        setInterval(() => {
            this.activeSlide = (this.activeSlide + 1) % this.slides.length;
        }, 6000);
    }
}" x-init="autoSlide()">
    <div class="relative h-[480px] sm:h-[550px] lg:h-[600px] w-full overflow-hidden">
        <template x-for="(slide, index) in slides" :key="index">
            <div x-show="activeSlide === index" 
                 x-transition:enter="transition ease-out duration-700" 
                 x-transition:enter-start="opacity-0 scale-105" 
                 x-transition:enter-end="opacity-100 scale-100" 
                 x-transition:leave="transition ease-in duration-500" 
                 x-transition:leave-start="opacity-100" 
                 x-transition:leave-end="opacity-0" 
                 class="absolute inset-0">
                
                {{-- Background Image with Overlay --}}
                <img :src="slide.image" :alt="slide.title" class="w-full h-full object-cover object-center brightness-60">
                <div class="absolute inset-0 bg-gradient-to-r from-black/80 via-black/50 to-transparent"></div>

                {{-- Hero Content --}}
                <div class="absolute inset-0 flex items-center">
                    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                        <div class="max-w-2xl text-white space-y-4 sm:space-y-6">
                            <span class="inline-block bg-[#f37023] text-white text-xs uppercase font-bold tracking-wider px-3.5 py-1.5 rounded-full shadow-sm">
                                DPD PKS Kabupaten Ogan Ilir
                            </span>
                            <h1 class="text-2xl sm:text-4xl lg:text-5xl font-extrabold tracking-tight leading-tight" x-text="slide.title"></h1>
                            <p class="text-sm sm:text-base lg:text-lg text-gray-200 font-light leading-relaxed" x-text="slide.subtitle"></p>
                            <div class="pt-2 flex flex-wrap gap-3">
                                <a :href="slide.btn_link" class="inline-flex items-center bg-[#f37023] hover:bg-[#d85c14] text-white px-6 py-3 rounded-full font-semibold text-sm shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 transition duration-200">
                                    <span x-text="slide.btn_text"></span>
                                    <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                                </a>
                                <a href="{{ route('artikel.index') }}" class="inline-flex items-center bg-white/20 hover:bg-white/30 backdrop-blur text-white border border-white/30 px-5 py-3 rounded-full font-semibold text-sm transition">
                                    <i class="fa-solid fa-newspaper mr-2"></i> Berita Terkini
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>

    {{-- Carousel Controls (Prev/Next) --}}
    <button @click="activeSlide = (activeSlide - 1 + slides.length) % slides.length" class="absolute left-4 top-1/2 -translate-y-1/2 bg-black/40 hover:bg-[#f37023] text-white w-10 h-10 rounded-full flex items-center justify-center transition backdrop-blur" aria-label="Previous Slide">
        <i class="fa-solid fa-chevron-left"></i>
    </button>
    <button @click="activeSlide = (activeSlide + 1) % slides.length" class="absolute right-4 top-1/2 -translate-y-1/2 bg-black/40 hover:bg-[#f37023] text-white w-10 h-10 rounded-full flex items-center justify-center transition backdrop-blur" aria-label="Next Slide">
        <i class="fa-solid fa-chevron-right"></i>
    </button>

    {{-- Dots Navigation --}}
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex space-x-2.5 z-20">
        <template x-for="(slide, idx) in slides" :key="idx">
            <button @click="activeSlide = idx" class="h-2.5 rounded-full transition-all duration-300" :class="activeSlide === idx ? 'w-8 bg-[#f37023]' : 'w-2.5 bg-white/60 hover:bg-white'"></button>
        </template>
    </div>
</section>

{{-- QUICK ACTION MENU CARDS (Menu Utama) --}}
<section class="py-10 bg-white border-b border-gray-100 shadow-sm relative z-20 -mt-8 sm:-mt-12 max-w-6xl mx-auto rounded-2xl px-4 sm:px-6">
    <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-8 gap-4 text-center">
        <a href="{{ route('download.index') }}" class="group p-3 rounded-xl hover:bg-orange-50 transition transform hover:-translate-y-1">
            <div class="w-12 h-12 mx-auto rounded-full bg-orange-100 text-[#f37023] group-hover:bg-[#f37023] group-hover:text-white flex items-center justify-center text-lg mb-2 transition">
                <i class="fa-solid fa-download"></i>
            </div>
            <span class="text-xs font-semibold text-gray-800 group-hover:text-[#f37023]">Download</span>
        </a>
        <a href="{{ route('donasi') }}" class="group p-3 rounded-xl hover:bg-orange-50 transition transform hover:-translate-y-1">
            <div class="w-12 h-12 mx-auto rounded-full bg-orange-100 text-[#f37023] group-hover:bg-[#f37023] group-hover:text-white flex items-center justify-center text-lg mb-2 transition">
                <i class="fa-solid fa-hand-holding-dollar"></i>
            </div>
            <span class="text-xs font-semibold text-gray-800 group-hover:text-[#f37023]">Donasi</span>
        </a>
        <a href="{{ route('page.struktur') }}" class="group p-3 rounded-xl hover:bg-orange-50 transition transform hover:-translate-y-1">
            <div class="w-12 h-12 mx-auto rounded-full bg-orange-100 text-[#f37023] group-hover:bg-[#f37023] group-hover:text-white flex items-center justify-center text-lg mb-2 transition">
                <i class="fa-solid fa-sitemap"></i>
            </div>
            <span class="text-xs font-semibold text-gray-800 group-hover:text-[#f37023]">Struktur</span>
        </a>
        <a href="{{ route('artikel.index') }}" class="group p-3 rounded-xl hover:bg-orange-50 transition transform hover:-translate-y-1">
            <div class="w-12 h-12 mx-auto rounded-full bg-orange-100 text-[#f37023] group-hover:bg-[#f37023] group-hover:text-white flex items-center justify-center text-lg mb-2 transition">
                <i class="fa-solid fa-newspaper"></i>
            </div>
            <span class="text-xs font-semibold text-gray-800 group-hover:text-[#f37023]">Berita</span>
        </a>
        <a href="{{ route('bidang.index') }}" class="group p-3 rounded-xl hover:bg-orange-50 transition transform hover:-translate-y-1">
            <div class="w-12 h-12 mx-auto rounded-full bg-orange-100 text-[#f37023] group-hover:bg-[#f37023] group-hover:text-white flex items-center justify-center text-lg mb-2 transition">
                <i class="fa-solid fa-layer-group"></i>
            </div>
            <span class="text-xs font-semibold text-gray-800 group-hover:text-[#f37023]">Bidang</span>
        </a>
        <a href="{{ route('dewan.index') }}" class="group p-3 rounded-xl hover:bg-orange-50 transition transform hover:-translate-y-1">
            <div class="w-12 h-12 mx-auto rounded-full bg-orange-100 text-[#f37023] group-hover:bg-[#f37023] group-hover:text-white flex items-center justify-center text-lg mb-2 transition">
                <i class="fa-solid fa-user-tie"></i>
            </div>
            <span class="text-xs font-semibold text-gray-800 group-hover:text-[#f37023]">Dewan</span>
        </a>
        <a href="{{ route('video.index') }}" class="group p-3 rounded-xl hover:bg-orange-50 transition transform hover:-translate-y-1">
            <div class="w-12 h-12 mx-auto rounded-full bg-orange-100 text-[#f37023] group-hover:bg-[#f37023] group-hover:text-white flex items-center justify-center text-lg mb-2 transition">
                <i class="fa-brands fa-youtube"></i>
            </div>
            <span class="text-xs font-semibold text-gray-800 group-hover:text-[#f37023]">Video</span>
        </a>
        <a href="{{ route('hubungi') }}" class="group p-3 rounded-xl hover:bg-orange-50 transition transform hover:-translate-y-1">
            <div class="w-12 h-12 mx-auto rounded-full bg-orange-100 text-[#f37023] group-hover:bg-[#f37023] group-hover:text-white flex items-center justify-center text-lg mb-2 transition">
                <i class="fa-solid fa-comments"></i>
            </div>
            <span class="text-xs font-semibold text-gray-800 group-hover:text-[#f37023]">Kontak</span>
        </a>
    </div>
</section>

{{-- SAMBUTAN KETUA DPD SECTION --}}
<section class="py-16 bg-gradient-to-b from-white to-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-3xl p-6 sm:p-10 lg:p-12 shadow-xl border border-gray-100 flex flex-col lg:flex-row items-center gap-10">
            
            {{-- Foto Ketua --}}
            <div class="w-full lg:w-1/3 flex flex-col items-center">
                <div class="relative w-64 h-64 sm:w-72 sm:h-72 rounded-2xl overflow-hidden shadow-2xl border-4 border-white ring-4 ring-[#f37023]/20">
                    <img src="/uploads/2025/09/58.webp" alt="Ketua DPD PKS Ogan Ilir" class="w-full h-full object-cover object-top" onerror="this.src='/uploads/2024/01/cd1787310f135df61a8832283565af3b.webp'">
                </div>
                <div class="mt-4 text-center">
                    <h3 class="font-bold text-lg text-gray-900">Ketua DPD PKS Ogan Ilir</h3>
                    <p class="text-xs text-[#f37023] font-semibold">Dewan Pengurus Daerah PKS Ogan Ilir</p>
                </div>
            </div>

            {{-- Teks Sambutan --}}
            <div class="w-full lg:w-2/3 space-y-4">
                <div class="inline-flex items-center space-x-2 text-[#f37023] font-semibold text-xs uppercase tracking-wider">
                    <i class="fa-solid fa-quote-left"></i>
                    <span>Kata Sambutan Pimpinan</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 leading-snug">
                    Selamat Datang di Official Website DPD PKS Kabupaten Ogan Ilir
                </h2>
                <div class="text-gray-600 text-sm sm:text-base leading-relaxed space-y-3 font-light">
                    <p>
                        Puji syukur senantiasa kita panjatkan ke hadirat Allah SWT atas segala limpahan rahmat dan karunia-Nya. Website ini kami hadirkan sebagai sarana komunikasi, transparansi informasi, serta wadah interaksi antara DPD PKS Ogan Ilir dengan seluruh masyarakat.
                    </p>
                    <p>
                        Sebagai partai yang berkhidmat untuk rakyat, kami terus berkomitmen untuk memperjuangkan aspirasi masyarakat Ogan Ilir di berbagai sektor, baik pendidikan, kesehatan, pertanian, UMKM, maupun keagamaan.
                    </p>
                </div>
                <div class="pt-3">
                    <a href="{{ route('page.sambutan') }}" class="inline-flex items-center bg-[#f37023] hover:bg-[#d85c14] text-white px-6 py-2.5 rounded-full font-semibold text-sm shadow transition">
                        <span>Baca Sambutan Selengkapnya</span>
                        <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- BERITA & ARTIKEL TERKINI --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Section Header --}}
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-12 gap-4">
            <div>
                <div class="text-[#f37023] font-semibold text-xs uppercase tracking-wider mb-1">Kabar & Informasi Terkini</div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight">Berita & Artikel Terkini</h2>
            </div>
            <a href="{{ route('artikel.index') }}" class="inline-flex items-center text-sm font-semibold text-[#f37023] hover:text-[#d85c14] transition">
                <span>Lihat Semua Berita</span>
                <i class="fa-solid fa-arrow-right ml-2 text-xs"></i>
            </a>
        </div>

        {{-- News Grid (6 Items) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @forelse($latestPosts as $post)
                <article class="bg-white rounded-2xl overflow-hidden border border-gray-100 shadow-md hover:shadow-xl transition-all duration-300 flex flex-col group transform hover:-translate-y-1">
                    
                    {{-- Featured Image --}}
                    <a href="{{ route('artikel.show', $post->slug) }}" class="block relative h-52 overflow-hidden bg-gray-100">
                        @if($post->featured_image)
                            <img src="{{ $post->featured_image }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-500" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
                        @else
                            <img src="/uploads/2025/09/logo-thumbnail.webp" alt="{{ $post->title }}" class="w-full h-full object-cover">
                        @endif
                        
                        {{-- Category Badge --}}
                        @if($post->categories->isNotEmpty())
                            <span class="absolute top-3 left-3 bg-[#f37023] text-white text-[11px] font-semibold px-2.5 py-1 rounded-full shadow-sm">
                                {{ $post->categories->first()->name }}
                            </span>
                        @endif
                    </a>

                    {{-- Post Body --}}
                    <div class="p-6 flex-grow flex flex-col justify-between space-y-3">
                        <div>
                            {{-- Meta Date & Author --}}
                            <div class="flex items-center text-xs text-gray-400 space-x-3 mb-2">
                                <span class="flex items-center">
                                    <i class="fa-regular fa-calendar mr-1.5 text-[#f37023]"></i>
                                    {{ $post->published_at ? $post->published_at->translatedFormat('d M Y') : '-' }}
                                </span>
                                <span>&bull;</span>
                                <span class="flex items-center">
                                    <i class="fa-regular fa-eye mr-1.5"></i>
                                    {{ number_format($post->views_count) }}
                                </span>
                            </div>

                            {{-- Title --}}
                            <h3 class="font-bold text-gray-900 text-base line-clamp-2 group-hover:text-[#f37023] transition">
                                <a href="{{ route('artikel.show', $post->slug) }}">{{ $post->title }}</a>
                            </h3>

                            {{-- Excerpt --}}
                            <p class="text-xs text-gray-500 line-clamp-3 mt-2 leading-relaxed font-light">
                                {{ $post->excerpt }}
                            </p>
                        </div>

                        {{-- Read more link --}}
                        <div class="pt-2 border-t border-gray-50">
                            <a href="{{ route('artikel.show', $post->slug) }}" class="inline-flex items-center text-xs font-semibold text-[#f37023] hover:text-[#d85c14]">
                                <span>Selengkapnya</span>
                                <i class="fa-solid fa-arrow-right ml-1 text-[10px]"></i>
                            </a>
                        </div>
                    </div>
                </article>
            @empty
                <div class="col-span-3 text-center py-12 text-gray-400">
                    <p>Belum ada artikel yang diterbitkan.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

{{-- AGENDA & PENGUMUMAN SECTION --}}
<section class="py-16 bg-gray-50 border-t border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            
            {{-- Agenda Kegiatan --}}
            <div>
                <div class="flex justify-between items-center mb-6">
                    <div class="flex items-center space-x-2">
                        <div class="w-2.5 h-6 bg-[#f37023] rounded-full"></div>
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Agenda Kegiatan</h2>
                    </div>
                    <a href="{{ route('agenda.index') }}" class="text-xs font-semibold text-[#f37023] hover:underline">Semua Agenda &rarr;</a>
                </div>

                <div class="space-y-4">
                    @forelse($agendas as $agenda)
                        <div class="bg-white p-4 rounded-xl shadow-sm hover:shadow border border-gray-100 flex items-start space-x-4 transition">
                            <div class="bg-orange-50 border border-orange-200 rounded-lg p-3 text-center flex-shrink-0 w-16">
                                <span class="block text-lg font-extrabold text-[#f37023]">
                                    {{ $agenda->event_date ? $agenda->event_date->format('d') : '01' }}
                                </span>
                                <span class="block text-[10px] uppercase font-bold text-gray-500">
                                    {{ $agenda->event_date ? $agenda->event_date->format('M Y') : '2026' }}
                                </span>
                            </div>
                            <div class="flex-grow">
                                <h3 class="font-bold text-sm text-gray-900 hover:text-[#f37023] transition">
                                    <a href="{{ route('agenda.show', $agenda->slug) }}">{{ $agenda->title }}</a>
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 flex items-center">
                                    <i class="fa-solid fa-location-dot mr-1.5 text-gray-400"></i>
                                    <span>{{ $agenda->location ?: 'Kabupaten Ogan Ilir' }}</span>
                                </p>
                            </div>
                        </div>
                    @empty
                        <p class="text-xs text-gray-400">Tidak ada agenda saat ini.</p>
                    @endforelse
                </div>
            </div>

            {{-- Pengumuman Resmi --}}
            <div>
                <div class="flex justify-between items-center mb-6">
                    <div class="flex items-center space-x-2">
                        <div class="w-2.5 h-6 bg-[#fdb913] rounded-full"></div>
                        <h2 class="text-xl sm:text-2xl font-bold text-gray-900">Pengumuman Resmi</h2>
                    </div>
                    <a href="{{ route('pengumuman.index') }}" class="text-xs font-semibold text-[#f37023] hover:underline">Semua Pengumuman &rarr;</a>
                </div>

                <div class="space-y-4">
                    @forelse($announcements as $item)
                        <div class="bg-white p-4 rounded-xl shadow-sm hover:shadow border border-gray-100 flex items-start space-x-4 transition">
                            <div class="w-10 h-10 rounded-lg bg-yellow-50 border border-yellow-200 flex items-center justify-center text-[#fdb913] flex-shrink-0">
                                <i class="fa-solid fa-bullhorn"></i>
                            </div>
                            <div class="flex-grow">
                                <h3 class="font-bold text-sm text-gray-900 hover:text-[#f37023] transition">
                                    <a href="{{ route('pengumuman.show', $item->slug) }}">{{ $item->title }}</a>
                                </h3>
                                <p class="text-xs text-gray-500 mt-1 line-clamp-1">
                                    {{ Str::limit(strip_tags($item->content), 80) }}
                                </p>
                            </div>
                        </div>
                    @empty
                        <p class="text-xs text-gray-400">Tidak ada pengumuman saat ini.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>

{{-- GALERI VIDEO --}}
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-end mb-10 gap-4">
            <div>
                <div class="text-[#f37023] font-semibold text-xs uppercase tracking-wider mb-1">Dokumentasi & Media</div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900">Galeri Video PKS TV</h2>
            </div>
            <a href="{{ route('video.index') }}" class="text-sm font-semibold text-[#f37023] hover:underline">Lihat Semua Video &rarr;</a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            @forelse($videos as $vid)
                <div class="bg-white rounded-2xl overflow-hidden shadow-md border border-gray-100 group">
                    <div class="relative pb-[56.25%] h-0 bg-black overflow-hidden">
                        @if($vid->youtube_id)
                            <iframe class="absolute top-0 left-0 w-full h-full" 
                                    src="https://www.youtube.com/embed/{{ $vid->youtube_id }}" 
                                    title="{{ $vid->title }}" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen></iframe>
                        @else
                            <div class="absolute inset-0 flex items-center justify-center text-white">
                                <i class="fa-brands fa-youtube text-4xl text-red-500"></i>
                            </div>
                        @endif
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-sm text-gray-900 line-clamp-2">{{ $vid->title }}</h3>
                    </div>
                </div>
            @empty
                <div class="col-span-3 text-center py-8 text-gray-400">Belum ada video.</div>
            @endforelse
        </div>
    </div>
</section>

{{-- SUARA MASYARAKAT / TESTIMONIAL --}}
<section class="py-16 bg-gray-50 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider">Aspirasi & Testimoni</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mt-1">Suara Masyarakat Ogan Ilir</h2>
            <p class="text-xs sm:text-sm text-gray-500 mt-2">Kesan dan harapan masyarakat terhadap khidmat PKS di Kabupaten Ogan Ilir.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($testimonials as $testi)
                <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex flex-col justify-between space-y-4 hover:shadow-md transition">
                    <div class="space-y-2">
                        <i class="fa-solid fa-quote-left text-2xl text-orange-200"></i>
                        <p class="text-xs text-gray-600 italic leading-relaxed">
                            "{{ $testi->content }}"
                        </p>
                    </div>
                    <div class="flex items-center space-x-3 pt-3 border-t border-gray-50">
                        <div class="w-10 h-10 rounded-full bg-orange-100 text-[#f37023] font-bold flex items-center justify-center flex-shrink-0 overflow-hidden">
                            @if($testi->photo)
                                <img src="{{ $testi->photo }}" alt="{{ $testi->name }}" class="w-full h-full object-cover" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
                            @else
                                {{ substr($testi->name, 0, 1) }}
                            @endif
                        </div>
                        <div>
                            <span class="block font-bold text-xs text-gray-900">{{ $testi->name }}</span>
                            <span class="block text-[11px] text-gray-400">{{ $testi->profession }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

{{-- CALL TO ACTION BANNER --}}
<section class="py-12 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <a href="https://daftar.pks.id" target="_blank" class="block rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition transform hover:-translate-y-1">
                <img src="/uploads/2025/09/banner_daftar_pks.webp" alt="Daftar Anggota PKS" class="w-full h-auto object-cover">
            </a>
            <a href="{{ route('donasi') }}" class="block rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition transform hover:-translate-y-1">
                <img src="/uploads/2025/09/banner_donasi_pks.webp" alt="Donasi DPD PKS Ogan Ilir" class="w-full h-auto object-cover">
            </a>
        </div>
    </div>
</section>
@endsection
