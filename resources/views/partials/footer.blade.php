{{-- FOOTER RESMI DPD PKS OGAN ILIR (PERSIS DESAIN ASLI WEB LAMA) --}}
<footer class="bg-[#000000] text-white pt-8 sm:pt-10 pb-8 font-['Poppins',sans-serif]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- 1. NEWSLETTER SUBSCRIBE BAR (Warna Oranye Pekat Tegas, Rounded, Subscribe Hitam) --}}
        <div class="bg-[#ff5001] rounded-[22px] sm:rounded-[26px] px-6 sm:px-10 py-5 sm:py-6 mb-10 sm:mb-12 shadow-xl flex flex-col md:flex-row items-center justify-between gap-5 text-center md:text-left">
            <div>
                <h2 class="text-xl sm:text-2xl font-semibold text-white tracking-tight">Dapatkan Info Terupdate</h2>
            </div>
            <form action="{{ route('hubungi') }}" method="GET" class="w-full md:w-auto flex flex-col sm:flex-row items-center gap-2.5 sm:gap-3 max-w-lg">
                <input type="email" name="subscribe_email" placeholder="Masukkan Email Anda" aria-label="Masukkan Email Anda untuk Berlangganan" class="bg-white text-xs sm:text-sm text-gray-800 placeholder-gray-500 px-5 py-2.5 sm:py-3 rounded-full focus:outline-none focus:ring-2 focus:ring-black w-full shadow-inner font-light" required>
                <button type="submit" aria-label="Kirim Langganan Info Terupdate" class="bg-black hover:bg-neutral-900 text-white font-semibold text-xs sm:text-sm px-6 py-2.5 sm:py-3 rounded-full shadow-lg transition flex items-center justify-center space-x-2 flex-shrink-0 cursor-pointer min-h-[44px]">
                    <i class="fa-solid fa-paper-plane text-xs" aria-hidden="true"></i>
                    <span>SUBSCRIBE</span>
                </button>
            </form>
        </div>

        {{-- 2. MAIN FOOTER CONTENT (4 Kolom Sesuai Persis Layout & Proporsi Web Lama) --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-12 gap-8 lg:gap-8 items-start text-center md:text-left">
            
            {{-- KOLOM 1: LOGO ASLI PKS (Kartu Persegi Putih Ramping Asli Elementor) --}}
            <div class="lg:col-span-2 flex justify-center md:justify-start">
                <img src="/uploads/2025/09/Logo-PKS-Footer-Asli.png" alt="Logo Resmi DPD PKS Ogan Ilir" class="w-28 sm:w-32 h-auto object-contain block shadow-sm mx-auto md:mx-0">
            </div>

            {{-- KOLOM 2: ALAMAT KANTOR & KONTAK --}}
            <div class="lg:col-span-4 space-y-3 text-center md:text-left">
                <h3 class="font-semibold text-[#ff5001] text-base sm:text-lg tracking-wide">
                    Alamat
                </h3>
                <p class="text-sm sm:text-[15px] text-white font-normal leading-relaxed pr-0 md:pr-2">
                    {{ $siteSettings['contact_address'] ?? 'Jl. Komperta Taman Indralaya Blok C No. 05 Kel. Indralaya Indah Kec. Indralaya Kab. OganIlir, Sumatera Selatan' }}
                </p>
                <div class="space-y-2 pt-1 text-sm sm:text-[15px] text-white">
                    <div class="flex items-center justify-center md:justify-start space-x-3">
                        <i class="fa-solid fa-phone-alt text-[#ff5001] w-4 text-center text-sm" aria-hidden="true"></i>
                        <a href="tel:{{ $siteSettings['contact_phone'] ?? '082382336505' }}" class="text-white hover:text-[#ff5001] transition py-1" aria-label="Telepon Kantor {{ $siteSettings['contact_phone'] ?? '082382336505' }}">{{ $siteSettings['contact_phone'] ?? '082382336505' }}</a>
                    </div>
                    <div class="flex items-center justify-center md:justify-start space-x-3">
                        <i class="fa-solid fa-envelope text-[#ff5001] w-4 text-center text-sm" aria-hidden="true"></i>
                        <a href="mailto:{{ $siteSettings['contact_email'] ?? 'pksoganilir@gmail.com' }}" class="text-white hover:text-[#ff5001] transition py-1" aria-label="Email Kantor {{ $siteSettings['contact_email'] ?? 'pksoganilir@gmail.com' }}">{{ $siteSettings['contact_email'] ?? 'pksoganilir@gmail.com' }}</a>
                    </div>
                </div>
            </div>

            {{-- KOLOM 3: SOSIAL MEDIA & TAUTAN WEB RESMI --}}
            <div class="lg:col-span-3 space-y-2 text-center md:text-left">
                <h3 class="font-semibold text-[#ff5001] text-base sm:text-lg tracking-wide">
                    Sosial Media
                </h3>
                <p class="text-base sm:text-[17px] font-bold text-white mb-3">
                    DPD PKS Ogan Ilir
                </p>
                
                {{-- 5 Ikon Bulat Putih dengan Ikon Oranye di Dalamnya (Touch Target 44px+) --}}
                <div class="flex items-center justify-center md:justify-start space-x-2 pt-1 pb-3">
                    <a href="{{ $siteSettings['social_facebook'] ?? 'https://www.facebook.com/dpdpksoganilir' }}" target="_blank" class="w-11 h-11 rounded-full bg-white flex items-center justify-center text-[#ff5001] hover:scale-110 transition shadow" aria-label="Kunjungi Facebook DPD PKS Ogan Ilir">
                        <i class="fa-brands fa-facebook-f text-base" aria-hidden="true"></i>
                    </a>
                    <a href="{{ $siteSettings['social_twitter'] ?? 'https://x.com/DPD_PKS_OI' }}" target="_blank" class="w-11 h-11 rounded-full bg-white flex items-center justify-center text-[#ff5001] hover:scale-110 transition shadow" aria-label="Kunjungi Twitter DPD PKS Ogan Ilir">
                        <i class="fa-brands fa-twitter text-base" aria-hidden="true"></i>
                    </a>
                    <a href="{{ $siteSettings['social_instagram'] ?? 'https://www.instagram.com/dpd_pks_oi/' }}" target="_blank" class="w-11 h-11 rounded-full bg-white flex items-center justify-center text-[#ff5001] hover:scale-110 transition shadow" aria-label="Kunjungi Instagram DPD PKS Ogan Ilir">
                        <i class="fa-brands fa-instagram text-base" aria-hidden="true"></i>
                    </a>
                    <a href="{{ $siteSettings['social_youtube'] ?? 'https://www.youtube.com/@pksoganilir2307' }}" target="_blank" class="w-11 h-11 rounded-full bg-white flex items-center justify-center text-[#ff5001] hover:scale-110 transition shadow" aria-label="Kunjungi YouTube DPD PKS Ogan Ilir">
                        <i class="fa-brands fa-youtube text-base" aria-hidden="true"></i>
                    </a>
                    <a href="{{ $siteSettings['social_tiktok'] ?? 'https://www.tiktok.com/@pksoganilir' }}" target="_blank" class="w-11 h-11 rounded-full bg-white flex items-center justify-center text-[#ff5001] hover:scale-110 transition shadow" aria-label="Kunjungi TikTok DPD PKS Ogan Ilir">
                        <i class="fa-brands fa-tiktok text-base" aria-hidden="true"></i>
                    </a>
                </div>

                {{-- Tautan Web Resmi dengan Ikon Globe Oranye --}}
                <div class="space-y-1.5 text-sm sm:text-[15px] text-white pt-1">
                    <div class="flex items-center justify-center md:justify-start space-x-3">
                        <i class="fa-solid fa-globe text-[#ff5001] w-4 text-center text-sm" aria-hidden="true"></i>
                        <a href="https://oganilir.pks.id" target="_blank" class="text-white hover:text-[#ff5001] transition py-1">oganilir.pks.id</a>
                    </div>
                    <div class="flex items-center justify-center md:justify-start space-x-3">
                        <i class="fa-solid fa-globe text-[#ff5001] w-4 text-center text-sm" aria-hidden="true"></i>
                        <a href="https://pksoganilir.com" target="_blank" class="text-white hover:text-[#ff5001] transition py-1">pksoganilir.com</a>
                    </div>
                </div>
            </div>

            {{-- KOLOM 4: PENGUNJUNG (Angka Putih Tegas Pas di Garis Simetri dengan Animasi Hitung Menarik) --}}
            <div class="lg:col-span-3 space-y-2 text-center md:text-left">
                <h3 class="font-semibold text-[#ff5001] text-base sm:text-lg tracking-wide flex items-center justify-center md:justify-start gap-2">
                    <span>Pengunjung</span>
                    <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-bold bg-[#ff5001]/20 text-white border border-[#ff5001]/30">
                        <span class="w-1.5 h-1.5 rounded-full bg-[#ff5001] animate-ping mr-1"></span> Live
                    </span>
                </h3>
                <div class="text-3xl sm:text-4xl lg:text-5xl font-bold text-white tracking-normal font-sans leading-tight pt-1 flex items-center justify-center md:justify-start" style="font-family: Arial, sans-serif;">
                    <span id="footer-visitor-counter" data-target="{{ $rawVisitorHits ?? (int) str_replace(['.', ','], '', $visitorHits ?? '53512') }}">
                        {{ $visitorHits ?? '53.512' }}
                    </span>
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
                Copyright @ 2025 DPD PKS Ogan Ilir. All Right Reserved. Terbit: 15/09/2025. Developed by <a href="https://berandadigital.net" target="_blank" rel="noopener noreferrer" class="text-[#38bdf8] hover:underline font-bold" aria-label="Website Pengembang Beranda Teknologi Digital">Beranda Teknologi Digital</a>
            </div>

            {{-- Privacy Policy & Kontak --}}
            <div class="flex items-center justify-center sm:justify-end space-x-6 text-xs sm:text-[13px] text-white font-normal flex-shrink-0">
                <a href="{{ route('page.privacy-policy') }}" class="text-white hover:text-[#ff5001] transition py-2 inline-block">Privacy Policy</a>
                <a href="{{ route('hubungi') }}" class="text-white hover:text-[#ff5001] transition py-2 inline-block">Kontak</a>
            </div>
        </div>

    </div>

    {{-- Script Animasi Hitung Visitor Counter --}}
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const counterEl = document.getElementById('footer-visitor-counter');
            if (!counterEl) return;

            const targetVal = parseInt(counterEl.getAttribute('data-target') || '53512', 10);
            let hasRun = false;

            const runCounterAnimation = () => {
                if (hasRun) return;
                hasRun = true;

                const duration = 2000; // 2 detik animasi halus
                const startTime = performance.now();
                const startVal = Math.max(0, targetVal - 2500); // Mulai dari angka dekat atau 0 untuk efek odometer

                const formatNum = (num) => {
                    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
                };

                const frame = (now) => {
                    const elapsed = now - startTime;
                    const progress = Math.min(elapsed / duration, 1);
                    // Easing quartic out: cepat di awal lalu melambat presisi di angka akhir
                    const ease = 1 - Math.pow(1 - progress, 4);
                    const current = Math.floor(startVal + (targetVal - startVal) * ease);

                    counterEl.textContent = formatNum(current);

                    if (progress < 1) {
                        requestAnimationFrame(frame);
                    } else {
                        counterEl.textContent = formatNum(targetVal);
                    }
                };

                requestAnimationFrame(frame);
            };

            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            runCounterAnimation();
                            observer.unobserve(counterEl);
                        }
                    });
                }, { threshold: 0.1 });
                observer.observe(counterEl);
            } else {
                runCounterAnimation();
            }
        });
    </script>
</footer>
