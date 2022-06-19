@extends('admin.admin_master')
@section('title', 'Edit About')
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
                        <form method="POST" action="{{ route('about.update',$editData->id) }}" enctype="multipart/form-data" >
                            @csrf

                            <input type="hidden" name="old_img" value="{{ $editData->about_image }}">
                            <input type="hidden" name="old_image" value="{{ $editData->leadership_image }}">

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label"> Section Title</label>
                                    <input type="text" name="section_title" class="form-control" id="inputEmail4" value="{{ $editData->section_title }}"  placeholder="section title">
                                    <small class="form-control-feedback">
                                        @error('section_title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label"> Welcome Note</label>
                                    <textarea  type="text" name="welcome_note" class="form-control" rows="4" placeholder="welcome note">{{ $editData->welcome_note }}</textarea>
                                    <small class="form-control-feedback">
                                        @error('welcome_note')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>

                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <div class="form-group">
                                    <label for="inputCity" class="col-form-label">About Image<span class="text-danger"> *</span></label>
                                        <input type="file" name="about_image" class="form-control" onchange="mainThumbnailUrl(this)">

                                    @error('about_image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <img class="mt-1" src="" id="mainThumb">
                                    </div>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputEmail4" class="col-form-label">Leadership Name</label>
                                    <input type="text" name="leadership_name" class="form-control" id="inputEmail4"  value="{{ $editData->leadership_name }}"  placeholder="Leadership Name">
                                    <small class="form-control-feedback">
                                        @error('leadership_name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>

                                <div class="form-group col-md-4">
                                    <label for="inputEmail4" class="col-form-label">Leadership Position</label>
                                    <input type="text" name="leadership_position" class="form-control" id="inputEmail4" value="{{ $editData->leadership_position }}"  placeholder="Leadership Position">
                                    <small class="form-control-feedback">
                                        @error('leadership_position')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label"> Leadership Facebook</label>
                                    <input type="text" name="leadership_facebook" class="form-control" id="inputEmail4" value="{{ $editData->leadership_facebook }}"  placeholder="Leadership Facebook">
                                    <small class="form-control-feedback">
                                        @error('leadership_facebook')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label">Leadership Twitter</label>
                                    <input type="text" name="leadership_twitter" class="form-control" id="inputEmail4"  value="{{ $editData->leadership_twitter }}" placeholder="Leadership Twitter">
                                    <small class="form-control-feedback">
                                        @error('leadership_twitter')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label"> Leadership Instragram</label>
                                    <input type="text" name="leadership_instragram" class="form-control" id="inputEmail4"  value="{{ $editData->leadership_instragram }}" placeholder="Leadership Instragram">
                                    <small class="form-control-feedback">
                                        @error('leadership_instragram')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>


                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                    <label for="inputCity" class="col-form-label">Leadership Image<span class="text-danger"> *</span></label>
                                        <input type="file" name="leadership_image" class="form-control" onchange="leadershipImage(this)">

                                    @error('leadership_image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <img class="mt-1" src="" id="leadershipImg">
                                    </div>
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

<script type="text/javascript">
    function leadershipImage(input){
        if (input.files && input.files[0]){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#leadershipImg').attr('src',e.target.result).width(80).height(80);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>





@endsection
