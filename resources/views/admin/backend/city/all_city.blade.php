@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Todas las Ciudades</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0 d-flex justify-content-center">
                                <button type="button" class="btn btn-success btn-rounded d-flex align-items-center gap-2"
                                    data-bs-toggle="modal" data-bs-target="#myModal">
                                    <i class="bx bxs-plus-circle bx-md"></i>Agregar Ciudad</button>
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
                                        <th>Ciudad</th>
                                        <th>Ciudad Slug</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($city as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->city_name }}</td>
                                            <td>{{ $item->city_slug }}</td>
                                            <td>

                                                <button type="button"
                                                    class="btn btn-primary btn-rounded waves-effect waves-light"
                                                    data-bs-toggle="modal" data-bs-target="#myEdit" id="{{ $item->id }}" onclick="cityEdit(this.id)" >Editar</button>

                                                <a href="{{ route('delete.city', $item->id) }}"
                                                    class="btn btn-danger btn-rounded waves-effect waves-light"
                                                    id="delete">Eliminar</a>
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

    <div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        data-bs-scroll="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Agregar Ciudad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="myForm" action="{{ route('city.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="example-text-input" class="form-label">Nombre de la Ciudad</label>
                                    <input class="form-control" name="city_name" type="text"
                                        placeholder="Eje. Hermosillo, Sonora">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success waves-effect waves-light">Guardar</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->


    <div id="myEdit" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
        data-bs-scroll="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Modificar Ciudad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="myForm" action="{{ route('city.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="cat_id" id="cat_id">

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="example-text-input" class="form-label">Nombre de la Ciudad</label>
                                    <input class="form-control" name="city_name" type="text" id="cat"
                                        placeholder="Eje. Hermosillo, Sonora">
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success waves-effect waves-light">Guardar</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <script>
        function cityEdit(id)
        {
            $.ajax({
                type: 'GET',
                url: '/edit/city/'+id,
                dataType: 'json',

                success:function(data)
                {
                    // console.log(data)
                    $('#cat').val(data.city_name);
                    $('#cat_id').val(data.id);
                }
            })
        }
    </script>

@endsection
