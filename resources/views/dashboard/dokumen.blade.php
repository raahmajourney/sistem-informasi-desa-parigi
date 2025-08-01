<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Surat Administrasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

    <!-- Tombol Kembali -->
    <div class="flex justify-end mb-4">
        <a href="{{ route('home') }}" class="bg-gray-800 text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-700 transition">
            <i class="fas fa-home mr-2"></i>Kembali ke Home
        </a>
    </div>

    <h1 class="text-3xl font-bold mb-8 text-gray-800">Dashboard</h1>

    <!-- Navigasi -->
    <nav class="bg-gray-50 border rounded-lg py-3 px-6 flex gap-6 mb-8 shadow-sm">
        <a href="{{ route('dashboard.section', 'aktivitas') }}" class="text-blue-700 font-medium hover:underline {{ $section === 'aktivitas' ? 'underline font-bold' : '' }}">Aktivitas Desa</a>
        <a href="{{ route('dashboard.section', 'produk') }}" class="text-green-700 font-medium hover:underline {{ $section === 'produk' ? 'underline font-bold' : '' }}">Produk UMKM</a>
        <a href="{{ route('dashboard.section', 'dokumen') }}" class="text-indigo-700 font-medium hover:underline {{ $section === 'dokumen' ? 'underline font-bold' : '' }}">Surat Administrasi</a>        <a href="{{ route('dashboard.section', 'galeri') }}" class="text-indigo-700 font-medium hover:underline">Gallery</a>
        <a href="#" class="text-indigo-700 font-medium hover:underline">Edukasi</a>
    </nav>

    <!-- Dokumen -->
    <div class="bg-white shadow-md rounded-2xl p-6">
        <div class="flex justify-between items-center mb-5">
            <h2 class="text-xl font-semibold text-gray-800">Surat Administrasi</h2>
            <button onclick="bukaModal()" class="bg-indigo-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-indigo-700 transition">
                + Tambah Surat
            </button>
        </div>

        <div class="overflow-x-auto">
            <table id="dokumenTable" class="w-full text-sm text-left border border-gray-200 rounded-lg overflow-hidden">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-3">Judul Surat</th>
                        <th class="px-4 py-3">Deskripsi</th>
                        <th class="px-4 py-3">File</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach($dokumens as $dokumen)
                    <tr>
                        <td class="px-4 py-3">{{ $dokumen->title }}</td>
                         <td class="px-4 py-3 text-gray-600">{{ $dokumen->description }}</td>
                        <td class="px-4 py-3">
                            <a href="{{ $dokumen->form_link }}" target="_blank"
                            class="text-indigo-600 hover:underline text-sm font-medium inline-flex items-center space-x-1">
                                <i class="fas fa-link"></i><span>Lihat Form</span>
                            </a>
                        </td>

                        <td class="px-4 py-3 space-x-3">
                            <!-- Tambahkan tombol edit jika diperlukan -->

                             <a href="{{ route('dokumen.edit', $dokumen->id) }}"
                            class="text-yellow-600 hover:underline text-sm font-medium inline-flex items-center space-x-1">
                                <i class="fas fa-edit"></i>
                                <span>Edit</span>
                            </a>

                            <form action="{{ route('dokumen.destroy', $dokumen->id) }}" method="POST" class="inline delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                    class="text-red-600 hover:underline text-sm font-medium inline-flex items-center space-x-1 delete-button"
                                    data-title="{{ $dokumen->title }}">
                                    <i class="fas fa-trash-alt"></i><span>Hapus</span>
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

<!-- Modal Tambah Surat -->
<div id="modalTambah" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-xl shadow-lg max-w-md w-full p-6 relative">
        <h3 class="text-lg font-semibold mb-4 text-gray-800">Tambah Surat Baru</h3>
    <form action="{{ route('dokumen.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul Surat</label>
            <input type="text" name="title" id="title" required class="w-full border border-gray-300 rounded-lg px-3 py-2">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
            <textarea name="description" id="description" rows="3" class="w-full border border-gray-300 rounded-lg px-3 py-2"></textarea>
        </div>
        <div class="mb-4">
            <label for="form_link" class="block text-sm font-medium text-gray-700 mb-1">Tautan Form (Google Form)</label>
            <input type="url" name="form_link" id="form_link" required class="w-full border border-gray-300 rounded-lg px-3 py-2">
        </div>
        <div class="flex justify-end mt-6 gap-2">
            <button type="button" onclick="tutupModal()" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400 text-sm">Batal</button>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 text-sm">Simpan</button>
        </div>
    </form>

        <button onclick="tutupModal()" class="absolute top-2 right-3 text-gray-500 hover:text-red-500 text-lg">&times;</button>
    </div>
</div>

<!-- Script Modal + DataTable -->
<script>
    function bukaModal() {
        const modal = document.getElementById('modalTambah');
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function tutupModal() {
        const modal = document.getElementById('modalTambah');
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }

    $(document).ready(function () {
        $('#dokumenTable').DataTable({
            language: {
                url: "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
            }
        });

        // SweetAlert untuk hapus
        $('.delete-button').on('click', function () {
            const form = $(this).closest('form');
            const title = $(this).data('title');

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: `Surat "${title}" akan dihapus permanen.`,
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
