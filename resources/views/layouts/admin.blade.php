<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel') - DPD PKS Ogan Ilir</title>
    <link rel="icon" type="image/webp" href="/uploads/2025/09/cropped-logo-thumbnail.webp">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans text-gray-800 flex min-h-screen">

    {{-- SIDEBAR --}}
    <aside class="w-64 bg-[#18181b] text-gray-300 flex flex-col justify-between flex-shrink-0 hidden md:flex border-r border-gray-800">
        <div>
            {{-- Brand Logo --}}
            <div class="h-20 flex items-center px-6 border-b border-gray-800">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3">
                    <img src="/uploads/2023/08/logo-pks-ogan-ilir.webp" alt="Logo" class="h-9 w-auto" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
                    <span class="font-extrabold text-white text-base tracking-tight">Admin PKS OI</span>
                </a>
            </div>

            {{-- Nav Links --}}
            <nav class="p-4 space-y-1.5 text-xs font-medium">
                <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-[#f37023] text-white font-bold' : 'hover:bg-gray-800 text-gray-300' }}">
                    <i class="fa-solid fa-gauge-high text-sm w-4"></i>
                    <span>Dashboard Ringkasan</span>
                </a>

                <a href="{{ route('admin.posts.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.posts*') ? 'bg-[#f37023] text-white font-bold' : 'hover:bg-gray-800 text-gray-300' }}">
                    <i class="fa-solid fa-newspaper text-sm w-4"></i>
                    <span>Kelola Berita & Artikel</span>
                </a>

                <a href="{{ route('admin.feedbacks.index') }}" class="flex items-center justify-between px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.feedbacks*') ? 'bg-[#f37023] text-white font-bold' : 'hover:bg-gray-800 text-gray-300' }}">
                    <div class="flex items-center space-x-3">
                        <i class="fa-solid fa-inbox text-sm w-4"></i>
                        <span>Kotak Aspirasi / Kritik</span>
                    </div>
                    @php $unread = \App\Models\Feedback::where('status', 'unread')->count(); @endphp
                    @if($unread > 0)
                        <span class="bg-red-500 text-white text-[10px] px-2 py-0.5 rounded-full font-bold">
                            {{ $unread }}
                        </span>
                    @endif
                </a>

                <a href="{{ route('admin.settings.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.settings*') ? 'bg-[#f37023] text-white font-bold' : 'hover:bg-gray-800 text-gray-300' }}">
                    <i class="fa-solid fa-sliders text-sm w-4"></i>
                    <span>Pengaturan Website</span>
                </a>

                <div class="pt-4 border-t border-gray-800 mt-4">
                    <a href="{{ route('home') }}" target="_blank" class="flex items-center space-x-3 px-4 py-3 rounded-xl hover:bg-gray-800 text-gray-400 hover:text-white transition">
                        <i class="fa-solid fa-arrow-up-right-from-square text-sm w-4"></i>
                        <span>Lihat Website Utama</span>
                    </a>
                </div>
            </nav>
        </div>

        {{-- User info & Logout --}}
        <div class="p-4 border-t border-gray-800">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-9 h-9 rounded-full bg-[#f37023] text-white flex items-center justify-center font-bold text-xs">
                        {{ substr(auth()->user()->name ?? 'A', 0, 1) }}
                    </div>
                    <div>
                        <span class="block text-xs font-bold text-white">{{ auth()->user()->name ?? 'Admin' }}</span>
                        <span class="block text-[10px] text-gray-400 truncate max-w-[120px]">{{ auth()->user()->email }}</span>
                    </div>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="text-gray-400 hover:text-red-400 p-2 text-sm transition" title="Logout">
                        <i class="fa-solid fa-right-from-bracket"></i>
                    </button>
                </form>
            </div>
        </div>
    </aside>

    {{-- MAIN CONTENT AREA --}}
    <div class="flex-grow flex flex-col min-w-0">
        {{-- Top Bar --}}
        <header class="bg-white border-b border-gray-200 h-16 flex items-center justify-between px-6 z-10">
            <div class="flex items-center space-x-4">
                <h1 class="font-bold text-base text-gray-800">@yield('header_title', 'Panel Kontrol')</h1>
            </div>
            <div class="flex items-center space-x-4">
                <a href="{{ route('home') }}" target="_blank" class="text-xs text-gray-500 hover:text-[#f37023] flex items-center space-x-1">
                    <i class="fa-solid fa-globe"></i>
                    <span>Kunjungi Situs</span>
                </a>
            </div>
        </header>

        {{-- Alerts --}}
        @if(session('success'))
            <div class="mx-6 mt-4 p-4 bg-green-50 border-l-4 border-green-500 rounded-r-xl shadow-sm flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <i class="fa-solid fa-circle-check text-green-500"></i>
                    <p class="text-xs font-medium text-green-800">{{ session('success') }}</p>
                </div>
                <button onclick="this.parentElement.remove()" class="text-green-600 hover:text-green-800 text-xs">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        @endif

        {{-- Main Page Body --}}
        <main class="p-6 flex-grow">
            @yield('content')
        </main>
    </div>

</body>
</html>
