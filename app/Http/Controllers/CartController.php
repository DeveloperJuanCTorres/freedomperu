<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\ProductVariant;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }

    public function add(Request $request)
    {
        $variant = ProductVariant::findOrFail($request->product_variant_id);

        $design = null;
        if ($request->design_id) {
            $design = Design::find($request->design_id);
        }

        $cart = session()->get('cart', []);

        $key = uniqid();

        $unitPrice = $variant->price;

        if ($design) {
            $unitPrice += $design->extra_price;
        }

        $cart[$key] = [
            'product_id' => $variant->product_id,
            'product_variant_id' => $variant->id,
            'design_id' => $design?->id,
            'custom_design_data' => $request->custom_design_data,
            'name' => $variant->product->name,
            'color' => $variant->color,
            'size' => $variant->size,
            'quantity' => $request->quantity,
            'unit_price' => $unitPrice,
            'total_price' => $unitPrice * $request->quantity
        ];

        session()->put('cart', $cart);

        return back()->with('success', 'Producto agregado al carrito');
    }

    public function remove($key)
    {
        $cart = session()->get('cart', []);
        unset($cart[$key]);
        session()->put('cart', $cart);

        return back();
    }

    public function clear()
    {
        session()->forget('cart');
        return back();
    }
}
