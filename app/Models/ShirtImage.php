<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ShirtImage extends Model
{
    protected $fillable = [
        'shirt_color_id',
        'shirt_view_id',
        'image_path',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function color()
    {
        return $this->belongsTo(ShirtColor::class, 'shirt_color_id');
    }

    public function view()
    {
        return $this->belongsTo(ShirtView::class, 'shirt_view_id');
    }
}
