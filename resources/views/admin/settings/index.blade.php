@extends('layouts.admin')

@section('title', 'Pengaturan Website')
@section('header_title', 'Pengaturan Website & Kontak')

@section('content')
<div class="max-w-4xl bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
    <form action="{{ route('admin.settings.update') }}" method="POST" class="space-y-8">
        @csrf

        {{-- Identitas Website --}}
        <div>
            <h2 class="font-bold text-sm text-gray-900 uppercase tracking-wider pb-2 border-b border-gray-100 mb-4">
                Identitas Website
            </h2>
            <div class="space-y-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Nama Website / Organisasi</label>
                    <input type="text" name="site_name" value="{{ $settings['site_name'] ?? 'DPD PKS Ogan Ilir' }}" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Tagline Slogan</label>
                    <input type="text" name="site_tagline" value="{{ $settings['site_tagline'] ?? 'Berkhidmat untuk Rakyat' }}" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Deskripsi Ringkas (SEO Meta)</label>
                    <textarea name="site_description" rows="2" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl p-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">{{ $settings['site_description'] ?? '' }}</textarea>
                </div>
            </div>
        </div>

        {{-- Informasi Kontak --}}
        <div>
            <h2 class="font-bold text-sm text-gray-900 uppercase tracking-wider pb-2 border-b border-gray-100 mb-4">
                Informasi Kontak & Sekretariat
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Email Resmi</label>
                    <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? 'pksoganilir@gmail.com' }}" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Nomor Telepon / WhatsApp</label>
                    <input type="text" name="contact_phone" value="{{ $settings['contact_phone'] ?? '082280041658' }}" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">
                </div>
                <div class="sm:col-span-2">
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Alamat Kantor DPD</label>
                    <textarea name="contact_address" rows="2" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl p-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">{{ $settings['contact_address'] ?? '' }}</textarea>
                </div>
            </div>
        </div>

        {{-- Link Media Sosial --}}
        <div>
            <h2 class="font-bold text-sm text-gray-900 uppercase tracking-wider pb-2 border-b border-gray-100 mb-4">
                Media Sosial Resmi
            </h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Facebook URL</label>
                    <input type="text" name="social_facebook" value="{{ $settings['social_facebook'] ?? 'https://facebook.com/dpdpksoganilir' }}" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Instagram URL</label>
                    <input type="text" name="social_instagram" value="{{ $settings['social_instagram'] ?? 'https://instagram.com/dpdpksoganilir' }}" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">YouTube URL</label>
                    <input type="text" name="social_youtube" value="{{ $settings['social_youtube'] ?? 'https://youtube.com/@pkstvoganilir' }}" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">
                </div>
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">TikTok URL</label>
                    <input type="text" name="social_tiktok" value="{{ $settings['social_tiktok'] ?? 'https://tiktok.com/@pksoganilir' }}" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">
                </div>
            </div>
        </div>

        <div class="pt-4 border-t border-gray-100">
            <button type="submit" class="bg-[#f37023] hover:bg-[#d85c14] text-white px-6 py-3.5 rounded-xl font-bold text-xs uppercase tracking-wider shadow-lg transition flex items-center space-x-2">
                <i class="fa-solid fa-floppy-disk"></i>
                <span>Simpan Seluruh Pengaturan</span>
            </button>
        </div>
    </form>
</div>
@endsection
