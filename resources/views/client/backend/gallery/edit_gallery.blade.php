@extends('client.client_dashboard')
@section('client')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Modificar Galería</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                            <li class="breadcrumb-item active">Modificar Galería</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="card shadow-sm rounded-4 p-4 mt-5">
                    <form id="myForm" action="{{ route('gallery.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $gallery->id }}">

                        <div class="row">

                            <div class="col-lg-6">
                                <div class="mt-3 mt-lg-0">

                                    <div class="form-group mb-3">
                                        <label for="example-text-input" class="form-label">Imagen de Galería</label>
                                        <input class="form-control" name="gallery_img" type="file" id="image">
                                    </div>

                                    <div class="mb-3">
                                        <img id="showImage" src="{{ asset($gallery->gallery_img) }}" alt="" class="rounded-circle p-1 bg-primary" width="150">
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

@endsection
