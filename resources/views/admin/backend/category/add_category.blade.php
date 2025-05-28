@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Agregar Categoria</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Agregar Categoria</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="card shadow-sm rounded-4 p-4 mt-5">
                    <form id="myForm" action="{{ route('category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-lg-12">
                                <div>
                                    <div class="form-group mb-3">
                                        <label for="example-text-input" class="form-label">Nombre de la Categoría</label>
                                        <input class="form-control" name="category_name" type="text" id="example-text-input" placeholder="Eje. Hamburguesas">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mt-3 mt-lg-0">

                                    <div class="form-group mb-3">
                                        <label for="example-text-input" class="form-label">Imagen de la Categoría</label>
                                        <input class="form-control" name="image" type="file" id="image">
                                    </div>

                                    <div class="mb-3">
                                        <img id="showImage" src="{{ url('upload/no-image.jpeg') }}" alt="" class="rounded-circle p-1 bg-primary" width="150">
                                    </div>

                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light">
                                            <i class="bx bx-check-double font-size-16 align-middle me-2"></i>
                                            GUARDAR
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- end col -->
        </div>
        <!-- end row -->
    </div> <!-- container-fluid -->
</div>

<script type="text/javascript">

    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e)
            {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })

</script>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                category_name: {
                    required : true,
                }, 
                image: {
                    required : true,
                }, 
            },
            messages :{
                category_name: {
                    required : 'Ingrese el nombre de la categoría',
                }, 
                image: {
                    required : 'Seleccione una imagen para la categoría',
                }, 
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>

@endsection
