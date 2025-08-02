<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Produk UMKM</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

</head>
<body class="bg-gray-100 font-sans antialiased">

    <div class="max-w-7xl mx-auto pt-5 pb-10 px-4">
        @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    @endif

      <div class="flex justify-between items-start mb-5 mt-16">
    <div class="flex flex-col mb-4">
        <div class="text-sm text-gray-700 font-semibold flex items-center gap-1 mb-2">
            <i class="fas fa-user"></i> {{ Auth::user()->name }}
        </div>
        <h1 class="text-3xl font-bold text-gray-800">Dashboard Produk</h1>
    </div>

    <!-- Kanan: Tombol Home & Logout -->
    <div class="flex gap-3">
        <a href="{{ route('home') }}" class="bg-gray-800 text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-700 transition flex items-center gap-1">
            <i class="fas fa-home"></i>
            Home
        </a>

        <form action="{{ route('logout') }}" method="POST" onsubmit="return confirm('Yakin ingin logout?')">
            @csrf
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-red-700 transition flex items-center gap-1">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </button>
        </form>
    </div>
</div>

    {{-- Navigasi --}}
    <nav class="bg-gray-50 border rounded-lg py-3 px-6 flex gap-6 mb-8 shadow-sm">
        <a href="{{ route('dashboard.section', 'aktivitas') }}" class="text-blue-600 font-medium hover:underline">Aktivitas Desa</a>
        <a href="{{ route('dashboard.section', 'produk') }}" class="text-sky-700 font-medium hover:underline">Produk UMKM</a>
        <a href="{{ route('dashboard.section', 'dokumen') }}" class="text-sky-400 font-medium hover:underline">Surat Administrasi</a>
        <a href="{{ route('dashboard.section', 'galeri') }}" class="text-sky-500 font-medium hover:underline">Gallery</a>
        <a href="{{ route('dashboard.section', 'edukasi') }}" class="text-indigo-700 font-medium hover:underline">Edukasi</a>
    </nav>

    {{-- Produk --}}
    <div class="bg-white shadow-md rounded-2xl p-6">
        <div class="flex justify-between items-center mb-5">
            <h2 class="text-xl font-semibold text-gray-800">Produk UMKM</h2>
            <button onclick="document.getElementById('modalProduk').classList.remove('hidden')" 
                    class="bg-sky-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-sky-700 transition">
                + Tambah Produk
            </button>
        </div>

        {{-- Tabel --}}
        <div class="overflow-x-auto">
           <table id="produkTable" class="w-full text-sm text-left border border-gray-200 rounded-lg overflow-hidden">
           <thead class="bg-gray-100 text-gray-700">
    <tr>
        <th class="px-4 py-3">Nama Produk</th>
        <th class="px-4 py-3">Deskripsi</th>
        <th class="px-4 py-3">Harga</th>
         <th class="px-4 py-3">Gambar</th>
        <th class="px-4 py-3">Aksi</th>
    </tr>
</thead>

        <tbody class="divide-y divide-gray-200">
            @foreach ($products as $product)
            <tr>
                <td class="px-4 py-3">{{ $product->title }}</td>
                <td class="px-4 py-3">{{ $product->description }}</td>
                <td class="px-4 py-3">Rp{{ number_format($product->price, 0, ',', '.') }}</td>
                <td class="px-4 py-3">
                    @if($product->image)
                        <img src="{{ asset('storage/' . $product->image) }}" alt="Produk" class="w-16 h-16 object-cover rounded">
                    @else
                        <span class="text-gray-400 text-sm italic">Tidak ada gambar</span>
                    @endif
                </td>
            
                    <td class="px-4 py-2 space-x-2">

                <a href="{{ route('produk.edit', $product) }}"class="text-yellow-600 hover:underline text-sm font-medium inline-flex items-center space-x-1">
                    <i class="fas fa-edit"></i>
                    <span>Edit</span>
                </a>


                <form action="{{ route('produk.destroy', $product) }}" method="POST" class="inline delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="button"
                        class="delete-button text-red-600 hover:underline text-sm font-medium inline-flex items-center space-x-1"
                        data-title="{{ $product->title }}">
                        <i class="fas fa-trash-alt"></i>
                        <span>Hapus</span>
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

{{-- Modal Tambah Produk --}}
<div id="modalProduk" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
    <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6 relative">
        <button onclick="document.getElementById('modalProduk').classList.add('hidden')" 
                class="absolute top-2 right-2 text-gray-500 hover:text-gray-700 text-lg">&times;</button>

        <h3 class="text-lg font-semibold mb-4 text-gray-700">Tambah Produk</h3>

        <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm font-medium text-gray-600">Nama Produk</label>
                <input type="text" name="title" required class="w-full border rounded px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600">Deskripsi</label>
                <textarea name="description" required class="w-full border rounded px-3 py-2 text-sm"></textarea>
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600">Harga</label>
                <input type="number" step="0.01" name="price" required class="w-full border rounded px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600">Link Kontak</label>
                <input type="url" name="contact_link" class="w-full border rounded px-3 py-2 text-sm">
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-600">Gambar</label>
                <input type="file" name="image" class="w-full text-sm">
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
        $('#produkTable').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
            }
        });
    });
</script>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('form');
            const title = this.getAttribute('data-title') || 'produk';

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: `Produk "${title}" akan dihapus secara permanen.`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#e3342f',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>


</body>
</html>
