<?php

namespace App\Http\Controllers;

use App\Models\Design;
use App\Models\Product;
use App\Models\Taxonomy;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {        
        $taxonomies = Taxonomy::all();
        $designs = Design::all();
        $products = Product::with(['taxonomies','designs']);

        if ($request->taxonomy) {
            $products->whereHas('taxonomies', function($q) use ($request){
                $q->where('taxonomies.id', $request->taxonomy);
            });
        }

        if ($request->designs) {
            $products->whereHas('designs', function($q) use ($request){
                $q->whereIn('designs.id', $request->designs);
            });
        }

        $products = $products->paginate(9);

        return view('shop.index',compact(
        'products',
        'taxonomies',
        'designs'
        ));
    }
}
