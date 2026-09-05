@extends('layouts.frontend')

@section('title', 'Sejarah PKS Ogan Ilir - DPD PKS Ogan Ilir')
@section('meta_description', 'Sejarah perjalanan dan jejak pengabdian Partai Keadilan Sejahtera di Kabupaten Ogan Ilir sejak pemekaran tahun 2003 hingga Musda VI 2025.')

@section('content')
{{-- HERO HEADER --}}
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <span>Profil</span>
            <span>/</span>
            <span class="text-[#fdb913]">Sejarah</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Sejarah Perjalanan PKS Ogan Ilir</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">
            Jejak langkah pengabdian, kaderisasi, dan perjuangan politik dakwah untuk kemaslahatan rakyat Ogan Ilir.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
        
        {{-- KOLOM UTAMA (2/3) --}}
        <div class="lg:col-span-8 space-y-8">
            <article class="bg-white rounded-3xl p-8 sm:p-12 shadow-xl border border-gray-100 reveal-fade-up space-y-6">
                
                {{-- GAMBAR ILUSTRASI SEJARAH --}}
                <div class="rounded-2xl overflow-hidden shadow-lg border border-gray-100 bg-gray-50 max-h-96">
                    <img src="/uploads/2025/09/58.webp" alt="Sejarah Perjalanan DPD PKS Ogan Ilir" class="w-full h-full object-cover" onerror="this.src='/uploads/2025/09/Struktur-Kepengurusan-scaled.webp'">
                </div>

                <div class="border-b border-gray-100 pb-4">
                    <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider block">Jejak Langkah</span>
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight mt-1">
                        Perjalanan Dakwah & Kiprah Politik di Bumi Caram Seguguk
                    </h2>
                    <div class="w-16 h-1 bg-[#f37023] rounded-full mt-3"></div>
                </div>

                {{-- 6 PARAGRAF SEJARAH LENGKAP --}}
                <div class="prose-content text-gray-700 text-sm sm:text-base leading-relaxed space-y-5">
                    @if(!empty($page->content) && strlen(trim(strip_tags($page->content))) > 50)
                        {!! $page->content !!}
                    @else
                        <p>
                            Partai Keadilan Sejahtera (PKS) hadir di Kabupaten Ogan Ilir sejak awal berdirinya daerah ini sebagai kabupaten pemekaran dari Ogan Komering Ilir pada tahun 2003. Kehadiran PKS di Ogan Ilir dimulai dengan semangat dakwah dan pelayanan masyarakat, sekaligus sebagai bagian dari perjuangan politik kebangsaan yang diusung PKS di tingkat nasional.
                        </p>

                        <p>
                            Pada masa awal, struktur partai masih sederhana, dengan jumlah kader dan simpatisan yang terbatas. Namun, semangat kaderisasi, kerja keras, dan kedekatan PKS dengan masyarakat membuat partai ini cepat berkembang. Melalui kegiatan sosial, pendidikan politik, dan pelayanan langsung ke masyarakat, PKS semakin dikenal luas oleh warga Ogan Ilir.
                        </p>

                        <p>
                            Seiring berjalannya waktu, PKS Ogan Ilir berhasil menempatkan wakilnya di DPRD Kabupaten Ogan Ilir. Capaian ini menjadi bukti nyata kepercayaan masyarakat kepada PKS. Dari periode ke periode, PKS terus memperkuat basis dukungan, baik di perkotaan maupun di pedesaan, dengan menghadirkan kader yang amanah, dekat dengan rakyat, dan siap memperjuangkan aspirasi masyarakat.
                        </p>

                        <p>
                            Momentum penting dalam perjalanan PKS Ogan Ilir adalah terselenggaranya Musyawarah Daerah (Musda) secara rutin, yang menjadi ajang konsolidasi dan regenerasi kepemimpinan. Setiap Musda menghasilkan kepengurusan baru yang membawa semangat segar untuk melanjutkan perjuangan. Musda VI pada tahun 2025 menjadi salah satu tonggak penting dengan lahirnya kepemimpinan baru yang menargetkan penguatan struktur partai sekaligus pencapaian politik yang lebih besar di Pemilu 2030.
                        </p>

                        <p>
                            Kini, DPD PKS Ogan Ilir telah menjadi salah satu kekuatan politik yang diperhitungkan di tingkat daerah. Dengan jaringan kader yang solid, struktur yang kuat hingga ke tingkat ranting, serta program pelayanan masyarakat yang konsisten, PKS Ogan Ilir terus berkomitmen menghadirkan politik yang bersih, peduli, dan melayani.
                        </p>

                        <p class="font-medium text-gray-900 bg-orange-50/70 p-5 rounded-2xl border-l-4 border-[#f37023]">
                            Perjalanan panjang ini membuktikan bahwa PKS Ogan Ilir bukan hanya sekadar partai politik, melainkan juga rumah perjuangan bersama bagi masyarakat yang mendambakan keadilan, kesejahteraan, dan kepemimpinan yang amanah. Dengan semangat <em>Ogan Ilir Caram Seguguk</em>, PKS siap melangkah ke depan, memperkuat kontribusinya, dan terus berkhidmat untuk rakyat.
                        </p>
                    @endif
                </div>
            </article>
        </div>

        {{-- SIDEBAR KANAN (1/3) --}}
        <div class="lg:col-span-4 space-y-8">
            
            {{-- WIDGET ARTIKEL & BERITA TERBARU --}}
            <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-xl border border-gray-100 reveal-fade-up">
                <div class="flex items-center justify-between pb-4 border-b border-gray-100 mb-6">
                    <h3 class="font-extrabold text-gray-900 text-base">Artikel & Berita</h3>
                    <a href="{{ route('artikel.index') }}" class="text-xs font-bold text-[#f37023] hover:underline">
                        Lihat Semua &rarr;
                    </a>
                </div>

                <div class="space-y-4">
                    @forelse($latestPosts ?? [] as $lp)
                        <a href="{{ route('artikel.show', $lp->slug) }}" class="flex items-center space-x-3 group">
                            <div class="w-16 h-16 rounded-xl overflow-hidden bg-gray-100 flex-shrink-0">
                                <img src="{{ $lp->featured_image }}" alt="{{ $lp->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-300" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-gray-800 group-hover:text-[#f37023] transition line-clamp-2 leading-snug">
                                    {{ $lp->title }}
                                </h4>
                                <span class="text-[11px] text-gray-400 block mt-1">
                                    {{ $lp->post_date ? \Carbon\Carbon::parse($lp->post_date)->translatedFormat('d M Y') : '' }}
                                </span>
                            </div>
                        </a>
                    @empty
                        <p class="text-xs text-gray-400 text-center py-4">Belum ada berita terbaru.</p>
                    @endforelse
                </div>
            </div>

            {{-- WIDGET AGENDA TERJADWAL --}}
            <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-xl border border-gray-100 reveal-fade-up delay-1">
                <div class="flex items-center justify-between pb-4 border-b border-gray-100 mb-6">
                    <h3 class="font-extrabold text-gray-900 text-base">Agenda Terjadwal</h3>
                    <a href="{{ route('agenda.index') }}" class="text-xs font-bold text-[#f37023] hover:underline">
                        Lihat Semua &rarr;
                    </a>
                </div>

                <div class="space-y-4">
                    @forelse($latestAgendas ?? [] as $la)
                        <a href="{{ route('agenda.show', $la->slug) }}" class="flex items-start space-x-3 group p-3 rounded-xl hover:bg-orange-50/50 transition">
                            <div class="w-12 h-12 rounded-xl bg-orange-100 text-[#f37023] flex flex-col items-center justify-center flex-shrink-0 font-bold text-xs">
                                <span class="text-sm font-extrabold leading-none">{{ $la->post_date ? \Carbon\Carbon::parse($la->post_date)->format('d') : '01' }}</span>
                                <span class="text-[9px] uppercase">{{ $la->post_date ? \Carbon\Carbon::parse($la->post_date)->format('M') : 'PKS' }}</span>
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-gray-800 group-hover:text-[#f37023] transition line-clamp-2 leading-snug">
                                    {{ $la->title }}
                                </h4>
                                <span class="text-[11px] text-gray-400 block mt-1">
                                    <i class="fa-solid fa-location-dot mr-1 text-orange-400"></i> Ogan Ilir
                                </span>
                            </div>
                        </a>
                    @empty
                        <p class="text-xs text-gray-400 text-center py-4">Belum ada agenda terdekat.</p>
                    @endforelse
                </div>
            </div>

            {{-- CTA BANNER --}}
            <div class="bg-gradient-to-br from-gray-900 via-gray-800 to-black text-white p-6 sm:p-8 rounded-3xl shadow-xl space-y-4 text-center reveal-fade-up delay-2">
                <div class="w-14 h-14 rounded-2xl bg-orange-500/20 text-[#f37023] flex items-center justify-center text-2xl mx-auto border border-orange-500/30">
                    <i class="fa-solid fa-handshake-angle"></i>
                </div>
                <h3 class="text-xl font-extrabold">Mari Bergabung Bersama Kami!</h3>
                <p class="text-xs text-gray-300 leading-relaxed">
                    Menjadi bagian dari sejarah perbaikan umat dan pembangunan Kabupaten Ogan Ilir.
                </p>
                <div class="pt-2">
                    <a href="https://daftar.pks.id" target="_blank" class="block w-full bg-[#f37023] hover:bg-[#d85c14] text-white py-3 rounded-xl font-bold text-xs shadow-lg transition">
                        Daftar Anggota PKS
                    </a>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection
