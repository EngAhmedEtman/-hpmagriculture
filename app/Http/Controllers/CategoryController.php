<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of categories.
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('adminDashboard.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new category.
     */
    public function create()
    {
        return view('adminDashboard.categories.create');
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
            'description' => 'nullable|string|max:500',
            'is_active' => 'boolean',
        ], [
            'name.required' => 'اسم التصنيف مطلوب',
            'name.unique' => 'اسم التصنيف موجود بالفعل',
            'name.max' => 'اسم التصنيف يجب ألا يتجاوز 255 حرف',
            'description.max' => 'الوصف يجب ألا يتجاوز 500 حرف',
        ]);

        Category::create($validated);

        return redirect()->route('categories.index')->with([
            'message' => 'تم إضافة التصنيف بنجاح!',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified category.
     */
    public function show(Category $category)
    {
        $productsCount = $category->products()->count();
        return view('categories.show', compact('category', 'productsCount'));
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category)
    {
        return view('adminDashboard.categories.edit', compact('category'));
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Category $category)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|string|max:500',
            'is_active' => 'boolean',
        ], [
            'name.required' => 'اسم التصنيف مطلوب',
            'name.unique' => 'اسم التصنيف موجود بالفعل',
            'name.max' => 'اسم التصنيف يجب ألا يتجاوز 255 حرف',
            'description.max' => 'الوصف يجب ألا يتجاوز 500 حرف',
        ]);

        $category->update($validated);

        return redirect()->route('categories.index')->with([
            'message' => 'تم تحديث التصنيف بنجاح!',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category)
    {
        // التحقق من وجود منتجات مرتبطة
        
        // if ($category->products()->count() > 0) {
        //     return redirect()->route('categories.index')->with([
        //         'message' => 'لا يمكن حذف التصنيف لأنه يحتوي على منتجات مرتبطة!',
        //         'alert-type' => 'danger'
        //     ]);
        // }

        $category->delete();

        return redirect()->route('categories.index')->with([
            'message' => 'تم حذف التصنيف بنجاح!',
            'alert-type' => 'success'
        ]);
    }



}

