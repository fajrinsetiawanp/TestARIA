<!DOCTYPE html>
<html lang="en">


<head>
@include('frontend.include.header')

<link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/styles/about.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/styles/blog_single_responsive.css')}}">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<meta name="facebook-domain-verification" content="9fqh8b6v5ssc4qkcb6kj5xompibqnt" />
</head>

<body>

<div class="super_container">
	
	<!-- Header -->

	@include('frontend.include.navbar')

	<!-- Home -->

	<!-- Home 

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">Doremi Music Blog</h2>
		</div>
	</div> -->

	<!-- Single Blog Post -->

	<div class="single_post">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="single_post_title">Tentang Doremi Music Indonesia</div>
					<div class="single_post_text">
						{{-- <div class="card mb-3">
							<img class="card-img-top" src="{{URL::asset('frontend/images/about.png')}}" height="200" width="300" alt="Card image cap">
						</div> --}}
						<p>{!! $about->deskripsi !!}</p>
						<br>
						{{-- <hr> --}}
						{{-- <div class="single_post_quote text-center">
							<div class="quote_image"><img src="images/quote.png" alt=""></div>
							<div class="quote_text">Quisque sagittis non ex eget vestibulum. Sed nec ultrices dui. Cras et sagittis erat. Maecenas pulvinar, turpis in dictum tincidunt, dolor nibh lacinia lacus.</div>
							<div class="quote_name">Liam Neeson</div>
						</div> --}}
						{{-- <br> --}}
						{{-- <hr> --}}
						{{-- <div class="single_post_title">
							<h4>Penghargaan Doremi Music Indonesia</h4>
						</div>
						<br>
						<!--Penghargaan-->
							<div class="card-deck">
  								<div class="card">
								    <img class="card-img-top" src="images/pg.jpg" alt="Card image cap">
								    <div class="card-body">
								      <h5 class="card-title">Judul</h5>
								    </div>
 								</div>
								<div class="card">
								    <img class="card-img-top" src="images/pg.jpg" alt="Card image cap">
								    <div class="card-body">
								      <h5 class="card-title">Judul</h5>
								    </div>
  								</div>
							  	<div class="card">
								    <img class="card-img-top" src="images/pg.jpg" alt="Card image cap">
								    <div class="card-body">
								      <h5 class="card-title">Judul</h5>
								    </div>
							  	</div>
							</div>
							<br>
							<div class="card-deck">
  								<div class="card">
								    <img class="card-img-top" src="images/pg.jpg" alt="Card image cap">
								    <div class="card-body">
								      <h5 class="card-title">Judul</h5>
								    </div>
 								</div>
								<div class="card">
								    <img class="card-img-top" src="images/pg.jpg" alt="Card image cap">
								    <div class="card-body">
								      <h5 class="card-title">Judul</h5>
								    </div>
  								</div>
							  	<div class="card">
								    <img class="card-img-top" src="images/pg.jpg" alt="Card image cap">
								    <div class="card-body">
								      <h5 class="card-title">Judul</h5>
								    </div>
							  	</div>
							</div> --}}
					</div>
				</div>
			</div>
		</div>
	</div>
 
	<!-- Footer -->

	@include('frontend.include.footerbar')
	
</div>

@include('frontend.include.footer')

<script src="{{URL::asset('frontend/plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{URL::asset('frontend/plugins/easing/easing.js')}}"></script>
<script src="{{URL::asset('frontend/js/blog_single_custom.js')}}"></script>

</body>

</html>