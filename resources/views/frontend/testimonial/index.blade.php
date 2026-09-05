@extends('layouts.frontend')

@section('title', 'Testimonial Masyarakat - DPD PKS Ogan Ilir')
@section('meta_description', 'Suara dan harapan masyarakat Kabupaten Ogan Ilir terhadap kiprah PKS.')

@section('content')
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <span>Informasi</span>
            <span>/</span>
            <span class="text-[#fdb913]">Testimonial</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Testimonial Masyarakat</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">Suara, kesan, dan harapan masyarakat Kabupaten Ogan Ilir.</p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        @foreach($testimonials as $testi)
            <div class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex flex-col justify-between space-y-6 hover:shadow-lg transition">
                <div class="space-y-3">
                    <i class="fa-solid fa-quote-left text-3xl text-orange-200"></i>
                    <p class="text-xs sm:text-sm text-gray-600 italic leading-relaxed">
                        "{{ $testi->content }}"
                    </p>
                </div>
                <div class="flex items-center space-x-3 pt-4 border-t border-gray-50">
                    <div class="w-12 h-12 rounded-full bg-orange-100 text-[#f37023] font-bold flex items-center justify-center flex-shrink-0 overflow-hidden text-base">
                        @if($testi->photo)
                            <img src="{{ $testi->photo }}" alt="{{ $testi->name }}" class="w-full h-full object-cover" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
                        @else
                            {{ substr($testi->name, 0, 1) }}
                        @endif
                    </div>
                    <div>
                        <span class="block font-bold text-sm text-gray-900">{{ $testi->name }}</span>
                        <span class="block text-xs text-gray-400">{{ $testi->profession }}</span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
