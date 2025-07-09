<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 font-sans p-6">
    <div class="max-w-xl mx-auto bg-white shadow-md rounded-xl p-6">
        <h1 class="text-2xl font-bold mb-6 text-gray-800">Edit Produk</h1>

        <form action="{{ route('produk.update', $product) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700">Nama Produk</label>
                <input type="text" name="title" value="{{ old('title', $product->title) }}" required class="w-full border rounded px-3 py-2 text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Deskripsi</label>
                <textarea name="description" required class="w-full border rounded px-3 py-2 text-sm">{{ old('description', $product->description) }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Harga</label>
                <input type="number" name="price" value="{{ old('price', $product->price) }}" required class="w-full border rounded px-3 py-2 text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Link Kontak</label>
                <input type="url" name="contact_link" value="{{ old('contact_link', $product->contact_link) }}" class="w-full border rounded px-3 py-2 text-sm">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Gambar Saat Ini</label>
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="w-20 h-20 object-cover rounded mb-2">
                @else
                    <p class="text-gray-500 text-sm italic">Tidak ada gambar</p>
                @endif
                <input type="file" name="image" class="w-full text-sm">
            </div>

            <div class="flex justify-between">
                <a href="{{ route('dashboard.section', 'produk') }}" class="text-gray-600 hover:underline text-sm">← Kembali</a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</body>
</html>
