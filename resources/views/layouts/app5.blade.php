<!DOCTYPE html>
<html lang="zxx">
<head>
	<!-- Meta Tag -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name='copyright' content=''>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- Title Tag  -->
    <title>ESeminar</title>
	<!-- Favicon -->
	<link rel="icon" type="image/png" href="{{ asset('assets/ecommerce/images/favicon.png') }}">
	<!-- Web Font -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">
	
	<!-- StyleSheet -->
	
	<!-- Bootstrap -->
	<link rel="stylesheet" href="{{ asset('assets/ecommerce/css/bootstrap.css') }}">
	<!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('assets/ecommerce/css/magnific-popup.min.css') }}">
	<!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/ecommerce/css/font-awesome.css') }}">
	<!-- Fancybox -->
	<link rel="stylesheet" href="{{ asset('assets/ecommerce/css/jquery.fancybox.min.css') }}">
	<!-- Themify Icons -->
    <link rel="stylesheet" href="{{ asset('assets/ecommerce/css/themify-icons.css') }}">
	<!-- Nice Select CSS -->
    <link rel="stylesheet" href="{{ asset('assets/ecommerce/css/niceselect.css') }}">
	<!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets/ecommerce/css/animate.css') }}">
	<!-- Flex Slider CSS -->
    <link rel="stylesheet" href="{{ asset('assets/ecommerce/css/flex-slider.min.css') }}">
	<!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('assets/ecommerce/css/owl-carousel.css') }}">
	<!-- Slicknav -->
    <link rel="stylesheet" href="{{ asset('assets/ecommerce/css/slicknav.min.css') }}">
	
	<!-- Eshop StyleSheet -->
	<link rel="stylesheet" href="{{ asset('assets/ecommerce/css/reset.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/ecommerce/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/ecommerce/css/responsive.css') }}">

	<!-- data table -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.0/css/buttons.dataTables.min.css">
	<!-- CSS -->
	<link rel="stylesheet" href="{{ asset('assets/bootstrap.min.css') }}">

	<!-- JS -->
    <script src="{{ asset('assets/jquery-3.3.1.slim.min.js') }}"></script>
    <script src="{{ asset('assets/popper.min.js') }}" ></script>
	<script src="{{ asset('assets/bootstrap.min.js') }}"></script>
	
	
	<!-- Jquery Ui -->
    <link rel="stylesheet" href="{{ asset('assets/ecommerce/css/jquery-ui.css') }}">
	

	
	
	
</head>
<body class="js">
	
	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
	
	
	<!-- Header -->
	<header class="header shop">
		
		<div class="middle-inner">
			<div class="container">
				<div class="row">
					<div class="col-lg-2 col-md-2 col-12">
						<!-- Logo -->
						<div class="logo">
							<a href="index.html"><img src="{{ asset('assets/ecommerce/images/seminal logo.png') }}" alt="logo"></a>
						</div>
						<!--/ End Logo -->
						<!-- Search Form -->
						<div class="search-top">
							<div class="top-search"><a href="#0"><i class="ti-search"></i></a></div>
							<!-- Search Form -->
							<div class="search-top">
								<form class="search-form">
									<input type="text" placeholder="Search here..." name="search">
									<button value="search" type="submit"><i class="ti-search"></i></button>
								</form>
							</div>
							<!--/ End Search Form -->
						</div>
						<!--/ End Search Form -->
						<div class="mobile-nav"></div>
					</div>
					<div class="col-lg-8 col-md-7 col-12">
						<!-- <div class="search-bar-top">
							<div class="search-bar">
								<select>
									<option selected="selected">All Category</option>
									<option>watch</option>
									<option>mobile</option>
									<option>kid’s item</option>
								</select>
								<form>
									<input name="search" placeholder="Search Products Here....." type="search">
									<button class="btnn"><i class="ti-search"></i></button>
								</form>
							</div>
						</div> -->
					</div>
					<div class="col-lg-2 col-md-3 col-12">
						<div class="right-bar">
							<!-- Search Form -->
							<div class="sinlge-bar">
								<!-- <a href="#" class="single-icon"><i class="fa fa-heart-o" aria-hidden="true"></i></a> -->
							</div>
							<div class="sinlge-bar">
								<a href="#" class="single-icon"><i class="fa fa-user-circle-o" aria-hidden="true"></i><span class="username">{{auth()->user()->first_name}}</span></a>
							</div>
							
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Header Inner -->
        <div class="header-inner">
				<div class="container">
					<div class="cat-nav-head">
						<div class="row">
							<div class="col-12">
								<div class="menu-area">
									<!-- Main Menu -->
									<nav class="navbar navbar-expand-lg">
										<div class="navbar-collapse">	
											<div class="nav-inner">	
												<ul class="nav main-menu menu navbar-nav">
													<li id="menuHome"><a href="{{ route('customer.index')}}">Home</a></li>
													<li id="menuList" class=""><a href="{{ route('customer.list')}}">List</a></li>

													<li id="menuUser"><a href="{{ route('customer.user')}}">Profil</a></li>												
													<!-- <li><a href="#">Service</a></li>
													<li><a href="#">Shop<i class="ti-angle-down"></i><span class="new">New</span></a>
														<ul class="dropdown">
															<li><a href="shop-grid.html">Shop Grid</a></li>
															<li><a href="cart.html">Cart</a></li>
															<li><a href="checkout.html">Checkout</a></li>
														</ul>
													</li>
													<li><a href="#">Pages</a></li>									
													<li><a href="#">Blog<i class="ti-angle-down"></i></a>
														<ul class="dropdown">
															<li><a href="blog-single-sidebar.html">Blog Single Sidebar</a></li>
														</ul>
													</li>
													<li><a href="contact.html">Contact Us</a></li> -->

													<li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('frm-logout').submit();">Keluar</a></li>
                                                    <form id="frm-logout" action="{{ route('logout') }}" method="POST" style="display: none;"> 
                                                        {{ csrf_field() }}
                                                    </form>
												</ul>
											</div>
										</div>
									</nav>
									<!--/ End Main Menu -->	
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
	</header>
	<!--/ End Header -->
	
    @include('flash::message')
	
	
	
	
	
	
	
	
	@yield('content') 
	
	
	
	
	
	<!-- Start Shop Services Area -->
	<section class="shop-services section home">
		<div class="container">
			<div class="row">
				
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-reload"></i>
						<h4>Free Return</h4>
						<p>Within 30 days returns</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-lock"></i>
						<h4>Sucure Payment</h4>
						<p>100% secure payment</p>
					</div>
					<!-- End Single Service -->
				</div>
				<div class="col-lg-4 col-md-6 col-12">
					<!-- Start Single Service -->
					<div class="single-service">
						<i class="ti-tag"></i>
						<h4>Best Peice</h4>
						<p>Guaranteed price</p>
					</div>
					<!-- End Single Service -->
				</div>
			</div>
		</div>
	</section>
	<!-- End Shop Services Area -->
	
	
	
	
	<!-- Start Footer Area -->
	<footer class="footer">
		<!-- Footer Top -->
		<div class="footer-top section">
			<div class="container">
				<div class="row">
					<div class="col-lg-5 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer about">
							<div class="logo">
								<a href="index.html"><img src="{{ asset('assets/ecommerce/images/logo.png') }}" alt="#"></a>
							</div>
							
						</div>
						<!-- End Single Widget -->
					</div>
					
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer about">
						<p class="text">ESeminar adalah manajemen seminar yang di selenggarakan oleh STIKES RS. Baptis Kediri untuk membantu manajemen dan otomasi penyelenggaraan seminar maupun kuliah pakar.</p>
							<p class="call">Ada Pertanyaan? Hubungi kami di :<span><a href="tel:123456789">(0354) 683 470</a></span></p>
						</div>
						<!-- End Single Widget -->
					</div>
					<div class="col-lg-3 col-md-6 col-12">
						<!-- Single Widget -->
						<div class="single-footer social">
							<h4>Get In Tuch</h4>
							<!-- Single Widget -->
							<div class="contact">
								<ul>
									<li>STIKES RS. Baptis Kediri</li>
									<li>Jl. Mayjend Panjaitan No. 3B Kediri</li>
									<li>stikes_rsbaptis@yahoo.co.id</li>
									<li>(0354) 683 470</li>
								</ul>
							</div>
							<!-- End Single Widget -->
							<ul>
								<li><a href="#"><i class="ti-facebook"></i></a></li>
								<!-- <li><a href="#"><i class="ti-twitter"></i></a></li>
								<li><a href="#"><i class="ti-flickr"></i></a></li> -->
								<li><a href="https://www.instagram.com/stikesrsbkkediri/" target="_blank"><i class="ti-instagram"></i></a></li>
							</ul>
						</div>
						<!-- End Single Widget -->
					</div>
				</div>
			</div>
		</div>
		<!-- End Footer Top -->
		<div class="copyright">
			<div class="container">
				<div class="inner">
					<div class="row">
						<div class="col-lg-6 col-12">
							<div class="left">
								<p>Copyright © 2020 <a href="http://www.wpthemesgrid.com" target="_blank">Wpthemesgrid</a>  -  All Rights Reserved.</p>
							</div>
						</div>
						<div class="col-lg-6 col-12">
							<div class="right">
								<img src="{{ asset('assets/ecommerce/images/payments.png') }}" alt="#">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- /End Footer Area -->
    <script>
          // $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
          $(document).ready(function(){
              $('div.alert').not('.alert-important').fadeIn().delay(3000).fadeOut();
              $('.help-block').fadeIn().delay(1500).fadeOut();
                });
      </script>
	<!-- Jquery -->
    <script src="{{ asset('assets/ecommerce/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/ecommerce/js/jquery-migrate-3.0.0.js') }}"></script>
	<script src="{{ asset('assets/ecommerce/js/jquery-ui.min.js') }}"></script>
	<!-- Popper JS -->
	<script src="{{ asset('assets/ecommerce/js/popper.min.js') }}"></script>
	<!-- Bootstrap JS -->
	<script src="{{ asset('assets/ecommerce/js/bootstrap.min.js') }}"></script>
	<!-- Color JS -->
	<script src="{{ asset('assets/ecommerce/js/colors.js') }}"></script>
	<!-- Slicknav JS -->
	<script src="{{ asset('assets/ecommerce/js/slicknav.min.js') }}"></script>
	<!-- Owl Carousel JS -->
	<script src="{{ asset('assets/ecommerce/js/owl-carousel.js') }}"></script>
	<!-- Magnific Popup JS -->
	<script src="{{ asset('assets/ecommerce/js/magnific-popup.js') }}"></script>
	<!-- Waypoints JS -->
	<script src="{{ asset('assets/ecommerce/js/waypoints.min.js') }}"></script>
	<!-- Countdown JS -->
	<script src="{{ asset('assets/ecommerce/js/finalcountdown.min.js') }}"></script>
	<!-- Nice Select JS -->
	<script src="{{ asset('assets/ecommerce/js/nicesellect.js') }}"></script>
	<!-- Flex Slider JS -->
	<script src="{{ asset('assets/ecommerce/js/flex-slider.js') }}"></script>
	<!-- ScrollUp JS -->
	<script src="{{ asset('assets/ecommerce/js/scrollup.js') }}"></script>
	<!-- Onepage Nav JS -->
	<script src="{{ asset('assets/ecommerce/js/onepage-nav.min.js') }}"></script>
	<!-- Easing JS -->
	<script src="{{ asset('assets/ecommerce/js/easing.js') }}"></script>
	<!-- Active JS -->
	<script src="{{ asset('assets/ecommerce/js/active.js') }}"></script>

	 <!-- datatable -->
	 <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
      <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

	  

	
	<!-- Fancybox JS -->
	<script src="{{ asset('assets/ecommerce/js/facnybox.min.js') }}"></script>
	
	<!-- Ytplayer JS -->
	<script src="{{ asset('assets/ecommerce/js/ytplayer.min.js') }}"></script>
	
        
	@yield('customjs')
</body>
</html>