@extends('layouts.app')


@section('content')
 <!-- Hero Slider -->
  <div id="heroSlider" class="relative isolate px-6 pt-14 lg:px-8 bg-cover bg-center bg-no-repeat transition-all duration-1000"
       style="background-image: url('/images/slider1.jpg');">
    <div class="absolute inset-0 bg-white/35 z-10"></div>
    <div class="relative z-20 mx-auto max-w-2xl py-32 sm:py-48 lg:py-56 text-center">
      <h1 class="text-5xl font-semibold tracking-tight text-white sm:text-7xl">Desa Parigi</h1>
      <p class="mt-8 text-lg font-medium text-white sm:text-xl">
        Indonesia pulih lebih cepat, bangkit lebih kuat, Parigi pantas lebih hebat.
      </p>
    </div>
  </div>
</div>

<!-- Section: Profil Desa -->
<section class="bg-white py-20 px-6 lg:px-16">
  <div class="max-w-6xl mx-auto">
    <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center">Profil Desa</h2>

    <div class="grid lg:grid-cols-2 gap-10">
      <!-- Deskripsi -->
      <div>
        <p class="text-gray-700 text-lg leading-relaxed text-justify mb-6">
          Desa Parigi terletak di Kecamatan Tinggimoncong, Kabupaten Gowa, Sulawesi Selatan. Desa ini dikenal karena keindahan alamnya yang asri, udara sejuk pegunungan, serta masyarakatnya yang ramah dan gotong royong. 
          Mayoritas penduduk bermata pencaharian sebagai petani dan peternak. Potensi wisata dan pertanian menjadi aset utama untuk pembangunan desa yang berkelanjutan.
        </p>

        <div class="grid gap-6">
          <div class="bg-emerald-100 p-6 rounded-xl shadow">
            <h3 class="text-xl font-semibold text-emerald-800 mb-2">Visi</h3>
            <p class="text-gray-700">Mewujudkan Desa Parigi yang mandiri, sejahtera, dan berdaya saing berbasis pertanian dan pariwisata.</p>
          </div>
          <div class="bg-emerald-100 p-6 rounded-xl shadow">
            <h3 class="text-xl font-semibold text-emerald-800 mb-2">Misi</h3>
            <ul class="list-disc list-inside text-gray-700 space-y-1">
              <li>Meningkatkan kualitas infrastruktur desa.</li>
              <li>Mendorong inovasi pertanian dan UMKM.</li>
              <li>Menjaga kelestarian lingkungan hidup.</li>
              <li>Memperkuat nilai budaya dan kearifan lokal.</li>
            </ul>
          </div>
        </div>
      </div>

      <!-- Peta -->
      <div>
        <div id="map" class="w-full h-[450px] rounded-xl overflow-hidden shadow  z-0"></div>
      </div>
    </div>
  </div>
</section>

<!-- Section: Parigi Update -->
<section class="bg-emerald-50 py-20 px-6 lg:px-16">
   <h2 class="text-3xl font-bold text-gray-900 mb-6 text-center">Update</h2>
  <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
    @foreach ($activities as $activity)
    <div class="bg-white rounded-xl shadow hover:shadow-md transition p-6">
      <img src="{{ $activity->image ? asset('storage/' . $activity->image) : '/images/placeholder.jpg' }}" 
           alt="Gambar Aktivitas" 
           class="rounded-lg mb-4 w-full h-48 object-cover">

      <h3 class="text-lg font-semibold text-gray-800 mb-2">{{ $activity->title }}</h3>
      <p class="text-gray-600 text-sm">{{ \Illuminate\Support\Str::limit($activity->content, 100) }}</p>
      
     <span class="block mt-4 text-xs text-gray-400 flex items-center gap-1">
    {{-- Icon Kalender --}}
    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
    </svg>
    {{ \Carbon\Carbon::parse($activity->activity_date)->format('d F Y') }}
</span>


      <!-- Tombol Read More -->
      <a href="#" 
         class="inline-block mt-4 text-emerald-700 text-sm font-medium hover:underline">
        Baca Selengkapnya →
      </a>
    </div>
    @endforeach
  </div>
</section>


@endsection

@push('scripts')
<!-- Inisialisasi Leaflet -->
<script>
  const map = L.map('map').setView([-5.235064, 119.771115], 13);

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
    '/images/slider1.jpg',
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
