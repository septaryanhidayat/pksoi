{{-- FOOTER RESMI DPD PKS OGAN ILIR --}}
<footer class="bg-[#000000] text-gray-300 pt-12 pb-8 border-t-4 border-[#ff5001]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- 1. NEWSLETTER SUBSCRIBE BAR (Sesuai Desain Asli Web Lama) --}}
        <div class="bg-gradient-to-r from-[#ff5001] to-[#ff6a00] rounded-2xl sm:rounded-3xl p-5 sm:p-6 mb-12 shadow-2xl flex flex-col md:flex-row items-center justify-between gap-5 text-center md:text-left">
            <div>
                <h3 class="text-xl sm:text-2xl font-black text-white tracking-tight">Dapatkan Info Terupdate</h3>
            </div>
            <form action="{{ route('hubungi') }}" method="GET" class="w-full md:w-auto flex flex-col sm:flex-row gap-2.5 max-w-md">
                <input type="email" name="subscribe_email" placeholder="Masukkan Email Anda" class="bg-white text-xs sm:text-sm text-gray-900 px-5 py-2.5 rounded-full focus:outline-none focus:ring-2 focus:ring-black w-full shadow-inner font-medium placeholder-gray-400" required>
                <button type="submit" class="bg-black hover:bg-gray-900 text-white font-extrabold text-xs sm:text-sm px-6 py-2.5 rounded-full shadow-lg transition flex items-center justify-center space-x-2 flex-shrink-0">
                    <i class="fa-solid fa-paper-plane text-xs"></i>
                    <span>SUBSCRIBE</span>
                </button>
            </form>
        </div>

        {{-- 2. MAIN FOOTER CONTENT (Logo Besar di Kiri, Alamat, Sosial Media, Pengunjung) --}}
        <div class="flex flex-col lg:flex-row items-center lg:items-start justify-between gap-8 sm:gap-10 pb-12 border-b border-gray-800 text-center lg:text-left">
            
            {{-- LOGO BESAR KOTAK PUTIH (Persis Screenshot Web Lama) --}}
            <div class="flex-shrink-0">
                <div class="w-36 h-36 sm:w-44 sm:h-44 bg-white rounded-2xl p-4 shadow-xl flex items-center justify-center border border-gray-200">
                    <img src="/uploads/2025/09/Logo-PKS-e1758079670733.webp" alt="Logo DPD PKS Ogan Ilir" class="w-full h-full object-contain" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
                </div>
            </div>

            {{-- ALAMAT KANTOR --}}
            <div class="space-y-3 max-w-sm">
                <h4 class="font-extrabold text-[#ff5001] text-base tracking-wide">
                    Alamat
                </h4>
                <p class="text-xs text-gray-300 leading-relaxed font-light">
                    Jl. Komperta Taman Indralaya Blok C No. 05 Kel. Indralaya Indah Kec. Indralaya Kab. OganIlir, Sumatera Selatan
                </p>
                <div class="space-y-1.5 text-xs text-gray-300 pt-1">
                    <div class="flex items-center justify-center lg:justify-start">
                        <i class="fa-solid fa-phone mr-2.5 text-[#ff5001]"></i>
                        <span>082382336505</span>
                    </div>
                    <div class="flex items-center justify-center lg:justify-start">
                        <i class="fa-solid fa-envelope mr-2.5 text-[#ff5001]"></i>
                        <span>pksoganilir@gmail.com</span>
                    </div>
                </div>
            </div>

            {{-- SOSIAL MEDIA & WEBSITE --}}
            <div class="space-y-3">
                <h4 class="font-extrabold text-[#ff5001] text-base tracking-wide">
                    Sosial Media
                </h4>
                <p class="text-xs text-white font-bold">
                    DPD PKS Ogan Ilir
                </p>
                
                {{-- 5 Ikon Bulat Oranye --}}
                <div class="flex items-center justify-center lg:justify-start space-x-2 pt-0.5">
                    <a href="{{ $siteSettings['social_facebook'] ?? 'https://facebook.com/dpdpksoganilir' }}" target="_blank" class="w-7 h-7 rounded-full bg-[#ff5001] hover:bg-[#e04500] flex items-center justify-center text-white transition shadow text-xs" aria-label="Facebook">
                        <i class="fa-brands fa-facebook-f"></i>
                    </a>
                    <a href="{{ $siteSettings['social_twitter'] ?? 'https://x.com/pksoganilir' }}" target="_blank" class="w-7 h-7 rounded-full bg-[#ff5001] hover:bg-[#e04500] flex items-center justify-center text-white transition shadow text-xs" aria-label="Twitter">
                        <i class="fa-brands fa-x-twitter"></i>
                    </a>
                    <a href="{{ $siteSettings['social_instagram'] ?? 'https://instagram.com/dpdpksoganilir' }}" target="_blank" class="w-7 h-7 rounded-full bg-[#ff5001] hover:bg-[#e04500] flex items-center justify-center text-white transition shadow text-xs" aria-label="Instagram">
                        <i class="fa-brands fa-instagram"></i>
                    </a>
                    <a href="{{ $siteSettings['social_youtube'] ?? 'https://youtube.com/@pkstvoganilir' }}" target="_blank" class="w-7 h-7 rounded-full bg-[#ff5001] hover:bg-[#e04500] flex items-center justify-center text-white transition shadow text-xs" aria-label="YouTube">
                        <i class="fa-brands fa-youtube"></i>
                    </a>
                    <a href="{{ $siteSettings['social_tiktok'] ?? 'https://tiktok.com/@pksoganilir' }}" target="_blank" class="w-7 h-7 rounded-full bg-[#ff5001] hover:bg-[#e04500] flex items-center justify-center text-white transition shadow text-xs" aria-label="TikTok">
                        <i class="fa-brands fa-tiktok"></i>
                    </a>
                </div>

                {{-- Tautan Web Resmi --}}
                <div class="space-y-1 text-xs text-gray-300 pt-1">
                    <div class="flex items-center justify-center lg:justify-start">
                        <i class="fa-solid fa-globe mr-2 text-[#ff5001]"></i>
                        <a href="https://oganilir.pks.id" target="_blank" class="hover:text-[#ff5001] transition">oganilir.pks.id</a>
                    </div>
                    <div class="flex items-center justify-center lg:justify-start">
                        <i class="fa-solid fa-globe mr-2 text-[#ff5001]"></i>
                        <a href="https://pksoganilir.com" target="_blank" class="hover:text-[#ff5001] transition">pksoganilir.com</a>
                    </div>
                </div>
            </div>

            {{-- PENGUNJUNG --}}
            <div class="space-y-2 lg:text-left flex flex-col items-center lg:items-start min-w-[140px]">
                <h4 class="font-extrabold text-[#ff5001] text-base tracking-wide">
                    Pengunjung
                </h4>
                <div class="text-4xl sm:text-5xl font-extrabold text-white font-mono tracking-tight">
                    {{ $visitorHits ?? '53,511' }}
                </div>
            </div>

        </div>

        {{-- 3. BOTTOM COPYRIGHT & LINKS --}}
        <div class="pt-6 flex flex-col sm:flex-row justify-between items-center text-xs text-gray-400 gap-4 text-center sm:text-left">
            <span>
                Copyright @ 2025 <span class="text-white font-semibold">DPD PKS Ogan Ilir</span>. All Right Reserved. Terbit: 15/09/2025. Developed by <span class="text-sky-400 font-semibold">Beranda Teknologi Digital</span>
            </span>

            {{-- Privacy Policy & Kontak --}}
            <div class="flex items-center space-x-6 text-xs text-gray-300">
                <a href="{{ route('page.privacy-policy') }}" class="hover:text-[#ff5001] transition">Privacy Policy</a>
                <a href="{{ route('hubungi') }}" class="hover:text-[#ff5001] transition">Kontak</a>
            </div>
        </div>

    </div>
</footer>
