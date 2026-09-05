@extends('layouts.frontend')

@section('title', 'Hubungi Kami - DPD PKS Ogan Ilir')
@section('meta_description', 'Kontak resmi, alamat kantor DPD PKS Ogan Ilir, serta formulir penyampaian kritik, saran, dan aspirasi masyarakat.')

@section('content')
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <span class="text-[#fdb913]">Hubungi Kami</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Hubungi DPD PKS Ogan Ilir</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">Sampaikan kritik, saran, aspirasi, dan pertanyaan Anda secara langsung kepada kami.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
        
        {{-- KOLOM KIRI: FORM KRITIK & SARAN --}}
        <div class="bg-white p-8 sm:p-10 rounded-3xl shadow-xl border border-gray-100 space-y-6">
            <div>
                <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider">Formulir Aspirasi</span>
                <h2 class="text-2xl font-extrabold text-gray-900 mt-1">Kirim Pesan / Saran / Kritik</h2>
                <p class="text-xs text-gray-500 mt-1">Masukan Anda sangat berharga bagi peningkatan pelayanan DPD PKS Ogan Ilir.</p>
            </div>

            <form action="{{ route('feedback.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label for="nama" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Nama Lengkap *</label>
                    <input type="text" name="nama" id="nama" required value="{{ old('nama') }}" placeholder="Masukkan nama Anda..." class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">
                    @error('nama') <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p> @enderror
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label for="email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Email</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="nama@email.com" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">
                        @error('email') <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p> @enderror
                    </div>
                    <div>
                        <label for="whatsapp" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Nomor WhatsApp</label>
                        <input type="text" name="whatsapp" id="whatsapp" value="{{ old('whatsapp') }}" placeholder="08xxxxxxxxxx" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">
                        @error('whatsapp') <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div>
                    <label for="saran_kritik" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Pesan / Saran / Kritik *</label>
                    <textarea name="saran_kritik" id="saran_kritik" rows="5" required placeholder="Tuliskan aspirasi atau masukan Anda secara jelas..." class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">{{ old('saran_kritik') }}</textarea>
                    @error('saran_kritik') <p class="text-red-500 text-[11px] mt-1">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="w-full bg-[#f37023] hover:bg-[#d85c14] text-white py-3.5 rounded-xl font-bold text-xs uppercase tracking-wider shadow-lg hover:shadow-xl transition flex items-center justify-center space-x-2">
                    <i class="fa-solid fa-paper-plane"></i>
                    <span>Kirim Aspirasi Sekarang</span>
                </button>
            </form>
        </div>

        {{-- KOLOM KANAN: KONTAK KANTOR & MAPS --}}
        <div class="space-y-8">
            <div class="bg-white p-8 rounded-3xl shadow-xl border border-gray-100 space-y-6">
                <div>
                    <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider">Sekretariat DPD</span>
                    <h2 class="text-2xl font-extrabold text-gray-900 mt-1">Informasi Kantor</h2>
                </div>

                <ul class="space-y-4 text-sm text-gray-600">
                    <li class="flex items-start space-x-3">
                        <div class="w-10 h-10 rounded-xl bg-orange-100 text-[#f37023] flex items-center justify-center text-lg flex-shrink-0">
                            <i class="fa-solid fa-location-dot"></i>
                        </div>
                        <div>
                            <span class="block font-bold text-gray-900 text-xs uppercase">Alamat Kantor</span>
                            <span class="text-xs leading-relaxed text-gray-600">
                                {{ $siteSettings['contact_address'] ?? 'Jl. Komperta Taman Indralaya Blok C No. 05 Kel. Indralaya Mulya, Kec. Indralaya, Kab. Ogan Ilir, Sumatera Selatan' }}
                            </span>
                        </div>
                    </li>
                    <li class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-xl bg-orange-100 text-[#f37023] flex items-center justify-center text-lg flex-shrink-0">
                            <i class="fa-solid fa-phone"></i>
                        </div>
                        <div>
                            <span class="block font-bold text-gray-900 text-xs uppercase">Telepon / WhatsApp</span>
                            <a href="https://wa.me/6282280041658" target="_blank" class="text-xs text-gray-600 hover:text-[#f37023]">
                                {{ $siteSettings['contact_phone'] ?? '082280041658' }}
                            </a>
                        </div>
                    </li>
                    <li class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-xl bg-orange-100 text-[#f37023] flex items-center justify-center text-lg flex-shrink-0">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                        <div>
                            <span class="block font-bold text-gray-900 text-xs uppercase">Email Resmi</span>
                            <a href="mailto:{{ $siteSettings['contact_email'] ?? 'pksoganilir@gmail.com' }}" class="text-xs text-gray-600 hover:text-[#f37023]">
                                {{ $siteSettings['contact_email'] ?? 'pksoganilir@gmail.com' }}
                            </a>
                        </div>
                    </li>
                </ul>
            </div>

            {{-- Google Map Embed --}}
            <div class="rounded-3xl overflow-hidden shadow-lg border border-gray-100 h-72">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15935.918903337965!2d104.642145!3d-3.232491!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b9991cb45aaab%3A0x28dfaa3303668f80!2sIndralaya%20Mulya%2C%20Indralaya%2C%20Ogan%20Ilir%20Regency%2C%20South%20Sumatra!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
@endsection
