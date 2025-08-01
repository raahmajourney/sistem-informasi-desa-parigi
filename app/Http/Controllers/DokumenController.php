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
        'form_link' => 'required|url|max:2048',
    ]);

    Dokumen::create([
        'title' => $request->title,
        'description' => $request->description,
        'form_link' => $request->form_link,
        'created_by' => Auth::id(),
    ]);

    return redirect()->back()->with('success', 'Surat berhasil ditambahkan.');
}



    public function destroy(Dokumen $dokumen)
    {
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
            'form_link' => 'required|url|max:2048',
        ]);

        $dokumen->update([
            'title' => $request->title,
            'description' => $request->description,
            'form_link' => $request->form_link,
        ]);

        return redirect()->route('dashboard.section', 'dokumen')->with('success', 'Link surat berhasil diperbarui.');
    }



}
