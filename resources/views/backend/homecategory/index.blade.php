@extends('admin.admin_master')
@section('title', 'View Home Category Collection')
@section('admin')


<div class="app-main">
    <!-- BEGIN .main-heading -->
    <header class="main-heading">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="page-icon">
                        <i class="icon-laptop_windows"></i>
                    </div>
                    <div class="page-title">
                        <h5>@yield('title')</h5>
                        <h6 class="sub-heading">Welcome <b> {{ Auth::user()->name }}</b> !</h6>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
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
                        <a href="{{ route('homecategorycollection.add') }}" class="btn btn-info m-l-15 mb-4" style="float:left;"> <i class="fa fa-plus-circle"></i> Add Home Category Collection</a>

                        <table id="basicExample" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Date of Creation</th>
                                    <th scope="col" width="9%">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($allData as $key => $homecategorycollection)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $homecategorycollection -> title }}</td>
                                    <td>{{ $homecategorycollection -> name }}</td>
                                    <td> <img src="{{ asset($homecategorycollection->image) }}" alt="Blank Image" style="height:40px; width:70px"> </td>
                                    <td>
                                        @if($homecategorycollection->created_at == NULL)<span class="text-danger">No Date Set</span>
                                            @else
                                            {{ Carbon\Carbon::parse($homecategorycollection->created_at)->diffForHumans() }}
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('homecategorycollection.edit',$homecategorycollection->id) }}" class="btn btn-primary btn-rounded btn-sm" title="Edit Data" > <i class="fa fa-edit"></i></a>
                                        <a href="{{ route('homecategorycollection.delete',$homecategorycollection->id) }}"  class="btn btn-danger btn-rounded btn-sm"  id="delete" title="Delete Data" > <i class="fa fa-times"></i></a>
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















