<?php

namespace App\Models;

class Product extends \Illuminate\Database\Eloquent\Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'category_id',
        'store_id',
        'price',
        'quantity',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

}
