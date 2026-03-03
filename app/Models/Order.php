<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    protected $fillable = [
        'user_id',
        'order_number',
        'subtotal',
        'tax',
        'shipping_cost',
        'discount',
        'total',
        'payment_status',
        'order_status',
        'payment_method',
        'customer_name',
        'customer_email',
        'customer_phone',
        'department',
        'province',
        'district',
        'shipping_address',
        'production_status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function productionLogs()
    {
        return $this->hasMany(OrderProductionLog::class);
    }
}
