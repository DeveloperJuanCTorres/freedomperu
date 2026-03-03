<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show($slug)
    {
        $product = Product::where('slug', $slug)
            ->where('is_active', 1)
            ->with('variants')
            ->firstOrFail();

        return view('shop.show', compact('product'));
    }
}
