<!DOCTYPE html>
<html lang="en">
<head>
	@include('frontend.include.header')

	<link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/styles/product_styles.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/styles/product_responsive.css')}}">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
	<meta name="facebook-domain-verification" content="9fqh8b6v5ssc4qkcb6kj5xompibqnt" />
</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	
	@include('frontend.include.navbar')

	<!-- Single Product -->

	<div class="single_product">
		<div class="container">
			<div class="row">

				<!-- Images -->
				<div class="col-lg-2 order-lg-1 order-2">
					<ul class="image_list">
						@foreach($produk->gambar as $gambars)
							<li data-image="{{ env('APP_URL') }}/{{ $gambars->gambar }}"><img src="{{ env('APP_URL') }}/{{ $gambars->gambar }}" alt=""></li>
						@endforeach
						<li data-image="images/single_2.jpg"><img src="images/single_2.jpg" alt=""></li>
						<li data-image="images/single_3.jpg"><img src="images/single_3.jpg" alt=""></li>
						<li data-image="images/single_4.jpg"><img src="images/single_4.jpg" alt=""></li>
						<li data-image="images/single_2.jpg"><img src="images/single_2.jpg" alt=""></li>
					</ul>
				</div>

				<!-- Selected Image -->
				<div class="col-lg-5 order-lg-2 order-1">
					<div class="image_selected"><img src="{{ env('APP_URL') }}/{{ $produk->gambar[0]->gambar }}" alt=""></div>
				</div>

				<!-- Description -->
				<div class="col-lg-5 order-3">
					<div class="product_description">
						<div class="product_category">{{ $produk->kategori }}</div>
						<div class="product_name">{{ $produk->judul }}</div>
						<div class="product_text"><p>{{ $produk->deskripsi_singkat }}</p></div>
						<div class="order_info d-flex flex-row">
							<form action="{{ url('/frontend/wishlist') }}" method="POST" id="formWishlist">
								{!! csrf_field() !!}
			                    <input type="hidden" name="kode_sku" value="{{ $produk->kode_sku }}">
			                    <input type="hidden" name="judul" value="{{ $produk->judul }}">
			                    @if($produk->harga->diskon != 0)
									<input type="hidden" name="harga" value="{{ $produk->harga_diskon }}">
								@else
									<input type="hidden" name="harga" value="{{ $produk->harga->harga }}">
								@endif
							</form>
							<form action="{{ url('/frontend/cart') }}" method="POST" id="formCart">
								{!! csrf_field() !!}
			                    <input type="hidden" name="kode_sku" value="{{ $produk->kode_sku }}">
			                    <input type="hidden" name="judul" value="{{ $produk->judul }}">
			                    @if($produk->harga->diskon != 0)
									<input type="hidden" name="harga" value="{{ $produk->harga_diskon }}">
								@else
									<input type="hidden" name="harga" value="{{ $produk->harga->harga }}">
								@endif
							</form>
								{{-- <div class="clearfix" style="z-index: 1000;">

									<!-- Product Quantity -->
									<div class="product_quantity clearfix">
										<span>Quantity: </span>
										<input id="quantity_input" type="text" pattern="[0-9]*" value="1">
										<div class="quantity_buttons">
											<div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fas fa-chevron-up"></i></div>
											<div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fas fa-chevron-down"></i></div>
										</div>
									</div>

									<!-- Product Color -->
									<ul class="product_color">
										<li>
											<span>Color: </span>
											<div class="color_mark_container"><div id="selected_color" class="color_mark"></div></div>
											<div class="color_dropdown_button"><i class="fas fa-chevron-down"></i></div>

											<ul class="color_list">
												<li><div class="color_mark" style="background: #999999;"></div></li>
												<li><div class="color_mark" style="background: #b19c83;"></div></li>
												<li><div class="color_mark" style="background: #000000;"></div></li>
											</ul>
										</li>
									</ul>

								</div> --}}

								<div class="product_price">Rp.
									@if($produk->harga->diskon != 0)
										{{ number_format($produk->harga_diskon) }}
										<span><strike>Rp. {{ number_format($produk->harga->harga) }}</strike></span>
									@else
										{{ number_format($produk->harga->harga) }}
									@endif
								</div>

								@if($produk->harga->diskon != 0)
									<div class="button_container" style="margin-top: 73px; margin-left: -280px;">
								@else
									<div class="button_container" style="margin-top: 73px; margin-left: -160px;">
								@endif
									<button type="submit" class="button cart_button" form="formCart">Tambah ke keranjang</button>
									<button type="submit" class="product_fav" form="formWishlist"><i class="fas fa-heart"></i></button>
								</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

<!-- Tabs Description -->
	<div class="footer">
		<div class="container">
			<div class="row">
				<div class="col">
					<nav>
	  					<div class="nav nav-tabs" id="nav-tab" role="tablist">
	   						 <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#spesifikasi" role="tab" aria-controls="nav-home" aria-selected="true">Deskripsi Produk</a>
	    					<!--<a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Ulasan</a> -->
 						 </div>
					</nav>
						<div class="tab-content" id="nav-tabContent">
	  						<div class="tab-pane fade show active" id="spesifikasi" role="tabpanel" aria-labelledby="nav-home-tab"><br> {!! $produk->spesifikasi_produk !!}</div>
	  						{{-- <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum. laoreet turpis, nec sollicitudin dolor cursus at. Maecenas aliquet, dolor a faucibus efficitur, nisi tellus cursus urna, eget dictum lacus turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum. laoreet turpis, nec sollicitudin dolor cursus at. Maecenas aliquet, dolor a faucibus efficitur, nisi tellus cursus urna, eget dictum lacus turpis. Maecenas fermentum. laoreet turpis, nec sollicitudin dolor cursus at. Maecenas aliquet, dolor a faucibus efficitur, nisi tellus cursus urna, eget dictum lacus turpis</div>
	  						<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div> --}}
						</div>
					</div>
				</div>	
			</div>
		</div>
	</div>

	<!-- Recently Viewed -->

	<div class="viewed">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="viewed_title_container">
						<h4 class="viewed_title">Produk Yang Mungkin Kamu Sukai</h4>
						<div class="viewed_nav_container">
							<div class="viewed_nav viewed_prev"><i class="fas fa-chevron-left"></i></div>
							<div class="viewed_nav viewed_next"><i class="fas fa-chevron-right"></i></div>
						</div>
					</div>

					<div class="viewed_slider_container">
						
						<!-- Recently Viewed Slider -->

						<div class="owl-carousel owl-theme viewed_slider">
							
							<!-- Recently Viewed Item -->
							{{-- <div class="owl-item">
								<div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="images/view_1.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$225<span>$300</span></div>
										<div class="viewed_name"><a href="#">Beoplay H7</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div> --}}

							<!-- Recently Viewed Item -->
							@foreach($related as $k => $v)
							<div class="owl-item">
								<div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image">
										<img src="{{ env('APP_URL') }}/{{ $v->gambar->gambar }}" alt="" >
										{{-- <img src="images/produk/c-315.png" alt=""> --}}
									</div>
									<div class="viewed_content text-center">
										<div class="viewed_price">Rp. 
											@if($v->harga->diskon != 0)
												{{ number_format($v->harga_diskon) }}
											<br>
											<span><strike>Rp. {{ number_format($v->harga->harga) }}</strike></span>
											@else
												{{ number_format($v->harga->harga) }}
											@endif
										</div>
										<div class="viewed_name"><a href="{{ url('/frontend/produk-detail', $v->kode_sku) }}">
											{{ $v->judul1 }}<br>
											{{ $v->judul2 }}
										</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div>
							@endforeach

							<!-- Recently Viewed Item -->
							{{-- <div class="owl-item">
								<div class="viewed_item is_new d-flex flex-column align-items-center justify-content-center text-center">
									<div class="viewed_image"><img src="images/view_4.jpg" alt=""></div>
									<div class="viewed_content text-center">
										<div class="viewed_price">$379</div>
										<div class="viewed_name"><a href="#">Huawei MediaPad...</a></div>
									</div>
									<ul class="item_marks">
										<li class="item_mark item_discount">-25%</li>
										<li class="item_mark item_new">new</li>
									</ul>
								</div>
							</div> --}}
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Brands -->

	<!-- Newsletter -->

	<!-- Footer -->

	@include('frontend.include.footerbar')

</div>

@include('frontend.include.footer')

<script src="{{URL::asset('frontend/js/product_custom.js')}}"></script>

<!-- Back To Top-->

</body>

</html>