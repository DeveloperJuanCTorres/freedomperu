<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'product_id',
        'product_variant_id',
        'design_id',
        'custom_design_data',
        'quantity',
        'unit_price',
        'total_price'
    ];

    protected $casts = [
        'custom_design_data' => 'array'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }

    public function design()
    {
        return $this->belongsTo(Design::class);
    }
}
