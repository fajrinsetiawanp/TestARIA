<!DOCTYPE html>
<html lang="en">
<head>
	@include('frontend.include.header')

	<link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/styles/responsive.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/plugins/slick-1.8.0/slick.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/styles/main_styles.css')}}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
	<meta name="facebook-domain-verification" content="9fqh8b6v5ssc4qkcb6kj5xompibqnt" />
</head>

<body>

<div class="super_container">
	<!-- Header -->
	
	@include('frontend.include.navbar')
	
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
  		{{-- <ol class="carousel-indicators">
		    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
		    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  		</ol> --}}
  		<div class="carousel-inner">
				<div class="carousel-item active">
			    	<img class="d-block w-100" src="{{ env('APP_URL') }}/{{ $banner_first->gambar }}">
				</div>
  			@foreach($banner as $banners)
		    	<div class="carousel-item">
			      	<img class="d-block w-100" src="{{ env('APP_URL') }}/{{ $banners->gambar }}">
			    </div>
			@endforeach
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
									@foreach($produkPromo as $k => $v)
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center -justify-content-center">
													<img src="{{ env('APP_URL') }}/{{ $v->gambar->gambar }}" class="img-responsive" alt="" >
													{{-- <img src="images/produk/c-315.png" class="img-responsive" alt="" > --}}
												</div>
												<div class="product_content">
													<div class="product_price">Rp.
														@if($v->harga->diskon != 0)
															{{ number_format($v->harga_diskon) }}
															<br>
															<span><strike>Rp. {{ number_format($v->harga->harga) }}</strike></span>
														@else
															{{ number_format($v->harga->harga) }}
														@endif
														
													</div>
													<div class="product_name"><div><a href="{{ url('/frontend/produk-detail', $v->kode_sku) }}">
														{{ $v->judul1 }} <br>
														{{ $v->judul2 }}
													</a></div></div>
													<div class="product_extras">
														{{-- <div class="product_color">
														@foreach($v->warna as $warnas)
														@php
															$warna = App\Models\TbMasterWarna::find($warnas->id_warna);
														@endphp
															<input type="radio" checked name="product_color" style="background: {{ $warna->warna }}">
														@endforeach
														</div> --}}
														<a href="{{ url('/frontend/produk-detail', $v->kode_sku) }}"><button class="product_cart_button">Beli</button></a>
													</div>
												</div>
												@if($v->harga->diskon != 0)
													<div class="product_fav favoritku" data-id="{{ $v->kode_sku }}_{{ $v->judul}}_{{ $v->harga_diskon }}"><i class="fas fa-heart"></i></div>
												@else
													<div class="product_fav favoritku" data-id="{{ $v->kode_sku }}_{{ $v->judul}}_{{ $v->harga->harga }}"><i class="fas fa-heart"></i></div>
												@endif
												<ul class="product_marks">
													<li class="product_mark product_discount">-25%</li>
													{{-- <li class="product_mark product_new">Baru</li> --}}
												</ul>
											</div>
										</div>
									@endforeach

									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>

								<!-- Product Panel -->
								<div class="product_panel panel">
									<div class="arrivals_slider slider">
										<!-- Slider Item -->
									@foreach($produkBaru as $k => $v)
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center -justify-content-center">
													<img src="{{ env('APP_URL') }}/{{ $v->gambar->gambar }}" class="img-responsive" alt="" >
													{{-- <img src="images/produk/c-315.png" class="img-responsive" alt="" > --}}
												</div>
												<div class="product_content">
													<div class="product_price">Rp.
														@if($v->harga->diskon != 0)
															{{ number_format($v->harga_diskon) }}
															<br>
															<span><strike>Rp. {{ number_format($v->harga->harga) }}</strike></span>
														@else
															{{ number_format($v->harga->harga) }}
														@endif
													</div>
													<div class="product_name"><div><a href="{{ url('/frontend/produk-detail', $v->kode_sku) }}">
														{{ $v->judul1 }} <br>
														{{ $v->judul2 }}
													</a></div></div>
													<div class="product_extras">
														{{-- <div class="product_color">
														@foreach($v->warna as $warnas)
														@php
															$warna = App\Models\TbMasterWarna::find($warnas->id_warna);
														@endphp
															<input type="radio" checked name="product_color" style="background: {{ $warna->warna }}">
														@endforeach
														</div> --}}
														<a href="{{ url('/frontend/produk-detail', $v->kode_sku) }}"><button class="product_cart_button">Beli</button></a>
													</div>
												</div>
												@if($v->harga->diskon != 0)
													<div class="product_fav favoritku" data-id="{{ $v->kode_sku }}_{{ $v->judul}}_{{ $v->harga_diskon }}"><i class="fas fa-heart"></i></div>
												@else
													<div class="product_fav favoritku" data-id="{{ $v->kode_sku }}_{{ $v->judul}}_{{ $v->harga->harga }}"><i class="fas fa-heart"></i></div>
												@endif
												<ul class="product_marks">
													<li class="product_mark product_discount">-25%</li>
													{{-- <li class="product_mark product_new">Baru</li> --}}
												</ul>
											</div>
										</div>
									@endforeach
										
									</div>
									<div class="arrivals_slider_dots_cover"></div>
								</div>

								<!-- Product Panel -->
								<div class="product_panel panel">
									<div class="arrivals_slider slider">
										<!-- Slider Item -->
									@foreach($produkHargaTerbaik as $k => $v)
										<div class="arrivals_slider_item">
											<div class="border_active"></div>
											<div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
												<div class="product_image d-flex flex-column align-items-center -justify-content-center">
													<img src="{{ env('APP_URL') }}/{{ $v->gambar->gambar }}" class="img-responsive" alt="" >
													{{-- <img src="images/produk/c-315.png" class="img-responsive" alt="" > --}}
												</div>
												<div class="product_content">
													<div class="product_price">Rp.
														@if($v->harga->diskon != 0)
															{{ number_format($v->harga_diskon) }}
															<br>
															<span><strike>Rp. {{ number_format($v->harga->harga) }}</strike></span>
														@else
															{{ number_format($v->harga->harga) }}
														@endif		
													</div>
													<div class="product_name"><div><a href="{{ url('/frontend/produk-detail', $v->kode_sku) }}">
														{{ $v->judul1 }} <br>
														{{ $v->judul2 }}
													</a></div></div>
													<div class="product_extras">
														{{-- <div class="product_color">
														@foreach($v->warna as $warnas)
														@php
															$warna = App\Models\TbMasterWarna::find($warnas->id_warna);
														@endphp
															<input type="radio" checked name="product_color" style="background: {{ $warna->warna }}">
														@endforeach
														</div> --}}
														<a href="{{ url('/frontend/produk-detail', $v->kode_sku) }}"><button class="product_cart_button">Beli</button></a>
													</div>
												</div>
												@if($v->harga->diskon != 0)
													<div class="product_fav favoritku" data-id="{{ $v->kode_sku }}_{{ $v->judul}}_{{ $v->harga_diskon }}"><i class="fas fa-heart"></i></div>
												@else
													<div class="product_fav favoritku" data-id="{{ $v->kode_sku }}_{{ $v->judul}}_{{ $v->harga->harga }}"><i class="fas fa-heart"></i></div>
												@endif
												<ul class="product_marks">
													<li class="product_mark product_discount">-25%</li>
													{{-- <li class="product_mark product_new">Baru</li> --}}
												</ul>
											</div>
										</div>
									@endforeach
										
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
						@foreach($produkTrending as $k => $v)
							<div class="owl-item">
								<div class="trends_item is_new">
									<div class="trends_image d-flex flex-column align-items-center justify-content-center"><img src="{{ env('APP_URL') }}/{{ $v->gambar->gambar }}" alt=""></div>
									<div class="trends_content">
										<div class="trends_category"><a href="#">{{ $v->kategori }}</a></div>
										<div class="trends_info clearfix">
											<div class="trends_name"><a href="{{ url('/frontend/produk-detail', $v->kode_sku) }}">
												{{ $v->judul1 }} <br>
												{{ $v->judul2 }}
											</a></div>
											<div class="trends_price">Rp. 
												@if($v->harga->diskon != 0)
													{{ number_format($v->harga_diskon) }}
													<br>
													<span><strike>Rp. {{ number_format($v->harga->harga) }}</strike></span>
												@else
													{{ number_format($v->harga->harga) }}
												@endif
											</div>
										</div>
									</div>
									<ul class="trends_marks">
										<li class="trends_mark trends_discount">-25%</li>
										{{-- <li class="trends_mark trends_new">new</li> --}}
									</ul>
												@if($v->harga->diskon != 0)
													<div class="product_fav favoritku" data-id="{{ $v->kode_sku }}_{{ $v->judul}}_{{ $v->harga_diskon }}"><i class="fas fa-heart"></i></div>
												@else
													<div class="product_fav favoritku" data-id="{{ $v->kode_sku }}_{{ $v->judul}}_{{ $v->harga->harga }}"><i class="fas fa-heart"></i></div>
												@endif
								</div>
							</div>
						@endforeach

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
						@foreach($kategoriPopuler as $kategoriPopulers)
							<div class="owl-item">
								<div class="popular_category d-flex flex-column align-items-center justify-content-center">
									<div class="popular_category_image"><img src="{{ env('APP_URL') }}/{{ $kategoriPopulers->gambar }}" alt=""></div>
									<div class="popular_category_text"><a href="#">{{ $kategoriPopulers->nama_kategori }}</a></div>
								</div>
							</div>
						@endforeach
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
							@foreach($manufaktur as $manufakturs)
							<div class="owl-item">
								<div class="brands_item d-flex flex-column justify-content-center"><img src="{{ env('APP_URL') }}/{{ $manufakturs->logo }}" alt="">
								</div>
							</div>
							@endforeach
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

	{{-- <div class="reviews">
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
							@foreach($blog as $blogs)
							<div class="owl-item">
								<div class="review d-flex flex-row align-items-start justify-content-start">
									<div><div class="review_image"><img src="images/review_1.jpg" alt=""></div></div>
									<div class="review_content">
										<div class="review_name">{{ $blogs->judul }}</div>
										<div class="review_rating_container">
											<div class="review_time">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($blogs->created_at))->diffForHumans() }}</div>
										</div>
										<div class="review_text">{{ $blogs->deskripsi_singkat }}</div>
									</div>
								</div>
							</div>
							@endforeach

						</div>
						<div class="reviews_dots"></div>
					</div>
				</div>
			</div>
		</div>
	</div> --}}


	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="{{URL::asset('frontend/images/send.png')}}" alt=""></div>
							<div class="newsletter_title">Mau Dapat Info Diskon?</div>
							<div class="newsletter_text"><p>Berlangganan Newslatter Doremi Musik Sekarang!</p></div>
						</div>
						<div class="newsletter_content clearfix">
							<form action="{{ url('/frontend/subscribe') }}" method="post" class="newsletter_form">
								{{ csrf_field() }}
								<input type="email" class="newsletter_input" required="required" name="email_subscribe" placeholder="Masukkan Alamat Email Kamu...">
								<button type="submit" class="newsletter_button">Berlangganan</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->

	@include('frontend.include.footerbar')
	
</div>

@include('frontend.include.footer')

<script src="{{URL::asset('frontend/plugins/slick-1.8.0/slick.js')}}"></script>
<script src="{{URL::asset('frontend/js/custom.js')}}"></script>

	<script>
        (function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.favoritku').on('click', function() {
                var id = $(this).attr('data-id');
                var str = id;
    			var res = str.split("_");

                $.ajax({
                  type: "POST",
                  url: '{{ url("/frontend/wishlist") }}',
                  data: {
                    'kode_sku': res[0],
                    'judul': res[1],
                    'harga': res[2],
                  },
                  success: function() {
                    window.location.href = '{{ url('/frontend/wishlist') }}';
                  }
                });

            });

        })();

    </script>

</body>
</html>
