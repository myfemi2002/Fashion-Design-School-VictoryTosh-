@extends('layouts.master_home')
@section('home_content')


@php
$fashslider = DB::table('fashion_school_sliders')->get();
@endphp


<main class="main-content">
    <!--== Start Hero Area Wrapper ==-->
    <div class="home-slider-area slider-home4 bg-img bg-overlay-black-5" data-bg-img="{{ asset('frontend/assets/img/slider/h4-s4.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="home-slider-content">
                        <div class="swiper-container home-slider4-container">

                            <div class="swiper-wrapper">

                                @foreach($fashslider as $key =>$rows)
                                <div class="swiper-slide">
                                    <!-- Start Slide Item -->
                                    <div class="home-slider-item">
                                        <div class="thumb">
                                            <div class="bg-thumb bg-overlay bg-img" data-bg-img="{{ asset($rows->image) }}"></div>
                                            <a href="shop.html"></a>
                                        </div>
                                    </div>
                                    <!-- End Slide Item -->
                                </div>
                                @endforeach

                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--== End Hero Area Wrapper ==-->



    <!--== Start Featured Area Wrapper ==-->
    <section class="featured-area">

@php
$package = DB::table('fashion_school_packages')->get();
@endphp
        <div class="container" data-aos="fade-up" data-aos-duration="1000">
            <div class="row row-gutter-60">

                <div class="section-title stitle-style2 separator-line-top text-center">
                    <h5 class="subtitle">Victorytosh </h5>
                    <h2 class="title">FASHION SCHOOL</h2>
                    <p>Pick the package you want and sign up
                    </p>
            </div>

            @foreach($package as $key =>$row)
                <div class="col-sm-6 col-md-3">
                    <div class="featured-item mt-xs-30">
                        <div class="content">
                            <span class="icon">
{{-- <svg xmlns="http://www.w3.org/2000/svg" width="76" height="72" fill="none" viewBox="0 0 76 72"><path fill="currentColor" d="M64.733 71.123H11.267a4.432 4.432 0 0 1-4.422-4.42V31.614a1.081 1.081 0 0 1 1.081-1.08h60.147a1.081 1.081 0 0 1 1.082 1.08v35.089a4.432 4.432 0 0 1-4.422 4.42zM9.008 32.695v34.008a2.263 2.263 0 0 0 2.26 2.26h53.465a2.262 2.262 0 0 0 2.26-2.26V32.695H9.007z"></path><path fill="currentColor" d="M73.085 32.695H2.915a2.755 2.755 0 0 1-2.753-2.749v-8.357a2.755 2.755 0 0 1 2.753-2.751h70.17a2.755 2.755 0 0 1 2.753 2.751v8.357a2.755 2.755 0 0 1-2.753 2.75zM2.915 21a.59.59 0 0 0-.59.59v8.356a.59.59 0 0 0 .59.59h70.17a.59.59 0 0 0 .59-.59v-8.357a.59.59 0 0 0-.59-.589H2.915z"></path><path fill="currentColor" d="M40.23 21a1.081 1.081 0 0 1-1.032-1.404c1.336-4.276 3.732-10.054 7.554-13.333A7.946 7.946 0 0 1 57.08 18.34a17.38 17.38 0 0 1-4.117 2.558 1.082 1.082 0 0 1-1.267-1.718c.102-.104.224-.186.36-.242a15.29 15.29 0 0 0 3.614-2.235 5.782 5.782 0 1 0-7.507-8.796C44.55 11 42.29 16.963 41.265 20.242A1.081 1.081 0 0 1 40.23 21z"></path><path fill="currentColor" d="M40.23 21a1.08 1.08 0 0 1-1.031-.757c-1.281-4.094-4.108-11.54-8.636-15.42a7.433 7.433 0 0 0-9.66 11.3 19.242 19.242 0 0 0 4.55 2.816 1.08 1.08 0 1 1-.908 1.962 21.321 21.321 0 0 1-5.052-3.136A9.597 9.597 0 0 1 31.968 3.178c4.695 4.02 7.645 11.147 9.297 16.419A1.081 1.081 0 0 1 40.23 21zm3.932 50.123H31.838a1.081 1.081 0 0 1-1.081-1.08v-38.43a1.081 1.081 0 0 1 1.08-1.08h12.325a1.081 1.081 0 0 1 1.081 1.08v38.428a1.081 1.081 0 0 1-1.08 1.081zM32.92 68.961h10.16V32.695H32.92v36.266z"></path></svg></span> --}}

                                <div class="inner-content">
                                    <h4 class="title">{{ $row->fsclass }}</h4>
                                    <p style="margin-bottom: 5px;  font-size:16px;">{{ $row->description }}</p>
                                    <span style="margin-top:0px; margin-bottom: 5px; font-size:19px;">({{ $row->period }})</span>
                                    <p style="font-size:19px;">NGN {{ $row->price }}</p>
                                    <a href="{{ route('registration.page') }}" class="btn-theme btn-black btn-border btn-padding " style="margin-top:0px; margin-bottom: 5px;">Enroll</a>
                                </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </section>
    <!--== End Featured Area Wrapper ==-->


        <!--== Start Popular Products Area Wrapper ==-->
        <section class="product-area related-products-area pt-20">
            @php
            $gallery = DB::table('fashion_school_galleries')->get();
            @endphp

            <div class="container">
                <div class="row">
                    <div class="col-lg-12 m-auto">
                        <div class="section-title stitle-style2 separator-line-top text-center">
                            <h5 class="subtitle">Victorytosh </h5>
                            <h2 >FASHION SCHOOL GALLARY</h2>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="swiper-container product4-slider-container">
                            <div class="swiper-wrapper">
                                @foreach($gallery as $key =>$gall)
                                <div class="swiper-slide">
                                    <!-- Start Product Item -->
                                    <div class="product-item">
                                        <div class="product-thumb">
                                            <a href="shop-single-product.html">
                                                <img src="{{ $gall->image }}" alt="Moren-Shop">
                                                <span class="thumb-overlay"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <!-- End Product Item -->
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--== End Popular Products Area Wrapper ==-->

</main>


<script type="text/javascript">
    document.getElementsByTagName('title')[0].innerHTML = 'Fashion | Victrorytosh';
</script>

@endsection
