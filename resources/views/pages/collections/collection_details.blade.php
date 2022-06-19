@extends('layouts.master_home')
@section('home_content')

@section('title')
{{ $collectiondetails->collection_name }}
@endsection


<main class="main-content">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area bg-img" data-bg-img="{{ asset('frontend/assets/img/photos/bg-page9.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <div class="page-title-content">
                        <h2 class="title">@yield('title') Details</h2>
                        <div class="bread-crumbs"><a href="/">Home<span class="breadcrumb-sep"></span></a><span class="active d-none d-sm-inline-block">@yield('title') Details</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br>
    <!--== End Page Title Area ==-->

    <!--== Start Shop Area ==-->
    <section class="product-area shop-single-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="single-product-slider">
                        <div class="product-dec-slider-right">
                            <div class="single-product-thumb">
                                <div class="single-product-thumb-slider">

                                    <div class="zoom zoom-hover">
                                        <div class="thumb-item">
                                            <a class="lightbox-image" data-fancybox="gallery" href="{{ asset($collectiondetails->collection_thumbnail)}}">
                                                <img src="{{ asset($collectiondetails->collection_thumbnail)}}" alt="Image-HasTech">
                                            </a>
                                        </div>
                                    </div>


                                    @foreach ($multiImg as $Img)
                                    <div class="zoom zoom-hover">
                                        <div class="thumb-item">
                                            <a class="lightbox-image" data-fancybox="gallery" href="{{ asset($Img->photo_name)}}">
                                                <img src="{{ asset($Img->photo_name)}}" alt="Image-HasTech">
                                            </a>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="product-dec-slider-left">
                            <div class="single-product-nav">
                                <div class="single-product-nav-slider">

                                 <div class="nav-item">
                                        <img src="{{ asset($collectiondetails->collection_thumbnail)}}" alt="Image-HasTech">
                                    </div>

                                    @foreach ($multiImg as $Img)
                                    <div class="nav-item">
                                        <img src="{{ asset($Img->photo_name)}}" alt="Image-HasTech">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="single-product-info">
                        <h4 class="title">{{ $collectiondetails->collection_name }}</h4>

                        <div class="prices">
                            <span class="price">NGN {{ $collectiondetails->collection_amount }}</span>
                        </div>
                        <p class="product-desc">{{ $collectiondetails->collection_description }}</p>
                        <div class="quick-product-action">
                            <div class="action-top">
                                <div class="pro-qty-area">
                                    {{-- <div class="pro-qty">
                                        <input type="text" id="quantity1" title="Quantity" value="1" />
                                    </div> --}}
                                </div>
                                <a class="btn-theme btn-black" href="https://wa.me/+2347062518240"  target="_blank">Let's Chat</a>
                            </div>
                            {{-- <div class="action-bottom">
                                <a class="btn-wishlist" href="shop-wishlist.html"><i class="labtn-icon labtn-icon-wishlist"></i>Add to wishlist</a>
                                <a class="btn-compare" href="shop-compare.html"><i class="labtn-icon labtn-icon-compare"></i>Add to compare</a>
                            </div> --}}
                        </div>
                       
                        <div class="product-categorys">
                            <div class="product-category">
                                Category: <span>{{ $collectiondetails->collection_category }}</span>
                            </div>
                        </div>
                        {{-- <div class="widget">
                            <h3 class="title">Tags:</h3>
                            <div class="widget-tags">
                                <ul>
                                    <li><a href="shop.html">Blazer,</a></li>
                                    <li><a href="shop.html">Fashion,</a></li>
                                    <li><a href="shop.html">wordpress,</a></li>
                                </ul>
                            </div>
                        </div> --}}
                        <div class="product-social-info">
                            <a href="#"><span class="lastudioicon-b-facebook"></span></a>
                            <a href="#"><span class="lastudioicon-b-instagram"></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--== End Shop Area ==-->


</main>





{{--
<script type="text/javascript">
    document.getElementsByTagName('title')[0].innerHTML = 'Collections-Details | Victrorytosh';
</script> --}}

@endsection
