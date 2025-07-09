<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  @vite('resources/css/app.css')
  <title>Desa Parigi</title>

  <!-- Leaflet CSS (tanpa integrity) -->
  <link
    rel="stylesheet"
    href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    crossorigin=""
  />
</head>
<body>

<!-- Header & Hero Section -->
<div class="bg-white">
  
  <header class="fixed inset-x-0 top-0 z-50">
    <nav id="navbar" class="flex items-center justify-between p-6 lg:px-8 bg-transparent transition-colors duration-500" aria-label="Global">
      <div class="flex lg:flex-1 items-center space-x-4">
        <a href="#" class="-m-1.5 p-1.5 flex items-center">
          <span class="sr-only">Parigi</span>
          <img class="h-20 w-auto" src="/images/logo.png" alt="Parigi" />

        </a>
        <div class="flex flex-col leading-tight">
          <span class="text-lg font-bold text-gray-900">Parigi</span>
          <span class="text-sm text-gray-700">Tinggimoncong, Gowa</span>
        </div>
      </div>
      <div class="hidden lg:flex items-center gap-x-12">
        <a href="{{ route('home') }}" class="text-sm font-semibold text-gray-900">Home</a>
        <a href="#" class="text-sm font-semibold text-gray-900">Profile</a>
        <a href="{{ route('products') }}" class="text-sm font-semibold text-gray-900">Product</a>
        <a href="{{ route('documents') }}" class="text-sm font-semibold text-gray-900">Download</a>
        <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-900">Log in <span aria-hidden="true">&rarr;</span></a>
      </div>
    </nav>
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
        Kode Pos: 92174
      </p>
    </div>

    <!-- Navigasi -->
    <div>
      <h4 class="text-xl font-semibold mb-4">Navigasi</h4>
      <ul class="space-y-2 text-sm">
        <li><a href="#" class="hover:underline">Beranda</a></li>
        <li><a href="#" class="hover:underline">Profil Desa</a></li>
        <li><a href="#" class="hover:underline">Produk Unggulan</a></li>
        <li><a href="#" class="hover:underline">Kontak</a></li>
      </ul>
    </div>

    <!-- Kontak -->
    <div>
      <h4 class="text-xl font-semibold mb-4">Kontak</h4>
      <ul class="space-y-2 text-sm">
        <li>Email: <a href="mailto:info@desaparigi.id" class="hover:underline">info@desaparigi.id</a></li>
        <li>Telepon: 0821-1234-5678</li>
        <li>Facebook: <a href="#" class="hover:underline">fb.com/desaparigi</a></li>
        <li>Instagram: <a href="#" class="hover:underline">@desaparigi</a></li>
      </ul>
    </div>
  </div>

  <!-- Copyright -->
  <div class="bg-gray-800 text-center py-4 text-sm text-gray-400">
    &copy; 2025 Desa Parigi
  </div>
</footer>


<!-- Leaflet JS (tanpa integrity) -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" crossorigin=""></script>

<!-- Script Navbar -->
<script>
  window.addEventListener('scroll', function () {
    const navbar = document.getElementById('navbar');
    if (window.scrollY > 10) {
      navbar.classList.remove('bg-transparent');
      navbar.classList.add('bg-emerald-200', 'shadow-md');
    } else {
      navbar.classList.remove('bg-emerald-200', 'shadow-md');
      navbar.classList.add('bg-transparent');
    }
  });
</script>


@stack('scripts')
</body>
</html>
