<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@4.0.0/dist/tailwind.min.css" rel="stylesheet">
    
    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="max-w-7xl mx-auto pb-10 px-4">
        {{-- Konten Berdasarkan Menu --}}
        <div>
            @if ($section === 'aktivitas')
                @include('dashboard.aktivitas')
            @elseif ($section === 'produk')
                @include('dashboard.produk')
            @elseif ($section === 'dokumen')
                @include('dashboard.dokumen')
            @elseif ($section === 'gallery')
                @include('dashboard.gallery')
            @else
                <p class="text-red-500">Halaman tidak ditemukan.</p>
            @endif
        </div>
    </div>

</body>
</html>
