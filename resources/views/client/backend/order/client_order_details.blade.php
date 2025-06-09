@extends('client.client_dashboard')
@section('client')

<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Detalles de Ordenes</h4>
                </div>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-1 row-col-lg-2 row-cols-xl-2">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Detalles de Envío</h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-dark mb-0">
                                <tbody>
                                    <tr>
                                        <th width="50%">Nombre del Envi :</th>
                                        <td>{{ $order->name }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Teléfono del Envio :</th>
                                        <td>{{ $order->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Correo del Envio :</th>
                                        <td>{{ $order->email }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Dirección del Envio :</th>
                                        <td>{{ $order->address }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Fecha de la Orden :</th>
                                        <td>{{ $order->order_date }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Detalles de la Orden
                            <p>Factura: <span class="text-danger">{{ $order->invoice_no }}</span></p>
                        </h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-dark mb-0">
                                <tbody>
                                    <tr>
                                        <th width="50%">Nombre :</th>
                                        <td>{{ $order->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Teléfono :</th>
                                        <td>{{ $order->user->phone }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Correo Electrónico :</th>
                                        <td>{{ $order->user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Tipo de Pago :</th>
                                        <td>{{ $order->payment_method }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Transacción :</th>
                                        <td>{{ $order->transaction_id }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Factura :</th>
                                        <td class="text-danger">{{ $order->invoice_no }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Importe :</th>
                                        <td>${{ $order->amount }}</td>
                                    </tr>
                                    <tr>
                                        <th width="50%">Estatus :</th>
                                        <td><span class="badge bg-success">{{ $order->status }}</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
        
        <div class="row row-cols-1 row-cols-md-1 row-col-lg-2 row-cols-xl-1">
            <div class="col">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td class="col-md-1">
                                        <label>Imagen</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label>Nombre del Producto</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label>Nombre del Restaurante</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label>Codigo del Producto</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label>Cantidad</label>
                                    </td>
                                    <td class="col-md-1">
                                        <label>Precio</label>
                                    </td>
                                </tr>

                                @foreach ($orderItem as $item)
                                    <tr>
                                        <td class="col-md-1">
                                            <label>
                                                <img class="rounded" 
                                                    src="{{ asset($item->product->image) }}" 
                                                    style="width: 100px; height: 100px">
                                            </label>
                                        </td>
                                        <td class="col-md-2">
                                            <label>
                                                {{ $item->product->name }}
                                            </label>
                                        </td>

                                        @if ($item->client_id == NULL)
                                            <td class="col-md-2">
                                                <label>
                                                    Owner
                                                </label>
                                            </td>
                                        @else
                                            <td class="col-md-2">
                                                <label>
                                                    {{ $item->product->client->name }}
                                                </label>
                                            </td>
                                        @endif
                                        
                                        <td class="col-md-2">
                                            <label>
                                                {{ $item->product->code }}
                                            </label>
                                        </td>
                                        <td class="col-md-2">
                                            <label>
                                                {{ $item->qty }}
                                            </label>
                                        </td>
                                        <td class="col-md-2">
                                            <label>
                                                <span class="text-success">${{ $item->price }}</span> 
                                                <br> 
                                                Total = <span class="text-success">${{ $item->price * $item->qty }}</span>
                                            </label>
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>

                        <div>
                            <h4>
                                Precio Total : <span class="text-success">${{ $totalPrice }}</span>
                            </h4>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection