<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('frontend.include.header')

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript"
                src="https://app.sandbox.midtrans.com/snap/snap.js"
                data-client-key="SB-Mid-client-zcaFyWBOdSeWy_H5"></script>
    {{-- <script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script> --}}
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
                        <li class="active"><a href="checkout">Konfirmasi Bayar</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- checkout-area start -->
        <div class="checkout-area pb-45 pt-15">
            <div class="container">
                <div class="row center-block">
                    <div class="col-lg-3 col-md-3">
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="your-order">
                            <center><h3>Konfirmasi Pembayaran</h3></center>

                            <form action="{{ url('/frontend/submit-konfirmasi') }}" method="post" id="konfirmasi-gateway" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-sm-30">
                                            <label>Nama <span class="required">*</span></label>
                                            <input class="form-control" type="text" id="nama" name="nama" placeholder="" form="konfirmasi-gateway" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-sm-30">
                                            <label>Email <span class="required">*</span></label>
                                            <input class="form-control" type="email" id="email" name="email" placeholder="" form="konfirmasi-gateway" required/>
                                        </div><br>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-sm-30">
                                            <label>Tanggal Pembayaran <span class="required">*</span></label>
                                            <input class="form-control" type="date" id="tanggal_bayar" name="tanggal_bayar" form="konfirmasi-gateway" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-sm-30">
                                            <label>Jumlah Bayar <span class="required">*</span></label>
                                            <input class="form-control" type="number" id="jumlah_bayar" name="jumlah_bayar"  min="0" form="konfirmasi-gateway" required/>
                                        </div><br>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-sm-30">
                                            <label>Bank Tujuan <span class="required">*</span></label>
                                            <input class="form-control" type="text" id="bank_tujuan" name="bank_tujuan" form="konfirmasi-gateway" placeholder="BCA/MANDIRI" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-sm-30">
                                            <label>Nama Rekening Pengirim <span class="required">*</span></label>
                                            <input class="form-control" type="text" id="nama_rekening_pengirim" name="nama_rekening_pengirim" placeholder="" form="konfirmasi-gateway" required/>
                                        </div><br>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="checkout-form-list mb-sm-30">
                                            <label>No. Invoice <span class="required">*</span></label>
                                            <input class="form-control" type="text" id="no_invoice" name="no_invoice" form="konfirmasi-gateway" required/>
                                        </div><br>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list mb-sm-30">
                                            <label>Bukti Transaksi <span class="required">*</span></label>
                                            <input class="form-control" type="file" id="image" name="image" form="konfirmasi-gateway"/>
                                        </div><br>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="checkout-form-list mb-sm-30">
                                            <label>Catatan <span class="required">(Optional)</span></label>
                                            <textarea class="form-control" type="textarea" id="catatan" name="catatan" form="konfirmasi-gateway"></textarea>
                                        </div>
                                    </div>
                                </div><br>
                                <button type="submit" class="btn btn-primary btn-sm"> Submit </button>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3">
                    </div>
                </div>
            </div>
        </div>
        <!-- checkout-area end -->
        <!-- Footer Area Start Here -->
        @include('frontend.include.footer')
        <!-- Footer Area End Here -->

        {{-- js --}}
        
    </div>
</body>

</html>