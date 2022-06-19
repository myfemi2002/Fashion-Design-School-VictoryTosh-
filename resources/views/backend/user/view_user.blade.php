@extends('admin.admin_master')
@section('title', 'Manage User')
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
                                            <table id="basicExample" class="table table-striped table-bordered">
                                                <thead>
                                                    <th width="5%">SL</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Date of Creation</th>
                                                    <th width="25%">Action </th>
                                                </thead>

                                                <tbody>
                                                    @foreach ($allData as $key => $user)
                                                    <tr>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $user -> name }}</td>
                                                        <td>{{ $user -> email }}</td>
                                                        <td>{{ $user -> user_type }}</td>
                                                        <td>
                                                            @if($user->created_at == NULL)<span class="text-danger">No Date Set</span>
                                                                @else
                                                                {{ Carbon\Carbon::parse($user->created_at)->diffForHumans() }}
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('users.edit',$user->id) }}" class="btn btn-primary btn-rounded btn-sm" title="Edit Data" > <i class="fa fa-edit"></i></a>
                                                            <a href="{{ route('users.delete',$user->id) }}"  class="btn btn-danger btn-rounded btn-sm"  id="delete" title="Delete Data" > <i class="fa fa-times"></i></a>
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
</div>




@endsection
