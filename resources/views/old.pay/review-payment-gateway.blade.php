<!doctype html>
<html lang="en">
	<head>
	    <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <link rel="icon" href="{{URL::asset('frontend/images/fav.png')}}" type="image/png" sizes="16x16">
	    <link href="{{URL::asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">

	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	    <link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/styles/review.css')}}">

	    <title>Review Pesanan | Doremi Music Indonesia</title>

	    <meta name="csrf-token" content="{{ csrf_token() }}">
	    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> --}}
	    <script type="text/javascript"
	            src="https://app.sandbox.midtrans.com/snap/snap.js"
	            data-client-key="SB-Mid-client-zcaFyWBOdSeWy_H5"></script>
	    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  	</head>

  	<body>
  		<nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
	        <a href="index.html" class="navbar-brand" href="/" style="padding-left: 40px;">DOREMI</a>
	        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	        </button>
	        <div class="collapse navbar-collapse" id="navbarSupportedContent">
	            <ul class="navbar-nav mr-auto">
	              <li class="nav-item active">
	                <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
	              </li>
	            </ul>
	           <!-- <form class="form-inline my-2 my-lg-0">
					<div class="progress">
		        		<div class="one danger-color">
		        		</div>
		        		<div class="two danger-color">	
		        		</div>
		        		<div class="three no-color">
		        		</div>
		  				<div class="progress-bar progress-bar-danger" style="width: 25%">	
		  				</div>
					</div>
	            </form> --> 	
	        </div>
	    </nav>

	    <div class="container" style="margin-top: 2px;">
	    		<div class="row">
		    		<div class="col-2"></div>
			    		<div class="col-8 row justify-content-center">
			    			<div class="alert alert-primary" role="alert" style="width: 30rem;" id="pesan_konfirmasi">
	 						Konfirmasi detail pesanan Anda sebelum proses pemesanan dilanjutkan. 
							</div>
							<div style="display: none;" class="alert alert-success" role="alert" style="width: 30rem;" id="pesan_pending">
							</div>
							<div style="display: none;" class="alert alert-danger" role="alert" style="width: 30rem;" id="pesan_error">
							</div>
			     			<div class="card bg-light mb-6" style="width: 30rem;">
								<h5><div class="card-header"><center>Total Transaksi</center></div></h5>
									<div class="card-body">
										<center><h6 class="card-title">Total Yang Harus Dibayarkan</h6>
									    <center><h3 class="card-title">Rp. {{ number_format($myArr['total']) }}</h3>
									    <p class="card-text"><a href="#" data-toggle="modal" data-target="#transaksi">Lihat Detail Transaksi</a></p> </center>
									    <!-- Modal -->
												<div class="modal fade" id="transaksi" tabindex="-1" role="dialog" aria-labelledby="transaksi" aria-hidden="true">
												  <div class="modal-dialog modal-dialog-centered" role="document">
													    <div class="modal-content">
													      <div class="modal-header">
													        <h5 class="modal-title" id="transaksi">Detail Transaksi</h5>
													        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
													        <span aria-hidden="true">&times;</span>
													        </button>
													      </div>
													      <div class="modal-body">
												        	<ul class="list-group mb-3">
													            <li class="list-group-item d-flex justify-content-between lh-condensed">
													              <div>
													                <h6 class="my-0">Total Pemesanan</h6>
													                {{-- <small class="text-muted">Deskripsi</small> --}}
													              </div>
													              <span class="text-muted">Rp. {{ Cart::instance('default')->subtotal() }}</span>
													            </li>
													            <li class="list-group-item d-flex justify-content-between lh-condensed">
													            @php
													            	$explode_jenis = explode("_", $myArr['jenis_kirim']);
													            	$kota = explode("_", $myArr['id_kota']);
													            	$provinsi = explode("_", $myArr['id_provinsi']);
													            @endphp
													              <div>
													                <h6 class="my-0">Biaya Pengiriman</h6>
													                <small class="text-muted">{{ strtoupper($myArr['nickname_jasa_kirim']) }} - {{ $explode_jenis[0] }}</small>
													              </div>
													              <span class="text-muted">Rp. {{ number_format($myArr['tarif_ongkir']) }}</span>
													            </li>
													            <li class="list-group-item d-flex justify-content-between bg-light">
													              <div class="text-primary">
													                <h6 class="my-0">Kode Kupon</h6>
													                <small>{{ $myArr['kode_kupon'] }}</small>
													              </div>
													              <span class="text-primary">Rp. {{ number_format($myArr['nominal_kupon']) }}</span>
													            </li>
													            <li class="list-group-item d-flex justify-content-between lh-condensed">
													              <div>
													                  <h6 class="my-0">Total Transaksi</h6>
													                  {{-- <small class="text-muted">Deskripsi</small> --}}
													              </div>
													                  <span class="text-muted"><strong>Rp. {{ number_format($myArr['total']) }}</strong></span>
													            </li>
													        </ul>
											    		</div>
												    </div>
												  </div>
												</div>
									</div>
							</div>
			    		</div>
					<div class="col-2"> </div>
  				</div>
  				<div class="row" style="margin-top: 10px;">
		    		<div class="col-2"></div>
			    		<div class="col-8 row justify-content-center">
			     			<div class="card bg-light mb-6" style="width: 30rem;">
								<h5><div class="card-header">Alamat Pengiriman</div></h5>
									<div class="card-body">
										@php
											$kota_lagi = explode("_", $shipping['id_kota_ship']);
											$provinsi_lagi = explode("_", $shipping['id_provinsi_ship']);
										@endphp
										@if($shipping['tipe_alamats'] == "Shipping Address")
										    <p class="card-text"> <b>Nama :</b> {{ $shipping['nama_depan_ship'] }} {{ $shipping['nama_belakang_ship'] }}</p>
										    <p class="card-text"> <b>Alamat :</b> {{ $shipping['alamat_ship'] }}, {{ $kota_lagi[1] }}, {{ $provinsi_lagi[1] }} </p>
										    <p class="card-text"> <b>Kode Pos :</b> {{ $shipping['kode_pos_ship'] }}</p>
										@else
											<p class="card-text"> <b>Nama :</b> {{ $myArr['nama_depan'] }} {{ $myArr['nama_belakang'] }}</p>
										    <p class="card-text"> <b>Alamat :</b> {{ $myArr['alamat'] }}, {{ $kota[1] }}, {{ $provinsi[1] }} </p>
										    <p class="card-text"> <b>Kode Pos :</b> {{ $myArr['kode_pos'] }}</p>
										@endif

									    <button class="subscribe btn btn-primary btn-block" id="pay-button" class="btn btn-primary btn-sm"> BAYAR  </button>
									    <input type="hidden" id="nama_depan" value="{{ $myArr['nama_depan'] }}">
									    <input type="hidden" id="nama_belakang" value="{{ $myArr['nama_belakang'] }}">
									    <input type="hidden" id="email" value="{{ $myArr['email'] }}">
									    <input type="hidden" id="phone" value="{{ $myArr['phone'] }}">
									    <input type="hidden" id="alamat" value="{{ $myArr['alamat'] }}">
									    <input type="hidden" id="provinsi" value="{{ $myArr['id_provinsi'] }}">
									    <input type="hidden" id="kota" value="{{ $myArr['id_kota'] }}">
									    <input type="hidden" id="kode_pos" value="{{ $myArr['kode_pos'] }}">
									    <input type="hidden" id="metode_kirim" value="{{ $myArr['metode_kirim'] }}">
									    <input type="hidden" id="lokasi_kirim" value="{{ $myArr['id_kota_lokasi_kirim'] }}">
									    <input type="hidden" id="jasa_kirim" value="{{ $myArr['nickname_jasa_kirim'] }}">
									    <input type="hidden" id="jenis_kirim" value="{{ $myArr['jenis_kirim'] }}">
									    <input type="hidden" id="value_tarif_jasa" value="{{ $myArr['tarif_ongkir'] }}">
									    <input type="hidden" id="value_nominal_kupon" value="{{ $myArr['nominal_kupon'] }}">
									    <input type="hidden" id="id_kupon" value="{{ $myArr['id_kupon'] }}">
									    <input type="hidden" id="kode_kupon" value="{{ $myArr['kode_kupon'] }}">
									    <input type="hidden" id="biaya_layanan" value="{{ $biaya_layanan }}">
									    <input type="hidden" id="nama_depan_ship" value="{{ $shipping['nama_depan_ship'] }}">
									    <input type="hidden" id="nama_belakang_ship" value="{{ $shipping['nama_belakang_ship'] }}">
									    <input type="hidden" id="email_ship" value="{{ $shipping['email_ship'] }}">
									    <input type="hidden" id="phone_ship" value="{{ $shipping['phone_ship'] }}">
									    <input type="hidden" id="alamat_ship" value="{{ $shipping['alamat_ship'] }}">
									    <input type="hidden" id="provinsi_ship" value="{{ $shipping['id_provinsi_ship'] }}">
									    <input type="hidden" id="kota_ship" value="{{ $shipping['id_kota_ship'] }}">
									    <input type="hidden" id="kode_pos_ship" value="{{ $shipping['kode_pos_ship'] }}">
									    <input type="hidden" id="tipe_alamats" value="{{ $shipping['tipe_alamats'] }}">
		    <script type="text/javascript">
		      	document.getElementById('pay-button').onclick = function(){
		      	var nama_depan = document.getElementById("nama_depan").value;
		      	var nama_belakang = document.getElementById("nama_belakang").value;
		        var email = document.getElementById("email").value;
		        var phone = document.getElementById("phone").value;
		        var alamat = document.getElementById("alamat").value;
		        var provinsi = document.getElementById("provinsi").value;
		        var kota = document.getElementById("kota").value;
		        var kode_pos = document.getElementById("kode_pos").value;

		        var metode_kirim = document.getElementById("metode_kirim").value;
		        var lokasi_kirim = document.getElementById("lokasi_kirim").value;
		        var jasa_kirim = document.getElementById("jasa_kirim").value;
		        var jenis_kirim = document.getElementById("jenis_kirim").value;

		        var value_tarif_jasa = document.getElementById("value_tarif_jasa").value;
		        var value_nominal_kupon = document.getElementById("value_nominal_kupon").value;
		        var id_kupon = document.getElementById("id_kupon").value;
		        var kode_kupon = document.getElementById("kode_kupon").value;
		        var biaya_layanan = document.getElementById("biaya_layanan").value;

		        var tipe_alamats = document.getElementById("tipe_alamats").value;
		        var nama_depan_ship = document.getElementById("nama_depan_ship").value;
		      	var nama_belakang_ship = document.getElementById("nama_belakang_ship").value;
		        var email_ship = document.getElementById("email_ship").value;
		        var phone_ship = document.getElementById("phone_ship").value;
		        var alamat_ship = document.getElementById("alamat_ship").value;
		        var provinsi_ship = document.getElementById("provinsi_ship").value;
		        var kota_ship = document.getElementById("kota_ship").value;
		        var kode_pos_ship = document.getElementById("kode_pos_ship").value;
		      	// alert(biaya_layanan);
		        // SnapToken acquired from previous step
		        snap.pay('<?=$snap_token?>', {
		          // Optional
		          onSuccess: function(result){
		            /* You may add your own js here, this is just example */
		            {{-- document.getElementById("test").innerHTML = JSON.stringify(result, null, 2); --}}
		            document.getElementById("pay-button").style.display = "none";
		            var order_id = result['order_id'];
					var amount = result['gross_amount'];
					var transaction_time = result['transaction_time'];
					var payment_type = result['payment_type'];
					
					$.ajaxSetup({
	                  headers: {
	                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	                    }
	                });

	                $.ajax({
		                    type: "POST",
	                      	url: '{{ url("/frontend/api/submit-order") }}',
		                    data: {
		                    
		                      'nama_depan_ship': nama_depan_ship,
		                      'nama_belakang_ship': nama_belakang_ship,
		                      'email_ship': email_ship,
		                      'phone_ship': phone_ship,
		                      'alamat_ship': alamat_ship,
		                      'provinsi_ship': provinsi_ship,
		                      'kota_ship': kota_ship,
		                      'kode_pos_ship': kode_pos_ship,
		                      'tipe_alamats': tipe_alamats,
		                    
		                      'nama_depan': nama_depan,
		                      'nama_belakang': nama_belakang,
		                      'email': email,
		                      'phone': phone,
		                      'alamat': alamat,
		                      'provinsi': provinsi,
		                      'kota': kota,
		                      'kode_pos': kode_pos,

		                      'metode_kirim': metode_kirim,
		                      'lokasi_kirim': lokasi_kirim,
		                      'jasa_kirim': jasa_kirim,
		                      'jenis_kirim': jenis_kirim,

		                      'value_tarif_jasa': value_tarif_jasa,
		                      'value_nominal_kupon': value_nominal_kupon,
		                      'id_kupon': id_kupon,
		                      'kode_kupon': kode_kupon,

		                      'order_id': order_id,
		                      'amount': amount,
		                      'transaction_time': transaction_time,
		                      'payment_type': payment_type,

		                      'keterangan': result,
		                      'biaya_layanan': biaya_layanan,
		                    },
	                        success:function(data) {
	                        	// alert(data);
	                        	window.location.href = '{{ url('/frontend/thanks') }}' + '?order_id=' + order_id;
	                        }
	                });
		          },
		          // Optional
		          onPending: function(result){
		            /* You may add your own js here, this is just example */
		            alert('Proses di pending!');
		          },
		          // Optional
		          onError: function(result){
		            /* You may add your own js here, this is just example */
		            alert('Proses gagal!');
		          }
		        });
		      };
		    </script>
									</div>
							</div>
			    		</div>
					<div class="col-2"></div>	   
  				</div>

  			<footer class="my-5 pt-5 text-muted text-center text-small">
				<p class="mb-1"> &nbsp; </p>
			</footer>
		</div>



	 <!-- Optional JavaScript -->
    	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  	</body>