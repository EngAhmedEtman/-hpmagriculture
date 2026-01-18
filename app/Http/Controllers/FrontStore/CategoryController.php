<?php

namespace App\Http\Controllers\FrontStore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::where('is_active', true)->get();
        return view('FrontStore.layouts.nav', compact('categories'));
    }

    public function getCategorProducts($id)
    {
        $category = Category::findOrFail($id);
        $products = $category->products()->where('is_active', true)->get();
        return view('FrontStore.products', compact('category', 'products'));
    }
}
