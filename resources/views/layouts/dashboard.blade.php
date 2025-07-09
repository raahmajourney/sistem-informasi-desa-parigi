<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@4.0.0/dist/tailwind.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="max-w-7xl mx-auto pt-5 pb-10 px-4">
        {{-- Navigasi --}}
        <nav class="bg-gray-50 border rounded-lg py-3 px-6 flex gap-6 mb-8 shadow-sm">
            <a href="{{ route('dashboard.section', 'aktivitas') }}" class="text-blue-700 font-medium hover:underline">Aktivitas Desa</a>
            <a href="{{ route('dashboard.section', 'produk') }}" class="text-green-700 font-medium hover:underline">Produk UMKM</a>
            <a href="{{ route('dashboard.section', 'dokumen') }}" class="text-indigo-700 font-medium hover:underline">Surat Administrasi</a>
        </nav>

        {{-- Konten halaman --}}
        @yield('content')
    </div>

    {{-- Script tambahan --}}
    @yield('scripts')

</body>
</html>
