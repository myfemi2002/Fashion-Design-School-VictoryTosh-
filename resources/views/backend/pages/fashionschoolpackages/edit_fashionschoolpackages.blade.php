@extends('admin.admin_master')
@section('title', 'Add Fashion School Package')
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

                        <form method="POST" action="{{ route('fashionschoolpackages.update',$editData->id) }}" enctype="multipart/form-data" >
                            @csrf

                            <!--- Image That exsit in ithe datatable-->
                            <input type="hidden" name="old_image" value="{{ $editData->image }}">


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label"> Class</label>
                                    <input type="text" name="fsclass" class="form-control" value="{{ $editData->fsclass }}"  placeholder="Class">
                                    <small class="form-control-feedback">
                                        @error('fsclass')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label">Description</label>
                                    <textarea type="text" name="description" class="form-control" placeholder="Description" rows="2"> {{ $editData->description }}</textarea>
                                    <small class="form-control-feedback">
                                        @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>
                            </div>


                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label"> Period</label>
                                    <input type="text" name="period" class="form-control" value="{{ $editData->period }}" placeholder="Period">
                                    <small class="form-control-feedback">
                                        @error('period')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label">Price</label>
                                    <input type="text" name="price" class="form-control"  value="{{ $editData->price }}" placeholder="Price">
                                    <small class="form-control-feedback">
                                        @error('price')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                    <label for="inputCity" class="col-form-label">Slider Image</label>
                                        <input type="file" name="image" class="form-control" onchange="mainThumbnailUrl(this)">

                                    @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <img class="mt-1" src="" id="mainThumb">
                                        </div>
                                    </div>
                                </div>

                            {{-- </div> --}}
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

    @endsection

