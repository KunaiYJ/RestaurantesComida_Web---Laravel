@extends('client.client_dashboard')
@section('client')
    <style>
        #preview_img {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        #preview_img img.thumb {
            width: 120px;
            height: 100px;
            object-fit: cover;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
            padding: 4px;
            background-color: #fff;
            transition: transform 0.3s ease;
        }

        #preview_img img.thumb:hover {
            transform: scale(1.05);
        }
    </style>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Agregar Galería</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">Agregar Galería</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-9 col-lg-8">
                    <div class="card shadow-sm rounded-4 p-4 mt-5">
                        <form id="myForm" action="{{ route('gallery.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <div class="col-lg-6">
                                    <div class="mt-3 mt-lg-0">

                                        <div class="form-group mb-3">
                                            <label for="example-text-input" class="form-label">Imagenes de Galería</label>
                                            <input class="form-control" name="gallery_img[]" type="file" id="multiImg"
                                                multiple>
                                            <div class="row" id="preview_img"></div>
                                        </div>

                                        <div class="mt-4">
                                            <button type="submit"
                                                class="btn btn-success btn-rounded waves-effect waves-light">
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

    <script>
        $(document).ready(function() {
            $('#multiImg').on('change', function() { //on file input change
                if (window.File && window.FileReader && window.FileList && window
                    .Blob) //check File API supported browser
                {
                    var data = $(this)[0].files; //this file data

                    $.each(data, function(index, file) { //loop though each file
                        if (/(\.|\/)(gif|jpe?g|png|webp)$/i.test(file
                                .type)) { //check supported file type
                            var fRead = new FileReader(); //new filereader
                            fRead.onload = (function(file) { //trigger function on successful read
                                return function(e) {
                                    var img = $('<img/>').addClass('thumb').attr('src',
                                            e.target.result).width(200)
                                        .height(110); //create image element 
                                    $('#preview_img').append(
                                        img); //append image to output element
                                };
                            })(file);
                            fRead.readAsDataURL(file); //URL representing the file's data.
                        }
                    });

                } else {
                    alert("Your browser doesn't support File API!"); //if File API is absent
                }
            });
        });
    </script>
@endsection
