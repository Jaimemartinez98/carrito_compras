@extends('layouts.app')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

@section('content')
    <form action="{{ route('ventas.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-6">
                <label for="producto_id" class="form-label">Producto a comprar</label>

                <select class="form-select" aria-label="Default select example" name="producto_id">
                    <option value="">Seleccione un producto a comprar</option>
                    @foreach ($productos as $producto)
                        <option value="{{ $producto->id }}">{{ $producto->name }}</option>
                    @endforeach

                </select>
                @if ($errors->has('producto_id'))
                    <p class="text-danger">{{ $errors->first('producto_id') }}</p>
                @endif
            </div>
            <div class="col-6">
                <label for="precio" class="form-label">Cantidad del producto</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad">
                @if ($errors->has('cantidad'))
                    <p class="text-danger">{{ $errors->first('cantidad') }}</p>
                @endif
            </div>
            <br>
            <div class="col-12" style="margin-top: 20px;">
                <button type="submit" class="btn btn-primary form-control">Enviar</button>
            </div>

        </div>
    </form>

@endsection
