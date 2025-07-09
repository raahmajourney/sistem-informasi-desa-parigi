<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\Product;
use App\Models\Dokumen;

class DashboardController extends Controller
{
    public function section($section)
    {
        if ($section === 'aktivitas') {
            $activities = Activity::latest()->get();
            return view('dashboard.index', compact('section', 'activities'));
        }

        if ($section === 'produk') {
            $products = Product::latest()->get();
            return view('dashboard.produk', compact('products'));
        }

      if ($section === 'dokumen') {
        $dokumens = Dokumen::latest()->get();
        return view('dashboard.dokumen', compact('section', 'dokumens'));
    }


        // Default: kembalikan view dashboard.[section]
        return view('dashboard.' . $section);
    }
}
