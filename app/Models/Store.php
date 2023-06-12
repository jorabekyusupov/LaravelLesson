<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $table = 'stores';

    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'status',
        'image',
        'address_id',
        'warehouse_id',
        'chat_id',
        'delivery_description'
    ];
}
