@extends('layouts.frontend')

@section('title', 'Donasi Dakwah & Advokasi - DPD PKS Ogan Ilir')
@section('meta_description', 'Salurkan donasi infaq dan sedekah perjuangan dakwah untuk masyarakat Kabupaten Ogan Ilir.')

@section('content')
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <span class="text-[#fdb913]">Donasi PKS</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Donasi Perjuangan & Pelayanan Umat</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">Bersama mengalirkan kebaikan untuk masyarakat yang membutuhkan di Kabupaten Ogan Ilir.</p>
    </div>
</div>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-14 space-y-10">
    <div class="rounded-3xl overflow-hidden shadow-lg">
        <img src="/uploads/2025/09/banner_donasi_pks.webp" alt="Donasi PKS Ogan Ilir" class="w-full h-auto object-cover">
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        {{-- Rekening BSI --}}
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex flex-col justify-between space-y-6">
            <div>
                <div class="w-12 h-12 rounded-2xl bg-teal-100 text-teal-600 flex items-center justify-center text-2xl mb-4">
                    <i class="fa-solid fa-building-columns"></i>
                </div>
                <span class="text-xs font-bold text-teal-600 uppercase tracking-wider block">Bank Syariah Indonesia (BSI)</span>
                <h2 class="text-2xl font-extrabold text-gray-900 mt-1 font-mono tracking-wide">7123456789</h2>
                <p class="text-xs text-gray-500 mt-1">a.n. <strong class="text-gray-800">DPD PKS OGAN ILIR</strong></p>
            </div>
            <div class="pt-4 border-t border-gray-100">
                <button onclick="navigator.clipboard.writeText('7123456789'); alert('Nomor Rekening BSI disalin!');" class="w-full bg-teal-600 hover:bg-teal-700 text-white py-2.5 rounded-xl text-xs font-semibold shadow transition flex items-center justify-center space-x-2">
                    <i class="fa-regular fa-copy"></i>
                    <span>Salin Nomor Rekening</span>
                </button>
            </div>
        </div>

        {{-- Konfirmasi WhatsApp --}}
        <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex flex-col justify-between space-y-6">
            <div>
                <div class="w-12 h-12 rounded-2xl bg-green-100 text-green-600 flex items-center justify-center text-2xl mb-4">
                    <i class="fa-brands fa-whatsapp"></i>
                </div>
                <span class="text-xs font-bold text-green-600 uppercase tracking-wider block">Konfirmasi Donasi</span>
                <h2 class="text-xl font-extrabold text-gray-900 mt-1">Layanan Konfirmasi</h2>
                <p class="text-xs text-gray-500 mt-2 leading-relaxed">
                    Setelah melakukan transfer, silakan kirimkan bukti transfer beserta nama dan doa ke WhatsApp Bendahara DPD PKS Ogan Ilir.
                </p>
            </div>
            <div class="pt-4 border-t border-gray-100">
                <a href="https://wa.me/6282280041658?text=Assalamu%27alaikum%20Bendahara%20DPD%20PKS%20Ogan%20Ilir,%20saya%20sudah%20transfer%20donasi" target="_blank" class="w-full bg-green-500 hover:bg-green-600 text-white py-2.5 rounded-xl text-xs font-semibold shadow transition flex items-center justify-center space-x-2">
                    <i class="fa-brands fa-whatsapp"></i>
                    <span>Konfirmasi via WhatsApp</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
