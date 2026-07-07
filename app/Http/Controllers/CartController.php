<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\Product;
use App\Models\ProductVariant;
use App\Models\ShirtColor;
use App\Models\Taxonomy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cart;

class CartController extends Controller
{
    public function index()
    {
        // $cart = session()->get('cart', []);
        $products = Product::where('is_active', 1)
                    ->latest()
                    ->get();

        $categories = Taxonomy::where('is_active', 1)
                        ->get();

        $colors = ShirtColor::all();
        return view('cart.index', compact('products', 'categories', 'colors'));
    }

    public function add(Request $request)
    {
        try {           
        
            $request->validate([
                'product_id' => 'required|exists:products,id',
                'color_id'   => 'required|exists:shirt_colors,id',
            ]);

            $product = Product::findOrFail($request->product_id);

            // Se usa una combinación producto-color para que sean ítems diferentes
            $cartId = $product->id . '-' . $request->color_id;

            if (Cart::get($cartId)) {

                Cart::update($cartId, [
                    'quantity' => [
                        'relative' => true,
                        'value' => 1
                    ]
                ]);

            } else {
                $color = ShirtColor::findOrFail($request->color_id);

                Cart::add([
                    'id' => $cartId,
                    'name' => $product->name,
                    'price' => $product->base_price,
                    'quantity' => 1,
                    'attributes' => [
                        'product_id' => $product->id,
                        'color_id'   => $color->id,
                        'color'      => $color->hex_code,
                        'color_name' => $color->name,
                        'image'      => $product->image,
                    ]
                ]);

            }

            return response()->json([
                'success' => true,
                'count' => Cart::getTotalQuantity(),
                'subtotal'=>Cart::getSubTotal(),
                'total'=>Cart::getTotal(),
                'html'=>view('components.cart-items')->render()
            ]);
        } catch (\Throwable $e) {
            return response()->json([
                'message' => $e->getMessage(),
                'line' => $e->getLine(),
                'file' => $e->getFile()
            ], 500);
        }
    }

    public function addCustomized(Request $request)
    {
        $request->validate([

            'color_id' => 'required|exists:shirt_colors,id',

            'size' => 'required',

            'quantity' => 'required|integer|min:1',

            'project' => 'required|array',

            'pricing' => 'required|array'

        ]);
        $color = ShirtColor::findOrFail($request->color_id);
        $cartId = (string) Str::uuid();

        Cart::add([

            'id' => $cartId,

            'name' => $product->name,

            'price' => $request->pricing['total'],

            'quantity' => $request->quantity,

            'attributes' => [

                'customized' => true,

                'product_id' => $product->id,

                'color_id' => $color->id,

                'color' => $color->hex_code,

                'color_name' => $color->name,

                'size' => $request->size,

                'image' => $product->image,

                'project' => $request->project,

                'pricing' => $request->pricing

            ]

        ]);

        return response()->json([

            'success'=>true,

            'count'=>Cart::getTotalQuantity(),

            'subtotal'=>Cart::getSubTotal(),

            'total'=>Cart::getTotal(),

            'html'=>view('components.cart-items')->render()

        ]);
    }

    public function content()
    {
        return view('components.cart-items')->render();
    }

    public function remove(Request $request)
    {
        Cart::remove($request->id);

        return response()->json([

            'success'=>true,

            'count'=>Cart::getTotalQuantity(),

            'subtotal'=>number_format(Cart::getSubTotal(),2),

            'total'=>number_format(Cart::getTotal(),2),

            'html'=>view('components.cart-items')->render(),

            'cart'=>view('cart.partials.items')->render(),

            'summary' => view('cart.partials.summary')->render()

        ]);
    }


    public function update(Request $request)
    {
        $item = Cart::get($request->id);

        if (!$item) {
            return response()->json([
                'success' => false
            ],404);
        }

        $newQuantity = $item->quantity + $request->action;

        if($newQuantity <= 0){

            Cart::remove($request->id);

        }else{

            Cart::update($request->id,[

                'quantity'=>[
                    'relative'=>false,
                    'value'=>$newQuantity
                ]

            ]);

        }

        return response()->json([

            'success'=>true,

            'count'=>Cart::getTotalQuantity(),

            'subtotal'=>number_format(Cart::getSubTotal(),2),

            'total'=>number_format(Cart::getTotal(),2),

            'offcanvas'=>view('components.cart-items')->render(),

            'cart'=>view('cart.partials.items')->render(),

            'summary' => view('cart.partials.summary')->render()

        ]);

    }

    public function clear()
    {
        Cart::clear();

        return response()->json([

            'success' => true,

            'count' => 0,

            'cart' => view('cart.partials.items')->render(),

            'summary' => view('cart.partials.summary')->render(),

            'offcanvas' => view('components.cart-items')->render()

        ]);
    }

}
