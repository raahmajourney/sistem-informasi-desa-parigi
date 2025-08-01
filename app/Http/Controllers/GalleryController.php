<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Gallery;

class GalleryController extends Controller
{
    // Tampilkan semua item galeri
    public function index()
    {
        $galleries = Gallery::latest()->get();
        return view('dashboard.galeri', compact('galleries'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:image,video',
            'file_path' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mov,avi|max:51200', // max 50MB
            'video_url' => 'nullable|url',
        ]);

        $path = $request->file('file_path') ? $request->file('file_path')->store('galleries', 'public') : null;

        Gallery::create([
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
            'file_path' => $path,
            'video_url' => $request->video_url,
            'created_by' => Auth::id(),
        ]);

        return redirect()->back()->with('success', 'Item galeri berhasil ditambahkan.');
    }

    // Tampilkan form edit
    public function edit(Gallery $gallery)
    {
        return view('dashboard.edit-galeri', compact('gallery'));
    }

    // Update data galeri
    public function update(Request $request, Gallery $gallery)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:image,video',
            'file_path' => 'nullable|file|mimes:jpg,jpeg,png,mp4,mov,avi|max:51200',
            'video_url' => 'nullable|url',
        ]);

        if ($request->hasFile('file_path')) {
            if ($gallery->file_path) {
                Storage::disk('public')->delete($gallery->file_path);
            }

            $gallery->file_path = $request->file('file_path')->store('galleries', 'public');
        }

        $gallery->title = $request->title;
        $gallery->description = $request->description;
        $gallery->type = $request->type;
        $gallery->video_url = $request->video_url;
        $gallery->save();

        return redirect()->route('dashboard.section', 'galeri')->with('success', 'Item galeri berhasil diperbarui.');
    }

    // Hapus item galeri
    public function destroy(Gallery $gallery)
    {
        if ($gallery->file_path) {
            Storage::disk('public')->delete($gallery->file_path);
        }

        $gallery->delete();

        return redirect()->back()->with('success', 'Item galeri berhasil dihapus.');
    }
}
