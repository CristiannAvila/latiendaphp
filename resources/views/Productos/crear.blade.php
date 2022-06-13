@extends('layouts.principal')

@section('contenido')
    <form class="col s8" 
      method="POST" 
      action="{{ Route('productos.store') }}"
      enctype="multipart/form-data">
    @csrf
    @if( session('Mensajito'))
    <div class="row">
      <strong>{{ session('Mensajito')}}</strong>
    </div>
    @endif
      <div class="row">
          <div class="col s8">
              <h1 class="blue-text text-darken-2">
                  Nuevo producto
              </h1>
          </div>
      </div>
      <div class="row">
        <div class="input-field col s6"> 
          <input placeholder="Nombre del producto" id="nombre" type="text" class="validate" name="nombre">
          <label for="nombre">Nombre producto</label>
          <strong class="red-text">{{ $errors->first('nombre') }}</strong>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s8">
          <input id="desc" type="text" class="validate" name="desc">
          <label for="desc">Descripcion</label>
          <strong class="red-text">{{ $errors->first('desc')}}</strong>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s8">
          <input id="precio" type="number" class="validate" name="precio">
          <label for="precio">Precio</label>
          <strong class="red-text">{{ $errors->first('precio')}}</strong>
        </div>
      </div>
      <div class="row">
        <div class="col s8 input-field">
          <select name="marca" id="marca">
            <option value="">
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
          <label for="">Elija su marca</label>
          <strong class="red-text">{{ $errors->first('marca')}}</strong>
        </div>
      </div>
      <div class="row">
        <div class="col s8 input-field">
          <select name="categoria" id="categoria">
            <option value="">
              Elija su categoria
            </option>
            @foreach($categorias as $categoria)
              <option value="{{$categoria->id}}">
                {{$categoria->nombre}}
              </option>
            @endforeach
          </select>
          <label>Elija su categoria</label>
          <strong class="red-text">{{ $errors->first('categoria')}}</strong>
        </div>
      </div>
      <div class="row">
      <div class="file-field input-field">
      <div class="waves-effect waves-light btn blue text-darken-2">
        <span>Ingrese imagen...</span>
        <input type="file" name="imagen">
      </div>
      <div class="file-path-wrapper">
        <input class="file-path validate" type="text">
            </div>
            <strong class="red-text ">{{ $errors->first('imagen')}}</strong>
        </div>
      </div>
      <div class="row">
      <button class="btn waves-effect waves-light blue text-darken-2" type="submit" name="action">
       Guardar  
      </button>
      </div>
    </form>
  @endsection