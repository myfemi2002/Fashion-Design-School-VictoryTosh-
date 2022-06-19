@php
$contactviews = DB::table('admin_contacts')->first();
@endphp

<!--== Start Footer Area Wrapper ==-->
<footer class="footer-area footer-style7">
    <div class="footer-main">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-5">
                    <div class="widget-item widget-column1">
                        <h4>VICTORYTOSH</h4>
                        <nav class="widget-menu-wrap menu-col-2">
                            <ul class="widget-contact-info">
                                <p style="color: white;">Victorytosh is like no other shop in Ibadan. It caters for women's needs, starting from the bride,
                                    family and friends, as well as children.<br>
                                    In addition to clothing, it offers fashionable accessories and perfect level of customer service.
                                </p>
                            </ul>
                    </div>
                </div>
                <div class="col-md-4 col-lg-4">
                    <div class="widget-item widget-column2">
                        <h4>QUICK LINKS</h4>
                        <nav class="widget-menu-wrap menu-col-2">
                            <ul class="nav-menu nav">
                                <li><a href="{{ url('About')}}">About Us</a></li>
                                <li><a href="{{ url('Contact-Us')}}">Contact Us</a></li>
                            </ul>
                            <ul class="nav-menu nav ">
                                <li><a href="{{ url('Fashionschool')}}">Fashion School</a></li>
                                <li><a href="{{ url('Collections')}}">Collection</a></li
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-md-3 col-lg-3">
                    <div class="widget-item widget-column3">
                        <h4>CONTACT INFO</h4>
                        <nav class="widget-menu-wrap">
                            <ul class="nav-menu nav"  style="color: white;">
                                <li> Phone : <a href="tel://{{ $contactviews->phone_number }}">{{ $contactviews->phone_number }}</a></li>
                                <li> Email : <a href="mailto://{{ $contactviews->email }}">{{ $contactviews->email }}</a></li>
                                <li>Working Hours : <a href="#">{{ $contactviews->working_hours }}</a></li>
                                <li class="info-address">Address : <a href="#">{{ $contactviews->address }}</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="widget-item">
                        <div class="widget-social-icons">
                            <a href="{{ $contactviews->facebook }}" target="blank"><i class="lastudioicon lastudioicon-b-facebook"></i></a>
                            <a href="#/"><i class="lastudioicon lastudioicon-b-twitter"></i></a>
                            <a href="#/"><i class="lastudioicon lastudioicon-b-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--== End Footer Area Wrapper ==-->
