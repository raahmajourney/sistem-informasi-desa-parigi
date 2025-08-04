@extends('layouts.app')

@section('content')
<section class="bg-white py-16 px-4 lg:px-16">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">
            Galeri Desa
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @forelse ($galleries as $item)
                <div class="bg-gray-50  overflow-hidden shadow hover:shadow-md transition">
                    @if ($item->type === 'image' && $item->file_path)
                        <img src="{{ asset('storage/' . $item->file_path) }}"
                             alt="{{ $item->title ?? 'Gambar Galeri' }}"
                             class="w-full h-60 object-cover">
                    @elseif ($item->type === 'video')
                        @if ($item->file_path)
                            <video controls class="w-full h-60 object-cover bg-black">
                                <source src="{{ asset('storage/' . $item->file_path) }}" type="video/mp4">
                                Browser Anda tidak mendukung pemutar video.
                            </video>

                        @elseif ($item->video_url)
                        @php
                            $youtubeId = null;
                            preg_match('/(?:youtu\.be\/|v=)([^\&\?\/]+)/', $item->video_url, $matches);
                            $youtubeId = $matches[1] ?? null;
                        @endphp

                        @if ($youtubeId)
                            <div class="relative w-full h-60 bg-black">
                                <iframe 
                                    class="w-full h-full"
                                    src="https://www.youtube.com/embed/{{ $youtubeId }}"
                                    frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen>
                                </iframe>
                            </div>
                        @else
                            <p class="text-sm text-red-500 px-4 py-2">Link video tidak valid</p>
                        @endif
                    @endif


                    @endif

                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800 truncate">
                            {{ $item->title ?? 'Tanpa Judul' }}
                        </h3>
                    </div>
                </div>
            @empty
                <p class="text-center col-span-3 text-gray-500">Belum ada data galeri.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
