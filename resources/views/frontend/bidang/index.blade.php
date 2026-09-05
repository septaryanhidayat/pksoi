@extends('layouts.frontend')

@section('title', 'Bidang-Bidang DPD PKS Ogan Ilir')
@section('meta_description', 'Daftar bidang kerja dan unit pelayanan DPD Partai Keadilan Sejahtera Kabupaten Ogan Ilir.')

@section('content')
{{-- HERO HEADER --}}
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <span>Profil</span>
            <span>/</span>
            <span class="text-[#fdb913]">Bidang DPD</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Bidang-Bidang DPD PKS Ogan Ilir</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">
            Unit kerja struktural penggerak program pelayanan, kaderisasi, advokasi, dan pemenangan partai.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 space-y-12">
    
    <div class="text-center max-w-2xl mx-auto">
        <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider block">Struktur Pelayanan Umat</span>
        <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight mt-1">
            Bidang-Bidang DPD PKS Ogan Ilir
        </h2>
        <div class="w-16 h-1 bg-[#f37023] mx-auto rounded-full mt-3"></div>
    </div>

    @php
        $iconMap = [
            'kaderisasi' => '/uploads/2023/07/Icon-KD2.webp',
            'kepanduan' => '/uploads/2023/08/Icon-OR.webp',
            'keummatan' => '/uploads/2023/08/Icon-Umat.webp',
            'administrasi' => '/uploads/2023/08/Icon-Adm.webp',
            'perempuan' => '/uploads/2023/08/Icon-Family2.webp',
            'pemenangan' => '/uploads/2023/08/Icon-Vote.webp',
            'pemuda' => '/uploads/2023/08/Icon-Pemuda.webp',
            'umkm' => '/uploads/2023/08/Icon-UMKM.webp',
            'humas' => '/uploads/2023/08/Icon-Digi.webp',
            'pekerja' => '/uploads/2023/08/Icon-Pekerja.webp',
        ];
    @endphp

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($bidangs as $idx => $b)
            @php
                $slug = Str::slug($b->name);
                $matchedIcon = '/uploads/2023/08/Icon-KD2.webp';
                foreach ($iconMap as $key => $path) {
                    if (str_contains(strtolower($b->name), $key) || str_contains($slug, $key)) {
                        $matchedIcon = $path;
                        break;
                    }
                }
                $hasCustomIcon = !empty($b->icon);
                $isImage = $b->is_image_icon || (empty($b->icon) && !empty($matchedIcon));
                $displayIcon = $hasCustomIcon ? $b->icon : $matchedIcon;
            @endphp
            <div class="bg-white rounded-3xl overflow-hidden shadow-md border border-gray-100 hover:shadow-2xl transition transform hover:-translate-y-1.5 flex flex-col justify-between group p-6 sm:p-8 reveal-fade-up delay-{{ $idx % 4 }}">
                <div class="space-y-4">
                    <div class="flex items-center justify-between">
                        <span class="text-[10px] font-extrabold uppercase tracking-wider bg-orange-100 text-[#f37023] px-3 py-1 rounded-full">
                            Bidang DPD
                        </span>
                        <div class="w-14 h-14 rounded-2xl bg-orange-50/80 p-2.5 flex items-center justify-center flex-shrink-0 shadow-inner group-hover:scale-110 transition duration-300">
                            @if($isImage)
                                <img src="{{ $displayIcon }}" alt="{{ $b->name }}" class="w-full h-full object-contain" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
                            @else
                                <i class="{{ $displayIcon }} text-2xl text-[#f37023]"></i>
                            @endif
                        </div>
                    </div>

                    <div>
                        <h3 class="font-extrabold text-gray-900 text-lg group-hover:text-[#f37023] transition leading-snug">
                            <a href="{{ route('bidang.show', $b->slug) }}">{{ $b->name }}</a>
                        </h3>
                        <p class="text-xs text-gray-500 mt-2 line-clamp-3 leading-relaxed font-light">
                            {!! strip_tags($b->description) !!}
                        </p>
                    </div>
                </div>

                <div class="pt-6 border-t border-gray-100 flex items-center justify-between text-xs">
                    <a href="{{ route('bidang.show', $b->slug) }}" class="inline-flex items-center font-bold text-[#f37023] group-hover:text-[#d85c14]">
                        <span>Rincian Bidang</span>
                        <i class="fa-solid fa-arrow-right ml-1.5 text-[10px]"></i>
                    </a>
                    <span class="text-[11px] text-gray-400 font-medium">DPD Ogan Ilir</span>
                </div>
            </div>
        @endforeach
    </div>

</div>
@endsection
