@extends('layouts.app')

@section('content')

<!-- Hero Section Produk -->
<div class="relative isolate px-6 pt-14 lg:px-8 bg-cover bg-center bg-no-repeat h-[60vh]"
     style="background-image: url('/images/slider3.jpg');">
  <div class="absolute inset-0 bg-black/40 z-10"></div>
  <div class="relative z-20 flex flex-col justify-center items-center h-full text-center text-white">
    <h1 class="text-4xl md:text-5xl font-bold drop-shadow-md">Produk Desa Parigi</h1>
    <p class="mt-4 text-lg">Hasil karya warga Parigi untuk negeri</p>
  </div>
</div>



<section class="bg-white py-20 px-6 lg:px-16">
  <div class="max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Produk Unggulan</h2>

    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">

      <!-- Kartu Produk -->
    @forelse ($products as $product)
      <div class="bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition">
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->title }}" class="w-full h-48 object-cover">

        <div class="p-6">
          <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $product->title }}</h3>
          <p class="text-gray-600 text-sm mb-4 line-clamp-3">
          {{ Str::limit($product->description, 100) }}
          </p>
          <a href="{{ route('products.detail', $product->id) }}"
            class="text-sm text-blue-600 hover:underline">Lihat Detail</a>

          {{-- Harga --}}
        <p class="text-black font-semibold flex items-center gap-2 mb-2">
          <i class="fas fa-money-bill-wave text-amber-500"></i>
          {{ 'Rp'. number_format($product->price, 0, ',', '.') }}
        </p>

          
          @if ($product->contact_link)
            <a href="{{ $product->contact_link }}" target="_blank"
              class="inline-block px-4 py-2 bg-sky-600 text-white text-sm rounded hover:bg-emerald-700 transition">
              Hubungi Penjual
            </a>
          @endif
        </div>
      </div>
    @empty
      <p class="text-center col-span-3 text-gray-500">Belum ada produk ditambahkan.</p>
    @endforelse
  </div>


    </div>
  </div>
</section>
@endsection
