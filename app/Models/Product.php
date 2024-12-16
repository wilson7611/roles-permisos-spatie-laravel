<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'stock',
        'status',
        'image',
        'category_id',
    ];

    public function categoria()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
