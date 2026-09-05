@extends('layouts.frontend')

@section('title', 'Visi dan Misi - DPD PKS Ogan Ilir')
@section('meta_description', 'Visi dan Misi resmi Dewan Pengurus Daerah Partai Keadilan Sejahtera Kabupaten Ogan Ilir.')

@section('content')
{{-- HERO HEADER --}}
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <span>Profil</span>
            <span>/</span>
            <span class="text-[#fdb913]">Visi dan Misi</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Visi & Misi PKS</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">
            Arah perjuangan, cita-cita luhur, dan komitmen pengabdian bagi rakyat Kabupaten Ogan Ilir dan Negara Kesatuan Republik Indonesia.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
        
        {{-- KOLOM UTAMA (2/3) --}}
        <div class="lg:col-span-8 space-y-8">
            
            {{-- KARTU VISI --}}
            <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-xl border border-gray-100 reveal-fade-up">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-12 h-12 rounded-2xl bg-orange-100 text-[#f37023] flex items-center justify-center text-2xl flex-shrink-0 shadow-inner">
                        <i class="fa-solid fa-compass"></i>
                    </div>
                    <div>
                        <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider block">Falsafah Arah</span>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight">Visi Partai</h2>
                    </div>
                </div>
                <div class="w-16 h-1 bg-[#f37023] rounded-full mb-6"></div>

                <div class="bg-gradient-to-r from-orange-50/80 to-amber-50/80 p-6 sm:p-8 rounded-2xl border-l-4 border-[#f37023] shadow-sm">
                    <p class="text-lg sm:text-xl font-bold text-gray-900 leading-relaxed font-serif italic text-center sm:text-left">
                        “Menjadi Partai Islam rahmatan lil ‘alamin yang kokoh dan terdepan dalam melayani rakyat dan Negara Kesatuan Republik Indonesia.”
                    </p>
                </div>
            </div>

            {{-- KARTU MISI --}}
            <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-xl border border-gray-100 reveal-fade-up delay-1">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-600 flex items-center justify-center text-2xl flex-shrink-0 shadow-inner">
                        <i class="fa-solid fa-list-check"></i>
                    </div>
                    <div>
                        <span class="text-xs font-bold text-amber-600 uppercase tracking-wider block">Langkah Konkret</span>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight">Misi Partai</h2>
                    </div>
                </div>
                <div class="w-16 h-1 bg-amber-500 rounded-full mb-8"></div>

                <div class="space-y-6">
                    {{-- Misi 1 --}}
                    <div class="flex items-start space-x-4 p-5 rounded-2xl bg-gray-50/80 border border-gray-100 hover:border-orange-200 transition">
                        <div class="w-9 h-9 rounded-xl bg-[#f37023] text-white flex items-center justify-center font-extrabold text-sm flex-shrink-0 shadow">
                            1
                        </div>
                        <div class="space-y-1">
                            <h3 class="font-bold text-sm sm:text-base text-gray-900">Kaderisasi & Kepemimpinan Berakhlak Mulia</h3>
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                Meningkatkan pertumbuhan jumlah Anggota Partai dan mengokohkan integritas, solidaritas, akseptabilitas, profesionalitas untuk menghadirkan kepemimpinan bangsa yang beriman dan bertakwa serta berakhlak mulia.
                            </p>
                        </div>
                    </div>

                    {{-- Misi 2 --}}
                    <div class="flex items-start space-x-4 p-5 rounded-2xl bg-gray-50/80 border border-gray-100 hover:border-orange-200 transition">
                        <div class="w-9 h-9 rounded-xl bg-gray-800 text-white flex items-center justify-center font-extrabold text-sm flex-shrink-0 shadow">
                            2
                        </div>
                        <div class="space-y-1">
                            <h3 class="font-bold text-sm sm:text-base text-gray-900">Soliditas Partai Modern & Terbuka</h3>
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                Mengokohkan soliditas Partai berskala nasional, mandiri, dan terbuka agar mampu menjalankan fungsi edukasi, advokasi, kaderisasi kepemimpinan, serta menerapkan sistem manajemen partai modern untuk meningkatkan sinergi, kinerja, dan kredibilitas.
                            </p>
                        </div>
                    </div>

                    {{-- Misi 3 --}}
                    <div class="flex items-start space-x-4 p-5 rounded-2xl bg-gray-50/80 border border-gray-100 hover:border-orange-200 transition">
                        <div class="w-9 h-9 rounded-xl bg-amber-500 text-white flex items-center justify-center font-extrabold text-sm flex-shrink-0 shadow">
                            3
                        </div>
                        <div class="space-y-1">
                            <h3 class="font-bold text-sm sm:text-base text-gray-900">Kepeloporan Pelayanan & Ketahanan Keluarga</h3>
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                Meningkatkan kepeloporan Partai dalam pelayanan, pemberdayaan, dan pembelajaran terhadap ketaatan keluarga, pemuda, kepentingan masyarakat, dan lingkungan hidup, serta memperkuat kemitraan strategis di berbagai sektor pengabdian untuk meningkatkan kualitas kehidupan yang produktif, inovatif, dan patriotik.
                            </p>
                        </div>
                    </div>

                    {{-- Misi 4 --}}
                    <div class="flex items-start space-x-4 p-5 rounded-2xl bg-gray-50/80 border border-gray-100 hover:border-orange-200 transition">
                        <div class="w-9 h-9 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-extrabold text-sm flex-shrink-0 shadow">
                            4
                        </div>
                        <div class="space-y-1">
                            <h3 class="font-bold text-sm sm:text-base text-gray-900">Pemenangan Pemilu 2029 & Kebijakan Publik Bersih</h3>
                            <p class="text-xs sm:text-sm text-gray-600 leading-relaxed">
                                Memenangkan Pemilu 2029 dan meningkatkan kontribusi Partai dalam mengagas dan memperjuangkan kebijakan publik yang berpihak kepada kemakmuran rakyat, bangsa, dan negara yang bersih dari korupsi, kolusi, dan nepotisme, serta turut berperan dalam pengembangan demokratisasi di kawasan, dan pengembangan kerjasama internasional untuk memperkokoh posisi Indonesia.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- SIDEBAR KANAN (1/3) --}}
        <div class="lg:col-span-4 space-y-8">
            
            {{-- WIDGET ARTIKEL & BERITA TERBARU --}}
            <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-xl border border-gray-100 reveal-fade-up">
                <div class="flex items-center justify-between pb-4 border-b border-gray-100 mb-6">
                    <h3 class="font-extrabold text-gray-900 text-base">Artikel & Berita</h3>
                    <a href="{{ route('artikel.index') }}" class="text-xs font-bold text-[#f37023] hover:underline">
                        Lihat Semua &rarr;
                    </a>
                </div>

                <div class="space-y-4">
                    @forelse($latestPosts ?? [] as $lp)
                        <a href="{{ route('artikel.show', $lp->slug) }}" class="flex items-center space-x-3 group">
                            <div class="w-16 h-16 rounded-xl overflow-hidden bg-gray-100 flex-shrink-0">
                                <img src="{{ $lp->featured_image }}" alt="{{ $lp->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-300" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-gray-800 group-hover:text-[#f37023] transition line-clamp-2 leading-snug">
                                    {{ $lp->title }}
                                </h4>
                                <span class="text-[11px] text-gray-400 block mt-1">
                                    {{ $lp->post_date ? \Carbon\Carbon::parse($lp->post_date)->translatedFormat('d M Y') : '' }}
                                </span>
                            </div>
                        </a>
                    @empty
                        <p class="text-xs text-gray-400 text-center py-4">Belum ada berita terbaru.</p>
                    @endforelse
                </div>
            </div>

            {{-- WIDGET AGENDA --}}
            <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-xl border border-gray-100 reveal-fade-up delay-1">
                <div class="flex items-center justify-between pb-4 border-b border-gray-100 mb-6">
                    <h3 class="font-extrabold text-gray-900 text-base">Agenda Terjadwal</h3>
                    <a href="{{ route('agenda.index') }}" class="text-xs font-bold text-[#f37023] hover:underline">
                        Lihat Semua &rarr;
                    </a>
                </div>

                <div class="space-y-4">
                    @forelse($latestAgendas ?? [] as $la)
                        <a href="{{ route('agenda.show', $la->slug) }}" class="flex items-start space-x-3 group p-3 rounded-xl hover:bg-orange-50/50 transition">
                            <div class="w-12 h-12 rounded-xl bg-orange-100 text-[#f37023] flex flex-col items-center justify-center flex-shrink-0 font-bold text-xs">
                                <span class="text-sm font-extrabold leading-none">{{ $la->post_date ? \Carbon\Carbon::parse($la->post_date)->format('d') : '01' }}</span>
                                <span class="text-[9px] uppercase">{{ $la->post_date ? \Carbon\Carbon::parse($la->post_date)->format('M') : 'PKS' }}</span>
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-gray-800 group-hover:text-[#f37023] transition line-clamp-2 leading-snug">
                                    {{ $la->title }}
                                </h4>
                                <span class="text-[11px] text-gray-400 block mt-1">
                                    <i class="fa-solid fa-location-dot mr-1 text-orange-400"></i> Ogan Ilir
                                </span>
                            </div>
                        </a>
                    @empty
                        <p class="text-xs text-gray-400 text-center py-4">Belum ada agenda terdekat.</p>
                    @endforelse
                </div>
            </div>

            {{-- CTA BANNER JOIN --}}
            <div class="bg-gradient-to-br from-gray-900 via-gray-800 to-black text-white p-6 sm:p-8 rounded-3xl shadow-xl space-y-4 text-center reveal-fade-up delay-2">
                <div class="w-14 h-14 rounded-2xl bg-orange-500/20 text-[#f37023] flex items-center justify-center text-2xl mx-auto border border-orange-500/30">
                    <i class="fa-solid fa-handshake-angle"></i>
                </div>
                <h3 class="text-xl font-extrabold">Mari Bergabung Bersama Kami!</h3>
                <p class="text-xs text-gray-300 leading-relaxed">
                    Wujudkan cita-cita keadilan dan kesejahteraan bersama ribuan kader dan relawan PKS Ogan Ilir.
                </p>
                <div class="pt-2">
                    <a href="https://daftar.pks.id" target="_blank" class="block w-full bg-[#f37023] hover:bg-[#d85c14] text-white py-3 rounded-xl font-bold text-xs shadow-lg transition">
                        Daftar PKS Sekarang
                    </a>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
