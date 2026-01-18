<?php

namespace App\Http\Controllers\FrontStore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;

class OrderController extends Controller
{
    public function index($totalPrice)
    {
        return view('FrontStore.order', compact('totalPrice'));
    }

    public function store(Request $request)
    {

        // dd(session('cart'));
        $cart = session('cart', []);

        $totalPrice = $request->input('totalPrice');

        $request->validate([
            'fullName' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'phone2' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'government' => 'required|string|max:100',
            'city' => 'required|string|max:100',
            'address' => 'required|string',
        ]);

        $order = Order::create([
            'customer_name' => $request->input('fullName'),
            'customer_phone_one' => $request->input('phone'),
            'customer_phone_two' => $request->input('phone2'),
            'customer_email' => $request->input('email'),
            'customer_governoment' => $request->input('government'),
            'customer_town' => $request->input('city'),
            'customer_address' => $request->input('address'),
            'total_price' => $request->input('totalPrice'),
        ]);

        foreach ($cart as $productId => $item) {
            OrderItem::create([
                'order_id'     => $order->id,         
                'product_id' => $item['product_id'],       
                'quantity'     => $item['quantity'],  
                'price'        => $item['price'],     
            ]);
        }

        session()->forget('cart'); 

        return redirect()->route('confirmOrder', $totalPrice)->with('success', 'تم استلام طلبك بنجاح! سنتواصل معك قريبًا.');
    }
}
