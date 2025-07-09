<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Desa Parigi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="max-w-7xl mx-auto pt-5 pb-10 px-4">
        <h1 class="text-3xl font-bold mb-8 text-gray-800">Dashboard</h1>

        {{-- Navigasi --}}
        <nav class="bg-gray-50 border rounded-lg py-3 px-6 flex gap-6 mb-8 shadow-sm">
            <a href="{{ route('dashboard.section', 'aktivitas') }}" class="text-blue-700 font-medium hover:underline {{ $section === 'aktivitas' ? 'underline font-bold' : '' }}">Aktivitas Desa</a>
            <a href="{{ route('dashboard.section', 'produk') }}" class="text-green-700 font-medium hover:underline {{ $section === 'produk' ? 'underline font-bold' : '' }}">Produk UMKM</a>
            <a href="{{ route('dashboard.section', 'dokumen') }}" class="text-indigo-700 font-medium hover:underline {{ $section === 'dokumen' ? 'underline font-bold' : '' }}">Surat Administrasi</a>
        </nav>

        {{-- Card Surat --}}
        <div class="bg-white shadow-md rounded-2xl p-6">
            <div class="flex justify-between items-center mb-5">
                <h2 class="text-xl font-semibold text-gray-800">Surat Administrasi</h2>
                <button class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition">
                    + Tambah Surat
                </button>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-sm text-left border border-gray-200 rounded-lg overflow-hidden">
                    <thead class="bg-gray-100 text-gray-700">
                        <tr>
                            <th class="px-4 py-3">Judul Surat</th>
                            <th class="px-4 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @for ($i = 0; $i < 5; $i++)
                        <tr>
                            <td class="px-4 py-3">Surat {{ $i + 1 }}</td>
                            <td class="px-4 py-3 space-x-3">
                                <a href="#" class="text-blue-600 hover:underline text-sm font-medium">Unduh</a>
                                <button class="text-yellow-500 hover:text-yellow-600 text-sm font-medium">Edit</button>
                                <button class="text-red-500 hover:text-red-600 text-sm font-medium">Hapus</button>
                            </td>
                        </tr>
                        @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
