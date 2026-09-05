@extends('layouts.frontend')

@section('title', 'Struktur Kepengurusan - DPD PKS Ogan Ilir')
@section('meta_description', 'Struktur Kepengurusan DPTD dan DPD Partai Keadilan Sejahtera Kabupaten Ogan Ilir periode 2025-2030.')

@section('content')
{{-- HERO HEADER --}}
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <span>Profil</span>
            <span>/</span>
            <span class="text-[#fdb913]">Struktur Kepengurusan</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Struktur Kepengurusan</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">
            Susunan Dewan Pengurus Tingkat Daerah (DPTD), Bidang Kerja DPD, dan DPC se-Kabupaten Ogan Ilir.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 space-y-16">
    
    {{-- SEKSI 1: BAGAN STRUKTUR GAMBAR BESAR --}}
    <section class="bg-white p-6 sm:p-12 rounded-3xl shadow-xl border border-gray-100 text-center reveal-fade-up">
        <div class="max-w-2xl mx-auto mb-8">
            <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider block">Bagan Resmi</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight mt-1">
                STRUKTUR KEPENGURUSAN
            </h2>
            <p class="text-sm sm:text-base font-semibold text-gray-600 mt-1">DPTD PKS Ogan Ilir</p>
            <div class="w-16 h-1 bg-[#f37023] mx-auto rounded-full mt-3"></div>
        </div>

        <div class="rounded-2xl overflow-hidden shadow-lg border border-gray-200 inline-block max-w-5xl mx-auto bg-gray-50 group relative">
            <img src="/uploads/2025/09/Struktur-Kepengurusan-scaled.webp" alt="Struktur Kepengurusan DPTD PKS Ogan Ilir" class="w-full h-auto transition duration-500 group-hover:scale-[1.02]" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
            <div class="absolute bottom-4 right-4">
                <a href="/uploads/2025/09/Struktur-Kepengurusan-scaled.webp" target="_blank" class="bg-black/70 hover:bg-black text-white px-4 py-2 rounded-xl text-xs font-bold backdrop-blur-sm shadow transition flex items-center space-x-1.5">
                    <i class="fa-solid fa-magnifying-glass-plus"></i>
                    <span>Perbesar Bagan</span>
                </a>
            </div>
        </div>
    </section>

    {{-- SEKSI 2: PIMPINAN DPTD PKS OGAN ILIR GRID --}}
    <section class="bg-white p-8 sm:p-12 rounded-3xl shadow-xl border border-gray-100 reveal-fade-up">
        <div class="text-center max-w-2xl mx-auto mb-10">
            <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider block">Pimpinan Tingkat Daerah</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight mt-1">
                Dewan Pimpinan Tingkat Daerah (DPTD)
            </h2>
            <p class="text-xs sm:text-sm text-gray-500 mt-1">Unsur Majelis Pertimbangan Daerah (MPD), Dewan Pengurus Daerah (DPD), dan Dewan Etik Daerah (DED).</p>
            <div class="w-16 h-1 bg-[#f37023] mx-auto rounded-full mt-3"></div>
        </div>

        @php
            $dptdLeaders = [
                [
                    'name' => 'Salamuddin, S.Si',
                    'role' => 'Ketua MPD PKS Ogan Ilir',
                    'desc' => 'Majelis Pertimbangan Daerah',
                    'photo' => '/uploads/2023/08/user-2.webp',
                    'badge_bg' => 'bg-amber-100 text-amber-800'
                ],
                [
                    'name' => 'H. HUSNUL ANAM, S.HI',
                    'role' => 'Ketua DPD PKS Ogan Ilir',
                    'desc' => 'Dewan Pengurus Daerah',
                    'photo' => '/uploads/2025/09/DPD-Profile-2.webp',
                    'badge_bg' => 'bg-orange-100 text-[#f37023]'
                ],
                [
                    'name' => 'H. Sunoto Anam',
                    'role' => 'Ketua DED PKS Ogan Ilir',
                    'desc' => 'Dewan Etik Daerah',
                    'photo' => '/uploads/2023/08/user-2.webp',
                    'badge_bg' => 'bg-emerald-100 text-emerald-800'
                ],
                [
                    'name' => 'Hardi Aji Badarwi, S.Si',
                    'role' => 'Sekretaris MPD PKS Ogan Ilir',
                    'desc' => 'Majelis Pertimbangan Daerah',
                    'photo' => '/uploads/2023/08/user-2.webp',
                    'badge_bg' => 'bg-amber-100 text-amber-800'
                ],
                [
                    'name' => 'Eko Priyono, S.PI',
                    'role' => 'Sekretaris DPD PKS Ogan Ilir',
                    'desc' => 'Dewan Pengurus Daerah',
                    'photo' => '/uploads/2023/08/user-2.webp',
                    'badge_bg' => 'bg-orange-100 text-[#f37023]'
                ],
                [
                    'name' => 'H. Ahmadi Abdullah Azzim, Lc.,MA.ED',
                    'role' => 'Sekretaris DED PKS Ogan Ilir',
                    'desc' => 'Dewan Etik Daerah',
                    'photo' => '/uploads/2023/08/user-2.webp',
                    'badge_bg' => 'bg-emerald-100 text-emerald-800'
                ],
                [
                    'name' => 'Abdul Muhaimin, S.Sos.I.,M.Si',
                    'role' => 'Ketua Bidang Kaderisasi',
                    'desc' => 'DPD PKS Ogan Ilir',
                    'photo' => '/uploads/2023/08/user-2.webp',
                    'badge_bg' => 'bg-blue-100 text-blue-800'
                ],
            ];
        @endphp

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($dptdLeaders as $leader)
                <div class="bg-gray-50/80 rounded-2xl p-6 border border-gray-200/80 hover:border-orange-300 hover:shadow-lg transition transform hover:-translate-y-1 text-center flex flex-col justify-between space-y-4 group">
                    <div class="space-y-3">
                        <div class="w-24 h-24 sm:w-28 sm:h-28 mx-auto rounded-full overflow-hidden border-4 border-white shadow-md bg-white">
                            <img src="{{ $leader['photo'] }}" alt="{{ $leader['name'] }}" class="w-full h-full object-cover group-hover:scale-105 transition" onerror="this.src='/uploads/2023/08/user-2.webp'">
                        </div>
                        <div>
                            <span class="inline-block {{ $leader['badge_bg'] }} text-[10px] font-bold px-2.5 py-0.5 rounded-full uppercase tracking-wider mb-1.5">
                                {{ $leader['desc'] }}
                            </span>
                            <h3 class="font-extrabold text-sm sm:text-base text-gray-900 group-hover:text-[#f37023] transition leading-snug">
                                {{ $leader['name'] }}
                            </h3>
                            <p class="text-xs text-gray-500 font-medium mt-1">{{ $leader['role'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- SEKSI 3: BIDANG-BIDANG DPD --}}
    <section class="bg-white p-8 sm:p-12 rounded-3xl shadow-xl border border-gray-100 reveal-fade-up">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 mb-8">
            <div>
                <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider block">Unit Kerja Pelayanan</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight mt-1">Bidang-Bidang DPD PKS Ogan Ilir</h2>
            </div>
            <a href="{{ route('bidang.index') }}" class="inline-flex items-center text-xs font-bold text-[#f37023] hover:underline flex-shrink-0">
                <span>Lihat Selengkapnya</span>
                <i class="fa-solid fa-arrow-right ml-1.5 text-[10px]"></i>
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($bidangs as $b)
                <a href="{{ route('bidang.show', $b->slug) }}" class="p-5 rounded-2xl border border-gray-100 hover:border-[#f37023] hover:shadow-md transition group bg-gray-50/80 flex items-start space-x-4">
                    <div class="w-12 h-12 rounded-xl bg-orange-100 text-[#f37023] group-hover:bg-[#f37023] group-hover:text-white flex items-center justify-center text-lg flex-shrink-0 transition shadow-inner">
                        <i class="fa-solid fa-layer-group"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-sm text-gray-900 group-hover:text-[#f37023] transition">{{ $b->name }}</h3>
                        <p class="text-xs text-gray-500 mt-1 line-clamp-2 leading-relaxed">{{ Str::limit(strip_tags($b->description), 80) }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    {{-- SEKSI 4: DPC SE-KABUPATEN OGAN ILIR --}}
    <section class="bg-white p-8 sm:p-12 rounded-3xl shadow-xl border border-gray-100 reveal-fade-up">
        <div class="mb-8">
            <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider block">Kepengurusan Tingkat Kecamatan</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight mt-1">
                Dewan Pengurus Cabang (DPC) Se-Ogan Ilir
            </h2>
            <p class="text-xs sm:text-sm text-gray-500 mt-1">Struktur kepengurusan di 16 kecamatan Kabupaten Ogan Ilir yang mengakar di tengah masyarakat.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            @foreach($dpcs as $dpc)
                <div class="p-4 rounded-xl border border-gray-100 bg-gray-50/80 flex items-center space-x-3 hover:border-orange-200 transition">
                    <div class="w-9 h-9 rounded-lg bg-[#f37023] text-white flex items-center justify-center font-bold text-xs flex-shrink-0 shadow">
                        <i class="fa-solid fa-building-flag"></i>
                    </div>
                    <div class="overflow-hidden">
                        <h3 class="font-bold text-xs sm:text-sm text-gray-900 truncate">{{ $dpc->name }}</h3>
                        <span class="text-[11px] text-gray-500 block truncate">{{ $dpc->address ?: 'Kecamatan Ogan Ilir' }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

</div>
@endsection
