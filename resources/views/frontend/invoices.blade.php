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
                            <a href="index.html"><img src="{{URL::asset('frontend/img/logo/logonew.png')}}" alt="logo"></a><br><br>
                            <hr><br>
                            <div class="container">
                                <div class="col-lg-12 col-md-12">
                                    <div class="checkbox-form mb-sm-40">
                                        <p style="text-transform: uppercase; font-size: 14px;"><b>Invoice To:</b>  <br>
                                            {{ $customer->nama_depan }} {{ $customer->nama_belakang }} <br>
                                            {{ $customer->email }}  <br>
                                             {{ $customer->alamat }},<br> {{ $customer->kota }}, {{ $customer->provinsi }} - {{ $customer->kode_pos }} <br>
                                            {{ $toko->no_handphone }}
                                        </p>
                                    </div><br>
                                    <div class="checkbox-form mb-sm-40">
                                        <p style="text-transform: uppercase; font-size: 14px;"><b>Keterangan:</b>  <br>
                                            Tipe Order : {{ $order->tipe_order }}  <br>
                                            
                                            Asal Pengiriman : {{ $lokasi['nama_lokasi'] }} - {{ $lokasi['kota'] }}  <br>
                                           Jasa Kirim : {{ $order_cek->jasa_kirim }}
                                        </p>
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
                            <h5>Please choose your preferred payment method</h5><br>
                            <hr>
                            <div class="payment-method">
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="headingone">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#BCA" aria-expanded="true" aria-controls="collapseOne">
                                                  BCA
                                                </button>
                                            </h5>
                                        </div>

                                        <div id="BCA" class="collapse show" aria-labelledby="headingone" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>
                                                    PT. Doremi Music Indonesia <br>
                                                    Account Number : 2773388989 <br>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingtwo">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#Mandiri" aria-expanded="true" aria-controls="collapseTwo">
                                          Mandiri
                                        </button>
                                            </h5>
                                        </div>
                                        <div id="Mandiri" class="collapse show" aria-labelledby="headingtwo" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>
                                                    PT. Doremi Music Indonesia <br>
                                                    Account Number : 1020093888888 <br>
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
            <div class="container">
                <div class="row">
                	<div class="col-lg-2 col-md-2">   
                    </div>
                	<div class="col-lg-8 col-md-8">
                        <div class="checkbox-form mb-sm-40">
						  	<h2>Invoice Items DOREMI</h2><br>
                            <h5>{{ $order['no_so'] }}</h5><br>
                            <h5 style="text-transform: uppercase;"> STATUS: {{ $order['status'] }}</h5>
                            <p>
                                Catatan: {{ $order['keterangan'] }} <br>
                                Invoice Date: {{ $order['tanggal_order'] }} <br>
                            </p>
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
			                        @foreach ($order->detail as $produk)
			                        @php
			                        	$produk_doremi = App\Models\TbProduk::where('id', $produk->id_produk)->first();
			                        @endphp
			                        <tbody>
			                            <tr class="cart_item">
			                                <td class="product-name">
			                                    {{ $produk_doremi['judul'] }}
			                                </td>
			                                <td class="product-price">
			                                	Rp. {{ number_format($produk['harga_satuan']) }}
			                                </td>
			                                <td class="product-quantity">
			                                	{{ $produk['qty'] }}
			                                </td>
			                                <td class="product-total">
			                                    <span class="amount">Rp. {{ number_format($produk['total']) }}</span>
			                                </td>
			                            </tr>
			                        </tbody>
			                        @endforeach
			                        <tfoot>
			                            <tr class="product-total">
			                                <th><b>Order Total</b></th>
			                                <td></td>
			                                <td></td>
			                                <td><span class=" total amount">Rp. {{ number_format($order->total_bayar) }}</span>
			                                </td>
                                        </tr>
                                        <tr class="product-total">
                                            <th><i><b>ADDITIONAL</b></i></th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="product_total">
                                            <th> {{ $order_cek->jasa_kirim }} </th>
                                            <td></td>
                                            <td></td>
                                            <td>Rp. {{ number_format($order_cek->tarif_ongkir) }} </td>
                                        </tr>
                                        @php
                                            $grand_total = $order->total_bayar + $order_cek->tarif_ongkir;
                                            {{--  dd($order->total);  --}}
                                        @endphp
                                        <tr class="order-total">
                                            <th> GRAND TOTAL </th>
                                            <td></td>
                                            <td></td>
                                            <th>Rp. {{ number_format($grand_total) }} </th>
                                        </tr>    
			                        </tfoot>
			                    </table>
			                </div>
			            </div>
			        </div>
			    </div><br>
                <hr><br>
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