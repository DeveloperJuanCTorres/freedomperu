<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function confirm($orderId)
    {
        $order = Order::findOrFail($orderId);

        Payment::create([
            'order_id' => $order->id,
            'payment_gateway' => 'manual',
            'transaction_id' => rand(100000, 999999),
            'amount' => $order->total,
            'status' => 1,
            'paid_at' => now()
        ]);

        $order->update([
            'payment_status' => 1,
            'order_status' => 1
        ]);

        return redirect()->route('orders.show', $order->id);
    }
}
