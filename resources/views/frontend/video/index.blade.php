@extends('layouts.frontend')

@section('title', 'Galeri Video - DPD PKS Ogan Ilir')
@section('meta_description', 'Kumpulan video dokumentasi kegiatan resmi, podcast, dan aksi advokasi DPD PKS Ogan Ilir.')

@section('content')
{{-- HERO HEADER --}}
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <span class="text-[#fdb913]">Video</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Galeri Video PKS Ogan Ilir</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">
            Dokumentasi video liputan kegiatan, podcast dakwah, pesan pimpinan, dan aksi advokasi rakyat.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 space-y-12">
    
    <div class="text-center max-w-2xl mx-auto">
        <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider block">PUBLIKASI MULTIMEDIA</span>
        <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight mt-1">
            Video Kegiatan PKS Ogan Ilir
        </h2>
        <div class="w-16 h-1 bg-[#f37023] mx-auto rounded-full mt-3"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @forelse($videos as $idx => $vid)
            <div class="bg-white rounded-3xl overflow-hidden shadow-md hover:shadow-xl border border-gray-100 flex flex-col justify-between group reveal-fade-up delay-{{ $idx % 3 }}">
                <div>
                    <div class="relative pb-[56.25%] h-0 bg-black overflow-hidden cursor-pointer group/vid" onclick="playPageVideo(this, '{{ $vid->youtube_id }}')">
                        <img src="{{ $vid->thumbnail_url }}" 
                             alt="{{ $vid->title }}" 
                             class="absolute top-0 left-0 w-full h-full object-cover transition-transform duration-500 group-hover/vid:scale-105"
                             loading="lazy"
                             onerror="this.src='https://img.youtube.com/vi/{{ $vid->youtube_id }}/hqdefault.jpg'">
                        <div class="absolute inset-0 bg-black/30 group-hover/vid:bg-black/10 transition flex items-center justify-center">
                            <div class="w-14 h-14 rounded-full bg-red-600/90 text-white flex items-center justify-center shadow-xl group-hover/vid:scale-110 group-hover/vid:bg-red-600 transition-all">
                                <i class="fa-solid fa-play text-xl ml-1"></i>
                            </div>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-extrabold text-sm sm:text-base text-gray-900 group-hover:text-[#f37023] transition line-clamp-2 leading-snug">
                            {{ $vid->title }}
                        </h3>
                        @if($vid->description)
                            <p class="text-xs text-gray-500 line-clamp-3 mt-2 font-light leading-relaxed">
                                {!! strip_tags($vid->description) !!}
                            </p>
                        @endif
                    </div>
                </div>

                <div class="p-6 pt-0 border-t border-gray-100 flex items-center justify-between text-xs text-gray-400 mt-2">
                    <span class="inline-flex items-center text-red-600 font-bold">
                        <i class="fa-brands fa-youtube mr-1.5 text-sm"></i> YouTube
                    </span>
                    <span>DPD PKS Ogan Ilir</span>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-16 text-gray-400 bg-white rounded-3xl border border-gray-100">
                <i class="fa-solid fa-video text-4xl text-gray-300 mb-3 block"></i>
                <span>Belum ada video dokumentasi yang tersedia.</span>
            </div>
        @endforelse
    </div>

    <div class="pt-6">
        {{ $videos->links() }}
    </div>
</div>

<script>
function playPageVideo(el, id) {
    if (!id) return;
    el.onclick = null;
    el.innerHTML = '<iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/' + encodeURIComponent(id) + '?autoplay=1&rel=0" title="YouTube video" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
}
</script>
@endsection
