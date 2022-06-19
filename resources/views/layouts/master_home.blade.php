<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <title>@yield('title') - Victorytosh</title>

        <!--== Favicon ==-->
        <link rel="shortcut icon" href="{{asset('frontend/assets/img/favicon.ico')}}" type="image/x-icon" />

        <!--== Google Fonts ==-->
        <link href="https://fonts.googleapis.com/css?family=Abril+Fatface:400" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,400i,500,600,700,900,900i" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,700,900,900i" rel="stylesheet">

        <!--== Bootstrap CSS ==-->
        <link href="{{ asset('frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
        <!--== Font-awesome Icons CSS ==-->
        <link href="{{ asset('frontend/assets/css/font-awesome.min.css') }}" rel="stylesheet"/>
        <!--== Icofont Min Icons CSS ==-->
        <link href="{{ asset('frontend/assets/css/icofont.min.css') }}" rel="stylesheet"/>
        <!--== lastudioIcons CSS ==-->
        <link href="{{ asset('frontend/assets/css/lastudioIcons.css') }}" rel="stylesheet"/>
        <!--== Animate CSS ==-->
        <link href="{{ asset('frontend/assets/css/animate.css') }}" rel="stylesheet"/>
        <!--== Aos CSS ==-->
        <link href="{{ asset('frontend/assets/css/aos.css') }}" rel="stylesheet"/>
        <!--== FancyBox CSS ==-->
        <link href="{{ asset('frontend/assets/css/jquery.fancybox.min.css') }}" rel="stylesheet"/>
        <!--== Slicknav CSS ==-->
        <link href="{{ asset('frontend/assets/css/slicknav.css') }}" rel="stylesheet"/>
        <!--== Swiper CSS ==-->
        <link href="{{ asset('frontend/assets/css/swiper.min.css') }}" rel="stylesheet"/>
        <!--== Slick CSS ==-->
        <link href="{{ asset('frontend/assets/css/slick.css') }}" rel="stylesheet"/>
        <!--== Main Style CSS ==-->
        <link href="{{ asset('frontend/assets/css/style.css') }}" rel="stylesheet" />
        <!-- Toast.css -->
        <link href="{{ asset('frontend/assets/toaster/toastr.css') }}" rel="stylesheet">

    </head>

    <body>

        <!--wrapper start-->
        <div class="wrapper home-default-wrapper">

            <!--== Start Preloader Content ==-->
            <div class="preloader-wrap">
                <div class="preloader">
                    <span class="dot"></span>
                    <div class="dots">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
            <!--== End Preloader Content ==-->

            <!--== Start Header Wrapper ==-->
            @include ('layouts.body.header')
            <!--== End Header Wrapper ==-->


            <!--== Start Main Wrapper ==-->
            @yield('home_content')
            <!--== End main Wrapper ==-->


            <!--== Start Footer Area Wrapper ==-->
            @include('layouts.body.footer')
            <!--== End Footer Area Wrapper ==-->

            <!--== Scroll Top Button ==-->
            <div class="scroll-to-top"><span class="icofont-arrow-up"></span></div>

            <!--== Start Product Quick View ==-->
            <aside class="product-quick-view-modal">
                <div class="product-quick-view-inner">
                    <div class="product-quick-view-content">
                        <button type="button" class="btn-close">
                            <span class="close-icon"><i class="lastudioicon-e-remove"></i></span>
                        </button>
                        <div class="row row-gutter-0">
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="thumb">
                                    <img src="assets/img/shop/quick-view1.jpg" alt="Moren-Shop">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-12">
                                <div class="single-product-info">
                                    <h4 class="title">Product Simple</h4>
                                    <div class="product-rating">
                                        <div class="review">
                                            <p><span></span>99 in stock</p>
                                        </div>
                                    </div>
                                    <div class="prices">
                                        <span class="price">£49.90</span>
                                    </div>
                                    <p class="product-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fringilla quis ipsum enim viverra. Enim in morbi tincidunt ante luctus tincidunt integer. Sed adipiscing vehicula.</p>
                                    <div class="quick-product-action">
                                        <div class="action-top">
                                            <div class="pro-qty-area">
                                                <div class="pro-qty">
                                                    <input type="text" id="quantity" title="Quantity" value="1">
                                                    <a href="#" class="inc qty-btn">+</a><a href="#" class="dec qty-btn">-</a></div>
                                            </div>
                                            <a class="btn-theme btn-black" href="shop-cart.html">Add to cart</a>
                                        </div>
                                        <div class="action-bottom">
                                            <a class="btn-wishlist" href="shop-wishlist.html"><i class="labtn-icon labtn-icon-wishlist"></i>Add to wishlist</a>
                                            <a class="btn-compare" href="shop-compare.html"><i class="labtn-icon labtn-icon-compare"></i>Add to compare</a>
                                        </div>
                                    </div>
                                    <div class="product-ratting">
                                        <div class="product-sku">
                                            SKU: <span>REF. LA-276</span>
                                        </div>
                                    </div>
                                    <div class="product-categorys">
                                        <div class="product-category">
                                            Category: <span>Uncategorized</span>
                                        </div>
                                    </div>
                                    <div class="widget">
                                        <h3 class="title">Tags:</h3>
                                        <div class="widget-tags">
                                            <ul>
                                                <li><a href="shop.html">Blazer,</a></li>
                                                <li><a href="shop.html">Fashion,</a></li>
                                                <li><a href="shop.html">wordpress,</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="product-social-info">
                                        <a href="#"><span class="lastudioicon-b-facebook"></span></a>
                                        <a href="#"><span class="lastudioicon-b-twitter"></span></a>
                                        <a href="#"><span class="lastudioicon-b-linkedin"></span></a>
                                        <a href="#"><span class="lastudioicon-b-pinterest"></span></a>
                                    </div>
                                    <div class="product-nextprev">
                                        <a href="shop-single-product.html">
                                            <i class="lastudioicon-arrow-left"></i>
                                        </a>
                                        <a href="shop-single-product.html">
                                            <i class="lastudioicon-arrow-right"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas-overlay"></div>
            </aside>
            <!--== End Product Quick View ==-->

            <!--== Start Aside Search Menu ==-->
            <div class="search-box-wrapper">
                <div class="search-box-content-inner">
                    <div class="search-box-form-wrap">
                        <div class="search-note">
                            <p>Start typing and press Enter to search</p>
                        </div>
                        <form action="#" method="post">
                            <div class="search-form position-relative">
                                <label for="search-input" class="sr-only">Search</label>
                                <input type="search" class="form-control" placeholder="Search" id="search-input">
                                <button class="search-button"><i class="lastudioicon-zoom-1"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--== End Aside Search Menu ==-->
                <a href="javascript:;" class="search-close"><i class="lastudioicon-e-remove"></i></a>
            </div>
            <!--== End Aside Search Menu ==-->

            <!--== Start Sidebar Cart Menu ==-->
            <aside class="sidebar-cart-modal">
                <div class="sidebar-cart-inner">
                    <div class="sidebar-cart-content">
                        <a class="cart-close" href="javascript:void(0);"><i class="lastudioicon-e-remove"></i></a>
                        <div class="sidebar-cart">
                            <h4 class="sidebar-cart-title">Shopping Cart</h4>
                            <div class="product-cart">
                                <div class="product-cart-item">
                                    <div class="product-img">
                                        <a href="shop.html"><img src="assets/img/shop/cart/1.jpg" alt=""></a>
                                    </div>
                                    <div class="product-info">
                                        <h4 class="title"><a href="shop.html">I’m a Unicorn Earrings</a></h4>
                                        <span class="info">1 × £69.00</span>
                                    </div>
                                    <div class="product-delete"><a href="#/">×</a></div>
                                </div>
                                <div class="product-cart-item">
                                    <div class="product-img">
                                        <a href="shop.html"><img src="assets/img/shop/cart/2.jpg" alt=""></a>
                                    </div>
                                    <div class="product-info">
                                        <h4 class="title"><a href="shop.html">Knit cropped cardigan</a></h4>
                                        <span class="info">1 × £29.90</span>
                                    </div>
                                    <div class="product-delete"><a href="#/">×</a></div>
                                </div>
                            </div>
                            <div class="cart-total">
                                <h4>Subtotal: <span class="money">£98.90</span></h4>
                            </div>
                            <div class="shipping-info">
                                <div class="loading-bar">
                                    <div class="load-percent"></div>
                                    <div class="label-free-shipping">
                                        <div class="free-shipping svg-icon-style">
                                            <span class="svg-icon" id="svg-icon-shipping" data-svg-icon="assets/img/icons/shop1.svg"></span>
                                        </div>
                                        <p>Spend £101.10 to get Free Shipping</p>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-checkout-btn">
                                <a class="btn-theme" href="shop-cart.html">View cart</a>
                                <a class="btn-theme" href="shop-checkout.html">Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </aside>
            <div class="sidebar-cart-overlay"></div>
            <!--== End Sidebar Cart Menu ==-->

            <!--== Start Side Menu ==-->
            <aside class="off-canvas-wrapper">
                <div class="off-canvas-inner">
                    <div class="off-canvas-overlay d-none"></div>
                    <!-- Start Off Canvas Content Wrapper -->
                    <div class="off-canvas-content">
                        <!-- Off Canvas Header -->
                        <div class="off-canvas-header">
                            <div class="close-action">
                                <button class="btn-close"><i class="icofont-close-line"></i></button>
                            </div>
                        </div>

                        <div class="off-canvas-item">
                            <!-- Start Mobile Menu Wrapper -->
                            <div class="res-mobile-menu">
                                <!-- Note Content Auto Generate By Jquery From Main Menu -->
                            </div>
                            <!-- End Mobile Menu Wrapper -->
                        </div>
                        <!-- Off Canvas Footer -->
                        <div class="off-canvas-footer"></div>
                    </div>
                    <!-- End Off Canvas Content Wrapper -->
                </div>
            </aside>
            <!--== End Side Menu ==-->
        </div>

        <!--=======================Javascript============================-->

        <!--=== Modernizr Min Js ===-->
        <script src="{{ asset('frontend/assets/js/modernizr.js') }}"></script>
        <!--=== jQuery Min Js ===-->
        <script src="{{ asset('frontend/assets/js/jquery-main.js') }}"></script>
        <!--=== jQuery Migration Min Js ===-->
        <script src="{{ asset('frontend/assets/js/jquery-migrate.js') }}"></script>
        <!--=== Popper Min Js ===-->
        <script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
        <!--=== Bootstrap Min Js ===-->
        <script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
        <!--=== jquery Appear Js ===-->
        <script src="{{ asset('frontend/assets/js/jquery.appear.js') }}"></script>
        <!--=== jquery Swiper Min Js ===-->
        <script src="{{ asset('frontend/assets/js/swiper.min.js') }}"></script>
        <!--=== jquery Fancybox Min Js ===-->
        <script src="{{ asset('frontend/assets/js/fancybox.min.js') }}"></script>
        <!--=== jquery Aos Min Js ===-->
        <script src="{{ asset('frontend/assets/js/aos.min.js') }}"></script>
        <!--=== jquery Slicknav Js ===-->
        <script src="{{ asset('frontend/assets/js/jquery.slicknav.js') }}"></script>
        <!--=== jquery Countdown Js ===-->
        <script src="{{ asset('frontend/assets/js/jquery.countdown.min.js') }}"></script>
        <!--=== jquery Tippy Js ===-->
        <script src="{{ asset('frontend/assets/js/tippy.all.min.js') }}"></script>
        <!--=== Isotope Min Js ===-->
        <script src="{{ asset('frontend/assets/js/isotope.pkgd.min.js') }}"></script>
        <!--=== jquery Vivus Js ===-->
        <script src="{{ asset('frontend/assets/js/vivus.js') }}"></script>
        <!--=== Parallax Min Js ===-->
        <script src="{{ asset('frontend/assets/js/parallax.min.js') }}"></script>
        <!--=== Slick  Min Js ===-->
        <script src="{{ asset('frontend/assets/js/slick.min.js') }}"></script>
        <!--=== jquery Wow Min Js ===-->
        <script src="{{ asset('frontend/assets/js/wow.min.js') }}"></script>
        <!--=== jquery Zoom Min Js ===-->
        <script src="{{ asset('frontend/assets/js/jquery-zoom.min.js') }}"></script>

        <!--=== Custom Js ===-->
        <script src="{{ asset('frontend/assets/js/custom.js') }}"></script>



        {{-- toaster --}}
        <script  type="text/javascript" src="{{ asset('frontend/assets/toaster/toastr.min.js') }}"></script>

        <script>

@if (Session::has('message'))
var type = "{{ Session::get('alert-type','info') }}"
switch (type) {
    case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;

    case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;

    case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;

    case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break;
}

@endif

        </script>



    </body>

</html>
