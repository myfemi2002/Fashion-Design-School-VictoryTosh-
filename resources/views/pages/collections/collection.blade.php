@extends('layouts.master_home')
@section('home_content')


@php
$coll = DB::table('collections')->get();
@endphp



<main class="main-content">
    <!--== Start Page Title Area ==-->
    <section class="page-title-area bg-img" data-bg-img="{{ asset('frontend/assets/img/photos/bg-page9.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-5">
                    <div class="page-title-content">
                        <h2 class="title">Collections</h2>
                        <div class="bread-crumbs"><a href="/">Home<span class="breadcrumb-sep"></span></a><span class="active d-none d-sm-inline-block">Collections</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section><br><br>
    <!--== End Page Title Area ==-->

    <!--== Start Category Area Wrapper ==-->
    <section class="category-area product-collection-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">

                        <div class="align-right">
                            <div class="row row-gutter-60">
                                @foreach ($coll as $rows)

                                <div class="col-md-6 col-lg-4">
                                    <!-- Start Product Item -->
                                    <div class="product-item">
                                        <div class="product-thumb">
                                            <a href="{{ url('collections/details/'.$rows->id) }}">
                                                <img src="{{ $rows->collection_thumbnail }}" alt="victorytosh-Collections">
                                                <span class="thumb-overlay"></span>
                                            </a>
                                        </div>

                                        <div class="product-info info-style2">
                                            <div class="content-inner">
                                                <h4 class="title"><a href="{{ url('collections/details/'.$rows->id) }}">{{ $rows->collection_name }}</a></h4>
                                                <div class="prices">
                                                    <span class="price">NGN {{ $rows->collection_amount }}</span>
                                                </div>
                                            </div>
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
    <!--== End Category Area Wrapper ==-->




</main>






<script type="text/javascript">
    document.getElementsByTagName('title')[0].innerHTML = 'Collections | Victrorytosh';
</script>

@endsection
