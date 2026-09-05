@extends('layouts.frontend')

@section('title', 'Pengumuman Resmi - DPD PKS Ogan Ilir')
@section('meta_description', 'Kumpulan pengumuman resmi dari Dewan Pengurus Daerah Partai Keadilan Sejahtera Kabupaten Ogan Ilir.')

@section('content')
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
        <p class="text-sm text-gray-300 mt-2 font-light">Informasi penting dan pengumuman resmi DPD PKS Ogan Ilir.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @forelse($pengumuman as $item)
            <div class="bg-white p-6 sm:p-8 rounded-3xl shadow-sm hover:shadow-lg border border-gray-100 flex flex-col justify-between space-y-4 transition transform hover:-translate-y-1">
                <div>
                    <div class="flex items-center space-x-2 text-xs text-[#fdb913] font-bold mb-2">
                        <i class="fa-solid fa-bullhorn"></i>
                        <span>PENGUMUMAN RESMI</span>
                    </div>
                    <h2 class="font-extrabold text-base sm:text-lg text-gray-900 hover:text-[#f37023] transition">
                        <a href="{{ route('pengumuman.show', $item->slug) }}">{{ $item->title }}</a>
                    </h2>
                    <p class="text-xs text-gray-500 mt-2 line-clamp-3 leading-relaxed font-light">
                        {{ Str::limit(strip_tags($item->content), 120) }}
                    </p>
                </div>
                <div class="pt-4 border-t border-gray-100 flex items-center justify-between text-xs font-semibold text-[#f37023]">
                    <span>Baca Rincian Pengumuman</span>
                    <i class="fa-solid fa-arrow-right text-[10px]"></i>
                </div>
            </div>
        @empty
            <div class="col-span-2 text-center py-16 text-gray-400">Belum ada pengumuman.</div>
        @endforelse
    </div>

    <div class="pt-8">
        {{ $pengumuman->links() }}
    </div>
</div>
@endsection
