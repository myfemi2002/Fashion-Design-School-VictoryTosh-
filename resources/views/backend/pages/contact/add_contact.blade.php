@extends('admin.admin_master')
@section('title', 'Add Contact')
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
                        <form method="POST" action="{{ route('contact.store') }}" enctype="multipart/form-data" >
                            @csrf

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label"> Contact Address</label>
                                    <input type="text" name="address" class="form-control" id="inputEmail4" placeholder="Contact Address">
                                    <small class="form-control-feedback">
                                        @error('address')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label">Working Hours</label>
                                    <input type="text" name="working_hours" class="form-control" id="inputEmail4" placeholder="Working Hours">
                                    <small class="form-control-feedback">
                                        @error('working_hours')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label"> Phone Number</label>
                                    <input type="text" name="phone_number" class="form-control" id="inputEmail4" placeholder="Phone Number">
                                    <small class="form-control-feedback">
                                        @error('phone_number')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label">Email</label>
                                    <input type="text" name="email" class="form-control" id="inputEmail4" placeholder="Email">
                                    <small class="form-control-feedback">
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label"> Facebook</label>
                                    <input type="text" name="facebook" class="form-control" id="inputEmail4" placeholder="Facebook">
                                    <small class="form-control-feedback">
                                        @error('facebook')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label">Twitter</label>
                                    <input type="text" name="twitter" class="form-control" id="inputEmail4" placeholder="Twitter">
                                    <small class="form-control-feedback">
                                        @error('twitter')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label"> Instragram</label>
                                    <input type="text" name="instragram" class="form-control" id="inputEmail4" placeholder="Instragram">
                                    <small class="form-control-feedback">
                                        @error('instragram')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="inputEmail4" class="col-form-label">Linkedin</label>
                                    <input type="text" name="linkedin" class="form-control" id="inputEmail4" placeholder="Linkedin">
                                    <small class="form-control-feedback">
                                        @error('linkedin')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
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


    @endsection

