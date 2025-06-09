@extends('client.client_dashboard')
@section('client')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Todas las Busquedas por Mes</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-12">
                <div class="card">
                     
                    <div class="card-body">
        <h3 class="text-danger">Busqueda por Mes: {{ $month }} y Año {{ $years }}</h3>
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
                @php $key = 1; @endphp
                @foreach ($orderItemGroupData as $orderGroup)  
                    @foreach ($orderGroup as $item)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $item->order->order_date }}</td>
                            <td>{{ $item->order->invoice_no }}</td>
                            <td>{{ $item->order->amount }}</td>
                            <td>{{ $item->order->payment_method }}</td>
                            <td>
                                <span class="badge bg-primary">{{ $item->order->status }}</span>
                            </td>

                            <td>
                                <a href="{{ route('client.order.details',$item->order_id) }}" class="btn btn-info waves-effect waves-light">
                                    <i class="far fa-eye"></i>
                                </a>
                            </td> 
                        </tr>
                        @break
                    @endforeach
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