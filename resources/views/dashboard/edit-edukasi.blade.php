<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Edukasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans antialiased">

<div class="max-w-3xl mx-auto py-10 px-4">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Edukasi</h1>

    <div class="bg-white shadow-md rounded-xl p-6">
        <form action="{{ route('edukasi.update', $education->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-medium text-gray-600 mb-1">Judul</label>
                <input type="text" name="title" id="title" value="{{ old('title', $education->title) }}" required
                       class="w-full border rounded px-3 py-2 text-sm">
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-600 mb-1">Deskripsi</label>
                <textarea name="description" id="description" rows="4" required
                          class="w-full border rounded px-3 py-2 text-sm">{{ old('description', $education->description) }}</textarea>
            </div>

            <div>
                <label for="file" class="block text-sm font-medium text-gray-600 mb-1">Ganti File PDF (opsional)</label>
                <input type="file" name="file" id="file" accept="application/pdf"
                       class="w-full text-sm">
                @if ($education->file)
                    <p class="text-sm mt-2">
                        File saat ini: <a href="{{ asset('storage/' . $education->file) }}" target="_blank" class="text-blue-600 hover:underline">
                            Lihat PDF
                        </a>
                    </p>
                @endif
            </div>

            <div class="text-right">
                <a href="{{ route('dashboard.section', 'edukasi') }}" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg text-sm mr-2 hover:bg-gray-400">
                    Batal
                </a>
                <button type="submit" class="bg-sky-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-sky-700">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>
