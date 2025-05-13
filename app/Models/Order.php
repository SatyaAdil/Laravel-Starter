<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_id',
        'order_date',
        'total_amount',
        'status',
    ];

    protected $casts = [
        'order_date' => 'datetime',
    ];

    // Relasi dengan OrderDetail
    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    // Relasi dengan Customer (Misal jika customer punya relasi ke order)
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
