<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class ShirtView extends Model
{
    protected $fillable = [
        'name',
        'slug',
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
}
