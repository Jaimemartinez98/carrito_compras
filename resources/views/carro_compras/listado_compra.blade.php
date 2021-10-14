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
                    <th scope="col">Eliminar compra</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0;
                @endphp
                @foreach ($ventas_by_user as $venta)
                    <tr>
                        <th scope="row">{{ $venta->id }}</th>
                        <td>{{ $venta->nombre_producto }}</td>
                        <td>{{ $venta->precio }}</td>
                        <td>{{ $venta->cantidad }}</td>
                        @php
                            $precio_total_por_producto = $venta->cantidad * $venta->precio;
                            $total = $total + $precio_total_por_producto;
                        @endphp

                        <td>{{ $precio_total_por_producto }}</td>
                        <td>
                            <form action="{{ route('ventas.delete',$venta->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            <tfoot>
                <tr>
                    <th></th>
                    <th>Precio total de la compra</th>
                    <th></th>
                    <th></th>
                    <th>{{$total}}</th>
                    <th>
                        <form action="{{ route('ventas.update') }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success">Completar compra</button>
                        </form>
                    </th>
                </tr>
            </tfoot>
            </tbody>
        </table>
    </div>


@endsection
