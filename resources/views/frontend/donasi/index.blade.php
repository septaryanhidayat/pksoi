@extends('layouts.frontend')

@section('title', 'Donasi & Infaq Perjuangan Dakwah - DPD PKS Ogan Ilir')
@section('meta_description', 'Salurkan infaq dan donasi perjuangan dakwah untuk kemaslahatan masyarakat Kabupaten Ogan Ilir melalui rekening resmi DPD PKS Ogan Ilir.')

@section('content')
@php
    $bank1Name = $siteSettings['donation_bank_1_name'] ?? 'Bank Sumsel Babel Syariah';
    $bank1Code = $siteSettings['donation_bank_1_code'] ?? '120';
    $bank1Rek = trim($siteSettings['donation_bank_1_rekening'] ?? '');
    $bank1Holder = $siteSettings['donation_bank_1_holder'] ?? 'DPD PKS KABUPATEN OGAN ILIR';

    $bank2Name = $siteSettings['donation_bank_2_name'] ?? 'Bank Syariah Indonesia (BSI)';
    $bank2Code = $siteSettings['donation_bank_2_code'] ?? '451';
    $bank2Rek = trim($siteSettings['donation_bank_2_rekening'] ?? '');
    $bank2Holder = $siteSettings['donation_bank_2_holder'] ?? 'DPD PKS KABUPATEN OGAN ILIR';

    $confirmPhone = !empty($siteSettings['donation_confirm_phone']) ? $siteSettings['donation_confirm_phone'] : ($siteSettings['contact_phone'] ?? '082382336505');
    $cleanWa = preg_replace('/[^0-9]/', '', $confirmPhone);
    if (str_starts_with($cleanWa, '0')) {
        $cleanWa = '62' . substr($cleanWa, 1);
    }
    $confirmText = urlencode($siteSettings['donation_confirm_text'] ?? "Assalamu'alaikum Bendahara DPD PKS Ogan Ilir, saya telah menyalurkan donasi perjuangan dakwah.");
@endphp

{{-- HERO HEADER ELEGAN --}}
<div class="relative bg-gradient-to-br from-slate-950 via-[#111827] to-[#1f2937] text-white py-14 sm:py-20 overflow-hidden">
    {{-- Background Pattern --}}
    <div class="absolute inset-0 opacity-10 bg-[radial-gradient(#f37023_1px,transparent_1px)] [background-size:20px_20px] pointer-events-none"></div>
    <div class="absolute -top-24 -right-24 w-96 h-96 rounded-full bg-[#f37023]/15 blur-3xl pointer-events-none"></div>
    <div class="absolute -bottom-24 -left-24 w-96 h-96 rounded-full bg-amber-500/10 blur-3xl pointer-events-none"></div>

    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <nav class="text-xs text-gray-400 mb-4 flex items-center space-x-2">
            <a href="{{ route('home') }}" class="hover:text-white transition">Beranda</a>
            <span>/</span>
            <span class="text-[#fdb913] font-medium">Donasi PKS</span>
        </nav>
        <div class="max-w-3xl">
            <span class="inline-flex items-center px-3.5 py-1.5 rounded-full text-xs font-bold bg-[#f37023]/20 text-[#fdb913] border border-[#f37023]/30 mb-4">
                <i class="fa-solid fa-hand-holding-heart mr-2"></i> Infaq & Shadaqah Perjuangan
            </span>
            <h1 class="text-3xl sm:text-5xl font-black tracking-tight leading-tight">
                Donasi Perjuangan & <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#f37023] via-[#ff9b44] to-[#fdb913]">Pelayanan Umat</span>
            </h1>
            <p class="text-sm sm:text-base text-gray-300 mt-4 leading-relaxed font-light">
                Bersama DPD Partai Keadilan Sejahtera Kabupaten Ogan Ilir, mari bergotong royong menghadirkan advokasi, bantuan sosial, dan khidmat terbaik untuk seluruh masyarakat Ogan Ilir.
            </p>
        </div>
    </div>
</div>

<div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 -mt-8 relative z-20 pb-20 space-y-12">

    {{-- KUTIPAN AYAT INSPIRATIF --}}
    <div class="bg-white/95 backdrop-blur-md p-6 sm:p-8 rounded-3xl shadow-xl border border-gray-100 text-center reveal-fade-up">
        <p class="text-sm sm:text-base text-gray-800 italic font-medium leading-relaxed max-w-4xl mx-auto">
            "Perumpamaan orang-orang yang menafkahkan hartanya di jalan Allah adalah serupa dengan sebutir benih yang menumbuhkan tujuh bulir, pada tiap-tiap bulir seratus biji. Allah melipatgandakan bagi siapa yang Dia kehendaki."
        </p>
        <span class="block text-xs font-bold text-[#f37023] tracking-wider uppercase mt-3">— QS. Al-Baqarah: 261 —</span>
    </div>

    {{-- KARTU REKENING BANK & KONFIRMASI --}}
    <div class="space-y-6">
        <div class="text-center max-w-2xl mx-auto">
            <span class="text-xs font-extrabold text-[#f37023] uppercase tracking-wider block">Rekening Resmi</span>
            <h2 class="text-2xl sm:text-3xl font-black text-gray-900 tracking-tight mt-1">
                Penyaluran Donasi Resmi DPD PKS
            </h2>
            <p class="text-xs sm:text-sm text-gray-500 mt-1.5">
                Silakan salurkan infaq dan donasi perjuangan Anda melalui rekening perbankan resmi berikut:
            </p>
            <div class="w-16 h-1 bg-[#f37023] mx-auto rounded-full mt-3"></div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            
            {{-- KARTU 1: BANK SUMSEL BABEL SYARIAH (UTAMA) --}}
            <div class="bg-gradient-to-br from-white via-amber-50/30 to-amber-50/60 rounded-3xl p-7 sm:p-9 shadow-xl border-2 border-amber-300/80 flex flex-col justify-between space-y-6 relative overflow-hidden group hover:shadow-2xl transition duration-300 reveal-fade-up">
                {{-- Decorative badge --}}
                <div class="absolute -top-10 -right-10 w-36 h-36 rounded-full bg-amber-400/10 blur-2xl pointer-events-none"></div>
                
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-black tracking-wide uppercase bg-amber-500 text-white shadow-sm">
                            <i class="fa-solid fa-crown mr-1.5 text-xs"></i> Bank Utama Wilayah
                        </span>
                        <span class="text-xs font-mono font-bold text-amber-700 bg-amber-100/80 px-2.5 py-1 rounded-lg">
                            Kode: {{ $bank1Code }}
                        </span>
                    </div>

                    <div class="flex items-center space-x-4 mb-4">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-amber-500 to-amber-600 text-white flex items-center justify-center text-2xl shadow-lg shadow-amber-500/20 flex-shrink-0">
                            <i class="fa-solid fa-building-columns"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-black text-gray-900 leading-tight">{{ $bank1Name }}</h3>
                            <p class="text-xs text-amber-800 font-semibold mt-0.5">Mitra Utama Perbankan Daerah Sumsel Babel</p>
                        </div>
                    </div>

                    <div class="bg-white/90 backdrop-blur-sm p-4 sm:p-5 rounded-2xl border border-amber-200/80 shadow-inner mt-4 space-y-2">
                        <span class="text-[11px] text-gray-500 font-bold uppercase tracking-wider block">Nomor Rekening Donasi</span>
                        @if(!empty($bank1Rek))
                            <div class="flex items-center justify-between">
                                <span class="text-2xl sm:text-3xl font-black text-gray-900 font-mono tracking-wider select-all" id="rekBank1">{{ $bank1Rek }}</span>
                            </div>
                        @else
                            <div class="py-2">
                                <div class="inline-flex items-center px-3 py-1.5 rounded-xl bg-amber-100/80 text-amber-900 text-xs font-semibold border border-amber-200">
                                    <i class="fa-solid fa-clock-rotate-left mr-2 text-amber-700"></i>
                                    <span>Nomor rekening sedang dalam proses pembaruan resmi</span>
                                </div>
                                <p class="text-[11px] text-gray-500 mt-2">
                                    Silakan hubungi bendahara via WhatsApp untuk nomor rekening operasional terkini.
                                </p>
                            </div>
                        @endif
                        <p class="text-xs text-gray-700 pt-1 border-t border-gray-100">
                            a.n. <strong class="text-gray-900 font-black">{{ $bank1Holder }}</strong>
                        </p>
                    </div>
                </div>

                <div class="pt-2">
                    @if(!empty($bank1Rek))
                        <button onclick="copyToClipboard('{{ $bank1Rek }}', '{{ $bank1Name }}')" class="w-full bg-gradient-to-r from-amber-500 to-amber-600 hover:from-amber-600 hover:to-amber-700 text-white py-3.5 px-4 rounded-xl text-xs sm:text-sm font-bold shadow-lg shadow-amber-500/20 transition flex items-center justify-center space-x-2 cursor-pointer">
                            <i class="fa-regular fa-copy text-sm"></i>
                            <span>Salin Nomor Rekening</span>
                        </button>
                    @else
                        <a href="https://wa.me/{{ $cleanWa }}?text={{ $confirmText }}" target="_blank" class="w-full bg-amber-600 hover:bg-amber-700 text-white py-3.5 px-4 rounded-xl text-xs sm:text-sm font-bold shadow transition flex items-center justify-center space-x-2">
                            <i class="fa-brands fa-whatsapp text-base"></i>
                            <span>Konfirmasi Rekening via WhatsApp</span>
                        </a>
                    @endif
                </div>
            </div>

            {{-- KARTU 2: BANK SYARIAH INDONESIA (BSI) --}}
            <div class="bg-gradient-to-br from-white via-teal-50/20 to-teal-50/50 rounded-3xl p-7 sm:p-9 shadow-xl border border-teal-200/80 flex flex-col justify-between space-y-6 relative overflow-hidden group hover:shadow-2xl transition duration-300 reveal-fade-up delay-1">
                <div class="absolute -top-10 -right-10 w-36 h-36 rounded-full bg-teal-400/10 blur-2xl pointer-events-none"></div>
                
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-[11px] font-black tracking-wide uppercase bg-teal-600 text-white shadow-sm">
                            <i class="fa-solid fa-moon mr-1.5 text-xs"></i> Bank Syariah Nasional
                        </span>
                        <span class="text-xs font-mono font-bold text-teal-700 bg-teal-100/80 px-2.5 py-1 rounded-lg">
                            Kode: {{ $bank2Code }}
                        </span>
                    </div>

                    <div class="flex items-center space-x-4 mb-4">
                        <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-teal-600 to-teal-700 text-white flex items-center justify-center text-2xl shadow-lg shadow-teal-600/20 flex-shrink-0">
                            <i class="fa-solid fa-building-columns"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-black text-gray-900 leading-tight">{{ $bank2Name }}</h3>
                            <p class="text-xs text-teal-800 font-semibold mt-0.5">Jaringan Perbankan Syariah Terbesar Indonesia</p>
                        </div>
                    </div>

                    <div class="bg-white/90 backdrop-blur-sm p-4 sm:p-5 rounded-2xl border border-teal-200/80 shadow-inner mt-4 space-y-2">
                        <span class="text-[11px] text-gray-500 font-bold uppercase tracking-wider block">Nomor Rekening Donasi</span>
                        @if(!empty($bank2Rek))
                            <div class="flex items-center justify-between">
                                <span class="text-2xl sm:text-3xl font-black text-gray-900 font-mono tracking-wider select-all" id="rekBank2">{{ $bank2Rek }}</span>
                            </div>
                        @else
                            <div class="py-2">
                                <div class="inline-flex items-center px-3 py-1.5 rounded-xl bg-teal-100/80 text-teal-900 text-xs font-semibold border border-teal-200">
                                    <i class="fa-solid fa-clock-rotate-left mr-2 text-teal-700"></i>
                                    <span>Nomor rekening sedang dalam proses pembaruan resmi</span>
                                </div>
                                <p class="text-[11px] text-gray-500 mt-2">
                                    Silakan konfirmasi ke bendahara untuk verifikasi rekening BSI.
                                </p>
                            </div>
                        @endif
                        <p class="text-xs text-gray-700 pt-1 border-t border-gray-100">
                            a.n. <strong class="text-gray-900 font-black">{{ $bank2Holder }}</strong>
                        </p>
                    </div>
                </div>

                <div class="pt-2">
                    @if(!empty($bank2Rek))
                        <button onclick="copyToClipboard('{{ $bank2Rek }}', '{{ $bank2Name }}')" class="w-full bg-gradient-to-r from-teal-600 to-teal-700 hover:from-teal-700 hover:to-teal-800 text-white py-3.5 px-4 rounded-xl text-xs sm:text-sm font-bold shadow-lg shadow-teal-600/20 transition flex items-center justify-center space-x-2 cursor-pointer">
                            <i class="fa-regular fa-copy text-sm"></i>
                            <span>Salin Nomor Rekening</span>
                        </button>
                    @else
                        <a href="https://wa.me/{{ $cleanWa }}?text={{ $confirmText }}" target="_blank" class="w-full bg-teal-700 hover:bg-teal-800 text-white py-3.5 px-4 rounded-xl text-xs sm:text-sm font-bold shadow transition flex items-center justify-center space-x-2">
                            <i class="fa-brands fa-whatsapp text-base"></i>
                            <span>Konfirmasi Rekening via WhatsApp</span>
                        </a>
                    @endif
                </div>
            </div>

        </div>
    </div>

    {{-- KARTU KONFIRMASI WHATSAPP & PANDUAN --}}
    <div class="bg-gradient-to-br from-emerald-600 to-green-700 text-white rounded-3xl p-8 sm:p-10 shadow-2xl relative overflow-hidden reveal-fade-up">
        <div class="absolute -bottom-16 -right-16 w-64 h-64 rounded-full bg-white/10 blur-2xl pointer-events-none"></div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-center relative z-10">
            <div class="md:col-span-2 space-y-3">
                <div class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold bg-white/20 text-white border border-white/30">
                    <i class="fa-brands fa-whatsapp mr-1.5 text-sm"></i> Layanan Konfirmasi Cepat
                </div>
                <h3 class="text-2xl sm:text-3xl font-black tracking-tight">
                    Sudah Menyalurkan Donasi? Konfirmasi Sekarang
                </h3>
                <p class="text-xs sm:text-sm text-emerald-100 leading-relaxed font-light">
                    Kirimkan bukti transfer atau slip mutasi Anda ke nomor WhatsApp resmi DPD PKS Ogan Ilir agar donasi Anda dapat diverifikasi, dicatat secara transparan, dan disalurkan sesuai amanah.
                </p>
            </div>
            <div class="flex flex-col space-y-3">
                <a href="https://wa.me/{{ $cleanWa }}?text={{ $confirmText }}" target="_blank" class="w-full bg-white hover:bg-gray-100 text-emerald-700 font-extrabold text-xs sm:text-sm py-4 px-6 rounded-2xl shadow-xl transition transform hover:scale-105 flex items-center justify-center space-x-2 text-center">
                    <i class="fa-brands fa-whatsapp text-lg"></i>
                    <span>Kirim Bukti Transfer ({{ $confirmPhone }})</span>
                </a>
                <span class="text-[11px] text-emerald-200 text-center font-medium">Layanan resmi DPD PKS Ogan Ilir</span>
            </div>
        </div>
    </div>

    {{-- 3 LANGKAH MUDAH BERDONASI --}}
    <div class="bg-white p-8 sm:p-10 rounded-3xl shadow-sm border border-gray-100 reveal-fade-up space-y-8">
        <div class="text-center max-w-xl mx-auto">
            <h3 class="text-xl sm:text-2xl font-black text-gray-900">3 Langkah Mudah Menyalurkan Donasi</h3>
            <p class="text-xs sm:text-sm text-gray-500 mt-1">Panduan singkat proses pengiriman dan pelaporan infaq dakwah</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="p-6 rounded-2xl bg-gray-50 border border-gray-100 text-center space-y-3 hover:bg-orange-50/50 hover:border-orange-200 transition">
                <div class="w-12 h-12 rounded-xl bg-orange-100 text-[#f37023] font-black text-lg flex items-center justify-center mx-auto shadow-sm">
                    1
                </div>
                <h4 class="font-extrabold text-sm text-gray-900">Transfer Donasi</h4>
                <p class="text-xs text-gray-500 leading-relaxed">
                    Kirimkan dana infaq melalui Bank Sumsel Babel Syariah atau Bank Syariah Indonesia (BSI).
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-gray-50 border border-gray-100 text-center space-y-3 hover:bg-orange-50/50 hover:border-orange-200 transition">
                <div class="w-12 h-12 rounded-xl bg-orange-100 text-[#f37023] font-black text-lg flex items-center justify-center mx-auto shadow-sm">
                    2
                </div>
                <h4 class="font-extrabold text-sm text-gray-900">Simpan Bukti Transfer</h4>
                <p class="text-xs text-gray-500 leading-relaxed">
                    Ambil tangkapan layar (screenshot) struk ATM, mobile banking, atau bukti mutasi perbankan Anda.
                </p>
            </div>

            <div class="p-6 rounded-2xl bg-gray-50 border border-gray-100 text-center space-y-3 hover:bg-orange-50/50 hover:border-orange-200 transition">
                <div class="w-12 h-12 rounded-xl bg-orange-100 text-[#f37023] font-black text-lg flex items-center justify-center mx-auto shadow-sm">
                    3
                </div>
                <h4 class="font-extrabold text-sm text-gray-900">Konfirmasi WhatsApp</h4>
                <p class="text-xs text-gray-500 leading-relaxed">
                    Kirimkan bukti ke WhatsApp resmi DPD PKS Ogan Ilir untuk pencatatan buku kas secara akuntabel.
                </p>
            </div>
        </div>
    </div>

    {{-- KETENTUAN LEGALITAS & AKUNTABILITAS UU PARPOL --}}
    <div class="bg-amber-50/70 border-l-4 border-[#f37023] p-6 sm:p-8 rounded-3xl shadow-sm text-xs sm:text-sm text-gray-700 space-y-3 reveal-fade-up">
        <h4 class="font-extrabold text-gray-900 flex items-center text-sm sm:text-base">
            <i class="fa-solid fa-scale-balanced mr-2.5 text-[#f37023] text-lg"></i>
            <span>Transparansi & Ketentuan Legal Donasi Partai Politik</span>
        </h4>
        <p class="leading-relaxed text-gray-600">
            Pengelolaan donasi dan infaq perjuangan bagi Partai Keadilan Sejahtera diatur secara ketat berdasarkan <strong>Undang-Undang Republik Indonesia Nomor 2 Tahun 2011 tentang Partai Politik (Pasal 35)</strong>. 
        </p>
        <ul class="list-disc list-inside space-y-1 text-gray-600 text-xs">
            <li>Sumbangan yang sah menurut hukum dapat berupa uang, barang, dan/atau jasa.</li>
            <li>Sumbangan dari perseorangan yang bukan anggota dibatasi paling banyak sesuai pagu regulasi perorangan per tahun anggaran.</li>
            <li>Sumbangan dari perusahaan/badan usaha non-pemerintah dibatasi sesuai regulasi badan hukum per tahun anggaran.</li>
            <li>Seluruh laporan penerimaan dan pengeluaran dana partai diaudit secara periodik oleh Kantor Akuntan Publik (KAP) independen demi menjamin integritas dan kepatuhan hukum.</li>
        </ul>
    </div>

</div>

{{-- TOAST NOTIFIKASI SALIN REKENING --}}
<div id="copyToast" class="fixed bottom-6 right-6 bg-gray-900 text-white px-5 py-3.5 rounded-2xl shadow-2xl text-xs font-semibold flex items-center space-x-3 transform translate-y-24 opacity-0 transition duration-300 z-50">
    <div class="w-7 h-7 rounded-full bg-emerald-500 text-white flex items-center justify-center">
        <i class="fa-solid fa-check text-xs"></i>
    </div>
    <span id="copyToastText">Nomor rekening berhasil disalin!</span>
</div>

<script>
    function copyToClipboard(text, bankName) {
        if (!navigator.clipboard) {
            const temp = document.createElement('textarea');
            temp.value = text;
            document.body.appendChild(temp);
            temp.select();
            document.execCommand('copy');
            document.body.removeChild(temp);
        } else {
            navigator.clipboard.writeText(text);
        }
        
        const toast = document.getElementById('copyToast');
        const toastText = document.getElementById('copyToastText');
        if (toast && toastText) {
            toastText.textContent = `Nomor rekening ${bankName} berhasil disalin!`;
            toast.classList.remove('translate-y-24', 'opacity-0');
            setTimeout(() => {
                toast.classList.add('translate-y-24', 'opacity-0');
            }, 3000);
        }
    }
</script>
@endsection
