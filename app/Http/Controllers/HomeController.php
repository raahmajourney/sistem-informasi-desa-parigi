<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;

class HomeController extends Controller
{
    public function index()
{
    $activities = Activity::latest()->take(6)->get(); // Ambil 6 aktivitas terbaru
    return view('home', compact('activities'));
}
}
