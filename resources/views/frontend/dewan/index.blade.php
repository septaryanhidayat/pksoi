@extends('layouts.frontend')

@section('title', 'Anggota DPRD Fraksi PKS - DPD PKS Ogan Ilir')
@section('meta_description', 'Profil Anggota DPRD Kabupaten Ogan Ilir Fraksi Partai Keadilan Sejahtera (PKS) yang mengawal aspirasi rakyat.')

@section('content')
{{-- HERO HEADER --}}
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <span>Profil</span>
            <span>/</span>
            <span class="text-[#fdb913]">Anggota Dewan</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Anggota DPRD Fraksi PKS</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">
            Kabar dan Aktivitas terbaru wakil rakyat Fraksi PKS di parlemen Kabupaten Ogan Ilir.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 space-y-12">
    
    <div class="text-center max-w-2xl mx-auto">
        <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider block">Wakil Rakyat di Parlemen</span>
        <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight mt-1">
            Fraksi Partai Keadilan Sejahtera
        </h2>
        <p class="text-xs sm:text-sm text-gray-500 mt-1">DPRD Kabupaten Ogan Ilir</p>
        <div class="w-16 h-1 bg-[#f37023] mx-auto rounded-full mt-3"></div>
    </div>

    @php
        $dewanData = [
            [
                'name' => 'H. Asmawi',
                'position' => 'Anggota DPRD Fraksi PKS',
                'dapil' => 'Dapil 4 Ogan Ilir',
                'photo' => '/uploads/2023/11/Asmawi.webp',
                'summary' => 'Mewakili aspirasi masyarakat Kecamatan Muara Kuang, Rambang Kuang, dan Lubuk Keliat dengan dedikasi penuh memperjuangkan kesejahteraan pedesaan.'
            ],
            [
                'name' => 'Eko Satria Asnan, S.E.',
                'position' => 'Anggota DPRD Fraksi PKS',
                'dapil' => 'Dapil 5 Ogan Ilir',
                'photo' => '/uploads/2023/11/Eko-Satria.webp',
                'summary' => 'Mengawal pembangunan infrastruktur, ekonomi kerakyatan, dan pendidikan di wilayah Kecamatan Tanjung Batu dan Payaraman.'
            ],
            [
                'name' => 'Muhammad Sayuti, S.H.',
                'position' => 'Ketua Fraksi PKS DPRD OI',
                'dapil' => 'Dapil 3 Ogan Ilir',
                'photo' => '/uploads/2023/11/Sayuti.webp',
                'summary' => 'Ketua Fraksi PKS DPRD Kabupaten Ogan Ilir, memperjuangkan kebijakan publik yang pro-rakyat, transparansi anggaran, dan keadilan sosial.'
            ],
            [
                'name' => 'Muhammad Ilham',
                'position' => 'Anggota DPRD Fraksi PKS',
                'dapil' => 'Dapil 1 Ogan Ilir',
                'photo' => '/uploads/2025/09/Web-DPD-Dewan-Ilham.webp',
                'summary' => 'Wakil rakyat Dapil 1 meliputi Indralaya, Indralaya Utara, dan Indralaya Selatan yang aktif memperjuangkan kemajuan generasi muda dan UMKM.'
            ],
        ];
    @endphp

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach($dewanData as $idx => $d)
            <div class="bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-2xl border border-gray-100 transition transform hover:-translate-y-1.5 flex flex-col justify-between reveal-fade-up delay-{{ $idx }}">
                
                {{-- FOTO DEWAN --}}
                <div class="h-80 w-full overflow-hidden bg-gray-100 relative group">
                    <img src="{{ $d['photo'] }}" alt="{{ $d['name'] }}" class="w-full h-full object-cover object-top group-hover:scale-105 transition duration-500" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
                    <div class="absolute bottom-0 inset-x-0 h-24 bg-gradient-to-t from-black/80 via-black/30 to-transparent"></div>
                    <span class="absolute bottom-3 left-4 text-[11px] font-extrabold text-white bg-[#f37023] px-3 py-1 rounded-full shadow">
                        {{ $d['dapil'] }}
                    </span>
                </div>

                {{-- DESKRIPSI DEWAN --}}
                <div class="p-6 flex-grow flex flex-col justify-between space-y-4">
                    <div>
                        <h3 class="font-extrabold text-gray-900 text-lg leading-snug hover:text-[#f37023] transition">
                            {{ $d['name'] }}
                        </h3>
                        <span class="text-xs font-semibold text-[#f37023] block mt-1">{{ $d['position'] }}</span>
                        <p class="mt-3 text-xs text-gray-600 leading-relaxed font-light">
                            {{ $d['summary'] }}
                        </p>
                    </div>

                    <div class="pt-4 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
                        <span class="font-medium">DPRD Ogan Ilir</span>
                        <span class="inline-flex items-center text-[#fdb913]">
                            <i class="fa-solid fa-award mr-1"></i> Amanah Rakyat
                        </span>
                    </div>
                </div>

            </div>
        @endforeach
    </div>

</div>
@endsection
