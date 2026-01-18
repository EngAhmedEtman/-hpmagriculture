<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'message',
        'is_read',
    ];

    public function markAdRead()
    {
        if(! $this->is_read){
            $this->update(['is_read' => true]);
        };
    }
}
