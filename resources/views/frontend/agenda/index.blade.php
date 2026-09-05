@extends('layouts.frontend')

@section('title', 'Agenda Kegiatan - DPD PKS Ogan Ilir')
@section('meta_description', 'Jadwal dan agenda kegiatan resmi DPD Partai Keadilan Sejahtera Kabupaten Ogan Ilir.')

@section('content')
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <span>Informasi</span>
            <span>/</span>
            <span class="text-[#fdb913]">Agenda Kegiatan</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Agenda Kegiatan PKS Ogan Ilir</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">Jadwal konsolidasi, bakti sosial, rapat kerja, dan kegiatan masyarakat.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
        @forelse($agendas as $agenda)
            <div class="bg-white p-6 rounded-3xl shadow-sm hover:shadow-lg border border-gray-100 flex flex-col sm:flex-row gap-6 transition transform hover:-translate-y-1">
                <div class="bg-orange-50 border-2 border-orange-200 rounded-2xl p-4 text-center flex flex-col items-center justify-center flex-shrink-0 w-24 h-24 sm:w-28 sm:h-28">
                    <span class="text-3xl font-extrabold text-[#f37023]">
                        {{ $agenda->event_date ? $agenda->event_date->format('d') : '01' }}
                    </span>
                    <span class="text-xs uppercase font-bold text-gray-600">
                        {{ $agenda->event_date ? $agenda->event_date->format('M Y') : '2026' }}
                    </span>
                </div>
                <div class="flex-grow flex flex-col justify-between space-y-3">
                    <div>
                        <h2 class="font-extrabold text-base sm:text-lg text-gray-900 hover:text-[#f37023] transition leading-snug">
                            <a href="{{ route('agenda.show', $agenda->slug) }}">{{ $agenda->title }}</a>
                        </h2>
                        <p class="text-xs text-gray-500 mt-1 flex items-center">
                            <i class="fa-solid fa-location-dot mr-2 text-[#f37023]"></i>
                            <span>{{ $agenda->location ?: 'Kabupaten Ogan Ilir' }}</span>
                        </p>
                        <p class="text-xs text-gray-500 mt-2 line-clamp-2 leading-relaxed font-light">
                            {!! strip_tags($agenda->content) !!}
                        </p>
                    </div>
                    <div class="pt-2">
                        <a href="{{ route('agenda.show', $agenda->slug) }}" class="inline-flex items-center text-xs font-semibold text-[#f37023] hover:underline">
                            <span>Detail Agenda</span>
                            <i class="fa-solid fa-arrow-right ml-1.5 text-[10px]"></i>
                        </a>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-2 text-center py-16 text-gray-400">Belum ada agenda kegiatan.</div>
        @endforelse
    </div>

    <div class="pt-8">
        {{ $agendas->links() }}
    </div>
</div>
@endsection
