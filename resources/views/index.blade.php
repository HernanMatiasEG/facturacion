<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Facturación - AC Farma</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    
    <div class="container">
        <h3 class="text-center mb-3 mt-2">Sistema de Facturación</h3>
        <div class="accordion" id="accordionFacturacion">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseClientes" aria-expanded="false" aria-controls="collapseClientes">
                        Clientes
                    </button>
                </h2>
                <div id="collapseClientes" class="accordion-collapse collapse" data-bs-parent="#accordionFacturacion">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <strong>Lista de Clientes</strong>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Nombres</th>
                                                    <th scope="col">Apellidos</th>
                                                    <th scope="col">DNI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data->clientes as $cliente)
                                                <tr>
                                                    <td scope="row">{{ $cliente->id_cliente }}</td>
                                                    <td>{{ $cliente->nombres }}</td>
                                                    <td>{{ $cliente->apellidos }}</td>
                                                    <td>{{ $cliente->dni }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <strong>Registro de Clientes</strong>
                                    </div>
                                    <div class="card-body">
                                <!-- <h5 class="mb-3"></h5> -->
                                        <form action="/cliente" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="inputNombres" class="form-label">Nombres</label>
                                            <input type="text" name="nombres" class="form-control" id="inputNombres">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputApellidos" class="form-label">Apellidos</label>
                                            <input type="text" name="apellidos" class="form-control" id="inputApellidos">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputDni" class="form-label">DNI</label>
                                            <input type="text" name="dni" class="form-control" id="inputDni">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Registrar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseProductos" aria-expanded="false" aria-controls="collapseProductos">
                        Productos
                    </button>
                </h2>
                <div id="collapseProductos" class="accordion-collapse collapse" data-bs-parent="#accordionFacturacion">
                    <div class="accordion-body">
                    <!-- <h4 class="mb-3"></h4> -->
                    <div class="row">
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <strong>Lista de Productos</strong>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Codigo</th>
                                                    <th scope="col">Descripcion</th>
                                                    <th scope="col">Precio</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($data->productos as $producto)
                                                <tr>
                                                    <td scope="row">{{ $producto->id_producto }}</td>
                                                    <td>{{ $producto->codigo }}</td>
                                                    <td>{{ $producto->descripcion }}</td>
                                                    <td>{{ $producto->precio }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card h-100">
                                    <div class="card-header">
                                        <strong>Registro de Productos</strong>
                                    </div>
                                    <div class="card-body">
                                        <form action="/producto" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="inputCodigo" class="form-label">Codigo</label>
                                            <input type="text" name="codigo" class="form-control" id="inputCodigo">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputDescripcion" class="form-label">Descripcion</label>
                                            <input type="text" name="descripcion" class="form-control" id="inputDescripcion">
                                        </div>
                                        <div class="mb-3">
                                            <label for="inputPrecio" class="form-label">Precio</label>
                                            <input type="number" name="precio" class="form-control" id="inputPrecio" step="0.25" value="0.00">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Registrar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFacturas" aria-expanded="false" aria-controls="collapseFacturas">
                        Facturas
                    </button>
                </h2>
                <div id="collapseFacturas" class="accordion-collapse collapse" data-bs-parent="#accordionFacturacion">
                    <div class="accordion-body">
                    <h4 class="mb-3">Registro de Facturas</h4>
                        <form action="" method="POST" id="formFactura">
                        @csrf
                        <div class="mb-3">
                            <label for="selectCliente" class="form-label">Cliente</label>
                            <select class="form-select" id="selectCliente">
                                <option value="0" selected>Seleccionar Cliente</option>
                                @foreach($data->clientes as $cliente)
                                <option value="{{ $cliente->id_cliente }}">{{ $cliente->id_cliente.' | '.$cliente->nombres.' | '.$cliente->apellidos.' | '.$cliente->dni }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <div>
                            <strong>Productos:</strong>
                            <a class="btn text-primary float-end" id="agregarProducto" data-facturaId="0"><svg xmlns="http://www.w3.org/2000/svg" height="32" width="32" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM232 344V280H168c-13.3 0-24-10.7-24-24s10.7-24 24-24h64V168c0-13.3 10.7-24 24-24s24 10.7 24 24v64h64c13.3 0 24 10.7 24 24s-10.7 24-24 24H280v64c0 13.3-10.7 24-24 24s-24-10.7-24-24z"/></svg></a>
                            </div>
                            <table class="table" id="tableProductos">
                                <thead>
                                    <tr>
                                        <th>Codigo</th>
                                        <th>Descripción</th>
                                        <th>Costo Unitario</th>
                                        <th>Cantidad</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody class="table-group-divider">

                                </tbody>
                                <tfoot class="table-group-divider">
                                    <tr>
                                        <th colspan="4">Total</th>
                                        <td colspan="1" class="totalPrice">0.00</td>
                                    </tr>
                                </tfoot>
                            </table>
                            
                        </div>
                        <div class="mb-3">
                            <label for="inputObservación" class="form-label">Observación</label>
                            <input type="text" class="form-control" id="inputObservación">
                        </div>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-4">
            <h4>Facturas</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Id Factura</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Total</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Observación</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($data->facturas as $factura)
                        @php $cliente = $data->clientes->where('id_cliente',$factura->id_cliente)->first(); @endphp
                        <tr>
                            <td>{{ $factura->id_factura }}</td>
                            <td>{{ $cliente->nombres.' '.$cliente->apellidos }}</td>
                            <td>{{ $factura->total }}</td>
                            <td>{{ $factura->fecha }}</td>
                            <td>{{ $factura->observacion }}</td>
                        </tr>
                        @foreach($data->facturas_detalle->where('id_factura',$factura->id_factura) as $factura_detalle)
                        
                    @endforeach
        
                </tbody>
            </table>
        </div>
    </div>

<div class="d-none">
    <table>
        <tbody id="addTrProductos">
            <tr>
                <td>-</td>
                <td>-</td>
                <td>-</td>
                <td>
                    <input type="number" name="precio" class="form-control" placeholder="Cantidad">
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <table>
        <tbody id="addTrProductos2">
            <tr class="align-middle" data-id="idproducto00">
                <th>
                    <div class="d-flex gap-2 align-items-center">
                        <a class="deleteProduct btn btn-link p-0 m-0 align-items-center d-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" height="16" width="16" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M256 512A256 256 0 1 0 256 0a256 256 0 1 0 0 512zM175 175c9.4-9.4 24.6-9.4 33.9 0l47 47 47-47c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-47 47 47 47c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-47-47-47 47c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l47-47-47-47c-9.4-9.4-9.4-24.6 0-33.9z"/></svg>
                        </a>
                        <span class="m-0">codigo00</span>
                    </div>
                </th>
                <td>descripcion00</td>
                <td class="productPrice">costounitario00</td>
                <td>
                    <input type="number" name="precio" class="form-control cantidadProducto" placeholder="Cantidad" min="1" value="1">
                </td>
                <td class="totalProductPrice">total00</td>
            </tr>
        </tbody>
    </table>
</div>

<div class="modal" tabindex="-1" id="modalProducto">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Agregar Producto</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <label for="selectModalProducto" class="form-label">Producto</label>
        <select class="form-select" id="selectModalProducto">
            <option value="0" selected>Seleccionar Producto</option>
            @foreach($data->productos as $producto)
            <option value="{{ $producto->id_producto }}" data-codigo="{{ $producto->codigo }}" data-descripcion="{{ $producto->descripcion }}" data-precio="{{ $producto->precio }}">{{ $producto->id_producto.' | '.$producto->codigo.' | '.$producto->descripcion.' | '.$producto->precio }}</option>
            @endforeach
        </select>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary agregar">Agregar</button>
      </div>
    </div>
  </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
<script
  src="https://code.jquery.com/jquery-3.7.1.min.js"
  integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo="
  crossorigin="anonymous"></script>
    <script>
        
        $('#agregarProducto').click(function(e){
            e.preventDefault();

            var id_factura = $(this).attr('data-facturaId');

            $('#modalProducto').modal('show');

        })

        $('#modalProducto .agregar').click(function(e){
            e.preventDefault();
            var select = $('#modalProducto #selectModalProducto');
            var option = $(select).find('option:selected');

            var id = option.val();

            if(id != "0"){
                var codigo = option.attr('data-codigo');
                var descripcion = option.attr('data-descripcion');
                var precio = option.attr('data-precio');
    
                var newHtml = $('#addTrProductos2').html();
    
                newHtml = newHtml.replace('idproducto00',id)
                newHtml = newHtml.replace('codigo00',codigo)
                newHtml = newHtml.replace('descripcion00',descripcion)
                newHtml = newHtml.replace('costounitario00',precio)
                newHtml = newHtml.replace('total00',precio)

                $('#tableProductos tbody').append(newHtml);

                $(select).val('0');
                $(option).prop('disabled',true);
                $('.modal').modal('hide');
                getTotal();
            }else{
                alert('Seleccione un Producto');
            }

        })

        $(document).on('change','.cantidadProducto', function(){
            var tr = $(this).closest('tr');

            var productPrice = parseFloat(tr.find('.productPrice').html());
            var cantidad = $(this).val();

            var totalProduct = productPrice * cantidad;

            totalProduct = totalProduct.toFixed(2);

            tr.find('.totalProductPrice').html(totalProduct);

            getTotal();
        })

        $('#formFactura').submit(function(e){
            e.preventDefault();

            var data = formatSending();
            
            var request = $.ajax({
                url: "/storeFactura",
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                type: 'JSON',
                method: 'POST',
                data: {
                    "data": data
                },
                success: function(data) {
                    data = JSON.parse(data);
                    console.log(data);
                    if(data.status == '1'){
                        alert('Registrado Exitosamente');
                    }else{
                        alert('Ocurrió un error');
                    }
                }
            });
 

        });

        function getTotal(){
            var table = $('#tableProductos');
            var total = 0.00;

            table.find('tbody .totalProductPrice').each(function(){
                let price = parseFloat($(this).html());
                total += price;
            })

            total = total.toFixed(2)

            table.find('tfoot .totalPrice').html(total);

        }

        function formatSending(){
            var data = {};

            var id_cliente = $('#selectCliente').val();
            var productos = [];
            var trs = $('#tableProductos tbody tr');

            trs.each(function(){
                var id_producto = $(this).attr('data-id');
                var cantidad = $(this).find('.cantidadProducto').val();

                var producto = {id_producto:id_producto, cantidad:cantidad};
                productos.push(producto);
            })
            
            var observacion = $('#inputObservación').val();

            data.id_cliente = id_cliente;
            data.productos = productos;
            data.observacion = observacion;

            return data;

        }


    </script>
</html>