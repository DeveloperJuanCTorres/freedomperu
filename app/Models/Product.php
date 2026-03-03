<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'base_price',
        'product_type',
        'is_active'
    ];

    // 🔹 Variantes (color, talla, stock)
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }

    // 🔹 Taxonomías (categorías)
    public function taxonomies()
    {
        return $this->belongsToMany(
            Taxonomy::class,
            'product_toxonomy', // ⚠ así está en tu BD
            'product_id',
            'taxonomy_id'
        );
    }

    // 🔹 Items de pedido
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function designs()
    {
        return $this->hasMany(Design::class);
    }
}
