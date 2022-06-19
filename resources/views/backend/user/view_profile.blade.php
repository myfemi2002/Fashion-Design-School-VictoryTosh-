@extends('admin.admin_master')
@section('title', 'My Profile')
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

                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="{{ route('profile.edit') }}" class="btn btn-rounded btn-success mb-5 btn-sm-3" > <i class="fas fa-edit"></i>Edit Profile</a>

                                <center class="m-t-30 ">
                                <img src="{{ (!empty($user->image))? url('upload/user_images/'.$user->image):url('upload/no_image.jpg') }}" class="rounded-circle" width="150" />
                                    <h4 class=" m-t-10">{{ $user->name }}</h4>
                                    <h6 class="card-subtitle">{{ $user->email }}</h6>

                                </center>
                            </div>
                            <div>
                                <hr>
                            </div>

                            <div class="user-btm-box">
                                <!-- .row -->
                                <div class="row text-center m-t-10">
                                    <div class="col-md-6 b-r"><strong>Name</strong>
                                        <p>{{ $user->name }}</p>
                                    </div>
                                    <div class="col-md-6"><strong>Role</strong>
                                    <p>{{ $user->user_type }}</p>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <hr>

                                <!-- .row -->
                                <div class="row text-center m-t-10">
                                    <div class="col-md-6 b-r"><strong>Email ID</strong>
                                        <p>{{ $user->email }}</p>
                                    </div>
                                    <div class="col-md-6"><strong>Phone</strong>
                                        <p>{{ $user->mobile }}</p>
                                    </div>
                                </div>
                                <!-- /.row -->
                                <hr>
                                <!-- .row -->
                                <div class="row text-center m-t-10">
                                    <div class="col-md-12"><strong>Address</strong>
                                        <p>{{ $user->address }}</p>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                </div>
                <!-- Row -->
        </div>

@endsection
