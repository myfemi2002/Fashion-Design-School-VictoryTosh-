@php
$sliders = DB::table('sliders')->get();
@endphp


<section class="home-slider-area slider-default">
    <div class="home-slider-content">
        <div class="swiper-container home-slider-container">
            <div class="swiper-wrapper">

                @foreach($sliders as $key =>$slider)
                <div class="swiper-slide">
                    <!-- Start Slide Item -->
                    <div class="home-slider-item">
                        <div class="bg-thumb bg-overlay bg-img" data-bg-img="{{ asset($slider->image) }}"></div>
                        <div class="slider-content-area">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-md-8 col-lg-5 m-auto">
                                        <div class="content">
                                            <div class="inner-content">
                                                {{-- <h2>{{ $slider->title}}</h2>
                                                <p>{{ $slider->description}}</p> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Slide Item -->
                </div>
                @endforeach
            </div>

            <!-- Add Arrows -->
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>
