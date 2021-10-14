@extends('layouts.app')

@section('content')


    <div class="row">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre Producto</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Valor Total Individual</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($ventas_by_user as $venta)
                    <tr>
                        <th scope="row">{{ $venta->id }}</th>
                        <td>{{ $venta->nombre_producto }}</td>
                        <td>{{ $venta->precio }}</td>
                        <td>{{ $venta->cantidad }}</td>
                        @php
                            $precio_total_por_producto = $venta->cantidad * $venta->precio;
                        @endphp

                        <td>{{ $precio_total_por_producto }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>


@endsection
