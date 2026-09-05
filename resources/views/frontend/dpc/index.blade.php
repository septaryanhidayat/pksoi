@extends('layouts.frontend')

@section('title', 'DPC PKS se-Kabupaten Ogan Ilir - DPD PKS Ogan Ilir')
@section('meta_description', 'Struktur kepengurusan tingkat kecamatan Dewan Pengurus Cabang (DPC) Partai Keadilan Sejahtera se-Kabupaten Ogan Ilir.')

@section('content')
{{-- HERO HEADER --}}
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <span>Profil</span>
            <span>/</span>
            <span class="text-[#fdb913]">DPC PKS</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Dewan Pengurus Cabang (DPC) PKS</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">
            Struktur kepengurusan tingkat kecamatan Partai Keadilan Sejahtera se-Kabupaten Ogan Ilir yang siap melayani masyarakat.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 space-y-12">
    
    <div class="text-center max-w-2xl mx-auto">
        <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider block">Struktur Tingkat Kecamatan</span>
        <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight mt-1">
            DPC PKS Se-Kabupaten Ogan Ilir
        </h2>
        <p class="text-xs sm:text-sm text-gray-500 mt-1">16 Kantor Dewan Pengurus Cabang yang mengakar di seluruh wilayah Ogan Ilir.</p>
        <div class="w-16 h-1 bg-[#f37023] mx-auto rounded-full mt-3"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($dpcs as $idx => $dpc)
            <div class="bg-white rounded-3xl p-6 sm:p-8 border border-gray-100 shadow-md hover:shadow-xl transition transform hover:-translate-y-1 reveal-fade-up delay-{{ $idx % 3 }}">
                <div class="w-14 h-14 rounded-2xl bg-orange-100 text-[#f37023] flex items-center justify-center text-2xl mb-4 font-bold shadow-inner">
                    <i class="fa-solid fa-building-flag"></i>
                </div>
                <h3 class="text-lg font-extrabold text-gray-900 mb-2">
                    {{ $dpc->name }}
                </h3>
                @if($dpc->head_name)
                    <div class="text-xs text-gray-700 mb-2 flex items-center">
                        <i class="fa-solid fa-user-tie text-[#f37023] mr-2"></i>
                        <span>Ketua: <strong>{{ $dpc->head_name }}</strong></span>
                    </div>
                @endif
                @if($dpc->address)
                    <div class="text-xs text-gray-500 mb-3 flex items-start">
                        <i class="fa-solid fa-location-dot text-gray-400 mr-2 mt-0.5 flex-shrink-0"></i>
                        <span>{{ $dpc->address }}</span>
                    </div>
                @endif
                @if($dpc->description)
                    <p class="text-xs text-gray-600 line-clamp-3 leading-relaxed border-t border-gray-100 pt-3 font-light">
                        {{ $dpc->description }}
                    </p>
                @endif
            </div>
        @empty
            <div class="col-span-full text-center py-16 text-gray-400 bg-white rounded-3xl border border-gray-100">
                <i class="fa-solid fa-building-flag text-4xl text-gray-300 mb-3 block"></i>
                <span>Data DPC PKS belum tersedia.</span>
            </div>
        @endforelse
    </div>

</div>
@endsection
