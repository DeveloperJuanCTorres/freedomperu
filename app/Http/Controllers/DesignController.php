<?php

namespace App\Http\Controllers;

use App\Models\ShirtColor;
use Illuminate\Http\Request;

class DesignController extends Controller
{
    public function index()
    {
        $colors = ShirtColor::all();
        return view('pages.design-create', compact('colors'));
    }
}
