<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\Product;
use App\Models\ShirtColor;
use App\Models\Taxonomy;
use App\Models\Type;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $taxonomies = Taxonomy::all();
        $designs = Type::all();
        $colors = ShirtColor::all();

        $products = Product::with(['taxonomies', 'designs']);

        // Categoría
        if ($request->filled('taxonomy')) {

            $products->whereHas('taxonomies', function ($q) use ($request) {

                $q->where('taxonomies.id', $request->taxonomy);

            });

        }

        // Estilos
        if ($request->filled('designs')) {

            $designsIds = is_array($request->designs)
                ? $request->designs
                : [$request->designs];

            $products->whereHas('designs', function ($q) use ($designsIds) {

                $q->whereIn('designs.id', $designsIds);

            });

        }

        // Buscar
        if ($request->filled('search')) {

            $products->where(function ($q) use ($request) {

                $q->where('name', 'like', '%' . $request->search . '%')
                ->orWhere('description', 'like', '%' . $request->search . '%');

            });

        }

        // Ordenar
        if ($request->sort == 'price_asc') {

            $products->orderBy('base_price');

        } elseif ($request->sort == 'price_desc') {

            $products->orderByDesc('base_price');

        } else {

            $products->latest();

        }
        
        $products = $products->paginate(9);

        // AJAX
        if ($request->ajax()) {

            return view('shop.partials.products-grid', compact('products', 'colors'));

        }

        return view('shop.index', compact(
            'products',
            'taxonomies',
            'designs',
            'colors'
        ));
    }
}
