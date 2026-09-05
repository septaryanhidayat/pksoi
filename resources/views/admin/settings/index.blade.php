@extends('layouts.admin')

@section('title', 'Pengaturan Website & SEO')
@section('header_title', 'Pengaturan Website, SEO & OpenGraph')

@section('content')
<div class="max-w-5xl space-y-6">

    {{-- Info Card --}}
    <div class="bg-gradient-to-r from-[#0b1120] to-[#1e293b] rounded-2xl p-6 text-white shadow-xl flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 rounded-xl bg-orange-500/20 text-[#f37023] flex items-center justify-center text-2xl shrink-0">
                <i class="fa-solid fa-sliders"></i>
            </div>
            <div>
                <h3 class="text-base font-bold">Pusat Konfigurasi & Optimasi Website</h3>
                <p class="text-xs text-slate-300">Kelola identitas situs, informasi sekretariat, kontak, serta pengaturan SEO & OpenGraph untuk berbagi ke WhatsApp & medsos.</p>
            </div>
        </div>
        <a href="{{ route('home') }}" target="_blank" class="px-4 py-2 bg-white/10 hover:bg-white/20 text-white rounded-xl text-xs font-semibold transition flex items-center space-x-2 shrink-0">
            <i class="fa-solid fa-arrow-up-right-from-square text-[10px]"></i>
            <span>Lihat Website</span>
        </a>
    </div>

    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        {{-- 1. PENGATURAN SEO & SOCIAL SHARE OPENGRAPH --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 bg-gray-50/80 border-b border-gray-100 flex items-center justify-between">
                <div class="flex items-center space-x-2.5">
                    <span class="w-7 h-7 rounded-lg bg-orange-100 text-[#f37023] flex items-center justify-center text-xs font-bold">1</span>
                    <div>
                        <h2 class="font-bold text-sm text-gray-900">SEO & Social Share (OpenGraph)</h2>
                        <p class="text-[11px] text-gray-500">Tampilan saat link website dibagikan ke WhatsApp, Telegram, Facebook, dan X/Twitter</p>
                    </div>
                </div>
                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-bold bg-green-50 text-green-700 border border-green-200">
                    <i class="fa-solid fa-share-nodes mr-1.5"></i> Social Ready
                </span>
            </div>

            <div class="p-6 space-y-6">
                {{-- Live Social Share Simulator --}}
                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-2">
                        <i class="fa-brands fa-whatsapp text-green-600 mr-1"></i> Preview Tampilan Share WhatsApp / Facebook
                    </label>
                    <div class="max-w-md bg-slate-50 rounded-2xl border border-gray-200 p-3.5 shadow-sm">
                        <div class="rounded-xl overflow-hidden border border-gray-200 bg-white">
                            <div class="h-40 bg-gray-100 flex items-center justify-center overflow-hidden relative">
                                <img id="ogPreviewImg" src="{{ asset($settings['og_image'] ?? '/uploads/2025/09/Logo-PKS-Resmi.png') }}" 
                                     alt="Preview OG" class="max-h-full max-w-full object-contain p-2">
                                <span class="absolute bottom-2 right-2 bg-black/60 text-white text-[10px] font-semibold px-2 py-0.5 rounded">OG Preview</span>
                            </div>
                            <div class="p-3 bg-white">
                                <p class="text-[10px] uppercase font-bold text-gray-400 tracking-wider">oganilir.pks.id</p>
                                <h4 id="ogPreviewTitle" class="text-xs font-bold text-gray-900 line-clamp-1 mt-0.5">
                                    {{ $settings['og_title'] ?? 'DPD PKS Ogan Ilir - Berkhidmat untuk Rakyat' }}
                                </h4>
                                <p id="ogPreviewDesc" class="text-[11px] text-gray-500 line-clamp-2 mt-1">
                                    {{ $settings['og_description'] ?? 'Website Resmi DPD PKS Ogan Ilir. Menyajikan informasi, berita, kegiatan, dan aspirasi rakyat Ogan Ilir.' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Judul OpenGraph (OG Title) <span class="text-red-500">*</span>
                        </label>
                        <input type="text" name="og_title" id="ogTitleInput" 
                               value="{{ $settings['og_title'] ?? 'DPD PKS Ogan Ilir - Berkhidmat untuk Rakyat' }}" 
                               class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023] font-medium"
                               placeholder="Judul website saat dibagikan ke medsos" required>
                        <p class="text-[11px] text-gray-400 mt-1">Direkomendasikan antara 40 - 60 karakter agar tidak terpotong di WhatsApp.</p>
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Deskripsi OpenGraph (OG Description) <span class="text-red-500">*</span>
                        </label>
                        <textarea name="og_description" id="ogDescInput" rows="2" 
                                  class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl p-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023] leading-relaxed"
                                  placeholder="Deskripsi ringkas yang tampil di bawah judul medsos" required>{{ $settings['og_description'] ?? 'Website Resmi Dewan Pengurus Daerah Partai Keadilan Sejahtera (PKS) Kabupaten Ogan Ilir. Menyajikan informasi, berita, kegiatan, dan aspirasi rakyat Ogan Ilir.' }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Upload Logo / Gambar OpenGraph (PNG / JPG)
                        </label>
                        <input type="file" name="og_image_file" accept="image/png, image/jpeg, image/webp" 
                               class="w-full text-xs text-gray-500 file:mr-3 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-orange-50 file:text-[#f37023] hover:file:bg-orange-100 bg-gray-50 rounded-xl border border-gray-200">
                        <p class="text-[11px] text-gray-400 mt-1">Format PNG resmi resolusi min. 600x315 px (Format PNG transparan/kotak logo PKS).</p>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Path / URL Logo OG Saat Ini
                        </label>
                        <input type="text" name="og_image" value="{{ $settings['og_image'] ?? '/uploads/2025/09/Logo-PKS-Resmi.png' }}" 
                               class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023] font-mono">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Tipe Twitter Card
                        </label>
                        <select name="twitter_card" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">
                            <option value="summary_large_image" {{ ($settings['twitter_card'] ?? '') == 'summary_large_image' ? 'selected' : '' }}>Large Image Card (Disarankan)</option>
                            <option value="summary" {{ ($settings['twitter_card'] ?? '') == 'summary' ? 'selected' : '' }}>Standard Summary</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Google Site Verification (Meta Tag)
                        </label>
                        <input type="text" name="google_site_verification" value="{{ $settings['google_site_verification'] ?? '' }}" 
                               placeholder="Contoh: abcd1234efgh5678"
                               class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023] font-mono">
                    </div>

                    <div class="md:col-span-2">
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            Meta Keywords (Kata Kunci SEO)
                        </label>
                        <input type="text" name="meta_keywords" value="{{ $settings['meta_keywords'] ?? 'pks, dpd pks ogan ilir, pks ogan ilir, partai keadilan sejahtera, indralaya, berita ogan ilir, sumatera selatan' }}" 
                               class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">
                        <p class="text-[11px] text-gray-400 mt-1">Pisahkan tiap kata kunci dengan tanda koma.</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- 2. IDENTITAS UTAMA WEBSITE --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 bg-gray-50/80 border-b border-gray-100 flex items-center justify-between">
                <div class="flex items-center space-x-2.5">
                    <span class="w-7 h-7 rounded-lg bg-orange-100 text-[#f37023] flex items-center justify-center text-xs font-bold">2</span>
                    <div>
                        <h2 class="font-bold text-sm text-gray-900">Identitas & Logo Website</h2>
                        <p class="text-[11px] text-gray-500">Nama situs, slogan, dan logo navigasi header</p>
                    </div>
                </div>
            </div>

            <div class="p-6 space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Nama Website / Organisasi</label>
                        <input type="text" name="site_name" value="{{ $settings['site_name'] ?? 'DPD PKS Ogan Ilir' }}" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Tagline / Slogan</label>
                        <input type="text" name="site_tagline" value="{{ $settings['site_tagline'] ?? 'Berkhidmat untuk Rakyat' }}" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Deskripsi Default Website (SEO)</label>
                    <textarea name="site_description" rows="2" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl p-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">{{ $settings['site_description'] ?? 'Official Website Dewan Pengurus Daerah Partai Keadilan Sejahtera (PKS) Kabupaten Ogan Ilir.' }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-center">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Upload Logo Header (PNG Transparan)</label>
                        <input type="file" name="site_logo_file" accept="image/png, image/jpeg, image/webp" 
                               class="w-full text-xs text-gray-500 file:mr-3 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-orange-50 file:text-[#f37023] hover:file:bg-orange-100 bg-gray-50 rounded-xl border border-gray-200">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Path Logo Saat Ini</label>
                        <input type="text" name="site_logo" value="{{ $settings['site_logo'] ?? '/uploads/2025/09/Logo-PKS-Resmi.png' }}" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 font-mono">
                    </div>
                </div>
            </div>
        </div>

        {{-- 3. KONTAK & SEKRETARIAT --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 bg-gray-50/80 border-b border-gray-100 flex items-center justify-between">
                <div class="flex items-center space-x-2.5">
                    <span class="w-7 h-7 rounded-lg bg-orange-100 text-[#f37023] flex items-center justify-center text-xs font-bold">3</span>
                    <div>
                        <h2 class="font-bold text-sm text-gray-900">Informasi Kontak & Sekretariat</h2>
                        <p class="text-[11px] text-gray-500">Tampil di halaman kontak dan footer website</p>
                    </div>
                </div>
            </div>

            <div class="p-6 space-y-4">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Email Resmi</label>
                        <input type="email" name="contact_email" value="{{ $settings['contact_email'] ?? 'pksoganilir@gmail.com' }}" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Nomor Telepon / WhatsApp</label>
                        <input type="text" name="contact_phone" value="{{ $settings['contact_phone'] ?? '082382336505' }}" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">Alamat Kantor DPD</label>
                        <textarea name="contact_address" rows="2" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl p-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">{{ $settings['contact_address'] ?? 'Jl. Komperta Taman Indralaya Blok C No. 05 Kel. Indralaya Indah, Kec. Indralaya, Kab. Ogan Ilir, Sumatera Selatan' }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        {{-- 4. MEDIA SOSIAL RESMI --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="px-6 py-4 bg-gray-50/80 border-b border-gray-100 flex items-center justify-between">
                <div class="flex items-center space-x-2.5">
                    <span class="w-7 h-7 rounded-lg bg-orange-100 text-[#f37023] flex items-center justify-center text-xs font-bold">4</span>
                    <div>
                        <h2 class="font-bold text-sm text-gray-900">Tautan Media Sosial Resmi</h2>
                        <p class="text-[11px] text-gray-500">Ikon dan tautan otomatis aktif di seluruh header dan footer</p>
                    </div>
                </div>
            </div>

            <div class="p-6">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            <i class="fa-brands fa-facebook text-blue-600 mr-1"></i> Facebook Page
                        </label>
                        <input type="text" name="social_facebook" value="{{ $settings['social_facebook'] ?? 'https://www.facebook.com/dpdpksoganilir' }}" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            <i class="fa-brands fa-x-twitter text-black mr-1"></i> X / Twitter
                        </label>
                        <input type="text" name="social_twitter" value="{{ $settings['social_twitter'] ?? 'https://x.com/DPD_PKS_OI' }}" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            <i class="fa-brands fa-instagram text-pink-600 mr-1"></i> Instagram
                        </label>
                        <input type="text" name="social_instagram" value="{{ $settings['social_instagram'] ?? 'https://www.instagram.com/dpd_pks_oi/' }}" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            <i class="fa-brands fa-youtube text-red-600 mr-1"></i> YouTube Channel
                        </label>
                        <input type="text" name="social_youtube" value="{{ $settings['social_youtube'] ?? 'https://www.youtube.com/@pksoganilir2307' }}" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1.5">
                            <i class="fa-brands fa-tiktok text-black mr-1"></i> TikTok
                        </label>
                        <input type="text" name="social_tiktok" value="{{ $settings['social_tiktok'] ?? 'https://www.tiktok.com/@pksoganilir' }}" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl px-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">
                    </div>
                </div>
            </div>
        </div>

        {{-- SUBMIT BAR --}}
        <div class="sticky bottom-4 bg-white/95 backdrop-blur-md p-4 rounded-2xl shadow-xl border border-gray-200 flex items-center justify-between">
            <span class="text-xs text-gray-500">
                <i class="fa-solid fa-shield-halved text-green-500 mr-1"></i> Perubahan tersimpan secara aman & tercatat di log aktivitas.
            </span>
            <button type="submit" class="bg-[#f37023] hover:bg-[#d85c14] text-white px-7 py-3 rounded-xl font-bold text-xs uppercase tracking-wider shadow-lg transition flex items-center space-x-2">
                <i class="fa-solid fa-floppy-disk"></i>
                <span>Simpan Seluruh Pengaturan</span>
            </button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const titleInput = document.getElementById('ogTitleInput');
        const descInput = document.getElementById('ogDescInput');
        const prevTitle = document.getElementById('ogPreviewTitle');
        const prevDesc = document.getElementById('ogPreviewDesc');

        if (titleInput && prevTitle) {
            titleInput.addEventListener('input', function() {
                prevTitle.textContent = this.value || 'Judul Website';
            });
        }
        if (descInput && prevDesc) {
            descInput.addEventListener('input', function() {
                prevDesc.textContent = this.value || 'Deskripsi Website';
            });
        }
    });
</script>
@endsection
