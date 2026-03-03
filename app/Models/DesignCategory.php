<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class DesignCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'is_active'
    ];

    public function designs()
    {
        return $this->belongsToMany(
            Design::class,
            'design_category_design',
            'design_category_id',
            'design_id'
        );
    }
}
