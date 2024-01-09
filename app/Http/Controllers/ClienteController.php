<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        // Validate the request...
 
        $cliente = new Cliente;
 
        $cliente->nombres = $request->nombres;
        $cliente->apellidos = $request->apellidos;
        $cliente->dni = $request->dni;

        $cliente->save();
 
        return redirect('/');
    }
}
