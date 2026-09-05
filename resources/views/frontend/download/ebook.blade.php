@extends('layouts.frontend')

@section('title', 'E-Book PKS - DPD PKS Ogan Ilir')
@section('meta_description', 'Kumpulan E-Book, modul, dan buku panduan digital resmi PKS Ogan Ilir.')

@section('content')
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <a href="{{ route('download.index') }}" class="hover:text-white transition">Download</a>
            <span>/</span>
            <span class="text-[#fdb913]">E-Book</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">E-Book & Panduan Digital</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">Buku saku, pedoman kader, dan literatur pemikiran politik dakwah.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    @if($page && $page->content)
        <div class="bg-white p-6 sm:p-10 rounded-3xl shadow-sm border border-gray-100 mb-10 prose-content text-sm sm:text-base">
            {!! $page->content !!}
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex flex-col justify-between space-y-4 hover:shadow-lg transition">
            <div class="flex items-start space-x-4">
                <div class="w-12 h-12 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center text-2xl flex-shrink-0">
                    <i class="fa-solid fa-file-pdf"></i>
                </div>
                <div>
                    <h3 class="font-bold text-sm sm:text-base text-gray-900">Ghazwul Fikri</h3>
                    <span class="text-xs text-gray-400 block mt-1">Format PDF &bull; Bahasa Indonesia</span>
                </div>
            </div>
            <p class="text-xs text-gray-500 line-clamp-3">E-Book materi wawasan pemikiran Islam dan tantangan peradaban modern.</p>
            <div class="pt-3 border-t border-gray-100">
                <a href="/uploads/2025/09/ghazwul-fikri_mik.pdf" target="_blank" class="inline-flex items-center bg-[#f37023] hover:bg-[#d85c14] text-white px-4 py-2 rounded-xl text-xs font-semibold shadow transition">
                    <i class="fa-solid fa-download mr-1.5"></i> Unduh E-Book
                </a>
            </div>
        </div>

        <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex flex-col justify-between space-y-4 hover:shadow-lg transition">
            <div class="flex items-start space-x-4">
                <div class="w-12 h-12 rounded-2xl bg-red-100 text-red-600 flex items-center justify-center text-2xl flex-shrink-0">
                    <i class="fa-solid fa-file-pdf"></i>
                </div>
                <div>
                    <h3 class="font-bold text-sm sm:text-base text-gray-900">Buku Adab Olahraga PKS</h3>
                    <span class="text-xs text-gray-400 block mt-1">Format PDF &bull; Bahasa Indonesia</span>
                </div>
            </div>
            <p class="text-xs text-gray-500 line-clamp-3">Panduan dan etika berolahraga sesuai nilai-nilai Islam bagi kader dan masyarakat.</p>
            <div class="pt-3 border-t border-gray-100">
                <a href="/uploads/2025/10/ADAB-OLAHRAGA-A6.pdf" target="_blank" class="inline-flex items-center bg-[#f37023] hover:bg-[#d85c14] text-white px-4 py-2 rounded-xl text-xs font-semibold shadow transition">
                    <i class="fa-solid fa-download mr-1.5"></i> Unduh E-Book
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
