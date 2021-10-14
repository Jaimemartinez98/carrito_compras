@extends('layouts.app')

@section('content')

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif


    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('put')

        <div class="row">
            <div class="col-4">
                <label for="nombre" class="form-label">Nombre Producto</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->name }}">
                @if ($errors->has('nombre'))
                    <p class="text-danger">{{ $errors->first('nombre') }}</p>
                @endif
            </div>
            <div class="col-4">
                <label for="precio" class="form-label">Precio Producto</label>
                <input type="number" class="form-control" id="precio" name="precio" value="{{ $producto->precio }}">
                @if ($errors->has('precio'))
                    <p class="text-danger">{{ $errors->first('precio') }}</p>
                @endif
            </div>
            <div class="col-4">
                <label for="inventario" class="form-label">Inventario Producto</label>
                <input type="number" class="form-control" id="inventario" name="inventario" value="{{ $producto->inventario }}">
                @if ($errors->has('inventario'))
                    <p class="text-danger">{{ $errors->first('inventario') }}</p>
                @endif
            </div>
            <br>
            <div class="col-12">
                <button type="submit" class="btn btn-primary form-control">Enviar</button>
            </div>

        </div>
    </form>


@endsection
