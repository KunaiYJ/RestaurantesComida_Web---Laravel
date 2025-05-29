@extends('client.client_dashboard')
@section('client')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Modificar Cupón</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Modificar Cupón</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow-sm rounded-4 p-4 mt-5">
                        <form id="myForm" action="{{ route('coupon.update') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="id" value="{{ $coupon->id }}">

                            <div class="row">

                                <div class="col-xl-6 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="coupon_name" class="form-label">Nombre del Cupón</label>
                                        <input type="text" name="coupon_name" id="coupon_name" class="form-control"
                                            placeholder="Ej. Descuento para una Hamburguesa" value="{{ $coupon->coupon_name }}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="coupon_desc" class="form-label">Descripción del Cupón</label>
                                        <input type="text" name="coupon_desc" id="coupon_desc" class="form-control"
                                            placeholder="Ej. Este cupon es valido para...." value="{{ $coupon->coupon_desc }}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="discount" class="form-label">Descuento</label>
                                        <input type="text" name="discount" id="discount" class="form-control"
                                            placeholder="Ej. 10%" value="{{ $coupon->discount }}">
                                    </div>
                                </div>
                                <div class="col-xl-6 col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="validity" class="form-label">Validez</label>
                                        <input type="date" name="validity" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" id="validity" class="form-control" value="{{ $coupon->validity }}">
                                    </div>
                                </div>

                                <div class="mt-4">
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
            $('#myForm').validate({
                rules: {
                    coupon_name: {
                        required: true,
                    },
                    coupon_desc: {
                        required: true,
                    },
                    discount: {
                        required: true,
                    },
                    validity: {
                        required: true,
                    },
                },
                messages: {
                    coupon_name: {
                        required: 'Ingrese el nombre del Cupón',
                    },
                    coupon_desc: {
                        required: 'Ingrese la descripción del Cupón',
                    },
                    discount: {
                        required: 'Ingrese el descuento del Cupón',
                    },
                    validity: {
                        required: 'Ingrese la validez del Cupón',
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
