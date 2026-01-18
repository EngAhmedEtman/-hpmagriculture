<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    public function authorize()
    {
        return true; // لو عايز تتحكم بالصلاحيات
    }

    public function rules()
    {
        return [
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'is_active'   => 'required|boolean',
            'category_id' => 'required|exists:categories,id',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_special'  => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'name.required'        => 'اسم المنتج مطلوب',
            'name.string'          => 'اسم المنتج يجب أن يكون نصًا',
            'name.max'             => 'اسم المنتج لا يجب أن يزيد عن 255 حرفًا',

            'description.string'   => 'وصف المنتج يجب أن يكون نصًا',

            'price.required'       => 'سعر المنتج مطلوب',
            'price.numeric'        => 'سعر المنتج يجب أن يكون رقمًا',
            'price.min'            => 'سعر المنتج لا يمكن أن يكون أقل من صفر',

            'is_active.required'   => 'حالة المنتج مطلوبة',
            'is_active.boolean'    => 'حالة المنتج غير صحيحة',

            'category_id.required' => 'التصنيف مطلوب',
            'category_id.exists'   => 'التصنيف المحدد غير موجود',

            'image.image'          => 'الملف المرفوع يجب أن يكون صورة',
            'image.mimes'          => 'صيغة الصورة يجب أن تكون jpg أو jpeg أو png أو webp',
            'image.max'            => 'حجم الصورة لا يجب أن يزيد عن 2 ميجابايت',

            'is_special.required'  => 'حالة التمييز مطلوبة',
            'is_special.boolean'   => 'قيمة التمييز غير صحيحة',
        ];
    }
}
