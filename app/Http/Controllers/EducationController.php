<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EducationController extends Controller
{
    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        $path = $request->file('file')->store('educations', 'public');

        Education::create([
            'title' => $request->title,
            'description' => $request->description,
            'file' => $path,
        ]);

        return redirect()->back()->with('success', 'Edukasi berhasil ditambahkan.');
    }

    // Tampilkan form edit
    public function edit(Education $education)
    {
        return view('dashboard.edit-edukasi', compact('education'));
    }

    // Update data
    public function update(Request $request, Education $education)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'file' => 'nullable|mimes:pdf|max:2048',
        ]);

        $data = [
            'title' => $request->title,
            'description' => $request->description,
        ];

        if ($request->hasFile('file')) {
            if ($education->file && Storage::disk('public')->exists($education->file)) {
                Storage::disk('public')->delete($education->file);
            }

            $data['file'] = $request->file('file')->store('educations', 'public');
        }

        $education->update($data);

        return redirect()->route('dashboard.section', 'edukasi')->with('success', 'Edukasi berhasil diperbarui.');
    }

    // Hapus data
    public function destroy(Education $education)
    {
        if ($education->file && Storage::disk('public')->exists($education->file)) {
            Storage::disk('public')->delete($education->file);
        }

        $education->delete();

        return redirect()->back()->with('success', 'Edukasi berhasil dihapus.');
    }
}
