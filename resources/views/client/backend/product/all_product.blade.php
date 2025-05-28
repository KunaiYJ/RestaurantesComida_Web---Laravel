@extends('client.client_dashboard')
@section('client')

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Todos los Productos</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <a href="{{ route('add.menu') }}" 
                                class="btn btn-success btn-rounded d-flex align-items-center gap-2">
                                <i class="bx bxs-plus-circle bx-md"></i>Agregar Producto
                            </a>
                        </ol>
                    </div>

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
                <th>Numero Serial</th>
                <th>Imagen</th>
                <th>Nombre del Producto</th>
                <th>Menú</th>
                <th>Precio</th>
                <th>QTY</th>
                <th>Descuento</th>
                <th>Estatus</th>
                <th>Acciones </th> 
            </tr>
            </thead>


            <tbody>
           @foreach ($product as $key=> $item)  
            <tr>
                <td>{{ $key+1 }}</td>
                <td><img src="{{ asset($item->image) }}" alt="" style="width: 70px; height:40px;"></td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->menu_id }}</td>
                <td>{{ $item->price }}</td>
                <td>{{ $item->qty }}</td>
                <td>{{ $item->descount_price }}</td>
                <td>
                    @if ($item->status == 1)
                        <span class="text-success"><b>Activo</b></span>
                    @else
                        <span class="text-danger"><b>Inactivo</b></span>
                    @endif
                </td>
                <td><a href="{{ route('edit.menu',$item->id) }}" class="btn btn-info waves-effect waves-light">Editar</a>
                <a href="{{ route('delete.menu',$item->id) }}" class="btn btn-danger waves-effect waves-light" id="delete">Eliminar</a>
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