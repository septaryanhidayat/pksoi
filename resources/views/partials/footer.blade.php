{{-- FOOTER --}}
<footer class="bg-[#18181b] text-gray-300 pt-16 pb-8 border-t-4 border-[#f37023]">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 pb-12 border-b border-gray-800">
            
            {{-- Col 1: Brand & Bio --}}
            <div class="space-y-4">
                <div class="flex items-center space-x-3">
                    <img src="/uploads/2025/09/Logo-Web-DPD3.webp" alt="Logo PKS Ogan Ilir" class="h-12 w-auto" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
                </div>
                <p class="text-sm text-gray-400 leading-relaxed">
                    Dewan Pengurus Daerah Partai Keadilan Sejahtera (PKS) Kabupaten Ogan Ilir berkomitmen melayani masyarakat, mengawal aspirasi umat, dan mewujudkan Ogan Ilir yang religius, maju, dan sejahtera.
                </p>
                <div class="pt-2 flex items-center space-x-3">
                    <a href="{{ $siteSettings['social_facebook'] ?? 'https://facebook.com/dpdpksoganilir' }}" target="_blank" class="w-9 h-9 rounded-full bg-gray-800 hover:bg-[#1877f2] flex items-center justify-center text-white transition" aria-label="Facebook">
                        <i class="fa-brands fa-facebook-f text-sm"></i>
                    </a>
                    <a href="{{ $siteSettings['social_instagram'] ?? 'https://instagram.com/dpdpksoganilir' }}" target="_blank" class="w-9 h-9 rounded-full bg-gray-800 hover:bg-[#e4405f] flex items-center justify-center text-white transition" aria-label="Instagram">
                        <i class="fa-brands fa-instagram text-sm"></i>
                    </a>
                    <a href="{{ $siteSettings['social_youtube'] ?? 'https://youtube.com/@pkstvoganilir' }}" target="_blank" class="w-9 h-9 rounded-full bg-gray-800 hover:bg-[#ff0000] flex items-center justify-center text-white transition" aria-label="YouTube">
                        <i class="fa-brands fa-youtube text-sm"></i>
                    </a>
                    <a href="{{ $siteSettings['social_tiktok'] ?? 'https://tiktok.com/@pksoganilir' }}" target="_blank" class="w-9 h-9 rounded-full bg-gray-800 hover:bg-black flex items-center justify-center text-white transition" aria-label="TikTok">
                        <i class="fa-brands fa-tiktok text-sm"></i>
                    </a>
                </div>
            </div>

            {{-- Col 2: Alamat & Kontak --}}
            <div class="space-y-4">
                <h3 class="text-white font-bold text-base tracking-wide border-b-2 border-[#f37023] inline-block pb-1">
                    Kantor DPD
                </h3>
                <ul class="space-y-3 text-sm text-gray-400">
                    <li class="flex items-start">
                        <i class="fa-solid fa-location-dot mt-1 mr-3 text-[#f37023] flex-shrink-0"></i>
                        <span>{{ $siteSettings['contact_address'] ?? 'Jl. Komperta Taman Indralaya Blok C No. 05 Kel. Indralaya Mulya, Kec. Indralaya, Kab. Ogan Ilir, Sumatera Selatan' }}</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fa-solid fa-phone mr-3 text-[#f37023] flex-shrink-0"></i>
                        <span>{{ $siteSettings['contact_phone'] ?? '082280041658' }}</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fa-solid fa-envelope mr-3 text-[#f37023] flex-shrink-0"></i>
                        <span>{{ $siteSettings['contact_email'] ?? 'pksoganilir@gmail.com' }}</span>
                    </li>
                    <li class="flex items-center">
                        <i class="fa-solid fa-clock mr-3 text-[#f37023] flex-shrink-0"></i>
                        <span>Senin - Jumat: 08.00 - 16.00 WIB</span>
                    </li>
                </ul>
            </div>

            {{-- Col 3: Tautan Cepat --}}
            <div class="space-y-4">
                <h3 class="text-white font-bold text-base tracking-wide border-b-2 border-[#f37023] inline-block pb-1">
                    Tautan Cepat
                </h3>
                <ul class="grid grid-cols-2 gap-2 text-sm text-gray-400">
                    <li><a href="{{ route('home') }}" class="hover:text-[#fdb913] transition">Beranda</a></li>
                    <li><a href="{{ route('page.sambutan') }}" class="hover:text-[#fdb913] transition">Sambutan</a></li>
                    <li><a href="{{ route('page.tentang-kami') }}" class="hover:text-[#fdb913] transition">Tentang Kami</a></li>
                    <li><a href="{{ route('page.visi-misi') }}" class="hover:text-[#fdb913] transition">Visi & Misi</a></li>
                    <li><a href="{{ route('dewan.index') }}" class="hover:text-[#fdb913] transition">Fraksi PKS</a></li>
                    <li><a href="{{ route('bidang.index') }}" class="hover:text-[#fdb913] transition">Bidang DPD</a></li>
                    <li><a href="{{ route('artikel.index') }}" class="hover:text-[#fdb913] transition">Berita</a></li>
                    <li><a href="{{ route('agenda.index') }}" class="hover:text-[#fdb913] transition">Agenda</a></li>
                    <li><a href="{{ route('pengumuman.index') }}" class="hover:text-[#fdb913] transition">Pengumuman</a></li>
                    <li><a href="{{ route('download.index') }}" class="hover:text-[#fdb913] transition">Download</a></li>
                    <li><a href="{{ route('donasi') }}" class="hover:text-[#fdb913] transition">Donasi</a></li>
                    <li><a href="{{ route('hubungi') }}" class="hover:text-[#fdb913] transition">Hubungi</a></li>
                </ul>
            </div>

            {{-- Col 4: Banner Pilihan --}}
            <div class="space-y-4">
                <h3 class="text-white font-bold text-base tracking-wide border-b-2 border-[#f37023] inline-block pb-1">
                    Pusat Partisipasi
                </h3>
                <div class="space-y-3">
                    <a href="https://daftar.pks.id" target="_blank" class="block rounded-lg overflow-hidden border border-gray-700 hover:border-[#f37023] transition group">
                        <img src="/uploads/2025/09/banner_daftar_pks.webp" alt="Daftar Anggota PKS" class="w-full h-auto object-cover group-hover:scale-102 transition duration-300">
                    </a>
                    <a href="{{ route('donasi') }}" class="block rounded-lg overflow-hidden border border-gray-700 hover:border-[#f37023] transition group">
                        <img src="/uploads/2025/09/banner_donasi_pks.webp" alt="Donasi DPD PKS Ogan Ilir" class="w-full h-auto object-cover group-hover:scale-102 transition duration-300">
                    </a>
                </div>
            </div>
        </div>

        {{-- Copyright & Privacy --}}
        <div class="pt-8 flex flex-col sm:flex-row justify-between items-center text-xs text-gray-500 gap-3">
            <div>
                &copy; {{ date('Y') }} <span class="text-white font-semibold">DPD PKS Kabupaten Ogan Ilir</span>. Berkhidmat untuk Rakyat.
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('page.privacy-policy') }}" class="hover:text-gray-300 transition">Kebijakan Privasi</a>
                <span>&bull;</span>
                <a href="{{ route('download.logo') }}" class="hover:text-gray-300 transition">Panduan Logo</a>
                <span>&bull;</span>
                <a href="{{ route('hubungi') }}" class="hover:text-gray-300 transition">Kritik & Saran</a>
            </div>
        </div>
    </div>
</footer>
