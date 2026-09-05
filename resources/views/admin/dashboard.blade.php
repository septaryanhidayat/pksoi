@extends('layouts.admin')

@section('title', 'Dashboard')
@section('header_title', 'Dashboard Ringkasan Website')

@section('content')
<div class="space-y-6">
    
    {{-- STATS CARDS --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center space-x-4">
            <div class="w-12 h-12 rounded-2xl bg-orange-100 text-[#f37023] flex items-center justify-center text-xl">
                <i class="fa-solid fa-newspaper"></i>
            </div>
            <div>
                <span class="text-xs font-medium text-gray-400 block">Total Berita & Artikel</span>
                <span class="text-2xl font-extrabold text-gray-900">{{ number_format($stats['total_posts']) }}</span>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center space-x-4">
            <div class="w-12 h-12 rounded-2xl bg-blue-100 text-blue-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-eye"></i>
            </div>
            <div>
                <span class="text-xs font-medium text-gray-400 block">Total Pembaca (Views)</span>
                <span class="text-2xl font-extrabold text-gray-900">{{ number_format($stats['total_views']) }}</span>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center space-x-4">
            <div class="w-12 h-12 rounded-2xl bg-emerald-100 text-emerald-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-inbox"></i>
            </div>
            <div>
                <span class="text-xs font-medium text-gray-400 block">Kotak Aspirasi Masuk</span>
                <span class="text-2xl font-extrabold text-gray-900">{{ number_format($stats['total_feedbacks']) }}</span>
            </div>
        </div>

        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 flex items-center space-x-4">
            <div class="w-12 h-12 rounded-2xl bg-purple-100 text-purple-600 flex items-center justify-center text-xl">
                <i class="fa-solid fa-download"></i>
            </div>
            <div>
                <span class="text-xs font-medium text-gray-400 block">File Download</span>
                <span class="text-2xl font-extrabold text-gray-900">{{ number_format($stats['total_downloads']) }}</span>
            </div>
        </div>
    </div>

    {{-- RECENT POSTS & FEEDBACKS GRID --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        
        {{-- Recent Posts --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 space-y-4">
            <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                <h2 class="font-bold text-sm text-gray-900">Artikel Terbaru</h2>
                <a href="{{ route('admin.posts.index') }}" class="text-xs font-semibold text-[#f37023] hover:underline">Semua Artikel &rarr;</a>
            </div>

            <div class="divide-y divide-gray-50 text-xs">
                @foreach($recentPosts as $p)
                    <div class="py-3 flex items-center justify-between">
                        <div class="flex items-center space-x-3 max-w-[75%]">
                            <div class="w-8 h-8 rounded-lg bg-gray-100 overflow-hidden flex-shrink-0">
                                @if($p->featured_image)
                                    <img src="{{ $p->featured_image }}" alt="" class="w-full h-full object-cover">
                                @else
                                    <i class="fa-solid fa-image text-gray-300 p-2"></i>
                                @endif
                            </div>
                            <span class="font-semibold text-gray-800 truncate">{{ $p->title }}</span>
                        </div>
                        <span class="text-[11px] text-gray-400">{{ $p->published_at ? $p->published_at->format('d/m/Y') : '-' }}</span>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Recent Feedbacks --}}
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-gray-100 space-y-4">
            <div class="flex justify-between items-center pb-3 border-b border-gray-100">
                <h2 class="font-bold text-sm text-gray-900">Aspirasi / Masukan Terbaru</h2>
                <a href="{{ route('admin.feedbacks.index') }}" class="text-xs font-semibold text-[#f37023] hover:underline">Lihat Semua &rarr;</a>
            </div>

            <div class="divide-y divide-gray-50 text-xs">
                @forelse($recentFeedbacks as $f)
                    <div class="py-3 space-y-1">
                        <div class="flex justify-between items-center">
                            <span class="font-bold text-gray-900">{{ $f->name }}</span>
                            <span class="text-[10px] text-gray-400">{{ $f->created_at->diffForHumans() }}</span>
                        </div>
                        <p class="text-gray-500 line-clamp-1 italic">"{{ $f->message }}"</p>
                    </div>
                @empty
                    <p class="text-gray-400 py-4 text-center">Belum ada aspirasi masuk.</p>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection
