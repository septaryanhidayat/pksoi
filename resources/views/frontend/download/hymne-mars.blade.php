@extends('layouts.frontend')

@section('title', 'Mars dan Hymne PKS - DPD PKS Ogan Ilir')
@section('meta_description', 'Lagu resmi Mars dan Hymne Partai Keadilan Sejahtera ciptaan Mohamad Sohibul Iman dan Dwiki Darmawan lengkap dengan audio dan lirik.')

@section('content')
{{-- HERO HEADER --}}
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <a href="{{ route('download.index') }}" class="hover:text-white transition">Download</a>
            <span>/</span>
            <span class="text-[#fdb913]">Hymne & Mars PKS</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Mars dan Hymne Partai Keadilan Sejahtera</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">
            Lagu resmi pembangkit semangat juang, moralitas, dan dedikasi kader PKS untuk Indonesia.
        </p>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-14 space-y-12">
    
    {{-- MARS PKS --}}
    <article class="bg-white rounded-3xl p-8 sm:p-12 shadow-xl border border-gray-100 space-y-6 reveal-fade-up">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pb-6 border-b border-gray-100">
            <div>
                <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider block">Lagu Perjuangan</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mt-1">MARS PKS</h2>
                <p class="text-xs sm:text-sm text-gray-500 italic mt-1">
                    Ciptaan: <strong>Mohamad Sohibul Iman dan Dwiki Darmawan</strong>
                </p>
            </div>
            <a href="/uploads/2025/09/MARSPKSORCHESTRA.mp3" download class="inline-flex items-center bg-[#f37023] hover:bg-[#d85c14] text-white px-5 py-2.5 rounded-xl text-xs font-bold shadow-md hover:shadow-lg transition flex-shrink-0">
                <i class="fa-solid fa-download mr-2"></i> Unduh Audio Mars
            </a>
        </div>

        {{-- Audio Player --}}
        <div class="bg-orange-50/80 p-4 rounded-2xl border border-orange-200">
            <p class="text-xs font-semibold text-gray-600 mb-2 flex items-center">
                <i class="fa-solid fa-volume-high text-[#f37023] mr-2"></i> Pemutar Musik Mars PKS (Orchestra Version)
            </p>
            <audio controls class="w-full">
                <source src="/uploads/2025/09/MARSPKSORCHESTRA.mp3" type="audio/mpeg">
                Browser Anda tidak mendukung pemutar audio.
            </audio>
        </div>

        {{-- Lirik Mars Lengkap --}}
        <div class="bg-gray-50/80 p-8 rounded-2xl border border-gray-100 text-center space-y-4 text-sm sm:text-base text-gray-800 leading-relaxed font-serif">
            <h3 class="font-sans text-xs font-extrabold text-gray-400 uppercase tracking-widest mb-6">LIRIK MARS PKS</h3>

            <p>
                Dalam Naungan Ridho Ilahi<br>
                Marilah Kita terus Berjuang<br>
                Dalam Bhineka Tunggal Ika<br>
                Merajut Harmoni Bangsa
            </p>

            <p>
                Dalam Semangat untuk Berkiprah<br>
                Menuju Cita cita yang Mulia<br>
                Bagai Cahaya dalam Kegelapan<br>
                Menyambut Datangnya Harapan
            </p>

            <div class="py-2">
                <span class="inline-block text-xs font-bold text-[#f37023] bg-orange-100 px-3 py-1 rounded-full uppercase tracking-wider mb-2 font-sans">Reff</span>
                <p class="font-bold text-gray-900">
                    Partai Keadilan Sejahtera<br>
                    Hadir untuk Membela Rakyat<br>
                    Menata Ibu Pertiwi<br>
                    Mencipta Peradaban Mulia
                </p>
                <p class="font-bold text-gray-900 mt-2">
                    Partai Keadilan Sejahtera<br>
                    Tak Lelah Terus Berjuang<br>
                    Dengan Jiwa Pancasila Menjayakan Negeri Kita
                </p>
            </div>

            <p>
                Dalam Naungan Ridho Ilahi<br>
                Marilah Kita terus Berjuang<br>
                Dalam Bhineka Tunggal Ika<br>
                Merajut Harmoni Bangsa
            </p>

            <p>
                Dalam Semangat untuk Berkiprah<br>
                Menuju Cita cita yang Mulia<br>
                Bagai Cahaya dalam Kegelapan<br>
                Menyambut Datangnya Harapan
            </p>

            <div class="py-2">
                <span class="inline-block text-xs font-bold text-[#f37023] bg-orange-100 px-3 py-1 rounded-full uppercase tracking-wider mb-2 font-sans">Reff</span>
                <p class="font-bold text-gray-900">
                    Partai Keadilan Sejahtera<br>
                    Hadir untuk Membela Rakyat<br>
                    Menata Ibu Pertiwi<br>
                    Mencipta Peradaban Mulia
                </p>
                <p class="font-bold text-gray-900 mt-2">
                    Partai Keadilan Sejahtera<br>
                    Tak Lelah terus Berjuang<br>
                    Dengan Jiwa Pancasila Menjayakan Negeri Kita
                </p>
            </div>

            <p class="font-extrabold text-base sm:text-lg text-[#f37023] pt-2">
                Membangun Indonesia Bersama<br>
                Partai Keadilan Sejahtera
            </p>
        </div>
    </article>

    {{-- HYMNE PKS --}}
    <article class="bg-white rounded-3xl p-8 sm:p-12 shadow-xl border border-gray-100 space-y-6 reveal-fade-up delay-1">
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 pb-6 border-b border-gray-100">
            <div>
                <span class="text-xs font-bold text-[#fdb913] uppercase tracking-wider block">Lagu Keheningan & Doa</span>
                <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 mt-1">HYMNE PKS</h2>
                <p class="text-xs sm:text-sm text-gray-500 italic mt-1">
                    Ciptaan: <strong>Mohamad Sohibul Iman dan Dwiki Darmawan</strong>
                </p>
            </div>
            <a href="/uploads/2025/09/HYMNEPKSORCHESTRA.mp3" download class="inline-flex items-center bg-gray-900 hover:bg-black text-white px-5 py-2.5 rounded-xl text-xs font-bold shadow-md hover:shadow-lg transition flex-shrink-0">
                <i class="fa-solid fa-download mr-2"></i> Unduh Audio Hymne
            </a>
        </div>

        {{-- Audio Player --}}
        <div class="bg-amber-50/80 p-4 rounded-2xl border border-amber-200">
            <p class="text-xs font-semibold text-gray-600 mb-2 flex items-center">
                <i class="fa-solid fa-volume-high text-amber-600 mr-2"></i> Pemutar Musik Hymne PKS (Orchestra Version)
            </p>
            <audio controls class="w-full">
                <source src="/uploads/2025/09/HYMNEPKSORCHESTRA.mp3" type="audio/mpeg">
                Browser Anda tidak mendukung pemutar audio.
            </audio>
        </div>

        {{-- Lirik Hymne Lengkap --}}
        <div class="bg-gray-50/80 p-8 rounded-2xl border border-gray-100 text-center space-y-4 text-sm sm:text-base text-gray-800 leading-relaxed font-serif">
            <h3 class="font-sans text-xs font-extrabold text-gray-400 uppercase tracking-widest mb-6">LIRIK HYMNE PKS</h3>

            <p>
                Keadilan<br>
                Kan terwujud<br>
                Dengan semangat pejuang bangun peradaban
            </p>

            <p>
                Al-Qur'an dan sunnah<br>
                Jadi pedoman<br>
                Tuk majukan bumi persada Indonesia
            </p>

            <div class="py-2">
                <span class="inline-block text-xs font-bold text-amber-600 bg-amber-100 px-3 py-1 rounded-full uppercase tracking-wider mb-2 font-sans">Reff</span>
                <p class="font-bold text-gray-900">
                    Partai Keadilan Sejahtera<br>
                    Harapan bagi kita bersama<br>
                    Lahirkan pemimpin adil sejati<br>
                    Wujudkan rakyat adil sejahtera
                </p>
            </div>

            <p>
                Pancasila<br>
                Panduan Bangsa<br>
                Falsafah di bumi pertiwi Indonesia
            </p>

            <p class="text-xs text-gray-500 italic font-sans">
                (Kembali Reff 2x)
            </p>

            <p class="font-extrabold text-base sm:text-lg text-amber-600 pt-2">
                Partai Keadilan Sejahtera
            </p>
        </div>
    </article>

</div>
@endsection
