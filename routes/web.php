<?php

use Illuminate\Support\Facades\Route;
use App\Models\Marca;
use App\Models\Categoria;
use App\Http\Controllers\ProductoController;
use App\Models\Producto;

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

Route::get('/', function () {
    return view('welcome');
});
Route:: get('Paises', function(){
    $Paises = [
        "Colombia" => [
            "cap" => "Bogotá",
            "mon" => "Peso",
            "pob" =>  51,
            "ciu" => [
                "Medellin",
                "Cali",
                "Pereira"
            ]
        ],
        "Brasil" => [
            "cap" => "Brasilia",
            "mon" => "Real Brasileño",
            "pob" =>  212,
            "ciu" => [
                "Rio de Janeiro",
                "Sao paulo"
            ]
        ],
        "Argentina" => [
            "cap" => "Buenos aires",
            "mon" => "Peso argentino",
            "pob" =>  45,
            "ciu" => [
                "Cordoba",
                "Rosario",
                "Mar de plata",
                "Santa fe"
            ]
        ]
    ];
    

    return view("Paises")
        ->with('Paises', $Paises);

});

Route::get('prueba', function(){
    //seleccionar marca:
    $marcas = Marca::all();

     //seleccionar categoria:
     $categorias = Categoria::all();
     //ingresar marcas y categorias a la vista
    return view('productos.crear')
            ->with('categorias', $categorias)
            ->with('marcas', $marcas);
});

//Rutas REST 
Route::resource('productos', ProductoController::class);