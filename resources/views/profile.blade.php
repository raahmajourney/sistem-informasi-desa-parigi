@extends('layouts.app')

@section('content')

<section class="bg-white py-20 px-6 lg:px-6">

<!-- Informasi Kepala Desa  -->
<section class=" py-12 px-6 lg:px-16">
    <div class="max-w-4xl mx-auto text-center">
        <h2 class="text-2xl font-semibold mb-8">Struktur Organisasi Desa Parigi</h2>

        <div class="flex justify-center">
            <div class="bg-white rounded-xl shadow-lg overflow-hidden w-64 mx-4">
                <div class="flex items-center justify-center h-60 bg-gray-200">
                    <i class="fas fa-user-tie text-7xl text-gray-500"></i>
                </div>
                <div class="bg-sky-700 text-white py-4 px-6 text-center">
                    <h3 class="text-lg font-bold uppercase">Ismail, S.Sos., M.Si</h3>
                    <p class="text-sm mt-1">Kepala Desa</p>
                </div>
            </div>
            
            <div class="bg-white rounded-xl shadow-lg overflow-hidden w-64">
                <div class="flex items-center justify-center h-60 bg-gray-200">
                    <i class="fas fa-user-tie text-7xl text-gray-500"></i>
                </div>
                <div class="bg-sky-700 text-white py-4 px-6 text-center">
                    <h3 class="text-lg font-bold uppercase">Hizbullah Ardan</h3>
                    <p class="text-sm mt-1">Sekretaris Desa</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="bg-white py-12 px-6 lg:px-16">
  <div class="max-w-6xl mx-auto">
    <h2 class="text-3xl font-semibold text-center mb-8 text-sky-700">Demografi Penduduk</h2>
    <h3 class="text-center text-gray-700 mb-12 max-w-3xl mx-auto">
      Memberikan informasi lengkap mengenai karakteristik demografi penduduk suatu wilayah. Mulai dari jumlah penduduk, usia, jenis kelamin, tingkat pendidikan, pekerjaan, agama, dan aspek penting lainnya yang menggambarkan komposisi populasi secara rinci.
    </h3>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 text-gray-800">
      
      <!-- Jumlah Penduduk -->
      <div class="bg-gray-100 rounded-xl p-6 shadow">
        <h3 class="text-xl font-bold text-sky-700 mb-2">Jumlah Penduduk</h3>
        <p>4.250 Jiwa</p>
      </div>

      <!-- Usia -->
      <div class="bg-gray-100 rounded-xl p-6 shadow">
        <h3 class="text-xl font-bold text-sky-700 mb-2">Distribusi Usia</h3>
        <ul class="list-disc list-inside">
          <li>0–14 tahun: 25%</li>
          <li>15–64 tahun: 65%</li>
          <li>65+ tahun: 10%</li>
        </ul>
      </div>

      <!-- Jenis Kelamin -->
      <div class="bg-gray-100 rounded-xl p-6 shadow">
        <h3 class="text-xl font-bold text-sky-700 mb-2">Jenis Kelamin</h3>
        <p>Laki-laki: 2.100 (49%)<br>Perempuan: 2.150 (51%)</p>
      </div>

      <!-- Pendidikan -->
      <div class="bg-gray-100 rounded-xl p-6 shadow">
        <h3 class="text-xl font-bold text-sky-700 mb-2">Tingkat Pendidikan</h3>
        <ul class="list-disc list-inside">
          <li>Tidak Sekolah: 5%</li>
          <li>SD–SMP: 50%</li>
          <li>SMA: 30%</li>
          <li>Diploma/Universitas: 15%</li>
        </ul>
      </div>

      <!-- Pekerjaan -->
      <div class="bg-gray-100 rounded-xl p-6 shadow">
        <h3 class="text-xl font-bold text-sky-700 mb-2">Pekerjaan Utama</h3>
        <ul class="list-disc list-inside">
          <li>Petani: 40%</li>
          <li>Pedagang: 20%</li>
          <li>Pegawai Negeri: 15%</li>
          <li>Lainnya: 25%</li>
        </ul>
      </div>

      <!-- Agama -->
      <div class="bg-gray-100 rounded-xl p-6 shadow">
        <h3 class="text-xl font-bold text-sky-700 mb-2">Agama</h3>
        <ul class="list-disc list-inside">
          <li>Islam: 95%</li>
          <li>Kristen: 3%</li>
          <li>Lainnya: 2%</li>
        </ul>
      </div>
      
    </div>
  </div>
</section>


</section>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


@endsection
