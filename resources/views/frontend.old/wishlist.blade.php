<!DOCTYPE html>
<html lang="en">
<head>
	<title>Doremi Music Indonesia</title>
	<link rel="icon" href="{{URL::asset('frontend/images/fav.png')}}" type="image/png" sizes="16x16">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Doremi Music Indonesia">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/styles/bootstrap4/bootstrap.min.css')}}">
	<link href="{{URL::asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/styles/cart_styles.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/styles/cart_responsive.css')}}">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
	<meta name="facebook-domain-verification" content="9fqh8b6v5ssc4qkcb6kj5xompibqnt" />
</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	
	@include('frontend.include.navbar')

	<!-- Cart

	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title">Keranjang Belanja</div>
						<div class="cart_items">
							<ul class="cart_list">
								<li class="cart_item clearfix">
									<div class="cart_item_image"><img src="images/shopping_cart.jpg" alt=""></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Nama Barang</div>
											<div class="cart_item_text">MacBook Air 13</div>
										</div>
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Warna</div>
											<div class="cart_item_text"><span style="background-color:#999999;"></span>Silver</div>
										</div>
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Jumlah</div>
											<div class="cart_item_text"><input type="number" style="width: 45px; padding: 1px" value="2"></div>
										</div>
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Harga</div>
											<div class="cart_item_text">RP 100.000</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Total</div>
											<div class="cart_item_text">RP 200.000</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">&nbsp;</div>
											<div class="cart_item_text"><i class="far fa-trash-alt"></i></div>
										</div>
									</div>
								</li>
								<li class="cart_item clearfix">
									<div class="cart_item_image"><img src="images/shopping_cart.jpg" alt=""></div>
									<div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
										<div class="cart_item_name cart_info_col">
											<div class="cart_item_title">Nama Barang</div>
											<div class="cart_item_text">MacBook Air 13</div>
										</div>
										<div class="cart_item_color cart_info_col">
											<div class="cart_item_title">Warna</div>
											<div class="cart_item_text"><span style="background-color:#999999;"></span>Silver</div>
										</div>
										<div class="cart_item_quantity cart_info_col">
											<div class="cart_item_title">Jumlah</div>
											<div class="cart_item_text"><input type="number" style="width: 45px; padding: 1px" value="2"></div>
										</div>
										<div class="cart_item_price cart_info_col">
											<div class="cart_item_title">Harga</div>
											<div class="cart_item_text">RP 100.000</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">Total</div>
											<div class="cart_item_text">RP 200.000</div>
										</div>
										<div class="cart_item_total cart_info_col">
											<div class="cart_item_title">&nbsp;</div>
											<div class="cart_item_text"><i class="far fa-trash-alt"></i></div>
										</div>
									</div>
								</li>
							</ul>
						</div>

						
						<!-- Order Total
						<div class="order_total">
							<div class="order_total_content text-md-right">
								<div class="order_total_title">Total Pembelian</div>
								<div class="order_total_amount">RP 1.400.000</div>
								<div class="order_total_amount">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div>
							</div>
						</div>

						<div class="cart_buttons">
							<button type="button" class="button cart_button_clear">Lanjut Berbelanja</button>
							<button type="button" class="button cart_button_checkout">Bayar</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
-->

<!-- Keranjang Belanja Bootsrap -->
	<div class="cart_section">
		<div class="container">
			<div class="row">
				<div class="col-lg-10 offset-lg-1">
					<div class="cart_container">
						<div class="cart_title"><center>Favorit</center></div>

							@if (session()->has('success_message'))
							<div class="alert alert-primary alert-dismissible fade show" role="alert" id="success-alert">
							  <strong>{{ session()->get('success_message') }}</strong>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>
							@endif

							@if (session()->has('error_message'))
							<div class="alert alert-danger alert-dismissible fade show" role="alert">
							  <strong>{{ session()->get('error_message') }}</strong>
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>
							@endif

								<div class="container mb-6">
	   								<div class="row">
	   									{{-- @php
	   										dd(Cart::content());
	   									@endphp --}}
	         							@if (sizeof(Cart::instance('wishlist')->content()) > 0)
	       								 	<div class="col-sm-6  col-md-12">
	         								    <div class="table-responsive">
	              								  	<table class="table table-striped">
		                   								<thead>
		                     								   <tr>
		                           									 <th scope="col"> </th>
		                            								 <th scope="col">Deskripsi Produk</th>
		                           								 	 {{-- <th scope="col">Quantity</th> --}}
		                           								 	 {{-- <th scope="col"  class="text-right">Warna</th> --}}
		                            								 <th scope="col" class="text-center">Harga</th>
		                            								 {{-- <th scope="col" class="text-center" >Total</th> --}}
		                            								 <th scope="col"></th>

		                        								</tr>
		                    							</thead>
									                    <tbody>
									                    	@foreach (Cart::instance('wishlist')->content() as $item)
									                    	@php
									                    		$produk = App\Models\TbProduk::where('kode_sku', $item->id)->first();
									                    		$stok = App\Models\TbLokasiStokProduk::where('id_produk', $produk->id)->where('id_lokasi', 1)->first();
									                    	@endphp
									                        <tr>
									                            <td><img src="https://dummyimage.com/50x50/55595c/fff" /> </td>
									                            <td>{{ $item->name }}</td>
									                            {{-- <td>
									                            	<input type="hidden" name="rowId[]" value="{{ $item->rowId }}" form="updateQty">
									                            	<input type="hidden" name="id[]" value="{{ $item->id }}" form="updateQty">
									                            	<input type="number" style="width: 45px; padding: 1px" value="{{ $item->qty }}" name="Qty[]" form="updateQty" min="1" max="{{ $stok->jumlah_stok }}" id="jumlah_qty" onchange="myFunction('{{ $item->rowId }}','{{ $stok->jumlah_stok }}')"> --}}
									                            	{{-- <select class="quantity" data-id="{{ $item->rowId }}">
										                                <option {{ $item->qty == 1 ? 'selected' : '' }}>1</option>
										                                <option {{ $item->qty == 2 ? 'selected' : '' }}>2</option>
										                                <option {{ $item->qty == 3 ? 'selected' : '' }}>3</option>
										                                <option {{ $item->qty == 4 ? 'selected' : '' }}>4</option>
										                                <option {{ $item->qty == 5 ? 'selected' : '' }}>5</option>
										                            </select> --}}
									                            {{-- </td> --}}
									                            {{-- <td  class="text-right">
																	<select class="drop">
																	  <option value="Merah">Merah</option>
																	  <option value="Biru">Biru</option>
																	</select>
																</td> --}}
									                            <td class="text-center" style="width: 150px;">Rp. {{ number_format($item->price) }}.00</td>
									                            {{-- <td class="text-center" style="width: 150px;">Rp. {{ number_format($item->subtotal) }}.00</td> --}}
									                            <td class="text-right">
									                            	<form action="{{ url('/frontend/wishlist', [$item->rowId]) }}" method="POST" class="side-by-side">
										                                {!! csrf_field() !!}
										                                <input type="hidden" name="_method" value="DELETE">
										                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Anda yakin menghapus produk ini dari favorit?')"><i class="fa fa-trash"></i> Hapus</button>
										                            </form>
										                            <br>
										                            <form action="{{ url('/frontend/switchToCart', [$item->rowId]) }}" method="POST" class="side-by-side">
										                                {!! csrf_field() !!}
										                                <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Anda yakin menambah produk ini ke keranjang?')"><i class="fa fa-shopping-cart"></i> Tambah ke keranjang</button>
										                            </form>
									                            </td>
									                        </tr>
									                        @endforeach
									                        <tr>
									                            <td></td>
									                            <td></td>
									                            {{-- <td></td> --}}
									                            {{-- <td></td> --}}
									                            <td></td>
									                            <td>
									                            	<form action="{{ url('/frontend/emptyWishlist') }}" method="POST">
													                    {!! csrf_field() !!}
													                    <input type="hidden" name="_method" value="DELETE">
													                    <button type="submit" class="btn btn-danger btn-sm btn-block" onclick="return confirm('Anda yakin mengosongkan favorit?')"><i class="fa fa-trash"></i> Kosongkan Favorit</button>
													                </form>
									                            	{{-- <form action="{{ url('/frontend/cart/update-qty') }}" method="POST" class="side-by-side" id="updateQty">
										                                {!! csrf_field() !!}
										                            	<button type="submit" class="btn btn-default btn-sm btn-block">Update Keranjang</button>
										                            </form> --}}
																</td>
									                          
									                        </tr>
									                        {{-- <tr>
									                            <td></td>
									                            <td></td> --}}
									                            {{-- <td></td> --}}
									                            {{-- <td></td>
									                            <td><strong>Total</strong></td>
									                            <td class="text-right"><strong>Rp. {{ Cart::instance('default')->subtotal() }}</strong></td>
									                            <td></td>
									                        </tr> --}}
									                    </tbody>
									                </table>
	            								</div>
	        								</div>
	        
									        <div class="col mb-2">
									            <div class="row">
									                <div class="col-sm-12  col-md-6">
									                    <a href="{{ url('/frontend/toko/all') }}"><button class="btn btn-block btn-light">Kembali Berbelanja</button></a>
									                </div>
									                <div class="col-sm-12 col-md-6 text-right">
									                    <a href="{{ url('/frontend/cart') }}"><button class="btn btn-block btn-block btn btn-success"><i class="fa fa-shopping-cart"></i> Keranjang</button></a>
									                </div>
									            </div>
									        </div>

								        @else

								        	<h3>Kamu tidak punya produk di favorit!</h3>
							    	        {{-- <a href="{{ url('/frontend/toko/all') }}" class="btn btn-primary btn-lg" style="margin-top: 50px; margin-left: -65px;">Kembali Berbelanja</a> --}}
							    	        <div class="col mb-2">
									            <div class="row">
									                <div class="col-sm-12  col-md-6">
									                    <a href="{{ url('/frontend/toko/all') }}"><button class="btn btn-block btn-light">Kembali Berbelanja</button></a>
									                </div>
									                <div class="col-sm-12 col-md-6 text-right">
									                    <button class="btn btn-block btn-block btn btn-success"><i class="fa fa-shopping-cart"></i> Keranjang</button>
									                </div>
									            </div>
									        </div>

							    	    @endif
							    	</div>
							    </div>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>
	<!-- Footer -->

	@include('frontend.include.footerbar')
	
</div>

<script src="{{URL::asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{URL::asset('frontend/styles/bootstrap4/popper.js')}}"></script>
<script src="{{URL::asset('frontend/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('frontend/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{URL::asset('frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{URL::asset('frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{URL::asset('frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{URL::asset('frontend/plugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{URL::asset('frontend/plugins/easing/easing.js')}}"></script>
<script src="{{URL::asset('frontend/js/cart_custom.js')}}"></script>
<script type="text/javascript"> $('.alert').alert(); </script>

<script type="text/javascript">
            function myFunction(id,stok) {
                $.ajaxSetup({
                headers: {
	                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	                }
	            });

                var jumlah = document.getElementById("jumlah_qty").value;

                if (jumlah == 0) {
                	alert('Quantity tidak boleh kosong!');
                } else {
	                $.ajax({
	                	type: "PATCH",
	                    url: '{{ url("/frontend/cart") }}' + '/' + id,
	                    data: {
		                	'quantity': jumlah,
		                	'stock': stok,
		                },
	                    success:function(data) {
	                        // alert(data);
	                        window.location.href = '{{ url('/frontend/cart') }}';
	                    }
	                });
	            }
            }
</script>

<script type="text/javascript">
	$("#success-alert").fadeTo(15000, 500).slideUp(500, function(){
	    $("#success-alert").slideUp(500);
	});
</script>

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