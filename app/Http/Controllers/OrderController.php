<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $cart = session()->get('cart', []);

        DB::beginTransaction();

        try {

            $subtotal = collect($cart)->sum('total_price');
            $tax = $subtotal * 0.18;
            $shipping = 15;
            $discount = session('discount', 0);
            $total = $subtotal + $tax + $shipping - $discount;

            $order = Order::create([
                'user_id' => auth()->id(),
                'order_number' => rand(100000, 999999),
                'subtotal' => $subtotal,
                'tax' => $tax,
                'shipping_cost' => $shipping,
                'discount' => $discount,
                'total' => $total,
                'payment_status' => 0,
                'order_status' => 0,
                'production_status' => 0,
                'payment_method' => $request->payment_method,
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'department' => $request->department,
                'province' => $request->province,
                'district' => $request->district,
                'shipping_address' => $request->shipping_address
            ]);

            foreach ($cart as $item) {

                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'product_variant_id' => $item['product_variant_id'],
                    'design_id' => $item['design_id'],
                    'custom_design_data' => $item['custom_design_data'],
                    'quantity' => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'total_price' => $item['total_price']
                ]);
            }

            DB::commit();

            session()->forget(['cart', 'discount']);

            return redirect()->route('orders.show', $order->id);

        } catch (\Exception $e) {

            DB::rollback();
            return back()->withErrors('Error al procesar el pedido');
        }
    }

    public function show($id)
    {
        $order = Order::with('items.product', 'items.variant')
            ->findOrFail($id);

        return view('orders.show', compact('order'));
    }
}
