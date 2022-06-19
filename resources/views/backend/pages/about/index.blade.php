@extends('admin.admin_master')
@section('title', 'View Collections')
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
                        <a href="{{ route('about.add') }}" class="btn btn-info m-l-15 mb-4" style="float:left;"> <i class="fa fa-plus-circle"></i> Add About</a>

                        <table id="basicExample" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="2%">SL</th>
                                    <th width="5%">Section Title</th>
                                    <th scope="col" width="15%">Welcome Note</th>
                                    <th width="2%">About Image</th>
                                    <th width="5%">Leadership Name</th>
                                    <th width="5%">Leadership Position</th>

                                    <th width="2%">Leadership Image</th>
                                    <th width="5%">Date of Creation</th>
                                    <th scope="col" width="5%">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($allData as $key => $abouts)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $abouts -> section_title }}</td>
                                    <td>{{ $abouts -> welcome_note }}</td>
                                    <td> <img src="{{ asset($abouts->about_image) }}" alt="Blank Image" style="height:40px; width:70px"> </td>
                                    <td>{{ $abouts -> leadership_name }}</td>
                                    <td>{{ $abouts -> leadership_position }}</td>

                                    <td> <img src="{{ asset($abouts->leadership_image) }}" alt="Blank Image" style="height:40px; width:70px"> </td>
                                    <td>
                                        @if($abouts->created_at == NULL)<span class="text-danger">No Date Set</span>
                                            @else
                                            {{ Carbon\Carbon::parse($abouts->created_at)->diffForHumans() }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('about.edit',$abouts->id) }}" class="btn btn-primary btn-rounded btn-sm" title="Edit Data" > <i class="fa fa-edit"></i></a>
                                        <a href="{{ route('about.delete',$abouts->id) }}"  class="btn btn-danger btn-rounded btn-sm"  id="delete" title="Delete Data" > <i class="fa fa-times"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- Row ends -->

    </div>




    @endsection















