@extends('layouts.app')

@section('content')
<section class="bg-white py-16 px-6 lg:px-16">
  <div class="max-w-5xl mx-auto">
    <div class="grid md:grid-cols-2 gap-10">
      
      <!-- Gambar Produk -->
      <div>
        <img src="{{ asset('storage/' . $product->image) }}"
             alt="{{ $product->title }}"
             class="w-full h-auto rounded-xl shadow-md object-cover">
      </div>

      <!-- Detail Produk -->
      <div>
        <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $product->title }}</h1>

        <p class="text-gray-600 mb-6 whitespace-pre-line">{{ $product->description }}</p>

        <div class="text-xl text-black font-semibold flex items-center gap-2 mb-6">
          <i class="fas fa-money-bill-wave text-amber-500"></i>
          {{ 'Rp' . number_format($product->price, 0, ',', '.') }}
        </div>

        @if ($product->contact_link)
          <a href="{{ $product->contact_link }}" target="_blank"
             class="inline-block px-5 py-3 bg-sky-600 text-white rounded-lg shadow hover:bg-emerald-700 transition">
            <i class="fas fa-phone-alt mr-2"></i> Hubungi Penjual
          </a>
        @endif
      </div>
    </div>
  </div>
</section>
@endsection
