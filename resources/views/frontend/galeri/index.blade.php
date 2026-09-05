@extends('layouts.frontend')

@section('title', 'Galeri Foto - DPD PKS Ogan Ilir')
@section('meta_description', 'Dokumentasi foto kegiatan, bakti sosial, dan aksi advokasi DPD PKS Ogan Ilir.')

@section('content')
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <span class="text-[#fdb913]">Galeri Foto</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Galeri Dokumentasi PKS</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">Momen kebersamaan, aksi pelayanan sosial, dan dinamika kegiatan kader PKS Ogan Ilir.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14" x-data="{ lightboxOpen: false, activeImg: '', activeTitle: '' }">
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4 sm:gap-6">
        @forelse($galleryImages as $img)
            <div class="group relative rounded-2xl overflow-hidden bg-gray-100 shadow-sm hover:shadow-xl transition transform hover:-translate-y-1 aspect-square cursor-pointer"
                 @click="activeImg = '{{ $img->featured_image }}'; activeTitle = '{{ addslashes($img->title) }}'; lightboxOpen = true">
                <img src="{{ $img->featured_image }}" alt="{{ $img->title }}" class="w-full h-full object-cover group-hover:scale-110 transition duration-500" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-transparent opacity-0 group-hover:opacity-100 transition duration-300 flex flex-col justify-end p-4">
                    <span class="text-white text-xs font-bold line-clamp-2">{{ $img->title }}</span>
                    <span class="text-[10px] text-orange-300 mt-1"><i class="fa-solid fa-magnifying-glass-plus mr-1"></i>Perbesar</span>
                </div>
            </div>
        @empty
            <div class="col-span-4 text-center py-16 text-gray-400">Belum ada foto dokumentasi.</div>
        @endforelse
    </div>

    {{-- LIGHTBOX MODAL --}}
    <div x-show="lightboxOpen" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 bg-black/90 flex items-center justify-center p-4 backdrop-blur-sm"
         style="display: none;"
         @keydown.escape.window="lightboxOpen = false">
        <button @click="lightboxOpen = false" class="absolute top-6 right-6 text-white text-3xl hover:text-[#f37023] transition" aria-label="Close">
            <i class="fa-solid fa-xmark"></i>
        </button>
        <div class="max-w-4xl max-h-[85vh] flex flex-col items-center" @click.away="lightboxOpen = false">
            <img :src="activeImg" :alt="activeTitle" class="max-h-[75vh] w-auto rounded-xl shadow-2xl object-contain">
            <p class="text-white text-sm font-medium mt-3 text-center px-4" x-text="activeTitle"></p>
        </div>
    </div>
</div>
@endsection
