@extends('layouts.frontend')

@section('title', 'Galeri Video - DPD PKS Ogan Ilir')
@section('meta_description', 'Dokumentasi video kegiatan dan podcast DPD PKS Ogan Ilir.')

@section('content')
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <span>Informasi</span>
            <span>/</span>
            <span class="text-[#fdb913]">Galeri Video</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Galeri Video PKS TV</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">Dokumentasi video kegiatan resmi, podcast, dan aksi advokasi rakyat.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($videos as $vid)
            <div class="bg-white rounded-3xl overflow-hidden shadow-md border border-gray-100 flex flex-col group">
                <div class="relative pb-[56.25%] h-0 bg-black overflow-hidden">
                    @if($vid->youtube_id)
                        <iframe class="absolute top-0 left-0 w-full h-full" 
                                src="https://www.youtube.com/embed/{{ $vid->youtube_id }}" 
                                title="{{ $vid->title }}" 
                                frameborder="0" 
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                allowfullscreen></iframe>
                    @else
                        <div class="absolute inset-0 flex items-center justify-center text-white">
                            <i class="fa-brands fa-youtube text-5xl text-red-500"></i>
                        </div>
                    @endif
                </div>
                <div class="p-6 flex-grow flex flex-col justify-between">
                    <h2 class="font-extrabold text-sm sm:text-base text-gray-900 line-clamp-2 leading-snug">
                        {{ $vid->title }}
                    </h2>
                    @if($vid->description)
                        <p class="text-xs text-gray-500 line-clamp-2 mt-2 font-light">
                            {!! strip_tags($vid->description) !!}
                        </p>
                    @endif
                </div>
            </div>
        @empty
            <div class="col-span-3 text-center py-16 text-gray-400">Belum ada video.</div>
        @endforelse
    </div>

    <div class="pt-8">
        {{ $videos->links() }}
    </div>
</div>
@endsection
