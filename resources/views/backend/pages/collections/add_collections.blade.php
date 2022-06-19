@extends('admin.admin_master')
@section('title', 'Add Collection')
@section('admin')


<div class="app-main">
    <!-- BEGIN .main-heading -->
    <header class="main-heading">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                    <div class="page-icon">
                        <i class="icon-laptop_windows"></i>
                    </div>
                    <div class="page-title">
                        <h5>@yield('title')</h5>
                        <h6 class="sub-heading">Welcome <b> {{ Auth::user()->name }}</b> !</h6>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                    <div class="right-actions">
                        <a href="#" class="btn btn-primary float-right" data-toggle="tooltip" data-placement="left" title="Download Reports">
                            <i class="icon-download4"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END: .main-heading -->

    <div class="main-content">

        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">@yield('title')</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('collection.store') }}" enctype="multipart/form-data" >
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label"> Collection Name</label>
                                    <input type="text" name="collection_name" class="form-control" id="inputEmail4" placeholder="Collection Name">
                                    <small class="form-control-feedback">
                                        @error('collection_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label">Collection Amount</label>
                                    <input type="text" name="collection_amount" class="form-control" id="inputEmail4" placeholder="Collection Amount">
                                    <small class="form-control-feedback">
                                        @error('collection_amount')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label"> Collection Description</label>
                                    <textarea  type="text" name="collection_description" class="form-control" rows="4" placeholder="Collection Description"></textarea>
                                    <small class="form-control-feedback">
                                        @error('collection_description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label">Collection Category</label>
                                    <input type="text" name="collection_category" class="form-control" id="inputEmail4" placeholder="Collection Category">
                                    <small class="form-control-feedback">
                                        @error('collection_category')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                    <label for="inputCity" class="col-form-label">Main Thumbnail</label>
                                        <input type="file" name="collection_thumbnail" class="form-control" onchange="mainThumbnailUrl(this)">

                                    @error('collection_thumbnail')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <img class="mt-1" src="" id="mainThumb">
                                    </div>
                                </div>

                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                        <label for="inputCity" class="col-form-label">Multiple Image </label>
                                        <input type="file" name="multi_image[]" class="form-control" multiple="" id="multiImg">
                                    </div>
                                    @error('multi_image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="row mt-1 my-1 pr-1 pt-1" id="preview_img"></div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-rounded btn-primary mt-2">submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
        <!-- Row end -->
    </div>


<script language="javascript" src="jquery.maxlength.js"></script>

<script type="text/javascript">
    $(document).ready(function($) {
             //Set maxlength of all the textarea (call plugin)
    $().maxlength();
    })
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>


<script type="text/javascript">
    function mainThumbnailUrl(input){
        if (input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#mainThumb').attr('src',e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


{{-- ---------------------------Show Multi Image JavaScript Code ------------------------ --}}

<script type="text/javascript">

    $(document).ready(function(){
     $('#multiImg').on('change', function(){ //on file input change
        if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
        {
            var data = $(this)[0].files; //this file data

            $.each(data, function(index, file){ //loop though each file
                if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
                    var fRead = new FileReader(); //new filereader
                    fRead.onload = (function(file){ //trigger function on successful read
                    return function(e) {
                        var img = $('<img/>').addClass('thumb').attr('src', e.target.result) .width(80)
                    .height(80); //create image element
                        $('#preview_img').append(img); //append image to output element
                    };
                    })(file);
                    fRead.readAsDataURL(file); //URL representing the file's data.
                }
            });

        }else{
            alert("Your browser doesn't support File API!"); //if File API is absent
            }
        });
    });

    </script>
    {{-- ================================= End Show Multi Image JavaScript Code. ==================== --}}

    @endsection

