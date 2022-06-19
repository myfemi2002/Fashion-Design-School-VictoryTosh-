@extends('layouts.master_home')
@section('home_content')
@section('title', 'About')

@php
$aboutcol = DB::table('abouts')->get();
@endphp



<main class="main-content">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area bg-img bg-overlay-black2-5 bg-parallax" data-speed="1.1" data-bg-img="{{ asset('frontend/assets/img/photos/bg-page2.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-content content-style2">
                        <h2 class="title">{{ $aboutpage->section_title }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Page Title Area ==-->

    <!--== Start Video Divider Area Wrapper ==-->
    <section class="divider-area divider-about-area-style2">
        <div class="container">
            <div class="row">
                
                {{-- <div class="col-lg-12">
                    <div class="section-title text-center">
                        <h2 class="title">Welcome</h2>
                    </div>
                </div> --}}

                <div class="col-md-6 col-lg-6">
                    <div class="divider-about-thumb">
                        <div class="video-content">
                            <div class="thumb">
                                <img src="{{ $aboutpage->about_image }}" alt="Moren-Image">                              
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="divider-about-content">
                        <div class="divider-content">
                            <h2 class="title">Welcome</h2>
                            <p>{{ $aboutpage->welcome_note }}.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Video Divider Area Wrapper ==-->


<!--== Start Contact Area ==-->
<section class="contact-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 mt-2 mb-2">
                <h5><b class="font-weight-bold">OUR MISSION STATEMENT</b></h5>  
                <p>
                    Our mission at Victorytosh is to help all women to bring their fashion statements
                    to life through bespoke womenswear that cannot be found anywhere else.
                </p>
            </div>

            <div class="col-sm-5 mt-2 mb-2">
                <h5><b class="font-weight-bold">OUR VISION STATEMENT</b></h5> 
                <p>
                    We are here to make unmatched changes in the fashion world for women around the globe,
                    so that every woman can feel comfortable in their own interpreted fashion style.
                </p>
            </div>

            <div class="col-sm-7 mt-2">
                <h5><b class="font-weight-bold">BROAD VISIONS OF VICTORYTOSH</b></h5>
                <ul>
                    <li>To create unique fashion pieces that are unmatched.</li>
                    <li>To help women of every shape and size feel comfortable in their fashion style.</li>
                    <li>To help women interpret their fashion sense, and bring creative wears to life to suit them.</li>
                    <li>To be able to satisfy the fashion needs for all women regardless of race and skin colour.</li>
                    <li>To help young passionate people build a career in fashion and fashion designing.</li>
                </ul> 
            </div>

            <div class="col-sm-5 mt-2">
                <h5><b class="font-weight-bold">BROAD MISSION OF VICTORYTOSH</b></h5>
                <ul>
                    <li>To be a global brand.</li>
                    <li>To be a forerunner for extremely unique fashion statement and styles.</li>
                    <li>To help young people globally bring their career in fashion and styling to life.</li>
                    <li>To help every woman feel comfortable in their skin and sizes.</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!--== End Contact Area ==-->





    <!--== Start Team Area Wrapper ==-->
    <section class="team-area team-creative-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="section-title text-center">
                        <h2 class="title">Our Leadership</h2>
                    </div>
                </div>
            </div>
            <div class="row team-members-style2 row-gutter-60">

                @foreach ($aboutcol as $rows)
                <div class="col-sm-6 col-md-4">
                    <div class="team-member  mt-xs-30">
                        <div class="thumb">
                            <img src="{{$rows->leadership_image }}" alt="{{$rows->leadership_name }}">
                        </div>
                        <div class="content">
                            <div class="member-info">
                                <h4 class="name">{{$rows->leadership_name }}</h4>
                                <p>{{$rows->leadership_position }}</p>
                                <div class="social-icons">
                                    <a href="https://web.facebook.com/{{$rows->leadership_twitter }}" target="blank"><i class="fa lastudioicon-b-facebook"></i></a>
                                    <a href="https://twitter.com/{{$rows->leadership_twitter }}" target="blank"><i class="fa lastudioicon-b-twitter"></i></a>
                                    {{-- <a href="#" target="blank"><i class="fa lastudioicon-b-pinterest"></i></a>
                                    <a href="#" target="blank"><i class="fa lastudioicon-b-instagram"></i></a> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!--== End Team Area Wrapper ==-->

    <!--== Start Contact Area ==-->
    <section class="contact-area contact-about-area bg-img" data-bg-img="{{ asset('frontend/assets/img/about/2.jpg') }}">
        <div class="container-fluid">
            <div class="row row-gutter-0">
                <div class="col-lg-6">
                    <div class="col-left">
                        <div class="section-title text-center">
                            <h2 class="title">let’s talk</h2>
                            <p>
                            Contact us for any questions
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="col-right">
                        <div class="contact-form">
                            <form class="contact-form-wrapper" id="contact-form" action="{{ route('contact.form') }}" method="post">
                            @csrf
                                <div class="row">
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
                        </div>
                        <!-- Message Notification -->
                        <div class="form-message"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="canvas-overlay"></div>
    </section>
    <!--== End Contact Area ==-->
</main>







@endsection
