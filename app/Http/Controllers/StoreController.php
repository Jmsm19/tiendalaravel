<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class StoreController extends Controller
{
    function index() {
        $products = Product::all();
        return view('pages.store', compact('products'));
    }

    function show($id) {
        $product = Product::find($id);
        return view('pages.details', compact('product'));
    }

    function add($id) {
        $product = Product::find($id);
        
    }
}
