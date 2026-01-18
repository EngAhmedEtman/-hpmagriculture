<?php

namespace App\Http\Controllers\FrontStore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{

    public function add(Request $request)
    {
        $product = Product::findOrFail($request->id);
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity']++;
        } else {
            $cart[$product->id] = [
                "product_id" => $product->id,
                "name"       => $product->name,
                "quantity"   => 1,
                "price"      => $product->price,
                "image"      => $product->image
            ];
        }

        session()->put('cart', $cart);
        return response()->json(['success' => true, 'cart' => $cart]);
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }

        return view('FrontStore.cart', compact('cart', 'totalPrice'));
    }

    public function update(Request $request)
    {
        $cart = session()->get('cart', []);
        foreach ($request->quantities as $id => $quantity) {
            if (isset($cart[$id])) {
                $cart[$id]['quantity'] = $quantity;
            }
        }
        session()->put('cart', $cart);
        return redirect()->route('cart.index');
    }

    public function clearCart()
    {
        session()->forget('cart'); // مسح الكارت بالكامل
        return redirect()->route('cart.index')->with('success', 'تم مسح السلة بنجاح.');
    }

    
}
