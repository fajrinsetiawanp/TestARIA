<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('frontend.include.header')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript"
                src="https://app.sandbox.midtrans.com/snap/snap.js"
                data-client-key="SB-Mid-client-zcaFyWBOdSeWy_H5"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet" />
    {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> --}}
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
                        <li><a href="home">Home</a></li>
                        <li class="active"><a href="checkout">Checkout</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- coupon-area start -->
        {{-- <div class="coupon-area pt-45">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="coupon-accordion">
                            <!-- ACCORDION START -->
                            <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                            <div id="checkout_coupon" class="coupon-checkout-content">
                                <div class="coupon-info">
                                    <form action="#">
                                        <p class="checkout-coupon">
                                            <input type="text" class="code" placeholder="Coupon code" />
                                            <input type="submit" value="Apply Coupon" />
                                        </p>
                                    </form>
                                </div>
                            </div>
                            <!-- ACCORDION END -->
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- coupon-area end -->
        <!-- checkout-area start -->
        <div class="checkout-area pb-45 pt-15">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="checkbox-form mb-sm-40">
                            <h3>Checkout</h3>
                            <form action="{{ url('/frontend/review-payment-toko') }}" method="get" id="payment-gateway">
                                {!! csrf_field() !!}
                            <div class="row">
                                <input type="input" id="status" name="status" form="payment-gateway" value="Hold" hidden />

                                @if(Auth::user()->id_cms_privileges == 8)
                                <input type="input" id="id_cms_privileges" name="id_cms_privileges" form="payment-gateway" value="{{ Auth::user()->id_cms_privileges }}" hidden />

                                <div class="col-md-3">
                                    <div class="checkout-form-list mb-30">
                                        <label for="city">Metode Bayar <span class="required">*</span></label>
                                        <input type="text" id="metode_bayar_customer" name="metode_bayar_customer" form="payment-gateway" required class="form-control">
                                    </div><br>
                                </div>
                                <div class="col-md-3">
                                    <div class="checkout-form-list mb-30">
                                        <label for="city">Nama Customer <span class="required">*</span></label>
                                        <input type="text" id="nama_customer" name="nama_customer" form="payment-gateway" required class="form-control">
                                    </div><br>
                                </div>
                                <div class="col-md-3">
                                    <div class="checkout-form-list mb-30">
                                        <label for="city">Email Customer <span class="required">*</span></label>
                                        <input type="email" id="email_customer" name="email_customer" form="payment-gateway" required class="form-control">
                                    </div><br>
                                </div>
                                <div class="col-md-3">
                                    <div class="checkout-form-list mb-30">
                                        <label for="city">Phone Customer <span class="required">*</span></label>
                                        <input type="text" id="phone_customer" name="phone_customer" form="payment-gateway" required class="form-control">
                                    </div><br>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list mb-30">
                                        <label for="city">Alamat Customer <span class="required">*</span></label>
                                        <textarea name="alamat_customer" required class="form-control" form="payment-gateway"></textarea>
                                    </div><br>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list mb-30">
                                        <label for="city">keterangan/Catatan *bila ada</label>
                                        <textarea name="keterangan_customer" class="form-control" form="payment-gateway"></textarea>
                                    </div><br>
                                </div>
                                @else
                                <input type="input" id="id_cms_privileges" name="id_cms_privileges" form="payment-gateway" value="{{ Auth::user()->id_cms_privileges }}" hidden />

                                <div class="col-md-4">
                                    <div class="checkout-form-list mb-30">
                                        <label for="city">Payment Terms <span class="required">*</span></label>
                                        <select class="form-control" id="payment_term" name="payment_term" form="payment-gateway" required>
                                            {{-- <option selected disabled="disabled">Pilih</option> --}}
                                            <option value="cash">Cash </option>
                                            <option value="tempo 7 hari">Tempo 7 Hari</option>
                                            <option value="tempo 14 hari">Tempo 14 Hari</option>
                                            <option value="tempo 30 hari">Tempo 30 Hari</option>
                                        </select>
                                    </div><br>
                                </div>
                                <div class="col-md-4">
                                    <div class="checkout-form-list mb-30">
                                        <label for="city">Jasa Pengiriman <span class="required">*</span></label>
                                        <input type="text" id="jasa_kirim" name="jasa_kirim" form="payment-gateway" required class="form-control">
                                        {{-- <select class="js-example-basic-single form-control" id="jasa_kirim" name="jasa_kirim" form="payment-gateway" required>
                                            <option selected disabled="disabled">Pilih</option>
                                            @foreach ($jasa_kirim as $kurirs)
                                            <option id="{{ $kurirs->nama }}" value ="{{ $kurirs->nama }}">{{ $kurirs->nama }} </option>
                                            @endforeach
                                        </select> --}}
                                    </div><br>
                                </div>
                            {{-- </div> --}}
                            {{-- <div class="row"> --}}
                                @php
                                    $kota_tujuan = App\Models\TbMasterKota::all();
                                @endphp
                                <div class="col-md-4">
                                    <div class="checkout-form-list mb-30">
                                        <label for="city">Kota Tujuan <span class="required">*</span></label>
                                        <select class="test-select2 form-control" id="kota_tujuan" name="kota_tujuan" form="payment-gateway" required>
                                            <option selected disabled="disabled">Pilih</option>
                                            @foreach ($kota_tujuan as $tujuan)
                                                <option value ="{{ $tujuan->tipe }} {{ $tujuan->nama }}">
                                                    {{ $tujuan->tipe }} {{ $tujuan->nama }}
                                                </option>
                                            @endforeach
                                            <!-- <option value="DKI JAKARTA">DKI JAKARTA</option>
                                            <option value="DIY YOGYAKARTA">DIY YOGYAKARTA</option>
                                            <option value="BALI">BALI</option>
                                            <option value="LOMBOK">LOMBOK</option>
                                            <option value="SORONG">SORONG</option>
                                            <option value="AMBON">AMBON</option>
                                            <optgroup label="BANTEN">
                                                <option value="CILEGON">CILEGON</option>
                                                <option value="SERANG">SERANG</option>
                                                <option value="TANGERANG">TANGERANG</option>
                                            </optgroup>
                                            <optgroup label="JAWA BARAT">
                                                <option value="BANDUNG">BANDUNG</option>
                                                <option value="BOGOR">BOGOR</option>
                                                <option value="CIANJUR">CIANJUR</option>
                                                <option value="CIREBON">CIREBON</option>
                                                <option value="KARAWANG">KARAWANG</option>
                                                <option value="PURWAKARTA">PURWAKARTA</option>
                                                <option value="SUKABUMI">SUKABUMI</option>
                                                <option value="TASIKMALAYAYA">TASIKMALAYAYA</option>
                                            </optgroup>
                                            <optgroup label="JAWA TENGAH">
                                                <option value="KUDUS">KUDUS</option>
                                                <option value="MAGELANG">MAGELANG</option>
                                                <option value="PATI">PATI</option>
                                                <option value="PEKALONGAN">PEKALONGAN</option>
                                                <option value="PEMALANG">PEMALANG</option>
                                                <option value="PURWOKERTO">PURWOKERTO</option>
                                                <option value="SALATIGA">SALATIGA</option>
                                                <option value="SOLO">SOLO</option>
                                                <option value="TEGAL">TEGAL</option>
                                            </optgroup>
                                            <optgroup label="JAWA TIMUR">
                                                <option value="JEMBER">JEMBER</option>
                                                <option value="JOMBANG">JOMBANG</option>
                                                <option value="KEDIRI">KEDIRI</option>
                                                <option value="MALANG">MALANG</option>
                                                <option value="SURABAYA">SURABAYA</option>
                                            </optgroup>
                                            <optgroup label="KALIMANTAN">
                                                <option value="BALIKPAPAN">BALIKPAPAN</option>
                                                <option value="BANJARMASIN">BANJARMASIN</option>
                                                <option value="PALANGKARAYA">PALANGKARAYA</option>
                                                <option value="SAMARINDA">SAMARINDA</option>
                                            </optgroup>
                                            <optgroup label="SUMATERA">
                                                <option value="LAMPUNG">LAMPUNG</option>
                                                <option value="MEDAN">MEDAN</option>
                                                <option value="PADANG">PADANG</option>
                                                <option value="PALEMBANG">PALEMBANG</option>
                                                <option value="PEKANBARU">PEKANBARU</option>
                                                <option value="PEMATANGSIANTAR">PEMATANGSIANTAR</option>
                                            </optgroup>
                                            <optgroup label="SULAWESI">
                                                <option value="MAKASSAR">MAKASSAR</option>
                                                <option value="MANADO">MANADO</option>
                                                <option value="PONTIANAK">PONTIANAK</option>
                                            </optgroup> -->
                                        </select>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <!-- <div class="checkout-form-list mb-30">
                                        <label for="city">Catatan </label>
                                        <textarea class="form-control" id="note" name="note" form="payment-gateway" rows="7" cols="100"></textarea> 
                                    </div> -->
                                    @if(Auth::user()->id_cms_privileges == 8)
                                    <button type="submit" form="payment-gateway" class="btn btn-primary" onclick="return confirm('Anda Yakin Menyelesaikan Transaksi?');">
                                        PROSES PESANAN
                                    </button>
                                    @else
                                    <button type="submit" form="payment-gateway" class="btn btn-primary">
                                        REVIEW CHECKOUT
                                    </button>
                                    @endif
                                    <br>
                                    <br>
                                    <strong>*silahkan tambahkan catatan di masing-masing item dibawah ini bila diperlukan</strong>
                                </div>
                            </div>
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
                                    </div><br>
                                </div>
                            </div>
                            <!-- </form> -->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="your-order">
                            <h3>Orders</h3>
                            <div class="your-order-table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-name">Produk</th>
                                            <th class="product-price">Harga</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-discount">Diskon</th>
                                            @if(Auth::user()->id_cms_privileges == 8)
                                                <th class="product-discount">Reward Kamu</th>
                                            @else
                                                <th class="product-discount">Catatan</th>
                                            @endif
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
                                        @foreach ($items_fix as $v)
                                        @php
                                            $total_price += $v->price;
                                            $total_quantity += $v->quantity;
                                            $total_diskon += $v->diskon;
                                            $total_price_diskon += $v->total;

                                                if($v->id_diskon_group) {
                                                    $diskon = App\TbDiskonKategori::where('id_diskon_group', $v->id_diskon_group)->get();
                                                } else {
                                                    $diskon = App\Models\TbHargaProduk::where('id_produk', $v->id_produk)->where('jenis_harga', 'Wholesale')->where('qty', '>', 1)->get();
                                                }
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

                                                <a href="#" title="Info Diskon" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="
                                                <?php foreach ($diskon as $k) {
                                                    if(!empty($k->diskon2)) {
                                                        echo $k->qty.'='.$k->diskon.'%+'.$k->diskon2.'%, ';
                                                    } else {
                                                        echo $k->qty.'='.$k->diskon.'%, ';
                                                    }
                                                }?>
                                                "><i class="fa fa-question-circle" aria-hidden="true"></i></a>
                                                <br>
                                                <br>
                                            </td>
                                            @if(Auth::user()->id_cms_privileges == 8)
                                            <td class="product-discount">
                                                Rp. {{ number_format(2 * $v->total / 100) }}
                                            </td>
                                            @else
                                            <td class="product-discount">
                                                <textarea name="note[]"></textarea>
                                            </td>
                                            @endif
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
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- checkout-area end -->
        <!-- Footer Area Start Here -->
        @include('frontend.include.footer')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>
        <!-- Footer Area End Here -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('.test-select2').select2();
            });
        </script>
        <script>
                $(document).ready(function(){
                    $('[data-toggle="popover"]').popover();   
                });
            </script>
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