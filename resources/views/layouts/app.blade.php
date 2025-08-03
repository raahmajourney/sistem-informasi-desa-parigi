<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />

  <!-- Meta Description -->
  <meta name="description" content="Website resmi Desa Parigi, Tinggimoncong, Kabupaten Gowa. Menyediakan informasi profil desa, produk unggulan, dan dokumen penting.">

  <!-- Meta Keywords (tidak terlalu penting lagi, tapi bisa digunakan) -->
  <meta name="keywords" content="Desa Parigi, Tinggimoncong, Gowa, Produk Unggulan, Pemerintah Desa, Sulawesi Selatan">

  <!-- Meta Author -->
  <meta name="author" content="Desa Parigi">

  <!-- Open Graph untuk sosial media -->
  <meta property="og:title" content="Desa Parigi - Tinggimoncong, Gowa">
  <meta property="og:description" content="Informasi seputar Desa Parigi: profil, produk unggulan, galeri, dan kontak.">
  <meta property="og:image" content="URL_LOGO_DESA">
  <meta property="og:url" content="https://desaparigi.id">
  <meta property="og:type" content="website">


  
  <title>Desa Parigi</title>

  <!-- Untuk .ico -->
  <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Leaflet CSS (tanpa integrity) -->
  <link
    rel="stylesheet"
    href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    crossorigin=""
  />

  <!-- Font Awesome CDN -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-pVZgMpldcAWU+4U7jKLn2eW+9XfRWT5JKZvdDklIXXaFetZKr85SG1Uj1ApXaVZnAWBkKwzImQDbOCS8g1B5cA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body>

<!-- Header & Hero Section -->
<div >
  
<header class="fixed inset-x-0 top-0 z-50">
  <nav id="navbar"
     class="flex items-center justify-between py-3 px-4 lg:px-8 transition-colors duration-500
     {{ Route::currentRouteName() === 'home' ? 'bg-transparent lg:text-white' : 'bg-sky-500 text-white shadow-md' }}"
     aria-label="Global">

    <div class="flex lg:flex-1 items-center space-x-4">
      <img class="h-12 w-auto" src="/images/logo.png" alt="Parigi" />
      <div class="flex flex-col leading-tight">
        <span class="text-lg font-bold">Parigi</span>
        <span class="text-sm">Tinggimoncong, Gowa</span>
      </div>
    </div>

    <!-- Tombol drawer-->
    <div class="lg:hidden">
      <button id="drawer-button" class="drawer-button text-black  p-2 rounded-md focus:outline-none text-2xl">
        ☰
      </button>
    </div>



    <!-- Menu utama (desktop) -->
   <div class="hidden lg:flex items-center gap-x-8">
  <a href="{{ route('home') }}"
     class="text-sm font-semibold {{ Route::currentRouteName() === 'home' ? 'text-sky-600' : '' }}">
     Home
  </a>
  <a href="{{ route('profile') }}"
     class="text-sm font-semibold {{ Route::currentRouteName() === 'profile' ? 'text-indigo-600 underline' : '' }}">
     Profile
  </a>
  <a href="{{ route('products') }}"
     class="text-sm font-semibold {{ Route::currentRouteName() === 'products' ? 'text-indigo-600 underline' : '' }}">
     Product
  </a>
  <a href="{{ route('gallery') }}"
     class="text-sm font-semibold {{ Route::currentRouteName() === 'gallery' ? 'text-indigo-600 underline' : '' }}">
     Gallery
  </a>
  <a href="{{ route('documents') }}"
     class="text-sm font-semibold {{ Route::currentRouteName() === 'documents' ? 'text-indigo-600 underline' : '' }}">
     Dokumen
  </a>
  <a href="{{ route('education') }}"
     class="text-sm font-semibold {{ Route::currentRouteName() === 'education' ? 'text-indigo-600 underline' : '' }}">
     Education
  </a>
</div>

  </nav>

<!-- Menu responsif (mobile) -->
<div id="mobileMenu" class="hidden flex-col bg-sky-500 text-black lg:hidden p-4 space-y-2">
  <a href="{{ route('home') }}" class="block text-sm font-semibold px-4 py-2 hover:bg-sky-600 rounded-md">Home</a>
  <a href="{{ route('profile') }}" class="block text-sm font-semibold px-4 py-2 hover:bg-sky-600 rounded-md">Profile</a>
  <a href="{{ route('products') }}" class="block text-sm font-semibold px-4 py-2 hover:bg-sky-600 rounded-md">Product</a>
  <a href="{{ route('gallery') }}" class="block text-sm font-semibold px-4 py-2 hover:bg-sky-600 rounded-md">Gallery</a>
  <a href="{{ route('documents') }}" class="block text-sm font-semibold px-4 py-2 hover:bg-sky-600 rounded-md">Dokumen</a>
  <a href="{{ route('education') }}" class="block text-sm font-semibold px-4 py-2 hover:bg-sky-600 rounded-md">Education</a>
</div>



</header>


  <main class="{{ Route::currentRouteName() === 'home' ? '' : 'pt-20' }}">
    @yield('content')
  </main>


<!-- Footer -->
<footer class="bg-gray-900 text-gray-200 mt-20">
  <div class="max-w-6xl mx-auto px-6 py-12 grid grid-cols-1 md:grid-cols-3 gap-10">
    
    <!-- Logo & Info Desa -->
    <div>
      <h3 class="text-2xl font-bold mb-4">Desa Parigi</h3>
      <p class="text-sm leading-relaxed">
        Tinggimoncong, Kabupaten Gowa<br/>
        Sulawesi Selatan, Indonesia<br/>
        Kode Pos:  92174
      </p>
    </div>

    <!-- Navigasi -->
    <div>
      <h4 class="text-xl font-semibold mb-4">Navigasi</h4>
      <ul class="space-y-2 text-sm">
        <li><a href="{{ route('home') }}" class="hover:underline">Home</a></li>
        <li><a href="{{ route('profile') }}" class="hover:underline">Profil Desa</a></li>
        <li><a href="{{ route('products') }}" class="hover:underline">Produk Unggulan</a></li>
        <li><a href="{{ route('documents') }}" class="hover:underline">Dokumen</a></li>
        <li><a href="{{ route('gallery') }}" class="hover:underline">Gallery Desa</a></li>
        <li><a href="{{ route('education') }}" class="hover:underline">Edukasi</a></li>
        <li><a href="{{ route('about') }}" class="hover:underline">Tentang</a></li>
        <li><a href="{{ route('login') }}" class="hover:underline">Dashboard Admin</a></li>
      </ul>
    </div>

    <!-- Kontak -->
    <div>
      <h4 class="text-xl font-semibold mb-4">Kontak</h4>
      <ul class="space-y-2 text-sm">
        <li>Email: <a href="mailto:info@desaparigi.id" class="hover:underline">infodesaparigi@gmail.com</a></li>
        <li>Telepon: 085772389664</li>
        <li>Instagram: <a href="https://www.instagram.com/pemdesdesaparigi?igsh=dG55YTV0cmhnMno2" class="hover:underline">@pemdesdesaparigi</a></li>
      </ul>
    </div>
  </div>

  <!-- Copyright -->
  <div class="bg-gray-900 text-gray-200 text-center py-4 text-sm">
    &copy; 2025 Desa Parigi
  </div>
</footer>


<!-- Leaflet JS (tanpa integrity) -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const navbar = document.getElementById('navbar');
    const isHome = "{{ Route::currentRouteName() === 'home' }}" === "1";

    if (isHome) {
      window.addEventListener('scroll', function () {
        if (window.scrollY > 10) {
          navbar.classList.remove('bg-transparent');
          navbar.classList.add('bg-sky-500', 'shadow-md');
        } else {
          navbar.classList.remove('bg-sky-500', 'shadow-md');
          navbar.classList.add('bg-transparent');
        }
      });
    }

    // Toggle menu mobile
    const drawerButton = document.getElementById('drawer-button');
    const mobileMenu = document.getElementById('mobileMenu');
    drawerButton?.addEventListener('click', function () {
      mobileMenu?.classList.toggle('hidden');
    });
  });
</script>


@stack('scripts')
</body>
</html>
