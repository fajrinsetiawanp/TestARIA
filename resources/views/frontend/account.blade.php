<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('frontend.include.header')
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
            <!-- Header Bottom End Here -->
        </header>
        <!-- Main Header Area End Here -->
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">account</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- My Account Page Start Here -->
        <div class="my-account white-bg ptb-45">
            <div class="container">
                @if(\Session::has('alert'))
                    <div class="alert alert-primary">
                        <div>{{Session::get('alert')}}</div>
                    </div>
                @endif
                @if(\Session::has('alert-success'))
                    <div class="alert alert-success">
                        <div>{{Session::get('alert-success')}}</div>
                    </div>
                @endif
                <div class="account-dashboard">
                   <div class="dashboard-upper-info">
                       <div class="row align-items-center no-gutters">
                           <div class="col-xl-3 col-lg-3 col-md-6">
                               <div class="d-single-info">
                                   <p class="user-name">Hello <span>{{ $data->nama_toko }}</span></p>
                                   {{-- <p>(not yourmail@info? <a href="#" class="log-out">Log Out</a>)</p> --}}
                               </div>
                           </div>
                           <div class="col-xl-3 col-lg-4 col-md-6">
                               <div class="d-single-info">
                                   <p>Need Assistance? Customer service at.</p>
                                   <p>(+62) 21-5984799</p>
                               </div>
                           </div>
                           <div class="col-xl-3 col-lg-3 col-md-6">
                               <div class="d-single-info">
                                   <p>E-mail them at </p>
                                   <p>doremi.ecomm@gmail.com</p>
                               </div>
                           </div>
                           <div class="col-xl-3 col-lg-2 col-md-6">
                               <div class="d-single-info text-lg-center">
                                @if ( Cart::content()->count() == 0)

                                @else
                                   <a class="view-cart" href="{{ url('frontend/cart') }}"><i class="fa fa-cart-plus" aria-hidden="true"></i>view cart</a>
                                 @endif
                               </div>
                           </div>
                       </div>
                   </div>
                    <div class="row">
                        <div class="col-lg-2">
                            <!-- Nav tabs -->
                            <ul class="nav flex-column dashboard-list" role="tablist">
                                <li><a class="nav-link active" data-toggle="tab" href="#dashboard">Dashboard</a></li>
                                <li><a class="nav-link" data-toggle="tab" href="#orders">Orders</a></li>
                                {{-- <li><a class="nav-link" data-toggle="tab" href="#downloads">Downloads</a></li> --}}
                                {{-- <li><a class="nav-link" data-toggle="tab" href="#address">Addresses</a></li> --}}
                                <li><a class="nav-link" data-toggle="tab" href="#account-details">Account details</a></li>
                                {{-- <li><a class="nav-link" href="{{ url('frontend/logout') }}">Sign Out</a></li> --}}
                            </ul>
                        </div>
                        <div class="col-lg-10">
                            <!-- Tab panes -->
                            <div class="tab-content dashboard-content mt-all-40">
                                <div id="dashboard" class="tab-pane fade show active">
                                    <h3>Dashboard </h3>
                                    <p>From your account dashboard. you can easily check & view your <b>recent orders</b> and <b>edit your password and account details.</b></p>
                                </div>
                                <div id="orders" class="tab-pane fade">
                                    <h3>Orders</h3>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Order</th>
                                                    <th>No. Invoice</th>
                                                    <th>Date & Time</th>
                                                    <th>Payment Method</th>
                                                    <th>Status</th>
                                                    <th>Total</th>
                                                    <th>Actions</th>	 	 	 	
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                  $no = 1;
                                                @endphp
                                                @foreach($toko_order as $wholesale_order)
                                                @php
                                                    $date = Carbon\Carbon::parse($toko_order['tanggal'])->format('d-M-Y');
                                                    $total = number_format($wholesale_order->total_bayar);
                                                @endphp
                                                <tr>
                                                    <td>{{ $no }}</td>
                                                    <td># {{ $wholesale_order->no_invoice }} </td>
                                                    <td> {{ $wholesale_order->tanggal }} </td>
                                                    <td>
                                                        @if($wholesale_order->payment_type != "-")
                                                            <a class="view" href="{{ url('frontend/invoice-bank/'.$wholesale_order->no_invoice.'/'.$wholesale_order->order_to.'?metode=Bank Transfer') }}" >{{ $wholesale_order->payment_type }}</a>
                                                        @else
                                                            -
                                                        @endif    
                                                    </td>
                                                    <td> {{ $wholesale_order->status }} </td>
                                                    <td> Rp. {{ $total }} </td>
                                                    <td>
                                                        <a class="view"href="#" data-toggle="modal" data-target="#{{ $wholesale_order['id'] }}">view</a>
                                                        @if($wholesale_order->status == 'Proses')
                                                            @if($wholesale_order->payment_type == "-")
                                                                <a class="view" href="{{ url('frontend/invoice-bank/'.$wholesale_order->no_invoice.'/'.$wholesale_order->order_to.'?metode=Bank Transfer') }}" onclick="return confirm('Anda Yakin Memilih Metode Bank Transfer?')">Bank Transfer</a>
                                                            @endif
                                                        @endif
                                                    </td>
                                                    </div>
                                                </tr>

                                                @php
                                                  $no++;
                                                @endphp
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="downloads" class="tab-pane fade">
                                    <h3>Downloads</h3>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Downloads</th>
                                                    <th>Expires</th>
                                                    <th>Download</th>	 	 	 	
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Haven - Free Real Estate PSD Template</td>
                                                    <td>May 10, 2018</td>
                                                    <td>never</td>
                                                    <td><a class="view" href="#">Click Here To Download Your File</a></td>
                                                </tr>
                                                <tr>
                                                    <td>Nevara - ecommerce html template</td>
                                                    <td>Sep 11, 2018</td>
                                                    <td>never</td>
                                                    <td><a class="view" href="#">Click Here To Download Your File</a></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div id="address" class="tab-pane">
                                   <p>The following addresses will be used on the checkout page by default.</p>
                                    <h4 class="billing-address">Billing address</h4>
                                    <a class="view" href="#">edit</a>
                                    <p>Bayazid Hasan</p>
                                    <p>Bangladesh</p>   
                                </div>
                                <div id="account-details" class="tab-pane fade">
                                    <h3>Account details </h3>
                                    <div class="register-form login-form clearfix">
                                        <form action="{{ url('/frontend/edit-contact') }}" method="post" id="account-gateway">
                                            {{ csrf_field() }}
                                            {{-- <div class="form-group row align-items-center">
                                                <label class="col-lg-3 col-md-4 col-form-label">Social title</label>
                                                <div class="col-lg-6 col-md-8">
                                                    <span class="custom-radio"><input name="id_gender" value="1" type="radio"> Mr.</span>
                                                    <span class="custom-radio"><input name="id_gender" value="1" type="radio"> Mrs.</span>
                                                </div>
                                            </div> --}}
                                            <div class="form-group row">
                                                <label for="f-name" class="col-lg-3 col-md-4 col-form-label">Nama Toko</label>
                                                <div class="col-lg-6 col-md-8">
                                                    <input type="text" class="form-control" id="nama_toko" name="nama_toko" value="{{ $data->nama_toko }}" form="account-gateway">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="l-name" class="col-lg-3 col-md-4 col-form-label">Nama Pemilik</label>
                                                <div class="col-lg-6 col-md-8">
                                                    <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" value="{{ $data->nama_pemilik }}" form="account-gateway">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="email" class="col-lg-3 col-md-4 col-form-label">Alamat Email</label>
                                                <div class="col-lg-6 col-md-8">
                                                    <input type="text" class="form-control" id="email" name="email" value=" {{ $data->email }}" form="account-gateway">
                                                </div>
                                            </div>
                                            {{-- <div class="form-group row">
                                                <label for="l-name" class="col-lg-3 col-md-4 col-form-label">Username</label>
                                                <div class="col-lg-6 col-md-8">
                                                    <input type="text" class="form-control" id="l-name" value=" {{ $user_data->name }}">
                                                </div>
                                            </div> --}}
                                            {{-- <div class="form-group row">
                                                <label for="inputpassword" class="col-lg-3 col-md-4 col-form-label">Password Lama</label>
                                                <div class="col-lg-6 col-md-8">
                                                    <input type="password" class="form-control" id="oldpassword" name="oldpassword" value=" {{ $user_data->password }}" form="account-gateway">
                                                </div>
                                            </div> --}}
                                            <div class="form-group row">
                                                <label for="newpassword" class="col-lg-3 col-md-4 col-form-label">Password Baru</label>
                                                <div class="col-lg-6 col-md-8">
                                                    <input type="password" class="form-control" id="newPassword" name="newPassword" form="account-gateway" onkeyup='check();'>
                                                    <button class="btn show-btn" type="button" onclick="showFunction1()">Show</button>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="v-password" class="col-lg-3 col-md-4 col-form-label">Confirm password</label>
                                                <div class="col-lg-6 col-md-8">
                                                    <input type="password" class="form-control" id="newPassword2" name="newPassword2" form="account-gateway" onkeyup='check();'">
                                                    <button class="btn show-btn" type="button" onclick="showFunction2()">Show</button>
                                                    <span id='message'></span>
                                                </div>
                                                <span class="text-warning" ></span>
                                            </div>
                                            <div class="form-group row">
                                                <label for="f-name" class="col-lg-3 col-md-4 col-form-label">No Telepon</label>
                                                <div class="col-lg-6 col-md-8">
                                                    <input type="text" class="form-control" id="no_telepon" name="no_telepon" value=" {{ $data->no_telepon }}" form="account-gateway">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="f-name" class="col-lg-3 col-md-4 col-form-label">No Handphone</label>
                                                <div class="col-lg-6 col-md-8">
                                                    <input type="text" class="form-control" id="no_handphone" name="no_handphone" value=" {{ $data->no_handphone }}" form="account-gateway">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="f-name" class="col-lg-3 col-md-4 col-form-label">Alamat</label>
                                                <div class="col-lg-6 col-md-8">
                                                    <textarea type="text" class="form-control" id="alamat" name="alamat" form="account-gateway"> {{ $data->alamat }}</textarea> 
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="f-name" class="col-lg-3 col-md-4 col-form-label">Provinsi</label>
                                                <div class="col-lg-6 col-md-8">
                                                    <select class="form-control" id="provinsi" name="provinsi" required form="account-gateway">
                                                        <option selected disabled="disabled">Pilih</option>
                                                        @foreach ($provinsi as $provinsis)
                                                        <option value="{{  $provinsis['id_provinsi'] }}" {{ ( $provinsis['nama'] == $provinsi_toko['nama'] ) ? 'selected' : '' }}>{{  $provinsis['nama'] }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="f-name" class="col-lg-3 col-md-4 col-form-label">Kota</label>
                                                <div class="col-lg-6 col-md-8">
                                                    <select class="form-control" id="kota" name="kota" required form="account-gateway">
                                                        <option selected disabled="disabled">Pilih</option>
                                                        @php
                                                            $user_kota = explode(' ', $data->kota);
                                                        @endphp
                                                        @foreach ($kota as $kotas)
                                                        <option value="{{  $kotas['id_kota'] }} {{ $kotas['kode_pos'] }}" {{ ( $kotas['tipe'] == $user_kota[0] && $kotas['nama'] == $user_kota[1] ) ? 'selected' : '' }}>{{  $kotas['tipe'] }} {{ $kotas['nama'] }} - {{ $kotas['kode_pos'] }}</option>
                                                        {{-- <input type="hidden" name="{{ $kotas['kode_pos'] }}"> --}}
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            {{-- <div class="form-group row">
                                                <label for="f-name" class="col-lg-3 col-md-4 col-form-label">Kode Pos</label>
                                                <div class="col-lg-6 col-md-8">
                                                    <input type="text" class="form-control" id="kode_pos">
                                                </div>
                                            </div> --}}
                                            {{-- <div class="form-group row">
                                                <label for="birth" class="col-lg-3 col-md-4 col-form-label">Birthdate</label>
                                                <div class="col-lg-6 col-md-8">
                                                    <input type="text" class="form-control" id="birth" placeholder="MM/DD/YYYY">
                                                </div>
                                            </div>
                                            <div class="form-check row p-0 mt-20">
                                                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-4">
                                                    <input class="form-check-input" value="#" id="offer" type="checkbox">
                                                    <label class="form-check-label" for="offer">Receive offers from our partners</label>
                                                </div>
                                            </div>
                                            <div class="form-check row p-0 mt-20">
                                                <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-4">
                                                    <input class="form-check-input" value="#" id="subscribe" type="checkbox">
                                                    <label class="form-check-label" for="subscribe">Sign up for our newsletter<br>Subscribe to our newsletters now and stay up-to-date with new collections, the latest lookbooks and exclusive offers..</label>
                                                </div>
                                            </div> --}}
                                            <div class="register-box mt-40">
                                                <button type="submit" class="return-customer-btn float-right">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- My Account Page End Here -->
        @foreach($toko_order as $order)
        <!-- Quick View Content Start -->
        <div class="main-product-thumbnail quick-thumb-content">
            <div class="container">
                <!-- The Modal -->
                <div class="modal fade" id="{{ $order['id'] }}">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <h3>Ringkasan Pemesanan</h3><hr>
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product-name">Nama Produk</th>
                                                <th class="product-name">Harga</th>
                                                <th class="product-quantity">Quantity</th>
                                                <th class="product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $details = App\Models\TbOrderWholesaleDetail::where('id_order', $order['id'])->get();
                                            @endphp
                                            @foreach($details as $detail)
                                            @php
                                            $produk = App\Models\TbProduk::where('id', $detail['id_produk'])->get();
                                            @endphp
                                            @foreach($produk as $produks)
                                            <tr class="cart_item">
                                                <td class="product-name">
                                                    @php
                                                    $produk_diskon = App\Models\TbHargaProduk::where('id_produk', $produks['id'])->where('jenis_harga', 'Wholesale')->first();
                                                    $jumlah1 = $produk_diskon->harga * ($produk_diskon->diskon / 100);
                                                    $jumlah2 = $produk_diskon->harga - $jumlah1;
                                                    $harga_satuan = number_format($jumlah2);
                                                    @endphp
                                                    {{ $produks['judul'] }}
                                                </td>
                                                <td class="product-price">
                                                    Rp. {{ $harga_satuan }}
                                                </td>
                                                <td class="product-quantity">
                                                    {{ $detail['qty'] }}
                                                </td>
                                                <td class="product-total">
                                                    <span class="amount">Rp. {{ number_format($detail['jumlah_total']) }}</span>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td></td>
                                                <td></td>
                                                <td><span class=" total amount">Rp. {{ number_format($order['total_bayar']) }}</span>
                                                </td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div><hr>
                            </div>
                            <!-- Modal footer -->
                            {{-- <div class="custom-footer">
                                <div class="socila-sharing">
                                    <ul class="d-flex">
                                        <li>share</li>
                                        <li><a href="https://www.facebook.com/DoremiMusikID"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus-official" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
        function showFunction1() {
            var x = document.getElementById("newPassword");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }

        function showFunction2() {
            var x = document.getElementById("newPassword2");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
        </script>

        <script>
        var check = function() {
          if (document.getElementById('newPassword').value ==
            document.getElementById('newPassword2').value) {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = 'password match';
          } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = 'password not match';
          }
        }
        </script>

        <!-- Quick View Content End -->
        @endforeach
        <!-- Footer Area Start Here -->
        @include('frontend.include.footer')
        <!-- Footer Area End Here -->
    </div>
    <!-- Main Wrapper End Here -->
</body>

</html>