@extends('layouts.frontend')

@section('title', 'Pusat Download - DPD PKS Ogan Ilir')
@section('meta_description', 'Pusat unduhan file resmi, dokumen panduan, lagu, dan materi DPD PKS Ogan Ilir.')

@section('content')
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <span class="text-[#fdb913]">Pusat Download</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Pusat Download Dokumen & Media</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">Unduh formulir, lagu resmi, e-book, dan aset grafis resmi PKS Ogan Ilir.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    
    {{-- Quick Categories Tabs --}}
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-10">
        <a href="{{ route('download.index') }}" class="p-4 rounded-2xl border-2 border-[#f37023] bg-orange-50 text-[#f37023] font-bold text-xs sm:text-sm flex items-center justify-center space-x-2 shadow-sm">
            <i class="fa-solid fa-folder-open"></i>
            <span>Semua File</span>
        </a>
        <a href="{{ route('download.ebook') }}" class="p-4 rounded-2xl border border-gray-200 bg-white hover:border-[#f37023] hover:text-[#f37023] font-semibold text-xs sm:text-sm flex items-center justify-center space-x-2 transition shadow-sm">
            <i class="fa-solid fa-book"></i>
            <span>E-Book PKS</span>
        </a>
        <a href="{{ route('download.hymne-mars') }}" class="p-4 rounded-2xl border border-gray-200 bg-white hover:border-[#f37023] hover:text-[#f37023] font-semibold text-xs sm:text-sm flex items-center justify-center space-x-2 transition shadow-sm">
            <i class="fa-solid fa-music"></i>
            <span>Hymne & Mars</span>
        </a>
        <a href="{{ route('download.logo') }}" class="p-4 rounded-2xl border border-gray-200 bg-white hover:border-[#f37023] hover:text-[#f37023] font-semibold text-xs sm:text-sm flex items-center justify-center space-x-2 transition shadow-sm">
            <i class="fa-solid fa-image"></i>
            <span>Logo Resmi</span>
        </a>
    </div>

    {{-- Downloads Table / Cards --}}
    <div class="bg-white rounded-3xl p-6 sm:p-8 shadow-sm border border-gray-100">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-600">
                <thead class="text-xs uppercase bg-gray-50 text-gray-500 font-bold border-b border-gray-100">
                    <tr>
                        <th class="py-3 px-4">Nama File</th>
                        <th class="py-3 px-4">Kategori</th>
                        <th class="py-3 px-4">Format</th>
                        <th class="py-3 px-4 text-center">Diunduh</th>
                        <th class="py-3 px-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($downloads as $dl)
                        <tr class="hover:bg-orange-50/50 transition">
                            <td class="py-4 px-4 font-bold text-gray-900 flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-xl bg-orange-100 text-[#f37023] flex items-center justify-center flex-shrink-0 text-base">
                                    @if(in_array(strtoupper($dl->file_type), ['MP3', 'WAV']))
                                        <i class="fa-solid fa-music"></i>
                                    @elseif(in_array(strtoupper($dl->file_type), ['PDF']))
                                        <i class="fa-solid fa-file-pdf"></i>
                                    @elseif(in_array(strtoupper($dl->file_type), ['PNG', 'JPG', 'WEBP']))
                                        <i class="fa-solid fa-file-image"></i>
                                    @else
                                        <i class="fa-solid fa-file"></i>
                                    @endif
                                </div>
                                <span>{{ $dl->title }}</span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-xs bg-gray-100 px-2.5 py-1 rounded-full text-gray-600 font-medium">
                                    {{ $dl->category_type }}
                                </span>
                            </td>
                            <td class="py-4 px-4">
                                <span class="text-xs font-bold text-[#f37023]">
                                    {{ strtoupper($dl->file_type ?: 'FILE') }}
                                </span>
                            </td>
                            <td class="py-4 px-4 text-center text-xs text-gray-400">
                                {{ number_format($dl->download_count) }} kali
                            </td>
                            <td class="py-4 px-4 text-right">
                                <a href="{{ route('download.file', $dl->id) }}" class="inline-flex items-center bg-[#f37023] hover:bg-[#d85c14] text-white px-4 py-2 rounded-xl text-xs font-semibold shadow transition">
                                    <i class="fa-solid fa-download mr-1.5"></i> Unduh
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-10 text-gray-400">Belum ada file download.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="pt-6">
            {{ $downloads->links() }}
        </div>
    </div>
</div>
@endsection
