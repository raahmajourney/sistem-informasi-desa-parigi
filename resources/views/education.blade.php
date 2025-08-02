@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-10">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Materi Edukasi</h1>

    <div class="grid grid-cols-1 gap-6">
        @forelse ($educations as $item)
            <div class="bg-white shadow-md rounded-xl p-6 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-semibold text-gray-700">{{ $item->title }}</h2>
                    <p class="text-sm text-gray-500">{{ $item->description }}</p>
                </div>
                <a href="{{ asset('storage/' . $item->file) }}" target="_blank" class="bg-sky-600 hover:bg-sky-700 text-white px-4 py-2 rounded-md text-sm transition">
                    Unduh PDF
                </a>
            </div>
        @empty
            <p class="text-gray-500">Belum ada materi edukasi tersedia.</p>
        @endforelse
    </div>
</div>
@endsection
