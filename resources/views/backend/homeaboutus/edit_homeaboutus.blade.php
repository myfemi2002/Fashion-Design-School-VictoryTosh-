@extends('admin.admin_master')
@section('title', 'Edit Home About Us')
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
                        <form method="POST" action="{{ route('homeaboutus.update',$editData->id) }}" enctype="multipart/form-data" >
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label"> Title</label>
                                    <input type="text" name="title" class="form-control" value="{{ $editData->title }}" id="inputEmail4" placeholder="Title">
                                    <small class="form-control-feedback">
                                        @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label">Description</label>
                                    <input type="text" name="description" class="form-control" value="{{ $editData->description }}"  id="inputEmail4" placeholder="Description">
                                    <small class="form-control-feedback">
                                        @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label"> Video Link</label>
                                    <input type="text" name="video_link" class="form-control" value="{{ $editData->video_link }}"  id="inputEmail4" placeholder="Video Link">
                                    <small class="form-control-feedback">
                                        @error('video_link')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-rounded btn-primary mt-2">Update</button>
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


    @endsection

