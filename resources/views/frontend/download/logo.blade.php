@extends('layouts.frontend')

@section('title', 'Logo Resmi PKS - DPD PKS Ogan Ilir')
@section('meta_description', 'Aset resmi logo Partai Keadilan Sejahtera dan panduan penggunaan identitas visual.')

@section('content')
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <a href="{{ route('download.index') }}" class="hover:text-white transition">Download</a>
            <span>/</span>
            <span class="text-[#fdb913]">Logo Resmi</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Logo Resmi & Panduan Identitas</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">Unduh aset logo resmi Partai Keadilan Sejahtera dalam berbagai format.</p>
    </div>
</div>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <div class="bg-white rounded-3xl p-8 sm:p-12 shadow-sm border border-gray-100 space-y-8">
        
        <div class="text-center max-w-xl mx-auto">
            <div class="w-48 h-48 mx-auto bg-gray-50 rounded-3xl p-6 shadow-inner border border-gray-100 flex items-center justify-center mb-4">
                <img src="/uploads/2023/08/logo-pks-ogan-ilir.webp" alt="Logo Resmi PKS" class="max-h-full max-w-full object-contain">
            </div>
            <h2 class="text-xl font-bold text-gray-900">Logo Resmi DPD PKS Kabupaten Ogan Ilir</h2>
            <p class="text-xs text-gray-500 mt-1">Bentuk lingkaran oranye dan putih dengan simbol bulan sabit dan padi melambangkan keadilan, kemakmuran, dan kebersamaan.</p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 pt-6 border-t border-gray-100">
            <div class="p-6 rounded-2xl bg-gray-50 border border-gray-200 flex flex-col justify-between space-y-4">
                <div>
                    <h3 class="font-bold text-sm text-gray-900">Logo PKS Ogan Ilir (WebP / PNG)</h3>
                    <p class="text-xs text-gray-500 mt-1">Format resolusi tinggi dengan latar belakang transparan.</p>
                </div>
                <div>
                    <a href="/uploads/2023/08/logo-pks-ogan-ilir.webp" download class="inline-flex items-center bg-[#f37023] hover:bg-[#d85c14] text-white px-4 py-2 rounded-xl text-xs font-semibold shadow transition">
                        <i class="fa-solid fa-download mr-1.5"></i> Unduh Gambar Logo
                    </a>
                </div>
            </div>

            <div class="p-6 rounded-2xl bg-gray-50 border border-gray-200 flex flex-col justify-between space-y-4">
                <div>
                    <h3 class="font-bold text-sm text-gray-900">Thumbnail Logo Resmi</h3>
                    <p class="text-xs text-gray-500 mt-1">Format ukuran kecil untuk ikon web dan profil sosial media.</p>
                </div>
                <div>
                    <a href="/uploads/2025/09/logo-thumbnail.webp" download class="inline-flex items-center bg-gray-800 hover:bg-black text-white px-4 py-2 rounded-xl text-xs font-semibold shadow transition">
                        <i class="fa-solid fa-download mr-1.5"></i> Unduh Ikon Logo
                    </a>
                </div>
            </div>
        </div>

        @if($page && $page->content)
            <div class="pt-6 border-t border-gray-100 prose-content text-xs sm:text-sm">
                {!! $page->content !!}
            </div>
        @endif
    </div>
</div>
@endsection
