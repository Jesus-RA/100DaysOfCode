<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class MainController extends Controller
{
    public function index(){
        // $products = Product::all();
        $products = Product::paginate(15);
        return view('welcome', compact('products'));
    }
}
