@extends('admin.admin_master')
@section('title', 'Edit Collection')
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
                        <form method="POST" action="{{ route('collection.update',$editData->id) }}">
                            @csrf

                            <!--- Image That exsit in ithe datatable-->
                            <input type="hidden" name="old_image" value="{{ $editData->image }}">


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label"> Collection Name</label>
                                    <input type="text" name="collection_name" class="form-control" value="{{ $editData->collection_name }}" id="inputEmail4" placeholder="Collection Name">
                                    <small class="form-control-feedback">
                                        @error('collection_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label">Collection Amount</label>
                                    <input type="text" name="collection_amount" class="form-control" value="{{ $editData->collection_amount }}" id="inputEmail4" placeholder="Collection Amount">
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
                                    <textarea  type="text" name="collection_description" class="form-control" rows="4" placeholder="Collection Description">{{ $editData->collection_description }}</textarea>
                                    <small class="form-control-feedback">
                                        @error('collection_description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label">Collection Category</label>
                                    <input type="text" name="collection_category" class="form-control" value="{{ $editData->collection_category }}" id="inputEmail4" placeholder="Collection Category">
                                    <small class="form-control-feedback">
                                        @error('collection_category')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>
                            </div>
                        <button type="submit" class="btn btn-rounded btn-primary mt-2">Update Collection</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- Row end -->

    {{-- Thumbnail Image Starts Here --}}
    <section class="main-content">
        <div >
            <!-- Row start -->
            <div class="row gutters text-center">
                <div class="col-md-12">
                    <div class="card top-blue-bdr">
                        <div class="card-header"><strong> Update </strong> Collection Thumbnail</div>

                        <form method="POST" action="{{ route('collection.update.imagethumbnail') }}" enctype="multipart/form-data" > 
                            @csrf

                            <input type="hidden" name="id" value="{{ $editData->id }}">
                            <input type="hidden" name="old_img" value="{{ $editData->collection_thumbnail }}">

                            <div class="row row-sm">
                                <div class="col-md-3 text-center">
                                    <div class="card ">
                                        <img class="card-img-top"  src="{{ asset($editData->collection_thumbnail) }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href=""  class="btn btn-danger btn-rounded btn-sm"  id="delete" title="Delete Data" > <i class="fa fa-trash"></i></a>                            
                                            </h5>
                                            <p class="card-text">

                                            <div class="form-group">
                                                <div class="form-group">
                                                    <label for="inputCity" class="col-form-label">Main Thumbnail</label>
                                                    <input type="file" name="collection_thumbnail" class="form-control" onchange="mainThumbnailUrl(this)">

                                                    @error('collection_thumbnail')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    <img class="mt-1" src="" id="mainThumb">
                                                </div>
                                            </div>
                                            </p>
                                        </div>
                                    </div>                       
                                </div>
                            </div>

                            <div class="text-center">
                                <input type="submit" class="btn btn-rounded btn-primary mt-2 mb-2" value="Update Image">
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- Row end -->
        </div>
    </section>
    {{-- Thumbnail Image Ends Here --}}




    {{-- Multiple Images Collections Starts Here --}}
    <section class="main-content">
        <div >
            <!-- Row start -->
            <div class="row gutters text-center">
                <div class="col-md-12">
                    <div class="card top-blue-bdr">
                        <div class="card-header"><strong> Update </strong> Multiple Images Collections</div>

                        <form method="POST" action="{{ route('collection.update.image') }}" enctype="multipart/form-data" > 
                            @csrf

                            <div class="row row-sm">
                                @foreach($multiImgs as $img)

                                <div class="col-md-3 text-center">

                                    <div class="card ">
                                        <img class="card-img-top"  src="{{ asset($img->photo_name) }}" alt="Card image cap">
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <a href="{{ route('collection.multiimg.delete',$img->id)}}"  class="btn btn-danger btn-rounded btn-sm"  id="delete" title="Delete Data" > <i class="fa fa-trash"></i></a>                            
                                            </h5>
                                            <p class="card-text">

                                            <div class="form-group">
                                                <label for="inputEmail4" class="col-form-label"> Change Image <span class="text-danger"></span>*</label>
                                                <input type="file" name="multi_image[ {{ $img->id }} ]" class="form-control" id="inputEmail4">
                                                <small class="form-control-feedback">
                                                    @error('multi_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </small>
                                            </div>
                                            </p>
                                        </div>
                                    </div>                       
                                </div>                           
                                @endforeach
                            </div>

                            <div class="text-center">
                                <input type="submit" class="btn btn-rounded btn-primary mt-2 mb-2" value="Update Image">
                            </div>                        
                        </form>
                    </div>
                </div>
            </div>
            <!-- Row end -->
        </div>
    </section>
    {{-- Multiple Images Collections Ends Here --}}








</div>


<script language="javascript" src="jquery.maxlength.js"></script>

<script type="text/javascript">
                                        $(document).ready(function ($) {
                                            //Set maxlength of all the textarea (call plugin)
                                            $().maxlength();
                                        })
</script>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
                                        $(document).ready(function () {
                                            $('#image').change(function (e) {
                                                var reader = new FileReader();
                                                reader.onload = function (e) {
                                                    $('#showImage').attr('src', e.target.result);
                                                }
                                                reader.readAsDataURL(e.target.files['0']);
                                            });
                                        });
</script>


<script type="text/javascript">
    function mainThumbnailUrl(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#mainThumb').attr('src', e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>


{{-- ---------------------------Show Multi Image JavaScript Code ------------------------ --}}

<script type="text/javascript">

    $(document).ready(function () {
        $('#multiImg').on('change', function () { //on file input change
            if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
            {
                var data = $(this)[0].files; //this file data

                $.each(data, function (index, file) { //loop though each file
                    if (/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)) { //check supported file type
                        var fRead = new FileReader(); //new filereader
                        fRead.onload = (function (file) { //trigger function on successful read
                            return function (e) {
                                var img = $('<img/>').addClass('thumb').attr('src', e.target.result).width(80)
                                        .height(80); //create image element
                                $('#preview_img').append(img); //append image to output element
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
{{-- ================================= End Show Multi Image JavaScript Code. ==================== --}}

@endsection

