<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
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
<body>
    
<div class="max-w-3xl mx-auto py-10 px-4">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Galeri</h1>

    <form action="{{ route('galeri.update', $gallery->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-xl shadow space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-sm font-medium text-gray-600">Judul</label>
            <input type="text" name="title" value="{{ old('title', $gallery->title) }}" class="w-full border rounded px-3 py-2 text-sm">
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-600">Deskripsi</label>
            <textarea name="description" class="w-full border rounded px-3 py-2 text-sm">{{ old('description', $gallery->description) }}</textarea>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-600">Tipe</label>
            <select name="type" class="w-full border rounded px-3 py-2 text-sm" required>
                <option value="image" {{ $gallery->type === 'image' ? 'selected' : '' }}>Gambar</option>
                <option value="video" {{ $gallery->type === 'video' ? 'selected' : '' }}>Video</option>
            </select>
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-600">Unggah File Baru (Opsional)</label>
            <input type="file" name="file_path" class="w-full text-sm">
            @if ($gallery->file_path)
                <p class="text-xs mt-1 text-gray-500">File saat ini: {{ $gallery->file_path }}</p>
            @endif
        </div>

        <div>
            <label class="block text-sm font-medium text-gray-600">Link Video (Opsional)</label>
            <input type="url" name="video_url" value="{{ old('video_url', $gallery->video_url) }}" class="w-full border rounded px-3 py-2 text-sm">
        </div>

        <div class="text-right">
            <a href="{{ route('dashboard.section', 'galeri') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg text-sm mr-2">Batal</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700">
                Simpan Perubahan
            </button>
        </div>
    </form>
</div>
</body>
</html>


