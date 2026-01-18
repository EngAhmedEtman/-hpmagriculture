<?php

namespace App\Http\Controllers\FrontStore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message;
class MessageController extends Controller
{
    public function index()
    {
        return view('FrontStore.contact');
    }

    public function store(Request $request)
    {
        
$request->validate([
    'name' => 'required|string|max:255',
    'phone' => 'required|string|max:20',
    'message' => 'required|string',
], [
    'name.required' => 'الاسم مطلوب',
    'name.string' => 'يجب أن يكون الاسم نصًا',
    'name.max' => 'الاسم طويل جدًا',

    'phone.required' => 'رقم الهاتف مطلوب',
    'phone.string' => 'رقم الهاتف يجب أن يكون نصًا',
    'phone.max' => 'رقم الهاتف طويل جدًا',

    'message.required' => 'الرسالة مطلوبة',
    'message.string' => 'يجب أن تكون الرسالة نصًا',
]);

        Message::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'message' => $request->message,
        ]);

        return redirect()->back()->with('success', 'تم الارسال بنجاح!');
    }
}
