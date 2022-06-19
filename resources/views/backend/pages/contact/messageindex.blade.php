@extends('admin.admin_master')
@section('title', 'View Contact Messages')
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
                    <div class="card-header">Conversation</div>
                    <div class="card-body">
                        <ul class="message-wrapper">
                        @foreach ($allData as $key => $contact)
                        <li class="in">
                                <img class="avatar" alt="48x48" src="{{ asset('backend/assets/img/avatar2.svg')}}">
                                <div class="message">
                                    <a href="#" class="name">{{ $contact -> name }}</a>
                                    <span class="date-time">
                                    @if(
                                        $contact->created_at == NULL)
                                            <span class="text-danger">No Date Set</span>
                                        @else
                                        {{ Carbon\Carbon::parse($contact->created_at)->diffForHumans() }}
                                     @endif
                                    </span>
                                    <p>{{ $contact -> email }} <br><span> {{ $contact -> phone_number }} <br><span> <em> Subject: {{ $contact -> subject }}</em><span><span></p>

                                    <div class="body">
                                        <strong>Sender Message</strong><br>{{ $contact -> message }}<br><br>
                                        <a href="{{ route('contactmessage.read',$contact->id) }}" class="btn btn-primary btn-rounded btn-sm" title="Read Message" >Read</a>
                                        <a href="{{ route('contactmessage.delete',$contact->id) }}"  class="btn btn-danger btn-rounded btn-sm"  id="delete" title="Delete Data" > Delete</i></a>

                                    </div>
                            </li>
                            @endforeach

                        </ul>
                    </div>
                </div>
            </div>
    </div>
    @endsection















