<!DOCTYPE html>
<html lang="en">
<head>
	@include('frontend.include.header')

	<link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/styles/shop_styles.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/styles/shop_responsive.css')}}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
	<script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
	<meta name="facebook-domain-verification" content="9fqh8b6v5ssc4qkcb6kj5xompibqnt" />
</head>
<body>

<div class="super_container">
	<!-- Header -->
	
	@include('frontend.include.navbar')
	
	<!-- Home -->

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">
				@if(Request::path() == 'frontend/toko/all')
					Toko
				@else
					{{ $kategori }}
				@endif
			</h2>
		</div>
	</div>

	<!-- Shop -->

	<div class="shop">
		<div class="container">
			<div class="row">
				<div class="col-lg-2">

					<!-- Shop Sidebar -->
				
					<div class="shop_sidebar">
						<!--<div class="card">-->
							<div class="sidebar_section filter_by_section">
								<!--<div class="card-header"> -->
									<div class="sidebar_title">Cari Berdasarkan</div>
							<!--</div>-->
									<!--<div class="sidebar_subtitle">Harga</div>
									<div class="filter_price">
										<div id="slider-range" class="slider_range"></div>
										<p>Dari: </p>
										<p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
									</div>-->
							</div>

									{{-- <div class="sidebar_section">
										<div class="sidebar_subtitle brands_subtitle">Warna</div>	
											<div class="custom-select" style="width:250px;">
											  <select>
											    <option value="0">Biru</option>
											    <option value="1">Merah</option>
											    <option value="2">Natural</option>
											  </select>
											</div>
									</div> --}}

									<div class="sidebar_section">
										<div class="sidebar_subtitle brands_subtitle">Merek</div>	
											<div class="custom-select" style="width:250px;">
											  <select>
											    @foreach($manufaktur as $manufakturs)
											    	<option value="{{ $manufakturs->nama }}">{{ $manufakturs->nama }}</option>
											    @endforeach
											  </select>
											</div>
									</div>

									<div class="sidebar_section">
										<div class="sidebar_subtitle brands_subtitle">Harga</div>	
											<div class="custom-select" style="width:250px;">
											  <select>
											    <option value="0">Harga</option>
											    <option value="1">Terendah</option>
											    <option value="2">Tertinggi</option>
											  </select>
										</div>
									</div>

									<div class="sidebar_section">
										<div class="sidebar_subtitle brands_subtitle"></div>
											<input class="btn btn-primary btn-sm" type="submit" value="Submit" style="margin-left: 70px;">
									</div>
								</div>
							</div>
						<div class="col-lg-10">
							<!-- Shop Content -->
							<div class="shop_content">
								<div class="shop_bar clearfix">
									<div class="shop_product_count">
										@if(count($produk) >= 1 )
											<span>{{ $produk->total() }}</span> Produk ditemukan
										@else
											Produk Tidak di temukan
										@endif
									</div>
									{{-- <div class="shop_sorting">
										<span>Urutkan:</span>
										<ul>
											<li>
												<span class="sorting_text">Harga Tertinggi<i class="fas fa-chevron-down"></span></i>
												<ul>
													<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "original-order" }'>Ulasan</li>
													<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "name" }'>Nama</li>
													<li class="shop_sorting_button" data-isotope-option='{ "sortBy": "price" }'>Harga</li>
												</ul>
											</li>
										</ul>
									</div> --}}
								</div>
							<div class="product_grid">
								<div class="product_grid_border"></div>

								<!-- Product Item -->
								@foreach($produk as $k => $v)
								<div class="product_item">
									<div class="product_border"></div>
									<div class="product_image d-flex flex-column align-items-center justify-content-center">
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
										<div class="product_name"><div><a href="{{ url('/frontend/produk-detail', $v->kode_sku) }}" tabindex="0">
											{{ $v->judul1 }} <br>
											{{ $v->judul2 }}
										</a></div></div>
									</div>
									@if($v->harga->diskon != 0)
										<div class="product_fav favoritku" data-id="{{ $v->kode_sku }}_{{ $v->judul}}_{{ $v->harga_diskon }}"><i class="fas fa-heart"></i></div>
									@else
										<div class="product_fav favoritku" data-id="{{ $v->kode_sku }}_{{ $v->judul}}_{{ $v->harga->harga }}"><i class="fas fa-heart"></i></div>
									@endif
									<ul class="product_marks">
										<li class="product_mark product_discount">-25%</li>
										<li class="product_mark product_new">new</li>
									</ul>
								</div>
								@endforeach

								<!-- Product Item -->
								{{-- <div class="product_item is_new">
									<div class="product_border"></div>
									<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_1.jpg" alt=""></div>
									<div class="product_content">
										<div class="product_price">$225</div>
										<div class="product_name"><div><a href="#" tabindex="0">Astro M2 Black</a></div></div>
									</div>
									<div class="product_fav"><i class="fas fa-heart"></i></div>
									<ul class="product_marks">
										<li class="product_mark product_discount">-25%</li>
										<li class="product_mark product_new">new</li>
									</ul>
								</div> --}}

								<!-- Product Item -->
								{{-- <div class="product_item discount">
									<div class="product_border"></div>
									<div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="images/new_2.jpg" alt=""></div>
									<div class="product_content">
										<div class="product_price">$225</div>
										<div class="product_name"><div><a href="#" tabindex="0">Transcend T.Sonic</a></div></div>
									</div>
									<div class="product_fav"><i class="fas fa-heart"></i></div>
									<ul class="product_marks">
										<li class="product_mark product_discount">-25%</li>
										<li class="product_mark product_new">new</li>
									</ul>
								</div> --}}

							</div>

						<!-- Shop Page Navigation -->
						@if ($produk->lastPage() > 1)
						<div class="shop_page_nav d-flex flex-row">
							@if($produk->currentPage() == 1)
								<div class="page_prev d-flex flex-column align-items-center justify-content-center"><a href="#"><i class="fas fa-chevron-left"></i></a></div>
							@else
								<div class="page_prev d-flex flex-column align-items-center justify-content-center"><a href="{{ $produk->url($produk->currentPage()-1) }}"><i class="fas fa-chevron-left"></i></a></div>
							@endif
							<ul class="page_nav d-flex flex-row">
							@for ($i = 1; $i <= $produk->lastPage(); $i++)
								@if($produk->currentPage() == $i)
									<li class="active"><a href="#">{{ $i }}</a></li>
								@else
									<li><a href="{{ $produk->url($i) }}" >{{ $i }}</a></li>
								@endif
							@endfor
							</ul>
							@if($produk->currentPage() == $produk->lastPage())
								<div class="page_next d-flex flex-column align-items-center justify-content-center"><a href="#"><i class="fas fa-chevron-right"></i></a></div>
							@else
								<div class="page_next d-flex flex-column align-items-center justify-content-center"><a href="{{ $produk->url($produk->currentPage()+1) }}"><i class="fas fa-chevron-right"></i></a></div>
							@endif
						</div>
						@endif

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

<script src="{{URL::asset('frontend/js/shop_custom.js')}}"></script>
<script src="{{URL::asset('frontend/plugins/Isotope/isotope.pkgd.min.js')}}"></script>
<script src="{{URL::asset('frontend/plugins/jquery-ui-1.12.1.custom/jquery-ui.js')}}"></script>
<script src="{{URL::asset('frontend/plugins/parallax-js-master/parallax.min.js')}}"></script>

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

<script type="text/javascript">
	var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
  });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>
<script type="text/javascript">
	var cleave = new Cleave('.input-element', {
    numeral: true,
    numeralThousandsGroupStyle: 'thousand'
});
</script>

</body>

</html>