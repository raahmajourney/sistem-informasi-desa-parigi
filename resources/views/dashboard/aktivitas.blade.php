<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Aktivitas Desa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

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


<div class="max-w-7xl mx-auto pt-5 pb-8 px-4">

    {{-- Tombol Kembali ke Home --}}
    <div class="flex justify-end mb-4">
        <a href="{{ route('home') }}" class="bg-gray-800 text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-700 transition">
            Kembali ke Home
        </a>
    </div>

    <h1 class="text-3xl font-bold mb-8 text-gray-800">Dashboard</h1>

    {{-- Navigasi --}}
    <nav class="bg-gray-50 border rounded-lg py-3 px-6 flex gap-6 mb-8 shadow-sm">
        <a href="{{ route('dashboard.section', 'aktivitas') }}" class="text-blue-700 font-medium hover:underline underline">Aktivitas Desa</a>
        <a href="{{ route('dashboard.section', 'produk') }}" class="text-green-700 font-medium hover:underline">Produk UMKM</a>
        <a href="{{ route('dashboard.section', 'dokumen') }}" class="text-indigo-700 font-medium hover:underline">Surat Administrasi</a>
    </nav>

    {{-- Aktivitas --}}
    <div class="bg-white shadow-md rounded-2xl p-6">
        <div class="flex justify-between items-center mb-5">
            <h2 class="text-xl font-semibold text-gray-800">Aktivitas Desa</h2>
            <button onclick="openModal()" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition">
                + Tambah Aktivitas
            </button>
        </div>

        <div class="overflow-x-auto">
            <table id="activityTable" class="min-w-full text-sm text-left border border-gray-200 rounded-lg">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-3">Judul</th>
                        <th class="px-4 py-3">Konten</th>
                        <th class="px-4 py-3">Penulis</th>
                        <th class="px-4 py-3">Tanggal</th>
                        <th class="px-4 py-3">Gambar</th>
                        <th class="px-4 py-3">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($activities as $activity)
                    <tr>
                        <td class="px-4 py-2">{{ $activity->title }}</td>
                        <td class="px-4 py-2">{{ Str::limit($activity->content, 50) }}</td>
                        <td class="px-4 py-2">{{ $activity->author }}</td>
                        <td class="px-4 py-2">{{ \Carbon\Carbon::parse($activity->activity_date)->format('d M Y') }}</td>
                        <td class="px-4 py-2">
                            @if ($activity->image)
                                <img src="{{ asset('storage/' . $activity->image) }}" alt="img" class="h-12 w-12 rounded object-cover">
                            @else
                                <span class="text-gray-400 text-sm italic">-</span>
                            @endif
                        </td>

                    <td class="px-4 py-2 space-x-2">

                        <a href="{{ route('aktivitas.edit', $activity) }}"
                        class="text-yellow-600 hover:underline text-sm font-medium inline-flex items-center space-x-1">
                            <i class="fas fa-edit"></i>
                            <span>Edit</span>
                        </a>

                            <form action="{{ route('aktivitas.destroy', $activity) }}" method="POST" class="inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="button"
                                class="delete-button text-red-600 hover:underline text-sm font-medium inline-flex items-center space-x-1"
                                data-title="{{ $activity->title }}">
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

{{-- Modal Tambah Aktivitas --}}
<div id="addModal" class="fixed inset-0 z-50 flex items-center justify-center hidden bg-black/50">
    <div class="bg-white rounded-lg shadow-lg w-full max-w-xl p-6 relative">
        <button onclick="closeModal()" class="absolute top-3 right-3 text-gray-500 hover:text-gray-700 text-lg">✕</button>

        <h3 class="text-lg font-semibold mb-4 text-gray-800">Tambah Aktivitas</h3>

        <form action="{{ route('aktivitas.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            <div>
                <label class="block text-sm text-gray-700 mb-1">Judul Aktivitas</label>
                <input type="text" name="title" class="w-full border rounded px-3 py-2 text-sm" required>
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Konten</label>
                <textarea name="content" class="w-full border rounded px-3 py-2 text-sm" required></textarea>
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Penulis</label>
                <input type="text" name="author" class="w-full border rounded px-3 py-2 text-sm" required>
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Tanggal Kegiatan</label>
                <input type="date" name="activity_date" class="w-full border rounded px-3 py-2 text-sm" required>
            </div>
            <div>
                <label class="block text-sm text-gray-700 mb-1">Gambar</label>
                <input type="file" name="image" class="w-full text-sm">
            </div>
            <div class="text-right">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition">
                    Publish
                </button>
            </div>
        </form>
    </div>
</div>

{{-- Script --}}
<script>
    $(document).ready(function () {
        $('#activityTable').DataTable({
            responsive: true,
            pageLength: 5,
            language: {
                search: "Cari:",
                lengthMenu: "Tampilkan _MENU_ entri",
                info: "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                paginate: {
                    next: "Berikutnya",
                    previous: "Sebelumnya"
                }
            }
        });
    });

    function openModal() {
        document.getElementById('addModal').classList.remove('hidden');
    }

    function closeModal() {
        document.getElementById('addModal').classList.add('hidden');
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.querySelectorAll('.delete-button').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('form');
            const title = this.getAttribute('data-title') || 'aktivitas';

            Swal.fire({
                title: 'Yakin ingin menghapus?',
                text: `Aktivitas "${title}" akan dihapus secara permanen.`,
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
