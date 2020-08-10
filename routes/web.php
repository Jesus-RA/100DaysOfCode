<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'MainController@index')->name('main');

// Route resource nos crea todas las rutas para gestionar los recursos
// index, create, store, show, edit, update and destroy
// sólo debemos indicar el nombre de la tabla y el controlador
// Route::resource('products', 'ProductController'); La movemos de aquí y la llevamos a la carpeta panel, para mantener la protección a usuarios administradores.
// también podemos aplicar only y except para las rutas

// Route::get('/products', 'ProductController@index')->name('products.index');

// Route::get('/products/create', 'ProductController@create')->name('products.create');

// Route::post('/products', 'ProductController@store')->name('products.store');

// Route::get('/products/{product}', 'ProductController@show')->name('products.show');
// // Podemos especificar la propiedad del producto por la cual deseamos realizar la busqueda si
// // colocamos : y el nombre de la propiedad, es decir, {product:propiedad}
// // Route::get('/products/{product:title}', 'ProductController@show')->name('products.show');

// Route::get('/products/{product}/edit', 'ProductController@edit')->name('products.edit');

// Route::match(['put', 'patch'], '/products/{product}', 'ProductController@update')->name('products.update');

// Route::delete('/products/{product}', 'ProductController@destroy')->name('products.destroy');

Route::resource('products.carts', 'ProductCartController')->only(['store', 'destroy']);

Route::resource('carts', 'CartController')->only(['index']);

Route::resource('orders', 'OrderController')->only(['create', 'store']);

Route::resource('orders.payments', 'OrderPaymentController')->only(['create', 'store']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('images', 'UploadImageController');

Route::resource('contacts', 'ContactController')->only(['create', 'store']);

Route::get('/mail', function(){
    return view('emails.email');
});