<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ShirtColor extends Model
{
    protected $fillable = [
        'name',
        'hex_code',
        'slug',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function images()
    {
        return $this->hasMany(ShirtImage::class);
    }

    public function designs()
    {
        return $this->hasMany(Design::class);
    }
}
