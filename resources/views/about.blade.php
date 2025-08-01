@extends('layouts.app')

@section('content')
<section class="bg-white py-20 px-6 lg:px-16">
  <div class="max-w-6xl mx-auto">

    <!-- Flex container untuk Foto di kiri & Teks di kanan -->
    <div class="flex flex-col-reverse md:flex-row items-center md:items-start gap-10 md:gap-16 mb-16">
      
      <!-- Foto -->
      <div class="md:w-1/2 w-full">
        <div class="overflow-hidden rounded-2xl shadow-xl border border-gray-200">
          <img src="{{ asset('images/foto-kelompok.jpg') }}" alt="Foto Kelompok KKN Desa Parigi" class="w-full h-auto object-cover transition-transform duration-300 hover:scale-105">
        </div>
      </div>

      <!-- Teks -->
      <div class="md:w-1/2 w-full">
        <h2 class="text-3xl font-bold text-gray-900 mb-4">Tentang Website Ini</h2>
        <p class="text-gray-700 text-lg leading-relaxed mb-6">
          Website ini merupakan salah satu program kerja dari Kelompok Kuliah Kerja Nyata (KKN) Universitas Hasanuddin Angkatan 22 yang ditempatkan di Desa Parigi. Kami berkomitmen untuk turut berkontribusi dalam pembangunan desa dan pemberdayaan masyarakat melalui pemanfaatan teknologi informasi.
        </p>

        <!-- Daftar Anggota -->
        <div>
          <h3 class="text-xl font-semibold text-gray-800 mb-4">Anggota Kelompok:</h3>
          <div class="space-y-3">
            @php
              $members = [
                ['name' => 'MUHAMMAD FATHAN FITRANSYAH', 'major' => 'Ilmu Ekonomi'],
                ['name' => 'FIRDA FAIZAH', 'major' => 'Ilmu Tanah'],
                ['name' => 'HARTIKA JULIANTY NURSUHADA', 'major' => 'Sastra Prancis'],
                ['name' => 'RAMONA KOEMALA', 'major' => 'Administrasi Publik'],
                ['name' => 'MUH. RAIHAAN IBRAHIM ALISA', 'major' => 'Teknik Mesin'],
                ['name' => 'DHENA ALFIANSYAH', 'major' => 'Ilmu Hukum'],
                ['name' => 'ANANDYA FAKHIRATUNISA FAUZAN', 'major' => 'Ilmu Aktuaria'],
                ['name' => 'MUH RASUL ARLIANSYAH', 'major' => 'Peternakan'],
              ];
            @endphp

         @foreach ($members as $member)
  <div class="bg-white border-l-4 border-cyan-600 shadow-sm rounded-lg p-1 hover:shadow-md transition">
    <h4 class="text-sm font-medium text-gray-800">{{ $member['name'] }}</h4>
    <p class="text-xs text-cyan-700">
      {{ $member['major'] }}
    </p>
  </div>
@endforeach

          </div>
        </div>
      </div>
    </div>

  </div>
</section>
@endsection
