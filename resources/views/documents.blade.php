@extends('layouts.app')

@section('content')
<section class="bg-gray-100 py-16 px-6 lg:px-16">
    <div class="max-w-5xl mx-auto">
        <!-- Judul Halaman -->
        <h2 class="text-3xl font-bold text-gray-800 mb-10 text-center">
            <i class="fas fa-file-alt text-sky-600 mr-2"></i> Layanan Dokumen Desa
        </h2>

        <!-- List Dokumen -->
        <div class="grid gap-6">
            @forelse ($documents as $document)
                @if ($document->form_link)
                <div class="bg-white rounded-xl shadow p-6 transition hover:shadow-md">
                    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-3 gap-3">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900">{{ $document->title }}</h3>
                            <p class="text-sm text-gray-600 mt-1">{{ $document->description }}</p>
                        </div>
                        <div>
                            <a href="{{ $document->form_link }}" 
                               target="_blank"
                               class="inline-flex items-center px-4 py-2 bg-sky-600 hover:bg-sky-700 text-white text-sm font-medium rounded-lg transition">
                                <i class="fas fa-link mr-2"></i> Buka Form
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            @empty
                <div class="text-center text-gray-500 py-10">
                    <i class="fas fa-folder-open text-3xl mb-3"></i>
                    <p>Belum ada dokumen tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>
@endsection
