<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dokumen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DokumenController extends Controller
{

    public function index()
    {
        $dokumens = Dokumen::latest()->get();
        return view('dashboard.dokumen', [
            'dokumens' => $dokumens,
            'section' => 'dokumen',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $filePath = $request->file('file')->store('surat', 'public');

        Dokumen::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $filePath,
            'created_by' => Auth::id(), // pastikan user login
        ]);

        return redirect()->back()->with('success', 'Surat berhasil ditambahkan.');
    }

    public function destroy(Dokumen $dokumen)
    {
        // Hapus file fisik jika ada
        if ($dokumen->file_path && Storage::disk('public')->exists($dokumen->file_path)) {
            Storage::disk('public')->delete($dokumen->file_path);
        }

        // Hapus data dari database
        $dokumen->delete();

        return redirect()->back()->with('success', 'Surat berhasil dihapus.');
    }


    public function edit(Dokumen $dokumen)
    {
        return view('dashboard.edit-dokumen', compact('dokumen'));
    }

    public function update(Request $request, Dokumen $dokumen)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        // Update file jika diunggah
        if ($request->hasFile('file')) {
            if ($dokumen->file_path && Storage::disk('public')->exists($dokumen->file_path)) {
                Storage::disk('public')->delete($dokumen->file_path);
            }
            $dokumen->file_path = $request->file('file')->store('surat', 'public');
        }

        // Update data lainnya
        $dokumen->update([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $dokumen->file_path,
        ]);

        return redirect()->route('dashboard.section', 'dokumen')->with('success', 'Surat berhasil diperbarui.');
    }


}
