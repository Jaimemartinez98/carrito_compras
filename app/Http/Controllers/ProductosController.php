<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Productos;
use App\Models\Ventas;

class ProductosController extends Controller
{
    public function index(){

        $productos = Productos::get();

        return view('productos.index',[
            'productos' => $productos,
        ]);
    }

    public function create(){


        return view('productos.create');

    }
    public function store(Request $request){

        $request->validate(
            [
                'nombre' => 'required',
                'precio' => 'required|numeric',
                'inventario' => 'required|numeric',
            ],
            [
                'nombre.required' => 'El nombre del producto es requerido',
                'precio.required' => 'El precio del producto es requerido',
                'precio.numeric' => 'El precio del producto debe ser númerico',
                'inventario.required' => 'El inventario del producto es requerido',
                'inventario.numeric' => 'El inventario del producto debe ser númerico',
            ]
            );

        $producto = new Productos;
        $producto->name = $request->nombre;
        $producto->precio = $request->precio;
        $producto->inventario = $request->inventario;
        $producto->save();

        return back()->with('message','El producto fue almacenado con exito!');


    }
    public function edit($id){


        $producto = Productos::where('id',$id)->first();

        return view('productos.edit',[
            'producto' => $producto,
        ]);

    }

    public function update(Request $request,$id){

        $request->validate(
            [
                'nombre' => 'required',
                'precio' => 'required|numeric',
                'inventario' => 'required|numeric',
            ],
            [
                'nombre.required' => 'El nombre del producto es requerido',
                'precio.required' => 'El precio del producto es requerido',
                'precio.numeric' => 'El precio del producto debe ser númerico',
                'inventario.required' => 'El inventario del producto es requerido',
                'inventario.numeric' => 'El inventario del producto debe ser númerico',
            ]
            );

        $producto = Productos::where('id',$id)->first();
        $producto->name = $request->nombre;
        $producto->precio = $request->precio;
        $producto->inventario = $request->inventario;
        $producto->save();

        return back()->with('message','El producto fue actualizado con exito!');


    }
    public function delete($id){

        Productos::where('id',$id)->delete();

        return back();

    }

}
