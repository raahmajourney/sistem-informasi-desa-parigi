<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function index()
    {
        $activities = Activity::latest()->get();
        return view('dashboard.aktivitas', compact('activities'));
    }

   public function store(Request $request)
{
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'image' => 'nullable|image|max:2048',
        'author' => 'required|string|max:255',
        'activity_date' => 'required|date',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('activities', 'public');
    }

    Activity::create([
        'title' => $request->title,
        'content' => $request->content,
        'image' => $imagePath,
        'author' => $request->author,
        'activity_date' => $request->activity_date,
        'created_by' => Auth::id(),
    ]);

    return back()->with('success', 'Aktivitas berhasil ditambahkan.');
}

    public function destroy(Activity $activity)
    {
        if ($activity->image) {
            Storage::disk('public')->delete($activity->image);
        }

        $activity->delete();
        return back()->with('success', 'Aktivitas dihapus.');
    }

    public function show(Activity $activity)
    {
        return view('aktivitas.show', compact('activity'));
    }


    public function edit(Activity $activity)
    {
        return view('dashboard.edit-aktivitas', compact('activity'));
    }



    public function update(Request $request, Activity $activity)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'required|string|max:255',
            'activity_date' => 'required|date',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($activity->image) {
                Storage::disk('public')->delete($activity->image);
            }
            $activity->image = $request->file('image')->store('activities', 'public');
        }

        $activity->update([
            'title' => $request->title,
            'content' => $request->content,
            'author' => $request->author,
            'activity_date' => $request->activity_date,
            'image' => $activity->image,
        ]);

        return redirect()->route('aktivitas.index')->with('success', 'Aktivitas berhasil diperbarui.');
    }


}
