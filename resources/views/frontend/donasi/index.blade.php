@extends('layouts.frontend')

@section('title', 'Donasi Perjuangan Dakwah - DPD PKS Ogan Ilir')
@section('meta_description', 'Salurkan infaq dan donasi perjuangan dakwah untuk kemaslahatan masyarakat Kabupaten Ogan Ilir melalui rekening resmi DPD PKS Ogan Ilir.')

@section('content')
{{-- HERO HEADER --}}
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <span class="text-[#fdb913]">Donasi PKS</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Donasi Perjuangan & Pelayanan Umat</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">
            Ayo berjuang bersama Partai Keadilan Sejahtera untuk mewujudkan Indonesia yang lebih baik.
        </p>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-14 space-y-10">
    
    {{-- BANNER ILUSTRASI DONASI --}}
    <div class="rounded-3xl overflow-hidden shadow-xl border border-gray-100 reveal-fade-up">
        <img src="/uploads/2025/09/banner_donasi_pks.webp" alt="Donasi PKS Ogan Ilir" class="w-full h-auto object-cover" onerror="this.src='/uploads/2025/09/58.webp'">
    </div>

    {{-- INTRO TEXT --}}
    <div class="bg-white p-6 sm:p-8 rounded-3xl shadow-md border border-gray-100 text-center reveal-fade-up space-y-3">
        <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider block">Infaq & Shadaqah Perjuangan</span>
        <h2 class="text-xl sm:text-2xl font-extrabold text-gray-900">
            Ayo berjuang bersama Partai Keadilan Sejahtera untuk mewujudkan Indonesia yang lebih baik
        </h2>
        <p class="text-xs sm:text-sm text-gray-600 max-w-2xl mx-auto leading-relaxed">
            Untuk donasi dan infaq perjuangan dakwah ke PKS Ogan Ilir dapat dikirimkan secara langsung melalui rekening resmi berikut:
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        {{-- KARTU REKENING BSI --}}
        <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100 flex flex-col justify-between space-y-6 reveal-fade-up">
            <div>
                <div class="w-14 h-14 rounded-2xl bg-teal-100 text-teal-600 flex items-center justify-center text-2xl mb-4 shadow-inner">
                    <i class="fa-solid fa-building-columns"></i>
                </div>
                <span class="text-xs font-bold text-teal-600 uppercase tracking-wider block">Bank Syariah Indonesia (BSI)</span>
                <h3 class="text-3xl font-extrabold text-gray-900 mt-2 font-mono tracking-wider" id="noRek">7123456789</h3>
                <p class="text-xs sm:text-sm text-gray-600 mt-2">
                    a.n. <strong class="text-gray-900 font-extrabold">DPD PKS KABUPATEN OGAN ILIR</strong>
                </p>
            </div>
            <div class="pt-4 border-t border-gray-100">
                <button onclick="navigator.clipboard.writeText('7123456789'); alert('Nomor Rekening BSI DPD PKS Ogan Ilir berhasil disalin!');" class="w-full bg-teal-600 hover:bg-teal-700 text-white py-3 rounded-xl text-xs font-bold shadow transition flex items-center justify-center space-x-2">
                    <i class="fa-regular fa-copy text-sm"></i>
                    <span>Salin Nomor Rekening</span>
                </button>
            </div>
        </div>

        {{-- KARTU KONFIRMASI WHATSAPP --}}
        <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100 flex flex-col justify-between space-y-6 reveal-fade-up delay-1">
            <div>
                <div class="w-14 h-14 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center text-2xl mb-4 shadow-inner">
                    <i class="fa-brands fa-whatsapp"></i>
                </div>
                <span class="text-xs font-bold text-green-600 uppercase tracking-wider block">Layanan Konfirmasi</span>
                <h3 class="text-2xl font-extrabold text-gray-900 mt-2">Konfirmasi Donasi</h3>
                <p class="text-xs sm:text-sm text-gray-600 mt-2 leading-relaxed font-light">
                    Setelah melakukan transfer, silakan kirimkan konfirmasi dan bukti transfer ke nomor WhatsApp resmi DPD PKS Ogan Ilir agar dapat dicatat secara akuntabel.
                </p>
            </div>
            @php
                $rawPhone = $siteSettings['contact_phone'] ?? '082382336505';
                $cleanWa = preg_replace('/[^0-9]/', '', $rawPhone);
                if (str_starts_with($cleanWa, '0')) {
                    $cleanWa = '62' . substr($cleanWa, 1);
                }
            @endphp
            <div class="pt-4 border-t border-gray-100">
                <a href="https://wa.me/{{ $cleanWa }}?text=Assalamu%27alaikum%20Bendahara%20DPD%20PKS%20Ogan%20Ilir,%20saya%20sudah%20transfer%20donasi%20perjuangan" target="_blank" class="w-full bg-green-500 hover:bg-green-600 text-white py-3 rounded-xl text-xs font-bold shadow transition flex items-center justify-center space-x-2">
                    <i class="fa-brands fa-whatsapp text-sm"></i>
                    <span>Konfirmasi via WhatsApp ({{ $rawPhone }})</span>
                </a>
            </div>
        </div>
    </div>

    {{-- PERATURAN UNDANG-UNDANG DONASI PARPOL --}}
    <div class="bg-orange-50/80 border-l-4 border-[#f37023] p-6 sm:p-8 rounded-2xl reveal-fade-up text-xs sm:text-sm text-gray-700 space-y-2">
        <h4 class="font-bold text-gray-900 flex items-center text-sm">
            <i class="fa-solid fa-scale-balanced mr-2 text-[#f37023]"></i>
            <span>Ketentuan Legal Donasi Partai Politik</span>
        </h4>
        <p class="leading-relaxed">
            Pengiriman donasi bagi PKS diatur oleh <strong>UU No. 2 Pasal 35 Tahun 2011 tentang Partai Politik</strong>, di mana donasi atas nama perseorangan/individu maupun badan usaha dibatasi sesuai ketentuan perundang-undangan demi mewujudkan transparansi dan akuntabilitas keuangan partai yang bersih.
        </p>
    </div>

</div>
@endsection
