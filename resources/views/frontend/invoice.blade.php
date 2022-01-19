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
                            @if($order_doremi)
                            <a href="#"><img src="{{URL::asset('frontend/img/logo/logonew.png')}}" alt="logo"></a><br><br>
                            @else
                            <a href="#"><img src="{{URL::asset('frontend/img/logo/Musika1.jpg')}}" alt="logo"></a><br><br>
                            @endif
                            <div class="container">
                                <div class="col-lg-12 col-md-12">
                                    @if ($order_doremi != null)
                                    <h5>INVOICE : #{{ $order_doremi->no_invoice }}</h5><br>
                                    @else
                                    <h5>INVOICE : #{{ $order_musika->no_invoice }}</h5><br>
                                    @endif
                                    @if($type == 's')
                                    <div class="checkbox-form mb-sm-40">
                                        <p style="text-transform: uppercase; font-size: 14px;"><b>Invoice To:</b>  <br>
					                        {{ $toko->nama_sales }} <br>
                                            {{ $toko->nama_pemilik }}  <br>
                                            {{ $toko->nama_toko }}  <br>
                                           {{ $toko->alamat }} {{-- , {{ $toko->kota }}, {{ $toko->provinsi }} - {{ $toko->kode_pos }} <br> --}}
                                            {{ $toko->no_telepon }} / {{ $toko->no_handphone }}
                                        </p>
                                    </div><br>
                                    <div class="checkbox-form mb-sm-40">
                                        @if($order_doremi != null)
                                        <p style="text-transform: uppercase; font-size: 14px;"><b>Keterangan:</b>  <br>
                                            Payment Term : {{ $order_doremi->payment_terms }}  <br>
                                            {{-- Payment Type : {{ $order_doremi->payment_type }}  <br> --}}
                                            Jasa Kirim : {{ $order_doremi->jasa_kirim }}  <br>
                                            Kota Tujuan : {{ $order_doremi->kota_tujuan }}
                                        </p>
                                        @else
                                        <p style="text-transform: uppercase; font-size: 14px;"><b>Keterangan:</b>  <br>
                                            Payment Term : {{ $order_musika->payment_terms }}  <br>
                                            {{-- Payment Type : {{ $order_musika->payment_type }}  <br> --}}
                                            Jasa Kirim : {{ $order_musika->jasa_kirim }}  <br>
                                            Kota Tujuan : {{ $order_musika->kota_tujuan }}
                                        </p>
                                        @endif
                                    </div>
                                    @else
                                    <div class="checkbox-form mb-sm-40">
                                        <p style="text-transform: uppercase; font-size: 14px;"><b>Invoice To:</b>  <br>
					    {{ $order_doremi->nama_sales }} <br>
                                            {{ $order_doremi->nama_customer }}  <br>
                                            {{ $order_doremi->email_customer }}  <br>
                                           {{ $order_doremi->alamat_customer }} {{-- , {{ $toko->kota }}, {{ $toko->provinsi }} - {{ $toko->kode_pos }} <br> --}}
                                            {{ $order_doremi->phone_customer }}
                                        </p>
                                    </div><br>
                                    @endif
                                </div>
                                {{-- <br><hr><br>
                                <div class="col-lg-12 col-md-12">
                                    <div class="checkbox-form mb-sm-40">
                                        <p style="text-transform: uppercase; font-size: 14px"><b>Pay To:</b>  <br>
                                            PT. Doremi Music Indonesia  <br>
                                            Jl.Taman Permata No.18, Ruko Villa Permata Blok C1 No.11, Lippo Village  <br>
                                            Phone: (021) 5984799 <br>
                                            Email: doremi.ecomm@gmail.com
                                        </p>
                                    </div>
                                </div> --}}
                            </div><br>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="your-order">
                            <h5>Terima kasih telah berbelanja!</h5><br>
                            <hr>
                            <div class="payment-method">
                                {{-- <div id="accordion">
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
                                                    PT Doremi Music Indonesia <br>
                                                    Account Number : 2773388989
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
                                                    PT Doremi Music Indonesia <br>
                                                    Account Number : 1020093888888
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                                <p>
                                    <b>-</b> Pesanan anda sedang kami verifikasi, pantau selalu status pesanan kamu di link ini <a href="{{ url('frontend/account') }}" target="_blank"><b>MyAccount</b></a> atau bisa klik "My Account" di bagian atas navigasi web ini. <br>
                                    <b>-</b> Jika status pesanan anda sudah berubah menjadi "Proses", silahkan lakukan pembayaran dengan metode yang kami sediakan.
                                </p>
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
				{{ $toko->nama_sales }} <br>
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
                @php
                //  dd(count($order_musika));   
                @endphp
                @if(count($order_doremi) > 0)
                <div class="row">
                    <div class="col-lg-2 col-md-2">   
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="checkbox-form mb-sm-40">
                            <h2>Orders DOREMI</h2><br>
                            <h5>
                                @if($type == 's')
                                    No. Invoice: {{ $order_doremi[0]->no_invoice }}<br>
                                    No. SO: {{ $order_doremi[0]->no_so }}
                                @else
                                    No. SO: {{ $order_doremi[0]->no_order }}
                                @endif
                            </h5><br>
                            <h5 style="text-transform: uppercase;"> STATUS: {{ $order_doremi[0]->status }}</h5>
                            @if($type == 's')
                                <p>Catatan: {{ $order_doremi[0]->note }} <br>
                                <p>Invoice Date: {{ $order_doremi[0]->tanggal }} <br>
                            @else
                                {{-- <p>Catatan: {{ $order_doremi['keterangan'] }} <br>
                                <p>Invoice Date: {{ $order_doremi['tanggal_order'] }} <br> --}}
                            @endif
                            
                            Due Date:  </p>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Produk</th>
                                            <th class="product-price">Harga</th>
                                            <th class="product-quantity">Qty</th>
                                            <th class="product-quantity">Diskon</th>
                                            <th class="product-quantity">Catatan</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    @foreach ($order_doremi as $doremi)
                                    @php
                                        // $produk_doremi = App\Models\TbProduk::where('id_customer',$doremi->id_produk)->first();
                                        $produk_doremi = \DB::select("SELECT judul FROM tb_produks WHERE id='$doremi->id_produk' ");
					// dd($produk_doremi);
                                    @endphp
                                    <tbody>
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                {{ $produk_doremi[0]->judul }}
                                            </td>
                                            <td class="product-price">
                                                Rp. {{ number_format($doremi->harga_satuan) }}
                                            </td>
                                            <td class="product-quantity">
                                                {{ $doremi->qty }}
                                            </td>
                                            <td class="product-quantity">
                                            @if($type == 's')
                                                {{ $doremi->diskon_1 }} %
                                                @if(!empty($doremi->diskon_2))
                                                    + {{ $doremi->diskon_2 }} %
                                                @endif
                                                @if(!empty($doremi->diskon_3))
                                                    + {{ $doremi->diskon_3 }} %
                                                @endif
                                            @else
                                                {{ $doremi->diskon }} %
                                            @endif
                                            </td>
                                            <td class="product-quantity">
                                                @if($type == 's')
                                                    {{ $doremi->note }}
                                                @endif
                                            </td>
                                            <td class="product-total">
                                                @if($type == 's')
                                                     <span class="amount">Rp. {{ number_format($doremi->jumlah_total) }}</span>
                                                @else
                                                    <span class="amount">Rp. {{ number_format($doremi->total) }}</span>
                                                @endif
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                    <tfoot>
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td colspan="2" class="text-right"><span class=" total amount">Rp. {{ number_format($order_doremi[0]->total_bayar) }}</span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="your-order">
                                PT. Doremi Music Indonesia <br>
                                BCA: 2773388989 <br>
                                Mandiri: 1020093888888
                            </div>
                        </div>
                    </div>
                </div><br>
                <hr><br>
                @endif
                @if(count($order_musika) > 0)
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                    </div>
                    <div class="col-lg-8 col-md-8">
                        <div class="checkbox-form mb-sm-40">
                            <h2>Orders MUSIKA</h2><br>
                           <h5>
                                No. Invoice: {{ $order_musika[0]->no_invoice }}<br>
                                No. SO: {{ $order_musika[0]->no_so }}
                            </h5><br>
                            <h5 style="text-transform: uppercase;"> STATUS: {{ $order_musika[0]->status }}</h5>
                            <p>Catatan: {{ $order_musika[0]->note }} <br>
                            <p>Invoice Date: {{ $order_musika[0]->tanggal }} <br>
                            Due Date:  </p>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Produk</th>
                                            <th class="product-price">Harga</th>
                                            <th class="product-quantity">Qty</th>
                                            <th class="product-quantity">Diskon</th>
                                            <th class="product-quantity">Catatan</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    @foreach ($order_musika as $musika)
                                    @php
                                        // $produk_musika = App\Models\TbProduk::where('id_customer',$musika->id_produk)->first();
                                        
                                        $produk_musika = \DB::select("SELECT judul FROM tb_produks WHERE id='$musika->id_produk' ");
                                        // dd($produk_musika);
                                    @endphp
                                    <tbody>
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                {{ $produk_musika[0]->judul }}
                                            </td>
                                            <td class="product-price">
                                                Rp. {{ number_format($musika->harga_satuan) }}
                                            </td>
                                            <td class="product-quantity">
                                                {{ $musika->qty }}
                                            </td>
                                            <td class="product-quantity">
                                                {{ $musika->diskon_1 }} %
                                                @if(!empty($musika->diskon_2))
                                                    + {{ $musika->diskon_2 }} %
                                                @endif
                                                @if(!empty($musika->diskon_3))
                                                    + {{ $musika->diskon_3 }} %
                                                @endif
                                                {{-- @if($musika->payment_terms == "cash")
                                                    + 10 %
                                                @endif --}}
                                            </td>
                                            <td class="product-quantity">
                                                {{ $musika->note }}
                                            </td>
                                            <td class="product-total">
                                                <span class="amount">Rp. {{ number_format($musika->jumlah_total) }}</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                    @endforeach
                                    <tfoot>
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td colspan="2" class="text-right"><span class=" total amount">Rp. {{ number_format($order_musika[0]->total_bayar) }}</span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="your-order">
                                PT. Musika Indonesia Jaya <br>
                                BCA: 2777787779
                            </div>
                        </div>
                    </div>
                </div><br>
                <hr><br>
                @endif
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