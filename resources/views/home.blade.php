@extends('layouts.app')

@section('content')
<!-- Hero Section -->
<div id="heroSlider" class="relative isolate px-6 pt-32 lg:px-8 bg-cover bg-center bg-no-repeat transition-all duration-1000 h-[80vh]">
  <div class="absolute inset-0 bg-black/40 z-10"></div>
  <div class="relative z-20 flex flex-col justify-center items-center h-full text-center text-white">
    <h1 class="text-4xl md:text-6xl font-bold tracking-tight drop-shadow-md">Desa Parigi</h1>
    <p class="mt-4 text-lg md:text-xl font-medium">Parigi Semangat Berseri</p>
  </div>
</div>

<!-- Profil Desa -->
<section class="bg-white pt-28 py-20 px-6 lg:px-16" data-aos="fade-up">
  <div class="max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">Profil Desa</h2>

    <!-- Deskripsi -->
    <div class="mb-10">
      <p class="text-gray-700 text-lg leading-relaxed text-center">
        Parigi, mandiri membangun masyarakat dengan meningkatkan mutu pendidikan formal dan non formal, terutama ilmu pengetahuan masyarakat berbasis pada usaha-usaha pertanian, perkebunan, peternakan, dan perikanan dengan mengelola lahan secara intensif. Ditunjang oleh infrastruktur jalan yang memadai, Desa Parigi menuju desa yang SEJAHTERA, AMAN, TENTRAM, BERSIH, SEHAT, dan ASRI.
      </p>
    </div>

<!-- Peta Desa Parigi -->
<div class="relative mb-16">
  <h3 class="text-2xl font-semibold text-center text-sky-800 mb-6">Peta Lokasi Desa Parigi</h3>
  
  <div class="relative w-full h-[400px] rounded-xl overflow-hidden shadow-lg ring-1 ring-gray-200">
    <div id="map" class="absolute inset-0 z-0"></div>
  </div>
</div>


    <!-- Visi dan Misi (berdampingan) -->
    <div class="grid md:grid-cols-2 gap-10">
      <!-- Visi -->
      <div class="bg-sky-200 p-6 rounded-2xl shadow-md space-y-4">
        <h3 class="text-2xl font-bold text-sky-800">Visi</h3>
        <ul class="list-decimal list-inside text-gray-700 space-y-2 pl-2">
          <li>Kemandirian masyarakat melalui usaha sektor pertanian dan infrastruktur yang memadai.</li>
          <li>Peningkatan SDM formal dan non formal.</li>
          <li>Keterampilan masyarakat di tiap bidang usaha.</li>
          <li>Kehidupan masyarakat yang sejahtera dan terpenuhi kebutuhannya.</li>
          <li>Keamanan beraktivitas masyarakat terjamin.</li>
          <li>Kesehatan jasmani dan rohani.</li>
          <li>Penataan permukiman dan pemanfaatan lahan secara maksimal.</li>
          <li>Parigi sebagai pintu gerbang menuju Kota Wisata Malino.</li>
        </ul>
      </div>

      <!-- Misi -->
      <div class="bg-sky-200 p-6 rounded-2xl shadow-md space-y-4">
        <h3 class="text-2xl font-bold text-sky-800">Misi</h3>
        <ul class="list-decimal list-inside text-gray-700 space-y-2 pl-2">
          <li>Pendidikan yang mudah diakses dan inklusif.</li>
          <li>Mewujudkan insan intelektual, inovatif, dan entrepreneur.</li>
          <li>Pemberdayaan sektor pertanian, peternakan, dll secara berkelanjutan.</li>
          <li>Penguatan infrastruktur penunjang sektor usaha produktif.</li>
          <li>Pengolahan dan pemasaran hasil pertanian dan sektor lainnya.</li>
          <li>Pembangunan berwawasan lingkungan dan kebencanaan.</li>
          <li>Pelayanan kesehatan merata, khususnya di daerah terpencil.</li>
          <li>Pengembangan daya tarik pariwisata desa.</li>
          <li>Pelestarian nilai-nilai budaya lokal Makassar.</li>
        </ul>
      </div>
    </div>
  </div>
</section>


<!-- Parigi Update -->
<section class="bg-sky-50 py-20 px-6 lg:px-16">
  <h2 class="text-3xl font-bold text-gray-900 mb-12 text-center">Parigi Update</h2>
  <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach ($activities as $activity)
    <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-6">
      <img src="{{ $activity->image ? asset('storage/' . $activity->image) : '/images/placeholder.jpg' }}" 
           alt="Gambar Aktivitas" 
           class="rounded-lg mb-4 w-full h-48 object-cover">

      <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $activity->title }}</h3>
      <p class="text-gray-600 text-sm">{{ \Illuminate\Support\Str::limit($activity->content, 100) }}</p>

      <span class="block mt-4 text-xs text-gray-400 flex items-center gap-1">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>
        {{ \Carbon\Carbon::parse($activity->activity_date)->format('d F Y') }}
      </span>

      <a href="{{ route('activity.detail', $activity->id) }}" class="inline-block mt-4 text-sky-700 text-sm font-medium hover:underline">
      Baca Selengkapnya →
    </a>

    </div>
    @endforeach
  </div>
  <div class="mt-12 text-center">
    <a href="#" 
       class="inline-block px-6 py-2 text-black font-semibold rounded-xl hover:bg-sky-300 transition">
        Lihat Semua Update
    </a>
</div>
</section>


@endsection


@push('scripts')
<!-- Inisialisasi Leaflet -->
<script>
  const map = L.map('map').setView([-5.235064, 119.771115], 10);

  L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  }).addTo(map);

  L.marker([-5.235064, 119.771115])
    .addTo(map)
    .bindPopup('Desa Parigi<br>Tinggimoncong, Gowa')
    .openPopup();
</script>

<!-- Script Slider -->
<script>
  const images = [
    '/images/slider4.jpg',
    '/images/slider2.jpg',
    '/images/slider3.jpg'
  ];
  let currentIndex = 0;
  const hero = document.getElementById('heroSlider');

  setInterval(() => {
    currentIndex = (currentIndex + 1) % images.length;
    hero.style.backgroundImage = `url('${images[currentIndex]}')`;
  }, 5000);
</script>
@endpush

@push('styles')
<link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
@endpush

@push('scripts')
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({
    duration: 800, // Durasi animasi
    once: true     // Animasi hanya jalan 1x
  });
</script>
@endpush
