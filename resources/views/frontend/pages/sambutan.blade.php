@extends('layouts.frontend')

@section('title', 'Sambutan Ketua DPD - DPD PKS Ogan Ilir')
@section('meta_description', 'Sambutan resmi Ketua DPD Partai Keadilan Sejahtera (PKS) Kabupaten Ogan Ilir.')

@section('content')
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <span>Profil</span>
            <span>/</span>
            <span class="text-[#fdb913]">Sambutan Ketua DPD</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Sambutan Ketua DPD PKS Ogan Ilir</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">
            Pesan dan harapan dari Ketua DPD PKS Kabupaten Ogan Ilir.
        </p>
    </div>
</div>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <div class="bg-white rounded-3xl p-8 sm:p-12 shadow-xl border border-gray-100">
        <div class="flex flex-col md:flex-row items-center gap-8 mb-8 pb-8 border-b border-gray-100">
            <div class="w-44 h-44 sm:w-52 sm:h-52 rounded-2xl overflow-hidden shadow-lg border-4 border-white ring-4 ring-orange-100 flex-shrink-0">
                <img src="/uploads/2025/09/58.webp" alt="Ketua DPD PKS Ogan Ilir" class="w-full h-full object-cover object-top" onerror="this.src='/uploads/2024/01/cd1787310f135df61a8832283565af3b.webp'">
            </div>
            <div class="space-y-2 text-center md:text-left">
                <span class="inline-block bg-orange-100 text-[#f37023] text-xs font-bold px-3 py-1 rounded-full uppercase tracking-wider">
                    Ketua DPD PKS Ogan Ilir
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900">
                    Dewan Pengurus Daerah PKS Ogan Ilir
                </h2>
                <p class="text-sm text-gray-500 italic">"Berkhidmat untuk Rakyat, Membangun Ogan Ilir yang Mandiri dan Religius"</p>
            </div>
        </div>

        <div class="prose-content text-gray-700 text-sm sm:text-base leading-relaxed space-y-4">
            {!! $page->content !!}
        </div>
    </div>
</div>
@endsection
