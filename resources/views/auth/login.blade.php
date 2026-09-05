<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator - DPD PKS Ogan Ilir</title>
    <link rel="icon" type="image/webp" href="/uploads/2025/09/cropped-logo-thumbnail.webp">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

    <div class="max-w-md w-full bg-white rounded-3xl shadow-2xl p-8 sm:p-10 border border-gray-100">
        {{-- Brand Logo --}}
        <div class="text-center mb-8">
            <a href="{{ route('home') }}" class="inline-block group">
                <img src="/uploads/2023/08/logo-pks-ogan-ilir.webp" alt="Logo PKS Ogan Ilir" class="h-16 w-auto mx-auto object-contain transform group-hover:scale-105 transition" onerror="this.src='/uploads/2025/09/logo-thumbnail.webp'">
            </a>
            <h1 class="text-2xl font-extrabold text-gray-900 mt-4 tracking-tight">Panel Administrator</h1>
            <p class="text-xs text-gray-500 mt-1">DPD PKS Kabupaten Ogan Ilir</p>
        </div>

        {{-- Error Alert --}}
        @if ($errors->any())
            <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r-xl">
                <div class="flex items-center">
                    <i class="fa-solid fa-triangle-exclamation text-red-500 mr-2 text-sm"></i>
                    <p class="text-xs font-semibold text-red-700">{{ $errors->first() }}</p>
                </div>
            </div>
        @endif

        {{-- Login Form --}}
        <form action="{{ route('login.post') }}" method="POST" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Email Administrator</label>
                <div class="relative">
                    <input type="email" name="email" id="email" required value="{{ old('email') }}" placeholder="admin@pksoganilir.com" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl pl-10 pr-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">
                    <i class="fa-solid fa-envelope absolute left-3.5 top-3.5 text-gray-400 text-xs"></i>
                </div>
            </div>

            <div>
                <label for="password" class="block text-xs font-bold text-gray-700 uppercase tracking-wider mb-1">Password</label>
                <div class="relative">
                    <input type="password" name="password" id="password" required placeholder="••••••••" class="w-full bg-gray-50 text-xs text-gray-800 rounded-xl pl-10 pr-4 py-3 border border-gray-200 focus:outline-none focus:ring-2 focus:ring-[#f37023]">
                    <i class="fa-solid fa-lock absolute left-3.5 top-3.5 text-gray-400 text-xs"></i>
                </div>
            </div>

            <div class="flex items-center justify-between text-xs py-1">
                <label class="flex items-center text-gray-600 cursor-pointer">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-[#f37023] focus:ring-[#f37023] mr-2">
                    <span>Ingat saya</span>
                </label>
            </div>

            <button type="submit" class="w-full bg-[#f37023] hover:bg-[#d85c14] text-white py-3.5 rounded-xl font-bold text-xs uppercase tracking-wider shadow-lg hover:shadow-xl transition flex items-center justify-center space-x-2">
                <i class="fa-solid fa-right-to-bracket"></i>
                <span>Masuk ke Panel Admin</span>
            </button>
        </form>

        <div class="mt-8 pt-6 border-t border-gray-100 text-center text-xs text-gray-400">
            <a href="{{ route('home') }}" class="hover:text-[#f37023] transition flex items-center justify-center">
                <i class="fa-solid fa-arrow-left mr-1.5"></i>
                <span>Kembali ke Website Utama</span>
            </a>
        </div>
    </div>

</body>
</html>
