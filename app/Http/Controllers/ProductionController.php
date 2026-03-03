<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProductionLog;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    public function updateStatus($orderId, $status)
    {
        $order = Order::findOrFail($orderId);

        $order->update([
            'production_status' => $status
        ]);

        OrderProductionLog::create([
            'order_id' => $order->id,
            'status' => $status,
            'note' => 'Cambio de estado',
            'changed_by' => auth()->id()
        ]);

        return back();
    }
}
