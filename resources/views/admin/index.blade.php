@extends('admin.admin_master')
@section('title', 'Dashboard')
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


    <!-- BEGIN .main-content -->
    <div class="main-content">

        <!-- Row start -->
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-header">Collection Overview</div>
                    <div class="toggle-switch tr">
                        <input type="checkbox" class="check" checked>
                        <b class="b switch"></b>
                        <b class="b track"></b>
                    </div>

                    <div class="card-body">
                        @php
                        $collectionviews = DB::table('collections')->get();
                        @endphp
                        <!-- Row start -->
                        <div class="row gutters">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                <!-- Gallery start -->
                                <div class="baguetteBoxThree gallery">
                                    <!-- Row start -->
                                    <div class="row gutters">
                                        @foreach($collectionviews as $key =>$bestcollection)

                                        <div class="col-lg-3 col-md-3 col-sm-3">
                                            <a href="{{ asset($bestcollection->collection_thumbnail) }}" class="effects">
                                                <img src="{{ asset($bestcollection->collection_thumbnail) }}" class="img-responsive" alt="Unify Admin">
                                                <div class="overlay">
                                                    <span class="expand">+</span>
                                                </div>
                                            </a>
                                        </div>@endforeach

                                    </div>
                                    <!-- Row end -->
                                </div>
                                <!-- Gallery end -->
                            </div>
                        </div>
                        <!-- Row end -->

                    </div>
                </div>
                <!-- Row ends -->
            </div>

        </div>
    </div>
</div>
<!-- Row ends -->

</div>
<!-- END: .main-content -->
</div>

@endsection