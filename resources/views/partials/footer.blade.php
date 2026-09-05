{{-- FOOTER RESMI DPD PKS OGAN ILIR (PERSIS DESAIN ASLI WEB LAMA) --}}
<footer class="bg-[#000000] text-white pt-8 sm:pt-10 pb-8 font-['Poppins',sans-serif]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- 1. NEWSLETTER SUBSCRIBE BAR (Warna Oranye Pekat Tegas, Rounded, Subscribe Hitam) --}}
        <div class="bg-[#ff5001] rounded-[22px] sm:rounded-[26px] px-6 sm:px-10 py-5 sm:py-6 mb-10 sm:mb-12 shadow-xl flex flex-col md:flex-row items-center justify-between gap-5 text-center md:text-left">
            <div>
                <h3 class="text-xl sm:text-2xl font-semibold text-white tracking-tight">Dapatkan Info Terupdate</h3>
            </div>
            <form action="{{ route('hubungi') }}" method="GET" class="w-full md:w-auto flex flex-col sm:flex-row items-center gap-2.5 sm:gap-3 max-w-lg">
                <input type="email" name="subscribe_email" placeholder="Masukkan Email Anda" class="bg-white text-xs sm:text-sm text-gray-800 placeholder-[#ff5001]/75 px-5 py-2.5 sm:py-3 rounded-full focus:outline-none focus:ring-2 focus:ring-black w-full shadow-inner font-light" required>
                <button type="submit" class="bg-black hover:bg-neutral-900 text-white font-semibold text-xs sm:text-sm px-6 py-2.5 sm:py-3 rounded-full shadow-lg transition flex items-center justify-center space-x-2 flex-shrink-0 cursor-pointer">
                    <i class="fa-solid fa-paper-plane text-xs"></i>
                    <span>SUBSCRIBE</span>
                </button>
            </form>
        </div>

        {{-- 2. MAIN FOOTER CONTENT (4 Kolom Sesuai Persis Layout & Proporsi Web Lama) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-8 items-start text-left">
            
            {{-- KOLOM 1: LOGO ASLI PKS (Kartu Persegi Putih Ramping Asli Elementor) --}}
            <div class="lg:col-span-2 flex justify-start">
                <img src="/uploads/2025/09/Logo-PKS-Footer-Asli.png" alt="Logo PKS" class="w-28 sm:w-32 h-auto object-contain block shadow-sm">
            </div>

            {{-- KOLOM 2: ALAMAT KANTOR & KONTAK --}}
            <div class="lg:col-span-4 space-y-3">
                <h4 class="font-semibold text-[#ff5001] text-base sm:text-lg tracking-wide">
                    Alamat
                </h4>
                <p class="text-sm sm:text-[15px] text-white font-normal leading-relaxed pr-2">
                    Jl. Komperta Taman Indralaya Blok C No. 05 Kel. Indralaya Indah Kec. Indralaya Kab. OganIlir, Sumatera Selatan
                </p>
                <div class="space-y-2 pt-1 text-sm sm:text-[15px] text-white">
                    <div class="flex items-center space-x-3">
                        <i class="fa-solid fa-phone-alt text-[#ff5001] w-4 text-center text-sm"></i>
                        <span class="text-white">082382336505</span>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fa-solid fa-envelope text-[#ff5001] w-4 text-center text-sm"></i>
                        <span class="text-white">pksoganilir@gmail.com</span>
                    </div>
                </div>
            </div>

            {{-- KOLOM 3: SOSIAL MEDIA & TAUTAN WEB RESMI --}}
            <div class="lg:col-span-3 space-y-2">
                <h4 class="font-semibold text-[#ff5001] text-base sm:text-lg tracking-wide">
                    Sosial Media
                </h4>
                <p class="text-base sm:text-[17px] font-bold text-white mb-3">
                    DPD PKS Ogan Ilir
                </p>
                
                {{-- 5 Ikon Bulat Putih dengan Ikon Oranye di Dalamnya (Persis Web Lama) --}}
                <div class="flex items-center space-x-2 pt-1 pb-3">
                    <a href="{{ $siteSettings['social_facebook'] ?? 'https://www.facebook.com/dpdpksoganilir' }}" target="_blank" class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-[#ff5001] hover:scale-110 transition shadow" aria-label="Facebook">
                        <i class="fa-brands fa-facebook-f text-sm"></i>
                    </a>
                    <a href="{{ $siteSettings['social_twitter'] ?? 'https://x.com/DPD_PKS_OI' }}" target="_blank" class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-[#ff5001] hover:scale-110 transition shadow" aria-label="Twitter">
                        <i class="fa-brands fa-twitter text-sm"></i>
                    </a>
                    <a href="{{ $siteSettings['social_instagram'] ?? 'https://www.instagram.com/dpd_pks_oi/' }}" target="_blank" class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-[#ff5001] hover:scale-110 transition shadow" aria-label="Instagram">
                        <i class="fa-brands fa-instagram text-sm"></i>
                    </a>
                    <a href="{{ $siteSettings['social_youtube'] ?? 'https://www.youtube.com/@pksoganilir2307' }}" target="_blank" class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-[#ff5001] hover:scale-110 transition shadow" aria-label="YouTube">
                        <i class="fa-brands fa-youtube text-sm"></i>
                    </a>
                    <a href="{{ $siteSettings['social_tiktok'] ?? 'https://www.tiktok.com/@pksoganilir' }}" target="_blank" class="w-8 h-8 rounded-full bg-white flex items-center justify-center text-[#ff5001] hover:scale-110 transition shadow" aria-label="TikTok">
                        <i class="fa-brands fa-tiktok text-sm"></i>
                    </a>
                </div>

                {{-- Tautan Web Resmi dengan Ikon Globe Oranye --}}
                <div class="space-y-1.5 text-sm sm:text-[15px] text-white pt-1">
                    <div class="flex items-center space-x-3">
                        <i class="fa-solid fa-globe text-[#ff5001] w-4 text-center text-sm"></i>
                        <a href="https://oganilir.pks.id" target="_blank" class="text-white hover:text-[#ff5001] transition">oganilir.pks.id</a>
                    </div>
                    <div class="flex items-center space-x-3">
                        <i class="fa-solid fa-globe text-[#ff5001] w-4 text-center text-sm"></i>
                        <a href="https://pksoganilir.com" target="_blank" class="text-white hover:text-[#ff5001] transition">pksoganilir.com</a>
                    </div>
                </div>
            </div>

            {{-- KOLOM 4: PENGUNJUNG (Angka Putih Tegas Pas di Garis Simetri) --}}
            <div class="lg:col-span-3 space-y-2">
                <h4 class="font-semibold text-[#ff5001] text-base sm:text-lg tracking-wide">
                    Pengunjung
                </h4>
                <div class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white tracking-normal font-sans leading-tight pt-1" style="font-family: Arial, sans-serif;">
                    {{ $visitorHits ?? '53,511' }}
                </div>
            </div>

        </div>

        {{-- 3. DUA GARIS PEMISAH HORIZONTAL TEGAS (Persis Web Lama) --}}
        <div class="mt-12 mb-6 space-y-1">
            <div class="border-t border-[#333333]"></div>
            <div class="border-t border-[#333333]"></div>
        </div>

        {{-- 4. BOTTOM COPYRIGHT & LINKS --}}
        <div class="flex flex-col sm:flex-row justify-between items-center text-xs sm:text-[13px] text-white gap-4 text-center sm:text-left">
            <div>
                Copyright @ 2025 DPD PKS Ogan Ilir. All Right Reserved. Terbit: 15/09/2025. Developed by <a href="https://berandadigital.net" target="_blank" rel="noopener noreferrer" class="text-[#0088cc] hover:underline font-bold">Beranda Teknologi Digital</a>
            </div>

            {{-- Privacy Policy & Kontak --}}
            <div class="flex items-center space-x-6 text-xs sm:text-[13px] text-white font-normal flex-shrink-0">
                <a href="{{ route('page.privacy-policy') }}" class="text-white hover:text-[#ff5001] transition">Privacy Policy</a>
                <a href="{{ route('hubungi') }}" class="text-white hover:text-[#ff5001] transition">Kontak</a>
            </div>
        </div>

    </div>
</footer>
