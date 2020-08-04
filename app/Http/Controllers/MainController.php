<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class MainController extends Controller
{
    public function index(){
        // $products = Product::all();
        // $products = Product::paginate(15);
        // Using a local scope
        $products = Product::available()->get();
        return view('welcome', compact('products'));
    }
}
