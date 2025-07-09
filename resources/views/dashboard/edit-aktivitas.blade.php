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

<div class="max-w-3xl mx-auto bg-white p-6 rounded shadow mt-10">
    <h2 class="text-2xl font-bold mb-4 text-gray-800">Edit Aktivitas</h2>

    <form action="{{ route('aktivitas.update', $activity) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm text-gray-700 mb-1">Judul Aktivitas</label>
            <input type="text" name="title" value="{{ old('title', $activity->title) }}" class="w-full border rounded px-3 py-2 text-sm" required>
        </div>

        <div>
            <label class="block text-sm text-gray-700 mb-1">Konten</label>
            <textarea name="content" class="w-full border rounded px-3 py-2 text-sm" required>{{ old('content', $activity->content) }}</textarea>
        </div>

        <div>
            <label class="block text-sm text-gray-700 mb-1">Penulis</label>
            <input type="text" name="author" value="{{ old('author', $activity->author) }}" class="w-full border rounded px-3 py-2 text-sm" required>
        </div>

        <div>
            <label class="block text-sm text-gray-700 mb-1">Tanggal Kegiatan</label>
            <input type="date" name="activity_date" value="{{ old('activity_date', date('Y-m-d', strtotime($activity->activity_date))) }}" class="..." required>

        </div>

        <div>
            <label class="block text-sm text-gray-700 mb-1">Gambar (biarkan kosong jika tidak diganti)</label>
            <input type="file" name="image" class="w-full text-sm">
            @if ($activity->image)
                <img src="{{ asset('storage/' . $activity->image) }}" alt="Gambar Saat Ini" class="mt-2 h-16 w-16 object-cover rounded">
            @endif
        </div>

        <div class="text-right">
            <a href="{{ route('aktivitas.index') }}" class="mr-4 text-sm text-gray-600 hover:underline">Batal</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700 transition">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>







</body>
</html>
