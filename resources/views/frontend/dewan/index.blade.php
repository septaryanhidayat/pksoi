@extends('layouts.frontend')

@section('title', 'Anggota DPRD Fraksi PKS Ogan Ilir')
@section('meta_description', 'Profil Anggota DPRD Kabupaten Ogan Ilir Fraksi Partai Keadilan Sejahtera (PKS).')

@section('content')
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <span>Profil</span>
            <span>/</span>
            <span class="text-[#fdb913]">Anggota Dewan</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Anggota DPRD Fraksi PKS Ogan Ilir</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">Wakil rakyat yang senantiasa mengawal dan memperjuangkan aspirasi masyarakat Ogan Ilir di parlemen.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach($dewan as $d)
            <div class="bg-white rounded-3xl overflow-hidden shadow-lg border border-gray-100 hover:shadow-2xl transition transform hover:-translate-y-1 flex flex-col">
                {{-- Foto Dewan --}}
                <div class="h-72 w-full overflow-hidden bg-gray-100 relative">
                    @if($d->photo)
                        <img src="{{ $d->photo }}" alt="{{ $d->name }}" class="w-full h-full object-cover object-top" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
                    @else
                        <img src="/uploads/2025/09/logo-thumbnail.webp" alt="{{ $d->name }}" class="w-full h-full object-cover">
                    @endif
                    <div class="absolute bottom-0 inset-x-0 h-20 bg-gradient-to-t from-black/70 to-transparent"></div>
                    <span class="absolute bottom-3 left-4 text-xs font-bold text-white bg-[#f37023] px-2.5 py-0.5 rounded-full shadow">
                        {{ $d->fraction ?: 'Fraksi PKS' }}
                    </span>
                </div>

                {{-- Detail Dewan --}}
                <div class="p-6 flex-grow flex flex-col justify-between space-y-3">
                    <div>
                        <h2 class="font-extrabold text-gray-900 text-lg leading-snug">{{ $d->name }}</h2>
                        <span class="text-xs font-semibold text-[#f37023] block mt-1">{{ $d->position }}</span>
                        @if($d->profile_summary)
                            <div class="mt-3 text-xs text-gray-600 line-clamp-4 leading-relaxed">
                                {!! strip_tags($d->profile_summary) !!}
                            </div>
                        @endif
                    </div>
                    
                    <div class="pt-3 border-t border-gray-100 flex items-center justify-between text-xs text-gray-500">
                        <span>DPRD Ogan Ilir</span>
                        <span class="text-[#fdb913]"><i class="fa-solid fa-certificate"></i></span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
