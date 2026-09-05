@extends('layouts.frontend')

@section('title', 'Bidang-Bidang Kepengurusan - DPD PKS Ogan Ilir')
@section('meta_description', 'Daftar bidang dan unit kerja kepengurusan DPD Partai Keadilan Sejahtera Kabupaten Ogan Ilir.')

@section('content')
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <span>Profil</span>
            <span>/</span>
            <span class="text-[#fdb913]">Bidang DPD</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Bidang-Bidang DPD PKS Ogan Ilir</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">Struktur bidang kerja untuk melayani berbagai segmen kebutuhan masyarakat.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($bidangs as $b)
            <div class="bg-white rounded-3xl overflow-hidden shadow-md border border-gray-100 hover:shadow-xl transition transform hover:-translate-y-1 flex flex-col group">
                <div class="p-6 flex-grow flex flex-col justify-between space-y-4">
                    <div>
                        <div class="w-14 h-14 rounded-2xl bg-orange-100 text-[#f37023] group-hover:bg-[#f37023] group-hover:text-white flex items-center justify-center text-2xl transition mb-4">
                            <i class="fa-solid fa-layer-group"></i>
                        </div>
                        <h2 class="font-extrabold text-gray-900 text-lg group-hover:text-[#f37023] transition">
                            <a href="{{ route('bidang.show', $b->slug) }}">{{ $b->name }}</a>
                        </h2>
                        <div class="text-xs text-gray-500 mt-2 line-clamp-3 leading-relaxed font-light">
                            {!! strip_tags($b->description) !!}
                        </div>
                    </div>

                    <div class="pt-4 border-t border-gray-100 space-y-2 text-xs text-gray-500">
                        @if($b->phone)
                            <div class="flex items-center space-x-2">
                                <i class="fa-solid fa-phone text-[#f37023] w-4"></i>
                                <span>{{ $b->phone }}</span>
                            </div>
                        @endif
                        @if($b->email)
                            <div class="flex items-center space-x-2">
                                <i class="fa-solid fa-envelope text-[#f37023] w-4"></i>
                                <span>{{ $b->email }}</span>
                            </div>
                        @endif
                        <div class="pt-2">
                            <a href="{{ route('bidang.show', $b->slug) }}" class="inline-flex items-center text-xs font-semibold text-[#f37023] hover:underline">
                                <span>Selengkapnya</span>
                                <i class="fa-solid fa-arrow-right ml-1.5 text-[10px]"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
