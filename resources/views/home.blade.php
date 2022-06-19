@extends('layouts.master_home')
@section('home_content')
@include('layouts.body.slider')
@section('title', 'Home')


<main class="main-content">

   <!--== Start Video Divider Area Wrapper ==-->
   <div class="divider-area divider-about-area">
    @php
    $homeabout = DB::table('home_about_us')->first();
    @endphp
<div class="container-fluid xs-pr-15 xs-pl-15 p-0">
    <div class="row">
        <div class="col-md-12">
            <div class="divider-about-content">
                <div class="divider-content" data-aos="fade-up" data-aos-duration="1000">
                    <span>{{ $homeabout->title }}</span>
                    {{-- <img class="logo-divider" src="{{ asset('frontend/assets/img/logo-main.svg') }}" alt="Logo"> --}}
                    <p>{{ $homeabout->description }}</p>
                    <a href="{{ url('About')}}" class="btn-theme btn-black btn-border">Read more</a>
                </div>
                <div class="video-content" data-aos="fade-up" data-aos-duration="1000">
                    <div class="thumb">
                    <iframe src="{{ $homeabout->video_link }}" width="476" height="476" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!--== End Video Divider Area Wrapper ==-->



    <!--== Start Products Area Wrapper ==-->
    <section class="product-area best-sellers-product-area">

        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6 m-auto">
                    @php
                    $bestcol = DB::table('home_best_collections')->first();
                @endphp
                    <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
                        <h2 class="title">{{ $bestcol->title }}</h2>
                        <h5 class="subtitle">{{ $bestcol->subtitle }}</h5>
                    </div>
                </div>
            </div>

            <div class="row row-gutter-60" data-aos="fade-up" data-aos-duration="1000">
                @foreach($homebestcollection as $key =>$bestcollection)
                <div class="col-sm-6 col-lg-4">
                    <!-- Start Product Item -->

                    <div class="product-item">
                        <div class="product-thumb">
                            <a href="#">
                                <img src="{{ asset($bestcollection->image) }}" alt="Moren-Shop">
                            </a>
                            <div class="product-action">
                            </div>
                        </div>
                        <div class="product-info">
                            <div class="content-inner">
                                <h4 class="title "><a href="#">{{ $bestcollection->name }}</a></h4>
                                {{-- <div class="prices">
                                    <span class="price">£{{ $bestcollection->price }}</span>
                                </div> --}}
                            </div>

                        </div>
                    </div>
                    <!-- End Product Item -->
                </div>
                @endforeach
            </div>
        </div>

    </section>
    <!--== End Products Area Wrapper ==-->

<!--== Start Trends Social Area Wrapper ==-->
<section class="gallery-area gallery-trends-area">
    <div class="container-fluid p-0">
        <div class="row">
            <div class="col-md-8 col-lg-6 m-auto">
                <div class="section-title text-center" data-aos="fade-up" data-aos-duration="1000">
                    <h2 class="title">Trends</h2>
                    <h5 class="subtitle">AS SEEN ON SOCIAL MEDIA</h5>
                </div>
            </div>
        </div>
        <div class="row" data-aos="fade-up" data-aos-duration="1200">
            <div class="col-md-12">
                <div class="gallery-trends-content">
                    <div class="swiper-container gallery-trends-container">
                        <div class="swiper-wrapper">
                            @foreach($homecategorycollection as $key =>$categorycollection)
                            <div class="swiper-slide">
                                <!-- Start Slide Item -->
                                <div class="slider-item">
                                    <div class="bg-thumb" data-bg-img="{{ asset($categorycollection->image) }}"></div>
                                </div>
                                <!-- End Slide Item -->
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--== End Trends Social Area Wrapper ==-->

    <!--== Start Featured Area Wrapper ==-->
    {{-- <section class="featured-area">
        <div class="container" data-aos="fade-up" data-aos-duration="1000">
            <div class="row">
                <div class="col-sm-6 col-md-4">
                    <div class="featured-item">
                        <div class="content">
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="76" height="46" fill="none" viewBox="0 0 76 46"><path fill="currentColor" d="M74.757 45.702H1.243a1.08 1.08 0 0 1-1.08-1.08V33.593a1.081 1.081 0 0 1 .864-1.06 9.73 9.73 0 0 0 0-19.07 1.081 1.081 0 0 1-.865-1.059V1.378A1.081 1.081 0 0 1 1.243.297h73.514a1.08 1.08 0 0 1 1.08 1.081v11.027a1.082 1.082 0 0 1-.864 1.06 9.73 9.73 0 0 0 0 19.07 1.081 1.081 0 0 1 .865 1.06V44.62a1.08 1.08 0 0 1-1.081 1.081zM2.324 43.54h71.352v-9.097a11.892 11.892 0 0 1 0-22.887V2.46H2.324v9.097a11.892 11.892 0 0 1 0 22.887v9.097z"></path><path fill="currentColor" d="M54.216 6.39a1.081 1.081 0 0 1-1.08-1.081V1.378a1.081 1.081 0 0 1 2.161 0v3.93a1.081 1.081 0 0 1-1.08 1.082zm0 9.828a1.08 1.08 0 0 1-1.08-1.08v-3.932a1.081 1.081 0 0 1 2.161 0v3.931a1.081 1.081 0 0 1-1.08 1.081zm0 9.828a1.08 1.08 0 0 1-1.08-1.081v-3.93a1.081 1.081 0 0 1 2.161 0v3.931a1.081 1.081 0 0 1-1.08 1.08zm0 9.828a1.08 1.08 0 0 1-1.08-1.08v-3.931a1.082 1.082 0 0 1 2.161 0v3.93a1.081 1.081 0 0 1-1.08 1.081zm0 9.828a1.08 1.08 0 0 1-1.08-1.08V40.69a1.082 1.082 0 0 1 2.161 0v3.931a1.081 1.081 0 0 1-1.08 1.081zm-33.59-11.305a1.081 1.081 0 0 1-.764-1.846l20.034-20.045a1.082 1.082 0 1 1 1.529 1.529L21.39 34.08a1.082 1.082 0 0 1-.764.316zm16.704.516a4.993 4.993 0 1 1 4.994-4.994 5 5 0 0 1-4.993 4.994zm0-7.826a2.832 2.832 0 1 0 .001 5.663 2.832 2.832 0 0 0 0-5.663zm-13.796-6.079a4.994 4.994 0 1 1 4.994-4.995 5 5 0 0 1-4.994 4.995zm0-7.826a2.832 2.832 0 1 0 0 5.663 2.832 2.832 0 0 0 0-5.663z"></path></svg>       </span>
                            <div class="inner-content">
                                <h4 class="title">NEW DISCOUNT</h4>
                                <p>Lorem ipsum dolor sit amet, id pericula appe llantur eam, mea.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="featured-item mt-xs-30">
                        <div class="content">
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="76" height="72" fill="none" viewBox="0 0 76 72"><path fill="currentColor" d="M64.733 71.123H11.267a4.432 4.432 0 0 1-4.422-4.42V31.614a1.081 1.081 0 0 1 1.081-1.08h60.147a1.081 1.081 0 0 1 1.082 1.08v35.089a4.432 4.432 0 0 1-4.422 4.42zM9.008 32.695v34.008a2.263 2.263 0 0 0 2.26 2.26h53.465a2.262 2.262 0 0 0 2.26-2.26V32.695H9.007z"></path><path fill="currentColor" d="M73.085 32.695H2.915a2.755 2.755 0 0 1-2.753-2.749v-8.357a2.755 2.755 0 0 1 2.753-2.751h70.17a2.755 2.755 0 0 1 2.753 2.751v8.357a2.755 2.755 0 0 1-2.753 2.75zM2.915 21a.59.59 0 0 0-.59.59v8.356a.59.59 0 0 0 .59.59h70.17a.59.59 0 0 0 .59-.59v-8.357a.59.59 0 0 0-.59-.589H2.915z"></path><path fill="currentColor" d="M40.23 21a1.081 1.081 0 0 1-1.032-1.404c1.336-4.276 3.732-10.054 7.554-13.333A7.946 7.946 0 0 1 57.08 18.34a17.38 17.38 0 0 1-4.117 2.558 1.082 1.082 0 0 1-1.267-1.718c.102-.104.224-.186.36-.242a15.29 15.29 0 0 0 3.614-2.235 5.782 5.782 0 1 0-7.507-8.796C44.55 11 42.29 16.963 41.265 20.242A1.081 1.081 0 0 1 40.23 21z"></path><path fill="currentColor" d="M40.23 21a1.08 1.08 0 0 1-1.031-.757c-1.281-4.094-4.108-11.54-8.636-15.42a7.433 7.433 0 0 0-9.66 11.3 19.242 19.242 0 0 0 4.55 2.816 1.08 1.08 0 1 1-.908 1.962 21.321 21.321 0 0 1-5.052-3.136A9.597 9.597 0 0 1 31.968 3.178c4.695 4.02 7.645 11.147 9.297 16.419A1.081 1.081 0 0 1 40.23 21zm3.932 50.123H31.838a1.081 1.081 0 0 1-1.081-1.08v-38.43a1.081 1.081 0 0 1 1.08-1.08h12.325a1.081 1.081 0 0 1 1.081 1.08v38.428a1.081 1.081 0 0 1-1.08 1.081zM32.92 68.961h10.16V32.695H32.92v36.266z"></path></svg></span>
                            <div class="inner-content">
                                <h4 class="title">GIFT VOUCHERS</h4>
                                <p>Lorem ipsum dolor sit amet, id pericula appe llantur eam, mea.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-4">
                    <div class="featured-item mt-sm-30">
                        <div class="content">
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="76" height="74" fill="none" viewBox="0 0 76 74"><path fill="currentColor" d="M74.757 73.649H1.243a1.08 1.08 0 0 1-1.08-1.081V20.4a1.081 1.081 0 0 1 1.08-1.081h73.514a1.08 1.08 0 0 1 1.08 1.081v52.168a1.08 1.08 0 0 1-1.08 1.08zM2.324 71.487h71.352V21.48H2.324v50.006z"></path><path fill="currentColor" d="M74.757 21.481H1.243a1.08 1.08 0 0 1-.865-1.73L14.607.785a1.081 1.081 0 0 1 .864-.432H60.53a1.081 1.081 0 0 1 .865.432l14.228 18.968a1.081 1.081 0 0 1-.865 1.73zM3.405 19.32h69.19L59.988 2.514H16.012L3.405 19.319z"></path><path fill="currentColor" d="M47.19 21.481H28.81a1.082 1.082 0 0 1-1.059-1.297l3.784-18.968a1.08 1.08 0 0 1 1.06-.864h10.81a1.08 1.08 0 0 1 1.06.864l3.784 18.971a1.08 1.08 0 0 1-1.06 1.297v-.003zM30.128 19.32H45.87L42.52 2.514h-9.038L30.13 19.319z"></path><path fill="currentColor" d="M47.19 41.848a1.08 1.08 0 0 1-.685-.245L38 34.653l-8.505 6.95a1.08 1.08 0 0 1-1.765-.836V20.4a1.08 1.08 0 0 1 1.08-1.081h18.38a1.08 1.08 0 0 1 1.08 1.081v20.367a1.08 1.08 0 0 1-1.08 1.08zM38 32.176c.25 0 .491.087.684.245l7.424 6.066V21.48H29.892v17.006l7.424-6.067a1.08 1.08 0 0 1 .684-.244z"></path></svg></span>
                            <div class="inner-content">
                                <h4 class="title">FREE DELIVERY</h4>
                                <p>Lorem ipsum dolor sit amet, id pericula appe llantur eam, mea.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!--== End Featured Area Wrapper ==-->
</main>



@endsection


<script type="text/javascript">
    document.getElementsByTagName('title')[0].innerHTML = 'Home | Victrorytosh';
</script>

{{-- @endsection --}}
