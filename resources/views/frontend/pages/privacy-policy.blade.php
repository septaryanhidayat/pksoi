@extends('layouts.frontend')

@section('title', 'Kebijakan Privasi - DPD PKS Ogan Ilir')

@section('content')
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <span class="text-[#fdb913]">Kebijakan Privasi</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Kebijakan Privasi (Privacy Policy)</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">Informasi perlindungan data pengguna di situs DPD PKS Ogan Ilir.</p>
    </div>
</div>

<div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <div class="bg-white rounded-3xl p-8 sm:p-12 shadow-xl border border-gray-100">
        <div class="prose-content text-gray-700 text-sm sm:text-base leading-relaxed space-y-4">
            {!! $page->content !!}
        </div>
    </div>
</div>
@endsection
