            <!-- Header Top Start Here -->
            <!-- <div class="header-top light-blue-bg"> -->
                <div class="container">
                    <div class="col-sm-12">
                        <div class="row justify-content-md-between justify-content-center">
                            <!-- Header Top Left Start -->
                            <div class="header-top-left">
                                {{-- <ul>
                                    <li><span>Language:</span><a href="#"><img src="img/header/1.jpg" alt="language-selector">English<i class="ion-arrow-down-b"></i></a>
                                        <!-- Dropdown Start -->
                                        <ul class="ht-dropdown">
                                            <li><a href="#"><img src="img/header/1.jpg" alt="language-selector">English</a></li>
                                            <li><a href="#"><img src="img/header/2.jpg" alt="language-selector">Francis</a></li>
                                        </ul>
                                        Dropdown End
                                    </li>
                                    <li><span>Currency:</span><a href="#">USD $<i class="ion-arrow-down-b"></i></a>
                                        <!-- Dropdown Start -->
                                        <ul class="ht-dropdown">
                                            <li><a href="#">English</a></li>
                                            <li><a href="#">Français</a></li>
                                        </ul>
                                        <!-- Dropdown End -->
                                    </li>
                                </ul> --}}
                            </div>
                            <!-- Header Top Left End -->
                            <!-- Header Top Right Start -->
                            <div class="header-top-right">
                                <ul>
                                    {{-- <li><a href="{{ url('/frontend/wishlist') }}"><i class="ion-android-favorite-outline"></i> Wishlist</a></li> --}}
                                    <li><a href="{{ url('frontend/konfirmasi') }}">Konfirmasi Bayar</a></li>
                                    @if (Auth::check())
                                    <!-- <li><a href="{{ url('frontend/account') }}">My Account</a></li> -->
                                    <li><a href="{{ url('frontend/logout') }}">Sign Out</a></li>
                                    @else
                                    <li><a href="{{ url('frontend/login') }}">Sign in</a></li>
                                    @endif
                                    {{-- <li><a href="checkout.html">Wishlist</a></li> --}}
                                </ul>
                            </div>
                            <!-- Header Top Right End -->
                        </div>
                    </div>
                </div>
                <!-- Container End -->
            </div>
            <!-- Header Top End Here -->
            <!-- Header Middle Start Here -->
            <div class="header-middle light-blue-bg ptb-35">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-md-12">
                            <div class="logo mb-all-30">
                                <a href="/"><img src="{{URL::asset('frontend/img/logo/logonew.png')}}" alt="logo-image"></a>
                            </div>
                        </div>
                        <!-- Categorie Search Box Start Here -->
                        @php
                            $kategori = App\Models\TbMasterKategori::orderBy('nama_kategori')->get();
                        @endphp
                        <div class="col-lg-6 col-md-12">
                            <div class="categorie-search-box">
                                <form action="{{ url('/frontend/toko/search') }}" method="get" >
                                    <div class="form-group">
                                        <select class="bootstrap-select" name="poscats">
                                            <option value="0">Kategori</option>
                                            @foreach($kategori as $kategoris)
                                            <option value="{{ $kategoris->id }}">{{ $kategoris->nama_kategori }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="text" name="q" placeholder="Enter your search key ... ">
                                    <button type="submit"><i class="ion-ios-search"></i></button>
                                </form>
                            </div>
                        </div>
                        <!-- Categorie Search Box End Here -->
                        <!-- Cart Box Start Here -->
                        <div class="col-lg-3 col-md-12">
                            <div class="cart-box mt-all-30">
                                <ul class="d-flex justify-content-lg-end justify-content-center align-items-center">
                                   {{-- <li><a class="wish-list-item" href="{{ url('/frontend/wishlist') }}"><i class="ion-android-favorite-outline"></i></a></li> --}}
                                    @php
                                        $money = explode('.', Cart::instance('default')->subtotal());
                                        $total = $money[0];
                                    @endphp
                                    <li><a href="#"><i class="ion-bag"></i><span class="total-pro">{{ Cart::instance('default')->count(false) }}</span><span class="my-cart"><span>my cart</span><span class="total-price">Rp. {{ $total }}</span></span></a>
                                        <ul class="ht-dropdown cart-box-width">
                                            <li>
                                                <!-- Cart Box Start -->
                                                @foreach(Cart::content() as $item)
                                                @php
                                                    $produk_cart = App\Models\TbProduk::where('kode_sku', $item->id)->first();
                                                    $gambar_produk_cart = App\Models\TbGambarProduk::where('id_produk', $produk_cart->id)->first();
                                                @endphp
                                                <div class="single-cart-box">
                                                    <div class="cart-img">
                                                        <a href="#"><img src="{{  env('APP_URL') }}/{{ $gambar_produk_cart->gambar }}" alt="cart-image"></a>
                                                        <span class="pro-quantity"> {{ $item->qty }}</span>
                                                    </div>
                                                    <div class="cart-content">
                                                        <h6><a href="product.html"> {{ $item->name }} </a></h6>
                                                        <span class="cart-price">Rp. {{ number_format($item->price) }} </span>
                                                        {{-- <span>Size: S</span>
                                                        <span>Color: Yellow</span> --}}
                                                    </div>
                                                    <a class="del-icone" href="{{ url('/frontend/remove-cart', $item->rowId) }}" onclick="return confirm('Anda yakin menghapus produk ini dari keranjang?')"><i class="ion-close"></i></a>
                                                </div>
                                                @endforeach
                                                <!-- Cart Box End -->
                                                <!-- Cart Box Start -->
                                                {{-- <div class="single-cart-box">
                                                    <div class="cart-img">
                                                        <a href="#"><img src="img/products/2.jpg" alt="cart-image"></a>
                                                        <span class="pro-quantity">1X</span>
                                                    </div>
                                                    <div class="cart-content">
                                                        <h6><a href="product.html">Printed Round Neck</a></h6>
                                                        <span class="cart-price">45.00</span>
                                                        <span>Size: XL</span>
                                                        <span>Color: Green</span>
                                                    </div>
                                                    <a class="del-icone" href="#"><i class="ion-close"></i></a>
                                                </div> --}}
                                                <!-- Cart Box End -->
                                                <!-- Cart Footer Inner Start -->
                                                <div class="cart-footer">
                                                   <ul class="price-content">
                                                       {{-- <li>Subtotal <span>Rp. {{ Cart::instance('default')->subtotal() }}</span></li> --}}
                                                       {{-- <li>Shipping <span>$7.00</span></li>
                                                       <li>Taxes <span>$0.00</span></li> --}}
                                                        @php
                                                            $money = explode('.', Cart::instance('default')->subtotal());
                                                            $total = $money[0];
                                                        @endphp
                                                       <li>Total <span>Rp. {{ $total }}</span></li>
                                                   </ul>
                                                    <div class="cart-actions text-center">
                                                        @if ( Cart::content()->count() == 0)
                                                            <a class="cart-checkout" href="{{ url('/frontend/toko/all') }}">Kembali Berbelanja</a>
                                                        @else
                                                            @if (Auth::check())
                                                                <a href="{{ url('/frontend/cart') }}">Proceed to Checkout</a>
                                                            @else
                                                                <a href="{{ url('/frontend/cart') }}">Proceed to Checkout</a>
                                                            @endif
                                                        @endif
                                                    </div>
                                                </div>
                                                <!-- Cart Footer Inner End -->
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Cart Box End Here -->
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Header Middle End Here -->
            <!-- Header Bottom Start Here -->
            <div class="header-bottom dark-blue-bg header-sticky">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-9 col-lg-9 col-md-12 ">
                            <nav class="d-none d-lg-block">
                                <ul class="header-bottom-list d-flex">
                                    <li class="{{ Request::is('frontend/home') ? 'active' : '' }}"><a href="/">Beranda</a></li>
                                    <li class="{{ Request::is('frontend/toko/all') ? 'active' : '' }}">
                                        @if(Auth::user()->id_cms_privileges == 8)
                                            <a href="{{ url('/frontend/toko/pec') }}">Toko</a>
                                        @else
                                            <a href="{{ url('/frontend/toko/all') }}">Toko</a>
                                        @endif
                                    </li>
                                    <li class="{{ Request::is('frontend/tentang-kami') ? 'active' : '' }}"><a href="{{ url('/frontend/tentang-kami') }}">Tentang kami</a></li>
                                     <li class="{{ Request::is('frontend/kontak') ? 'active' : '' }}"><a href="{{ url('/frontend/kontak') }}">Kontak</a></li> 
                                     <li class="{{ Request::is('frontend/marketplace') ? 'active' : '' }}"><a href="{{ url('/frontend/marketplace') }}">Marketplace</a></li>
                                </ul>
                            </nav>
                            <div class="mobile-menu d-block d-lg-none">
                                <nav>
                                    <ul>
                                        <li class="active"><a href="/">Beranda</i></a></li>
                                        <li>
                                            @if(Auth::user()->id_cms_privileges == 8)
                                                <a href="{{ url('/frontend/toko/pec') }}">Toko</a>
                                            @else
                                                <a href="{{ url('/frontend/toko/all') }}">Toko</a>
                                            @endif
                                        </li>
                                        <li><a href="{{ url('frontend/tentang-kami') }}">Tentang kami</a></li>
                                        <li><a href="{{ url('frontend/kontak') }}">Kontak</a></li>
                                        <li><a href="{{ url('frontend/marketplace') }}">Marketplace</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 text-right">
                            <span class="header-right"><i class="ion-ios-telephone"></i> <span class="header-helpline">(+62) 21-55732369</span></span>
                        </div>
                    </div>
                    <!-- Row End -->
                </div>
                <!-- Container End -->
            </div>
            <!-- Header Bottom End Here -->
            <!-- Mobile Vertical Menu Start Here -->
            <!-- <div class="container d-block d-lg-none">
                <div class="vertical-menu mt-30">
                    <span class="categorie-title mobile-categorei-menu">kategori <i class="fa fa-angle-down"></i></span>
                    <nav>  
                        <div id="cate-mobile-toggle" class="category-menu sidebar-menu sidbar-style mobile-categorei-menu-list menu-hidden ">
                            <ul>
                                 @foreach($kategori as $kategoris)
                                <li class="has-sub"><a href="#">{{ $kategoris->nama_kategori }}</a>
                                    <ul class="category-sub">
                                        @php
                                            $subKategori = App\Models\TbSubKategori::where('id_kategori', $kategoris->id)->orderBy('nama_sub_kategori')->get();
                                        @endphp

                                        @foreach($subKategori as $subKategoris)
                                        <li><a href="{{ url('/frontend/toko/sub-kategori', $subKategoris->id) }}">{{ $subKategoris->nama_sub_kategori }}</a></li>
                                        @endforeach
                                    </ul> -->
                                    <!-- category submenu end-->
                                <!-- </li>
                                @endforeach
                            </ul>
                        </div> -->
                        <!-- category-menu-end -->
                    <!-- </nav>
                </div>
            </div> -->
            <!-- Mobile Vertical Menu Start End -->