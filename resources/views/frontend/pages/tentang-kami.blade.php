@extends('layouts.frontend')

@section('title', 'Tentang Kami - DPD PKS Ogan Ilir')
@section('meta_description', 'Mengenal profil, sejarah, visi misi, bidang kerja, serta kiprah DPD Partai Keadilan Sejahtera (PKS) Kabupaten Ogan Ilir.')

@section('content')
{{-- HERO HEADER & BREADCRUMB --}}
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <span>Profil</span>
            <span>/</span>
            <span class="text-[#fdb913]">Tentang Kami</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Tentang DPD PKS Ogan Ilir</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">
            Mengenal lebih dekat kiprah, nilai perjuangan, dan pengabdian kami untuk masyarakat Kabupaten Ogan Ilir.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 space-y-16">

    {{-- SEKSI 1: SAMBUTAN KETUA DPD --}}
    <section class="bg-white rounded-3xl p-8 sm:p-12 shadow-xl border border-gray-100 reveal-fade-up">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            <div class="lg:col-span-4 flex justify-center">
                <div class="w-56 h-72 sm:w-64 sm:h-80 rounded-2xl overflow-hidden shadow-xl border-4 border-white ring-4 ring-orange-100 bg-orange-50 relative group">
                    <img src="/uploads/2025/09/DPD-Profile-2.webp" alt="H. Husnul Anam, S.HI - Ketua DPD PKS Ogan Ilir" class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-500" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
                    <div class="absolute bottom-0 inset-x-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent p-4 text-white text-center">
                        <span class="block text-xs font-bold uppercase tracking-wider text-orange-300">Ketua DPD PKS Ogan Ilir</span>
                        <span class="block text-sm font-extrabold">H. Husnul Anam, S.HI</span>
                    </div>
                </div>
            </div>
            <div class="lg:col-span-8 space-y-4 text-left">
                <div class="inline-flex items-center space-x-2 bg-orange-100 text-[#f37023] px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider">
                    <i class="fa-solid fa-bullhorn"></i>
                    <span>Sambutan Pimpinan</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight">
                    Sambutan Ketua DPD PKS Ogan Ilir
                </h2>
                <div class="w-16 h-1 bg-[#f37023] rounded-full"></div>
                <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                    Assalamu'alaikum Warahmatullahi Wabarakatuh. Alhamdulillah, kami bersyukur kepada Allah SWT atas segala rahmat dan karunia-Nya, sehingga platform ini dapat hadir sebagai jembatan komunikasi antara Partai Keadilan Sejahtera dengan seluruh masyarakat Kabupaten Ogan Ilir yang kami cintai.
                </p>
                <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                    Partai Keadilan Sejahtera hadir untuk mewujudkan cita-cita bangsa yang adil, makmur, dan berkeadilan, sesuai dengan nilai-nilai Islam yang <em>rahmatan lil 'alamin</em>. Kami berkomitmen untuk terus memperjuangkan aspirasi rakyat dan memajukan pembangunan daerah secara konsisten.
                </p>
                <div class="pt-4">
                    <a href="{{ route('page.sambutan') }}" class="inline-flex items-center bg-[#f37023] hover:bg-[#d85c14] text-white px-6 py-3 rounded-xl text-xs font-bold shadow-md hover:shadow-lg transition">
                        <span>Baca Selengkapnya</span>
                        <i class="fa-solid fa-arrow-right ml-2 text-[11px]"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- SEKSI 2: SEJARAH PKS OGAN ILIR --}}
    <section class="bg-white rounded-3xl p-8 sm:p-12 shadow-xl border border-gray-100 reveal-fade-up">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
            <div class="lg:col-span-7 space-y-4 order-2 lg:order-1">
                <div class="inline-flex items-center space-x-2 bg-amber-100 text-amber-800 px-3.5 py-1.5 rounded-full text-xs font-bold uppercase tracking-wider">
                    <i class="fa-solid fa-landmark"></i>
                    <span>Jejak Pengabdian</span>
                </div>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight">
                    Sejarah Singkat PKS di Ogan Ilir
                </h2>
                <span class="block text-xs sm:text-sm font-semibold text-[#f37023]">Kabar dan Aktivitas terbaru</span>
                <div class="w-16 h-1 bg-amber-500 rounded-full"></div>
                <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                    Partai Keadilan Sejahtera (PKS) hadir di Kabupaten Ogan Ilir sejak awal berdirinya daerah ini sebagai kabupaten pemekaran dari Ogan Komering Ilir pada tahun 2003. Kehadiran PKS di Ogan Ilir dimulai dengan semangat dakwah dan pelayanan masyarakat, sekaligus sebagai bagian dari perjuangan politik kebangsaan yang diusung PKS di tingkat nasional.
                </p>
                <p class="text-gray-600 text-sm sm:text-base leading-relaxed">
                    Melalui kegiatan sosial, pendidikan politik, dan advokasi rakyat, PKS berhasil menempatkan wakilnya di DPRD Ogan Ilir secara berkelanjutan, hingga Musda VI tahun 2025 menjadi tonggak regenerasi kepemimpinan baru menyongsong 2030.
                </p>
                <div class="pt-4">
                    <a href="{{ route('page.sejarah') }}" class="inline-flex items-center bg-gray-900 hover:bg-black text-white px-6 py-3 rounded-xl text-xs font-bold shadow-md hover:shadow-lg transition">
                        <span>Baca Selengkapnya</span>
                        <i class="fa-solid fa-arrow-right ml-2 text-[11px]"></i>
                    </a>
                </div>
            </div>
            <div class="lg:col-span-5 order-1 lg:order-2 flex justify-center">
                <div class="rounded-2xl overflow-hidden shadow-lg border border-gray-100 max-h-80 bg-gray-50">
                    <img src="/uploads/2025/09/Struktur-Kepengurusan-scaled.webp" alt="Struktur & Sejarah DPD PKS Ogan Ilir" class="w-full h-full object-cover object-top" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
                </div>
            </div>
        </div>
    </section>

    {{-- SEKSI 3: 3 QUICK CARDS (BIDANG, AGENDA, DEWAN) --}}
    <section class="grid grid-cols-1 md:grid-cols-3 gap-8">
        {{-- Card 1: Bidang --}}
        <div class="bg-white rounded-3xl p-8 shadow-md border border-gray-100 hover:shadow-xl transition transform hover:-translate-y-1 flex flex-col justify-between space-y-6 reveal-fade-up">
            <div class="space-y-4">
                <div class="w-16 h-16 rounded-2xl bg-orange-100 flex items-center justify-center p-3 shadow-inner">
                    <img src="/uploads/2023/08/ICON-Bidang.webp" alt="Icon Bidang" class="w-full h-full object-contain" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
                </div>
                <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider block">Struktur Kerja</span>
                <h3 class="text-xl font-extrabold text-gray-900">Bidang dan Program</h3>
                <p class="text-xs text-gray-500 leading-relaxed">
                    Unit-unit kerja strategis partai mulai dari kaderisasi, keummatan, pemuda, perempuan & ketahanan keluarga hingga pemenangan pemilu.
                </p>
            </div>
            <div class="pt-4 border-t border-gray-100">
                <a href="{{ route('bidang.index') }}" class="inline-flex items-center text-xs font-bold text-[#f37023] hover:text-[#d85c14]">
                    <span>Lihat Semua Bidang</span>
                    <i class="fa-solid fa-arrow-right ml-2 text-[10px]"></i>
                </a>
            </div>
        </div>

        {{-- Card 2: Agenda --}}
        <div class="bg-white rounded-3xl p-8 shadow-md border border-gray-100 hover:shadow-xl transition transform hover:-translate-y-1 flex flex-col justify-between space-y-6 reveal-fade-up delay-1">
            <div class="space-y-4">
                <div class="w-16 h-16 rounded-2xl bg-amber-100 flex items-center justify-center p-3 shadow-inner">
                    <img src="/uploads/2023/08/ICON-Agenda.webp" alt="Icon Agenda" class="w-full h-full object-contain" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
                </div>
                <span class="text-xs font-bold text-amber-600 uppercase tracking-wider block">Jadwal Kegiatan</span>
                <h3 class="text-xl font-extrabold text-gray-900">Agenda Terjadwal</h3>
                <p class="text-xs text-gray-500 leading-relaxed">
                    Informasi jadwal musyawarah daerah, konsolidasi kader, bakti sosial, seminar publik, dan kegiatan rutin kemasyarakatan.
                </p>
            </div>
            <div class="pt-4 border-t border-gray-100">
                <a href="{{ route('agenda.index') }}" class="inline-flex items-center text-xs font-bold text-amber-600 hover:text-amber-700">
                    <span>Lihat Semua Agenda</span>
                    <i class="fa-solid fa-arrow-right ml-2 text-[10px]"></i>
                </a>
            </div>
        </div>

        {{-- Card 3: Anggota Dewan --}}
        <div class="bg-white rounded-3xl p-8 shadow-md border border-gray-100 hover:shadow-xl transition transform hover:-translate-y-1 flex flex-col justify-between space-y-6 reveal-fade-up delay-2">
            <div class="space-y-4">
                <div class="w-16 h-16 rounded-2xl bg-emerald-100 flex items-center justify-center p-3 shadow-inner">
                    <img src="/uploads/2023/08/ICON-Dewan.webp" alt="Icon Dewan" class="w-full h-full object-contain" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
                </div>
                <span class="text-xs font-bold text-emerald-600 uppercase tracking-wider block">Fraksi PKS</span>
                <h3 class="text-xl font-extrabold text-gray-900">Anggota Dewan</h3>
                <p class="text-xs text-gray-500 leading-relaxed">
                    Wakil rakyat Fraksi PKS di DPRD Kabupaten Ogan Ilir yang setia mengawal dan memperjuangkan hak serta aspirasi masyarakat.
                </p>
            </div>
            <div class="pt-4 border-t border-gray-100">
                <a href="{{ route('dewan.index') }}" class="inline-flex items-center text-xs font-bold text-emerald-600 hover:text-emerald-700">
                    <span>Lihat Semua Anggota Dewan</span>
                    <i class="fa-solid fa-arrow-right ml-2 text-[10px]"></i>
                </a>
            </div>
        </div>
    </section>

    {{-- SEKSI 4: VISI DAN MISI 2 KOLOM --}}
    <section class="bg-white rounded-3xl p-8 sm:p-12 shadow-xl border border-gray-100 reveal-fade-up space-y-8">
        <div class="text-center max-w-2xl mx-auto">
            <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider block">Pedoman Perjuangan</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight mt-1">
                Visi dan Misi Partai Keadilan Sejahtera
            </h2>
            <div class="w-16 h-1 bg-[#f37023] mx-auto rounded-full mt-3"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            {{-- Card Visi --}}
            <div class="bg-gradient-to-br from-orange-50 to-amber-50 p-8 rounded-3xl border border-orange-100 flex flex-col justify-between space-y-6">
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-xl bg-[#f37023] text-white flex items-center justify-center font-bold text-base shadow">
                            <i class="fa-solid fa-eye"></i>
                        </div>
                        <h3 class="text-xl font-extrabold text-gray-900">Visi Resmi</h3>
                    </div>
                    <blockquote class="text-sm sm:text-base text-gray-800 italic leading-relaxed border-l-4 border-[#f37023] pl-4 font-serif">
                        "Menjadi Partai Islam rahmatan lil ‘alamin yang kokoh dan terdepan dalam melayani rakyat dan Negara Kesatuan Republik Indonesia."
                    </blockquote>
                </div>
                <div class="pt-2">
                    <a href="{{ route('page.visi-misi') }}" class="inline-flex items-center text-xs font-bold text-[#f37023] hover:underline">
                        <span>Baca Rincian Visi</span>
                        <i class="fa-solid fa-arrow-right ml-1.5 text-[10px]"></i>
                    </a>
                </div>
            </div>

            {{-- Card Misi --}}
            <div class="bg-gradient-to-br from-gray-50 to-gray-100 p-8 rounded-3xl border border-gray-200 flex flex-col justify-between space-y-6">
                <div class="space-y-4">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-xl bg-gray-900 text-white flex items-center justify-center font-bold text-base shadow">
                            <i class="fa-solid fa-list-check"></i>
                        </div>
                        <h3 class="text-xl font-extrabold text-gray-900">Misi Utama</h3>
                    </div>
                    <ol class="text-xs sm:text-sm text-gray-700 space-y-2 list-decimal list-inside leading-relaxed">
                        <li>Meningkatkan pertumbuhan anggota partai dan kepemimpinan beriman & bertakwa.</li>
                        <li>Mengokohkan soliditas partai modern yang mandiri, terbuka, dan akuntabel.</li>
                        <li>Meningkatkan kepeloporan pelayanan, pemberdayaan masyarakat, dan ketahanan keluarga.</li>
                        <li>Memenangkan Pemilu 2029 demi kemakmuran rakyat yang bersih dari KKN.</li>
                    </ol>
                </div>
                <div class="pt-2">
                    <a href="{{ route('page.visi-misi') }}" class="inline-flex items-center text-xs font-bold text-gray-900 hover:text-[#f37023] transition">
                        <span>Baca Selengkapnya</span>
                        <i class="fa-solid fa-arrow-right ml-1.5 text-[10px]"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- SEKSI 5: KOMENTAR MASYARAKAT TERHADAP DPD PKS OGAN ILIR --}}
    @if(isset($testimonials) && $testimonials->isNotEmpty())
    <section class="space-y-8 reveal-fade-up">
        <div class="text-center max-w-2xl mx-auto">
            <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider block">Aspirasi & Penilaian</span>
            <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight mt-1">
                Komentar Masyarakat
            </h2>
            <p class="text-xs sm:text-sm text-gray-500 font-semibold mt-1">Terhadap DPD PKS Ogan Ilir</p>
            <div class="w-16 h-1 bg-[#f37023] mx-auto rounded-full mt-3"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($testimonials->take(4) as $testi)
                <div class="bg-white p-6 rounded-3xl shadow-sm border border-gray-100 flex flex-col justify-between space-y-4 hover:shadow-lg transition">
                    <div class="space-y-2">
                        <i class="fa-solid fa-quote-left text-2xl text-orange-200"></i>
                        <p class="text-xs text-gray-600 italic leading-relaxed line-clamp-4">
                            "{{ $testi->content }}"
                        </p>
                    </div>
                    <div class="flex items-center space-x-3 pt-3 border-t border-gray-50">
                        <div class="w-10 h-10 rounded-full bg-orange-100 text-[#f37023] font-bold flex items-center justify-center flex-shrink-0 overflow-hidden text-sm">
                            @if($testi->photo)
                                <img src="{{ $testi->photo }}" alt="{{ $testi->name }}" class="w-full h-full object-cover" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
                            @else
                                {{ substr($testi->name, 0, 1) }}
                            @endif
                        </div>
                        <div>
                            <span class="block font-bold text-xs text-gray-900">{{ $testi->name }}</span>
                            <span class="block text-[11px] text-gray-400">{{ $testi->profession }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="text-center pt-2">
            <a href="{{ route('testimonial.index') }}" class="inline-flex items-center text-xs font-bold text-[#f37023] hover:underline">
                <span>Lihat Seluruh Testimonial</span>
                <i class="fa-solid fa-arrow-right ml-1.5 text-[10px]"></i>
            </a>
        </div>
    </section>
    @endif

    {{-- SEKSI 6: GOOGLE MAPS KANTOR SEKRETARIAT --}}
    <section class="bg-white rounded-3xl p-8 sm:p-10 shadow-xl border border-gray-100 reveal-fade-up space-y-6">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider block">Sekretariat DPD</span>
                <h2 class="text-xl sm:text-2xl font-extrabold text-gray-900 mt-1">Lokasi Kantor DPD PKS Kabupaten Ogan Ilir</h2>
                <p class="text-xs text-gray-500 mt-1">Jl. Komperta Taman Indralaya Blok C No. 05 Kel. Indralaya Indah Kec. Indralaya Kab. Ogan Ilir, Sumatera Selatan</p>
            </div>
            <a href="https://maps.app.goo.gl/4YRW8cFM2qgjXnveA" target="_blank" class="inline-flex items-center bg-[#f37023] hover:bg-[#d85c14] text-white px-5 py-2.5 rounded-xl text-xs font-bold shadow transition flex-shrink-0">
                <i class="fa-solid fa-map-location-dot mr-2"></i> Buka Google Maps
            </a>
        </div>

        <div class="rounded-2xl overflow-hidden shadow-inner border border-gray-200 h-80 sm:h-96">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15935.918903337965!2d104.642145!3d-3.232491!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b9991cb45aaab%3A0x28dfaa3303668f80!2sIndralaya%20Mulya%2C%20Indralaya%2C%20Ogan%20Ilir%20Regency%2C%20South%20Sumatra!5e0!3m2!1sen!2sid!4v1700000000000!5m2!1sen!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </section>

</div>
@endsection
