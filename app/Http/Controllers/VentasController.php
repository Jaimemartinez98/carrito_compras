<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Ventas;
use Illuminate\Support\Facades\DB;


class VentasController extends Controller
{
    public function index(){


        $ventas_by_user = DB::table('ventas as v')
                        ->select('v.id','p.name AS nombre_producto', 'p.precio', 'v.cantidad')
                        ->join('productos AS p', 'v.producto_id', '=', 'p.id')
                        ->where('v.user_id','=',auth()->user()->id)
                        ->where('v.status_id','=',0)
                        ->get();




        return view('carro_compras.listado_compra',[
            'ventas_by_user' => $ventas_by_user,
        ]);



    }

    public function create(){

    $productos = Productos::where('inventario','>',0)->get();

    return view('carro_compras.comprar',[
        'productos' => $productos,
    ]);

    }
    public function store(Request $request){

        $max_productos = 0;

        $producto = Productos::where('id',$request->producto_id)->first();

        if ($producto) {
            $max_productos = $producto->inventario;
        }



        $request->validate(
            [
                'producto_id' => 'required',
                'cantidad' => "required|numeric|max:$max_productos",
            ],
            [
                'producto_id.required' => 'El producto es requerido',
                'cantidad.required' => 'La cantidad a comprar es requerida',
                'cantidad.numeric' => 'La cantidad debe ser númerica',
                'cantidad.max' => 'La cantidad supera el inventario actual que es :max',
            ]
            );

            $venta = new Ventas;
            $venta->producto_id = $request->producto_id;
            $venta->cantidad = $request->cantidad;
            $venta->user_id = auth()->user()->id;
            $venta->status_id = 0;
            $venta->save();

            $producto->inventario = ($producto->inventario-$request->cantidad);
            $producto->save();

        return back()->with('message','El producto fue almacenado con exito!');



    }
    public function edit(){

    }
    public function update(){

        $ventas = Ventas::where('user_id',auth()->user()->id)->where('status_id','=',0)->get();

        foreach ($ventas as $venta) {

            $venta_up = Ventas::where('id',$venta->id)->first();
            $venta_up->status_id = 1;
            $venta_up->save();

        }

        return back();

    }

    public function delete($id){

        Ventas::where('id',$id)->delete();

        return back();


    }

    public function show(){

        $ventas_by_user = DB::table('ventas as v')
                        ->select('v.id','p.name AS nombre_producto', 'p.precio', 'v.cantidad')
                        ->join('productos AS p', 'v.producto_id', '=', 'p.id')
                        ->where('v.user_id','=',auth()->user()->id)
                        ->where('v.status_id','=',1)
                        ->get();




        return view('carro_compras.historial',[
            'ventas_by_user' => $ventas_by_user,
        ]);

    }

}
