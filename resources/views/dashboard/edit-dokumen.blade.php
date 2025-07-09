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

    <div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow mt-6">
    <h2 class="text-2xl font-bold mb-4">Edit Surat</h2>

    <form action="{{ route('dokumen.update', $dokumen->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium text-gray-700">Judul Surat</label>
            <input type="text" name="title" id="title" value="{{ old('title', $dokumen->title) }}" class="w-full border px-3 py-2 rounded-lg" required>
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-700">Deskripsi</label>
            <textarea name="description" id="description" rows="4" class="w-full border px-3 py-2 rounded-lg">{{ old('description', $dokumen->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium text-gray-700">File Saat Ini</label>
            <a href="{{ asset('storage/' . $dokumen->file_path) }}" target="_blank" class="text-blue-600 hover:underline">
                {{ basename($dokumen->file_path) }}
            </a>
        </div>

        <div class="mb-4">
            <label for="file" class="block text-sm font-medium text-gray-700">Ganti File (Opsional)</label>
            <input type="file" name="file" id="file" accept=".pdf,.doc,.docx" class="w-full">
        </div>

        <div class="flex justify-end">
            <a href="{{ route('dashboard.section', 'dokumen') }}" class="px-4 py-2 bg-gray-300 rounded-lg mr-2">Batal</a>
            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Update</button>
        </div>
    </form>
</div>

</body>
</html>
