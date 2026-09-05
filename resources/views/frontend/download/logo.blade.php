@extends('layouts.frontend')

@section('title', 'Logo Resmi PKS - DPD PKS Ogan Ilir')
@section('meta_description', 'Aset resmi logo Partai Keadilan Sejahtera, panduan identitas visual, filosofi lambang, dan unduhan logo resolusi tinggi.')

@section('content')
{{-- HERO HEADER --}}
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <a href="{{ route('download.index') }}" class="hover:text-white transition">Download</a>
            <span>/</span>
            <span class="text-[#fdb913]">Logo</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Logo Resmi Partai Keadilan Sejahtera</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">
            Identitas visual, filosofi lambang, panduan warna, dan aset unduhan resmi lambang PKS.
        </p>
    </div>
</div>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-14 space-y-12">
    
    {{-- CARD PREVIEW LOGO UTAMA --}}
    <article class="bg-white rounded-3xl p-8 sm:p-12 shadow-xl border border-gray-100 reveal-fade-up text-center space-y-8">
        <div class="max-w-2xl mx-auto">
            <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider block">Identitas Visual Resmi</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight mt-1">
                Logo Resmi Partai Keadilan Sejahtera
            </h2>
            <div class="w-16 h-1 bg-[#f37023] mx-auto rounded-full mt-3"></div>
        </div>

        {{-- DISPLAY EMBLEM LOGO --}}
        <div class="w-64 h-64 sm:w-80 sm:h-80 mx-auto rounded-3xl bg-gray-50/80 p-8 shadow-inner border border-gray-100 flex items-center justify-center relative group">
            <img src="/uploads/2025/09/Logo-PKS-Resmi.png" alt="Logo Resmi Partai Keadilan Sejahtera" class="max-h-full max-w-full object-contain group-hover:scale-105 transition duration-500">
        </div>

        <div>
            <a href="{{ route('download.file', 1, false) }}" class="inline-flex items-center bg-[#ff5001] hover:bg-[#e04500] text-white px-8 py-3.5 rounded-2xl text-xs sm:text-sm font-bold shadow-lg hover:shadow-xl transition space-x-2 transform hover:scale-105">
                <i class="fa-solid fa-download text-sm"></i>
                <span>Download Logo Resmi (Format PNG)</span>
            </a>
            <p class="text-[11px] text-gray-400 mt-2 font-medium">Format Asli PNG Resolusi Tinggi &bull; Latar Belakang Transparan &bull; Siap Desain / Cetak</p>
        </div>
    </article>

    {{-- FILOSOFI DAN WARNA RESMI --}}
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        
        {{-- FILOSOFI MAKNA --}}
        <div class="bg-white rounded-3xl p-8 shadow-xl border border-gray-100 reveal-fade-up space-y-5">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-xl bg-orange-100 text-[#f37023] flex items-center justify-center font-bold text-base shadow-inner">
                    <i class="fa-solid fa-shapes"></i>
                </div>
                <h3 class="text-xl font-extrabold text-gray-900">Filosofi Lambang PKS</h3>
            </div>
            <div class="w-12 h-1 bg-[#f37023] rounded-full"></div>

            <ul class="space-y-4 text-xs sm:text-sm text-gray-600 leading-relaxed">
                <li class="flex items-start space-x-3">
                    <div class="w-6 h-6 rounded-full bg-orange-100 text-[#f37023] flex items-center justify-center text-xs font-bold flex-shrink-0 mt-0.5">
                        <i class="fa-regular fa-circle"></i>
                    </div>
                    <div>
                        <strong class="text-gray-900 font-bold block">Bentuk Lingkaran:</strong>
                        Melambangkan kebulatan tekad, kesetaraan, persaudaraan yang kokoh, dan keterbukaan partai bagi seluruh rakyat Indonesia.
                    </div>
                </li>
                <li class="flex items-start space-x-3">
                    <div class="w-6 h-6 rounded-full bg-amber-100 text-amber-600 flex items-center justify-center text-xs font-bold flex-shrink-0 mt-0.5">
                        <i class="fa-regular fa-moon"></i>
                    </div>
                    <div>
                        <strong class="text-gray-900 font-bold block">Bulan Sabit:</strong>
                        Simbol keluhuran nilai-nilai Islam sebagai lentera penunjuk keadilan, pembawa rahmat bagi semesta alam (<em>rahmatan lil 'alamin</em>).
                    </div>
                </li>
                <li class="flex items-start space-x-3">
                    <div class="w-6 h-6 rounded-full bg-yellow-100 text-yellow-700 flex items-center justify-center text-xs font-bold flex-shrink-0 mt-0.5">
                        <i class="fa-solid fa-wheat-awn"></i>
                    </div>
                    <div>
                        <strong class="text-gray-900 font-bold block">Untaian Padi:</strong>
                        Cita-cita kemakmuran dan kesejahteraan pangan rakyat, serta falsafah ilmu padi yang semakin berisi semakin merunduk tawadhu.
                    </div>
                </li>
            </ul>
        </div>

        {{-- PALET WARNA RESMI --}}
        <div class="bg-white rounded-3xl p-8 shadow-xl border border-gray-100 reveal-fade-up delay-1 space-y-5">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 rounded-xl bg-gray-100 text-gray-800 flex items-center justify-center font-bold text-base shadow-inner">
                    <i class="fa-solid fa-palette"></i>
                </div>
                <h3 class="text-xl font-extrabold text-gray-900">Palet Warna Resmi</h3>
            </div>
            <div class="w-12 h-1 bg-gray-800 rounded-full"></div>

            <div class="space-y-4 text-xs sm:text-sm">
                {{-- Oranye --}}
                <div class="p-4 rounded-2xl bg-orange-50 border border-orange-200 flex items-center space-x-4">
                    <div class="w-12 h-12 rounded-xl bg-[#ff5001] shadow-md flex-shrink-0"></div>
                    <div>
                        <span class="font-extrabold text-gray-900 block text-sm">Oranye PKS</span>
                        <code class="text-xs text-[#f37023] font-mono font-bold">HEX: #FF5001</code>
                        <p class="text-[11px] text-gray-500 mt-0.5">Semangat muda, optimisme, kehangatan, dan energi pelayanan.</p>
                    </div>
                </div>

                {{-- Putih --}}
                <div class="p-4 rounded-2xl bg-gray-50 border border-gray-200 flex items-center space-x-4">
                    <div class="w-12 h-12 rounded-xl bg-white border-2 border-gray-300 shadow-md flex-shrink-0"></div>
                    <div>
                        <span class="font-extrabold text-gray-900 block text-sm">Putih Murni</span>
                        <code class="text-xs text-gray-600 font-mono font-bold">HEX: #FFFFFF</code>
                        <p class="text-[11px] text-gray-500 mt-0.5">Ketulusan hati, integritas moral, dan kesucian niat pengabdian.</p>
                    </div>
                </div>

                {{-- Hitam --}}
                <div class="p-4 rounded-2xl bg-gray-900 text-white flex items-center space-x-4 shadow">
                    <div class="w-12 h-12 rounded-xl bg-black border border-gray-700 shadow flex-shrink-0"></div>
                    <div>
                        <span class="font-extrabold text-white block text-sm">Hitam Tegas</span>
                        <code class="text-xs text-orange-300 font-mono font-bold">HEX: #000000</code>
                        <p class="text-[11px] text-gray-300 mt-0.5">Kekuatan tekad, ketegasan prinsip, dan kepastian hukum.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- KARTU VARIAN UNDUHAN LAINNYA --}}
    {{-- KARTU VARIAN UNDUHAN LAINNYA (FORMAT PNG) --}}
    <div class="bg-white rounded-3xl p-8 sm:p-10 shadow-xl border border-gray-100 reveal-fade-up space-y-6">
        <div class="flex items-center justify-between flex-wrap gap-2">
            <h3 class="text-lg sm:text-xl font-extrabold text-gray-900">Varian Logo Lainnya (Format PNG Asli)</h3>
            <span class="text-xs bg-orange-100 text-[#ff5001] font-bold px-3 py-1 rounded-full">Background Transparan</span>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
            {{-- Favicon & Icon --}}
            <div class="p-5 rounded-2xl bg-gray-50/80 border border-gray-200 flex flex-col justify-between gap-4">
                <div class="flex items-center space-x-3">
                    <div class="w-14 h-14 rounded-xl bg-white p-2 border border-gray-200 flex items-center justify-center flex-shrink-0 shadow-sm">
                        <img src="/uploads/2025/09/cropped-logo-thumbnail.png" alt="Favicon PNG" class="max-h-full max-w-full object-contain">
                    </div>
                    <div>
                        <h4 class="font-bold text-xs sm:text-sm text-gray-900">Favicon & Icon</h4>
                        <span class="text-[11px] text-gray-400">Format PNG Persegi</span>
                    </div>
                </div>
                <a href="{{ route('download.file', 'cropped-logo-thumbnail.png', false) }}" class="w-full text-center bg-gray-900 hover:bg-black text-white px-4 py-2.5 rounded-xl text-xs font-bold transition flex items-center justify-center space-x-1.5 shadow">
                    <i class="fa-solid fa-download text-[11px]"></i>
                    <span>Unduh PNG</span>
                </a>
            </div>

            {{-- Logo Header DPD --}}
            <div class="p-5 rounded-2xl bg-gray-50/80 border border-gray-200 flex flex-col justify-between gap-4">
                <div class="flex items-center space-x-3">
                    <div class="w-14 h-14 rounded-xl bg-white p-2 border border-gray-200 flex items-center justify-center flex-shrink-0 shadow-sm">
                        <img src="/uploads/2025/09/Logo-Web-DPD3.png" alt="Logo Web DPD PNG" class="max-h-full max-w-full object-contain">
                    </div>
                    <div>
                        <h4 class="font-bold text-xs sm:text-sm text-gray-900">Logo Header DPD</h4>
                        <span class="text-[11px] text-gray-400">Horizontal Banner DPD</span>
                    </div>
                </div>
                <a href="{{ route('download.file', 'Logo-Web-DPD3.png', false) }}" class="w-full text-center bg-[#ff5001] hover:bg-[#e04500] text-white px-4 py-2.5 rounded-xl text-xs font-bold transition flex items-center justify-center space-x-1.5 shadow">
                    <i class="fa-solid fa-download text-[11px]"></i>
                    <span>Unduh PNG</span>
                </a>
            </div>

            {{-- Logo Thumbnail --}}
            <div class="p-5 rounded-2xl bg-gray-50/80 border border-gray-200 flex flex-col justify-between gap-4">
                <div class="flex items-center space-x-3">
                    <div class="w-14 h-14 rounded-xl bg-white p-2 border border-gray-200 flex items-center justify-center flex-shrink-0 shadow-sm">
                        <img src="/uploads/2025/09/logo-thumbnail.png" alt="Logo Thumbnail PNG" class="max-h-full max-w-full object-contain">
                    </div>
                    <div>
                        <h4 class="font-bold text-xs sm:text-sm text-gray-900">Thumbnail & Avatar</h4>
                        <span class="text-[11px] text-gray-400">Resolusi Tinggi PNG</span>
                    </div>
                </div>
                <a href="{{ route('download.file', 'logo-thumbnail.png', false) }}" class="w-full text-center bg-gray-900 hover:bg-black text-white px-4 py-2.5 rounded-xl text-xs font-bold transition flex items-center justify-center space-x-1.5 shadow">
                    <i class="fa-solid fa-download text-[11px]"></i>
                    <span>Unduh PNG</span>
                </a>
            </div>
        </div>
    </div>

</div>
@endsection
