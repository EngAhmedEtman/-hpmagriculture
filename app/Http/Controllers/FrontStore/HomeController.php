<?php

namespace App\Http\Controllers\FrontStore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
    public function index()
    {
        $specialProducts = Product::where('is_active', 1)->where('is_special', 1)->get();
        
        // Fallback: If no special products, show latest products
        if ($specialProducts->isEmpty()) {
            $specialProducts = Product::where('is_active', 1)->latest()->take(8)->get();
        }

        return view('FrontStore.index', compact('specialProducts'));
    }
}
