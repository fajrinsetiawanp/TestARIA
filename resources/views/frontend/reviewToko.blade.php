<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('frontend.include.header')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-zcaFyWBOdSeWy_H5"></script>
    {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> --}}
    <!-- <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script> -->
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
            <!-- Header Bottom Start Here -->
            @include('frontend.include.navbar')
            <!-- Header Bottom End Here -->
        </header>
        <!-- Main Header Area End Here -->
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="checkoutToko">Checkout</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- checkout-area start -->
        <div class="checkout-area pb-45 pt-15">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="well well-lg" style="margin-bottom: 20px">
                            <div class="checkbox-form mb-sm-40">
                                <h3>Billing Details</h3>
                                <form action="{{ url('/frontend/payment-toko') }}" method="post" id="payment-gateway">
                                    {!! csrf_field() !!}
                                    <div class="container">
                                    <div class="row">
                                        <div class="col-md-6">
                                        <input type="hidden" name="rand" value="{{ $rand }}" form="payment-gateway" id="rand">
                                        <input type="hidden" name="doremi" value="{{ htmlspecialchars(json_encode($doremi)) }}" form="payment-gateway" id="doremi">
                                        <input type="hidden" name="musika" value="{{ htmlspecialchars(json_encode($musika)) }}" form="payment-gateway" id="musika">
                                        <input type="input" id="status" name="status" form="payment-gateway" value="Hold" hidden />
                                        <input type="input" id="status" name="status" form="payment-gateway" value="Hold" hidden />
                                        <input type="input" id="payment_term" name="payment_term" form="payment-gateway" value="{{ $keterangan['payment_term'] }}" hidden />
                                        <input type="input" id="jasa_kirim" name="jasa_kirim" form="payment-gateway" value="{{ $keterangan['jasa_kirim'] }}" hidden />
                                        <input type="input" id="kota_tujuan" name="kota_tujuan" form="payment-gateway" value="{{ $keterangan['kota_tujuan'] }}" hidden />
                                        {{-- <input type="input" id="note" name="note" form="payment-gateway" value="{{ $keterangan['note'] }}" hidden /> --}}
                                            <div class="checkout-form-list mb-30">
                                                <label for="payment_term">Payment Terms </label><p style="text-transform: uppercase;" form="payment-gateway">{{ $keterangan['payment_term'] }}</p>
                                            
                                                <label for="jasa_kirim">Jasa Pengiriman </label>
                                                <p  form="payment-gateway">{{ $keterangan['jasa_kirim'] }}</p>

                                                <label for="kota_tujuan">Kota Tujuan </label>
                                                <p  form="payment-gateway">
                                                    {{-- {{ $kota_tujuan->tipe }} {{ $kota_tujuan->nama }} --}}
                                                    {{ $keterangan['kota_tujuan'] }}
                                                </p>
                                            </div><br>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list mb-30">
                                                {{-- <label for="city">Catatan Pengiriman </label>
                                                <p form="payment-gateway"> {{ $keterangan['note'] }} </p> --}}
                                            </div><br>
                                            {{-- <div class="checkout-form-list mb-30">
                                                <label for="city">Metode Pembayaran </label>
                                                <select class="form-control" name="button_bayar" form="payment-gateway">
                                                    <option value="Bank Transfer">Bank Transfer</option>
                                                    <option value="Credit Card">Credit Card</option>
                                                </select>
                                            </div> --}}
                                            <input type="hidden" name="button_bayar" value="-">
                                            <button type="submit" class="btn btn-primary" form="payment-gateway" onclick="return confirm('Anda Yakin Menyelesaikan Transaksi?');"> Proses Pesanan </button>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="checkout-form-list mb-30">
                                                <input type="hidden" name="bayar_ditempat" id="bayar_ditempat" value="Ya">
                                                {{-- <button type="submit" class="btn btn-primary" name="button_bayar" value="Bank Transfer" form="payment-gateway" onclick="return confirm('Anda Yakin Bayar Dengan Metode Bank Transfer?');"> Bank Transfer </button> --}}
                                                {{-- <button type="button" name="button_bayar" value="Credit Card" id="pay-button" class="btn btn-primary"> Credit Card </button> --}}
                                                <script type="text/javascript">
                                                    document.getElementById('pay-button').onclick = function(){
                                                        var doremi = document.getElementById("doremi").value;
                                                        var musika = document.getElementById("musika").value;
                                                        var payment_term = document.getElementById("payment_term").value;
                                                        var jasa_kirim = document.getElementById("jasa_kirim").value;
                                                        var kota_tujuan = document.getElementById("kota_tujuan").value;
                                                        var note = document.getElementById("note").value;
                                                        var button_bayar = document.getElementById("pay-button").value;
                                                        var rand = document.getElementById("rand").value;
                                                        var status = document.getElementById("status").value;
							                            var sales = document.getElementById("nama_sales").value;
                                                        var bayar_ditempat = document.getElementById("bayar_ditempat").value;
                                                        // alert(rand);
                                                        snap.pay('<?=$snap_token?>', {
                                                      // Optional
                                                      onSuccess: function(result){
                                                        /* You may add your own js here, this is just example */
                                                        $.ajaxSetup({
                                                          headers: {
                                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                            }
                                                        });

                                                        $.ajax({
                                                            type: "POST",
                                                            url: '{{ url("/frontend/payment-toko") }}',
                                                            data: {
                                                                'doremi': doremi,
                                                                'musika': musika,
                                                                'payment_term': payment_term,
                                                                'jasa_kirim': jasa_kirim,
                                                                'kota_tujuan': kota_tujuan,
                                                                'note': note,
                                                                'button_bayar': button_bayar,
                                                                'rand': rand,
                                                                'status': status,
                                                                'bayar_ditempat': bayar_ditempat,
								                                'sales': nama_sales,

                                                            },
                                                            success:function(data) {
                                                                // alert(data);
                                                                window.location.href = '{{ url('/frontend/invoice') }}' + '/' + data;
                                                            }
                                                        });
                                                      },
                                                      // Optional
                                                      onPending: function(result){
                                                        /* You may add your own js here, this is just example */
                                                      },
                                                      // Optional
                                                      onError: function(result){
                                                        /* You may add your own js here, this is just example */
                                                      }
                                                    });
                                                  };
                                                </script>
                                                @if(!empty($response))
                                                  {{-- <button type="button" class="btn btn-primary" id="cicilan"> Cicilan </button> --}}
                                                @endif
                                            </div><br>
                                        </div>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div><br>
                    {{-- tabel items --}}
                    @if(!empty($doremi))
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="your-order"  style="margin-bottom: 20px;">
                                <h3>Orders Doremi</h3>
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name">Produk</th>
                                                <th class="product-price">Harga</th>
                                                <th class="product-quantity">Quantity</th>
                                                <th class="product-discount">Diskon</th>
                                                <th class="product-discount">Catatan</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_price = 0;
                                                $total_quantity = 0;
                                                $total_diskon = 0;
                                                $total_price_diskon = 0;
                                            @endphp
                                            @foreach ($doremi as $v)
                                            @php
                                                $total_price += $v->price;
                                                $total_quantity += $v->quantity;
                                                $total_diskon += $v->diskon;
                                                $total_price_diskon += $v->total;
                                            @endphp
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{ $v->name }}
                                                </td>
                                                <td class="product-price">
                                                    Rp. {{ number_format($v->price) }}
                                                </td>
                                                <td class="product-quantity">
                                                    {{ $v->quantity }}
                                                </td>
                                                <td class="product-discount">
                                                    {{ $v->diskon }} %
                                                </td>
                                                <td class="product-discount">
                                                    {!! $v->note !!}
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">Rp. {{ number_format($v->total) }}</span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th></th>
                                                <td></td>
                                                {{-- <td></td> --}}
                                                <td><span class="qty"> </span></td>
                                                <td></td>
                                                {{-- <td><span class="amount">Rp. {{ $total }}</span></td> --}}
                                            </tr>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td>
                                                    {{-- Rp. {{ number_format($total_price) }} --}}
                                                </td>
                                                <td>
                                                    {{-- {{ $total_quantity }} --}}
                                                </td>
                                                <td>
                                                    {{-- {{ $total_diskon }} % --}}
                                                </td>
                                                <td colspan="2" class="text-right"><span class=" total amount">Rp. {{ number_format($total_price_diskon) }}</span>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @if(!empty($musika))
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="your-order">
                                <h3>Orders Musika</h3>
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name">Produk</th>
                                                <th class="product-price">Harga</th>
                                                <th class="product-quantity">Quantity</th>
                                                <th class="product-discount">Diskon</th>
                                                <th class="product-discount">Catatan</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $total_price = 0;
                                                $total_quantity = 0;
                                                $total_diskon = 0;
                                                $total_price_diskon = 0;
                                            @endphp
                                            @foreach ($musika as $v)
                                            @php
                                                $total_price += $v->price;
                                                $total_quantity += $v->quantity;

                                                if($v->diskon_cash != 0) {
                                                    $total_diskon += $v->diskon_cash;
                                                }

                                                $total_diskon += $v->diskon;
                                                $total_price_diskon += $v->total;
                                            @endphp
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    {{ $v->name }}
                                                </td>
                                                <td class="product-price">
                                                    Rp. {{ number_format($v->price) }}
                                                </td>
                                                <td class="product-quantity">
                                                    {{ $v->quantity }}
                                                </td>
                                                <td class="product-discount">
                                                    {{ $v->diskon }} %
                                                    @if($v->diskon_cash != 0)
                                                        + 10 % (Cash)
                                                    @endif
                                                </td>
                                                <td class="product-discount">
                                                    {!! $v->note !!}
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">Rp. {{ number_format($v->total) }}</span>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th></th>
                                                <td></td>
                                                {{-- <td></td> --}}
                                                <td><span class="qty"> </span></td>
                                                <td></td>
                                                {{-- <td><span class="amount">Rp. {{ $total }}</span></td> --}}
                                            </tr>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td>
                                                    {{-- Rp. {{ number_format($total_price) }} --}}
                                                </td>
                                                <td>
                                                    {{-- {{ $total_quantity }} --}}
                                                </td>
                                                <td>
                                                    {{-- {{ $total_diskon }} % --}}
                                                </td>
                                                <td><span class=" total amount">Rp. {{ number_format($total_price_diskon) }}</span>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- modal --}}
        <div class="modal fade" id="midtrans" tabindex="-1" role="dialog" aria-labelledby="midtrans" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">BIAYA LAYANAN</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <select class="custom-select d-block w-100 my_dropdown" id="biaya_layanan" name="biaya_layanan" form="payment-gateway">
                        <option></option>
                        {{-- @foreach($biaya_layanan as $key)
                          <option value="{{ $key->id }}">{{ $key->nama }} - {{ $key->biaya }} 
                            @if(!empty($key->biaya_tambahan))
                              + {{ $key->biaya_tambahan }}
                            @endif
                          </option>
                        @endforeach --}}
                      </select>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" form="payment-gateway" class="btn btn-primary" name="button_bayar" value="button_bayar">Bayar</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="kredivo" tabindex="-1" role="dialog" aria-labelledby="kredivo" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Cicilan</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                    @if(!empty($response))
                      <select class="custom-select d-block w-100 my_dropdown" id="paymenttypecicilan" name="paymenttypecicilan" form="payment-gateway">
                        <option disabled selected>Pilih</option>
                        {{-- @foreach($response->payments as $key)
                          <option value="{{ $key->id }}">{{ $key->tenure }} bulan - Rp. {{ number_format($key->monthly_installment) }}.00</option>
                        @endforeach --}}
                      </select>
                    @endif
                    </div>
                    <div class="modal-footer">
                      <button type="submit" form="payment-gateway" class="btn btn-primary" name="button_bayar" value="button_cicilan">Bayar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- checkout-area end -->
        <!-- Footer Area Start Here -->
        @include('frontend.include.footer')
        <!-- Footer Area End Here -->

        {{-- js --}}
        <script>
          $(document).ready(function(){
              $("#bayar").click(function(){
                  document.getElementById("biaya_layanan").required = true;

                  $("#midtrans").modal();
              });
          });
        </script>

        <script>
          $(document).ready(function(){
              $("#cicilan").click(function(){
                  document.getElementById("paymenttypecicilan").required = true;

                  $("#kredivo").modal();
              });
          });
        </script>

        <script type="text/javascript">
          $('#kredivo').on('hidden.bs.modal', function () {
            document.getElementById("paymenttypecicilan").required = false;
          })
        </script>
    </div>
</body>

</html>