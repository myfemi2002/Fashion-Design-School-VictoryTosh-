@extends('layouts.master_home')
@section('home_content')
@section('title', 'About')

@php
$contactviews = DB::table('admin_contacts')->first();
@endphp

<main class="main-content">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area bg-img" data-bg-img="{{ asset('frontend/assets/img/photos/bg-page3.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <div class="page-title-content">
                        <h2 class="title">Contact Us</h2>
                        <div class="bread-crumbs"><a href="/">Home<span class="breadcrumb-sep"></span></a><span class="active d-none d-sm-inline-block">Contact Us</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br>
    <!--== End Page Title Area ==-->

    <!--== Start Contact Area ==-->
    <section class="contact-area">
        <div class="container">
            <div class="row">
                <div class=" col-lg-7">
                    <div class="contact-form">
                        <form class="contact-form-wrapper form-style" id="contact-form" action="{{ route('contact.form') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-title">
                                        <h2 class="title">Contact us for any questions</h2>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="name" placeholder="Name*">
                                    <small>
                                        @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="email" name="email" placeholder="Email*">
                                    <small>
                                        @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="phone_number" placeholder="Phone Number*">
                                    <small>
                                        @error('phone_number')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="subject" placeholder="Subject*">
                                    <small>
                                        @error('subject')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-0">
                                        <textarea class="form-control textarea" name="message" placeholder="How can we help?"></textarea>
                                    <small>
                                        @error('message')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </small>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group mb-0">
                                        <button class="btn btn-theme btn-black" type="submit">Send Message</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <!-- Message Notification -->
                        {{-- <div class="form-message"></div> --}}
                    </div>
                </div>


                <div class=" col-lg-5">
                    <div class="contact-info-wrapper">
                        <div class="section-title">
                            <h2 class="title">Get info</h2>
                        </div>
                        <div class="contact-info-content">
                            <div class="align-top">
                                <div class="contact-info-item">
                                    <div class="icon">
                                        <i class="lastudioicon lastudioicon-pin-3-2"></i>
                                    </div>
                                    <div class="content">
                                        <h4>Victorytosh Store </h4>
                                        <p>{{ $contactviews->address }}</p>
                                    </div>
                                </div>
                                <div class="contact-info-item">
                                    <div class="icon">
                                        <span><i class="lastudioicon lastudioicon-clock"></i></span>
                                    </div>
                                    <div class="content">
                                        <h4>Working Hours</h4>
                                        <p>{{ $contactviews->working_hours }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="align-bottom">
                                <div class="contact-info-item info-item2">
                                    <div class="icon">
                                        <span><i class="lastudioicon lastudioicon-mail"></i></span>
                                    </div>
                                    <div class="content">
                                        <p>{{ $contactviews->email }}</p>
                                    </div>
                                </div>
                                <div class="contact-info-item">
                                    <div class="icon">
                                        <span><i class="lastudioicon lastudioicon-phone-call-2"></i></span>
                                    </div>
                                    <div class="content">
                                        <p>{{ $contactviews->phone_number }}</p>
                                    </div>
                                </div>
                                <div class="contact-info-item social-icons-item mb-0 pb-0">
                                    <div class="content">
                                        <div class="social-widget">
                                            <a href="{{ $contactviews->facebook }}" target="blank"><i class="lastudioicon lastudioicon-b-facebook"></i></a>
                                            <a href="#/"><i class="lastudioicon lastudioicon-b-pinterest"></i></a>
                                            <a href="#/"><i class="lastudioicon lastudioicon-b-twitter"></i></a>
                                            <a href="#/"><i class="lastudioicon lastudioicon-b-instagram"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Contact Area ==-->

    <!--== Start Map Area ==-->
    <div class="contact-map-area">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.3747334693926!2d3.901450814775828!3d7.423715594643969!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1039f34da8db8677%3A0xa493fc9891d6c4ae!2sVictoryTosh%20Fashion%20School!5e0!3m2!1sen!2sng!4v1634520185202!5m2!1sen!2sng" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
    <!--== End Map Area ==-->
</main>





@endsection
