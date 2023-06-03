<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;


    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'region_id',
        'status',
        'payment_type',
        'street',
        'delivery_id',
        'total_amount',
        'total_cost',
        // Add more columns as needed
    ];

    public function product()
    {
        return $this->hasOne(OrderProduct::class, 'order_id', 'id');

    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // Define relationships, such as hasOne, hasMany, belongsTo, etc.

}
