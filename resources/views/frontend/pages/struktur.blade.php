@extends('layouts.frontend')

@section('title', 'Struktur Kepengurusan - DPD PKS Ogan Ilir')
@section('meta_description', 'Struktur Kepengurusan DPD Partai Keadilan Sejahtera Kabupaten Ogan Ilir.')

@section('content')
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
        <p class="text-sm text-gray-300 mt-2 font-light">Susunan Pengurus Tingkat Daerah dan Cabang DPD PKS Kabupaten Ogan Ilir.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 space-y-12">
    
    {{-- Bagan Gambar Struktur --}}
    <div class="bg-white p-6 sm:p-10 rounded-3xl shadow-xl border border-gray-100 text-center">
        <h2 class="text-2xl font-extrabold text-gray-900 mb-6">Bagan Struktur DPD PKS Ogan Ilir</h2>
        <div class="rounded-2xl overflow-hidden shadow-lg border border-gray-100 inline-block max-w-4xl mx-auto">
            <img src="/uploads/2025/09/Struktur-Kepengurusan-scaled.webp" alt="Struktur Kepengurusan DPD PKS Ogan Ilir" class="w-full h-auto" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
        </div>
        @if($page && $page->content)
            <div class="prose-content text-left mt-8 pt-8 border-t border-gray-100 text-sm sm:text-base">
                {!! $page->content !!}
            </div>
        @endif
    </div>

    {{-- Bidang-Bidang DPD --}}
    <div class="bg-white p-6 sm:p-10 rounded-3xl shadow-xl border border-gray-100">
        <div class="flex justify-between items-center mb-8">
            <div>
                <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider">Unit Kerja</span>
                <h2 class="text-2xl font-extrabold text-gray-900">Bidang-Bidang DPD PKS Ogan Ilir</h2>
            </div>
            <a href="{{ route('bidang.index') }}" class="text-xs font-semibold text-[#f37023] hover:underline">
                Lihat Detail Bidang &rarr;
            </a>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($bidangs as $b)
                <a href="{{ route('bidang.show', $b->slug) }}" class="p-5 rounded-2xl border border-gray-100 hover:border-[#f37023] hover:shadow-md transition group bg-gray-50 flex items-start space-x-4">
                    <div class="w-12 h-12 rounded-xl bg-orange-100 text-[#f37023] group-hover:bg-[#f37023] group-hover:text-white flex items-center justify-center text-lg flex-shrink-0 transition">
                        <i class="fa-solid fa-layer-group"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-sm text-gray-900 group-hover:text-[#f37023] transition">{{ $b->name }}</h3>
                        <p class="text-xs text-gray-500 mt-1 line-clamp-2">{{ Str::limit(strip_tags($b->description), 80) }}</p>
                    </div>
                </a>
            @endforeach
        </div>
    </div>

    {{-- DPC Se-Kabupaten Ogan Ilir --}}
    <div class="bg-white p-6 sm:p-10 rounded-3xl shadow-xl border border-gray-100">
        <div class="mb-8">
            <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider">Kepengurusan Tingkat Kecamatan</span>
            <h2 class="text-2xl font-extrabold text-gray-900">Dewan Pengurus Cabang (DPC) Se-Ogan Ilir</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($dpcs as $dpc)
                <div class="p-4 rounded-xl border border-gray-100 bg-gray-50/80 flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-lg bg-[#f37023] text-white flex items-center justify-center font-bold text-xs flex-shrink-0">
                        <i class="fa-solid fa-building-flag"></i>
                    </div>
                    <div>
                        <h3 class="font-bold text-sm text-gray-900">{{ $dpc->name }}</h3>
                        <span class="text-[11px] text-gray-500">{{ $dpc->address ?: 'Kabupaten Ogan Ilir' }}</span>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
