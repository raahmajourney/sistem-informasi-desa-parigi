@extends('layouts.app')

@section('content')
<section class="bg-white py-20 px-6 lg:px-16">
  <div class="max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Produk Unggulan</h2>

    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
      <!-- Kartu Produk -->
      <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
        <img src="/images/slider3.jpg" alt="Produk 1" class="w-full h-48 object-cover">

        <div class="p-6">
          <h3 class="text-lg font-semibold text-gray-800 mb-2">Judul Produk</h3>
          <p class="text-gray-600 text-sm mb-4">Deskripsi singkat produk ini akan muncul di sini.</p>
          <a href="#" target="_blank"
          class="inline-block px-4 py-2 bg-cyan-500 text-white text-sm rounded hover:bg-emerald-700 transition">
          Detail Produk
        </a>
        <a href="https://wa.me/6281234567890" target="_blank"
           class="inline-block px-4 py-2 bg-emerald-600 text-white text-sm rounded hover:bg-emerald-700 transition">
          Hubungi Penjual
        </a>
        </div>
      </div>

      <!-- Tambah beberapa contoh lainnya -->
      <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
        <img src="/images/slider3.jpg" alt="Produk 2" class="w-full h-48 object-cover">

        <div class="p-6">
          <h3 class="text-lg font-semibold text-gray-800 mb-2">Kerajinan Bambu</h3>
          <p class="text-gray-600 text-sm mb-4">Produk lokal dari warga Parigi berbahan bambu.</p>
          <a href="https://wa.me/6281234567890" target="_blank"
             class="inline-block px-4 py-2 bg-emerald-600 text-white text-sm rounded hover:bg-emerald-700 transition">
            Hubungi Penjual
          </a>
        </div>
      </div>

      <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
        <img src="/images/slider3.jpg" alt="Produk 3" class="w-full h-48 object-cover">

        <div class="p-6">
          <h3 class="text-lg font-semibold text-gray-800 mb-2">Kopi Parigi</h3>
          <p class="text-gray-600 text-sm mb-4">Kopi khas pegunungan Parigi, cita rasa alami dan harum.</p>
          <a href="https://wa.me/6281234567890" target="_blank"
             class="inline-block px-4 py-2 bg-emerald-600 text-white text-sm rounded hover:bg-emerald-700 transition">
            Hubungi Penjual
          </a>
        </div>
      </div>

    </div>
  </div>
</section>
@endsection
