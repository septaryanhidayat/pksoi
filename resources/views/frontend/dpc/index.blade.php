@extends('layouts.frontend')

@section('title', 'DPC PKS se-Kabupaten Ogan Ilir - DPD PKS Ogan Ilir')

@section('content')
<div class="bg-gray-50 py-10 border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="flex text-xs text-gray-500 mb-3" aria-label="Breadcrumb">
            <a href="{{ route('home') }}" class="hover:text-[#FE6000]">Beranda</a>
            <span class="mx-2">/</span>
            <span class="text-gray-800 font-semibold">DPC PKS</span>
        </nav>
        <h1 class="text-3xl font-extrabold text-gray-900 tracking-tight">
            Dewan Pengurus Cabang (DPC) PKS
        </h1>
        <p class="text-sm text-gray-600 mt-1 max-w-2xl">
            Struktur kepengurusan tingkat kecamatan Partai Keadilan Sejahtera se-Kabupaten Ogan Ilir yang siap melayani masyarakat.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse($dpcs as $dpc)
        <div class="bg-white rounded-2xl p-6 border border-gray-100 shadow-sm hover:shadow-md transition">
            <div class="w-12 h-12 rounded-xl bg-orange-100 text-[#FE6000] flex items-center justify-center text-xl mb-4 font-bold shadow-sm">
                <i class="fa-solid fa-landmark"></i>
            </div>
            <h3 class="text-lg font-bold text-gray-900 mb-2">
                {{ $dpc->name }}
            </h3>
            @if($dpc->head_name)
            <div class="text-xs text-gray-600 mb-2 flex items-center">
                <i class="fa-solid fa-user-check text-[#FE6000] mr-2"></i>
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
            <p class="text-xs text-gray-600 line-clamp-3 leading-relaxed border-t border-gray-100 pt-3">
                {{ $dpc->description }}
            </p>
            @endif
        </div>
        @empty
        <div class="col-span-full text-center py-12 text-gray-500">
            Data DPC PKS belum tersedia.
        </div>
        @endforelse
    </div>
</div>
@endsection
