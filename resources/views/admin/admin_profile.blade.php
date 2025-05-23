@extends('admin.admin_dashboard')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Perfil de Usuario</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Contacts</a></li>
                            <li class="breadcrumb-item active">Perfil de Usuario</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="card rounded-4 shadow-lg">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm order-2 order-sm-1">
                                <div class="d-flex align-items-start mt-3 mt-sm-0">
                                    <div class="flex-shrink-0">
                                        <div class="avatar-xl me-3">
                                            <img src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/no_image_user.webp') }}"
                                                alt="" class="img-fluid rounded-circle d-block">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <div>
                                            <h5 class="font-size-16 mb-1">{{ $profileData->name }}</h5>
                                            <p class="text-muted font-size-13">{{ $profileData->email }}</p>

                                            <div
                                                class="d-flex flex-wrap align-items-start gap-2 gap-lg-3 text-muted font-size-13">
                                                <div><i
                                                        class="mdi mdi-circle-medium me-1 text-success align-middle"></i>{{ $profileData->phone }}
                                                </div>
                                                <div><i
                                                        class="mdi mdi-circle-medium me-1 text-success align-middle"></i>{{ $profileData->address }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- end card body -->
                </div>
                <!-- end card -->

                <div class="card shadow-sm rounded-4 p-4 mt-5">
                    <form action="{{ route('admin.profile.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-lg-6">
                                <div>
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Nombre</label>
                                        <input class="form-control" name="name" type="text" value="{{ $profileData->name }}" id="example-text-input">
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Correo Electrónico</label>
                                        <input class="form-control" name="email" type="email" value="{{ $profileData->email }}" id="example-text-input">
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Teléfono</label>
                                        <input class="form-control" name="phone" type="text" value="{{ $profileData->phone }}" id="example-text-input">
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="mt-3 mt-lg-0">
                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Direccion</label>
                                        <input class="form-control" name="address" type="text" value="{{ $profileData->address }}" id="example-text-input">
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-text-input" class="form-label">Imagen de Perfil</label>
                                        <input class="form-control" name="photo" type="file" id="image">
                                    </div>

                                    <div class="mb-3">
                                        <img id="showImage" src="{{ !empty($profileData->photo) ? url('upload/admin_images/' . $profileData->photo) : url('upload/no_image_user.webp') }}" alt="" class="rounded-circle p-1 bg-primary" width="150">
                                    </div>

                                    <div class="mt-4">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar Cambios</button>
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

@endsection
