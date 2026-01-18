<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Faq;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $faqs = Faq::all();
        return view('adminDashboard.faqs.index', compact('faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminDashboard.faqs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
            'is_active' => 'required|boolean',
        ], [
            'question.required' => 'حقل السؤال مطلوب',
            'question.string'   => 'حقل السؤال يجب أن يكون نص',
            'question.max'      => 'حقل السؤال لا يجب أن يتجاوز 255 حرفًا',

            'answer.required'   => 'حقل الإجابة مطلوب',
            'answer.string'     => 'حقل الإجابة يجب أن يكون نص',

            'is_active.required' => 'حقل الحالة مطلوب',
            'is_active.boolean' => 'حقل الحالة غير صالح',
        ]);

        Faq::create([
            'question' => $request->question,
            'answer'   => $request->answer,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('faqs.index')->with('message', 'تم إضافة السؤال بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $faq = Faq::where('id', $id)->first();
        return view('adminDashboard.faqs.edit', compact('faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer'   => 'required|string',
            'is_active' => 'required|boolean',
        ], [
            'question.required' => 'حقل السؤال مطلوب',
            'question.string'   => 'حقل السؤال يجب أن يكون نص',
            'question.max'      => 'حقل السؤال لا يجب أن يتجاوز 255 حرفًا',

            'answer.required'   => 'حقل الإجابة مطلوب',
            'answer.string'     => 'حقل الإجابة يجب أن يكون نص',

            'is_active.required' => 'حقل الحالة مطلوب',
            'is_active.boolean' => 'حقل الحالة غير صالح',
        ]);

        $faq->update([
            'question' => $request->question,
            'answer'   => $request->answer,
            'is_active' => $request->is_active,
        ]);

        return redirect()->route('faqs.index')->with('message', 'تم تعديل السؤال بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
