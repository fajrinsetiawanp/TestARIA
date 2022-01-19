<header class="header">

		<!-- Top Bar -->

		<div class="top_bar">
			<div class="container">
				<div class="row">
					<div class="col d-flex flex-row">
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{URL::asset('frontend/images/phone_white.png')}}" alt=""></div>021-5984799</div>
						<div class="top_bar_contact_item"><div class="top_bar_icon"><img src="{{URL::asset('frontend/images/mail_white.png')}}" alt=""></div><a href="mailto:doremi.ecomm@gmail.com">doremi.ecomm@gmail.com</a></div>
						<div class="top_bar_content ml-auto">
							<div class="top_bar_menu">
								<ul class="standard_dropdown top_bar_dropdown">
									<!--<li>
										<a href="#">Konfiirmasi Pembayaran<i class="fa fa-chevron-down"></i></a>
									</li> -->
									<li class="kp">
										<a href="{{ url('/frontend/lacak-pesanan') }}">Lacak Pesanan<i class="fa fa-chevron-down"></i></a>
									</li>
								</ul>
							</div>
							<div class="top_bar_user">
								<div class="user_icon"><img src="{{URL::asset('frontend/images/user-1.png')}}" alt=""></div>
								{{-- <div><a href="#">Daftar</a></div> --}}
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
										{{ csrf_field() }}
										<input type="search" name="q" required="required" class="header_search_input" placeholder="Cari Produk...">
										<div class="custom_dropdown">
											<div class="custom_dropdown_list">
												<span class="custom_dropdown_placeholder clc"></span>
												{{-- <i class="fas fa-chevron-down"></i> --}}
												<ul class="custom_list clc">
													@foreach($kategori as $kategoris)
														<li><a class="clc" href="#">{{ $kategoris->nama_kategori }}</a></li>
													@endforeach
												</ul>
											</div>
										</div>
										<button type="submit" class="header_search_button trans_300" value="Submit"><img src="{{URL::asset('frontend/images/search.png')}}" alt=""></button>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Wishlist -->
					<div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
						<div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
							<div class="wishlist d-flex flex-row align-items-center justify-content-end">
								<div class="wishlist_icon"><a href="{{ url('/frontend/wishlist') }}"><img src="{{URL::asset('frontend/images/heart.png')}}" alt=""></a></div>
								<div class="wishlist_content">
									<div class="wishlist_text"><a href="{{ url('/frontend/wishlist') }}">Favoritku</a></div>
									<div class="wishlist_count">{{ Cart::instance('wishlist')->count(false) }}</div>
								</div>
							</div>

							<!-- Cart -->
							<div class="cart">
								<div class="cart_container d-flex flex-row align-items-center justify-content-end">
									<div class="cart_icon">
										<a href="{{ url('/frontend/cart') }}"><img src="{{URL::asset('frontend/images/cart.png')}}" alt=""></a>
										<div class="cart_count"><span>{{ Cart::instance('default')->count(false) }}</span></div>
									</div>
									<div class="cart_content">
										<div class="cart_text"><a href="{{ url('/frontend/cart') }}">Troli</a></div>
										<div class="cart_price">Rp. {{ Cart::instance('default')->subtotal() }}</div>
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
									@foreach($kategori as $kategoris)
									<li class="hassubs">
										<a href="#">{{ $kategoris->nama_kategori }}<i class="fas fa-chevron-right"></i></a>
										<ul>
											@php
												$subKategori = App\Models\TbSubKategori::where('id_kategori', $kategoris->id)->get();
											@endphp
											@foreach($subKategori as $subKategoris)
												<li><a href="{{ url('/frontend/toko', $subKategoris->nama_sub_kategori) }}">{{ $subKategoris->nama_sub_kategori }}<i class="fas fa-chevron-right"></i></a></li>
											@endforeach
										</ul>
									</li>
									@endforeach
								</ul>
							</div>

							<!-- Main Nav Menu -->

							<div class="main_nav_menu ml-auto">
								<ul class="standard_dropdown main_nav_dropdown">
									<li><a href="/">Beranda<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="{{ url('/frontend/toko/all') }}">Toko<i class="fas fa-chevron-down"></i></a></li>
									{{-- <li class="hassubs">
										<a href="#">Sekolah Musik<i class="fas fa-chevron-down"></i></a>
										<ul>
											<li><a href="#">Anak-Anak<i class="fas fa-chevron-down"></i></a></li>
											<li><a href="#">Remaja<i class="fas fa-chevron-down"></i></a></li>
										</ul>
									</li> --}}
									<li><a href="{{ url('/frontend/tentang-kami') }}">Tentang Kami<i class="fas fa-chevron-down"></i></a></li>
									{{-- <li><a href="blog.html">Blog<i class="fas fa-chevron-down"></i></a></li> --}}
									<li><a href="{{ url('/frontend/kontak') }}">Kontak<i class="fas fa-chevron-down"></i></a></li>
									<li><a href="{{ url('/frontend/online') }}">Marketplace<i class="fas fa-chevron-down"></i></a></li>
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
								<li class="page_menu_item"><a href="#">Marketplace<i class="fa fa-angle-down"></i></a></li>
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