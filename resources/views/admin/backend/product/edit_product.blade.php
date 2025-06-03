@extends('admin.admin_dashboard')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Modificar Producto</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Modificar Producto</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow-sm rounded-4 p-4 mt-5">
                        <form id="myForm" action="{{ route('admin.product.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $product->id }}">

                            <div class="row">
                                <div class="col-xl-3 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="category_id" class="form-label">Nombre de la Categoría</label>
                                        <select name="category_id" id="category_id" class="form-select">
                                            <option disabled selected>-- Selecciona una Categoría --</option>
                                            @foreach ($category as $cat)
                                                <option value="{{ $cat->id }}" 
                                                    {{ $cat->id == $product->category_id ? 'selected' : '' }} >
                                                        {{ $cat->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="menu_id" class="form-label">Nombre de Menú</label>
                                        <select name="menu_id" id="menu_id" class="form-select">
                                            <option disabled selected>-- Selecciona un Menú --</option>
                                            @foreach ($menu as $men)
                                                <option value="{{ $men->id }}"
                                                    {{ $men->id == $product->menu_id ? 'selected' : '' }} >
                                                        {{ $men->menu_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="city_id" class="form-label">Nombre de la Ciudad</label>
                                        <select name="city_id" id="city_id" class="form-select">
                                            <option disabled selected>-- Selecciona una Ciudad --</option>
                                            @foreach ($city as $cit)
                                                <option value="{{ $cit->id }}"
                                                    {{ $cit->id == $product->city_id ? 'selected' : '' }} >
                                                        {{ $cit->city_name }}</option>
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
                                                <option value="{{ $clie->id }}"
                                                    {{ $clie->id == $product->client_id ? 'selected' : '' }} >
                                                        {{ $clie->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="product_name" class="form-label">Nombre del Producto</label>
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Ej. Pizza de Peperoni" value="{{ $product->name }}">
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="price" class="form-label">Precio</label>
                                        <input type="text" name="price" id="price" class="form-control"
                                            placeholder="Ej. 120.00" value="{{ $product->price }}">
                                    </div>
                                </div>

                                <div class="col-xl-4 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="descount_price" class="form-label">Precio del Descuento</label>
                                        <input type="text" name="descount_price" id="descount_price" class="form-control"
                                            placeholder="Ej. 99.00" value="{{ $product->descount_price }}">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="size" class="form-label">Tamaño</label>
                                        <input type="text" name="size" id="size" class="form-control"
                                            placeholder="Ej. Grande, Mediana" value="{{ $product->size }}">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="qty" class="form-label">Cantidad</label>
                                        <input type="number" name="qty" id="qty" class="form-control"
                                            placeholder="Ej. 10" value="{{ $product->qty }}">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="image" class="form-label">Imagen del Producto</label>
                                        <input type="file" name="image" id="image" class="form-control">
                                    </div>
                                </div>

                                <div class="col-xl-6 col-md-6">
                                    <div class="form-group mb-3 text-center">
                                        <img id="showImage" src="{{ asset($product->image) }}" alt="Vista previa"
                                            class="rounded-circle p-1 bg-primary" width="150">
                                    </div>
                                </div>

                                <div class="col-md-2">
                                    <div class="form-check mb-2">
                                        <input type="checkbox" class="form-check-input" name="best_seller" 
                                        id="bestSeller" value="1" {{ $product->best_seller == 1 ? 'checked' : '' }} >
                                        <label class="form-check-label" for="bestSeller">Mejor Vendido</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check mb-2">
                                        <input type="checkbox" name="most_populer" class="form-check-input" 
                                        id="most_populer" value="1" {{ $product->most_populer == 1 ? 'checked' : '' }} >
                                        <label class="form-check-label" for="most_populer">Mas Popular</label>
                                    </div>
                                </div>

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
