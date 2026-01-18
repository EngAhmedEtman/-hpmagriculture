<?php

namespace App\Http\Controllers\FrontStore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
public function index()
{
    // بدلاً من ->get() استخدم ->paginate()
    $products = Product::all(); // 12 منتج في كل صفحة
    
    return view('FrontStore.products', compact('products'));
}
    
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('FrontStore.show', compact('product'));
}





}