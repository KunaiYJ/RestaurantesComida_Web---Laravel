@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Todas las Categorías</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0 d-flex justify-content-center">
                                <a href="{{ route('add.category') }}" 
                                    class="btn btn-success btn-rounded d-flex align-items-center gap-2">
                                    <i class="bx bxs-plus-circle bx-md"></i>Agregar Categoria
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
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Imagen</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($category as $key => $item)
                                        
                                        <tr>
                                            <td>{{ $key+1 }}</td>
                                            <td>{{ $item->category_name }}</td>
                                            <td><img src="{{ asset($item->image) }}" style="width: 70px; height: 4-px"></td>
                                            <td>
                                                <a href="{{ route('edit.category', $item->id) }}" class="btn btn-primary btn-rounded waves-effect waves-light"><i class="fas fa-edit"></i></a></a>
                                                <a href="{{ route('delete.category', $item->id) }}" class="btn btn-danger btn-rounded waves-effect waves-light" id="delete"><i class="fas fa-trash-alt"></i></a>
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
