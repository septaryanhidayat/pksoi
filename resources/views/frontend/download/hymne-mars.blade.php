@extends('layouts.frontend')

@section('title', 'Hymne & Mars PKS - DPD PKS Ogan Ilir')
@section('meta_description', 'Lagu resmi Hymne dan Mars Partai Keadilan Sejahtera lengkap dengan audio player dan lirik.')

@section('content')
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <a href="{{ route('download.index') }}" class="hover:text-white transition">Download</a>
            <span>/</span>
            <span class="text-[#fdb913]">Hymne & Mars PKS</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Hymne & Mars PKS</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">Lagu resmi penyemangat perjuangan Partai Keadilan Sejahtera.</p>
    </div>
</div>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-14 space-y-12">
    
    {{-- Mars PKS --}}
    <div class="bg-white rounded-3xl p-8 sm:p-12 shadow-sm border border-gray-100 space-y-6">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pb-6 border-b border-gray-100">
            <div>
                <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider">Lagu Resmi</span>
                <h2 class="text-2xl font-extrabold text-gray-900">Mars Partai Keadilan Sejahtera</h2>
            </div>
            <a href="/uploads/2025/09/Mars-PKS.mp3" download class="inline-flex items-center bg-[#f37023] hover:bg-[#d85c14] text-white px-5 py-2.5 rounded-xl text-xs font-semibold shadow transition">
                <i class="fa-solid fa-download mr-2"></i> Unduh MP3 Mars
            </a>
        </div>

        {{-- Audio Player --}}
        <div class="bg-orange-50 p-4 rounded-2xl border border-orange-200">
            <audio controls class="w-full">
                <source src="/uploads/2025/09/Mars-PKS.mp3" type="audio/mpeg">
                Browser Anda tidak mendukung pemutar audio.
            </audio>
        </div>

        {{-- Lirik Mars --}}
        <div class="text-center text-sm text-gray-700 leading-relaxed font-serif space-y-3 bg-gray-50 p-8 rounded-2xl">
            <h3 class="font-bold text-gray-900 text-base mb-4 font-sans uppercase tracking-wider">Lirik Mars PKS</h3>
            <p>Maju serentak wahai pemuda pejuang kebenaran</p>
            <p>Tegakkan keadilan di bumi pertiwi</p>
            <p>Dengan semangat iman di dada melangkah pasti</p>
            <p>Partai Keadilan Sejahtera berkhidmat untuk rakyat</p>
            <p class="font-semibold text-[#f37023] pt-2">Reff:</p>
            <p>Keadilan dan kesejahteraan cita-cita kita</p>
            <p>Bersama rakyat membangun bangsa bermartabat mulia</p>
            <p>Allahu Akbar! Majulah PKS tercinta!</p>
        </div>
    </div>

    {{-- Hymne PKS --}}
    <div class="bg-white rounded-3xl p-8 sm:p-12 shadow-sm border border-gray-100 space-y-6">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pb-6 border-b border-gray-100">
            <div>
                <span class="text-xs font-bold text-[#fdb913] uppercase tracking-wider">Lagu Resmi</span>
                <h2 class="text-2xl font-extrabold text-gray-900">Hymne Partai Keadilan Sejahtera</h2>
            </div>
            <a href="/uploads/2025/09/Hymne-PKS.mp3" download class="inline-flex items-center bg-[#f37023] hover:bg-[#d85c14] text-white px-5 py-2.5 rounded-xl text-xs font-semibold shadow transition">
                <i class="fa-solid fa-download mr-2"></i> Unduh MP3 Hymne
            </a>
        </div>

        {{-- Audio Player --}}
        <div class="bg-yellow-50 p-4 rounded-2xl border border-yellow-200">
            <audio controls class="w-full">
                <source src="/uploads/2025/09/Hymne-PKS.mp3" type="audio/mpeg">
                Browser Anda tidak mendukung pemutar audio.
            </audio>
        </div>

        {{-- Lirik Hymne --}}
        <div class="text-center text-sm text-gray-700 leading-relaxed font-serif space-y-3 bg-gray-50 p-8 rounded-2xl">
            <h3 class="font-bold text-gray-900 text-base mb-4 font-sans uppercase tracking-wider">Lirik Hymne PKS</h3>
            <p>Dalam hening kalbu kami bersujud pada-Mu ya Rabb</p>
            <p>Memohon petunjuk dan kekuatan mengemban amanah</p>
            <p>Untuk negaraku Indonesia, tumpah darah tercinta</p>
            <p>PKS hadir membawa damai, keadilan dan cinta</p>
        </div>
    </div>
</div>
@endsection
