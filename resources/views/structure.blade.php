@extends('layouts.app')

@section('content')
<section class="py-20 px-6 lg:px-16">
  <div class="max-w-6xl mx-auto">
    
    <!-- Foto -->
    <div class="flex justify-center">
      <div class="md:w-2/3 w-full">
        <div class="overflow-hidden  shadow-xl ">
          <img src="{{ asset('images/struktur.jpg') }}" alt="Struktur Pemerintahan Desa Parigi" class="w-full h-auto object-cover transition-transform duration-300 hover:scale-105">
        </div>
      </div>
    </div>

  </div>
</section>
@endsection
