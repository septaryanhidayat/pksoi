{{-- TOP MINI BAR (Hitam Pekat Sesuai Desain Web Lama: Cukup HP & Email) --}}
<div class="bg-[#000000] text-white text-xs py-2 border-b border-neutral-900" style="background-color: #000000;">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-center sm:justify-start items-center space-x-4 sm:space-x-6">
        <a href="tel:{{ $siteSettings['contact_phone'] ?? '082382336505' }}" class="flex items-center text-white hover:text-[#fdb913] transition py-1 text-xs font-semibold" aria-label="Hubungi Telepon {{ $siteSettings['contact_phone'] ?? '082382336505' }}">
            <i class="fa-solid fa-phone mr-2 text-[#ff5001]" aria-hidden="true" style="color: #ff5001;"></i>
            <span>{{ $siteSettings['contact_phone'] ?? '082382336505' }}</span>
        </a>
        <span class="text-neutral-600" aria-hidden="true">|</span>
        <a href="mailto:{{ $siteSettings['contact_email'] ?? 'pksoganilir@gmail.com' }}" class="flex items-center text-white hover:text-[#fdb913] transition py-1 text-xs font-semibold" aria-label="Kirim Email ke {{ $siteSettings['contact_email'] ?? 'pksoganilir@gmail.com' }}">
            <i class="fa-solid fa-envelope mr-2 text-[#ff5001]" aria-hidden="true" style="color: #ff5001;"></i>
            <span>{{ $siteSettings['contact_email'] ?? 'pksoganilir@gmail.com' }}</span>
        </a>
    </div>
</div>

{{-- MAIN STICKY NAVBAR (Oranye Solid #ff5001 Khas PKS, Logo Sangat Kontras & Jelas) --}}
<header class="sticky top-0 z-50 bg-[#ff5001] shadow-lg transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            
            {{-- LOGO DPD PKS OGAN ILIR --}}
            <a href="{{ route('home') }}" class="flex items-center space-x-3 group flex-shrink-0" aria-label="Beranda DPD PKS Ogan Ilir">
                <div class="h-12 flex items-center">
                    <img src="/uploads/2025/09/Logo-Web-DPD3.webp" alt="Logo DPD PKS Ogan Ilir" class="max-h-12 w-auto object-contain transform group-hover:scale-105 transition" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
                </div>
            </a>

            {{-- DESKTOP NAVIGATION (Teks Putih Tebal dengan Safe-Hover Bridge Anti-Hilang) --}}
            <nav class="hidden lg:flex items-center space-x-1 font-bold text-sm text-white" aria-label="Navigasi Utama">
                
                {{-- Beranda --}}
                <a href="{{ route('home') }}" class="px-3.5 py-2 rounded-lg hover:bg-black/15 transition {{ request()->routeIs('home') ? 'bg-black/20 text-white' : '' }}">
                    Beranda
                </a>

                {{-- Profil Dropdown (Hover Bridge pt-2 tanpa gap mati) --}}
                <div class="relative group py-2" id="nav-dropdown-profil">
                    <button type="button" aria-haspopup="true" aria-expanded="false" aria-label="Buka Menu Profil" class="px-3.5 py-2 rounded-lg inline-flex items-center hover:bg-black/15 transition {{ request()->is('sambutan*', 'tentang*', 'visi*', 'sejarah*', 'anggota*', 'struktur*', 'bidang*', 'dpc*') ? 'bg-black/20 text-white' : '' }}">
                        <span>Profil</span>
                        <i class="fa-solid fa-chevron-down text-[10px] ml-1.5 transition-transform duration-200 group-hover:rotate-180" aria-hidden="true"></i>
                    </button>
                    {{-- Safe Hover Bridge Container --}}
                    <div class="absolute left-0 top-full pt-1 w-64 hidden group-hover:block transition-all duration-150 z-50">
                        <div class="bg-white rounded-2xl shadow-2xl border border-gray-100 py-2.5 text-gray-800 animate-fadeIn">
                            <a href="{{ route('page.sambutan') }}" class="block px-4 py-2.5 text-xs font-semibold text-gray-700 hover:bg-orange-50 hover:text-[#ff5001] transition flex items-center">
                                <i class="fa-solid fa-bullhorn w-5 text-[#ff5001] mr-2 text-sm" aria-hidden="true"></i> Sambutan Ketua DPD
                            </a>
                            <a href="{{ route('page.sejarah') }}" class="block px-4 py-2.5 text-xs font-semibold text-gray-700 hover:bg-orange-50 hover:text-[#ff5001] transition flex items-center">
                                <i class="fa-solid fa-landmark w-5 text-[#ff5001] mr-2 text-sm" aria-hidden="true"></i> Sejarah PKS
                            </a>
                            <a href="{{ route('page.tentang-kami') }}" class="block px-4 py-2.5 text-xs font-semibold text-gray-700 hover:bg-orange-50 hover:text-[#ff5001] transition flex items-center">
                                <i class="fa-solid fa-users w-5 text-[#ff5001] mr-2 text-sm" aria-hidden="true"></i> Tentang Kami
                            </a>
                            <a href="{{ route('page.visi-misi') }}" class="block px-4 py-2.5 text-xs font-semibold text-gray-700 hover:bg-orange-50 hover:text-[#ff5001] transition flex items-center">
                                <i class="fa-solid fa-compass w-5 text-[#ff5001] mr-2 text-sm" aria-hidden="true"></i> Visi dan Misi
                            </a>
                            <div class="border-t border-gray-100 my-1"></div>
                            <a href="{{ route('dewan.index') }}" class="block px-4 py-2.5 text-xs font-semibold text-gray-700 hover:bg-orange-50 hover:text-[#ff5001] transition flex items-center">
                                <i class="fa-solid fa-user-tie w-5 text-[#ff5001] mr-2 text-sm" aria-hidden="true"></i> Anggota DPRD Fraksi PKS
                            </a>
                            <a href="{{ route('page.struktur') }}" class="block px-4 py-2.5 text-xs font-semibold text-gray-700 hover:bg-orange-50 hover:text-[#ff5001] transition flex items-center">
                                <i class="fa-solid fa-sitemap w-5 text-[#ff5001] mr-2 text-sm" aria-hidden="true"></i> Struktur Kepengurusan
                            </a>
                            <a href="{{ route('bidang.index') }}" class="block px-4 py-2.5 text-xs font-semibold text-gray-700 hover:bg-orange-50 hover:text-[#ff5001] transition flex items-center">
                                <i class="fa-solid fa-layer-group w-5 text-[#ff5001] mr-2 text-sm" aria-hidden="true"></i> Bidang-Bidang DPD
                            </a>
                            <a href="{{ route('dpc.index') }}" class="block px-4 py-2.5 text-xs font-semibold text-gray-700 hover:bg-orange-50 hover:text-[#ff5001] transition flex items-center">
                                <i class="fa-solid fa-building-flag w-5 text-[#ff5001] mr-2 text-sm" aria-hidden="true"></i> DPC PKS Se-Ogan Ilir
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Berita --}}
                <a href="{{ route('artikel.index') }}" class="px-3.5 py-2 rounded-lg hover:bg-black/15 transition {{ request()->routeIs('artikel*') ? 'bg-black/20 text-white' : '' }}">
                    Berita
                </a>

                {{-- Informasi Dropdown (Hover Bridge pt-2 tanpa gap mati) --}}
                <div class="relative group py-2" id="nav-dropdown-informasi">
                    <button type="button" aria-haspopup="true" aria-expanded="false" aria-label="Buka Menu Informasi" class="px-3.5 py-2 rounded-lg inline-flex items-center hover:bg-black/15 transition {{ request()->is('agenda*', 'pengumuman*', 'testimonial*', 'video*') ? 'bg-black/20 text-white' : '' }}">
                        <span>Informasi</span>
                        <i class="fa-solid fa-chevron-down text-[10px] ml-1.5 transition-transform duration-200 group-hover:rotate-180" aria-hidden="true"></i>
                    </button>
                    {{-- Safe Hover Bridge Container --}}
                    <div class="absolute left-0 top-full pt-1 w-56 hidden group-hover:block transition-all duration-150 z-50">
                        <div class="bg-white rounded-2xl shadow-2xl border border-gray-100 py-2.5 text-gray-800 animate-fadeIn">
                            <a href="{{ route('agenda.index') }}" class="block px-4 py-2.5 text-xs font-semibold text-gray-700 hover:bg-orange-50 hover:text-[#ff5001] transition flex items-center">
                                <i class="fa-solid fa-calendar-days w-5 text-[#ff5001] mr-2 text-sm" aria-hidden="true"></i> Agenda Kegiatan
                            </a>
                            <a href="{{ route('pengumuman.index') }}" class="block px-4 py-2.5 text-xs font-semibold text-gray-700 hover:bg-orange-50 hover:text-[#ff5001] transition flex items-center">
                                <i class="fa-solid fa-bell w-5 text-[#ff5001] mr-2 text-sm" aria-hidden="true"></i> Pengumuman
                            </a>
                            <a href="{{ route('testimonial.index') }}" class="block px-4 py-2.5 text-xs font-semibold text-gray-700 hover:bg-orange-50 hover:text-[#ff5001] transition flex items-center">
                                <i class="fa-solid fa-comment-dots w-5 text-[#ff5001] mr-2 text-sm" aria-hidden="true"></i> Testimonial
                            </a>
                            <a href="{{ route('video.index') }}" class="block px-4 py-2.5 text-xs font-semibold text-gray-700 hover:bg-orange-50 hover:text-[#ff5001] transition flex items-center">
                                <i class="fa-brands fa-youtube w-5 text-[#ff5001] mr-2 text-sm" aria-hidden="true"></i> Galeri Video
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Download Dropdown (Hover Bridge pt-2 tanpa gap mati) --}}
                <div class="relative group py-2" id="nav-dropdown-download">
                    <button type="button" aria-haspopup="true" aria-expanded="false" aria-label="Buka Menu Download" class="px-3.5 py-2 rounded-lg inline-flex items-center hover:bg-black/15 transition {{ request()->is('download*', 'e-book*', 'hymne*', 'logo*') ? 'bg-black/20 text-white' : '' }}">
                        <span>Download</span>
                        <i class="fa-solid fa-chevron-down text-[10px] ml-1.5 transition-transform duration-200 group-hover:rotate-180" aria-hidden="true"></i>
                    </button>
                    {{-- Safe Hover Bridge Container --}}
                    <div class="absolute left-0 top-full pt-1 w-56 hidden group-hover:block transition-all duration-150 z-50">
                        <div class="bg-white rounded-2xl shadow-2xl border border-gray-100 py-2.5 text-gray-800 animate-fadeIn">
                            <a href="{{ route('download.index') }}" class="block px-4 py-2.5 text-xs font-semibold text-gray-700 hover:bg-orange-50 hover:text-[#ff5001] transition flex items-center">
                                <i class="fa-solid fa-download w-5 text-[#ff5001] mr-2 text-sm" aria-hidden="true"></i> Download Umum
                            </a>
                            <a href="{{ route('download.ebook') }}" class="block px-4 py-2.5 text-xs font-semibold text-gray-700 hover:bg-orange-50 hover:text-[#ff5001] transition flex items-center">
                                <i class="fa-solid fa-book-open w-5 text-[#ff5001] mr-2 text-sm" aria-hidden="true"></i> E-Book PKS
                            </a>
                            <a href="{{ route('download.hymne-mars') }}" class="block px-4 py-2.5 text-xs font-semibold text-gray-700 hover:bg-orange-50 hover:text-[#ff5001] transition flex items-center">
                                <i class="fa-solid fa-music w-5 text-[#ff5001] mr-2 text-sm" aria-hidden="true"></i> Hymne & Mars PKS
                            </a>
                            <a href="{{ route('download.logo') }}" class="block px-4 py-2.5 text-xs font-semibold text-gray-700 hover:bg-orange-50 hover:text-[#ff5001] transition flex items-center">
                                <i class="fa-solid fa-image w-5 text-[#ff5001] mr-2 text-sm" aria-hidden="true"></i> Logo Resmi
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Galeri --}}
                <a href="{{ route('galeri.index') }}" class="px-3.5 py-2 rounded-lg hover:bg-black/15 transition {{ request()->routeIs('galeri*') ? 'bg-black/20 text-white' : '' }}">
                    Galeri
                </a>
            </nav>

            {{-- TOMBOL KONTAK HITAM KAPSUL (Persis Sesuai Desain Asli Web Lama) --}}
            <div class="hidden lg:flex items-center space-x-3">
                <a href="{{ route('hubungi') }}" class="bg-black hover:bg-gray-900 text-white px-6 py-2 rounded-full text-xs font-extrabold shadow-md hover:shadow-lg transition flex items-center space-x-2 transform hover:scale-105">
                    <span>Kontak</span>
                </a>
                <a href="https://daftar.pks.id" target="_blank" class="bg-white hover:bg-orange-50 text-[#ff5001] px-5 py-2 rounded-full text-xs font-extrabold shadow-md transition flex items-center space-x-1.5" aria-label="Daftar Anggota PKS" style="color: #ff5001 !important;">
                    <i class="fa-solid fa-user-plus text-xs" aria-hidden="true"></i>
                    <span>Daftar PKS</span>
                </a>
                <a href="/login" class="text-white hover:text-black/80 px-2.5 py-2 text-xs font-bold transition flex items-center space-x-1 rounded-lg hover:bg-black/10" aria-label="Login Admin">
                    <i class="fa-solid fa-lock text-[11px]" aria-hidden="true"></i>
                    <span>Login</span>
                </a>
            </div>

            {{-- MOBILE TOP RIGHT: Tombol Kontak Hitam & Tombol Hamburger Putih --}}
            <div class="flex lg:hidden items-center space-x-2">
                <a href="{{ route('hubungi') }}" class="bg-black hover:bg-gray-900 text-white px-4 py-2 rounded-full text-xs font-extrabold shadow transition min-h-[44px] flex items-center">
                    Kontak
                </a>
                <button id="mobile-menu-toggle" type="button" class="text-white hover:text-orange-100 p-2 rounded-lg focus:outline-none min-w-[44px] min-h-[44px] flex items-center justify-center" aria-label="Buka Menu Navigasi">
                    <i class="fa-solid fa-bars text-2xl" aria-hidden="true"></i>
                </button>
            </div>
        </div>
    </div>

    {{-- MOBILE MENU DRAWER --}}
    <div id="mobile-menu" class="hidden lg:hidden bg-white text-gray-800 border-t border-[#ff5001] px-5 pt-4 pb-6 space-y-3 shadow-2xl max-h-[85vh] overflow-y-auto">
        <form action="{{ route('artikel.index') }}" method="GET" class="relative mb-3">
            <input type="text" name="q" placeholder="Cari artikel berita..." aria-label="Cari artikel berita" value="{{ request('q') }}" class="w-full bg-gray-100 text-xs text-gray-800 rounded-full pl-9 pr-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#ff5001]">
            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3 text-gray-400 text-xs" aria-hidden="true"></i>
        </form>

        <a href="{{ route('home') }}" class="block px-3 py-2 rounded-lg font-bold text-gray-900 hover:bg-orange-50 hover:text-[#ff5001] transition {{ request()->routeIs('home') ? 'bg-orange-50 text-[#ff5001]' : '' }}">Beranda</a>
        
        {{-- Mobile Profil Submenu --}}
        <div class="border-t border-gray-100 pt-2">
            <div class="font-extrabold text-xs text-[#ff5001] uppercase tracking-wider px-3 mb-1 flex items-center">
                <i class="fa-solid fa-id-card mr-2"></i> Profil
            </div>
            <a href="{{ route('page.sambutan') }}" class="block px-4 py-1.5 text-xs text-gray-700 hover:text-[#ff5001]">Sambutan Ketua DPD</a>
            <a href="{{ route('page.sejarah') }}" class="block px-4 py-1.5 text-xs text-gray-700 hover:text-[#ff5001]">Sejarah PKS</a>
            <a href="{{ route('page.tentang-kami') }}" class="block px-4 py-1.5 text-xs text-gray-700 hover:text-[#ff5001]">Tentang Kami</a>
            <a href="{{ route('page.visi-misi') }}" class="block px-4 py-1.5 text-xs text-gray-700 hover:text-[#ff5001]">Visi dan Misi</a>
            <a href="{{ route('dewan.index') }}" class="block px-4 py-1.5 text-xs text-gray-700 hover:text-[#ff5001]">Anggota DPRD Fraksi PKS</a>
            <a href="{{ route('page.struktur') }}" class="block px-4 py-1.5 text-xs text-gray-700 hover:text-[#ff5001]">Struktur Kepengurusan</a>
            <a href="{{ route('bidang.index') }}" class="block px-4 py-1.5 text-xs text-gray-700 hover:text-[#ff5001]">Bidang DPD</a>
            <a href="{{ route('dpc.index') }}" class="block px-4 py-1.5 text-xs text-gray-700 hover:text-[#ff5001]">DPC PKS Se-Ogan Ilir</a>
        </div>

        <a href="{{ route('artikel.index') }}" class="block px-3 py-2 rounded-lg font-bold text-gray-900 hover:bg-orange-50 hover:text-[#ff5001] transition {{ request()->routeIs('artikel*') ? 'bg-orange-50 text-[#ff5001]' : '' }}">Berita</a>

        {{-- Mobile Informasi Submenu --}}
        <div class="border-t border-gray-100 pt-2">
            <div class="font-extrabold text-xs text-[#ff5001] uppercase tracking-wider px-3 mb-1 flex items-center">
                <i class="fa-solid fa-info-circle mr-2"></i> Informasi
            </div>
            <a href="{{ route('agenda.index') }}" class="block px-4 py-1.5 text-xs text-gray-700 hover:text-[#ff5001]">Agenda Kegiatan</a>
            <a href="{{ route('pengumuman.index') }}" class="block px-4 py-1.5 text-xs text-gray-700 hover:text-[#ff5001]">Pengumuman</a>
            <a href="{{ route('testimonial.index') }}" class="block px-4 py-1.5 text-xs text-gray-700 hover:text-[#ff5001]">Testimonial</a>
            <a href="{{ route('video.index') }}" class="block px-4 py-1.5 text-xs text-gray-700 hover:text-[#ff5001]">Galeri Video</a>
        </div>

        {{-- Mobile Download Submenu --}}
        <div class="border-t border-gray-100 pt-2">
            <div class="font-extrabold text-xs text-[#ff5001] uppercase tracking-wider px-3 mb-1 flex items-center">
                <i class="fa-solid fa-download mr-2"></i> Download
            </div>
            <a href="{{ route('download.index') }}" class="block px-4 py-1.5 text-xs text-gray-700 hover:text-[#ff5001]">Download Dokumen</a>
            <a href="{{ route('download.ebook') }}" class="block px-4 py-1.5 text-xs text-gray-700 hover:text-[#ff5001]">E-Book PKS</a>
            <a href="{{ route('download.hymne-mars') }}" class="block px-4 py-1.5 text-xs text-gray-700 hover:text-[#ff5001]">Hymne & Mars PKS</a>
            <a href="{{ route('download.logo') }}" class="block px-4 py-1.5 text-xs text-gray-700 hover:text-[#ff5001]">Logo Resmi PKS</a>
        </div>

        <a href="{{ route('galeri.index') }}" class="block px-3 py-2 rounded-lg font-bold text-gray-900 hover:bg-orange-50 hover:text-[#ff5001] transition {{ request()->routeIs('galeri*') ? 'bg-orange-50 text-[#ff5001]' : '' }}">Galeri</a>
        <a href="{{ route('hubungi') }}" class="block px-3 py-2 rounded-lg font-bold text-gray-900 hover:bg-orange-50 hover:text-[#ff5001] transition">Hubungi Kami</a>
        <a href="{{ route('donasi') }}" class="block px-3 py-2 rounded-lg font-extrabold text-[#ff5001] hover:bg-orange-50">Donasi PKS</a>

        <div class="pt-3 space-y-2">
            <a href="https://daftar.pks.id" target="_blank" class="block w-full text-center bg-[#ff5001] hover:bg-[#d85200] text-white py-3 rounded-xl text-xs font-extrabold shadow-md transition" style="background-color: #ff5001; color: #ffffff;">
                <i class="fa-solid fa-user-plus mr-1.5" aria-hidden="true"></i> Daftar Anggota PKS
            </a>
            <a href="/login" class="block w-full text-center bg-gray-900 hover:bg-black text-white py-2.5 rounded-xl text-xs font-bold transition shadow-sm" style="background-color: #111827; color: #ffffff;">
                <i class="fa-solid fa-lock mr-1.5 text-orange-400" aria-hidden="true"></i> Login
            </a>
        </div>
    </div>
</header>
