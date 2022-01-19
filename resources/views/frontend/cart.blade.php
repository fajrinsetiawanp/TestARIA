<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
            <!-- Header Top End Here -->
        </header>
        <!-- Main Header Area End Here -->
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="#">Cart</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- Cart Main Area Start -->

        <div class="cart-main-area ptb-45">
        @if (session()->has('success_message'))
        <div class="container">
            <div class="alert alert-primary alert-dismissible fade show" role="alert" id="success-alert">
                <strong>{{ session()->get('success_message') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif

        @if (session()->has('error_message'))
        <div class="container">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session()->get('error_message') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
        @endif
            <div class="container">
                <div class="row">
                    @if (sizeof(Cart::content()) > 0)
                    <div class="col-md-12 col-sm-12">
                        <!-- Form Start -->
                        {{-- <form action="#"> --}}
                            <!-- Table Content Start -->
                            <div class="table-content table-responsive mb-45">
                                <table>
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            {{-- <th class="product-subtotal">Total</th> --}}
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach (Cart::content() as $item)
                                            @php
                                                $produk = App\Models\TbProduk::where('kode_sku', $item->id)->first();
                                                $produk['gambar'] = App\Models\TbGambarProduk::where('id_produk', $produk->id)->inRandomOrder()->first();
                                                // $stok = App\Models\TbLokasiStokProduk::where('id_produk', $produk->id)->where('id_lokasi', 1)->first();
                                                $harga = App\Models\TbHargaProduk::where('id_produk', $produk->id)->where('jenis_harga', 'Wholesale')->first();

                                                $url_new = urlencode($produk->kode_sku);

                                                if($produk->id_diskon_group != null) {
                                                    $diskon = App\TbDiskonKategori::where('id_diskon_group', $produk->id_diskon_group)->get();
                                                } else {
                                                    $diskon = App\Models\TbHargaProduk::where('id_produk', $produk->id)->where('jenis_harga', 'Wholesale')->where('qty', '>', 1)->get();
                                                }
                                            @endphp
                                        <tr>
                                            <td class="product-thumbnail">
                                                @if($produk->gambar->gambar)
                                                    <a href="{{url('frontend/produk-detail', $url_new)}}"><img src="{{ env('APP_URL') }}/{{ $produk->gambar->gambar }}" alt="cart-image" />
                                                    </a>
                                                @else
                                                    <a href="{{url('frontend/produk-detail', $url_new)}}"><img src="{{ asset('frontend/img/logo/default.jpg') }}" alt="cart-image" />
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="product-name"><a href="{{url('frontend/produk-detail', $url_new)}}">{{$item->name}}</a></td>
                                            <td class="product-price"><span class="amount">Rp. {{number_format($item->price)}}</span></td>
                                            <td class="product-quantity">
                                                {{-- <input type="hidden" name="rowId[]" value="{{ $item->rowId }}" form="updateQty">
                                                <input type="hidden" name="id[]" value="{{ $item->id }}" form="updateQty">
                                                <input type="number" style="width: 50px;" value="{{ $item->qty }}" name="Qty[]"  min="1"  id="jumlah_qty" onchange="myFunction('{{ $item->rowId }}')"> --}}
                                                @if (Auth::check())
                                                    {{-- <input type="number" min="{{ $harga->qty }}" value="{{ $item->qty }}" name="quantity" id="jumlah_qty" onchange="myFunction('{{ $item->rowId }}','{{ $item->id }}',this.value)"> --}}
                                                    <input type="number" min="1" value="{{ $item->qty }}" name="quantity[]" id="jumlah_qty" form="checkoutToko">
                                                    <input type="hidden" name="rowId[]" value="{{ $item->rowId }}" form="checkoutToko">
                                                @else
                                                    <input type="number" min="1" max="" value="{{ $item->qty }}" name="quantity" id="jumlah_qty" onchange="myFunctionUser('{{ $item->rowId }}',this.value)">
                                                @endif
                                                
                                                <a href="#" title="Info Diskon" data-toggle="popover" data-trigger="hover" data-placement="right" data-content="
                                                <?php foreach ($diskon as $v) {
                                                    if(!empty($v->diskon2)) {
                                                        echo $v->qty.'='.$v->diskon.'%+'.$v->diskon2.'%, ';
                                                    } else {
                                                        echo $v->qty.'='.$v->diskon.'%, ';
                                                    }
                                                }?>
                                                "><i class="fa fa-question-circle" aria-hidden="true"></i></a>
                                                <br>
                                                <br>
                                                @if(Auth::user()->id_cms_privileges == 8)
                                                    *anda mendapatkan 2%
                                                @endif
                                            </td>
                                            {{-- <td class="product-subtotal">Rp. {{number_format($item->subtotal)}}</td> --}}

                                            <td class="product-remove"> 
                                                {{-- <form action="{{ url('/frontend/cart', [$item->rowId]) }}" method="POST" id="deleteItem">
                                                    {!! csrf_field() !!}
                                                    <input type="hidden" name="_method" value="DELETE">
                                                </form> --}}
                                                    <a href="{{ url('/frontend/remove-cart', $item->rowId) }}" onclick="return confirm('Anda yakin menghapus produk ini dari keranjang?')"><i class="fa fa-times" aria-hidden="true"></i>
                                                    </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        {{-- @php
                                            dd($tes);
                                        @endphp --}}
                                        {{-- <tr>
                                            <td class="product-thumbnail">
                                                <a href="#"><img src="img/products/23.jpg" alt="cart-image" /></a>
                                            </td>
                                            <td class="product-name"><a href="#">Carte Postal Clock</a></td>
                                            <td class="product-price"><span class="amount">£50.00</span></td>
                                            <td class="product-quantity"><input type="number" value="1" /></td>
                                            <td class="product-subtotal">£50.00</td>
                                            <td class="product-remove"> <a href="#"><i class="fa fa-times" aria-hidden="true"></i></a></td>
                                        </tr> --}}
                                    </tbody>
                                </table>
                            </div>
                            <!-- Table Content Start -->
                            <div class="row">
                               <!-- Cart Button Start -->
                                <div class="col-md-8 col-sm-12">
                                    <div class="buttons-cart">
                                        {{-- <input type="submit" value="Update Cart" /> --}}
                                            {{-- <input type="submit" value="Submit button" name="Submit" > --}}
                                        {{-- <a href="#" onclick="document.forms[1].submit();">Empty Cart</a> --}}
                                        {{-- <form action="/frontend/empty-cart" method="POST" id="deleteCart">
                                            {{ csrf_field() }}
                                        </form> --}}
                                        <a href="javascript:;" id="emptyCartBtn">Empty Cart</a>
                                        <script>
                                            document.getElementById("emptyCartBtn").onclick = function() {
                                                var confirmAsk = confirm("Anda yakin kosongkan keranjang?");
                                                if (confirmAsk) {
                                                    window.location.href = '/frontend/empty-cart';
                                                }else{
                                                    return false;
                                                }
                                            }
                                        </script>
                                        <a href="{{ url('/frontend/toko/all') }}">Kembali Belanja</a>
                                    </div>
                                </div>
                                <!-- Cart Button Start -->
                                <!-- Cart Totals Start -->
                                <div class="col-md-4 col-sm-12">
                                    <div class="cart_totals float-md-right text-md-right">
                                        {{-- <h2>Cart Totals</h2>
                                        <br />
                                        <table class="float-md-right">
                                            <tbody>
                                                <tr class="cart-subtotal">
                                                    <th>Subtotal</th>
                                                    <td><span class="amount">$215.00</span></td>
                                                </tr>
                                                <tr class="order-total">
                                                    <th>Total</th>
                                                    @php
                                                        $money = explode('.', Cart::instance('default')->subtotal());
                                                        $total = $money[0];
                                                    @endphp
                                                    <td>
                                                        <strong><span class="amount">Rp. {{ $total }}</span></strong>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table> --}}
                                        <div class="wc-proceed-to-checkout">
                                            @if (Auth::check())
                                            <form action="/frontend/checkouts" method="POST" id="checkoutToko" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <a href="javascript:;" id="aCheckoutToko">Proceed to Checkout</a>
                                            </form>
                                            <script>
                                                var form = document.getElementById("checkoutToko");
                                                document.getElementById("aCheckoutToko").onclick = function() {
                                                    form.submit();
                                                }
                                            </script>
                                            @else
                                            <a href="{{ url('/frontend/checkout') }}">Proceed to Checkout</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Cart Totals End -->
                            </div>
                            <!-- Row End -->
                        {{-- </form> --}}
                        <!-- Form End -->
                    </div>
                    @else
                    <div class="container">
                        <h3>Kamu tidak punya produk di keranjang!</h3>
                        <a href="{{ url('/frontend/toko/all') }}" class="btn btn-primary btn-lg" style="margin-top: 50px;">Kembali Berbelanja</a>
                    </div>
                    @endif
                </div>
                 <!-- Row End -->
            </div>
        </div>
        <!-- Cart Main Area End -->

        <!-- Footer Area Start Here -->
        @include('frontend.include.footer')
        <!-- Footer Area End Here -->

        {{-- js --}}
        <script type="text/javascript"> $('.alert').alert(); </script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('[data-toggle="popover"]').popover();
            });
        </script>

        {{-- <script type="text/javascript">
                    function myFunction(id) {
                        $.ajaxSetup({
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                        var jumlah = document.getElementById("jumlah_qty").value;
                        alert(id);
                        if (jumlah == 0) {
                            alert('Quantity tidak boleh kosong!');
                        } else {
                            $.ajax({
                                type: "PATCH",
                                url: '{{ url("/frontend/cart") }}' + '/' + id,
                                data: {
                                    'quantity': jumlah,
                                },
                                success:function(data) {
                                    // alert(data);
                                    window.location.href = '{{ url('/frontend/cart') }}';
                                }
                            });
                        }
                    }
        </script> --}}

        <script type="text/javascript">
            function myFunctionUser(id,jumlah) {
                $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // var jumlah = document.getElementById("jumlah_qty").value;
                // alert(kode_sku);
                if (jumlah == 0) {
                    alert('Quantity can not be empty!');
                } else {
                    $.ajax({
                        type: "PATCH",
                        url: '{{ url("frontend/cart") }}' + '/' + id,
                        data: {
                            'quantity': jumlah,
                        },
                        success:function(data) {
                            // alert(data.data);
                            window.location.href = '{{ url('frontend/cart') }}';
                        }
                    });
                }
            }
        </script>

        <script type="text/javascript">
            function myFunction(id,kode_sku,jumlah) {
                $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // var jumlah = document.getElementById("jumlah_qty").value;
                // alert(kode_sku);
                if (jumlah == 0) {
                    alert('Quantity can not be empty!');
                } else {
                    $.ajax({
                        type: "PATCH",
                        url: '{{ url("frontend/cart") }}' + '/' + id,
                        data: {
                            'quantity': jumlah,
                            'kode_sku': kode_sku,
                        },
                        success:function(data) {
                            // alert(data.data);
                            window.location.href = '{{ url('frontend/cart') }}';
                        }
                    });
                }
            }
        </script>

        <script type="text/javascript">
            $("#success-alert").fadeTo(15000, 500).slideUp(500, function(){
                $("#success-alert").slideUp(500);
            });
        </script>
</body>

</html>