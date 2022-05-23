@extends('layouts.principal')

@section('contenido')
    <form class="col s8" 
      method="POST" 
      action="{{ Route('productos.store') }}">
    @csrf
      <div class="row">
          <div class="col s8">
              <h1 class="blue-text text-darken-2">
                  Nuevo producto
              </h1>
          </div>
      </div>
      <div class="row">
        <div class="input-field col s6"> 
          <input placeholder="Nombre del producto" 
          id="nombre" 
          type="text" 
          class="validate" 
          name="nombre">
          <label for="nombre">Nombre</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s8">
          <input id="desc" 
          type="text"
           class="validate"
           name="desc">
          <label for="desc">Descripcion</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s8">
          <input id="precio" 
          type="number"
           class="validate" 
           name="precio">
          <label for="precio">Precio</label>
        </div>
      </div>
      <div class="row">
        <div class="col s8 input-field">
          <select name="marca" id="marca">
            <option>
              Elija su marca
            </option>
            <option>
              @foreach($marcas as $marca)
              <option value="{{$marca->id}}">
                {{  $marca->nombre }}
              </option>
              @endforeach
            </option>
          </select>
        </div>
      </div>
      <div class="row">
        <div class="col s8 input-field">
          <select name="categoria" id="categoria">
            <option>
              Elija su categoria
            </option>
            @foreach($categorias as $categoria)
              <option value="{{$categoria->id}}">
                {{$categoria->nombre}}
              </option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row">
      <div class="file-field input-field">
      <div class="waves-effect waves-light btn blue text-darken-2">
        <span>Ingrese imagen...</span>
        <input type="file">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
            </div>
        </div>
      </div>
      <div class="row">
      <button class="btn waves-effect waves-light blue text-darken-2" type="submit" name="action">
       Guardar  
      </button>
      </div>
    </form>
  @endsection