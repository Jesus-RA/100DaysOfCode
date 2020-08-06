<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{

    // public function __construct(){
    //     $this->middleware('auth');
            // Ya no es necesario utilizar el middleware aquí ya que al momento de estár en panel.php(Route)
            // ya se tendrá la validación para usuarios registrados gracias al map route creado en 
            // RouteServiceProvider.php
    // }

    public function index(){
        // $products = DB::table('products')->get(); //Query Builder
        $products = Product::all();// Con el modelo a través de Eloquent
        return view('products.index', compact('products'));
    }

    public function create(){
        return view('products.create');
    }

    public function store(ProductRequest $request){

        // $rules = [
        //     'title' => ['required', 'max:255'],
        //     'description' => ['required', 'max:1000'],
        //     'price' => ['required', 'min:1'],
        //     'stock' => ['required', 'min:0'],
        //     'status' => ['required', 'in:available,unavailable'],
        // ];

        // request()->validate($rules);

        // Ahora para validar las entradas utilizaremos un request en el cual indicaremos los datos
        // a validar, también crearemos en el request la validación para el caso de stock vacío y
        // producto disponible
        $product = Product::create($request->validated());  

        // Validar el producto creado
        // if(request()->status == 'available' && request()->stock == 0){
        //     // Establecemos una session llamada 'error' con el valor 'If available must have stock'
        //     // session()->put('error', 'If available must have stock');
        //     // Creando la session con flash la session sólo existirá hasta que se realice una nueva petición
        //     // session()->flash('error', 'If available must have stock');
            
        //     return redirect()
        //         ->back()
        //         ->withInput(request()->all())
        //         ->withErrors('If available must have stock');

        //     // Con withErros mandamos a la variable $errors nuestros errores personalizados
        // }
        // // Olvidamos la session con forget
        // session()->forget('error');


        // // Guardar el producto creado en la base de datos

        // // Aprendido con Bluuweb
        // $product = new Product();
        // $product->title = $request->title;
        // $product->description = $request->description;
        // $product->price = $request->price;
        // $product->stock = $request->stock;
        // $product->status = $request->status;

        // Aprendido con Udemy
        //Forma larga
        // $product = Product::create([
        //     'title' => request()->title,
        //     'description' => request()->description,
        //     'price' => request()->price,
        //     'stock' => request()->stock,
        //     'status' => request()->status
        // ]);

        // Forma corta (llenado masivo), de ésta forma se enviarán todas las entradas en el formulario anterios
        // pero sólo se agregarán los campos que se encuentrend entro del array fillable en el modelo
        // de product, por lo tanto es muy importante poner en el los datos que queremos llenar de forma masiva.
        // $product = Product::create(request()->all());      
        // $product->save();

        // Tres formas para redirigir
        // return redirect()->back();
        // return redirect()->action('MainController@index');
        // return redirect()->route('products.index);

        // Para mandar un mensaje de success podemos crear una session flash
        session()->flash('success', "The new product with id {$product->id} was created!");
        // O también crearla y mandarla al momento de redireccionar utilizando with
        // return redirect()->route('products.index')->with('created', 'The product was created successfuly!');
        // podemos utilizar ésta forma o también utilizar
        return redirect()->route('products.index')->withSuccess("The new product with id {$product->id} was created!");
        // de ésta la parte derecha de with (withNombreSession) será el nombre de la session que se creará
    }

    public function show(Product $product){//Inyección implícita de modelos
        // La inyección implícita de modelos, hace que laravel implícitamente realice
        // la búsqueda del producto y nos lo devuelva en la variable $product

        // $product = DB::table('products')->where('id', $product)->first(); QueryBuilder
        // $product = DB::table('products')->find($product);// Query Builder

        // $product = Product::findOrFail($product);// Eloquent

        return view('products.show', compact('product'));
    }

    public function edit(Product $product){
        // $product = Product::findOrFail($product);
        return view('products.edit', compact('product'));
    }

    public function update(ProductRequest $request, Product $product){

        // $rules = [
        //     'title' => ['required', 'max:255'],
        //     'description' => ['required', 'max:1000'],
        //     'price' => ['required', 'min:1'],
        //     'stock' => ['required', 'min:0'],
        //     'status' => ['required', 'in:available,unavailable'],
        // ];

        // request()->validate($rules);

        // if(request()->status == 'available' && request()->stock == 0){
        //     return redirect()
        //         ->back()
        //         ->withInput(request()->all())
        //         ->withErrors('If available must have stock!');
        // }

        // $product = Product::findOrFail($product);
        // $product->update(request()->all());

        // Utilizamos el $request para validar las entradas y las condiciones!
        $product->update($request->validated());

        return redirect()
            ->route('products.index')
            ->withSuccess("The product with id {$product->id} was edited!");
            // ->with('updated', 'The product was updated successfuly!');
    }

    public function destroy(Product $product){
        // $product = Product::findOrFail($product);
        $product->delete();
        return redirect()
            ->back()
            ->withSuccess("The product with id {$product->id} was deleted!");
            // ->with('deleted', 'The product was deleted successfuly!');
    }
}
