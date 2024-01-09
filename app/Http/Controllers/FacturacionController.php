<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Producto;
use App\Models\Factura;
use App\Models\FacturaDetalle;
use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;

class FacturacionController extends Controller
{
    public function index()
    {
        $data = new \stdClass();
 
        $data->clientes = Cliente::all();
        $data->productos = Producto::all();
        $data->facturas = Factura::all();
        $data->facturas_detalle = FacturaDetalle::all();
 
        return view('index')
                ->with('data',$data);
    }

    public function storeFactura(Request $request)
    {
        $response = new \stdClass();
        $data = $request->data;

        if(isset($data["id_cliente"]) && $data["id_cliente"] > 0){
            Factura::truncate();
            FacturaDetalle::truncate();
            $factura = new Factura;
            $factura->id_cliente = $data["id_cliente"];
            $factura->observacion = $data["observacion"] ?? null;
            $factura->fecha = date('Y-m-d H:i:s');
            $factura->save();
            $total_factura = 0.00;

            foreach($data["productos"] as $producto_data){
                $producto = Producto::find($producto_data['id_producto']);
                $factura_detalle = new FacturaDetalle;
                $factura_detalle->id_factura = $factura->id_factura;
                $factura_detalle->id_producto = $producto->id_producto;
                $factura_detalle->costo_unitario = $producto->precio;
                $factura_detalle->cantidad = $producto_data["cantidad"];
                $total_producto = $producto->precio*$producto_data["cantidad"];
                $factura_detalle->total = $total_producto;

                $total_factura += $total_producto;

                $factura_detalle->save();
            }

            $factura->total = $total_factura;
            $factura->save();
    
            $response->status = '1';
            $response->message = 'Success';
            
        }else{
            $response->status = '0';
            $response->message = 'Debe seleccionar cliente';
        }

        return json_encode($response);
        
    }

}
