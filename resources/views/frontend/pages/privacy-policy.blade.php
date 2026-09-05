@extends('layouts.frontend')

@section('title', 'Kebijakan Privasi - DPD PKS Ogan Ilir')
@section('meta_description', 'Kebijakan Privasi resmi Website DPD PKS Ogan Ilir yang menjelaskan pengelolaan dan perlindungan data pengunjung.')

@section('content')
{{-- HERO HEADER --}}
<div class="bg-gradient-to-r from-gray-900 to-gray-800 text-white py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <nav class="text-xs text-gray-400 mb-3 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <span class="text-[#fdb913]">Kebijakan Privasi</span>
        </nav>
        <h1 class="text-3xl sm:text-4xl font-extrabold tracking-tight">Kebijakan Privasi (Privacy Policy)</h1>
        <p class="text-sm text-gray-300 mt-2 font-light">
            Komitmen transparansi dan perlindungan privasi data setiap pengunjung situs resmi DPD PKS Ogan Ilir.
        </p>
    </div>
</div>

<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-14">
    <article class="bg-white rounded-3xl p-8 sm:p-12 shadow-xl border border-gray-100 reveal-fade-up space-y-8">
        
        {{-- META INFO DOKUMEN --}}
        <div class="border-b border-gray-100 pb-6 flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
            <div>
                <span class="text-xs font-bold text-[#f37023] uppercase tracking-wider block">Dokumen Resmi</span>
                <h2 class="text-xl sm:text-2xl font-extrabold text-gray-900 mt-1">Kebijakan Privasi Website</h2>
                <p class="text-xs text-gray-500 mt-1">Website Resmi DPD PKS Ogan Ilir (pksoganilir.com & oganilir.pks.id)</p>
            </div>
            <div class="bg-orange-50 text-[#f37023] px-4 py-2 rounded-xl text-xs font-bold border border-orange-200">
                Terbit: 15 September 2025
            </div>
        </div>

        {{-- 9 PASAL KEBIJAKAN PRIVASI --}}
        <div class="prose-content text-gray-700 text-sm sm:text-base leading-relaxed space-y-8">
            @if(!empty($page->content) && strlen(trim(strip_tags($page->content))) > 50)
                {!! $page->content !!}
            @else
                <section class="space-y-2">
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 flex items-center space-x-2">
                        <span class="w-7 h-7 rounded-lg bg-[#f37023] text-white inline-flex items-center justify-center text-xs font-bold mr-2">1</span>
                        <span>Pendahuluan</span>
                    </h3>
                    <p>
                        DPD Partai Keadilan Sejahtera (PKS) Ogan Ilir menghargai privasi setiap pengunjung website resmi kami di <strong>pksoganilir.com</strong> dan <strong>oganilir.pks.id</strong>. Kebijakan privasi ini menjelaskan bagaimana kami mengumpulkan, menggunakan, dan melindungi informasi pribadi Anda saat mengakses dan menggunakan layanan di website kami.
                    </p>
                    <p>
                        Dengan mengunjungi website ini, Anda menyetujui praktik yang dijelaskan dalam Kebijakan Privasi ini.
                    </p>
                </section>

                <section class="space-y-2">
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 flex items-center space-x-2">
                        <span class="w-7 h-7 rounded-lg bg-[#f37023] text-white inline-flex items-center justify-center text-xs font-bold mr-2">2</span>
                        <span>Informasi yang Kami Kumpulkan</span>
                    </h3>
                    <p>Kami dapat mengumpulkan informasi dari pengunjung, baik secara langsung maupun tidak langsung, termasuk:</p>
                    <ul class="list-disc list-inside space-y-1.5 pl-2">
                        <li><strong>Informasi pribadi:</strong> seperti nama, alamat email, nomor telepon/WhatsApp, dan data lain yang Anda berikan saat mengisi formulir kontak, pengaduan aspirasi, atau formulir pendaftaran.</li>
                        <li><strong>Informasi non-pribadi:</strong> seperti alamat IP, jenis perangkat, peramban (browser) yang digunakan, serta statistik kunjungan halaman.</li>
                    </ul>
                </section>

                <section class="space-y-2">
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 flex items-center space-x-2">
                        <span class="w-7 h-7 rounded-lg bg-[#f37023] text-white inline-flex items-center justify-center text-xs font-bold mr-2">3</span>
                        <span>Penggunaan Informasi</span>
                    </h3>
                    <p>Informasi yang kami kumpulkan digunakan untuk keperluan:</p>
                    <ul class="list-disc list-inside space-y-1.5 pl-2">
                        <li>Menyediakan informasi dan layanan terkait kegiatan DPD PKS Ogan Ilir.</li>
                        <li>Menjawab pertanyaan, masukan, kritik, atau saran yang dikirimkan melalui formulir aspirasi.</li>
                        <li>Mengirimkan informasi pembaruan program partai dan kegiatan sosial kemasyarakatan.</li>
                        <li>Meningkatkan kualitas konten serta keandalan layanan situs web.</li>
                    </ul>
                </section>

                <section class="space-y-2">
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 flex items-center space-x-2">
                        <span class="w-7 h-7 rounded-lg bg-[#f37023] text-white inline-flex items-center justify-center text-xs font-bold mr-2">4</span>
                        <span>Perlindungan Informasi</span>
                    </h3>
                    <p>
                        Kami berkomitmen menjaga keamanan informasi pribadi pengunjung. Website ini menggunakan langkah-langkah teknis dan administratif yang wajar untuk mencegah akses, pengubahan, atau pengungkapan tanpa izin.
                    </p>
                </section>

                <section class="space-y-2">
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 flex items-center space-x-2">
                        <span class="w-7 h-7 rounded-lg bg-[#f37023] text-white inline-flex items-center justify-center text-xs font-bold mr-2">5</span>
                        <span>Penggunaan Cookies</span>
                    </h3>
                    <p>
                        Website ini dapat menggunakan cookies untuk meningkatkan kenyamanan penjelajahan dan menyimpan preferensi sesi pengunjung. Anda dapat menonaktifkan cookies melalui pengaturan peramban Anda sewaktu-waktu.
                    </p>
                </section>

                <section class="space-y-2">
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 flex items-center space-x-2">
                        <span class="w-7 h-7 rounded-lg bg-[#f37023] text-white inline-flex items-center justify-center text-xs font-bold mr-2">6</span>
                        <span>Tautan ke Situs Pihak Ketiga</span>
                    </h3>
                    <p>
                        Website kami dapat memuat tautan ke situs eksternal yang tidak dikelola langsung oleh DPD PKS Ogan Ilir. Kami tidak bertanggung jawab atas isi maupun kebijakan privasi dari situs-situs pihak ketiga tersebut.
                    </p>
                </section>

                <section class="space-y-2">
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 flex items-center space-x-2">
                        <span class="w-7 h-7 rounded-lg bg-[#f37023] text-white inline-flex items-center justify-center text-xs font-bold mr-2">7</span>
                        <span>Hak Pengunjung</span>
                    </h3>
                    <p>
                        Anda memiliki hak untuk meminta akses, koreksi, atau penghapusan atas data pribadi yang pernah Anda kirimkan kepada kami melalui formulir kontak.
                    </p>
                </section>

                <section class="space-y-2">
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 flex items-center space-x-2">
                        <span class="w-7 h-7 rounded-lg bg-[#f37023] text-white inline-flex items-center justify-center text-xs font-bold mr-2">8</span>
                        <span>Perubahan Kebijakan Privasi</span>
                    </h3>
                    <p>
                        DPD PKS Ogan Ilir berhak memperbarui Kebijakan Privasi ini sewaktu-waktu. Setiap perubahan akan langsung dipublikasikan di halaman ini dengan tanggal pembaruan yang jelas.
                    </p>
                </section>

                <section class="space-y-2 bg-gray-50 p-6 rounded-2xl border border-gray-100">
                    <h3 class="text-lg sm:text-xl font-bold text-gray-900 flex items-center space-x-2">
                        <span class="w-7 h-7 rounded-lg bg-[#f37023] text-white inline-flex items-center justify-center text-xs font-bold mr-2">9</span>
                        <span>Kontak Kami</span>
                    </h3>
                    <p>Jika Anda memiliki pertanyaan mengenai Kebijakan Privasi ini, silakan hubungi kami:</p>
                    <div class="text-xs sm:text-sm space-y-1 text-gray-600 mt-2">
                        <p>📧 Email: <strong>{{ $siteSettings['contact_email'] ?? 'pksoganilir@gmail.com' }}</strong></p>
                        <p>🌐 Website: <strong>https://pksoganilir.com</strong> - <strong>https://oganilir.pks.id</strong></p>
                        <p>📍 Alamat: {{ $siteSettings['contact_address'] ?? 'Jl. Komperta Taman Indralaya Blok C No. 05 Kel. Indralaya Indah, Kab. Ogan Ilir, Sumatera Selatan' }}</p>
                    </div>
                </section>
            @endif
        </div>
    </article>
</div>
@endsection
