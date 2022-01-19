<!DOCTYPE html>
<html lang="en">
<head>
<title>Doremi Music Indonesia</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
<link href="plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/plugins/OwlCarousel2-2.2.1/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/plugins/slick-1.8.0/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/styles/main_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/styles/responsive.css')}}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<meta name="facebook-domain-verification" content="9fqh8b6v5ssc4qkcb6kj5xompibqnt" />

</head>

<body>

<div class="super_container">
	<!-- Header -->
	
	<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/phone_white.png" alt=""></div>021-5984799</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="images/mail_white.png" alt=""></div><a href="mailto:doremi.ecomm@gmail.com">doremi.ecomm@gmail.com</a></div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_menu">
								<ul class="standard_dropdown top_bar_dropdown">
									<!--<li>
										<a href="#">Konfiirmasi Pembayaran<i class="fa fa-chevron-down"></i></a>
									</li> -->
									<li class="kp">
										<a href="#">Konfirmasi Pembayaran<i class="fa fa-chevron-down"></i></a>
									</li>
								</ul>
							</div>
							<div class="top_bar_user">
								<div class="user_icon"><img src="images/user-1.png" alt=""></div>
								<div><a href="#">Daftar</a></div>
								<div><a href="#">Masuk</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>		
		</div>

		<!-- Header Main -->

		<div class="header_main">
			<div class="container">
				<div class="row">

					<!-- Logo -->
					<div class="col-lg-2 col-sm-3 col-3 order-1">
						<div class="logo_container">
							<div class="logo"><a href="/">Doremi</h3></a></div>
						</div>
					</div>

					<!-- Search -->
					@php
						$kategori = App\Models\TbMasterKategori::all();
					@endphp
					<div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
						<div class="header_search">
							<div class="header_search_content">
								<div class="header_search_form_container">
									<form action="{{ url('/frontend/search') }}" class="header_search_form clearfix" method="post">
										<input type="search" name="q" required="required" class="header_search_input" placeholder="Cari Produk...">
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc">Pilih Kategori</span>
												<i class="fas fa-chevron-down"></i>
												<ul class="custom_list clc">
													<li><a class="clc" href="#">Guitar</a></li>
													<li><a class="clc" href="#">Band & Orkestra</a></li>
													<li><a class="clc" href="#">Drums</a></li>
													<li><a class="clc" href="#">Accessories</a></li>
													<li><a class="clc" href="#">Keyboards</a></li>
													<li><a class="clc" href="#">Piano</a></li>
													<li><a class="clc" href="#">Bass</a></li>
													<li><a class="clc" href="#">Pro Audio</a></li>

												</ul>
											</div>
										</div>
										<button type="submit" class="header_search_button trans_300" value="Submit"><img src="images/search.png" alt=""></button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							<div class="wishlist d-flex flex-row align-items-center justify-content-end">
								<div class="wishlist_icon"><a href="#"><img src="images/heart.png" alt=""></a></div>
								<div class="wishlist_content">
									<div class="wishlist_text"><a href="#">Favoritku</a></div>
									<div class="wishlist_count">5</div>
								</div>
							</div>

							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<a href="cart.html"><img src="images/cart.png" alt=""></a>
										<div class="cart_count"><span>10</span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="cart.html">Troli</a></div>
										<div class="cart_price">100000</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<!-- Main Navigation -->

		<nav class="main_nav">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="main_nav_content d-flex flex-row">

							<!-- Categories Menu -->

							<div class="cat_menu_container">
								<div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
									<div class="cat_burger"><span></span><span></span><span></span></div>
									<div class="cat_menu_text">Kategori</div>
								</div>

								<ul class="cat_menu">
									<li class="hassubs">
										<a href="#">Gitar<i class="fas fa-chevron-right"></i></a>
										<ul>
											<li><a href="#">Gitar Klasik<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Gitar Akustik Elektrik<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Gitar Elektrik<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Gitar Folk<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Gitar Mini<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Silent Guitar<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Aksesoris<i class="fas fa-chevron-right"></i></a></li>
										</ul>
									</li>
									<li class="hassubs">
										<a href="#">Band & Orkestra<i class="fas fa-chevron-right"></i></a>
										<ul>
											<li><a href="#">Seruling<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Horn<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Obeo<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Saksofon<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Suling & Pianika<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Aksesoris<i class="fas fa-chevron-right"></i></a></li>
										</ul>
									</li>
									
									<li class="hassubs">
										<a href="#">Drum<i class="fas fa-chevron-right"></i></a>
										<ul>
											<li><a href="#">Drum Akustik<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Drum Elektrik<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Aksesoris<i class="fas fa-chevron-right"></i></a></li>
										</ul>
									</li>
									<li class="hassubs">
										<a href="#">Aksesoris<i class="fas fa-chevron-right"></i></a>
										<ul>
											<li><a href="#">Headphone<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Cajon<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Professional Cable<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Shaker<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Tamborin<i class="fas fa-chevron-right"></i></a></li>
										</ul>
									</li>
									<li class="hassubs">
										<a href="#">Keyboard<i class="fas fa-chevron-right"></i></a>
										<ul>
											<li><a href="#">Keyboard Portabel<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Aksesoris<i class="fas fa-chevron-right"></i></a></li>
										</ul>
									</li>
									<li class="hassubs">
										<a href="#">Piano<i class="fas fa-chevron-right"></i></a>
										<ul>
											<li><a href="#">Piano Digital<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Piano Akustik<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Aksesoris<i class="fas fa-chevron-right"></i></a></li>
										</ul>
									</li>
									<li class="hassubs">
										<a href="#">Bass<i class="fas fa-chevron-right"></i></a>
										<ul>
											<li><a href="#">Bass Electrik<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">Aksesoris<i class="fas fa-chevron-right"></i></a></li>
										</ul>
									</li>
									<li class="hassubs">
										<a href="#">Pro Audio<i class="fas fa-chevron-right"></i></a>
										<ul>
											<li><a href="#">Mixer<i class="fas fa-chevron-right"></i></a></li>
											<li><a href="#">PA Speaker<i class="fas fa-chevron-right"></i></a></li>
										</ul>
									</li>
								</ul>
							</div>

							<!-- Main Nav Menu -->

							<div class="main_nav_menu ml-auto">
								<ul class="standard_dropdown main_nav_dropdown">
									<li><a href="index.html">Beranda<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="shop.html">Toko<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="#">Tentang Kami<i class="fas fa-chevron-down"></i></a></li>
									<li class="hassubs">
										<a href="#">Sekolah Musik<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a href="#">Anak-Anak<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="#">Remaja<i class="fas fa-chevron-down"></i></a></li>
										</ul>
									</li>
									<li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="contact.html">Kontak<i class="fas fa-chevron-down"></i></a></li>
								</ul>
							</div>

							<!-- Menu Trigger -->

							<div class="menu_trigger_container ml-auto">
								<div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
									<div class="menu_burger">
										<div class="menu_trigger_text">menu</div>
										<div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</nav>

		<!-- sticky back to top-->
		<div>
			<a href="#" class="back-to-top" style="display: inline;"> 
				<i class="fa fa-arrow-circle-up"></i>
			</a>
	    </div>
			
		<!-- Menu -->

		<div class="page_menu">
			<div class="container">
				<div class="row">
					<div class="col">
						
						<div class="page_menu_content">
							
							<div class="page_menu_search">
								<form action="#">
									<input type="search" required="required" class="page_menu_search_input" placeholder="Cari Produk...">
								</form>
							</div>
							<ul class="page_menu_nav">
								<li class="page_menu_item has-children">
									<a href="#">Konfirmasi Pembayaran</a>
								</li>
								<!--<li class="page_menu_item has-children">
									<a href="#">Currency<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">US Dollar<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li> -->
								<li class="page_menu_item">
									<a href="#">Beranda<i class="fa fa-angle-down"></i></a>
								</li>
								<li class="page_menu_item">
									<a href="#">Promo<i class="fa fa-angle-down"></i></a>
								</li>

								<li class="page_menu_item has-children">
									<a href="#">Tentang Kami<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">Perjalanan<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Visi Misi<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Gudang<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item has-children">
									<a href="#">Sekolah Musik<i class="fa fa-angle-down"></i></a>
									<ul class="page_menu_selection">
										<li><a href="#">Anak-Anak<i class="fa fa-angle-down"></i></a></li>
										<li><a href="#">Remaja<i class="fa fa-angle-down"></i></a></li>
									</ul>
								</li>
								<li class="page_menu_item"><a href="blog.html">Blog<i class="fa fa-angle-down"></i></a></li>
								<li class="page_menu_item"><a href="contact.html">Kontak<i class="fa fa-angle-down"></i></a></li>
							</ul>
							
							<div class="menu_contact">
								<div class="menu_contact_item"><div class="menu_contact_icon"><img src="images/phone_white.png" alt=""></div>021-5984799</div>
								<div class="menu_contact_item"><div class="menu_contact_icon"><img src="images/mail_white.png" alt=""></div><a href="mailto:doremi.ecomm@gmail.com">doremi.ecomm@gmail.com</a></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	
	<!-- Banner -->
<!--
	<div class="banner">
		<div class="banner_background" style="background-image:url(images/banner_background.jpg)"></div>
		<div class="container fill_height">
			<div class="row fill_height">
				<div class="banner_product_image"><img src="images/banner_product.png" alt=""></div>
				<div class="col-lg-5 offset-lg-4 fill_height">
					<div class="banner_content">
						<h1 class="banner_text">new era of smartphones</h1>
						<div class="banner_price"><span>$530</span>$460</div>
						<div class="banner_product_name">Apple Iphone 6s</div>
						<div class="button banner_button"><a href="#">Shop Now</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
-->
	<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  		<ol class="carousel-indicators">
		    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  		</ol>
  		<div class="carousel-inner">
			<div class="carousel-item active">
			     <img class="d-block w-100" src="images/banner/4.jpg" alt="First slide">
			</div>
    		<div class="carousel-item">
		      	<img class="d-block w-100" src="images/banner/4.jpg" alt="Second slide">
		    </div>
		    <div class="carousel-item">
		      <img class="d-block w-100" src="images/banner/4.jpg" alt="First slide">
		    </div>
  		</div>
		  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
		    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
		    <span class="sr-only">Previous</span>
		  </a>
		  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
		    <span class="carousel-control-next-icon" aria-hidden="true"></span>
		    <span class="sr-only">Next</span>
		  </a>
	</div>

	<!-- Characteristics 

	<div class="characteristics">
		<div class="container">
			<div class="row">

				<!-- Char. Item 
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="images/char_1.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Pengiriman Ke Seluruh Indonesia</div>
							<div class="char_subtitle"></div>
						</div>
					</div>
				</div>

				<!-- Char. Item 
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="images/char_2.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Respon Cepat</div>
							<div class="char_subtitle"></div>
						</div>
					</div>
				</div>

				<!-- Char. Item 
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="images/char_3.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Termurah Se Indonesia</div>
							<div class="char_subtitle"></div>
						</div>
					</div>
				</div>

				<!-- Char. Item 
				<div class="col-lg-3 col-md-6 char_col">
					
					<div class="char_item d-flex flex-row align-items-center justify-content-start">
						<div class="char_icon"><img src="images/char_4.png" alt=""></div>
						<div class="char_content">
							<div class="char_title">Service Center Resmi </div>
							<div class="char_subtitle"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->

	<!-- Produk Pilihan -->

	<div class="new_arrivals">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="tabbed_container">
						<div class="tabs clearfix tabs-right">
							<div class="new_arrivals_title">Produk Pilihan</div>
							<ul class="clearfix">
								<li class="active">Promo</li>
								<li>Terbaru</li>
								<li>Harga Terbaik</li>
							</ul>
							<div class="tabs_line"><span></span></div>
						</div>
						<div class="row">
							<div class="col-lg-12" style="z-index:1;">

								<!-- Product Panel -->
								<div class="product_panel panel active">
									<div class="arrivals_slider slider">

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center -justify-content-center"><img src="images/produk/c-315.png" class="img-responsive" alt="" ></div>
												<div class="product_content">
													<div class="product_price">RP 705.200 <br><span><strike>RP 860.000</strike></span></div>
													<div class="product_name"><div><a href="product.html">YAMAHA C 315</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount">-25%</li>
													<li class="product_mark product_new">Baru</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_2.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$379</div>
													<div class="product_name"><div><a href="product.html">Transcend T.Sonic</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button active">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">Baru</li>
												</ul>
											</div>
										</div>

											<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center -justify-content-center"><img src="images/produk/pianica.png" class="img-responsive" alt="" ></div>
												<div class="product_content">
													<div class="product_price">RP 629.000 <br><span><strike>RP 740.000</strike></span></div>
													<div class="product_name"><div><a href="product.html">YAMAHA P37D PIANICA</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount">-25%</li>
													<li class="product_mark product_new">Baru</li>
												</ul>
											</div>
										</div>
										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_4.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$225</div>
													<div class="product_name"><div><a href="product.html">Rapoo T8 White</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">Baru</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_5.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$225</div>
													<div class="product_name"><div><a href="product.html">Philips BT6900A</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">10%</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_6.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$379</div>
													<div class="product_name"><div><a href="product.html">Nokia 3310(2017)...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">Baru</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_7.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$379</div>
													<div class="product_name"><div><a href="product.html">Rapoo 7100p Gray</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount">-25%</li>
													<li class="product_mark product_new">Baru</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_8.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$225</div>
													<div class="product_name"><div><a href="product.html">Canon EF</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">Baru</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_1.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$225</div>
													<div class="product_name"><div><a href="product.html">Gembird SPK-103</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">Baru</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_2.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$379</div>
													<div class="product_name"><div><a href="product.html">Canon IXUS 175...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">Baru</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_3.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$379</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">Baru</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
										<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_4.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$225</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">Baru</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_5.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$225</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">Baru</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_6.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$379</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">Baru</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_7.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$379</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">Baru</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_8.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$225</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">Baru</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>


								<!-- Product Panel Terbaru-->
								<div class="product_panel panel">
									<div class="arrivals_slider slider">

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_1.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$225</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount">-25%</li>
													<li class="product_mark product_new">Baru</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_2.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$379</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button active">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">Baru</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_3.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$379</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">Baru</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_4.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$225</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">Baru</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_5.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$225</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_6.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$379</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_7.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$379</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount">-25%</li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_8.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$225</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_1.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$225</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_2.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$379</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_3.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$379</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
										<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_4.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$225</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_5.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$225</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_6.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$379</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_7.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$379</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_8.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$225</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>

								<!-- Product Panel -->
								<div class="product_panel panel">
									<div class="arrivals_slider slider">

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_1.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$225</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount">-25%</li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_2.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$379</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button active">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_3.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$379</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_4.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$225</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_5.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$225</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_6.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$379</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_7.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$379</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount">-25%</li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_8.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$225</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_1.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$225</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_2.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$379</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_3.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$379</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
										<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_4.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$225</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_5.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$225</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_6.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$379</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_7.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$379</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>

										<!-- Slider Item -->
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_8.jpg" alt=""></div>
												<div class="product_content">
													<div class="product_price">$225</div>
													<div class="product_name"><div><a href="product.html">Huawei MediaPad...</a></div></div>
													<div class="product_extras">
														<div class="product_color">
															<input type="radio" checked name="product_color" style="background:#b19c83">
															<input type="radio" name="product_color" style="background:#000000">
															<input type="radio" name="product_color" style="background:#999999">
														</div>
														<button class="product_cart_button">Beli</button>
													</div>
												</div>
												<div class="product_fav"><i class="fas fa-heart"></i></div>
												<ul class="product_marks">
													<li class="product_mark product_discount"></li>
													<li class="product_mark product_new">new</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>
							</div>
						</div>		
					</div>
				</div>
			</div>
		</div>		
	</div>

<!-- Trends -->

	<div class="trends">
		<div class="trends_background" style="background-image:url(images/trends_background.jpg)"></div>
		<div class="trends_overlay"></div>
		<div class="container">
			<div class="row">

				<!-- Trends Content -->
				<div class="col-lg-3">
					<div class="trends_container">
						<h2 class="trends_title">Trending 2018</h2>
						<div class="trends_text"><p>Produk pilihan untuk kamu pecinta musik.</p></div>
						<div class="trends_slider_nav">
							<div class="trends_prev trends_nav"><i class="fas fa-angle-left ml-auto"></i></div>
							<div class="trends_next trends_nav"><i class="fas fa-angle-right ml-auto"></i></div>
						</div>
					</div>
				</div>

				<!-- Trends Slider -->
				<div class="col-lg-9">
					<div class="trends_slider_container">

						<!-- Trends Slider -->

						<div class="owl-carousel owl-theme trends_slider">

							<!-- Trends Slider Item -->
							<div class="owl-item">
								<div class="trends_item is_new">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="images/trends_1.jpg" alt=""></div>
									<div class="trends_content">
										<div class="trends_category"><a href="#">Smartphones</a></div>
										<div class="trends_info clearfix">
											<div class="trends_name"><a href="product.html">Jump White</a></div>
											<div class="trends_price">$379</div>
										</div>
									</div>
									<ul class="trends_marks">
										<li class="trends_mark trends_discount">-25%</li>
										<li class="trends_mark trends_new">new</li>
									</ul>
									<div class="trends_fav"><i class="fas fa-heart"></i></div>
								</div>
							</div>

							<!-- Trends Slider Item -->
							<div class="owl-item">
								<div class="trends_item">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="images/trends_2.jpg" alt=""></div>
									<div class="trends_content">
										<div class="trends_category"><a href="#">Smartphones</a></div>
										<div class="trends_info clearfix">
											<div class="trends_name"><a href="product.html">Samsung Charm...</a></div>
											<div class="trends_price">$379</div>
										</div>
									</div>
									<ul class="trends_marks">
										<li class="trends_mark trends_discount">-25%</li>
										<li class="trends_mark trends_new">new</li>
									</ul>
									<div class="trends_fav"><i class="fas fa-heart"></i></div>
								</div>
							</div>

							<!-- Trends Slider Item -->
							<div class="owl-item">
								<div class="trends_item is_new">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="images/trends_3.jpg" alt=""></div>
									<div class="trends_content">
										<div class="trends_category"><a href="#">Smartphones</a></div>
										<div class="trends_info clearfix">
											<div class="trends_name"><a href="product.html">DJI Phantom 3...</a></div>
											<div class="trends_price">$379</div>
										</div>
									</div>
									<ul class="trends_marks">
										<li class="trends_mark trends_discount">-25%</li>
										<li class="trends_mark trends_new">new</li>
									</ul>
									<div class="trends_fav"><i class="fas fa-heart"></i></div>
								</div>
							</div>

							<!-- Trends Slider Item -->
							<div class="owl-item">
								<div class="trends_item is_new">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="images/trends_1.jpg" alt=""></div>
									<div class="trends_content">
										<div class="trends_category"><a href="#">Smartphones</a></div>
										<div class="trends_info clearfix">
											<div class="trends_name"><a href="product.html">Jump White</a></div>
											<div class="trends_price">$379</div>
										</div>
									</div>
									<ul class="trends_marks">
										<li class="trends_mark trends_discount">-25%</li>
										<li class="trends_mark trends_new">new</li>
									</ul>
									<div class="trends_fav"><i class="fas fa-heart"></i></div>
								</div>
							</div>

							<!-- Trends Slider Item -->
							<div class="owl-item">
								<div class="trends_item">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="images/trends_2.jpg" alt=""></div>
									<div class="trends_content">
										<div class="trends_category"><a href="#">Smartphones</a></div>
										<div class="trends_info clearfix">
											<div class="trends_name"><a href="product.html">Jump White</a></div>
											<div class="trends_price">$379</div>
										</div>
									</div>
									<ul class="trends_marks">
										<li class="trends_mark trends_discount">-25%</li>
										<li class="trends_mark trends_new">new</li>
									</ul>
									<div class="trends_fav"><i class="fas fa-heart"></i></div>
								</div>
							</div>

							<!-- Trends Slider Item -->
							<div class="owl-item">
								<div class="trends_item is_new">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="images/trends_3.jpg" alt=""></div>
									<div class="trends_content">
										<div class="trends_category"><a href="#">Smartphones</a></div>
										<div class="trends_info clearfix">
											<div class="trends_name"><a href="product.html">Jump White</a></div>
											<div class="trends_price">$379</div>
										</div>
									</div>
									<ul class="trends_marks">
										<li class="trends_mark trends_discount">-25%</li>
										<li class="trends_mark trends_new">new</li>
									</ul>
									<div class="trends_fav"><i class="fas fa-heart"></i></div>
								</div>
							</div>

						</div>
					</div>
				</div>

			</div>
		</div>
	</div>


	<!-- Popular Categories -->

	<div class="popular_categories">
		<div class="container" >
			<div class="row">
				<div class="col-lg-3">
					<div class="popular_categories_content">
						<div class="popular_categories_title">Kategori Terpopuler</div>
						<div class="popular_categories_slider_nav">
							<div class="popular_categories_prev popular_categories_nav"><i class="fas fa-angle-left ml-auto"></i></div>
							<div class="popular_categories_next popular_categories_nav"><i class="fas fa-angle-right ml-auto"></i></div>
						</div>
					</div>
				</div>
				
				<!-- Popular Categories Slider -->

				<div class="col-lg-9">
					<div class="popular_categories_slider_container">
						<div class="owl-carousel owl-theme popular_categories_slider">

							<!-- Popular Categories Item -->
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="images/kategori/gitar.png" alt=""></div>
									<div class="popular_category_text"><a href="#">Gitar</a></div>
								</div>
							</div>

							<!-- Popular Categories Item -->
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="images/kategori/band.png" alt=""></div>
									<div class="popular_category_text"><a href="#">Band & Orkestra</a></div>
								</div>
							</div>

							<!-- Popular Categories Item -->
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="images/kategori/drum.png" alt=""></div>
									<div class="popular_category_text"><a href="#">Drum</a></div>
								</div>
							</div>

							<!-- Popular Categories Item -->
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="images/kategori/acc.png" alt=""></div>
									<div class="popular_category_text"><a href="#"> Aksesoris</a></div>
								</div>
							</div>

							<!-- Popular Categories Item -->
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="images/kategori/keyboard.png" alt=""></div>
									<div class="popular_category_text"><a href="#">Keyboard</a></div>
								</div>
							</div>

							<!-- Popular Categories Item -->
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="images/kategori/piano.png" alt=""></div>
									<div class="popular_category_text"><a href="#">Piano</a></div>
								</div>
							</div>

							<!-- Popular Categories Item -->
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="images/kategori/bass.png" alt=""></div>
									<div class="popular_category_text"><a href="#">Bass</a></div>
								</div>
							</div>

							<!-- Popular Categories Item -->
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="images/kategori/audio.png" alt=""></div>
									<div class="popular_category_text"><a href="#">Pro Audio</a></div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

<!-- Brands -->

	<div class="brands">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="brands_slider_container">
						
						<!-- Brands Slider -->
						
						<div class="owl-carousel owl-theme brands_slider">
							
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brand/1.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brand/3.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_3.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_4.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_5.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_6.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_7.jpg" alt=""></div></div>
							<div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="images/brands_8.jpg" alt=""></div></div>

						</div>
						
						<!-- Brands Slider Navigation -->
						<div class="brands_nav brands_prev"><i class="fas fa-chevron-left"></i></div>
						<div class="brands_nav brands_next"><i class="fas fa-chevron-right"></i></div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Blog -->

	<div class="reviews">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="reviews_title_container">
						<h3 class="reviews_title">Terbaru Dari Blog Kami</h3>
						<div class="reviews_all ml-auto"><a href="blog.html">Lihat semua postingan</span></a></div>
					</div>

					<div class="reviews_slider_container">
						
						<!-- Reviews Slider -->
						<div class="owl-carousel owl-theme reviews_slider">
							
							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="images/review_1.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Diskon Up To 80%</div>
										<div class="review_rating_container">
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="images/review_2.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Brandon Flowers</div>
										<div class="review_rating_container">
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="images/review_3.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Emilia Clarke</div>
										<div class="review_rating_container">
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="images/review_1.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Roberto Sanchez</div>
										<div class="review_rating_container">
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="images/review_2.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Brandon Flowers</div>
										<div class="review_rating_container">
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

							<!-- Reviews Slider Item -->
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="images/review_3.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">Emilia Clarke</div>
										<div class="review_rating_container">
											<div class="review_time">2 day ago</div>
										</div>
										<div class="review_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</p></div>
									</div>
								</div>
							</div>

						</div>
						<div class="reviews_dots"></div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="images/send.png" alt=""></div>
							<div class="newsletter_title">Mau Dapat Info Diskon?</div>
							<div class="newsletter_text"><p>Berlangganan Newslatter Doremi Musik Sekarang!</p></div>
						</div>
						<div class="newsletter_content clearfix">
							<form action="#" class="newsletter_form">
								<input type="email" class="newsletter_input" required="required" placeholder="Masukkan Alamat Email Kamu...">
								<button class="newsletter_button">Berlangganan</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	<footer class="footer">
		<div class="container">
			<div class="row">

				<div class="col-lg-3 footer_col">
					<div class="footer_column footer_contact">
						<div class="logo_container">
							<div class="logo"><a href="#">Doremi</a></div>
						</div>
						<div class="footer_title">Ada pertanyaan?</div>
						<div class="footer_phone">(021) 5984799</div>
						<div class="footer_contact_text">
							<p>Jl.Taman Permata No.18, Ruko Villa </p>
							<p>Permata Blok C1 No.11, Lippo Village</p>
						</div>
						<div class="footer_social">
							<ul>
								<li><a href="https://www.facebook.com/DoremiMusikID/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="https://www.youtube.com/channel/UCWbAztZUYS5uHBoXiJZbyeA/" target="_blank"><i class="fab fa-youtube"></i></a></li>
								<li><a href="https://www.instagram.com/doremimusik/" target="_blank"><i class="fab fa-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-2 offset-lg-2">
					<div class="footer_column">
						<div class="footer_title">Direktori Belanja</div>
						<ul class="footer_list">
							<li><a href="#">Gitar</a></li>
							<li><a href="#">Band & Orkestra</a></li>
							<li><a href="#">Drum</a></li>
							<li><a href="#">Aksesoris</a></li>
							<li><a href="#">Keyboard</a></li>
						</ul>
						<div class="footer_subtitle"></div>
						<ul class="footer_list">
							<li><a href="#">Piano Digital</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<div class="footer_title">Info Perusahaan</div>
						<ul class="footer_list">
							<li><a href="#">Tentang Perusahaan</a></li>
							<li><a href="#">Hubungi Kami</a></li>
							<li><a href="#">Karir</a></li>
							<li><a href="#">Service</a></li>
							<li><a href="#">Departeman</a></li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2">
					<div class="footer_column">
						<div class="footer_title">Pelayanan Pelanggan</div>
						<ul class="footer_list">
							<li><a href="#">Akun Saya</a></li>
							<li><a href="#">Lacak Pesanan</a></li>
							<li><a href="#">Favoritku</a></li>
							<li><a href="#">Customer Services</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="#">Terms & Condition</a></li>
						</ul>
					</div>
				</div>

			</div>
		</div>
	</footer>

	<!-- Copyright -->

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col">
					
					<div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
						<div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
</div>
						<div class="logos ml-sm-auto">
							<ul class="logos_list">
								<li><a href="#"><img src="images/logos_1.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_2.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_3.png" alt=""></a></li>
								<li><a href="#"><img src="images/logos_4.png" alt=""></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="{{URL::asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{URL::asset('frontend/styles/bootstrap4/popper.js')}}"></script>
<script src="{{URL::asset('frontend/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('frontend/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{URL::asset('frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{URL::asset('frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{URL::asset('frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{URL::asset('frontend/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{URL::asset('frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{URL::asset('frontend/plugins/slick-1.8.0/slick.js')}}"></script>
<script src="{{URL::asset('frontend/plugins/easing/easing.js')}}"></script>
<script src="{{URL::asset('frontend/js/custom.js')}}"></script>

<!-- Back To Top-->
<script>
 
jQuery(document).ready(function() {
 
var offset = 250;
 
var duration = 300;
 
jQuery(window).scroll(function() {
 
if (jQuery(this).scrollTop() > offset) {
 
jQuery('.back-to-top').fadeIn(duration);
 
} else {
 
jQuery('.back-to-top').fadeOut(duration);
 
}
});
 
 
 
jQuery('.back-to-top').click(function(event) {
 
event.preventDefault();
 
jQuery('html, body').animate({scrollTop: 0}, duration);
 
return false;
 
})
 
});
 
</script>
</body>

</html>