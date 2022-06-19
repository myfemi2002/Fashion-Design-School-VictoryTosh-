@extends('layouts.master_home')
@section('home_content')
@section('title', 'Registratiom')

{{-- @php
$aboutcol = DB::table('abouts')->get();
@endphp --}}



<main class="main-content">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area bg-img" data-bg-img="{{ asset('frontend/assets/img/photos/bg-page9.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <div class="page-title-content">
                        <h2 class="title">Collections</h2>
                        <div class="bread-crumbs"><a href="/">Home<span class="breadcrumb-sep"></span></a><span class="active d-none d-sm-inline-block">Collections</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br>
    <!--== End Page Title Area ==-->

    <!--== Start Contact Area ==-->
    <div class="account-login-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 m-auto">
                    <div class="login-top">
                        {{-- <nav class="login-form-nav">
                            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true"><i class="lastudioicon-user-1"></i>Login</button>
                                <button class="nav-link nav-register" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false"><i class="lastudioicon-user-2"></i>Register</button>
                            </div>
                        </nav> --}}
                    </div>

                    <div class="login-bottom">
                        <div class="login-form-content tab-content" id="nav-tabContent">

                            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                <div class="login-form">
                                    <form class="login-form-wrapper" action="{{ route('registration.form') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="course" class="form-label">Course <span class="text-danger">*</span></label>
                                                            <select type="text" name="course" class="form-control">
                                                                <option value="" selected="" disabled="">Select Course</option>
                                                                @foreach($freg as $row)
                                                                <option value="{{ $row->course }}">{{ $row->course }}</option>
                                                                @endforeach
                                                            </select>
                                                            <small>
                                                                @error('course')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </small>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="admission" class="form-label">Admission Date <span class="text-danger">*</span></label>
                                                            <select name="admission" class="form-control">
                                                                <option value="" selected="" disabled="">Select Admission Date</option>
                                                                @foreach($freg as $rows)
                                                                <option value="{{ $rows->admission }}">{{ $rows->admission }}</option>
                                                                @endforeach
                                                            </select>
                                                            <small>
                                                                @error('admission')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </small>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="firstname" class="form-label">First Name <span class="text-danger">*</span></label>
                                                            <input type="text" name="firstname" class="form-control" >
                                                            <small>
                                                                @error('firstname')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </small>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="lastname" class="form-label">Last Name <span class="text-danger">*</span></label>
                                                            <input type="text" name="lastname" class="form-control">
                                                            <small>
                                                                @error('lastname')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </small>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                                            <input type="email" name="email" class="form-control">
                                                            <small>
                                                                @error('email')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </small>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="phone" class="form-label">Phone <span class="text-danger">*</span></label>
                                                            <input type="text" name="phone" class="form-control">
                                                            <small>
                                                                @error('phone')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </small>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="address" class="form-label">Address <span class="text-danger">*</span></label>
                                                            <input type="text" name="address" class="form-control">
                                                            <small>
                                                                @error('address')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </small>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="city" class="form-label">City <span class="text-danger">*</span></label>
                                                            <input type="text" name="city" class="form-control" required>
                                                            <small>
                                                                @error('city')
                                                                <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </small>
                                                        </div>
                                                    </div

                                                    <div class="col-md-12">
                                                        <div class="form-group mb-0 form-group-info">
                                                            <button class="btn btn-theme btn-black" type="submit">Submit</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Contact Area ==-->
</main>







@endsection
