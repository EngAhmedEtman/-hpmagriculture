<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'is_active',
        'category_id',
        'image',
        'is_special',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function order__items()
    {
        return $this->hasMany(OrderItem::class);
    }

}

