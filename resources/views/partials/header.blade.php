{{-- TOP MINI BAR --}}
<div class="bg-[#1e293b] text-white text-xs py-2 border-b border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row justify-between items-center gap-2">
        <div class="flex items-center space-x-4">
            <a href="mailto:{{ $siteSettings['contact_email'] ?? 'pksoganilir@gmail.com' }}" class="flex items-center hover:text-[#fdb913] transition">
                <i class="fa-solid fa-envelope mr-1.5 text-[#f37023]"></i>
                <span>{{ $siteSettings['contact_email'] ?? 'pksoganilir@gmail.com' }}</span>
            </a>
            <span class="hidden sm:inline text-gray-500">|</span>
            <a href="https://wa.me/6282280041658" target="_blank" class="flex items-center hover:text-[#fdb913] transition">
                <i class="fa-brands fa-whatsapp mr-1.5 text-green-400"></i>
                <span>{{ $siteSettings['contact_phone'] ?? '082280041658' }}</span>
            </a>
        </div>
        <div class="flex items-center space-x-3 sm:space-x-4 text-gray-300">
            <a href="{{ route('page.tentang-kami') }}" class="hover:text-white transition">Tim Kami</a>
            <span class="text-gray-600">|</span>
            <a href="{{ route('bidang.index') }}" class="hover:text-white transition">Bidang</a>
            <span class="text-gray-600">|</span>
            <a href="{{ route('hubungi') }}" class="hover:text-white transition">Hubungi</a>
            <span class="text-gray-600">|</span>
            <a href="{{ route('donasi') }}" class="inline-flex items-center text-[#fdb913] font-semibold hover:underline">
                <i class="fa-solid fa-hand-holding-heart mr-1"></i> Donasi
            </a>
            <span class="text-gray-600">|</span>
            <a href="/login" class="inline-flex items-center bg-[#f37023] hover:bg-[#d85c14] text-white px-2.5 py-1 rounded text-[11px] font-medium transition">
                <i class="fa-solid fa-lock mr-1"></i> Login
            </a>
        </div>
    </div>
</div>

{{-- MAIN STICKY NAVBAR --}}
<header class="sticky top-0 z-50 bg-white shadow-md transition-all duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            
            {{-- LOGO --}}
            <a href="{{ route('home') }}" class="flex items-center space-x-3 group">
                <div class="h-12 flex-shrink-0 flex items-center justify-center">
                    <img src="/uploads/2025/09/Logo-Web-DPD3.webp" alt="Logo PKS Ogan Ilir" class="max-h-12 w-auto object-contain transform group-hover:scale-105 transition" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
                </div>
            </a>

            {{-- DESKTOP NAVIGATION --}}
            <nav class="hidden lg:flex items-center space-x-1 font-medium text-sm text-gray-700">
                
                {{-- Beranda --}}
                <a href="{{ route('home') }}" class="px-3 py-2 rounded-lg hover:text-[#f37023] hover:bg-orange-50 transition {{ request()->routeIs('home') ? 'text-[#f37023] font-semibold' : '' }}">
                    Beranda
                </a>

                {{-- Profil Dropdown --}}
                <div class="relative group" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
                    <button class="px-3 py-2 rounded-lg inline-flex items-center hover:text-[#f37023] hover:bg-orange-50 transition {{ request()->is('sambutan*', 'tentang*', 'visi*', 'sejarah*', 'anggota*', 'struktur*', 'bidang*') ? 'text-[#f37023] font-semibold' : '' }}">
                        <span>Profil</span>
                        <i class="fa-solid fa-chevron-down text-[10px] ml-1.5 transition-transform duration-200 group-hover:rotate-180"></i>
                    </button>
                    <div class="absolute left-0 mt-1 w-64 bg-white rounded-xl shadow-xl border border-gray-100 py-2 hidden group-hover:block transition-all transform duration-200 z-50">
                        <a href="{{ route('page.sambutan') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-orange-50 hover:text-[#f37023] transition flex items-center">
                            <i class="fa-solid fa-bullhorn w-5 text-gray-400 mr-2"></i> Sambutan Ketua DPD
                        </a>
                        <a href="{{ route('page.sejarah') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-orange-50 hover:text-[#f37023] transition flex items-center">
                            <i class="fa-solid fa-landmark w-5 text-gray-400 mr-2"></i> Sejarah PKS
                        </a>
                        <a href="{{ route('page.tentang-kami') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-orange-50 hover:text-[#f37023] transition flex items-center">
                            <i class="fa-solid fa-users w-5 text-gray-400 mr-2"></i> Tentang Kami
                        </a>
                        <a href="{{ route('page.visi-misi') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-orange-50 hover:text-[#f37023] transition flex items-center">
                            <i class="fa-solid fa-compass w-5 text-gray-400 mr-2"></i> Visi dan Misi
                        </a>
                        <div class="border-t border-gray-100 my-1"></div>
                        <a href="{{ route('dewan.index') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-orange-50 hover:text-[#f37023] transition flex items-center">
                            <i class="fa-solid fa-user-tie w-5 text-gray-400 mr-2"></i> Anggota DPRD Fraksi PKS
                        </a>
                        <a href="{{ route('page.struktur') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-orange-50 hover:text-[#f37023] transition flex items-center">
                            <i class="fa-solid fa-sitemap w-5 text-gray-400 mr-2"></i> Struktur Kepengurusan
                        </a>
                        <a href="{{ route('bidang.index') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-orange-50 hover:text-[#f37023] transition flex items-center">
                            <i class="fa-solid fa-layer-group w-5 text-gray-400 mr-2"></i> Bidang-Bidang DPD
                        </a>
                    </div>
                </div>

                {{-- Berita / Artikel --}}
                <a href="{{ route('artikel.index') }}" class="px-3 py-2 rounded-lg hover:text-[#f37023] hover:bg-orange-50 transition {{ request()->routeIs('artikel*') ? 'text-[#f37023] font-semibold' : '' }}">
                    Berita
                </a>

                {{-- Informasi Dropdown --}}
                <div class="relative group">
                    <button class="px-3 py-2 rounded-lg inline-flex items-center hover:text-[#f37023] hover:bg-orange-50 transition {{ request()->is('agenda*', 'pengumuman*', 'testimonial*', 'video*') ? 'text-[#f37023] font-semibold' : '' }}">
                        <span>Informasi</span>
                        <i class="fa-solid fa-chevron-down text-[10px] ml-1.5 transition-transform duration-200 group-hover:rotate-180"></i>
                    </button>
                    <div class="absolute left-0 mt-1 w-56 bg-white rounded-xl shadow-xl border border-gray-100 py-2 hidden group-hover:block transition-all transform duration-200 z-50">
                        <a href="{{ route('agenda.index') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-orange-50 hover:text-[#f37023] transition flex items-center">
                            <i class="fa-solid fa-calendar-days w-5 text-gray-400 mr-2"></i> Agenda Kegiatan
                        </a>
                        <a href="{{ route('pengumuman.index') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-orange-50 hover:text-[#f37023] transition flex items-center">
                            <i class="fa-solid fa-bell w-5 text-gray-400 mr-2"></i> Pengumuman
                        </a>
                        <a href="{{ route('testimonial.index') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-orange-50 hover:text-[#f37023] transition flex items-center">
                            <i class="fa-solid fa-comment-dots w-5 text-gray-400 mr-2"></i> Testimonial
                        </a>
                        <a href="{{ route('video.index') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-orange-50 hover:text-[#f37023] transition flex items-center">
                            <i class="fa-brands fa-youtube w-5 text-gray-400 mr-2"></i> Galeri Video
                        </a>
                    </div>
                </div>

                {{-- Download Dropdown --}}
                <div class="relative group">
                    <button class="px-3 py-2 rounded-lg inline-flex items-center hover:text-[#f37023] hover:bg-orange-50 transition {{ request()->is('download*', 'e-book*', 'hymne*', 'logo*') ? 'text-[#f37023] font-semibold' : '' }}">
                        <span>Download</span>
                        <i class="fa-solid fa-chevron-down text-[10px] ml-1.5 transition-transform duration-200 group-hover:rotate-180"></i>
                    </button>
                    <div class="absolute left-0 mt-1 w-56 bg-white rounded-xl shadow-xl border border-gray-100 py-2 hidden group-hover:block transition-all transform duration-200 z-50">
                        <a href="{{ route('download.index') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-orange-50 hover:text-[#f37023] transition flex items-center">
                            <i class="fa-solid fa-download w-5 text-gray-400 mr-2"></i> Download Umum
                        </a>
                        <a href="{{ route('download.ebook') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-orange-50 hover:text-[#f37023] transition flex items-center">
                            <i class="fa-solid fa-book-open w-5 text-gray-400 mr-2"></i> E-Book PKS
                        </a>
                        <a href="{{ route('download.hymne-mars') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-orange-50 hover:text-[#f37023] transition flex items-center">
                            <i class="fa-solid fa-music w-5 text-gray-400 mr-2"></i> Hymne & Mars PKS
                        </a>
                        <a href="{{ route('download.logo') }}" class="block px-4 py-2.5 text-sm text-gray-700 hover:bg-orange-50 hover:text-[#f37023] transition flex items-center">
                            <i class="fa-solid fa-image w-5 text-gray-400 mr-2"></i> Logo Resmi PKS
                        </a>
                    </div>
                </div>

                {{-- Galeri --}}
                <a href="{{ route('galeri.index') }}" class="px-3 py-2 rounded-lg hover:text-[#f37023] hover:bg-orange-50 transition {{ request()->routeIs('galeri*') ? 'text-[#f37023] font-semibold' : '' }}">
                    Galeri
                </a>
            </nav>

            {{-- SEARCH & CTA RIGHT --}}
            <div class="hidden lg:flex items-center space-x-3">
                <form action="{{ route('artikel.index') }}" method="GET" class="relative">
                    <input type="text" name="q" placeholder="Cari artikel..." value="{{ request('q') }}" class="w-44 focus:w-60 bg-gray-100 text-xs text-gray-800 rounded-full pl-8 pr-3 py-2 focus:outline-none focus:ring-2 focus:ring-[#f37023] transition-all">
                    <i class="fa-solid fa-magnifying-glass absolute left-3 top-2.5 text-gray-400 text-xs"></i>
                </form>
                <a href="https://daftar.pks.id" target="_blank" class="bg-gradient-to-r from-[#f37023] to-[#ff8a43] hover:from-[#d85c14] hover:to-[#f37023] text-white px-4 py-2 rounded-full text-xs font-semibold shadow-sm hover:shadow transition flex items-center space-x-1.5">
                    <i class="fa-solid fa-user-plus"></i>
                    <span>Daftar PKS</span>
                </a>
            </div>

            {{-- MOBILE HAMBURGER BUTTON --}}
            <div class="flex lg:hidden items-center space-x-2">
                <button id="mobile-menu-toggle" type="button" class="text-gray-700 hover:text-[#f37023] p-2 rounded-lg focus:outline-none" aria-label="Toggle Menu">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
            </div>
        </div>
    </div>

    {{-- MOBILE MENU DRAWER --}}
    <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-gray-200 px-4 pt-3 pb-6 space-y-2 shadow-xl max-h-[80vh] overflow-y-auto">
        <form action="{{ route('artikel.index') }}" method="GET" class="relative mb-3">
            <input type="text" name="q" placeholder="Cari artikel..." value="{{ request('q') }}" class="w-full bg-gray-100 text-xs text-gray-800 rounded-full pl-9 pr-3 py-2.5 focus:outline-none focus:ring-2 focus:ring-[#f37023]">
            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-3 text-gray-400 text-xs"></i>
        </form>

        <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md font-medium text-gray-800 hover:bg-orange-50 hover:text-[#f37023]">Beranda</a>
        
        {{-- Mobile Profil Submenu --}}
        <div class="border-t border-gray-100 pt-2">
            <div class="font-semibold text-xs text-gray-400 uppercase tracking-wider px-3 mb-1">Profil</div>
            <a href="{{ route('page.sambutan') }}" class="block px-4 py-1.5 text-sm text-gray-700 hover:text-[#f37023]">Sambutan Ketua DPD</a>
            <a href="{{ route('page.sejarah') }}" class="block px-4 py-1.5 text-sm text-gray-700 hover:text-[#f37023]">Sejarah PKS</a>
            <a href="{{ route('page.tentang-kami') }}" class="block px-4 py-1.5 text-sm text-gray-700 hover:text-[#f37023]">Tentang Kami</a>
            <a href="{{ route('page.visi-misi') }}" class="block px-4 py-1.5 text-sm text-gray-700 hover:text-[#f37023]">Visi dan Misi</a>
            <a href="{{ route('dewan.index') }}" class="block px-4 py-1.5 text-sm text-gray-700 hover:text-[#f37023]">Anggota Dewan Fraksi PKS</a>
            <a href="{{ route('page.struktur') }}" class="block px-4 py-1.5 text-sm text-gray-700 hover:text-[#f37023]">Struktur Kepengurusan</a>
            <a href="{{ route('bidang.index') }}" class="block px-4 py-1.5 text-sm text-gray-700 hover:text-[#f37023]">Bidang DPD</a>
        </div>

        <a href="{{ route('artikel.index') }}" class="block px-3 py-2 rounded-md font-medium text-gray-800 hover:bg-orange-50 hover:text-[#f37023]">Berita</a>

        {{-- Mobile Informasi Submenu --}}
        <div class="border-t border-gray-100 pt-2">
            <div class="font-semibold text-xs text-gray-400 uppercase tracking-wider px-3 mb-1">Informasi</div>
            <a href="{{ route('agenda.index') }}" class="block px-4 py-1.5 text-sm text-gray-700 hover:text-[#f37023]">Agenda</a>
            <a href="{{ route('pengumuman.index') }}" class="block px-4 py-1.5 text-sm text-gray-700 hover:text-[#f37023]">Pengumuman</a>
            <a href="{{ route('testimonial.index') }}" class="block px-4 py-1.5 text-sm text-gray-700 hover:text-[#f37023]">Testimonial</a>
            <a href="{{ route('video.index') }}" class="block px-4 py-1.5 text-sm text-gray-700 hover:text-[#f37023]">Galeri Video</a>
        </div>

        {{-- Mobile Download Submenu --}}
        <div class="border-t border-gray-100 pt-2">
            <div class="font-semibold text-xs text-gray-400 uppercase tracking-wider px-3 mb-1">Download</div>
            <a href="{{ route('download.index') }}" class="block px-4 py-1.5 text-sm text-gray-700 hover:text-[#f37023]">Download Umum</a>
            <a href="{{ route('download.ebook') }}" class="block px-4 py-1.5 text-sm text-gray-700 hover:text-[#f37023]">E-Book</a>
            <a href="{{ route('download.hymne-mars') }}" class="block px-4 py-1.5 text-sm text-gray-700 hover:text-[#f37023]">Hymne & Mars PKS</a>
            <a href="{{ route('download.logo') }}" class="block px-4 py-1.5 text-sm text-gray-700 hover:text-[#f37023]">Logo Resmi</a>
        </div>

        <a href="{{ route('galeri.index') }}" class="block px-3 py-2 rounded-md font-medium text-gray-800 hover:bg-orange-50 hover:text-[#f37023]">Galeri</a>
        <a href="{{ route('hubungi') }}" class="block px-3 py-2 rounded-md font-medium text-gray-800 hover:bg-orange-50 hover:text-[#f37023]">Hubungi Kami</a>
        <a href="{{ route('donasi') }}" class="block px-3 py-2 rounded-md font-semibold text-[#f37023] hover:bg-orange-50">Donasi PKS</a>

        <div class="pt-3">
            <a href="https://daftar.pks.id" target="_blank" class="block w-full text-center bg-[#f37023] text-white py-2.5 rounded-lg text-sm font-semibold shadow">
                Daftar Anggota PKS
            </a>
        </div>
    </div>
</header>
