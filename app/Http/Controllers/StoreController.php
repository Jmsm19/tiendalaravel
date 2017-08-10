<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class StoreController extends Controller
{
    function index() {
        $products = Product::all();
        return view('layouts.store', compact('products'));
    }
}
