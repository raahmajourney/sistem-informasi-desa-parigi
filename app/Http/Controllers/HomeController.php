<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Dokumen;
use App\Models\Product;
use App\Models\Gallery; 

class HomeController extends Controller
{
    public function index()
    {
        $activities = Activity::latest()->take(6)->get(); 
        return view('home', compact('activities'));
    }

    public function documents()
    {
        $documents = Dokumen::latest()->get();
        return view('documents', compact('documents'));
    }

    public function products()
    {
        $products = Product::latest()->get();
        return view('products', compact('products'));
    }
    public function showProduct(Product $product)
    {
        return view('products-detail', compact('product'));
    }

    public function showActivity(Activity $activity)
    {
        return view('activity-detail', compact('activity'));
    }

    public function gallery()
    {
        $galleries = Gallery::latest()->get(); // Ambil semua galeri
        return view('gallery', compact('galleries'));
    }
}
