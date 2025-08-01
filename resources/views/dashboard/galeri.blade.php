<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Galeri</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body class="bg-gray-100 font-sans antialiased">

<div class="max-w-7xl mx-auto pt-5 pb-10 px-4">
    <div class="flex justify-end mb-4">
        <a href="{{ route('home') }}" class="bg-gray-800 text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-700">Kembali ke Home</a>
    </div>

      <h1 class="text-3xl font-bold mb-8 text-gray-800">Dashboard</h1>

    {{-- Navigasi --}}
    <nav class="bg-gray-50 border rounded-lg py-3 px-6 flex gap-6 mb-8 shadow-sm">
        <a href="{{ route('dashboard.section', 'aktivitas') }}" class="text-blue-700 font-medium hover:underline underline">Aktivitas Desa</a>
        <a href="{{ route('dashboard.section', 'produk') }}" class="text-green-700 font-medium hover:underline">Produk UMKM</a>
        <a href="{{ route('dashboard.section', 'dokumen') }}" class="text-indigo-700 font-medium hover:underline">Surat Administrasi</a>
        <a href="{{ route('dashboard.section', 'galeri') }}" class="text-indigo-700 font-medium hover:underline">Gallery</a>
        <a href="#" class="text-indigo-700 font-medium hover:underline">Edukasi</a>
    </nav>

    <div class="bg-white shadow-md rounded-2xl p-6">
        <div class="flex justify-between items-center mb-5">
            <h2 class="text-xl font-semibold text-gray-800">Galeri Desa</h2>
            <button onclick="document.getElementById('modalGaleri').classList.remove('hidden')"
                    class="bg-sky-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-sky-700">
                + Tambah Galeri
            </button>
        </div>

        <div class="overflow-x-auto">
            <table id="galeriTable" class="w-full text-sm text-left border border-gray-200 rounded-lg">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-3">Judul</th>
                        <th class="px-4 py-3">Deskripsi</th>
                        <th class="px-4 py-3">Tipe</th>
                        <th class="px-4 py-3">Preview</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                   @foreach ($galleries as $item)
                    <tr>
                        <td class="px-4 py-3">{{ $item->title }}</td>
                        <td class="px-4 py-3">{{ $item->description }}</td>
                        <td class="px-4 py-3">{{ ucfirst($item->type) }}</td>
                        <td class="px-4 py-3">
                            @if ($item->type === 'image')
                                <img src="{{ asset('storage/' . $item->file_path) }}" class="w-20 h-20 object-cover rounded">
                            @elseif ($item->type === 'video')
                                @if ($item->file_path)
                                    <video src="{{ asset('storage/' . $item->file_path) }}" class="w-32 h-20" controls></video>
                                @elseif ($item->video_url)
                                    <video src="{{ $item->video_url }}" class="w-32 h-20" controls></video>
                                @endif
                            @endif
                        </td>
                        <td class="px-4 py-2 space-x-2">
                            <form action="{{ route('galeri.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus item ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 text-sm hover:underline">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modal Tambah Galeri --}}
<div id="modalGaleri" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6 relative">
        <button onclick="document.getElementById('modalGaleri').classList.add('hidden')"
                class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-lg">&times;</button>

        <h3 class="text-lg font-semibold mb-4 text-gray-700">Tambah Galeri</h3>

        <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-600">Judul</label>
                <input type="text" name="title" required class="w-full border rounded px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600">Deskripsi</label>
                <textarea name="description" class="w-full border rounded px-3 py-2 text-sm"></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600">Tipe</label>
                <select name="type" required class="w-full border rounded px-3 py-2 text-sm">
                    <option value="image">Gambar</option>
                    <option value="video">Video</option>
                </select>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600">Unggah File (Opsional)</label>
                <input type="file" name="file_path" class="w-full text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600">Link Video (Opsional)</label>
                <input type="url" name="video_url" class="w-full border rounded px-3 py-2 text-sm">
            </div>
            <div class="text-right">
                <button type="submit" class="bg-sky-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-sky-700">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#galeriTable').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
            }
        });
    });
</script>

</body>
</html>