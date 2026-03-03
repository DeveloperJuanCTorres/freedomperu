<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Taxonomy;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::where('is_active', 1)
            ->with(['variants', 'taxonomies']);

        // Filtro por categoría (taxonomy)
        if ($request->taxonomy) {
            $query->whereHas('taxonomies', function ($q) use ($request) {
                $q->where('slug', $request->taxonomy);
            });
        }

        $products = $query->paginate(12);

        $taxonomies = Taxonomy::where('is_active', 1)
            ->whereNull('parent_id')
            ->with('children')
            ->get();

        return view('shop.index', compact('products', 'taxonomies'));
    }
}
