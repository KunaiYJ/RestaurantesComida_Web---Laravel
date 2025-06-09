@extends('client.client_dashboard')
@section('client')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Todas tus Ordenes</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                     
                    <div class="card-body">

        <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
            <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Factura</th>
                <th>Cantidad</th>
                <th>Pago</th>
                <th>Estatus</th>
                <th>Acciones </th> 
            </tr>
            </thead>


            <tbody>
           @foreach ($orderItemGroup as $key=> $orderitem)  

                @php
                    $firstItem = $orderitem->first();
                    $order = $firstItem->order;
                @endphp

                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>{{ $order->invoice_no }}</td>
                    <td>${{ $order->amount }}</td>
                    <td>{{ $order->payment_method }}</td>
                    <td>
                        @if ($order->status == 'Pendiente')
                            <span class="badge bg-info">Pendiente</span>
                        @elseif($order->status == 'Confirmada')
                            <span class="badge bg-primary">Pendiente</span>
                        @elseif($order->status == 'Proceso')
                            <span class="badge bg-warning">Procesada</span>
                        @elseif($order->status == 'Entrega')
                            <span class="badge bg-success">Entregada</span>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('client.order.details',$order->id) }}" class="btn btn-info waves-effect waves-light">
                            <i class="far fa-eye"></i>
                        </a>
                    </td> 
                </tr>
            @endforeach    
            
            </tbody>
        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row --> 

         
    </div> <!-- container-fluid -->
</div>

@endsection