@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto px-6 py-10">
    <h1 class="text-3xl font-bold text-gray-800 mb-8">Materi Edukasi</h1>

    <div class="grid grid-cols-1 gap-6">
        <!-- Item 1 -->
        <div class="bg-white shadow-md rounded-xl p-6 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold text-gray-700">Panduan Pertanian Organik</h2>
                <p class="text-sm text-gray-500">Dokumen PDF mengenai cara bertani secara organik.</p>
            </div>
            <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm transition">
                Unduh PDF
            </a>
        </div>

        <!-- Item 2 -->
        <div class="bg-white shadow-md rounded-xl p-6 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold text-gray-700">Pencegahan DBD di Lingkungan Desa</h2>
                <p class="text-sm text-gray-500">Edukasi tentang cara pencegahan Demam Berdarah.</p>
            </div>
            <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm transition">
                Unduh PDF
            </a>
        </div>

        <!-- Item 3 -->
        <div class="bg-white shadow-md rounded-xl p-6 flex items-center justify-between">
            <div>
                <h2 class="text-lg font-semibold text-gray-700">Manfaat dan Cara Pengelolaan Bank Sampah</h2>
                <p class="text-sm text-gray-500">Informasi mengenai pentingnya bank sampah di desa.</p>
            </div>
            <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm transition">
                Unduh PDF
            </a>
        </div>
    </div>
</div>
@endsection
