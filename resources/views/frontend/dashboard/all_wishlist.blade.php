@include('frontend.dashboard.header')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

<section class="section pt-4 pb-4 osahan-account-page">
    <div class="container">
        <div class="row">

            @include('frontend.dashboard.sidebar')

            <div class="col-md-9">
                <div class="osahan-account-page-right rounded shadow-sm bg-white p-4 h-100">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="orders" role="tabpanel"
                            aria-labelledby="orders-tab">
                            <h4 class="font-weight-bold mt-0 mb-4">Lista de Favoritos</h4>

                            <div class="bg-white card mb-4 order-list shadow-sm">
                                <div class="gold-members p-4">

                                    <form action="{{ route('user.password.update') }}" method="post"
                                        enctype="multipart/form-data">
                                        @csrf

                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div>
                                                    <div class="mb-6">
                                                        <label for="example-text-input" class="form-label">Contraseña
                                                            Actual</label>
                                                        <input
                                                            class="form-control @error('old_password') is-invalid @enderror"
                                                            name="old_password" type="password" id="old_password">
                                                        @error('old_password')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-6">
                                                        <label for="example-text-input" class="form-label">Nueva
                                                            Contraseña</label>
                                                        <input
                                                            class="form-control @error('new_password') is-invalid @enderror"
                                                            name="new_password" type="password" id="new_password">
                                                        @error('new_password')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-6">
                                                        <label for="example-text-input" class="form-label">Confirmar
                                                            nueva Contraseña</label>
                                                        <input class="form-control" name="new_password_confirmation"
                                                            type="password" id="new_password_confirmation">
                                                    </div>

                                                    <button type="submit"
                                                        class="btn btn-success rounded waves-effect waves-light mt-4">Guardar
                                                        Cambios</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if (Session::has('message'))
        var type = "{{ Session::get('alert-type', 'info') }}"
        switch (type) {
            case 'info':
                toastr.info(" {{ Session::get('message') }} ");
                break;

            case 'success':
                toastr.success(" {{ Session::get('message') }} ");
                break;

            case 'warning':
                toastr.warning(" {{ Session::get('message') }} ");
                break;

            case 'error':
                toastr.error(" {{ Session::get('message') }} ");
                break;
        }
    @endif
</script>


@include('frontend.dashboard.footer')
