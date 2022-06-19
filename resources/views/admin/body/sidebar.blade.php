@php
    $prefix = Request::route()->getPrefix();
    $route = Route::current()->getName();

@endphp



<aside class="app-side" id="app-side">
					<!-- BEGIN .side-content -->
					<div class="side-content ">
						<!-- BEGIN .user-profile -->
                    @php
                        $user = DB::table('users')->where('id',Auth::user()->id)->first();
                    @endphp
						<div class="user-profile">
							<img src="{{ (!empty($user->image))? url('upload/user_images/'.$user->image):url('upload/no_image.jpg') }}" class="profile-thumb" alt="User Thumb">
							<h6 class="profile-name">{{ Auth::user()->name }}</h6>
							<ul class="profile-actions">
								<li>
									<a href="#">
										<i class="icon-social-skype"></i>
										<span class="count-label red"></span>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="icon-social-twitter"></i>
									</a>
								</li>
								<li>
									<a href="#">
										<i class="icon-export"></i>
									</a>
								</li>
							</ul>
						</div>
						<!-- END .user-profile -->
						<!-- BEGIN .side-nav -->
						<nav class="side-nav">
							<!-- BEGIN: side-nav-content -->
							<ul class="unifyMenu" id="unifyMenu">

								<li class="{{ ($route == 'dashboard')?'active':'' }}">
									<a href="{{ route('dashboard') }}">
										<span class="has-icon">
											<i class="icon-laptop_windows"></i>
										</span>
										<span class="nav-title">Dashboard</span>
									</a>
								</li>

								<li>
									<a href="#" class="has-arrow" aria-expanded="false">
										<span class="has-icon">
											<i class="icon-tabs-outline"></i>
										</span>
										<span class="nav-title">Home</span>
									</a>
									<ul aria-expanded="false">
										<li>
											<a href="{{ route('slider.view') }}">Home Slider</a>
										</li>
										<li>
											<a href="{{ route('slider.add') }}">Add Slider </a>
										</li>

                                        <li class="nav-small-cap">Home Latest Collections</li>

										<li>
											<a href="{{ route('homecollection.view') }}">Home Collections</a>
										</li>
										<li>
											<a href="{{ route('homecollection.add') }}">Add Home Collection</a>
										</li>

                                        <li class="nav-small-cap">Home 3 Best Sellers</li>

										<li>
											<a href="{{ route('homesellercollection.view') }}">Home Best Seller</a>
										</li>
										<li>
											<a href="{{ route('homesellercollection.add') }}">Add Home Best Seller</a>
										</li>

                                        <li class="nav-small-cap">Home Category Collection</li>

										<li>
											<a href="{{ route('homecategorycollection.view') }}">Home Category Collection</a>
										</li>
										<li>
											<a href="{{ route('homecategorycollection.add') }}">Add Home Category Collection</a>
										</li>

                                        <li class="nav-small-cap">Home About Us</li>

										<li>
											<a href="{{ route('homeaboutus.view') }}">Home About Us</a>
										</li>
									</ul>
								</li>

                                <li>
									<a href="#" class="has-arrow" aria-expanded="false">
										<span class="has-icon">
											<i class="icon-border_outer"></i>
										</span>
										<span class="nav-title">Fashion School</span>
									</a>
									<ul aria-expanded="false">
										<li>
											<a href='{{ route('fashionschoolslider.view') }}'> Fashion School Sliders</a>
										</li>
										<li>
											<a href='{{ route('fashionschoolpackages.view') }}'> Fashion School Packages</a>
										</li>
										<li>
											<a href='{{ route('fashionschoolgallery.view') }}'> Fashion School Gallery</a>
										</li>
									</ul>
								</li>


								<li {{ ($prefix == '/users')?'active':'' }}>
									<a href="#" class="has-arrow" aria-expanded="false">
										<span class="has-icon">
											<i class="icon-layers"></i>
										</span>
										<span class="nav-title">Collections</span>
									</a>
									<ul aria-expanded="false">
										<li>
											<a href="{{ route('collection.view') }}">View Collections</a>
										</li>
										<li>
											<a href="{{ route('collection.add') }}">Add Collectons</a>
										</li>
									</ul>
								</li>

								<li>
									<a href="#" class="has-arrow" aria-expanded="false">
										<span class="has-icon">
											<i class="icon-chart-area-outline"></i>
										</span>
										<span class="nav-title">About</span>
									</a>
									<ul aria-expanded="false">
										<li>
											<a href='{{ route('about.view')}}'>View About</a>
										</li>
										<li>
											<a href='{{ route('about.add')}}'>Add About</a>
										</li>
									</ul>
								</li>

								<li>
									<a href="#" class="has-arrow" aria-expanded="false">
										<span class="has-icon">
											<i class="icon-center_focus_strong"></i>
										</span>
										<span class="nav-title">Contact</span>
									</a>
									<ul aria-expanded="false">
										<li>
											<a href='{{ route('contact.view') }}'>View Contact</a>
										</li>
                                        <li>
											<a href='{{ route('contact.add') }}'>Add Conatct</a>
										</li>
										<li>
											<a href='{{ route('contactmessage.view') }}'>Inbox</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#" class="has-arrow" aria-expanded="false">
										<span class="has-icon">
											<i class="icon-beaker"></i>
										</span>
										<span class="nav-title">Registration</span>
									</a>
									<ul aria-expanded="false">
										<li>
											<a href='{{ route('coursedate.view') }}'>View Course & Addmission Date</a>
										</li>
										<li>
											<a href='{{ route('coursedate.add') }}'>Add Course & Addmission Date</a>
										</li>
                                        <li>
											<a href='{{ route('applicant.view') }}'>View Applicant</a>
										</li>
									</ul>
								</li>

                                <li {{ ($prefix == '/users')?'active':'' }}>
									<a href="#" class="has-arrow" aria-expanded="false">
										<span class="has-icon">
											<i class="icon-adjust2"></i>
										</span>
										<span class="nav-title">Manage User</span>
									</a>
									<ul aria-expanded="false">
										<li>
											<a href="{{ route('users.view') }}">View User</a>
										</li>
										<li>
											<a href="{{ route('users.add') }}">Add User</a>
										</li>
									</ul>
								</li>

                                <li>
									<a href="#" class="has-arrow" aria-expanded="false">
										<span class="has-icon">
											<i class="icon-flash-outline"></i>
										</span>
										<span class="nav-title">Manage Profile</span>
									</a>
									<ul aria-expanded="false">
										<li>
											<a href="{{ route('profile.view') }}">My Profile</a>
										</li>
										<li>
											<a href="{{ route('password.view') }}">Change Password</a>
										</li>
									</ul>
								</li>

							</ul>
							<!-- END: side-nav-content -->
						</nav>
						<!-- END: .side-nav -->
					</div>
					<!-- END: .side-content -->
				</aside>
