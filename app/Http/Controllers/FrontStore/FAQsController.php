<?php

namespace App\Http\Controllers\FrontStore;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class FAQsController extends Controller
{
    public function index()
    {
        $faqs = Faq::where('is_active', 1)->orderBy('created_at', 'desc')->get();
        return view('FrontStore.FAQ', compact('faqs'));
    }
}
