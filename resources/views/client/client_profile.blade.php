@extends('client.client_dashboard')
@section('client')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <div class="row mb-4">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Perfil de Usuario</h4>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="#">Inicio</a></li>
                        <li class="breadcrumb-item active">Perfil</li>
                    </ol>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-9 col-lg-10 mx-auto">
                <div class="card shadow rounded-4 mb-4">
                    <div class="card-body text-center">
                        <img src="{{ !empty($profileData->photo) ? url('upload/client_images/' . $profileData->photo) : url('upload/no_image_user.webp') }}" 
                            class="rounded-circle border border-3 border-primary mb-3" width="120" height="120" alt="Foto de perfil">
                        <h5 class="mb-1">{{ $profileData->name }}</h5>
                        <p class="text-muted mb-0">{{ $profileData->email }}</p>
                        <p class="text-muted small">{{ $profileData->phone }} | {{ $profileData->address }}</p>
                    </div>
                </div>

                <div class="card shadow-sm rounded-4 p-4">
                    <form action="{{ route('client.profile.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row g-3">

                            <div class="col-md-6">
                                <label class="form-label">Nombre</label>
                                <input class="form-control" name="name" type="text" value="{{ $profileData->name }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Correo Electrónico</label>
                                <input class="form-control" name="email" type="email" value="{{ $profileData->email }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Teléfono</label>
                                <input class="form-control" name="phone" type="text" value="{{ $profileData->phone }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Ciudad</label>
                                <select name="city_id" class="form-select">
                                    <option disabled selected>-- Selecciona una Ciudad --</option>
                                    @foreach ($city as $cit)
                                        <option value="{{ $cit->id }}" {{ $cit->id == $profileData->city_id ? 'selected' : '' }}>{{ $cit->city_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label">Información del Restaurante</label>
                                <textarea name="shop_info" class="form-control" rows="3" placeholder="Escribe una breve descripción...">{{ $profileData->shop_info }}</textarea>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label">Dirección</label>
                                <input class="form-control" name="address" type="text" value="{{ $profileData->address }}">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Foto de Portada</label>
                                <input class="form-control" name="cover_photo" type="file" id="imagePortada">
                                <img id="showImagePortada" src="{{ !empty($profileData->cover_photo) ? url('upload/client_images/' . $profileData->cover_photo) : url('upload/no-image.jpeg') }}" 
                                    class="mt-2 rounded border" width="60%" height="auto" alt="Portada">
                            </div>

                            <div class="col-md-6">
                                <label class="form-label">Foto de Perfil</label>
                                <input class="form-control" name="photo" type="file" id="imagePerfil">
                                <img id="showImagePerfil" src="{{ !empty($profileData->photo) ? url('upload/client_images/' . $profileData->photo) : url('upload/no_image_user.webp') }}" 
                                    class="mt-2 bg-primary border-2" width="50%" height="auto" alt="Perfil">
                            </div>

                            <div class="col-12 text-center mt-3">
                                <button type="submit" class="btn btn-success btn-lg rounded-pill px-4">Guardar Cambios</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Scripts para previsualizar imagen -->
<script type="text/javascript">
    $(document).ready(function(){
        $('#imagePerfil').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImagePerfil').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });

        $('#imagePortada').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImagePortada').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files[0]);
        });
    });
</script>
@endsection
