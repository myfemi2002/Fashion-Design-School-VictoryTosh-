@extends('admin.admin_master')
@section('title', 'View Applicant')
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
                        <a href="{{ route('coursedate.add') }}" class="btn btn-info m-l-15 mb-4" style="float:left;"> <i class="fa fa-plus-circle"></i> Add Contact</a>

                        <table id="basicExample" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th scope="col" width="9%">Email</th>
                                    <th>Phone</th>
                                    <th>Course</th>
                                    <th>Admission</th>
                                    <th scope="col" width="12%">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($allData as $key => $apply)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $apply -> firstname }}</td>
                                    <td>{{ $apply -> lastname }}</td>
                                    <td>{{ $apply -> email }}</td>
                                    <td>{{ $apply -> phone }}</td>
                                    <td>{{ $apply -> course }}</td>
                                    <td>{{ $apply -> admission }}</td><td>
                                        <a href="{{ route('registation.edit',$apply->id) }}" class="btn btn-primary btn-rounded btn-sm"  data-toggle="modal" data-target="#exampleModal">Read</a>
                                        <a href="{{ route('registation.delete',$apply->id) }}"  class="btn btn-danger btn-rounded btn-sm"  id="delete" title="Delete Data" >Del</a>
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

    <section>
        @foreach ($allData as $items)
        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-row">
                                    <div class="card-body">
                                        <ul class="message-wrapper">
                                            <li class="in">
                                                <img class="avatar" alt="48x48" src="{{ asset('backend/assets/img/avatar2.svg')}}">
                                                <div class="message">
                                                    <span class="date-time">
                                                        @if(
                                                            $items->created_at == NULL)
                                                            <span class="text-danger">No Date Set</span>
                                                            @else
                                                            {{ Carbon\Carbon::parse($items->created_at)->diffForHumans() }}
                                                            @endif
                                                        </span><br>
                                                        <p> <span><strong> Firstname:</strong> {{ $items -> firstname }}</span><br>
                                                            <span><strong> Lastname:</strong> {{ $items -> lastname }}</span><br>
                                                            <span><strong> Email:</strong> {{ $items -> email }}</span><br>
                                                            <span><strong> Phone:</strong> {{ $items -> phone }}</span><br>
                                                            <span><strong> Address:</strong> {{ $items -> address }}</span><br>
                                                            <span><strong> City:</strong> {{ $items -> city }}</span><br>
                                                            <span><strong> Course:</strong> {{ $items -> course }}</span><br>
                                                            <span><strong> Admission:</strong> {{ $items -> admission }}</span><br>
                                                        </p>
                                                    </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Row end -->
                        @endforeach
                    </section>
            @endsection















