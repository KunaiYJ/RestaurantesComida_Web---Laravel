@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Agregar Producto</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Agregar Producto</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow-sm rounded-4 p-4 mt-5">
                        <form id="myForm" action="{{ route('admin.product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                {{-- Categoría --}}
                                <div class="col-xl-3 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="category_id" class="form-label">Nombre de la Categoría</label>
                                        <select name="category_id" id="category_id" class="form-select">
                                            <option disabled selected>-- Selecciona una Categoría --</option>
                                            @foreach ($category as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- Menú --}}
                                <div class="col-xl-3 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="menu_id" class="form-label">Nombre de Menú</label>
                                        <select name="menu_id" id="menu_id" class="form-select">
                                            <option disabled selected>-- Selecciona un Menú --</option>
                                            @foreach ($menu as $men)
                                                <option value="{{ $men->id }}">{{ $men->menu_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- Ciudad --}}
                                <div class="col-xl-3 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="city_id" class="form-label">Nombre de la Ciudad</label>
                                        <select name="city_id" id="city_id" class="form-select">
                                            <option disabled selected>-- Selecciona una Ciudad --</option>
                                            @foreach ($city as $cit)
                                                <option value="{{ $cit->id }}">{{ $cit->city_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="client_id" class="form-label">Nombre del Cliente</label>
                                        <select name="client_id" id="client_id" class="form-select">
                                            <option disabled selected>-- Selecciona una Ciudad --</option>
                                            @foreach ($client as $clie)
                                                <option value="{{ $clie->id }}">{{ $clie->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                {{-- Nombre del producto --}}
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="product_name" class="form-label">Nombre del Producto</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Ej. Pizza de Peperoni">
                                    </div>
                                </div>

                                {{-- Precio --}}
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="price" class="form-label">Precio</label>
                                        <input type="text" name="price" id="price" class="form-control"
                                            placeholder="Ej. 120.00">
                                    </div>
                                </div>

                                {{-- Precio de descuento --}}
                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="descount_price" class="form-label">Precio del Descuento</label>
                                        <input type="text" name="descount_price" id="descount_price" class="form-control"
                                            placeholder="Ej. 99.00">
                                    </div>
                                </div>

                                {{-- Tamaño --}}
                                <div class="col-xl-6 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="size" class="form-label">Tamaño</label>
                                        <input type="text" name="size" id="size" class="form-control"
                                            placeholder="Ej. Grande, Mediana">
                                    </div>
                                </div>

                                {{-- Cantidad --}}
                                <div class="col-xl-6 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="qty" class="form-label">Cantidad</label>
                                        <input type="number" name="qty" id="qty" class="form-control"
                                            placeholder="Ej. 10">
                                    </div>
                                </div>

                                {{-- Imagen del producto --}}
                                <div class="col-xl-6 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="image" class="form-label">Imagen del Producto</label>
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                </div>

                                {{-- Vista previa de la imagen --}}
                                <div class="col-xl-6 col-md-6">
                                    <div class="form-group mb-3 text-center">
                                        <img id="showImage" src="{{ url('upload/no-image.jpeg') }}" alt="Vista previa"
                                            class="rounded-circle p-1 bg-primary" width="150">
                                    </div>
                                </div>

                                {{-- Checkboxes --}}
                                <div class="col-md-2">
                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input" name="best_seller" 
                                        id="bestSeller" value="1">
                                        <label class="form-check-label" for="bestSeller">Mejor Vendido</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check mb-2">
                                        <input type="checkbox" name="most_populer" class="form-check-input" 
                                        id="most_populer" value="1">
                                        <label class="form-check-label" for="most_populer">Mas Popular</label>
                                    </div>
                                </div>

                                {{-- Botón de enviar --}}
                                <div class="col-12 mt-4 text-center">
                                    <button type="submit" class="btn btn-success btn-rounded waves-effect waves-light">
                                        <i class="bx bx-check-double font-size-16 align-middle me-2"></i>
                                        GUARDAR
                                    </button>
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
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            })
        })
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    category_id: {
                        required: true,
                    },
                    menu_id: {
                        required: true,
                    },
                    city_id: {
                        required: true,
                    },
                    name: {
                        required: true,
                    },
                    price: {
                        required: true,
                    },
                    descount_price: {
                        required: true,
                    },
                    size: {
                        required: true,
                    },
                    qty: {
                        required: true,
                    },
                    image: {
                        required: true,
                    },
                },
                messages: {
                    category_id: {
                        required: 'Seleccione una Categoria',
                    },
                    menu_id: {
                        required: 'Seleccione un Menu',
                    },
                    city_id: {
                        required: 'Seleccione una Ciudad',
                    },
                    name: {
                        required: 'Ingrese el nombre del Menú',
                    },
                    price: {
                        required: 'Ingrese el Precio'
                    },
                    descount_price: {
                        required: 'Ingrese el precio del descuento'
                    },
                    size: {
                        required: 'Ingrese el tamaño'
                    },
                    qty: {
                        required: 'Ingrese la cantidad',
                    },
                    image: {
                        required: 'Seleccione una imagen para el producto',
                    },
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>
@endsection
