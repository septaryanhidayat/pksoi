@extends('layouts.frontend')

@section('title', 'Testimonial Masyarakat - DPD PKS Ogan Ilir')
@section('meta_description', 'Suara, kesan, dan harapan masyarakat Kabupaten Ogan Ilir terhadap kiprah dan pengabdian PKS.')

@section('content')
{{-- HERO HEADER --}}
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <span>Informasi</span>
            <span>/</span>
            <span class="text-[#fdb913]">Testimonial</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Komentar & Testimonial Masyarakat</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">
            Suara, penilaian, dan harapan tulus masyarakat Kabupaten Ogan Ilir terhadap kiprah DPD PKS Ogan Ilir.
        </p>
    </div>
</div>

<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-14 space-y-12">
    
    <div class="text-center max-w-2xl mx-auto">
        <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider block">Komentar Masyarakat</span>
        <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight mt-1">
            Terhadap DPD PKS Ogan Ilir
        </h2>
        <div class="w-16 h-1 bg-[#f37023] mx-auto rounded-full mt-3"></div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
        @forelse($testimonials as $idx => $testi)
            <div class="bg-white p-8 rounded-3xl shadow-md border border-gray-100 flex flex-col justify-between space-y-6 hover:shadow-xl transition transform hover:-translate-y-1 reveal-fade-up delay-{{ $idx % 4 }}">
                <div class="space-y-3">
                    <i class="fa-solid fa-quote-left text-3xl text-orange-200"></i>
                    <p class="text-xs sm:text-sm text-gray-600 italic leading-relaxed">
                        "{{ $testi->content }}"
                    </p>
                </div>
                <div class="flex items-center space-x-3 pt-4 border-t border-gray-50">
                    <div class="w-12 h-12 rounded-full bg-orange-100 text-[#f37023] font-bold flex items-center justify-center flex-shrink-0 overflow-hidden text-base shadow-sm">
                        @if($testi->photo)
                            <img src="{{ $testi->photo }}" alt="{{ $testi->name }}" class="w-full h-full object-cover" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
                        @else
                            {{ substr($testi->name, 0, 1) }}
                        @endif
                    </div>
                    <div>
                        <span class="block font-bold text-sm text-gray-900">{{ $testi->name }}</span>
                        <span class="block text-xs text-gray-400 font-medium">{{ $testi->profession }}</span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-16 text-gray-400 bg-white rounded-3xl border border-gray-100">
                <i class="fa-regular fa-comment-dots text-4xl text-gray-300 mb-3 block"></i>
                <span>Belum ada testimonial yang dipublikasikan.</span>
            </div>
        @endforelse
    </div>

</div>
@endsection
