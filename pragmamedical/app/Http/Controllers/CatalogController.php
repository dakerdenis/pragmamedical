<?php

namespace App\Http\Controllers;

use App\Models\Product;

class CatalogController extends Controller
{
    public function index($lang)
    {
        $products = Product::latest()->get();
        return view('pages.catalog', compact('lang', 'products'));
    }

    public function show($lang, $id)
    {
        $product = Product::findOrFail($id);
        return view('pages.product', compact('lang', 'product'));
    }
}