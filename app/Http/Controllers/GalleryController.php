<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GalleryController extends Controller
{
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'type' => 'required|in:image,video',
            'file' => 'nullable|file|mimes:jpeg,png,jpg,mp4,avi|max:10240', // max 10MB
            'video_url' => 'nullable|url',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'type' => $request->type,
        ];

        if ($request->type === 'image' && $request->hasFile('file')) {
            $data['file_path'] = $request->file('file')->store('gallery', 'public');
        } elseif ($request->type === 'video') {
            if ($request->hasFile('file')) {
                $data['file_path'] = $request->file('file')->store('gallery', 'public');
            } else {
                $data['video_url'] = $request->video_url;
            }
        }

  

        return redirect()->back()->with('success', 'Galeri berhasil ditambahkan!');
    }
}
