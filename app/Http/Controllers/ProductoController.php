<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use App\Models\Marca;
use Illuminate\Auth\Events\Failed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        echo "Aqui va a ir el catalogo del producto";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Seleccionar todas las marcas
        $marcas = Marca::all();
        //Sleccionar todas las categorias
        $categorias = Categoria::all();
        //mostrar las vistas del nuevo producto 
        //Enviandole los datos de marcas y categorias
        return view ('Productos.crear')
            ->with('marcas', $marcas)
            ->with('categorias', $categorias);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $r)
    {
        //validar
        //1. establecer reglas de validacion
        $reglas=[
            "nombre" =>'required|alpha|unique:productos,nombre',
            "desc" =>'required|min:5|max:20',
            "precio" => 'required|numeric',
            "imagen" => 'required|image',
            "marca" => 'required',
            'categoria'=> 'required'
        ];
        //2.crear objeto validador
        $v = validator::make($r->all(), $reglas );
        //3.validar
        if($v->fails()){
            //si la validacion falla
            //redirigir a la vista de create
            return redirect('productos/create')
                ->withErrors($v);
        }else{
                //examinar el archivo
                $archivo=$r->imagen;
                //obtener el nombre 
                $nombre_archivo=($archivo->getClientOriginalName());
                //establecer ubicacioin del archivo guardado
                $ruta=(public_path())."/img";
                //mover el archivo de imagen a la ubicacion y nombre deseado
                $archivo->move($ruta, $nombre_archivo );

                //Crear nuevo producto 
                $p = new Producto();
                //Asignar atributos del producto 
                $p-> nombre = $r->nombre;
                $p->desc = $r->desc;
                $p->precio = $r->precio;
                $p->marca_id = $r->marca;
                $p->categoria_id = $r->categoria;
                $p->imagen = $nombre_archivo;
                //Grabar producto
                $p->save();
                //redirigir a productos/create
                //mensaje de exito
                return redirect('productos/create')
                    ->with('Mensajito', 'Producto registrado exitosamente');
            }
        }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function show($producto)
    {
        echo "aqui va el detalle del producto con id: $producto";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function edit($producto)
    {
        echo "aqui va el formulario para actualizar producto";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
