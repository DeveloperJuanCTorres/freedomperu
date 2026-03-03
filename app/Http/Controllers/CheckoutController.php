<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index');
        }

        $subtotal = collect($cart)->sum('total_price');

        $tax = $subtotal * 0.18;
        $shipping = 15;
        $discount = session('discount', 0);

        $total = $subtotal + $tax + $shipping - $discount;

        return view('checkout.index', compact(
            'cart',
            'subtotal',
            'tax',
            'shipping',
            'discount',
            'total'
        ));
    }

    public function applyCoupon(Request $request)
    {
        $coupon = Coupon::where('code', $request->code)
            ->where('is_active', 1)
            ->first();

        if (!$coupon) {
            return back()->withErrors('Cupón inválido');
        }

        $subtotal = collect(session('cart'))->sum('total_price');

        if ($subtotal < $coupon->min_amount) {
            return back()->withErrors('No cumple el mínimo requerido');
        }

        if ($coupon->discount_type == 'percentage') {
            $discount = ($subtotal * $coupon->discount_value) / 100;
        } else {
            $discount = $coupon->discount_value;
        }

        session(['discount' => $discount]);

        return back()->with('success', 'Cupón aplicado');
    }
}
