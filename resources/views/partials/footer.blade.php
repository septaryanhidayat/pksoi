{{-- FOOTER RESMI DPD PKS OGAN ILIR --}}
<footer class="bg-[#000000] text-gray-300 pt-16 pb-8 border-t-4 border-[#ff5001]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- NEWSLETTER SUBSCRIBE BAR (Sesuai Desain Asli Web Lama) --}}
        <div class="bg-gradient-to-r from-[#ff5001] to-[#ff6a00] rounded-3xl p-6 sm:p-8 mb-12 shadow-2xl flex flex-col md:flex-row items-center justify-between gap-6 text-center md:text-left">
            <div>
                <h3 class="text-xl sm:text-2xl font-black text-white tracking-tight">Dapatkan Info Terupdate</h3>
                <p class="text-xs sm:text-sm text-orange-100 mt-1">Berlangganan kabar berita, siaran pers, dan agenda dakwah DPD PKS Ogan Ilir.</p>
            </div>
            <form action="{{ route('hubungi') }}" method="GET" class="w-full md:w-auto flex flex-col sm:flex-row gap-2.5 max-w-md">
                <input type="email" name="subscribe_email" placeholder="Masukkan Email Anda..." class="bg-white text-xs sm:text-sm text-gray-900 px-5 py-3 rounded-full focus:outline-none focus:ring-2 focus:ring-black w-full shadow-inner font-medium" required>
                <button type="submit" class="bg-black hover:bg-gray-900 text-white font-extrabold text-xs sm:text-sm px-7 py-3 rounded-full shadow-lg transition flex items-center justify-center space-x-2 flex-shrink-0">
                    <i class="fa-solid fa-paper-plane text-xs"></i>
                    <span>SUBSCRIBE</span>
                </button>
            </form>
        </div>

        {{-- MAIN FOOTER GRID --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10 pb-12 border-b border-gray-800 text-center sm:text-left">
            
            {{-- Col 1: Logo & Profil DPD --}}
            <div class="space-y-4 flex flex-col items-center sm:items-start">
                <div class="bg-white p-3.5 rounded-2xl shadow-md inline-block">
                    <img src="/uploads/2025/09/Logo-PKS-e1758079670733.webp" alt="Logo PKS" class="h-14 w-auto object-contain" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
                </div>
                <h4 class="font-extrabold text-white text-base">DPD PKS Ogan Ilir</h4>
                <p class="text-xs text-gray-400 leading-relaxed max-w-xs sm:max-w-none">
                    Dewan Pengurus Daerah Partai Keadilan Sejahtera Kabupaten Ogan Ilir. Berkhidmat melayani rakyat, memperjuangkan keadilan, dan kesejahteraan umat.
                </p>
                <div class="pt-2 flex items-center justify-center sm:justify-start space-x-3">
                    <a href="{{ $siteSettings['social_facebook'] ?? 'https://facebook.com/dpdpksoganilir' }}" target="_blank" class="w-9 h-9 rounded-full bg-gray-900 hover:bg-[#1877f2] flex items-center justify-center text-white transition shadow" aria-label="Facebook">
                        <i class="fa-brands fa-facebook-f text-sm"></i>
                    </a>
                    <a href="{{ $siteSettings['social_instagram'] ?? 'https://instagram.com/dpdpksoganilir' }}" target="_blank" class="w-9 h-9 rounded-full bg-gray-900 hover:bg-[#e4405f] flex items-center justify-center text-white transition shadow" aria-label="Instagram">
                        <i class="fa-brands fa-instagram text-sm"></i>
                    </a>
                    <a href="{{ $siteSettings['social_youtube'] ?? 'https://youtube.com/@pkstvoganilir' }}" target="_blank" class="w-9 h-9 rounded-full bg-gray-900 hover:bg-[#ff0000] flex items-center justify-center text-white transition shadow" aria-label="YouTube">
                        <i class="fa-brands fa-youtube text-sm"></i>
                    </a>
                    <a href="{{ $siteSettings['social_tiktok'] ?? 'https://tiktok.com/@pksoganilir' }}" target="_blank" class="w-9 h-9 rounded-full bg-gray-900 hover:bg-zinc-800 flex items-center justify-center text-white transition shadow" aria-label="TikTok">
                        <i class="fa-brands fa-tiktok text-sm"></i>
                    </a>
                </div>
            </div>

            {{-- Col 2: Alamat & Kontak --}}
            <div class="space-y-4">
                <h3 class="text-[#ff5001] font-extrabold text-sm uppercase tracking-wider border-b border-gray-800 pb-2 inline-block sm:block">
                    Alamat Kantor
                </h3>
                <p class="text-xs text-gray-300 leading-relaxed">
                    {{ $siteSettings['contact_address'] ?? 'Jl. Komperta Taman Indralaya Blok C No. 05 Kel. Indralaya Indah, Kec. Indralaya, Kab. Ogan Ilir, Sumatera Selatan' }}
                </p>
                <div class="space-y-2 text-xs text-gray-300 pt-1">
                    <div class="flex items-center justify-center sm:justify-start">
                        <i class="fa-solid fa-phone mr-2.5 text-[#ff5001]"></i>
                        <span>{{ $siteSettings['contact_phone'] ?? '082382336505' }}</span>
                    </div>
                    <div class="flex items-center justify-center sm:justify-start">
                        <i class="fa-solid fa-envelope mr-2.5 text-[#ff5001]"></i>
                        <span>{{ $siteSettings['contact_email'] ?? 'pksoganilir@gmail.com' }}</span>
                    </div>
                    <div class="flex items-center justify-center sm:justify-start">
                        <i class="fa-solid fa-globe mr-2.5 text-[#ff5001]"></i>
                        <span>oganilir.pks.id &bull; pksoganilir.com</span>
                    </div>
                </div>
            </div>

            {{-- Col 3: Tautan Cepat & Statistik Pengunjung --}}
            <div class="space-y-4">
                <h3 class="text-[#ff5001] font-extrabold text-sm uppercase tracking-wider border-b border-gray-800 pb-2 inline-block sm:block">
                    Tautan Cepat
                </h3>
                <ul class="grid grid-cols-2 gap-2 text-xs text-gray-400">
                    <li><a href="{{ route('home') }}" class="hover:text-[#ff5001] transition">Beranda</a></li>
                    <li><a href="{{ route('page.sambutan') }}" class="hover:text-[#ff5001] transition">Sambutan</a></li>
                    <li><a href="{{ route('page.tentang-kami') }}" class="hover:text-[#ff5001] transition">Tentang Kami</a></li>
                    <li><a href="{{ route('page.visi-misi') }}" class="hover:text-[#ff5001] transition">Visi & Misi</a></li>
                    <li><a href="{{ route('dewan.index') }}" class="hover:text-[#ff5001] transition">Fraksi PKS</a></li>
                    <li><a href="{{ route('dpc.index') }}" class="hover:text-[#ff5001] transition">DPC Se-Ogan Ilir</a></li>
                    <li><a href="{{ route('artikel.index') }}" class="hover:text-[#ff5001] transition">Berita</a></li>
                    <li><a href="{{ route('agenda.index') }}" class="hover:text-[#ff5001] transition">Agenda</a></li>
                    <li><a href="{{ route('download.index') }}" class="hover:text-[#ff5001] transition">Download</a></li>
                    <li><a href="{{ route('galeri.index') }}" class="hover:text-[#ff5001] transition">Galeri Foto</a></li>
                </ul>

                {{-- Counter Pengunjung Sesuai Desain Lama --}}
                <div class="pt-3">
                    <span class="text-[11px] font-bold text-[#ff5001] uppercase tracking-wider block mb-1">Pengunjung Web</span>
                    <span class="text-3xl sm:text-4xl font-black text-white tracking-wider font-mono">53,481</span>
                </div>
            </div>

            {{-- Col 4: TOMBOL DAFTAR & DONASI DENGAN KONTRAS TINGGI --}}
            <div class="space-y-4">
                <h3 class="text-[#ff5001] font-extrabold text-sm uppercase tracking-wider border-b border-gray-800 pb-2 inline-block sm:block">
                    Pusat Partisipasi
                </h3>
                
                {{-- TOMBOL DAFTAR: BACKGROUND ORANYE MENYALA #ff5001 SANGAT KONTRAS --}}
                <a href="https://daftar.pks.id" target="_blank" class="group block w-full bg-[#ff5001] hover:bg-[#e04500] text-white p-4 rounded-2xl shadow-xl transition transform hover:-translate-y-1 border border-orange-400/40 text-left">
                    <div class="flex items-center space-x-3.5">
                        <div class="w-11 h-11 rounded-xl bg-white/20 flex items-center justify-center text-white text-xl flex-shrink-0 group-hover:scale-110 transition">
                            <i class="fa-solid fa-user-plus"></i>
                        </div>
                        <div>
                            <span class="text-[10px] uppercase font-bold tracking-wider text-orange-100 block">Formulir Resmi</span>
                            <h4 class="text-sm font-black text-white">Daftar Anggota PKS</h4>
                            <p class="text-[11px] text-orange-100/90 leading-tight mt-0.5">Gabung bersama kader perjuangan</p>
                        </div>
                    </div>
                </a>

                {{-- TOMBOL DONASI: BACKGROUND KUNING EMAS / EMERALD SANGAT KONTRAS DENGAN BG HITAM --}}
                <a href="{{ route('donasi') }}" class="group block w-full bg-gradient-to-r from-amber-400 via-yellow-400 to-amber-500 hover:from-amber-300 hover:to-yellow-400 text-gray-950 p-4 rounded-2xl shadow-xl transition transform hover:-translate-y-1 border border-amber-300 text-left">
                    <div class="flex items-center space-x-3.5">
                        <div class="w-11 h-11 rounded-xl bg-black/10 flex items-center justify-center text-gray-950 text-xl flex-shrink-0 group-hover:scale-110 transition">
                            <i class="fa-solid fa-hand-holding-heart"></i>
                        </div>
                        <div>
                            <span class="text-[10px] uppercase font-black tracking-wider text-gray-800 block">Infaq & Shadaqah</span>
                            <h4 class="text-sm font-black text-gray-950">Donasi Perjuangan</h4>
                            <p class="text-[11px] text-gray-800 font-medium leading-tight mt-0.5">Dukung pelayanan sosial & dakwah</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>

        {{-- COPYRIGHT & PRIVACY (Rata Tengah di Mobile) --}}
        <div class="pt-8 flex flex-col sm:flex-row justify-between items-center text-xs text-gray-500 gap-3 text-center sm:text-left">
            <div>
                Copyright &copy; {{ date('Y') }} <span class="text-white font-semibold">DPD PKS Ogan Ilir</span>. All Rights Reserved. Terbit: 15/09/2025. Developed by Beranda Teknologi Digital.
            </div>
            <div class="flex items-center justify-center space-x-4">
                <a href="{{ route('page.privacy-policy') }}" class="hover:text-gray-300 transition">Privacy Policy</a>
                <span>&bull;</span>
                <a href="{{ route('hubungi') }}" class="hover:text-gray-300 transition">Kontak</a>
                <span>&bull;</span>
                <a href="{{ route('download.logo') }}" class="hover:text-gray-300 transition">Panduan Logo</a>
            </div>
        </div>
    </div>
</footer>
