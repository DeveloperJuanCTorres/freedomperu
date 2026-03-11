<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Design;
use App\Models\Product;
use App\Models\Taxonomy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::where('is_active', 1)
                    ->latest()
                    ->get();

        $categories = Taxonomy::where('is_active', 1)
                        ->get();

        $banners = Banner::all();

        return view('home', compact(
            'products',
            'categories',
            'banners'
        ));
    }

    public function about()
    {

        $categories = Taxonomy::where('is_active', 1)
                        ->get();

        return view('pages.about', compact(
            'categories'
        ));
    }

    public function contact()
    {

        return view('pages.contact');
    }
}
