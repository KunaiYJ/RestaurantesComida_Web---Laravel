@extends('frontend.dashboard.dashboard')
@section('dashboard')

@php
    $id = Auth::user()->id;
    $profileData = App\Models\User::find($id);
@endphp

<section class="section pt-4 pb-4 osahan-account-page">
    <div class="container">
        <div class="row">

            @include('frontend.dashboard.sidebar')

            <div class="col-md-9">
                <div class="osahan-account-page-right rounded shadow-sm bg-white p-4 h-100">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="orders" role="tabpanel"
                            aria-labelledby="orders-tab">
                            <h4 class="font-weight-bold mt-0 mb-4">Lista de Ordenes</h4>

                            <div class="bg-white card mb-4 order-list shadow-sm">
                                <div class="gold-members p-4">

                                    <table class="table table-bordered dt-responsive  nowrap w-100">
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
                                    @foreach ($allUserOrder as $key=> $item)  
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->order_date }}</td>
                                            <td>{{ $item->invoice_no }}</td>
                                            <td>${{ $item->amount }}</td>
                                            <td>{{ $item->payment_method }}</td>
                                            <td>
                                                @if ($item->status == 'Pendiente')
                                                    <span class="badge bg-info">Pendiente</span>
                                                @elseif($item->status == 'Confirmada')
                                                    <span class="badge bg-primary">Pendiente</span>
                                                @elseif($item->status == 'Proceso')
                                                    <span class="badge bg-warning">Procesada</span>
                                                @elseif($item->status == 'Entrega')
                                                    <span class="badge bg-success">Entregada</span>
                                                @endif
                                            </td>

                                            <td class="d-flex justify-content-between">
                                                <a href="{{ route('user.order.details',$item->id) }}" 
                                                    class="btn-small d-block text-primary">
                                                    <i class="far fa-eye"> Ver</i>
                                                </a>

                                                <a href="{{ route('user.invoice.download',$item->id) }}" 
                                                    class="btn-small d-block text-danger">
                                                    <i class="fa fa-download"> Factura</i>
                                                </a>
                                            </td> 
                                        </tr>
                                        @endforeach    
                                        
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
