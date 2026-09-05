@extends('layouts.frontend')

@section('title', $bidang->name . ' - DPD PKS Ogan Ilir')

@section('content')
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <a href="{{ route('bidang.index') }}" class="hover:text-white transition">Bidang DPD</a>
            <span>/</span>
            <span class="text-[#fdb913]">{{ $bidang->name }}</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">{{ $bidang->name }}</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">Bidang Kepengurusan DPD PKS Ogan Ilir</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-10">
        
        {{-- Detail Bidang (2/3) --}}
        <div class="lg:col-span-2 bg-white p-6 sm:p-10 rounded-3xl shadow-sm border border-gray-100 space-y-6">
            <div class="flex items-center space-x-4 pb-6 border-b border-gray-100">
                <div class="w-16 h-16 rounded-2xl bg-orange-100 text-[#f37023] flex items-center justify-center text-3xl flex-shrink-0">
                    <i class="fa-solid fa-layer-group"></i>
                </div>
                <div>
                    <h2 class="text-2xl font-extrabold text-gray-900">{{ $bidang->name }}</h2>
                    <span class="text-xs text-gray-500">Dewan Pengurus Daerah PKS Ogan Ilir</span>
                </div>
            </div>

            <div class="prose-content text-gray-700 text-sm sm:text-base leading-relaxed">
                {!! $bidang->description !!}
            </div>

            <div class="mt-8 p-6 bg-gray-50 rounded-2xl border border-gray-100 space-y-3 text-xs sm:text-sm">
                <h3 class="font-bold text-gray-900 text-sm uppercase tracking-wider mb-2">Informasi Kontak Bidang</h3>
                @if($bidang->address)
                    <p class="flex items-start"><i class="fa-solid fa-location-dot text-[#f37023] mt-1 mr-3 w-4"></i><span>{{ $bidang->address }}</span></p>
                @endif
                @if($bidang->phone)
                    <p class="flex items-center"><i class="fa-solid fa-phone text-[#f37023] mr-3 w-4"></i><span>{{ $bidang->phone }}</span></p>
                @endif
                @if($bidang->email)
                    <p class="flex items-center"><i class="fa-solid fa-envelope text-[#f37023] mr-3 w-4"></i><span>{{ $bidang->email }}</span></p>
                @endif
            </div>
        </div>

        {{-- Sidebar Bidang Lainnya --}}
        <div class="space-y-6">
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100">
                <h3 class="font-bold text-sm text-gray-900 mb-4 uppercase tracking-wider pb-2 border-b border-gray-100">
                    Bidang-Bidang Lainnya
                </h3>
                <ul class="space-y-3 text-xs">
                    @foreach($otherBidangs as $oB)
                        <li>
                            <a href="{{ route('bidang.show', $oB->slug) }}" class="flex items-center py-2 px-3 rounded-xl hover:bg-orange-50 hover:text-[#f37023] text-gray-700 transition">
                                <i class="fa-solid fa-chevron-right text-[10px] mr-2 text-gray-400"></i>
                                <span class="font-medium">{{ $oB->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
