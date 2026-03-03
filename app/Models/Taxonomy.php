<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Taxonomy extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'image',
        'is_active',
        'parent_id'
    ];

    // 🔹 Relación jerárquica
    public function parent()
    {
        return $this->belongsTo(Taxonomy::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Taxonomy::class, 'parent_id');
    }

    // 🔹 Productos
    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'product_toxonomy',
            'taxonomy_id',
            'product_id'
        );
    }
}
