@extends('admin.admin_master')
@section('title', 'Edit User Profile')
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
                        <form method="POST" action="{{ route('profile.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity" class="col-form-label">Name</label>
                                    <input type="text" name="name" class="form-control" value="{{ $editData->name }}" placeholder="Name" id="inputCity">
                                    <small class="form-control-feedback">
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="inputEmail4" value="{{ $editData->email }}" placeholder="Email">
                                    <small class="form-control-feedback">
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity" class="col-form-label">Mobile</label>
                                    <input type="text" name="mobile" class="form-control" value="{{ $editData->mobile }}" placeholder="Mobile" id="inputCity">
                                    <small class="form-control-feedback">
                                        @error('mobile')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label">Address</label>
                                    <input type="text" name="address" class="form-control" id="inputEmail4" value="{{ $editData->address }}" placeholder="Address">
                                    <small class="form-control-feedback">
                                        @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>
                            </div>

                            <div class="form-row">

                                <div class="form-group col-md-6">
                                    <label for="inputState" class="col-form-label">Gender</label>
                                    <select name="gender" id="gender" class="form-control" required>
                                        <option value="" selected="" disabled="">Select Gender</option>
                                        <option value="Male" {{ ($editData->gender == "Male" ? "selected": "") }}>Male</option>
                                        <option value="Female" {{ ($editData->gender == "Female" ? "selected": "") }}>Female</option>
                                        <option value="Other" {{ ($editData->gender == "Other" ? "selected": "") }}>Other</option>
                                    </select>
                                    <small class="form-control-feedback">
                                        @error('user_type')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>

                                <div class="form-group col-md-6">
                                    <div class="form-group">
                                    <label for="inputCity" class="col-form-label">Profile Image</label>
                                        <input type="file" name="image" class="form-control" id="image">
                                    </div>

                                    <div class="form-group">
                                        <div class="controls">
                                            <img id="showImage" src="{{ (!empty($user->image))? url('upload/user_images/'.$user->image):url('upload/no_image.jpg') }}" style="width: 100px; height:100px; border:1px solid #000000;">
                                        </div>
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

</div>




    @endsection
