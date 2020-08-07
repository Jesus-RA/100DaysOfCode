<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class MainController extends Controller
{
    public function index(){
        // De ésta forma habilitamos el QueryLog para poder visualizar las consultas realizadas a la
        // base de datos dentro de ésta vista
        // \DB::connection()->enableQueryLog();
        // $products = Product::paginate(15);
        // Using a local scope
        // $products = Product::available()->get();
        // Now the local scope is no necesary cause we have a Global scope to make that function
        $products = Product::all();
        return view('welcome', compact('products'));
    }
}
