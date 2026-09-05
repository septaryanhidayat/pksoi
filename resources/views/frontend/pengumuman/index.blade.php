@extends('layouts.frontend')

@section('title', 'Papan Pengumuman Resmi - DPD PKS Ogan Ilir')
@section('meta_description', 'Kumpulan pengumuman resmi dan maklumat penting dari Dewan Pengurus Daerah Partai Keadilan Sejahtera Kabupaten Ogan Ilir.')

@section('content')
{{-- HERO HEADER --}}
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <span>Informasi</span>
            <span>/</span>
            <span class="text-[#fdb913]">Pengumuman</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Papan Pengumuman Resmi</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">
            Informasi penting, surat keputusan, dan maklumat resmi dari DPD PKS Ogan Ilir.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 space-y-12">
    
    <div class="text-center max-w-2xl mx-auto">
        <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider block">INFORMASI PUBLIK</span>
        <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight mt-1">
            Pengumuman & Maklumat Resmi
        </h2>
        <div class="w-16 h-1 bg-[#f37023] mx-auto rounded-full mt-3"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @forelse($pengumuman as $idx => $item)
            <div class="bg-white p-6 sm:p-8 rounded-3xl shadow-md hover:shadow-xl border border-gray-100 flex flex-col justify-between space-y-4 transition transform hover:-translate-y-1 reveal-fade-up delay-{{ $idx % 4 }}">
                <div>
                    <div class="flex items-center space-x-2 text-xs text-[#f37023] font-bold mb-2">
                        <i class="fa-solid fa-bullhorn"></i>
                        <span>PENGUMUMAN RESMI</span>
                    </div>
                    <h2 class="font-extrabold text-base sm:text-lg text-gray-900 hover:text-[#f37023] transition leading-snug">
                        <a href="{{ route('pengumuman.show', $item->slug) }}">{{ $item->title }}</a>
                    </h2>
                    <p class="text-xs text-gray-500 mt-2 line-clamp-3 leading-relaxed font-light">
                        {{ Str::limit(strip_tags($item->content), 140) }}
                    </p>
                </div>
                <div class="pt-4 border-t border-gray-100 flex items-center justify-between text-xs font-bold text-[#f37023]">
                    <a href="{{ route('pengumuman.show', $item->slug) }}" class="inline-flex items-center hover:text-[#d85c14]">
                        <span>Baca Rincian Pengumuman</span>
                        <i class="fa-solid fa-arrow-right ml-1.5 text-[10px]"></i>
                    </a>
                    <span class="text-[11px] text-gray-400 font-normal">
                        {{ $item->post_date ? \Carbon\Carbon::parse($item->post_date)->translatedFormat('d M Y') : '' }}
                    </span>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-16 text-gray-400 bg-white rounded-3xl border border-gray-100">
                <i class="fa-solid fa-bullhorn text-4xl text-gray-300 mb-3 block"></i>
                <span>Belum ada pengumuman resmi yang dipublikasikan.</span>
            </div>
        @endforelse
    </div>

    <div class="pt-6">
        {{ $pengumuman->links() }}
    </div>
</div>
@endsection
