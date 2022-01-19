<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('frontend.include.header')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> --}}
    <script type="text/javascript"src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="SB-Mid-client-zcaFyWBOdSeWy_H5"></script>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <meta name="facebook-domain-verification" content="9fqh8b6v5ssc4qkcb6kj5xompibqnt" />
</head>

<body>
    <!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

    <!-- Main Wrapper Start Here -->
    <div class="wrapper white-bg">
        <!-- Main Header Area Start Here -->
        <header>
            
        </header>
        <!-- Main Header Area End Here -->
        <!-- checkout-area start -->
        <div class="checkout-area pb-45 pt-15">
            <div class="container">
                <div class="row">
                	<div class="col-lg-2 col-md-2"></div>
                    <div class="col-lg-4 col-md-4">
                        <div class="checkbox-form mb-sm-40">
                        	<br>
                            <a href="#"><img src="{{URL::asset('frontend/img/logo/logonew.png')}}" alt="logo"></a><br><br>
                            <div class="container">
                                <div class="col-lg-12 col-md-12">
                                    @if (count($order_doremi->detail) != null)
                                    <h5>INVOICE : #{{ $order_doremi->no_invoice }}</h5><br>
                                    @else
                                    <h5>INVOICE : #{{ $order_musika->no_invoice }}</h5><br>
                                    @endif
                                    <div class="checkbox-form mb-sm-40">
                                        <p style="text-transform: uppercase; font-size: 14px;"><b>Invoice To:</b>  <br>
                                            {{ $toko->nama_pemilik }}  <br>
                                            {{ $toko->nama_toko }}  <br>
                                            {{ $toko->alamat }}, {{ $toko->kota }}, {{ $toko->provinsi }} - {{ $toko->kode_pos }} <br>
                                            {{ $toko->no_telepon }} / {{ $toko->no_handphone }}
                                        </p>
                                    </div><br>
                                    <div class="checkbox-form mb-sm-40">
                                        @if (count($order_doremi->detail) != null)
                                        <p style="text-transform: uppercase; font-size: 14px;"><b>Keterangan:</b>  <br>
                                            Payment Term : {{ $order_doremi->payment_terms }}  <br>
                                            Payment Type : {{ $order_doremi->payment_type }}  <br>
                                            Jasa Kirim : {{ $order_doremi->jasa_kirim }}  <br>
                                            Kota Tujuan : {{ $order_doremi->kota_tujuan }}
                                        </p>
                                        @else
                                        <p style="text-transform: uppercase; font-size: 14px;"><b>Keterangan:</b>  <br>
                                            Payment Term : {{ $order_musika->payment_terms }}  <br>
                                            Payment Type : {{ $order_musika->payment_type }}  <br>
                                            Jasa Kirim : {{ $order_musika->jasa_kirim }}  <br>
                                            Kota Tujuan : {{ $order_musika->kota_tujuan }}
                                        </p>
                                        @endif
                                    </div>
                                </div>
                                <br><hr><br>
                                <div class="col-lg-12 col-md-12">
                                    <div class="checkbox-form mb-sm-40">
                                        <p style="text-transform: uppercase; font-size: 14px"><b>Pay To:</b>  <br>
                                            PT. Doremi Music Indonesia  <br>
                                            Jl.Taman Permata No.18, Ruko Villa Permata Blok C1 No.11, Lippo Village  <br>
                                            Phone: (021) 5984799 <br>
                                            Email: doremi.ecomm@gmail.com
                                        </p>
                                    </div>
                                </div>
                            </div><br>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="your-order">
                            <h5>Terima kasih telah memilih metode pembayaran!</h5><br>
                            <hr>
                            <p>
                                <b>-</b> Segera lakukan pembayaran dengan melakukan transfer ke No. Rekening dibawah ini, jika sudah melakukan pembayaran, silahkan melakukan konfirmasi bayar melalui link ini <b><a href="{{ url('frontend/konfirmasi') }}">Konfirmasi Bayar</a></b> <br>
                                <b>-</b> Harap simpan bukti / struk pembayaran dengan baik sebagai bukti pembayaran yang sah.
                            </p>
                            <div class="payment-method">
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="headingone">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#BCA" aria-expanded="true" aria-controls="collapseOne">
                                                  DOREMI
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="BCA" class="collapse show" aria-labelledby="headingone" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>
                                                    PT. Doremi Music Indonesia <br>
                                                    Account Number : 2773388989 <br>
                                                    BCA
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingtwo">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#Mandiri" aria-expanded="true" aria-controls="collapseTwo">
                                          MUSIKA
                                        </button>
                                            </h5>
                                        </div>
                                        <div id="Mandiri" class="collapse show" aria-labelledby="headingtwo" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>
                                                    PT. Doremi Music Indonesia <br>
                                                    Account Number : 1020093888888 <br>
                                                    Mandiri
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><br>
                <hr><br>
            </div>
            {{-- <div class="container">
                <div class="row">
                	<div class="col-lg-2 col-md-2"></div>
                    <div class="col-lg-4 col-md-4">
                        <div class="checkbox-form mb-sm-40">
                        	<p style="font-size: 14px;"><b>Invoice To:</b>  <br>
				        		{{ $toko->nama_pemilik }}  <br>
				        		{{ $toko->nama_toko }}  <br>
				        		{{ $toko->alamat }}, {{ $toko->kota }}, {{ $toko->provinsi }} - {{ $toko->kode_pos }} <br>
				        		{{ $toko->no_telepon }} / {{ $toko->no_handphone }}
				        	</p>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="checkbox-form mb-sm-40">
                        	<p style="font-size: 14px"><b>Pay To:</b>  <br>
				        		PT. Doremi Music Indonesia  <br>
				        		Jl.Taman Permata No.18, Ruko Villa Permata Blok C1 No.11, Lippo Village  <br>
				        		Phone: (021) 5984799 <br>
								Email: doremi.ecomm@gmail.com
							</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2"></div>
                </div><br>
                <hr><br>
            </div> --}}
            <div class="container">
                @if(count($order_doremi->detail) != null)
                <div class="row">
                	<div class="col-lg-2 col-md-2">   
                    </div>
                	<div class="col-lg-8 col-md-8">
                        <div class="checkbox-form mb-sm-40">
						  	<h2>Invoice Items {{ $order_doremi['order_to'] }}</h2><br>
                            <h5>{{ $order_doremi['no_so'] }}</h5><br>
                            <h5 style="text-transform: uppercase;"> STATUS: {{ $order_doremi['status'] }}</h5>
                            <p>Catatan: {{ $order_doremi['note'] }} <br>
                            <p>Invoice Date: {{ $order_doremi['tanggal'] }} <br>
                            Due Date:  </p>
							<div class="your-order-table table-responsive">
			                    <table>
			                        <thead>
			                            <tr>
			                                <th class="product-name">Product</th>
			                                <th class="product-price">Price</th>
			                                <th class="product-quantity">Quantity</th>
			                                <th class="product-total">Total</th>
			                            </tr>
			                        </thead>
			                        @foreach ($order_doremi->detail as $doremi)
			                        @php
			                        	$produk_doremi = App\Models\TbProduk::where('id', $doremi->id_produk)->first();
			                        @endphp
			                        <tbody>
			                            <tr class="cart_item">
			                                <td class="product-name">
			                                    {{ $produk_doremi['judul'] }}
			                                </td>
			                                <td class="product-price">
			                                	Rp. {{ number_format($doremi['harga_satuan']) }}
			                                </td>
			                                <td class="product-quantity">
			                                	{{ $doremi['qty'] }}
			                                </td>
			                                <td class="product-total">
			                                    <span class="amount">Rp. {{ number_format($doremi['jumlah_total']) }}</span>
			                                </td>
			                            </tr>
			                        </tbody>
			                        @endforeach
			                        <tfoot>
			                            <tr class="order-total">
			                                <th>Order Total</th>
			                                <td></td>
			                                <td></td>
			                                <td><span class=" total amount">Rp. {{ number_format($order_doremi->total_bayar) }}</span>
			                                </td>
			                            </tr>
			                        </tfoot>
			                    </table>
			                </div>
			            </div>
			        </div>
			    </div><br>
                <hr><br>
                @endif
                {{-- @if(count($order_musika->detail) != null)
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="checkbox-form mb-sm-40">
                            <h2>Invoice Items MUSIKA</h2><br>
                            <h5>{{ $order_musika['no_so'] }}</h5><br>
                            <h5 style="text-transform: uppercase;"> STATUS: {{ $order_musika['status'] }}</h5>
                            <p>Catatan: {{ $order_musika['note'] }} <br>
                            <p>Invoice Date: {{ $order_musika['tanggal'] }} <br>
                            Due Date:  </p>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    @foreach ($order_musika->detail as $musika)
                                    @php
                                        $produk_musika = App\Models\TbProduk::where('id', $musika->id_produk)->first();
                                    @endphp
                                    <tbody>
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                {{ $produk_musika['judul'] }}
                                            </td>
                                            <td class="product-price">
                                                Rp. {{ number_format($musika['harga_satuan']) }}
                                            </td>
                                            <td class="product-quantity">
                                                {{ $musika['qty'] }}
                                            </td>
                                            <td class="product-total">
                                                <span class="amount">Rp. {{ number_format($musika['jumlah_total']) }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                    <tfoot>
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td></td>
                                            <td></td>
                                            <td><span class=" total amount">Rp. {{ number_format($order_musika->total_bayar) }}</span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><br>
                <hr><br>
                @endif --}}
            </div><br>
        </div>
        <!-- checkout-area end -->
        <!-- Footer Area Start Here -->
        <!-- Footer Area End Here -->

        {{-- js --}}
        <!-- Bootstrap popper js -->
        <script src="{{URL::asset('frontend/js/popper.min.js')}}"></script>
        <!-- Bootstrap js -->
        <script src="{{URL::asset('frontend/js/bootstrap.min.js')}}"></script>
        <!-- Plugin js -->
        <script src="{{URL::asset('frontend/js/plugins.js')}}"></script>
        
    </div>
</body>

</html>