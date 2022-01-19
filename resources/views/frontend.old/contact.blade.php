<!DOCTYPE html>
<html lang="en">
<head>
@include('frontend.include.header')

<link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/styles/contact_styles.css')}}">
<link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/styles/contact_responsive.css')}}">

<script type="jquery-2.2.3.js"></script>
<meta name="facebook-domain-verification" content="9fqh8b6v5ssc4qkcb6kj5xompibqnt" />
</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	
	@include('frontend.include.navbar')

	<!-- Contact Info -->

	<div class="contact_info">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="images/contact_1.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Telepon</div>
								<div class="contact_info_text">(+62) 21-5984799</div>
							</div>
						</div>

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="images/contact_2.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Email</div>
								<div class="contact_info_text">doremi.ecomm@gmail.com</div>
							</div>
						</div>

						<!-- Contact Item -->
						<div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
							<div class="contact_info_image"><img src="images/contact_3.png" alt=""></div>
							<div class="contact_info_content">
								<div class="contact_info_title">Alamat</div>
								<div class="contact_info_text">
									Jl.Taman Permata No.18, Ruko Villa Permata Blok C1 No.11, Lippo Village,
									Binong, Curug, Tangerang, Banten 15810, Indonesia
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Contact Form -->

	<div class="contact_form">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="contact_form_container">
						<div class="contact_form_title">Hubungi Kami</div>

						<form action="{{ url('/frontend/submit-kontak') }}" id="contact_form" method="post">
							{{ csrf_field() }}
							<div class="contact_form_inputs d-flex flex-md-row flex-column justify-content-between align-items-between">
								<input type="text" id="contact_form_name" class="contact_form_name input_field" placeholder="Nama" required="required" data-error="Isikan Nama Anda." name="nama">
								<input type="text" id="contact_form_email" class="contact_form_email input_field" placeholder="email" required="required" data-error="Isikan Email Anda." name="email">
								<input type="text" id="contact_form_phone" class="contact_form_phone input_field" placeholder="Telepon" name="no_handphone">
							</div>
							<div class="contact_form_text">
								<textarea id="contact_form_message" class="text_field contact_form_message" name="messages" rows="4" placeholder="Pesan" required="required" data-error="Tuliskan Pesan Anda."></textarea>
							</div>
							<div class="contact_form_button">
								<button type="submit" class="button contact_submit_button">Kirim Pesan</button>
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
		<div class="panel"></div>
	</div>

	<!-- Map -->

	<div class="contact_map">
		<div id="google_map" class="google_map">
			<div class="map_container">
				<div id="map"></div>
			</div>
		</div>
	</div>

	<!-- Newsletter 

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
						<div class="newsletter_title_container">
							<div class="newsletter_icon"><img src="images/send.png" alt=""></div>
							<div class="newsletter_title">Sign up for Newsletter</div>
							<div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
						</div>
						<div class="newsletter_content clearfix">
							<form action="#" class="newsletter_form">
								<input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
								<button class="newsletter_button">Subscribe</button>
							</form>
							<div class="newsletter_unsubscribe_link"><a href="#">unsubscribe</a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div> -->

	<!-- Footer -->

	@include('frontend.include.footerbar')
	
</div>

@include('frontend.include.footer')

<script>
      function initMap() {
        var uluru = {lat: -6.2243833, lng: 106.590315};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: uluru
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2MHFqOX-v76qma0IAfHk8jaiFhxZ01Pw&callback=initMap"></script>
<script src="{{URL::asset('frontend/js/contact_custom.js')}}"></script>

</body>

</html>