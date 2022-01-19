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
								<li><a href=https://www.facebook.com/DoremiMusikID" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="https://www.youtube.com/channel/UCWbAztZUYS5uHBoXiJZbyeA/" target="_blank"><i class="fab fa-youtube"></i></a></li>
								<li><a href="https://www.instagram.com/doremimusikstore/" target="_blank"><i class="fab fa-instagram"></i></a></li>
							</ul>
						</div>
					</div>
				</div>

				<div class="col-lg-2 offset-lg-2">
					<div class="footer_column">
						<div class="footer_title">Direktori Belanja</div>
						@php
							$quicklink = App\Models\TbMasterKategori::inRandomOrder()
								->limit(6)
								->get();
						@endphp
						<ul class="footer_list">
							@foreach($quicklink as $quicklinks)
								<li><a href="#">{{ $quicklinks->nama_kategori }}</a></li>
							@endforeach
						</ul>
						{{-- <div class="footer_subtitle"></div>
						<ul class="footer_list">
							<li><a href="#">Piano Digital</a></li>
						</ul> --}}
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
							<li><a href="#">Departemen</a></li>
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
								<li><a href="#"><img src="{{URL::asset('frontend/images/logos_1.png')}}" alt=""></a></li>
								<li><a href="#"><img src="{{URL::asset('frontend/images/logos_2.png')}}" alt=""></a></li>
								<li><a href="#"><img src="{{URL::asset('frontend/images/logos_3.png')}}" alt=""></a></li>
								<li><a href="#"><img src="{{URL::asset('frontend/images/logos_4.png')}}" alt=""></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>