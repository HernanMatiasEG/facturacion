<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        // Validate the request...
 
        $producto = new Producto;
 
        $producto->codigo = $request->codigo;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;

        $producto->save();
 
        return redirect('/');
    }
}
