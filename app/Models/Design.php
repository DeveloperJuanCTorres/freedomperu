<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Design extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'shirt_color_id',
        'design_front',
        'design_back',
        'design_sleeve_left',
        'design_sleeve_right',
        'preview_image',
    ];

    protected $casts = [
        'design_front' => 'array',
        'design_back' => 'array',
        'design_sleeve_left' => 'array',
        'design_sleeve_right' => 'array',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(ShirtColor::class, 'shirt_color_id');
    }
}
