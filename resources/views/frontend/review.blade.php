<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('frontend.include.header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://code.jquery.com/jquery-2.2.3.min.js" integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo=" crossorigin="anonymous"></script>
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
            <!-- Header Top Start Here -->
            @include('frontend.include.navbar')
            <!-- Mobile Vertical Menu Start End -->
        </header>
        <!-- Main Header Area End Here -->
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="checkout.html">Checkout</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- coupon-area start -->
        <div class="coupon-area pt-45">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="coupon-accordion">
                            <!-- ACCORDION START -->
                            {{-- <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                            <div id="checkout-login" class="coupon-content">
                                <div class="coupon-info">
                                    <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est sit amet ipsum luctus.</p>
                                    <form action="#">
                                        <p class="form-row-first">
                                            <label>Username or email <span class="required">*</span></label>
                                            <input type="text" />
                                        </p>
                                        <p class="form-row-last">
                                            <label>Password  <span class="required">*</span></label>
                                            <input type="text" />
                                        </p>
                                        <p class="form-row">
                                            <input type="submit" value="Login" />
                                            <label>
                                            <input type="checkbox" />
                                             Remember me 
                                        </label>
                                        </p>
                                        <p class="lost-password">
                                            <a href="#">Lost your password?</a>
                                        </p>
                                    </form>
                                </div>
                            </div> --}}
                            <!-- ACCORDION END -->
                            <!-- ACCORDION START -->
                            {{-- <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3> --}}
                            {{-- <div id="checkout_coupon" class="coupon-checkout-content">
                                <div class="coupon-info">
                                    <form action="#">
                                        <p class="checkout-coupon">
                                            <input type="text" class="code" placeholder="Coupon code" />
                                            <input type="submit" value="Apply Coupon" />
                                        </p>
                                    </form>
                                </div>
                            </div> --}}
                            <!-- ACCORDION END -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- coupon-area end -->
        <!-- checkout-area start -->
        <div class="checkout-area pb-45 pt-15">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="checkbox-form mb-sm-40">
                            <h3>Billing Details</h3>
                            <form action="{{ url('/frontend/payment') }}" method="post" id="payment-gateway">
                                {!! csrf_field() !!}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-sm-30">
                                            <input type="hidden" name="rand" value="{{ $rand }}" form="payment-gateway" id="rand">
                                            <input type="hidden" name="user" value="{{ htmlspecialchars(json_encode($user)) }}" form="payment-gateway" id="user">
                                            <input type="hidden" name="items" value="{{ htmlspecialchars(json_encode($items)) }}" form="payment-gateway" id="items">
                                            <input type="hidden" name="keterangan" value="{{ htmlspecialchars(json_encode($keterangan)) }}" form="payment-gateway" id="keterangan">
                                            <label>Nama Depan </label><p form="payment-gateway">{{ $keterangan['nama_depan'] }}</p>
                                            {{-- <input type="text" id="nama_depan" name="nama_depan" form="payment-gateway" value=" {{ $keterangan['nama_depan'] }} " disabled/> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-30">
                                            <label>Nama Belakang </label><p form="payment-gateway">{{ $keterangan['nama_belakang'] }}</p>
                                            {{-- <input type="text" id="nama_belakang" name="nama_belakang" form="payment-gateway" value=" {{ $keterangan['nama_belakang'] }} " disabled/> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-30">
                                            <label>Email </label><p form="payment-gateway">{{ $keterangan['email'] }}</p>
                                            {{-- <input type="email" id="email" name="email" form="payment-gateway" value=" {{ $keterangan['email'] }} " disabled/> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-30">
                                            <label>No Handphone </label><p form="payment-gateway">{{ $keterangan['phone'] }}</p>
                                            {{-- <input type="text" id="phone" name="phone" form="payment-gateway" value=" {{ $keterangan['phone'] }} " disabled/> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            @php
                                                $provinsi = explode('_', $keterangan['provinsi']);
                                                
                                                $kota = explode('_', $keterangan['kota']);
                                            @endphp
                                            <label>Alamat </label><p form="payment-gateway">{{ $keterangan['alamat'] }}, {{ $kota[1] }}, {{ $provinsi[1] }} - {{ $keterangan['kode_pos'] }}</p>
                                            {{-- <textarea class="form-control" type="text" id="alamat" name="alamat" form="payment-gateway" style="resize:none" disabled> {{ $keterangan['alamat'] }} </textarea> --}}<br>
                                        </div> 
                                    </div>
                                    {{-- <div class="col-md-12">
                                        <div class="checkout-form-list create-acc mb-30">
                                            <input id="cbox" type="checkbox" />
                                            <label>Create an account?</label>
                                        </div>
                                        <div id="cbox_info" class="checkout-form-list create-accounts mb-25">
                                            <p class="mb-10">Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                                            <label>Account password  <span class="required">*</span></label>
                                            <input type="password" placeholder="password" />
                                        </div>
                                    </div> --}}
                                </div>        
                                {{-- <div class="different-address">
                                    <div class="ship-different-title">
                                        <h3>
                                            <label for="tipe_alamat">Kirim Ke Alamat Berbeda?</label>
                                            <input id="ship-box" name="tipe_alamat" type="checkbox" onclick="shipping()" role="button"/>
                                        </h3>
                                    </div>
                                <input type="hidden" name="tipe_alamats" id="tipe_alamats" value="" form="payment-gateway">
                                    <div id="ship-box-info">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="checkout-form-list mb-sm-30">
                                                    <label>Nama Depan <span class="required">*</span></label>
                                                    <input class="form-control" type="text" id="nama_depan_ship" name="nama_depan_ship" placeholder="" value="" form="payment-gateway"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-form-list mb-30">
                                                    <label>Nama Belakang <span class="required">*</span></label>
                                                    <input type="text" id="nama_belakang_ship" name="nama_belakang_ship" value="" form="payment-gateway"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-form-list mb-30">
                                                    <label>Email <span class="required">*</span></label>
                                                    <input type="email" id="email_ship" name="email_ship" placeholder="you@example.com" form="payment-gateway"/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-form-list mb-30">
                                                    <label>No Handphone  <span class="required">*</span></label>
                                                    <input type="text" id="phone_ship" name="phone_ship" placeholder="0888889988" form="payment-gateway"/>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-form-list">
                                                    <label>Alamat <span class="required">*</span></label>
                                                    <textarea class="form-control" cols="30" rows="10" type="text" id="alamat_ship" name="alamat_ship" placeholder="Alamat" form="payment-gateway" style="resize:none"> </textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-form-list mb-30">
                                                    <label>Provinsi <span class="required">*</span></label>
                                                    <select class="form-control" id="provinsi_ship" name="provinsi_ship" form="payment-gateway">
                                                      <option selected="true" disabled="disabled">Pilih</option>
                                                      @foreach($provinsi as $k => $v)
                                                        <option value="{{ $k }}_{{ $v }}">{{ $v }}</option>
                                                      @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-form-list mb-30">
                                                    <label for="city">Kota <span class="required">*</span></label>
                                                    <select class="form-control" id="kota_ship" name="kota_ship" form="payment-gateway">
                                                        <option selected="true" disabled="disabled">Pilih</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-form-list mb-30">
                                                    <label for="city">Kode Pos <span class="required">*</span></label>
                                                    <select class="form-control" id="kode_pos_ship" name="kode_pos_ship" form="payment-gateway">
                                                        <option selected="true" disabled="disabled">Pilih</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-notes">
                                        <div class="checkout-form-list">
                                            <label>Order Notes</label>
                                            <textarea id="checkout-mess" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery." form="payment-gateway" style="resize:none"></textarea>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="order-notes">
                                    <div class="checkout-form-list">
                                        <label>Catatan </label><p form="payment-gateway">{{ $keterangan['catatan'] }}</p>
                                        {{-- <textarea id="catatan" name="catatan" cols="30" rows="10" form="payment-gateway" style="resize:none" disabled>{{ $keterangan['catatan'] }}</textarea> --}}
                                    </div><br>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-45">
                                            <label>Metode Kirim </label><p form="payment-gateway">{{ $keterangan['metode_kirim'] }}</p>
                                            {{-- <input type="text" id="metode_kirim" name="metode_kirim" form="payment-gateway" value=" {{ $keterangan['metode_kirim'] }} " disabled/> --}}
                                        </div>
                                    </div>
                                    @if ($keterangan['metode_kirim'] == "SELF PICKUP")
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-45 ">
                                            <label>Lokasi Pengambilan </label><p form="payment-gateway">{{ $keterangan['lokasi_kirim'] }}</p>
                                            {{-- <input type="text" id="lokasi_kirim" name="lokasi_kirim" form="payment-gateway" value=" {{ $keterangan['lokasi_kirim'] }} " disabled/> --}}
                                        </div>
                                    </div>
                                    @else
                                    <?php 
                                        $origin = explode('_', $keterangan['lokasi_kirim']);
                                        $origin_ship = $origin[1]." - ".$origin[2];
                                        //dd($origin_ship);
                                        ?>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list mb-45 ">
                                                <label>Lokasi Kirim </label><p form="payment-gateway">{{ $origin_ship    }}</p>
                                                {{-- <input type="text" id="lokasi_kirim" name="lokasi_kirim" form="payment-gateway" value=" {{ $origin_ship }} " disabled/> --}}
                                            </div>
                                        </div>
                                    @endif
                                    @if ($keterangan['jasakirim'] != null)
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-45">
                                            <label>Jasa Kirim </label><p form="payment-gateway" style="text-transform: uppercase;">{{ $keterangan['jasa_kirim'] }}</p>
                                            {{-- <input type="text" id="jasa_kirim" name="jasa_kirim" form="payment-gateway" value=" {{ $keterangan['jasa_kirim'] }} " disabled/> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-45 ">
                                            <label>Jenis Pengiriman </label><p form="payment-gateway">{{ $keterangan['jenis_kirim'] }}</p>
                                            {{-- <input type="text" id="jenis_kirim" name="jenis_kirim" form="payment-gateway" value=" {{ $keterangan['jenis_kirim'] }} " disabled/> --}}
                                        </div>
                                    </div>
                                    @else
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        {{-- <div class="row">
                            
                        </div> --}}
                        <div class="your-order">
                            <h3>Ringkasan Pemesanan</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Nama Produk</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::content() as $item)
                                        <tr class="cart_item">
                                            <td class="product-name">
                                                {{ $item->name }}
                                            </td>
                                            <td class="product-quantity">
                                                {{ $item->qty }}
                                            </td>
                                            <td class="product-total">
                                                <span class="amount">Rp. {{ number_format($item->subtotal) }}</span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        @php 
                                            $paket_kirim = explode('_', $keterangan['jenis_kirim']);

                                            $origin = number_format($paket_kirim[1]);
                                        @endphp
                                        @php
                                            $money = explode('.', Cart::instance('default')->subtotal());
                                            $total = $money[0];
                                            $a = str_replace(",","",$total);
                                            $b = str_replace(",","",$origin);
                                            $c = $a + $b;
                                            $grand_total = number_format($c);
                                        @endphp
                                        <tr class="cart-subtotal">
                                            <th><b>Total Order</b></th>
                                            <td></td>
                                            <td>
                                                <span class=" total amount">Rp. {{ $total }}</span>
                                            </td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <td><i><u>ADDITIONAL</u></i></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr class="cart-subtotal">
                                            <td>
                                                <p style="text-transform: uppercase" >{{ $keterangan['jasa_kirim']." - ".$paket_kirim[0] }}</p>
                                            </td>
                                            <td></td>
                                            <td>
                                                <span class=" total amount">Rp. {{ $origin }}</span>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Grand Total</th>
                                            <td></td>
                                            <td><span class=" total amount">Rp. {{ $grand_total }}</span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div id="accordion">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" name="bayar_ditempat" id="bayar_ditempat" value="Ya">
                                            <button onclick="myFunction()"> Proses Pesanan </button>
						<p id="pay-button"></p>
                                            
                                            {{--  <button type="button" name="button_bayar" value="Credit Card" id="pay-button" class="btn btn-primary"> Credit Card </button>  --}}
                                            <script type="text/javascript">
						function myFunction() {
                                                document.getElementById('pay-button').innerHTML();
                                                    var doremi = document.getElementById("doremi").value;
                                                    var musika = document.getElementById("musika").value;
						    var nama_sales = document.getElementById("nama_sales").value;
                                                    var payment_term = document.getElementById("payment_term").value;
                                                    var jasa_kirim = document.getElementById("jasa_kirim").value;
                                                    var kota_tujuan = document.getElementById("kota_tujuan").value;
                                                    var note = document.getElementById("note").value;
                                                    var button_bayar = document.getElementById("pay-button").value;
                                                    var rand = document.getElementById("rand").value;
                                                    var status = document.getElementById("status").value;
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
							    'nama_sales' : nama_sales,
                                                            'payment_term': payment_term,
                                                            'jasa_kirim': jasa_kirim,
                                                            'kota_tujuan': kota_tujuan,
                                                            'note': note,
                                                            'button_bayar': button_bayar,
                                                            'rand': rand,
                                                            'status': status,
                                                            'bayar_ditempat': bayar_ditempat,
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
                                            {{--  @if(!empty($response))
                                              <button type="button" class="btn btn-primary" id="cicilan"> Cicilan </button>
                                            @endif<br>  --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- checkout-area end -->
        <br><br><br><br><br>

        <!-- Footer Area Start Here -->
        @include('frontend.include.footer')
        <!-- Footer Area End Here -->

    </div>
</body>

</html>