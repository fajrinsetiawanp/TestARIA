<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('frontend.include.header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        <li><a href="home">Home</a></li>
                        <li class="active"><a href="checkout">Checkout</a></li>
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
                            {{--
                            <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
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
                            {{--
                            <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3> --}} {{--
                            <div id="checkout_coupon" class="coupon-checkout-content">
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
                            <form action="{{ url('/frontend/review') }}" method="post" id="payment-gateway">
                                {!! csrf_field() !!}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-sm-30">
                                            <label>Nama Depan <span class="required">*</span></label>
                                            <input type="text" placeholder="" id="nama_depan" name="nama_depan" form="payment-gateway" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-30">
                                            <label>Nama Belakang <span class="required">*</span></label>
                                            <input type="text" placeholder="" id="nama_belakang" name="nama_belakang" form="payment-gateway" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-30">
                                            <label>Email <span class="required">*</span></label>
                                            <input type="email" placeholder="you@example.com" id="email" name="email" form="payment-gateway" required />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-30">
                                            <label>No Handphone  <span class="required">*</span></label>
                                            <input type="text" id="phone" name="phone" form="payment-gateway" placeholder="0888889988" required />
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list">
                                            <label>Alamat <span class="required">*</span></label>
                                            <textarea class="form-control" type="text" placeholder="Alamat" id="alamat" name="alamat" form="payment-gateway" style="resize:none"
                                                required> </textarea><br>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list mb-30">
                                            <label>Provinsi <span class="required">*</span></label>
                                            <select class="form-control" id="provinsi" name="provinsi" form="payment-gateway" required>
                                                <option selected disabled="disabled">Pilih</option>
                                              @foreach($provinsi as $k => $v)
                                                <option value="{{ $k }}_{{ $v }}">{{ $v }}</option>
                                              @endforeach
                                            </select><br>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-30">
                                            <label for="city">Kota <span class="required">*</span></label>
                                            <select class="form-control" id="kota" name="kota" form="payment-gateway" required>
                                            <option selected disabled="disabled">Pilih</option>   
                                            </select><br>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-30">
                                            <label for="city">Kode Pos <span class="required">*</span></label>
                                            <select class="form-control" id="kode_pos" name="kode_pos" form="payment-gateway" required>
                                                <option selected disabled="disabled">Pilih</option>
                                            </select>
                                        </div>
                                    </div>
                                    {{--
                                    <div class="col-md-12">
                                        <div class="checkout-form-list create-acc mb-30">
                                            <input id="cbox" type="checkbox" />
                                            <label>Create an account?</label>
                                        </div>
                                        <div id="cbox_info" class="checkout-form-list create-accounts mb-25">
                                            <p class="mb-10">Create an account by entering the information below. If you are a returning customer
                                                please login at the top of the page.</p>
                                            <label>Account password  <span class="required">*</span></label>
                                            <input type="password" placeholder="password" />
                                        </div>
                                    </div> --}}
                                </div>
                                {{--
                                <div class="different-address">
                                    <div class="ship-different-title">
                                        <h3>
                                            <label for="tipe_alamat">Kirim Ke Alamat Berbeda?</label>
                                            <input id="ship-box" name="tipe_alamat" type="checkbox" onclick="shipping()" role="button" />
                                        </h3>
                                    </div>
                                    <input type="hidden" name="tipe_alamats" id="tipe_alamats" value="" form="payment-gateway">
                                    <div id="ship-box-info">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="checkout-form-list mb-sm-30">
                                                    <label>Nama Depan <span class="required">*</span></label>
                                                    <input class="form-control" type="text" id="nama_depan_ship" name="nama_depan_ship" placeholder="" value="" form="payment-gateway"
                                                    />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-form-list mb-30">
                                                    <label>Nama Belakang <span class="required">*</span></label>
                                                    <input type="text" id="nama_belakang_ship" name="nama_belakang_ship" value="" form="payment-gateway" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-form-list mb-30">
                                                    <label>Email <span class="required">*</span></label>
                                                    <input type="email" id="email_ship" name="email_ship" placeholder="you@example.com" form="payment-gateway" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="checkout-form-list mb-30">
                                                    <label>No Handphone  <span class="required">*</span></label>
                                                    <input type="text" id="phone_ship" name="phone_ship" placeholder="0888889988" form="payment-gateway" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="checkout-form-list">
                                                    <label>Alamat <span class="required">*</span></label>
                                                    <textarea class="form-control" cols="30" rows="10" type="text" id="alamat_ship" name="alamat_ship" placeholder="Alamat" form="payment-gateway"
                                                        style="resize:none"> </textarea>
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
                                            <textarea id="checkout-mess" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery." form="payment-gateway"
                                                style="resize:none"></textarea>
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="order-notes">
                                    <div class="checkout-form-list">
                                        <label>Order Notes</label>
                                        <textarea id="catatan" name="catatan" cols="30" rows="10" placeholder="Notes about your order, e.g. special notes for delivery."
                                            form="payment-gateway" style="resize:none"></textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="checkout-form-list mb-30">
                                    <label for="city">Pilih Metode Kirim <span class="required">*</span></label>
                                    <select class="form-control" id="metode_kirim" name="metode_kirim" form="payment-gateway" style="width:200px;" required>
                                        <option selected="true" disabled="disabled">Pilih</option>   
                                        <option value="SELF PICKUP" id="self_pickup">SELF PICKUP</option>
                                        <option value="ORIGIN SHIPMENT">ORIGIN SHIPMENT</option>
                                        @if($berat <= 5)
                                        <option value="INDOMART">AMBIL DI INDOMART</option>
                                        @else
                                        <option value="INDOMART" disabled>AMBIL DI INDOMART</option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list mb-30" id="label_lokasi_kirim">
                                    <label for="label_lokasi_kirim" >Pilih Lokasi Kirim / Ambil<span class="required">*</span></label>
                                    <select class="form-control" id="lokasi_kirim" name="lokasi_kirim" form="payment-gateway" required>
                                        <option selected="true" disabled="disabled">Pilih </option>
                                        <option value="INDOMART">AMBIL DI INDOMART</option>
                                        <option value="ALFAMART">AMBIL DI ALFAMART</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list mb-30" id="label_jasa_kirim">
                                    <label for="label_jasa_kirim" >Pilih Jasa Pengiriman <span class="required">*</span></label>
                                    <select class="form-control" id="jasa_kirim" form="payment-gateway" name="jasa_kirim" style="width:200px;" required>
                                        <option selected="true" disabled="disabled">Pilih</option>   
                                      @foreach($jasa_kirim as $jasa_kirims)
                                        <option class="form-control" value="{{ $jasa_kirims->nama_singkatan }}">{{ $jasa_kirims->nama }}</option>
                                      @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="checkout-form-list mb-30 " id="label_jenis_kirim">
                                    <label for="label_jenis_kirim" >Pilih Jenis Pengiriman <span class="required">*</span></label>
                                    <select class="form-control" id="jenis_kirim" name="jenis_kirim" form="payment-gateway" required>
                                        <option selected="true" disabled="disabled">Pilih </option>
                                        <option value="REG">Regulrer (REG)</option>
                                        <option value="YES">Yakin Esok Sampai (YES)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
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
                                        {{-- <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="qty"> {{ Cart::instance('default')->count() }}</span></td>
                                            @php $money = explode('.', Cart::instance('default')->subtotal()); $total = $money[0]; 
                                            @endphp
                                            <td></td>
                                        </tr> --}}
                                        @php
                                            $money = explode('.', Cart::instance('default')->subtotal()); $total = $money[0]; 
                                        @endphp
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td>{{ Cart::instance('default')->count() }}</td>
                                            <td><span class=" total amount">Rp. {{ $total }}</span>
                                            </td>
                                        <input type="hidden" value="{{ Cart::instance('default')->subtotal() }}" name="total_cart" id="total_cart">
                                        <input type="hidden" id="value_total" name="value_total" value="">
                                        <input type="hidden" id="value_tarif_jasa" name="value_tarif_jasa" value="">
                                        </tr>
                                    </tfoot>
                                </table>
                                <i><u>ADDITIONAL</u></i>
                                <table>
                                        <thead>
                                                <tr>
                                                    <th class="product-name"><span id="courier"></span></th>
                                                    <th class="product-quantity"></th>
                                                    <th class="product-total"><span id="tarif_jasa"></span></th>
                                                </tr>
                                            </thead>
                                </table>
                            </div>
                            <div class="payment-method">
                                <div id="accordion">
                                    {{--
                                    <div class="card">
                                        <div class="card-header" id="headingone">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                  Direct Bank Transfer
                                                </button>
                                            </h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" aria-labelledby="headingone" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Make your payment directly into our bank account. Please use your Order ID
                                                    as the payment reference. Your order won’t be shipped until the funds
                                                    have cleared in our account.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header" id="headingtwo">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                          Cheque Payment
                                        </button>
                                            </h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" aria-labelledby="headingtwo" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Please send your cheque to Store Name, Store Street, Store Town, Store State
                                                    / County, Store Postcode.</p>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="checkout-form-list mb-45 ">
                                                {{-- <label for="city">Bayar ditempat <span class="required">*</span></label>
                                                <select class="form-control" id="bayar_ditempat" name="bayar_ditempat" form="payment-gateway" required>
                                                    <option selected="true" disabled>Pilih </option>
                                                    <option value="Ya">Ya</option>
                                                    <option value="Tidak">Tidak</option>
                                                </select> --}}
                                                <input type="hidden" name="bayar_ditempat" id="bayar_ditempat" value="Ya">
                                                <br>
                                                <button type="submit" form="payment-gateway" class="btn btn-primary">REVIEW CHECKOUT</button>
                                            </div><br>
                                        </div>
                                    </div>
                                    {{--
                                    <div class="card">
                                        <div class="card-header" id="headingthree">
                                            <h5 class="mb-0">
                                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                          PayPal
                                        </button>
                                            </h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" aria-labelledby="headingthree" data-parent="#accordion">
                                            <div class="card-body">
                                                <p>Pay via PayPal; you can pay with your credit card if you don’t have a PayPal
                                                    account.
                                                </p>
                                            </div>
                                        </div>
                                    </div> --}}
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
    {{--  <script>
    function shipping() {
        var x = document.getElementById("ship-box");
         if (x.checked) {
             // alert(x);
             document.getElementById("tipe_alamats").value = "Shipping Address";

             document.getElementById("self_pickup").disabled = true;

             document.getElementById("nama_depan_ship").disabled = false;
             document.getElementById("nama_depan_ship").required = true;

             document.getElementById("nama_belakang_ship").disabled = false;
             document.getElementById("nama_belakang_ship").required = true;

             document.getElementById("email_ship").disabled = false;
             document.getElementById("email_ship").required = true;

             document.getElementById("phone_ship").disabled = false;
             document.getElementById("phone_ship").required = true;

             document.getElementById("alamat_ship").disabled = false;
             document.getElementById("alamat_ship").required = true;

             document.getElementById("provinsi_ship").disabled = false;
             document.getElementById("provinsi_ship").required = true;

             document.getElementById("kota_ship").disabled = false;
             document.getElementById("kota_ship").required = true;

             document.getElementById("kode_pos_ship").disabled = false;
             document.getElementById("kode_pos_ship").required = true;

             document.getElementById("jasa_kirim").value = "";
             $('select[name="jenis_kirim"]').empty();
         } else {
             document.getElementById("tipe_alamats").value = "";

             document.getElementById("self_pickup").disabled = false;

             document.getElementById("nama_depan_ship").disabled = true;
             document.getElementById("nama_depan_ship").required = false;

             document.getElementById("nama_belakang_ship").disabled = true;
             document.getElementById("nama_belakang_ship").required = false;

             document.getElementById("email_ship").disabled = true;
             document.getElementById("email_ship").required = false;

             document.getElementById("phone_ship").disabled = true;
             document.getElementById("phone_ship").required = false;

             document.getElementById("alamat_ship").disabled = true;
             document.getElementById("alamat_ship").required = false;

            document.getElementById("provinsi_ship").disabled = true;
            document.getElementById("provinsi_ship").required = false;

            document.getElementById("kota_ship").disabled = true;
            document.getElementById("kota_ship").required = false;

             document.getElementById("kode_pos_ship").disabled = true;
            document.getElementById("kode_pos_ship").required = false;

             document.getElementById("jasa_kirim").value = "";
             $('select[name="jenis_kirim"]').empty();
        }
     }
    </script>  --}}

    <script type="text/javascript">
        $(document).ready(function() {
              $('select[name="provinsi"]').on('change', function() {
                  var id_provinsi_value = $(this).val();
                  var id_provinsi = id_provinsi_value.split("_");
                  
                  if(id_provinsi) {
                    // alert(id_provinsi[0]);
                      $.ajax({
                          url: '{{ url("/frontend/api/kota") }}' + '/' + id_provinsi[0],
                          success:function(data) {
                                  // alert(data);
                                  // console.log("apa");
                                  $('select[name="kota"]').empty();
                                  // $('select[name="kota"]').niceSelect('update');
                                  var obj = data;
                                  // var jumlahdata = obj.length;
                                  // alert(data);
                                  // for (var i=0;i<jumlahdata;i++){
                                  for (var key in obj) {
                                     $('select[name="kota"]').append('<option value="'+ key + '_' + obj[key] +'">'+ obj[key] +'</option>');
                                     // console.log("test");
                                     // console.log(key + " -> " + obj[key]);
                                  }

                                  //document.getElementById("jasa_kirim").value = "";
                                  //$('select[name="jenis_kirim"]').empty();
                                  //$('select[name="kode_pos"]').empty();

                                  //document.getElementById("metode_kirim").value = "";
                                  //$('select[name="lokasi_kirim"]').empty();

                                  //$('select[name="lokasi_indomart"]').empty();
                                  //document.getElementById("lokasi_indomart").required = false;
                                  //document.getElementById("indomart").style.display = "none";
                                  //document.getElementById("info_indomart").style.display = "none";
                                  //document.getElementById("umum").style.display = "block";
                                  //document.getElementById("lokasi_kirim").required = true;

                                  //var x = document.getElementById("metode_bayar");
                                  //x.style.display = "none";
                          }
                      });
                  }else{
                      $('select[name="kota"]').empty();
                  }
              });
          });
    </script>


    
    <script type="text/javascript">
        $(document).ready(function() {
              $('select[name="kota"]').on('change', function() {
                    var id_kota_value = document.getElementById("kota").value;
                    var id_kota = id_kota_value.split("_");
                    // alert(id_kota);
                      $.ajax({
                          url: '{{ url("/frontend/api/kodepos") }}' + '/' + id_kota[0],
                          success:function(data) {
                                  // alert(data);
                                  // console.log("apa");
                                  $('select[name="kode_pos"]').empty();
                                  // $('select[name="kota"]').append('<option value="">Pilih Kota</option>');
                                  var seenNames = {};

                                  array = data.filter(function(currentObject) {
                                    if (currentObject.kodepos in seenNames) {
                                      return false;
                                    } else {
                                      seenNames[currentObject.kodepos] = true;
                                      return true;
                                    }
                                  });
                                  // console.log(array);
                                  var sort = array.sort(function(a, b){return a.kodepos - b.kodepos});
                                  var obj = sort;
                                  var jumlahdata = obj.length;
                                  for (var i=0;i<jumlahdata;i++){
                                  // for (var key in obj) {
                                     $('select[name="kode_pos"]').append('<option value="'+ obj[i].kodepos +'">'+  obj[i].kodepos +'</option>');
                                     // console.log("test");
                                     // console.log(obj[i].kodepos);
                                  }

                                  //document.getElementById("jasa_kirim").value = "";
                                  //$('select[name="jenis_kirim"]').empty();

                                  //document.getElementById("metode_kirim").value = "";
                                  //$('select[name="lokasi_kirim"]').empty();

                                  //$('select[name="lokasi_indomart"]').empty();
                                  //document.getElementById("lokasi_indomart").required = false;
                                  //document.getElementById("indomart").style.display = "none";
                                  //document.getElementById("info_indomart").style.display = "none";
                                  //document.getElementById("umum").style.display = "block";
                                  //document.getElementById("lokasi_kirim").required = true;

                                  //var x = document.getElementById("metode_bayar");
                                  //x.style.display = "none";
                          }
                      });
              });
          });
    </script>

    
    {{--  <script type="text/javascript">
        $(document).ready(function() {
              $('select[name="kode_pos"]').on('change', function() {
                  document.getElementById("jasa_kirim").value = "";
                  $('select[name="jenis_kirim"]').empty();

                  document.getElementById("metode_kirim").value = "";
                  $('select[name="lokasi_kirim"]').empty();

                  $('select[name="lokasi_indomart"]').empty();
                  document.getElementById("lokasi_indomart").required = false;
                  document.getElementById("indomart").style.display = "none";
                  document.getElementById("info_indomart").style.display = "none";
                  document.getElementById("umum").style.display = "block";
                  document.getElementById("lokasi_kirim").required = true;

                  var x = document.getElementById("metode_bayar");
                  x.style.display = "none";
              });
          });
    </script>   --}}

    {{-- diffrent address --}} {{--
    <script type="text/javascript">
        $(document).ready(function() {
          $('select[name="provinsi_ship"]').on('change', function() {
              var id_provinsi_value = $(this).val();
              var id_provinsi = id_provinsi_value.split("_");
              
              if(id_provinsi) {
                // alert(id_provinsi);
                  $.ajax({
                      url: '{{ url("/frontend/api/kota") }}' + '/' + id_provinsi[0],
                      success:function(data) {
                              // alert(data);
                              // console.log("apa");
                              $('select[name="kota_ship"]').empty();
                              // $('select[name="kota"]').append('<option value="">Pilih Kota</option>');
                              var obj = data;
                              var jumlahdata = obj.length;
                              // for (var i=0;i<jumlahdata;i++){
                              for (var key in obj) {
                                $('select[name="kota_ship"]').append('<option value="'+ key + '_' + obj[key] +'">'+  obj[key] +'</option>').niceSelect('update');
                                // console.log("test");
                                // console.log(key + " -> " + obj[key]);
                              }

                              document.getElementById("jasa_kirim").value = "";
                              $('select[name="jenis_kirim"]').empty();
                              $('select[name="kode_pos_ship"]').empty();

                              document.getElementById("metode_kirim").value = "";
                              $('select[name="lokasi_kirim"]').empty();

                              $('select[name="lokasi_indomart"]').empty();
                              document.getElementById("lokasi_indomart").required = false;
                              document.getElementById("indomart").style.display = "none";
                              document.getElementById("info_indomart").style.display = "none";
                              document.getElementById("umum").style.display = "block";
                              document.getElementById("lokasi_kirim").required = true;

                              var x = document.getElementById("metode_bayar");
                              x.style.display = "none";
                      }
                  });
              }else{
                  $('select[name="kota_ship"]').empty();
              }
          });
      });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
          $('select[name="kota_ship"]').on('change', function() {
              var id_kota_value = document.getElementById("kota_ship").value;
              var id_kota = id_kota_value.split("_");
                // alert(id_kota);
                  $.ajax({
                      url: '{{ url("/frontend/api/kodepos") }}' + '/' + id_kota[0],
                      success:function(data) {
                              // alert(data);
                              // console.log("apa");
                              $('select[name="kode_pos_ship"]').empty();
                              // $('select[name="kota"]').append('<option value="">Pilih Kota</option>');
                              var seenNames = {};

                              array = data.filter(function(currentObject) {
                                if (currentObject.kodepos in seenNames) {
                                  return false;
                                } else {
                                  seenNames[currentObject.kodepos] = true;
                                  return true;
                                }
                              });
                              // console.log(array);
                              var sort = array.sort(function(a, b){return a.kodepos - b.kodepos});
                              var obj = sort;
                              var jumlahdata = obj.length;
                              for (var i=0;i<jumlahdata;i++){
                              // for (var key in obj) {
                                 $('select[name="kode_pos_ship"]').append('<option value="'+ obj[i].kodepos +'">'+  obj[i].kodepos +'</option>').niceSelect('update');
                                 // console.log("test");
                                 // console.log(obj[i].kodepos);
                              }

                              document.getElementById("jasa_kirim").value = "";
                              $('select[name="jenis_kirim"]').empty();

                              document.getElementById("metode_kirim").value = "";
                              $('select[name="lokasi_kirim"]').empty();

                              $('select[name="lokasi_indomart"]').empty();
                              document.getElementById("lokasi_indomart").required = false;
                              document.getElementById("indomart").style.display = "none";
                              document.getElementById("info_indomart").style.display = "none";
                              document.getElementById("umum").style.display = "block";
                              document.getElementById("lokasi_kirim").required = true;

                              var x = document.getElementById("metode_bayar");
                              x.style.display = "none";
                      }
                  });
          });
      });
    </script> --}} 
    
    {{-- metode kirim --}}
    <script type="text/javascript">
        $(document).ready(function() {
          $('select[name="metode_kirim"]').on('change', function() {
              var metode_kirim = $(this).val();

            //  var x = document.getElementById("tipe_alamat");
            //  if (x.checked) {
            //    var kota = document.getElementById("kota_ship").value;
            //    var alamat = document.getElementById("alamat_ship").value;
            //    var kode_pos = document.getElementById("kode_pos_ship").value;
                // alert(destination);
              //} else {
                var kota = document.getElementById("kota").value;
                var alamat = document.getElementById("alamat").value;
                var kode_pos = document.getElementById("kode_pos").value;
            //  }
              var total_cart = document.getElementById("total_cart").value;
              var explode_total_cart = total_cart.split(".");
              var explode_total_cart_lagi = explode_total_cart[0].split(",");
              var fix_total_cart = explode_total_cart_lagi[0] + explode_total_cart_lagi[1];
            
              if(metode_kirim) {
                //   alert('ok');
                  $.ajax({
                      url: '{{ url("/frontend/api/metode_kirim") }}' + '/' + metode_kirim,
                      success:function(data) {
                              // alert(data);
                              $('select[name="lokasi_kirim"]').empty();
                              var obj = data;
                              var jumlahdata = obj.length;
                              for (var i=0;i<jumlahdata;i++){
                                 $('select[name="lokasi_kirim"]').append('<option value="'+  obj[i].id + '_' +  obj[i].nama_lokasi + '_' + obj[i].kota + '_' + obj[i].kode_pos +'">'+  obj[i].nama_lokasi + ' - ' + obj[i].kota +'</option>');
                                 // console.log("test");
                              }
                              // alert(document.getElementById("lokasi_kirim").value);
                              if (metode_kirim == 'SELF PICKUP') {
                                    var y = document.getElementById("label_jasa_kirim");
                                    var z = document.getElementById("label_jenis_kirim");
                                //  document.getElementById("label_lokasi_kirim").style.display = "block";
                                  document.getElementById("jasa_kirim").required = false;
                                  document.getElementById("jenis_kirim").required = false;
                                
                                    y.style.display = "none";
                                    z.style.display = "none";

                                  document.getElementById("courier").innerHTML = 'SELF PICKUP';
                                  document.getElementById("tarif_jasa").innerHTML = '-';
                                  document.getElementById("value_tarif_jasa").value = 0;

                                  var fix_total = total_cart;
                                  var reversee = fix_total.toString().split('').reverse().join(''),
                                  costss  = reversee.match(/\d{1,3}/g);
                                  costss  = costss.join('.').split('').reverse().join('');
                                   document.getElementById("total").innerHTML = 'Rp. ' + costss + ',00';
                                  document.getElementById("value_total").value = fix_total;

                                  if (kode_pos) {
                                    // var x = document.getElementById("metode_bayar");
                                    // x.style.display = "block";
                                    
                                    document.getElementById("lokasi_kirim").required = true;

                                    // $('select[name="lokasi_indomart"]').empty();
                                    // document.getElementById("lokasi_indomart").required = false;
                                    // document.getElementById("indomart").style.display = "none";
                                    // document.getElementById("info_indomart").style.display = "none";
                                    // document.getElementById("umum").style.display = "block";
                                  } else {
                                    document.getElementById("metode_kirim").value = "";
                                    $('select[name="lokasi_kirim"]').empty();
                                    document.getElementById("lokasi_kirim").required = true;
                                    
                                  document.getElementById("label_lokasi_kirim").style.display = "none";

                                    // $('select[name="lokasi_indomart"]').empty();
                                    // document.getElementById("lokasi_indomart").required = false;
                                    // document.getElementById("indomart").style.display = "none";
                                    // document.getElementById("info_indomart").style.display = "none";
                                    // document.getElementById("umum").style.display = "block";
                                    toastr.info('Masukkan Kode Pos Anda!', '', {timeOut: 10000});
                                  }

                                  document.getElementById("kode_kupon").readOnly = false;
                                  document.getElementById("jasa_kirim").value = "";
                                  $('select[name="jenis_kirim"]').empty();
                              } else if (metode_kirim == 'INDOMART') {
                                  document.getElementById("umum").style.display = "none";
                                  document.getElementById("lokasi_kirim").required = false;

                                  document.getElementById("indomart").style.display = "block";
                                  document.getElementById("lokasi_indomart").required = true;

                                  //var y = document.getElementById("sh_jasa");
                                  //var z = document.getElementById("sh_jenis");
                                  document.getElementById("jasa_kirim").required = false;
                                  document.getElementById("jenis_kirim").required = false;

                                  //y.style.display = "none";
                                  //z.style.display = "none";

                                  document.getElementById("courier").innerHTML = 'RPX - AMBIL DI INDOMART';
                                  var weight = {{ $berat }};
                                  var weight_kg = weight / 1000;
                                  var tarif = 12000 * weight_kg;
                                  // alert(tarif);
                                  var reverse = tarif.toString().split('').reverse().join(''),
                                  costs  = reverse.match(/\d{1,3}/g);
                                  costs  = costs.join('.').split('').reverse().join('');
                                  document.getElementById("tarif_jasa").innerHTML = 'Rp. ' + costs + ',00';
                                  document.getElementById("value_tarif_jasa").value = tarif;

                                  var fix_total = parseInt(total_cart) + parseInt(tarif);
                                  var reversee = fix_total.toString().split('').reverse().join(''),
                                  costss  = reversee.match(/\d{1,3}/g);
                                  costss  = costss.join('.').split('').reverse().join('');
                                  document.getElementById("total").innerHTML = 'Rp. ' + costss + ',00';
                                  document.getElementById("value_total").value = fix_total;
                                  // alert(kode_pos);
                                  if (kode_pos) {
                                            $.ajax({
                                              url: '{{ url("/frontend/api/indomart") }}' + '/' + kode_pos,
                                              success:function(data) {
                                                // alert(data);
                                                if (!$.trim(data)) {
                                                  document.getElementById("metode_kirim").value = "";
                                                  $('select[name="lokasi_indomart"]').empty();
                                                  toastr.info('Maaf, Layanan Tidak Tersedia!', '', {timeOut: 10000});
                                                } else {
                                                  // alert(data);
                                                  document.getElementById("info_indomart").style.display = "block";

                                                  $('select[name="lokasi_indomart"]').empty();
                                                  var objs = data;
                                                  var jumlahdatas = objs.length;
                                                  for (var j=0;j<jumlahdatas;j++){
                                                     $('select[name="lokasi_indomart"]').append('<option value="'+ objs[j].KODETOKO +'">'+  objs[j].NAMATOKO +'</option>').niceSelect('update');
                                                     // console.log(objs[j].KODETOKO + " - " + objs[j].NAMATOKO);
                                                  }

                                                  var x = document.getElementById("metode_bayar");
                                                  x.style.display = "block";
                                                }
                                              }
                                            });
                                  } else {
                                    document.getElementById("metode_kirim").value = "";
                                    $('select[name="lokasi_indomart"]').empty();
                                    $('select[name="lokasi_kirim"]').empty();
                                    document.getElementById("lokasi_indomart").required = false;
                                    document.getElementById("lokasi_kirim").required = true;
                                    document.getElementById("indomart").style.display = "none";
                                    document.getElementById("info_indomart").style.display = "none";
                                    document.getElementById("umum").style.display = "block";
                                    toastr.info('Masukkan Kode Pos Anda!', '', {timeOut: 10000});
                                  }
                              } else if (metode_kirim == 'ORIGIN SHIPMENT') {
                                
                                if (kode_pos) {
                                  //document.getElementById("jasa_kirim").innerHTML = '';
                                  //document.getElementById("tarif_jasa").innerHTML = '';
                                  //document.getElementById("value_tarif_jasa").value = 0;
                                  
                                  //var y = document.getElementById("sh_jasa");
                                  //var z = document.getElementById("sh_jenis");
                                  
                                  document.getElementById("label_jasa_kirim").style.display = "block";
                                  document.getElementById("label_jenis_kirim").style.display = "block";

                                  document.getElementById("jasa_kirim").required = true;
                                  document.getElementById("jenis_kirim").required = true;

                                  document.getElementById("kode_kupon").readOnly = true;
                                //  y.style.display = "block";
                                //  z.style.display = "block";

                                    $('select[name="lokasi_indomart"]').empty();
                                    document.getElementById("lokasi_indomart").required = false;
                                    document.getElementById("lokasi_kirim").required = true;
                                    document.getElementById("indomart").style.display = "none";
                                    document.getElementById("info_indomart").style.display = "none";
                                    document.getElementById("umum").style.display = "block";
                                } else {
                                    document.getElementById("metode_kirim").value = "";
                                    $('select[name="lokasi_indomart"]').empty();
                                    $('select[name="lokasi_kirim"]').empty();
                                    document.getElementById("lokasi_indomart").required = false;
                                    document.getElementById("lokasi_kirim").required = true;
                                    document.getElementById("indomart").style.display = "none";
                                    document.getElementById("info_indomart").style.display = "none";
                                    document.getElementById("umum").style.display = "block";
                                    toastr.info('Masukkan Kode Pos Anda!', '', {timeOut: 10000});

                                    
                                  document.getElementById("label_jasa_kirim").style.display = "none";
                                  document.getElementById("label_jenis_kirim").style.display = "none";
                                  
                                  document.getElementById("jasa_kirim").required = false;
                                  document.getElementById("jenis_kirim").required = false;
                                }

                                var x = document.getElementById("metode_bayar");
                                x.style.display = "none";
                              }
                      }
                  });
              } else {
                    document.getElementById("metode_kirim").value = "";
                    $('select[name="lokasi_indomart"]').empty();
                    $('select[name="lokasi_kirim"]').empty();
                    document.getElementById("lokasi_indomart").required = false;
                    document.getElementById("lokasi_kirim").required = true;
                    document.getElementById("indomart").style.display = "none";
                    document.getElementById("info_indomart").style.display = "none";
                    document.getElementById("umum").style.display = "block";

                    document.getElementById("jasa_kirim").value = "";
                    $('select[name="jenis_kirim"]').empty();

                    var x = document.getElementById("metode_bayar");
                    var y = document.getElementById("sh_jasa");
                    var z = document.getElementById("sh_jenis");

                    x.style.display = "none";
                    y.style.display = "none";
                    z.style.display = "none";
              }
          });
      });
    </script>
    
    {{--  jenis_kirim test --}}
    <script type="text/javascript">
        $(document).ready(function() {
              $('select[name="jasa_kirim"]').on('change', function() {
                  var courier = $(this).val();
                  var origin_value = document.getElementById("lokasi_kirim").value;
                  var origin_data = origin_value.split("_");
                  var origin = origin_data[3];
                  //alert(origin);
                  //var x = document.getElementById("tipe_alamat");
                  var destination = document.getElementById("kode_pos").value;
                   
                  
                  // alert(explode_destination[0]);
                  var weight = {{ $berat }};
                  var weight_kg = weight / 1000;
    
    
                  var total_cart = document.getElementById("total_cart").value;
                  var explode_total_cart = total_cart.split(".");
                  var explode_total_cart_lagi = explode_total_cart[0].split(",");
                  var fix_total_cart = explode_total_cart_lagi[0] + explode_total_cart_lagi[1];
                  // alert(destination);
                  if(destination) {
                    // alert(id_provinsi);
                    if (courier) {
                      // alert(weight_kg);
                      if (courier == 'rpx' || courier == 'jne') {
                        var uri = '{{ url("/frontend/api/jasa-kirim") }}' + '/' + origin + '/' + destination + '/' + weight_kg + '/' + courier;
                      } else {
                        var uri = '{{ url("/frontend/api/jasa-kirim") }}' + '/' + origin + '/' + destination + '/' + weight + '/' + courier;
                      }
                       //alert(uri);
                      $.ajax({
                          url: uri,
                          success:function(data) {
                                  // alert(data);
                                  // console.log("apa");
                                  $('select[name="jenis_kirim"]').empty();
                                  
                                  var obj = data;
                                  var jumlahdata = obj.length;
                                  for (var i=0;i<jumlahdata;i++){
    
                                    if (courier == 'rpx') {
                                        var reverse = obj[i].PRICE.toString().split('').reverse().join(''),   
                                        cost  = reverse.match(/\d{1,3}/g);
                                        cost  = cost.join('.').split('').reverse().join('');
    
                                        $('select[name="jenis_kirim"]').append('<option value="'+ obj[i].SERVICE + '_' + obj[i].PRICE +'">'+ obj[i].SERVICE + ' - Rp. ' + cost + ',00' +'</option>');
                                    } else {
                                        var reverse = obj[i].cost[0]['value'].toString().split('').reverse().join(''),
                                        cost  = reverse.match(/\d{1,3}/g);
                                        cost  = cost.join('.').split('').reverse().join('');
    
                                        $('select[name="jenis_kirim"]').append('<option value="'+ obj[i].service + '_' + obj[i].cost[0]['value'] +'">'+ obj[i].service + ' - Rp. ' + cost + ',00' +'</option>');
                                    }
                                    // console.log("test");
                                  }
    
                                  var service = document.getElementById("jenis_kirim").value;
                                  var service_explode = service.split("_");
                                  document.getElementById("courier").innerHTML = courier.toUpperCase() + ' - ' + service_explode[0];
    
                                  var reversee = service_explode[1].toString().split('').reverse().join(''),
                                  costs  = reversee.match(/\d{1,3}/g);
                                  costs  = costs.join('.').split('').reverse().join('');
                                  document.getElementById("tarif_jasa").innerHTML = 'Rp. ' + costs + ',00';
    
                                  var value_nominal_kupon = document.getElementById("value_nominal_kupon").value;
                                  var fix_total = parseInt(total_cart) + parseInt(service_explode[1]) - parseInt(value_nominal_kupon);
                                  var reverseee = fix_total.toString().split('').reverse().join(''),
                                  costss  = reverseee.match(/\d{1,3}/g);
                                  costss  = costss.join('.').split('').reverse().join('');
                                  document.getElementById("total").innerHTML = 'Rp. ' + costss + ',00';
                                  document.getElementById("value_total").value = fix_total;
                                  document.getElementById("value_tarif_jasa").value = parseInt(service_explode[1]);
    
                                  document.getElementById("kode_kupon").readOnly = false;
    
                                  var x = document.getElementById("metode_bayar");
                                  x.style.display = "block";
                          }
                      });
                    } else {
                      document.getElementById("jasa_kirim").value = "";
                      $('select[name="jenis_kirim"]').empty();
    
                      document.getElementById("courier").innerHTML = '';
                      document.getElementById("tarif_jasa").innerHTML = '';
                      document.getElementById("value_tarif_jasa").value = 0;
    
                      var reverseeee = total_cart.toString().split('').reverse().join(''),
                      costsss  = reverseeee.match(/\d{1,3}/g);
                      costsss  = costsss.join('.').split('').reverse().join('');
                      document.getElementById("total").innerHTML = 'Rp. ' + costsss + ',00';
                      document.getElementById("value_total").value = total_cart;
                      // alert(test);
                      var x = document.getElementById("metode_bayar");
                      x.style.display = "none";
                    }
                  } else {
                      document.getElementById("jasa_kirim").value = "";
                      $('select[name="jenis_kirim"]').empty();
                      document.getElementById("kode_kupon").readOnly = true;
                      toastr.info('Masukkan Kode Pos Anda!', '', {timeOut: 10000});
                  }
              });
          });
      </script>


</body>

</html>