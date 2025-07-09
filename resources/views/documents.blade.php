@extends('layouts.app')

@section('content')
<section class="bg-white py-20 px-6 lg:px-16">
  <div class="max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Dokumen Desa</h2>

    <div class="grid gap-6">
      <!-- Kartu Dokumen -->
      <div class="bg-gray-50 rounded-xl shadow-sm p-6 hover:shadow-md transition">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">Peraturan Desa No. 01 Tahun 2025</h3>
        <p class="text-gray-600 text-sm mb-4">Dokumen ini berisi tentang peraturan penggunaan lahan dan pengelolaan lingkungan di Desa Parigi.</p>
        <a href="/storage/documents/perdes-01-2025.pdf" target="_blank"
           class="inline-block px-4 py-2  bg-cyan-500 text-white text-sm rounded hover:bg-emerald-700 transition">
          Unduh Dokumen
        </a>
      </div>

      <div class="bg-gray-50 rounded-xl shadow-sm p-6 hover:shadow-md transition">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">Laporan Keuangan Semester 1</h3>
        <p class="text-gray-600 text-sm mb-4">Laporan realisasi anggaran dan belanja desa Parigi periode Januari - Juni 2025.</p>
        <a href="/storage/documents/laporan-keuangan-s1.pdf" target="_blank"
           class="inline-block px-4 py-2  bg-cyan-500 text-white text-sm rounded hover:bg-emerald-700 transition">
          Unduh Dokumen
        </a>
      </div>

      <div class="bg-gray-50 rounded-xl shadow-sm p-6 hover:shadow-md transition">
        <h3 class="text-xl font-semibold text-gray-800 mb-2">Rencana Pembangunan Desa</h3>
        <p class="text-gray-600 text-sm mb-4">Dokumen perencanaan pembangunan jangka menengah desa (RPJMDes) tahun 2025–2030.</p>
        <a href="/storage/documents/rpjmdes-2025.pdf" target="_blank"
           class="inline-block px-4 py-2  bg-cyan-500 text-white text-sm rounded hover:bg-emerald-700 transition">
          Unduh Dokumen
        </a>
      </div>
    </div>
  </div>
</section>
@endsection
