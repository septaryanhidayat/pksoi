@extends('layouts.frontend')

@section('title', 'Sambutan Ketua DPD - DPD PKS Ogan Ilir')
@section('meta_description', 'Sambutan resmi Ketua DPD Partai Keadilan Sejahtera (PKS) Kabupaten Ogan Ilir, H. Husnul Anam, S.HI.')

@section('content')
{{-- HERO HEADER --}}
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <span>Profil</span>
            <span>/</span>
            <span class="text-[#fdb913]">Sambutan Ketua DPD</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Sambutan Ketua DPD PKS Ogan Ilir</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">
            Pesan dan komitmen pengabdian Ketua DPD Partai Keadilan Sejahtera Kabupaten Ogan Ilir.
        </p>
    </div>
</div>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <div class="bg-white rounded-3xl p-8 sm:p-12 shadow-xl border border-gray-100 reveal-fade-up">
        {{-- PROFIL PIMPINAN HEADER --}}
        <div class="flex flex-col md:flex-row items-center gap-8 mb-8 pb-8 border-b border-gray-100">
            <div class="w-48 h-56 sm:w-52 sm:h-60 rounded-2xl overflow-hidden shadow-lg border-4 border-white ring-4 ring-orange-100 flex-shrink-0 bg-orange-50">
                <img src="/uploads/2025/09/DPD-Profile-2.webp" alt="H. Husnul Anam, S.HI - Ketua DPD PKS Ogan Ilir" class="w-full h-full object-cover object-top" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
            </div>
            <div class="space-y-2 text-center md:text-left">
                <span class="inline-block bg-orange-100 text-[#f37023] text-xs font-bold px-3.5 py-1.5 rounded-full uppercase tracking-wider">
                    Ketua DPD PKS Ogan Ilir
                </span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight">
                    H. Husnul Anam, S.HI
                </h2>
                <p class="text-xs sm:text-sm text-[#f37023] font-semibold">Dewan Pengurus Daerah Partai Keadilan Sejahtera Kabupaten Ogan Ilir</p>
                <p class="text-xs sm:text-sm text-gray-500 italic pt-1">"Berkhidmat untuk Rakyat, Mewujudkan Indonesia yang Adil, Sejahtera, dan Bermartabat."</p>
            </div>
        </div>

        {{-- KONTEN PIDATO RESMI --}}
        <div class="prose-content text-gray-700 text-sm sm:text-base leading-relaxed space-y-5">
            <p class="font-semibold text-gray-900 text-base sm:text-lg">Assalamu'alaikum Warahmatullahi Wabarakatuh,</p>

            <p>Alhamdulillah, kami bersyukur kepada Allah SWT atas segala rahmat dan karunia-Nya, sehingga kami dapat hadirkan platform ini sebagai jembatan komunikasi antara Partai Keadilan Sejahtera dengan masyarakat Kabupaten Ogan Ilir yang kami cintai.</p>

            <p>Sebagai Ketua DPD PKS Kabupaten Ogan Ilir, saya, <strong>H. Husnul Anam, S.HI</strong>, menyampaikan salam hangat dan apresiasi kepada seluruh warga Ogan Ilir yang telah mendukung perjuangan kami. Partai Keadilan Sejahtera hadir untuk mewujudkan cita-cita bangsa yang adil, makmur, dan berkeadilan, sesuai dengan nilai-nilai Islam yang <em>rahmatan lil 'alamin</em>. Kami berkomitmen untuk memperjuangkan aspirasi rakyat, memajukan pembangunan daerah, serta menjaga keharmonisan sosial di tengah keberagaman masyarakat kita.</p>

            <p>Melalui website ini, kami ingin berbagi informasi terkini tentang program kerja, kegiatan partai, dan kontribusi PKS dalam pembangunan Kabupaten Ogan Ilir. Kami mengundang seluruh masyarakat untuk berpartisipasi aktif, memberikan masukan, dan bersama-sama membangun Ogan Ilir yang lebih baik.</p>

            <p>Semoga situs ini menjadi sarana yang bermanfaat bagi kita semua. Mari kita wujudkan visi Indonesia yang sejahtera dan bermartabat.</p>

            <p class="font-semibold text-gray-900 pt-2">Wassalamu'alaikum Warahmatullahi Wabarakatuh.</p>

            <div class="pt-6 border-t border-gray-100 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                <div>
                    <h3 class="font-bold text-gray-900 text-base">H. HUSNUL ANAM, S.HI</h3>
                    <p class="text-xs text-gray-500">Ketua DPD Partai Keadilan Sejahtera Kabupaten Ogan Ilir</p>
                </div>
                <div class="inline-flex items-center space-x-2 bg-gray-50 px-4 py-2 rounded-xl text-xs text-gray-600 border border-gray-200">
                    <i class="fa-solid fa-certificate text-[#f37023]"></i>
                    <span>Amanah Musda VI DPD PKS Ogan Ilir</span>
                </div>
            </div>
        </div>

        {{-- CTA GABUNG --}}
        <div class="mt-10 pt-8 border-t border-gray-100 bg-gradient-to-r from-orange-500 to-amber-500 rounded-2xl p-6 sm:p-8 text-white flex flex-col sm:flex-row items-center justify-between gap-6 shadow-lg">
            <div>
                <h4 class="text-xl font-extrabold">Mari Bergabung Bersama Kami!</h4>
                <p class="text-xs sm:text-sm text-orange-100 mt-1">Satu langkah kecil Anda adalah bagian dari perjuangan mewujudkan Ogan Ilir yang lebih baik.</p>
            </div>
            <div class="flex flex-wrap gap-3 flex-shrink-0">
                <a href="https://daftar.pks.id" target="_blank" class="bg-white text-[#f37023] hover:bg-orange-50 px-5 py-2.5 rounded-xl font-bold text-xs shadow transition flex items-center">
                    <i class="fa-solid fa-user-plus mr-1.5"></i> Daftar Anggota PKS
                </a>
                <a href="{{ route('hubungi') }}" class="bg-black/30 hover:bg-black/40 text-white px-5 py-2.5 rounded-xl font-bold text-xs shadow transition flex items-center">
                    <i class="fa-solid fa-paper-plane mr-1.5"></i> Sampaikan Aspirasi
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
