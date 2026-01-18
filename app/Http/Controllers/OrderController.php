<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of orders.
     */
    public function index()
    {
        $orders = Order::with('orderItems.product')
            ->latest()
            ->paginate(10); // 15 طلب في الصفحة

        // حساب إجمالي المبيعات (كل الطلبات)
        $totalSales = Order::sum('total_price');

        return view('adminDashboard.orders.index', compact('orders', 'totalSales'));
    }

    /**
     * Display the specified order.
     */
    public function show(Order $order)
    {
        $order->load('orderItems.product');
        return view('adminDashboard.orders.show', compact('order'));
    }

    /**
     * Show the form for editing the specified order.
     */
    public function edit(Order $order)
    {
        $order->load('orderItems.product');
        $products = Product::where('is_active', true)->get();
        return view('adminDashboard.orders.edit', compact('order', 'products'));
    }

    /**
     * Update the specified order in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validated = $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'nullable|email|max:255',
            'customer_phone_one' => 'required|string|max:20',
            'customer_phone_two' => 'nullable|string|max:20',
            'customer_governoment' => 'required|string|max:255',
            'customer_town' => 'required|string|max:255',
            'customer_address' => 'required|string',
            'delivery_price' => 'required|numeric|min:0',
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled',
            'items' => 'required|array|min:1',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.price' => 'required|numeric|min:0',
        ], [
            'customer_name.required' => 'اسم العميل مطلوب',
            'customer_phone_one.required' => 'رقم الهاتف الأول مطلوب',
            'customer_governoment.required' => 'المحافظة مطلوبة',
            'customer_town.required' => 'المدينة مطلوبة',
            'customer_address.required' => 'العنوان مطلوب',
            'delivery_price.required' => 'سعر التوصيل مطلوب',
            'status.required' => 'حالة الطلب مطلوبة',
            'items.required' => 'يجب إضافة منتج واحد على الأقل',
            'items.min' => 'يجب إضافة منتج واحد على الأقل',
        ]);

        // Update order basic info
        $order->update([
            'customer_name' => $validated['customer_name'],
            'customer_email' => $validated['customer_email'],
            'customer_phone_one' => $validated['customer_phone_one'],
            'customer_phone_two' => $validated['customer_phone_two'],
            'customer_governoment' => $validated['customer_governoment'],
            'customer_town' => $validated['customer_town'],
            'customer_address' => $validated['customer_address'],
            'delivery_price' => $validated['delivery_price'],
            'status' => $validated['status'],
        ]);

        // Delete old order items
        $order->orderItems()->delete();

        // Calculate total
        $total = 0;

        // Create new order items
        foreach ($validated['items'] as $item) {
            $order->orderItems()->create([
                'product_id' => $item['product_id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
            $total += $item['quantity'] * $item['price'];
        }

        // Update total price
        $order->update([
            'total_price' => $total + $validated['delivery_price']
        ]);

        return redirect()->route('orders.show', $order->id)->with([
            'message' => 'تم تحديث الطلب بنجاح!',
            'alert-type' => 'success'
        ]);
    }


    public function pending()
    {
        $orders = Order::with('orderItems.product')
            ->where('status', 'pending')
            ->latest()
            ->paginate(15);

        $totalSales = Order::where('status', 'pending')->sum('total_price');

        return view('adminDashboard.orders.pending', compact('orders', 'totalSales'));
    }

    /**
     * Display delivered orders.
     */
    public function delivered()
    {
        $orders = Order::with('orderItems.product')
            ->where('status', 'delivered')
            ->latest()
            ->paginate(15);

        $totalSales = Order::where('status', 'delivered')->sum('total_price');

        return view('adminDashboard.orders.delivered', compact('orders', 'totalSales'));
    }

        public function processing()
    {
        $orders = Order::with('orderItems.product')
            ->where('status', 'processing')
            ->latest()
            ->paginate(15);

        $totalSales = Order::where('status', 'processing')->sum('total_price');

        return view('adminDashboard.orders.processing', compact('orders', 'totalSales'));
    }

    public function shipped()
    {
        $orders = Order::with('orderItems.product')
            ->where('status', 'shipped')
            ->latest()
            ->paginate(15);

        $totalSales = Order::where('status', 'shipped')->sum('total_price');

        return view('adminDashboard.orders.shipped', compact('orders', 'totalSales'));
    }


     public function cancelled()
    {
        $orders = Order::with('orderItems.product')
            ->where('status', 'cancelled')
            ->latest()
            ->paginate(15);

        $totalSales = Order::where('status', 'cancelled')->sum('total_price');

        return view('adminDashboard.orders.cancelled', compact('orders', 'totalSales'));
    }


    /**
     * Remove the specified order from storage.
     */
    public function destroy(Order $order)
    {
        // Delete order items first
        $order->orderItems()->delete();

        // Delete order
        $order->delete();

        return redirect()->route('orders.index')->with([
            'message' => 'تم حذف الطلب بنجاح!',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Update order status.
     */
    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,shipped,delivered,cancelled'
        ]);

        $order->update(['status' => $validated['status']]);

        $statusNames = [
            'pending' => 'قيد الانتظار',
            'processing' => 'قيد المعالجة',
            'shipped' => 'تم الشحن',
            'delivered' => 'تم التوصيل',
            'cancelled' => 'ملغي',
        ];

        return redirect()->back()->with([
            'message' => 'تم تحديث حالة الطلب إلى: ' . $statusNames[$validated['status']],
            'alert-type' => 'success'
        ]);
    }
}
