<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class OrderProductionLog extends Model
{
    protected $fillable = [
        'order_id',
        'status',
        'note',
        'changed_by'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}
