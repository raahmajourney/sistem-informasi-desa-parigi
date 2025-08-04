@extends('layouts.app')

@section('content')

<section class="bg-white py-20 px-6 lg:px-6 text-sky-800 relative ">
<!-- Informasi Kepala Desa -->
<div class="max-w-4xl mx-auto text-center" data-aos="zoom-in" data-aos-delay="150">
  <h2 class="text-2xl font-semibold mb-8">Struktur Organisasi Desa Parigi</h2>

  <div class="flex flex-wrap justify-center gap-6">
    <!-- Card 1 - Kepala Desa -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden w-full sm:w-64" data-aos="zoom-in" data-aos-delay="150">
      <div class="flex items-center justify-center h-60 bg-gray-200">
        <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/fallback-B6dzNJxy.png"
             alt="Foto Kepala Desa"
             class="h-full object-cover" />
      </div>
      <div class="bg-sky-700 text-white py-4 px-6 text-center">
        <h3 class="text-lg font-bold uppercase">Ismail, S.Sos., M.Si</h3>
        <p class="text-sm mt-1">Kepala Desa</p>
      </div>
    </div>

    <!-- Card 2 - Sekretaris Desa -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden w-full sm:w-64 flex flex-col items-center" data-aos="zoom-in" data-aos-delay="150">
      <div class="flex items-center justify-center h-60 bg-gray-200 w-full">
        <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/fallback-B6dzNJxy.png"
             alt="Foto Sekretaris Desa"
             class="h-full object-cover" />
      </div>
      <div class="bg-sky-700 text-white py-4 px-6 text-center w-full">
        <h3 class="text-lg font-bold uppercase">Hizbullah Ardan</h3>
        <p class="text-sm mt-1">Sekretaris Desa</p>
      </div>
    </div>
  </div>
</div>


 <!-- Tombol Struktur Lengkap di sebelah kanan bawah -->
<div class="absolute right-12 bottom-8" data-aos="zoom-in" data-aos-delay="150">
  <a href="{{ route('structure') }}"
    class=" hover:bg-sky-400 text-sky-900 font-semibold py-2 px-4 rounded shadow">
    Struktur Lengkap
  </a>
</div>

</section>




<section class="bg-sky-50 py-12 px-6 lg:px-16">
  <div class="max-w-6xl mx-auto">
    
    <!-- Bagian H2 + H3 dan Gambar -->
    <div class="flex flex-col lg:flex-row items-center lg:items-center justify-between gap-10 mb-12"  data-aos="zoom-in"
     data-aos-delay="200"
     data-aos-duration="1000"
     data-aos-easing="ease-in-out">
      
      <!-- Judul & Deskripsi -->
      <div class="lg:w-1/2 text-center lg:text-left">
        <h2 class="text-4xl font-bold text-sky-700 mb-6">
          Demografi Penduduk
        </h2>
        <h3 class="text-gray-700 text-2xl leading-relaxed">
          Memberikan informasi lengkap mengenai karakteristik demografi penduduk. Mulai dari jumlah penduduk, usia, jenis kelamin, tingkat pendidikan, pekerjaan, dan aspek penting lainnya yang menggambarkan komposisi populasi secara rinci.
        </h3>
      </div>

      <!-- Gambar -->
      <div class="lg:w-1/2 flex justify-center">
        <img src="https://cdn.digitaldesa.com/statics/profil-v2/assets/other-1-DEP2VegA.png" alt="Ilustrasi Demografi" class="max-w-full h-auto">
      </div>

    </div>

    <!-- Chart & Keterangan -->
    <div class="p-6 rounded-lg mt-12 shadow"  data-aos="zoom-in"
     data-aos-delay="200"
     data-aos-duration="1000"
     data-aos-easing="ease-in-out">
      <h2 class="text-2xl font-bold text-sky-700 mb-6">Berdasarkan Dusun</h2>
      <div class="flex flex-col lg:flex-row items-center justify-between gap-10">

        <!-- Chart Canvas -->
        <div class="w-72 md:w-100">
          <canvas id="dusunChart"></canvas>
        </div>

        <!-- Keterangan -->
        <div class="w-full lg:w-1/3">
          <h3 class="text-lg font-bold mb-4">Keterangan:</h3>
          <ul class="space-y-2 text-black text-base">
            <li><strong>PANGAJIANG:</strong> 1.475 Jiwa</li>
            <li><strong>SALUTTOWA:</strong> 2.152 Jiwa</li>
            <li><strong>ASANA:</strong> 1.254 Jiwa</li>
          </ul>
        </div>

      </div>
    </div>

  </div>
</section>



<section class="py-12 px-6 lg:px-16" data-aos="zoom-in"
         data-aos-delay="200"
         data-aos-duration="1000"
         data-aos-easing="ease-in-out">
  <h2 class="text-3xl font-bold text-sky-700 text-center mb-10">
    Piramida Penduduk Berdasarkan Umur & Jenis Kelamin
  </h2>

  <!-- Responsive Chart Container -->
  <div class="w-full overflow-x-auto">
    <div class="min-w-[350px] sm:min-w-full max-w-4xl mx-auto">
      <canvas id="piramidaChart" class="!h-[400px] w-full"></canvas>
    </div>
  </div>
</section>

<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- Chart Config -->
<script>
  const ctx = document.getElementById('piramidaChart').getContext('2d');

  const data = {
    labels: [
      '0 – 6 TAHUN',
      '7 – 19 TAHUN',
      '20 – 34 TAHUN',
      '35 – 49 TAHUN',
      '50 – 59 TAHUN',
      '60 – 69 TAHUN',
      '>70 TAHUN'
    ],
    datasets: [
      {
        label: 'Laki-laki',
        data: [-268, -441, -513, -491, -329, -266, -147],
        backgroundColor: '#0369a1' // sky-700
      },
      {
        label: 'Perempuan',
        data: [283, 385, 487, 511, 326, 264, 170],
        backgroundColor: '#38bdf8' // sky-400
      }
    ]
  };

  const config = {
    type: 'bar',
    data: data,
    options: {
      indexAxis: 'y',
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: 'bottom',
          labels: {
            color: '#075985',
            font: {
              size: 14,
              weight: 'bold'
            }
          }
        },
        tooltip: {
          callbacks: {
            label: function (context) {
              const val = Math.abs(context.raw);
              return `${context.dataset.label}: ${val.toLocaleString()}`;
            }
          }
        },
      },
      scales: {
        x: {
          stacked: true,
          ticks: {
            callback: function (value) {
              return Math.abs(value);
            },
            color: '#075985'
          },
          title: {
            display: true,
            text: 'Jumlah Penduduk',
            color: '#075985',
            font: { size: 14, weight: 'bold' }
          }
        },
        y: {
          stacked: true,
          ticks: {
            color: '#075985'
          },
          title: {
            display: true,
            text: 'Kelompok Umur',
            color: '#075985',
            font: { size: 14, weight: 'bold' }
          }
        }
      }
    }
  };

  new Chart(ctx, config);
</script>


<!-- Sarana dan prasaran -->
<section class="py-10 px-4 bg-sky-50" data-aos="zoom-in"
     data-aos-delay="200"
     data-aos-duration="1000"
     data-aos-easing="ease-in-out">
  <h2 class="text-2xl font-bold text-sky-700 mb-10 text-center">SARANA & PRASARANA</h2>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 max-w-7xl mx-auto">
    
    <!-- Card Template -->
    <div class="bg-white rounded-xl shadow-md p-4 flex flex-col items-center text-center text-sm font-medium text-gray-700">
      <i class="fas fa-school text-4xl text-gray-600 mb-2"></i>
      <h3 class="text-base font-bold text-sky-700 mb-2">PENDIDIKAN</h3>
      <div class="space-y-1">
        <p>2 <span class="ml-1">TK</span></p>
        <p>5 <span class="ml-1">SD</span></p>
        <p>2 <span class="ml-1">SMP</span></p>
        <p>1 <span class="ml-1">SMA</span></p>
        <p>1 <span class="ml-1">SMK</span></p>
      </div>
    </div>

    <div class="bg-white rounded-xl shadow-md p-4 flex flex-col items-center text-center text-sm font-medium text-gray-700">
      <i class="fas fa-hospital text-4xl text-sky-500 mb-2"></i>
      <h3 class="text-base font-bold text-sky-700 mb-2">KESEHATAN</h3>
      <div class="space-y-1">
        <p>1 <span class="ml-1">PUSTU</span></p>
        <p>1 <span class="ml-1">POSKESDES</span></p>
        <p>2 <span class="ml-1">POLINDES</span></p>
        <p>4 <span class="ml-1">POSYANDU</span></p>
      </div>
    </div>

    <div class="bg-white rounded-xl shadow-md p-4 flex flex-col items-center text-center text-sm font-medium text-gray-700">
      <i class="fas fa-mosque text-4xl text-teal-600 mb-2"></i>
      <h3 class="text-base font-bold text-sky-700 mb-2">PERIBADATAN</h3>
      <div class="space-y-1">
        <p>18 <span class="ml-1">MASJID</span></p>
        <p>3 <span class="ml-1">MUSHOLLA</span></p>
      </div>
    </div>

    <div class="bg-white rounded-xl shadow-md p-4 flex flex-col items-center text-center text-sm font-medium text-gray-700">
      <i class="fas fa-store text-4xl text-yellow-700 mb-2"></i>
      <h3 class="text-base font-bold text-sky-700 mb-2">PERDAGANGAN</h3>
      <div class="space-y-1">
        <p>1 <span class="ml-1">PASAR</span></p>
        <p>1 <span class="ml-1">KOPTAN</span></p>
      </div>
    </div>

    <div class="bg-white rounded-xl shadow-md p-4 flex flex-col items-center text-center text-sm font-medium text-gray-700">
      <i class="fas fa-bus text-4xl text-sky-700 mb-2"></i>
      <h3 class="text-base font-bold text-sky-700 mb-2">TRANSPORTASI</h3>
      <div class="space-y-1">
        <p>15 KM <span class="ml-1">JALAN ASPAL</span></p>
        <p>7.5 KM <span class="ml-1">JALAN PENGERASAN</span></p>
        <p>20.5 KM <span class="ml-1">JALAN TANAH</span></p>
        <p>11 <span class="ml-1">SUNGAI</span></p>
        <p>8 <span class="ml-1">JEMBATAN</span></p>
        <p>13 <span class="ml-1">GORONG-GORONG</span></p>
      </div>
    </div>

  </div>
</section>



<!--tingkat pendidikan -->
<h2 class="text-2xl font-bold text-sky-700 mb-10 text-center py-6 px-2" data-aos="zoom-in"
     data-aos-delay="200"
     data-aos-duration="1000"
     data-aos-easing="ease-in-out">Tingkat Pendidikan</h2>
<canvas id="pendidikanChart" class="w-full max-w-3xl mx-auto my-8" data-aos="zoom-in"
     data-aos-delay="200"
     data-aos-duration="1000"
     data-aos-easing="ease-in-out"></canvas>

<script>
  const ctxPendidikan = document.getElementById('pendidikanChart').getContext('2d');

  new Chart(ctxPendidikan, {
    type: 'bar',
    data: {
      labels: [
        'TIDAK SEKOLAH',
        'TIDAK TAMAT SD',
        'MASIH SD',
        'TAMAT SD',
        'MASIH SMP',
        'TAMAT SMP',
        'MASIH SMA',
        'TAMAT SMA',
        'MASIH AK/PT',
        'TAMAT AK/PT'
      ],
      datasets: [{
        label: 'Persentase',
        data: [25, 10, 11, 19, 5, 12, 3, 11, 1, 3],
        backgroundColor: [
          '#b36b4d',
          '#2c2c2c',
          '#3b3f3e',
          '#a9b2aa',
          '#6d5234',
          '#2a3d53',
          '#7fa1ae',
          '#dd4d3d',
          '#fa6844',
          '#ff5733'
        ]
      }]
    },
    options: {
      indexAxis: 'y',
      responsive: true,
      plugins: {
        legend: { display: false },
        tooltip: {
          callbacks: {
            label: function(context) {
              return `${context.label}: ${context.raw}%`;
            }
          }
        }
      },
      scales: {
        x: {
          beginAtZero: true,
          max: 30,
          ticks: {
            callback: function(value) {
              return value + '%';
            }
          },
          title: {
            display: true,
            text: 'Persentase',
            font: { weight: 'bold' }
          }
        },
        y: {
          title: { display: false }
        }
      }
    }
  });
</script>


<section class="bg-sky-10 py-12 px-6 lg:px-16" data-aos="zoom-in"
     data-aos-delay="200"
     data-aos-duration="1000"
     data-aos-easing="ease-in-out">
  <h2 class="text-3xl font-bold text-sky-700 mb-6">Berdasarkan Pekerjaan</h2>

  <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
    <!-- TABEL -->
    <div class="col-span-1 overflow-x-auto">
      <table class="w-full border border-gray-200">
        <thead>
          <tr class="bg-sky-700 text-white text-left text-sm">
            <th class="py-3 px-4 font-semibold">Jenis Pekerjaan</th>
            <th class="py-3 px-4 font-semibold text-right">Jumlah</th>
          </tr>
        </thead>
        <tbody class="text-sm text-gray-700">
          <tr class="border-t">
            <td class="py-3 px-4">Belum/Tidak Bekerja</td>
            <td class="py-3 px-4 text-right">2.010</td>
          </tr>
          <tr class="border-t">
            <td class="py-3 px-4">Wiraswasta</td>
            <td class="py-3 px-4 text-right">304</td>
          </tr>
          <tr class="border-t">
            <td class="py-3 px-4">PNS/TNI/POLRI</td>
            <td class="py-3 px-4 text-right">56</td>
          </tr>
          <tr class="border-t">
            <td class="py-3 px-4">Petani</td>
            <td class="py-3 px-4 text-right">829</td>
          </tr>
          <tr class="border-t">
            <td class="py-3 px-4">Pensiunan</td>
            <td class="py-3 px-4 text-right">19</td>
          </tr>
          <tr class="border-t">
            <td class="py-3 px-4">Pegawai</td>
            <td class="py-3 px-4 text-right">101</td>
          </tr>
          <tr class="border-t">
            <td class="py-3 px-4">Pedagang</td>
            <td class="py-3 px-4 text-right">64</td>
          </tr>
          <tr class="border-t">
            <td class="py-3 px-4">Pekerja Lepas</td>
            <td class="py-3 px-4 text-right">483</td>
          </tr>
          <tr class="border-t">
            <td class="py-3 px-4">Lainnya</td>
            <td class="py-3 px-4 text-right">465</td>
          </tr>
        </tbody>
      </table>
    </div>

    <!-- CARD -->
    <div class="col-span-2 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
      @php
        $pekerjaan = [
          ['nama' => 'Belum/Tidak Bekerja', 'jumlah' => 2010],
          ['nama' => 'Wiraswasta', 'jumlah' => 304],
          ['nama' => 'PNS/TNI/POLRI', 'jumlah' => 56],
          ['nama' => 'Petani', 'jumlah' => 829],
          ['nama' => 'Pensiunan', 'jumlah' => 19],
          ['nama' => 'Pegawai', 'jumlah' => 101],
          ['nama' => 'Pedagang', 'jumlah' => 64],
          ['nama' => 'Pekerja Lepas', 'jumlah' => 483],
          ['nama' => 'Lainnya', 'jumlah' => 465],
        ];
      @endphp

      @foreach($pekerjaan as $p)
        <div class="bg-white rounded-lg shadow p-4">
          <h4 class="text-sm font-semibold text-gray-700 mb-2">{{ $p['nama'] }}</h4>
          <p class="text-2xl font-bold text-gray-800">{{ number_format($p['jumlah'], 0, ',', '.') }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>




<!-- Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>



<script>
  const ctxDusun = document.getElementById('dusunChart').getContext('2d');
  const dusunChart = new Chart(ctxDusun, {
    type: 'pie',
    data: {
      labels: ['PANGAJIANG', 'SALUTTOWA', 'ASANA'],
      datasets: [{
        label: 'Jumlah Penduduk per Dusun',
        data: [1475, 2152, 1254],
        backgroundColor: [
          '#3B82F6', // PANGAJIANG - biru
          '#10B981', // SALUTTOWA - hijau toska
          '#F59E0B'  // ASANA - oranye
        ],
        borderWidth: 1,
      }]
    },
    options: {
      plugins: {
        legend: {
          position: 'right',
        },
        tooltip: {
          callbacks: {
            label: function(context) {
              const total = context.dataset.data.reduce((acc, val) => acc + val, 0);
              const value = context.raw;
              const percentage = ((value / total) * 100).toFixed(2) + '%';
              return `${context.label} : ${value} Jiwa (${percentage})`;
            }
          }
        }
      }
    }
  });
</script>


@endsection
