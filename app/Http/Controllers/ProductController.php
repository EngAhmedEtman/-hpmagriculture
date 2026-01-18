<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * عرض جميع المنتجات.
     */
    public function index()
    {
        $products = Product::all(); // يمكنك استخدام paginate() لاحقاً
        return view('adminDashboard.products.index', compact('products'));
    }

    /**
     * نموذج إضافة منتج جديد.
     */
    public function create()
    {
        $categories = Category::all();
        return view('adminDashboard.products.create', compact('categories'));
    }

    /**
     * تخزين منتج جديد.
     */
    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $data['image'] = $this->handleImageUpload($request);

        Product::create($data);

        return redirect()->route('products.index')
            ->with('message', 'تم إضافة المنتج بنجاح')
            ->with('alert-type', 'success');
    }

    /**
     * عرض تفاصيل منتج.
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('adminDashboard.products.show', compact('product'));
    }

    /**
     * نموذج تعديل المنتج.
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('adminDashboard.products.edit', compact('product', 'categories'));
    }

    /**
     * تحديث بيانات المنتج.
     */
    public function update(UpdateProductRequest $request, $id)
    {
        $product = Product::findOrFail($id);
        $data = $request->validated();
        $image = $this->handleImageUpload($request);

        if ($image) {
            $data['image'] = $image;
        }

        $product->update($data);

        return redirect()->route('products.index')
            ->with('message', 'تم تعديل المنتج بنجاح')
            ->with('alert-type', 'success');
    }

    /**
     * حذف المنتج.
     */

public function destroy(Product $product)
{
    // حذف الصورة من storage
    if ($product->image && Storage::disk('public')->exists($product->image)) {
        Storage::disk('public')->delete($product->image);
    }

    // حذف المنتج
    $product->delete();

    return redirect()->route('products.index')->with([
        'message' => 'تم حذف المنتج والصورة بنجاح',
        'alert-type' => 'success',
    ]);
}

    /**
     * تبديل حالة المنتج المميز.
     */
    public function toggleSpecial(Product $product)
    {
        $product->is_special = !$product->is_special;
        $product->save();

        return redirect()->back()
            ->with('message', 'تم تحديث حالة المنتج المميز بنجاح')
            ->with('alert-type', 'success');
    }

    /**
     * رفع الصورة وإرجاع المسار.
     */
private function handleImageUpload(Request $request)
{
    if ($request->hasFile('image')) {

        $image = $request->file('image');

        // اسم فريد للصورة
        $fileName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

        // التخزين داخل storage/app/public/uploads/products
        $path = $image->storeAs('uploads/products', $fileName, 'public');

        // بنرجّع المسار اللي يتحفظ في الداتا بيز
        return $path;
    }

    return null;
}
}
