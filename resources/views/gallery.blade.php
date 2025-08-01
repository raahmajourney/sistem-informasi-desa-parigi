@extends('layouts.app')

@section('content')
<section class="bg-white py-16 px-4 lg:px-16">
    <div class="max-w-7xl mx-auto">
        <h2 class="text-3xl font-bold text-center text-gray-800 mb-10">
             Galeri Desa
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            <!-- Card 1 (Image) -->
            <div class="bg-gray-50 rounded-xl overflow-hidden shadow hover:shadow-md transition">
                <img src="https://source.unsplash.com/600x400/?village,nature" 
                     alt="Contoh Gambar" 
                     class="w-full h-60 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 truncate">
                        Gotong Royong Warga
                    </h3>
                    <p class="text-sm text-gray-600 mt-1 line-clamp-2">
                        Kegiatan kerja bakti di Dusun Pangajiang pada hari Minggu.
                    </p>
                </div>
            </div>

            <!-- Card 2 (Video) -->
            <div class="bg-gray-50 rounded-xl overflow-hidden shadow hover:shadow-md transition">
                <video controls class="w-full h-60 object-cover bg-black">
                    <source src="https://www.w3schools.com/html/mov_bbb.mp4" type="video/mp4">
                    Browser Anda tidak mendukung pemutar video.
                </video>
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 truncate">
                        Dokumentasi Musyawarah
                    </h3>
                    <p class="text-sm text-gray-600 mt-1 line-clamp-2">
                        Video rapat warga membahas program pembangunan.
                    </p>
                </div>
            </div>

            <!-- Card 3 (Image) -->
            <div class="bg-gray-50 rounded-xl overflow-hidden shadow hover:shadow-md transition">
                <img src="https://source.unsplash.com/600x400/?community,event" 
                     alt="Contoh Gambar" 
                     class="w-full h-60 object-cover">
                <div class="p-4">
                    <h3 class="text-lg font-semibold text-gray-800 truncate">
                        Perayaan Hari Kemerdekaan
                    </h3>
                    <p class="text-sm text-gray-600 mt-1 line-clamp-2">
                        Lomba 17-an di lapangan desa Parigi yang meriah dan ramai.
                    </p>
                </div>
            </div>

            <!-- Tambah card lain jika ingin -->
        </div>
    </div>
</section>
@endsection
