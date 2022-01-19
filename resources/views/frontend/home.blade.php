<!doctype html>
<html class="no-js" lang="zxx">

<head>
    @include('frontend.include.header')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <meta name="facebook-domain-verification" content="ne72moz88sckdwpz9p01oi9g7was3g" />
    
    <!-- Facebook Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '2952741314995431');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=2952741314995431&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Facebook Pixel Code -->
</head>

<body>
    <!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

    <!-- Main Wrapper Start Here -->
    <div class="page-wrapper">
       <!-- Newsletter Popup Start -->
        {{-- <div class="popup_wrapper">
            <div class="test">
                <span class="popup_off">Close</span>
                <div class="subscribe_area text-center mt-60">
                    <h2>Newsletter</h2>
                    <p>Subscribe to the Volga mailing list to receive updates on new arrivals, special offers and other discount information.</p>
                    <div class="subscribe-form-group">
                        <form action="#">
                            <input autocomplete="off" type="text" name="message" id="message" placeholder="Enter your email address">
                            <button type="submit">subscribe</button>
                        </form>
                    </div>
                    <div class="subscribe-bottom mt-15">
                        <input type="checkbox" id="newsletter-permission">
                        <label for="newsletter-permission">Don't show this popup again</label>
                    </div>
                </div>
            </div>
        </div> --}}
        <!-- Newsletter Popup End -->
        <!-- Main Header Area Start Here -->
        <header>
            <!-- Header Top Start Here -->
            @include('frontend.include.navbar')
            <!-- Header Top End Here -->
        </header>
        
        <main class="main">
            <div class="slideshow-container">
                <div class="home slide">
                    <img src="{{URL::asset('frontend/img/slider/banner1.jpeg')}}" data-thumb="{{URL::asset('frontend/img/slider/banner1.jpeg')}}" alt="" style="width: 100%" />
                    </div>
                        <div class="home slide">
                            <img src="{{URL::asset('frontend/img/slider/banner2.jpeg')}}" data-thumb="{{URL::asset('frontend/img/slider/banner2.jpeg')}}" alt="" style="width: 100%" />
                        </div>
                        <div class="home slide">
                           <img src="{{URL::asset('frontend/img/slider/banner3.jpeg')}}" data-thumb="{{URL::asset('frontend/img/slider/banner3.jpeg')}}" alt="" style="width:100%"/>
                        </div>
                         <div class="home slide">
                           <img src="{{URL::asset('frontend/img/slider/banner5.jpg')}}" data-thumb="{{URL::asset('frontend/img/slider/banner5.jpg')}}" alt="" style="width:100%"/>
                        </div>
                        <div class="home slide">
                           <img src="{{URL::asset('frontend/img/slider/banner6.jpg')}}" data-thumb="{{URL::asset('frontend/img/slider/banner6.jpg')}}" alt="" style="width:100%"/>
                        </div>
                        <div class="home slide">
                           <img src="{{URL::asset('frontend/img/slider/banner7.jpg')}}" data-thumb="{{URL::asset('frontend/img/slider/banner7.jpg')}}" alt="" style="width:100%"/>
                        </div>
                        <div class="home slide">
                           <img src="{{URL::asset('frontend/img/slider/banner13.jpg')}}" data-thumb="{{URL::asset('frontend/img/slider/banner13.jpg')}}" alt="" style="width:100%"/>
                        </div>
                        <div class="home slide">
                           <img src="{{URL::asset('frontend/img/slider/banner8.jpg')}}" data-thumb="{{URL::asset('frontend/img/slider/banner8.jpg')}}" alt="" style="width:100%"/>
                        </div>
                        <div class="home slide">
                           <img src="{{URL::asset('frontend/img/slider/banner9.jpg')}}" data-thumb="{{URL::asset('frontend/img/slider/banner9.jpg')}}" alt="" style="width:100%"/>
                        </div>
                         <div class="home slide">
                           <img src="{{URL::asset('frontend/img/slider/banner10.jpg')}}" data-thumb="{{URL::asset('frontend/img/slider/banner10.jpg')}}" alt="" style="width:100%"/>
                        </div>
                         <div class="home slide">
                           <img src="{{URL::asset('frontend/img/slider/banner11.jpg')}}" data-thumb="{{URL::asset('frontend/img/slider/banner11.jpg')}}" alt="" style="width:100%"/>
                        </div>
                         <div class="home slide">
                           <img src="{{URL::asset('frontend/img/slider/banner12.jpg')}}" data-thumb="{{URL::asset('frontend/img/slider/banner12.jpg')}}" alt="" style="width:100%"/>
                        </div>
                    </div>
                <div style="text-align:center">
                  <span class="dot"></span> 
                  <span class="dot"></span>
                  <span class="dot"></span>

                </div>

                    <script>
                    var slideIndex = 0;
                    showSlides();

                    function showSlides() {
                        var i;
                        var slides = document.getElementsByClassName("home");
                        var dots = document.getElementsByClassName("dot");
                        for (i = 0; i < slides.length; i++) {
                           slides[i].style.display = "none";  
                        }
                        slideIndex++;
                        if (slideIndex> slides.length) {slideIndex = 1}    
                        for (i = 0; i < dots.length; i++) {
                            dots[i].className = dots[i].className.replace("active", "");
                        }
                        slides[slideIndex-1].style.display = "block";
                        setTimeout(showSlides, 5000); // Change image every 5 seconds
                    }
                    </script>
                </main>
        <!-- Electronics Products Area End Here -->
        <!-- Tv & Video Products Area Start Here -->
        <div class="tv-video pb-45">
            <div class="container">
                <div class="row">
                    <!-- Electronics Banner Start -->
                    <!-- <div class="col-xl-3 col-lg-4 col-md-5"> -->
                        <!-- Post Title Start -->
                        <!-- <div class="post-title">
                            <h2><i class="ion-ribbon-b" aria-hidden="true"></i>Kategori</h2>
                        </div> -->
                        <!-- Post Title End -->
                        <!-- <div class="single-banner">
                            <a href="#"><img src="{{URL::asset('frontend/img/banner/Paket Bunndling.jpg')}}" alt="" height="270"></a>
                        </div> -->
                    </div>
                <br>
            <!-- Electronics Banner End -->
                <div class="container-fluid">
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="products-hot-deal"> 
                            <!-- Nav tabs -->
                            <ul class="nav nav-pills mb-3">
                                @foreach($kategori as $kategoris)
                                    @if($kategoris->id == 1)
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#kategori_{{$kategoris->id}}">{{$kategoris->nama_kategori}}</a>
                                        </li>
                                    @else
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#kategori_{{$kategoris->id}}">{{$kategoris->nama_kategori}}</a>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                            <br>
                            <br>
                            <!-- Tab Content Start -->
                            <div class="tab-content">
                            @foreach($kategori as $kategoris)
                                @if($kategoris->id == 1)
                                    <div id="kategori_{{$kategoris->id}}" class="tab-pane fade show active">
                                @else
                                    <div id="kategori_{{$kategoris->id}}" class="tab-pane fade">
                                @endif
                                @php
                                    $produk = App\Models\TbProduk::where('id_kategori', $kategoris->id)->inRandomOrder()->limit(20)->get();
                                    for ($i=0; $i < sizeof($produk); $i++) {
                                        $gambar = App\Models\TbGambarProduk::where('id_produk', $produk[$i]->id)->where('gambar_utama', 1)->first();

                                        if(!empty($gambar)) {
                                            $produk[$i]['gambar'] = $gambar;
                                        } else {
                                            $produk[$i]['gambar'] = App\Models\TbGambarProduk::where('id_produk', $produk[$i]->id)->inRandomOrder()->first();
                                        }

                                        if (Auth::check()) {
                                            $produk[$i]['harga'] = App\Models\TbHargaProduk::where('id_produk', $produk[$i]->id)->where('jenis_harga', 'Wholesale')->first();
                                        } else {
                                            $produk[$i]['harga'] = App\Models\TbHargaProduk::where('id_produk', $produk[$i]->id)->where('jenis_harga', 'Retail')->first();
                                        }

                                        $produk[$i]['diskon'] = $produk[$i]['harga']->harga * $produk[$i]['harga']->diskon / 100;
                                        $produk[$i]['harga_diskon'] = $produk[$i]['harga']->harga - $produk[$i]['diskon'];

                                        $produk[$i]['warna'] = App\Models\TbWarnaProduk::where('id_produk', $produk[$i]->id)->get();

                                        if (str_word_count($produk[$i]->judul) >= 3) {
                                            $explode = explode(" ", $produk[$i]->judul);
                                            $produk[$i]['judul1'] = $explode[0]." ".$explode[1]." ".$explode[2];

                                            unset($explode[0]);
                                            unset($explode[1]);
                                            unset($explode[2]);

                                            $implode = implode(" ", $explode);
                                            $produk[$i]['judul2'] = $implode;
                                        } else {
                                            $produk[$i]['judul1'] = $produk[$i]->judul;
                                            $produk[$i]['judul2'] = "";
                                        }
                                    }
                                    $j = 0;
                                @endphp
                                    <!-- Electronics Product Activation Start Here -->
                                    <div class="electronics-pro-active owl-carousel">
                                        <!-- Double Product Start -->
                                        <div class="single-product">
                                        @foreach($produk as $k => $v)
                                        @php
                                            $j++;
                                            $url_new = urlencode($v->kode_sku);
                                        @endphp
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    {{-- <a href="{{ url('/frontend/produk-detail', $url_new) }}"> --}}
                                                        {{-- <img class="primary-img" src="img/products/8.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/7.jpg" alt="single-product"> --}}
                                            @if($v->gambar['gambar'])
                                                <img style="height: 230px;width: 200px;" class="primary-img" src="{{ env('APP_URL') }}/{{ $v->gambar['gambar'] }}" alt="single-product">
                                            @else
                                                <img style="height: 230px;width: 200px;" class="primary-img" src="{{ asset('frontend/img/logo/default.jpg') }}" alt="single-product">
                                            @endif
                                            {{-- </a> --}}
                                            @if($v->harga->diskon != 0)
                                                <span class="sticker-sale">-{{ number_format($v->harga->diskon) }}%</span>
                                            @endif
                                        </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="{{ url('/frontend/produk-detail', $url_new) }}">{{ $v->judul }}</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    @if(Auth::check())
                                                        <p>
                                                            <span class="price">
                                                                Rp. {{ number_format($v->harga->harga) }}
                                                            </span>
                                                        </p>
                                                    @else
                                                        @if($v->harga->diskon != 0)
                                                            <p><span class="price">
                                                                    Rp. {{ number_format($v->harga_diskon) }}
                                                                </span> <br>
                                                                <del class="prev-price">
                                                                    Rp. {{ number_format($v->harga->harga) }}
                                                                </del>
                                                            </p>
                                                        @else
                                                            <p>
                                                                <span class="price">
                                                                    Rp. {{ number_format($v->harga->harga) }}
                                                                </span>
                                                            </p>
                                                        @endif
                                                    @endif
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <form action="{{ url('/frontend/cart') }}" method="POST" id="formCartKategori{{ $v->id }}">
                                                            {!! csrf_field() !!}
                                                            <input type="hidden" name="kode_sku" value="{{ $v->kode_sku }}">
                                                            <input type="hidden" name="judul" value="{{ $v->judul }}">
                                                            @if(Auth::check())
                                                                <input type="hidden" name="harga" value="{{ $v->harga->harga }}">
                                                            @else
                                                                @if($item->harga->diskon != 0)
                                                                    <input type="hidden" name="harga" value="{{ $v->harga_diskon }}">
                                                                @else
                                                                    <input type="hidden" name="harga" value="{{ $v->harga->harga }}">
                                                                @endif
                                                            @endif
                                                        </form>
                                                        
                                                        @if(Auth::check() && Auth::user()->id_cms_privileges != 8)
                                                        <div class="actions-primary">
                                                            <a href="#" title="Add to Cart" onclick="document.getElementById('formCartKategori{{ $v->id }}').submit();">Add To Cart</a>
                                                        </div>
                                                        @endif
                                                        </div>
                                                        {{-- <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="{{ url('/frontend/produk-detail', $url_new) }}" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                            <!-- Single Product Start -->
                                            <!-- Single Product End -->
                                            @if($j==2)
                                                @php
                                                    $j = 0;
                                                @endphp
                                            @endif
                                        </div>
                                        <div class="double-product">
                                        @endforeach
                                        </div>
                                        <!-- Double Product End -->
                                    </div>
                                    <!-- Electronics Product Activation End Here -->
                                </div>
                                <!-- #g-desktop End Here -->
                                {{-- <div id="towers" class="tab-pane fade">
                                    <!-- Electronics Product Activation Start Here -->
                                    <div class="electronics-pro-active owl-carousel">
                                        <!-- Double Product Start -->
                                        <div class="double-product">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="produkdetail">
                                                        <img class="primary-img" src="img/products/30.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/29.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">Printed Summer Dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <p><span class="price">$30</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="produkdetail">
                                                        <img class="primary-img" src="img/products/10.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/9.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="produkdetail">printed dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p><span class="price">$25.00</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <!-- Double Product End -->
                                        <!-- Double Product Start -->
                                        <div class="double-product">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="produkdetail">
                                                        <img class="primary-img" src="img/products/14.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/15.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">winter Dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <p><span class="price">$30</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            Single Product End
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/11.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/12.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="produkdetail">printed chiffon dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p><span class="price">$25.00</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <!-- Double Product End -->
                                        <!-- Double Product Start -->
                                        <div class="double-product">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="produkdetail">
                                                        <img class="primary-img" src="img/products/21.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/22.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="produkdetail">Printed festvie Dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <p><span class="price">$30</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/7.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/8.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">printeddress dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p><span class="price">$25.00</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <!-- Double Product End -->
                                    </div>
                                    <!-- Electronics Product Activation End Here -->
                                </div> --}}
                                <!-- #towers End Here -->
                            @endforeach
                            </div>
                            <!-- Tab Content End -->
                        </div>
                        <!-- main-product-tab-area-->
                    </div>
                </div>
            </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Tv & Video Products Area End Here -->
        <!-- Second Electronics Products Area Start Here -->
        <!-- Second Electronics Products Area End Here -->
        <!-- Hot Deal Products Start Here -->
        @if(count($produkTrending) > 0)
        <div class="hot-deal-products pb-45">
            <div class="container">
               <!-- Post Title Start -->
               <!-- <div class="post-title">
                   <h2>Produk Pre Order</h2>
               </div> -->
               <!-- Post Title End -->
                <!-- <div class="row"> -->
                    <!-- Hot Deal Left Banner Start -->
                    <!-- <div class="col-xl-3 col-lg-4 col-md-5">
                        <div class="single-banner">
                            <a href="#"><img src="{{URL::asset('frontend/img/banner/po.jpeg')}}" alt="" height="328"></a>
                        </div>
                    </div> -->
                    <!-- Hot Deal Left Banner End -->
                    <!-- Hot Deal Product Activation Start -->
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="main-hot-deal">
                            <!-- Hot Deal Product Active Start -->
                            <div class="hot-deal-active owl-carousel">
                                <!-- Single Product Start -->
                                @foreach($produkTrending as $k => $v)
                                @php
                                    $url_new = urlencode($v->kode_sku);
                                @endphp
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        {{-- <a href="{{ url('/frontend/produk-detail', $url_new) }}"> --}}
                                            @if($v->gambar['gambar'])
                                                <img style="height: 230px;width: 200px;" class="primary-img" src="{{ env('APP_URL') }}/{{ $v->gambar['gambar'] }}" alt="single-product">
                                            @else
                                                <img style="height: 230px;width: 200px;" class="primary-img" src="{{ asset('frontend/img/logo/default.jpg') }}" alt="single-product">
                                            @endif
                                            {{-- <img class="secondary-img" src="img/products/7.jpg" alt="single-product"> --}}
                                        {{-- </a> --}}
                                        {{-- <div class="countdown" data-countdown="2020/03/01"></div> --}}
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="{{ url('/frontend/produk-detail', $url_new) }}">{{ $v->judul1 }} {{ $v->judul2 }}</a></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            @if(Auth::check())
                                                @if($v->harga->diskon != 0)
                                                    <p><span class="price">
                                                            Rp. {{ number_format($v->harga_diskon) }}
                                                        </span> <br>
                                                        <del class="prev-price">
                                                            Rp. {{ number_format($v->harga->harga) }}
                                                        </del>
                                                    </p>
                                                @else
                                                    <p>
                                                        <span class="price">
                                                            Rp. {{ number_format($v->harga->harga) }}
                                                        </span>
                                                    </p>
                                                @endif
                                            @else
                                                <p>
                                                    <span class="price">
                                                        Rp. {{ number_format($v->harga->harga) }}
                                                    </span>
                                                </p>
                                            @endif
                                            {{-- <p><span class="price">$27.45</span><del class="prev-price">$30.50</del></p> --}}
                                        </div>
                                        <div class="pro-actions">
                                            {{-- <form action="{{ url('/frontend/wishlist') }}" method="POST" id="formWishlist">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="kode_sku" value="{{ $v->kode_sku }}">
                                                <input type="hidden" name="judul" value="{{ $v->judul }}">
                                                @if($v->harga->diskon != 0)
                                                    <input type="hidden" name="harga" value="{{ $v->harga_diskon }}">
                                                @else
                                                    <input type="hidden" name="harga" value="{{ $v->harga->harga }}">
                                                @endif
                                            </form> --}}
                                            <form action="{{ url('/frontend/cart') }}" method="POST" id="formCartPromo{{ $v->id }}">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="kode_sku" value="{{ $v->kode_sku }}">
                                                <input type="hidden" name="judul" value="{{ $v->judul }}">
                                                @if($v->harga->diskon != 0)
                                                    <input type="hidden" name="harga" value="{{ $v->harga_diskon }}">
                                                @else
                                                    <input type="hidden" name="harga" value="{{ $v->harga->harga }}">
                                                @endif
                                            </form>
                                            @if(Auth::check() && Auth::user()->id_cms_privileges != 8)
                                            <div class="actions-primary">
                                                <a href="#" title="Add to Cart" onclick="document.getElementById('formCartPromo{{ $v->id }}').submit();">Add To Cart</a>
                                            </div>
                                            @endif
                                            {{-- <div class="actions-secondary">
                                                <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                <a href="{{ url('/frontend/produk-detail', $url_new) }}" title="Details"><i class="fa fa-signal"></i></a>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                    @if($v->harga->diskon != 0)
                                    <span class="sticker-sale">-{{ number_format($v->harga->diskon) }}%</span>
                                    @endif
                                </div>
                                @endforeach
                                <!-- Single Product End -->
                            </div>
                            <!-- Hot Deal Product Active End -->
                        </div>
                    </div>
                    <!-- Hot Deal Product Activation End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        @endif
        <!-- Hot Deal Products End Here -->

        <!-- Hot Deal Products Start Here -->
        @if(count($produkBaru) > 0)
        <div class="hot-deal-products pb-45">
            <div class="container">
               <!-- Post Title Start -->
               <!-- <div class="post-title">
                   <h2>Produk Baru</h2>
               </div> -->
               <!-- Post Title End -->
                <!-- <div class="row"> -->
                    <!-- Hot Deal Left Banner Start -->
                    <!-- <div class="col-xl-3 col-lg-4 col-md-5">
                        <div class="single-banner">
                            <a href="#"><img src="{{URL::asset('frontend/img/banner/baru.jpeg')}}" alt="" height="328"></a>
                        </div>
                    </div> -->
                    <!-- Hot Deal Left Banner End -->
                    <!-- Hot Deal Product Activation Start -->
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="main-hot-deal">
                            <!-- Hot Deal Product Active Start -->
                            <div class="hot-deal-active owl-carousel">
                                <!-- Single Product Start -->
                                @foreach($produkBaru as $k => $v)
                                @php
                                    $url_new = urlencode($v->kode_sku);
                                @endphp
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        {{-- <a href="{{ url('/frontend/produk-detail', $url_new) }}"> --}}
                                            @if($v->gambar['gambar'])
                                                <img style="height: 230px;width: 200px;" class="primary-img" src="{{ env('APP_URL') }}/{{ $v->gambar['gambar'] }}" alt="single-product">
                                            @else
                                                <img style="height: 230px;width: 200px;" class="primary-img" src="{{ asset('frontend/img/logo/default.jpg') }}" alt="single-product">
                                            @endif
                                            {{-- <img class="secondary-img" src="img/products/7.jpg" alt="single-product"> --}}
                                        {{-- </a> --}}
                                        {{-- <div class="countdown" data-countdown="2020/03/01"></div> --}}
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="{{ url('/frontend/produk-detail', $url_new) }}">{{ $v->judul1 }} {{ $v->judul2 }}</a></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            @if(Auth::check())
                                                @if($v->harga->diskon != 0)
                                                    <p><span class="price">
                                                            Rp. {{ number_format($v->harga_diskon) }}
                                                        </span> <br>
                                                        <del class="prev-price">
                                                            Rp. {{ number_format($v->harga->harga) }}
                                                        </del>
                                                    </p>
                                                @else
                                                    <p>
                                                        <span class="price">
                                                            Rp. {{ number_format($v->harga->harga) }}
                                                        </span>
                                                    </p>
                                                @endif
                                            @else
                                                <p>
                                                    <span class="price">
                                                        Rp. {{ number_format($v->harga->harga) }}
                                                    </span>
                                                </p>
                                            @endif
                                            {{-- <p><span class="price">$27.45</span><del class="prev-price">$30.50</del></p> --}}
                                        </div>
                                        <div class="pro-actions">
                                            {{-- <form action="{{ url('/frontend/wishlist') }}" method="POST" id="formWishlist">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="kode_sku" value="{{ $v->kode_sku }}">
                                                <input type="hidden" name="judul" value="{{ $v->judul }}">
                                                @if($v->harga->diskon != 0)
                                                    <input type="hidden" name="harga" value="{{ $v->harga_diskon }}">
                                                @else
                                                    <input type="hidden" name="harga" value="{{ $v->harga->harga }}">
                                                @endif
                                            </form> --}}
                                            <form action="{{ url('/frontend/cart') }}" method="POST" id="formCartPromo{{ $v->id }}">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="kode_sku" value="{{ $v->kode_sku }}">
                                                <input type="hidden" name="judul" value="{{ $v->judul }}">
                                                @if($v->harga->diskon != 0)
                                                    <input type="hidden" name="harga" value="{{ $v->harga_diskon }}">
                                                @else
                                                    <input type="hidden" name="harga" value="{{ $v->harga->harga }}">
                                                @endif
                                            </form>
                                            @if(Auth::check() && Auth::user()->id_cms_privileges != 8)
                                            <div class="actions-primary">
                                                <a href="#" title="Add to Cart" onclick="document.getElementById('formCartPromo{{ $v->id }}').submit();">Add To Cart</a>
                                            </div>
                                            @endif
                                            {{-- <div class="actions-secondary">
                                                <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                <a href="{{ url('/frontend/produk-detail', $url_new) }}" title="Details"><i class="fa fa-signal"></i></a>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                    @if($v->harga->diskon != 0)
                                    <span class="sticker-sale">-{{ number_format($v->harga->diskon) }}%</span>
                                    @endif
                                </div>
                                @endforeach
                                <!-- Single Product End -->
                            </div>
                            <!-- Hot Deal Product Active End -->
                        </div>
                    </div>
                    <!-- Hot Deal Product Activation End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        @endif
        <!-- Hot Deal Products End Here -->
        <!-- Hot Deal Products Start Here -->
        @if(count($produkPromo) > 0)
        <div class="hot-deal-products pb-45">
            <div class="container">
               <!-- Post Title Start -->
              <!--  <div class="post-title">
                   <h2>Produk Promo</h2>
               </div> -->
               <!-- Post Title End -->
                <!-- <div class="row"> -->
                    <!-- Hot Deal Left Banner Start -->
                    <!-- <div class="col-xl-3 col-lg-4 col-md-5">
                        <div class="single-banner">
                            <a href="#"><img src="{{URL::asset('frontend/img/banner/promo.jpeg')}}" alt="" height="328"></a>
                        </div>
                    </div> -->
                    <!-- Hot Deal Left Banner End -->
                    <!-- Hot Deal Product Activation Start -->
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="main-hot-deal">
                            <!-- Hot Deal Product Active Start -->
                            <div class="hot-deal-active owl-carousel">
                                <!-- Single Product Start -->
                                @foreach($produkPromo as $k => $v)
                                @php
                                    $url_new = urlencode($v->kode_sku);
                                @endphp
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        {{-- <a href="{{ url('/frontend/produk-detail', $url_new) }}"> --}}
                                            @if($v->gambar['gambar'])
                                                <img style="height: 230px;width: 200px;" class="primary-img" src="{{ env('APP_URL') }}/{{ $v->gambar['gambar'] }}" alt="single-product">
                                            @else
                                                <img style="height: 230px;width: 200px;" class="primary-img" src="{{ asset('frontend/img/logo/default.jpg') }}" alt="single-product">
                                            @endif

                                            {{-- <img class="secondary-img" src="img/products/7.jpg" alt="single-product"> --}}
                                        {{-- </a> --}}
                                        {{-- <div class="countdown" data-countdown="2020/03/01"></div> --}}
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="{{ url('/frontend/produk-detail', $url_new) }}">{{ $v->judul1 }} {{ $v->judul2 }}</a></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            @if(Auth::check())
                                                @if($v->harga->diskon != 0)
                                                    <p><span class="price">
                                                            Rp. {{ number_format($v->harga_diskon) }}
                                                        </span> <br>
                                                        <del class="prev-price">
                                                            Rp. {{ number_format($v->harga->harga) }}
                                                        </del>
                                                    </p>
                                                @else
                                                    <p>
                                                        <span class="price">
                                                            Rp. {{ number_format($v->harga->harga) }}
                                                        </span>
                                                    </p>
                                                @endif
                                            @else
                                                <p>
                                                    <span class="price">
                                                        Rp. {{ number_format($v->harga->harga) }}
                                                    </span>
                                                </p>
                                            @endif
                                            {{-- <p><span class="price">$27.45</span><del class="prev-price">$30.50</del></p> --}}
                                        </div>
                                        <div class="pro-actions">
                                            {{-- <form action="{{ url('/frontend/wishlist') }}" method="POST" id="formWishlist">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="kode_sku" value="{{ $v->kode_sku }}">
                                                <input type="hidden" name="judul" value="{{ $v->judul }}">
                                                @if($v->harga->diskon != 0)
                                                    <input type="hidden" name="harga" value="{{ $v->harga_diskon }}">
                                                @else
                                                    <input type="hidden" name="harga" value="{{ $v->harga->harga }}">
                                                @endif
                                            </form> --}}
                                            <form action="{{ url('/frontend/cart') }}" method="POST" id="formCartPromo{{ $v->id }}">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="kode_sku" value="{{ $v->kode_sku }}">
                                                <input type="hidden" name="judul" value="{{ $v->judul }}">
                                                @if($v->harga->diskon != 0)
                                                    <input type="hidden" name="harga" value="{{ $v->harga_diskon }}">
                                                @else
                                                    <input type="hidden" name="harga" value="{{ $v->harga->harga }}">
                                                @endif
                                            </form>
                                            @if(Auth::check() && Auth::user()->id_cms_privileges != 8)
                                            <div class="actions-primary">
                                                <a href="#" title="Add to Cart" onclick="document.getElementById('formCartPromo{{ $v->id }}').submit();">Add To Cart</a>
                                            </div>
                                            @endif
                                            {{-- <div class="actions-secondary">
                                                <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                <a href="{{ url('/frontend/produk-detail', $url_new) }}" title="Details"><i class="fa fa-signal"></i></a>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                    @if($v->harga->diskon != 0)
                                    <span class="sticker-sale">-{{ number_format($v->harga->diskon) }}%</span>
                                    @endif
                                </div>
                                @endforeach
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                {{-- <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="img/products/17.jpg" alt="single-product">
                                            <img class="secondary-img" src="img/products/24.jpg" alt="single-product">
                                        </a>
                                        <div class="countdown" data-countdown="2020/01/01"></div>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="product.html">printed dress</a></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <p><span class="price">$24.69</span><del class="prev-price">$25.00</del></p>
                                        </div>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                </div> --}}
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                {{-- <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="img/products/16.jpg" alt="single-product">
                                            <img class="secondary-img" src="img/products/33.jpg" alt="single-product">
                                        </a>
                                        <div class="countdown" data-countdown="2020/05/01"></div>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="product.html">printed hot dress</a></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p><span class="price">$45.89</span><del class="prev-price">$50.00</del></p>
                                        </div>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                     <span class="sticker-new">new</span>
                                     <span class="sticker-sale">-10%</span>
                                </div> --}}
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                {{-- <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="img/products/19.jpg" alt="single-product">
                                            <img class="secondary-img" src="img/products/18.jpg" alt="single-product">
                                        </a>
                                        <div class="countdown" data-countdown="2020/05/01"></div>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="product.html">printed chiffon dress</a></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <p><span class="price">$16.40</span><del class="prev-price">$20.50</del></p>
                                        </div>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                     <span class="sticker-sale">-12%</span>
                                </div> --}}
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                {{-- <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="img/products/12.jpg" alt="single-product">
                                            <img class="secondary-img" src="img/products/11.jpg" alt="single-product">
                                        </a>
                                        <div class="countdown" data-countdown="2019/05/01"></div>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="product.html"> cool dress</a></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <p><span class="price">$19.40</span><del class="prev-price">$22.00</del></p>
                                        </div>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                     <span class="sticker-new">new</span>
                                     <span class="sticker-sale">-10%</span>
                                </div> --}}
                                <!-- Single Product End -->
                            </div>
                            <!-- Hot Deal Product Active End -->
                        </div>
                    </div>
                    <!-- Hot Deal Product Activation End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        @endif
        <!-- Hot Deal Products End Here -->

        <!-- Hot Deal Products Start Here -->
        @if(count($produkHargaTerbaik) > 0)
        <div class="hot-deal-products pb-45">
            <div class="container">
               <!-- Post Title Start -->
               <!-- <div class="post-title">
                   <h2>Produk Best Seller</h2>
               </div> -->
               <!-- Post Title End -->
                <!-- <div class="row"> -->
                    <!-- Hot Deal Left Banner Start -->
                    <!-- <div class="col-xl-3 col-lg-4 col-md-5">
                        <div class="single-banner">
                            <a href="#"><img src="{{URL::asset('frontend/img/banner/best.jpeg')}}" alt="" height="328"></a>
                        </div>
                    </div> -->
                    <!-- Hot Deal Left Banner End -->
                    <!-- Hot Deal Product Activation Start -->
                    <div class="col-xl-12 col-lg-12 col-md-12">
                        <div class="main-hot-deal">
                            <!-- Hot Deal Product Active Start -->
                            <div class="hot-deal-active owl-carousel">
                                <!-- Single Product Start -->
                                @foreach($produkHargaTerbaik as $k => $v)
                                @php
                                    $url_new = urlencode($v->kode_sku);
                                @endphp
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        {{-- <a href="{{ url('/frontend/produk-detail', $url_new) }}"> --}}
                                            @if($v->gambar['gambar'])
                                                <img style="height: 230px;width: 200px;" class="primary-img" src="{{ env('APP_URL') }}/{{ $v->gambar['gambar'] }}" alt="single-product">
                                            @else
                                                <img style="height: 230px;width: 200px;" class="primary-img" src="{{ asset('frontend/img/logo/default.jpg') }}" alt="single-product">
                                            @endif
                                            {{-- <img class="secondary-img" src="img/products/7.jpg" alt="single-product"> --}}
                                        {{-- </a> --}}
                                        {{-- <div class="countdown" data-countdown="2020/03/01"></div> --}}
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="{{ url('/frontend/produk-detail', $url_new) }}">{{ $v->judul1 }} {{ $v->judul2 }}</a></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            @if(Auth::check())
                                                @if($v->harga->diskon != 0)
                                                    <p><span class="price">
                                                            Rp. {{ number_format($v->harga_diskon) }}
                                                        </span> <br>
                                                        <del class="prev-price">
                                                            Rp. {{ number_format($v->harga->harga) }}
                                                        </del>
                                                    </p>
                                                @else
                                                    <p>
                                                        <span class="price">
                                                            Rp. {{ number_format($v->harga->harga) }}
                                                        </span>
                                                    </p>
                                                @endif
                                            @else
                                                <p>
                                                    <span class="price">
                                                        Rp. {{ number_format($v->harga->harga) }}
                                                    </span>
                                                </p>
                                            @endif
                                            {{-- <p><span class="price">$27.45</span><del class="prev-price">$30.50</del></p> --}}
                                        </div>
                                        <div class="pro-actions">
                                            {{-- <form action="{{ url('/frontend/wishlist') }}" method="POST" id="formWishlist">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="kode_sku" value="{{ $v->kode_sku }}">
                                                <input type="hidden" name="judul" value="{{ $v->judul }}">
                                                @if($v->harga->diskon != 0)
                                                    <input type="hidden" name="harga" value="{{ $v->harga_diskon }}">
                                                @else
                                                    <input type="hidden" name="harga" value="{{ $v->harga->harga }}">
                                                @endif
                                            </form> --}}
                                            <form action="{{ url('/frontend/cart') }}" method="POST" id="formCartPromo{{ $v->id }}">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="kode_sku" value="{{ $v->kode_sku }}">
                                                <input type="hidden" name="judul" value="{{ $v->judul }}">
                                                @if($v->harga->diskon != 0)
                                                    <input type="hidden" name="harga" value="{{ $v->harga_diskon }}">
                                                @else
                                                    <input type="hidden" name="harga" value="{{ $v->harga->harga }}">
                                                @endif
                                            </form>
                                            @if(Auth::check() && Auth::user()->id_cms_privileges != 8)
                                            <div class="actions-primary">
                                                <a href="#" title="Add to Cart" onclick="document.getElementById('formCartPromo{{ $v->id }}').submit();">Add To Cart</a>
                                            </div>
                                            @endif
                                            {{-- <div class="actions-secondary">
                                                <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                <a href="{{ url('/frontend/produk-detail', $url_new) }}" title="Details"><i class="fa fa-signal"></i></a>
                                            </div> --}}
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                    @if($v->harga->diskon != 0)
                                    <span class="sticker-sale">-{{ number_format($v->harga->diskon) }}%</span>
                                    @endif
                                </div>
                                @endforeach
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                {{-- <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="img/products/17.jpg" alt="single-product">
                                            <img class="secondary-img" src="img/products/24.jpg" alt="single-product">
                                        </a>
                                        <div class="countdown" data-countdown="2020/01/01"></div>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="product.html">printed dress</a></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <p><span class="price">$24.69</span><del class="prev-price">$25.00</del></p>
                                        </div>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                </div> --}}
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                {{-- <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="img/products/16.jpg" alt="single-product">
                                            <img class="secondary-img" src="img/products/33.jpg" alt="single-product">
                                        </a>
                                        <div class="countdown" data-countdown="2020/05/01"></div>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="product.html">printed hot dress</a></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <p><span class="price">$45.89</span><del class="prev-price">$50.00</del></p>
                                        </div>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                     <span class="sticker-new">new</span>
                                     <span class="sticker-sale">-10%</span>
                                </div> --}}
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                {{-- <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="img/products/19.jpg" alt="single-product">
                                            <img class="secondary-img" src="img/products/18.jpg" alt="single-product">
                                        </a>
                                        <div class="countdown" data-countdown="2020/05/01"></div>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="product.html">printed chiffon dress</a></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <p><span class="price">$16.40</span><del class="prev-price">$20.50</del></p>
                                        </div>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                     <span class="sticker-sale">-12%</span>
                                </div> --}}
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                {{-- <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="img/products/12.jpg" alt="single-product">
                                            <img class="secondary-img" src="img/products/11.jpg" alt="single-product">
                                        </a>
                                        <div class="countdown" data-countdown="2019/05/01"></div>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="product.html"> cool dress</a></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                            <p><span class="price">$19.40</span><del class="prev-price">$22.00</del></p>
                                        </div>
                                        <div class="pro-actions">
                                            <div class="actions-primary">
                                                <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                     <span class="sticker-new">new</span>
                                     <span class="sticker-sale">-10%</span>
                                </div> --}}
                                <!-- Single Product End -->
                            </div>
                            <!-- Hot Deal Product Active End -->
                        </div>
                    </div>
                    <!-- Hot Deal Product Activation End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        @endif
        <!-- Hot Deal Products End Here -->

        <!-- Big Banner Start Here -->
        {{-- <div class="big-banner pb-45">
            <div class="container">
                <div class="single-banner">
                    <img src="img/banner/5.jpg" alt="">
                </div>
            </div>
            <!-- Container End -->
        </div> --}}
        <!-- Big Banner End Here -->
        <!-- Electronics Products Area Start Here -->
        {{-- <div class="electronics-product pb-45">
            <div class="container">
                <div class="row">
                    <!-- Electronics Banner Start -->
                    <div class="col-xl-3 col-lg-4 col-md-5">
                        <!-- Post Title Start -->
                        <div class="post-title">
                            <h2><i class="ion-ios-game-controller-b-outline"></i>electronics</h2>
                        </div>
                        <!-- Post Title End -->
                        <div class="single-banner">
                            <a href="shop.html"><img src="img/banner/6.jpg" alt=""></a>
                        </div>
                    </div>
                    <!-- Electronics Banner End -->
                    <div class="col-xl-9 col-lg-8 col-md-7">
                        <div class="main-product-tab-area"> 
                            <!-- Nav tabs -->
                            <ul class="nav tabs-area" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#camera">Cameras</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#gamepad">GamePad</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#d-camera">Digital Cameras</a>
                                </li>
                            </ul>
                            <!-- Tab Contetn Start -->
                            <div class="tab-content">
                                <div id="camera" class="tab-pane fade show active">
                                    <!-- Electronics Product Activation Start Here -->
                                    <div class="electronics-pro-active owl-carousel">
                                        <!-- Double Product Start -->
                                        <div class="double-product">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/8.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/7.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">Printed Summer Dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <p><span class="price">$30</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/11.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/12.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">printed dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p><span class="price">$25.00</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <!-- Double Product End -->
                                        <!-- Double Product Start -->
                                        <div class="double-product">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/13.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/11.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                    <span class="sticker-sale">-8%</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">winter Dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <p><span class="price">$30</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/23.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/22.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">printed chiffon dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p><span class="price">$25.00</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <!-- Double Product End -->
                                        <!-- Double Product Start -->
                                        <div class="double-product">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/15.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/14.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">Printed festvie Dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <p><span class="price">$30</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/29.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/30.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">printeddress dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p><span class="price">$25.00</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <!-- Double Product End -->
                                    </div>
                                    <!-- Electronics Product Activation End Here -->
                                </div>
                                <!-- #camera End Here -->
                                <div id="gamepad" class="tab-pane fade">
                                    <!-- Electronics Product Activation Start Here -->
                                    <div class="electronics-pro-active owl-carousel">
                                        <!-- Double Product Start -->
                                        <div class="double-product">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/30.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/29.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">Printed Summer Dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <p><span class="price">$30</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/10.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/9.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">printed dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p><span class="price">$25.00</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <!-- Double Product End -->
                                        <!-- Double Product Start -->
                                        <div class="double-product">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/14.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/15.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">winter Dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <p><span class="price">$30</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/11.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/12.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">printed chiffon dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p><span class="price">$25.00</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <!-- Double Product End -->
                                        <!-- Double Product Start -->
                                        <div class="double-product">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/21.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/22.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">Printed festvie Dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <p><span class="price">$30</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/7.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/8.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">printeddress dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p><span class="price">$25.00</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <!-- Double Product End -->
                                    </div>
                                    <!-- Electronics Product Activation End Here -->
                                </div>
                                <!-- #gmaepad End Here -->
                                <div id="d-camera" class="tab-pane fade">
                                    <!-- Electronics Product Activation Start Here -->
                                    <div class="electronics-pro-active owl-carousel">
                                        <!-- Double Product Start -->
                                        <div class="double-product">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/18.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/19.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">Printed Summer Dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <p><span class="price">$30</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/32.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/33.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">printed dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p><span class="price">$25.00</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <!-- Double Product End -->
                                        <!-- Double Product Start -->
                                        <div class="double-product">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/5.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/6.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">winter Dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <p><span class="price">$30</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/8.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/7.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">printed chiffon dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p><span class="price">$25.00</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <!-- Double Product End -->
                                        <!-- Double Product Start -->
                                        <div class="double-product">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/26.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/25.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">Printed festvie Dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <p><span class="price">$30</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/29.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/30.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">printeddress dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p><span class="price">$25.00</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <!-- Double Product End -->
                                    </div>
                                    <!-- Electronics Product Activation End Here -->
                                </div>
                                <!-- #d-camera End Here -->
                            </div>
                            <!-- Tab Content End -->
                        </div>
                        <!-- main-product-tab-area-->
                    </div>
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div> --}}
        <!-- Brand Banner Area Start Here -->
        <div class="main-brand-banner pb-30">
            <div class="container-fluid"> 
                <!-- Brand Banner Start -->
                <div class="brand-banner owl-carousel">
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/yamaha1.png" alt="brand-image"></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/aka.png" alt="brand-image"></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/banana1.png" alt="brand-image"></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/beatme.png" alt="brand-image"></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/esper.png" alt="brand-image"></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/glow.png" alt="brand-image"></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/james1.png" alt="brand-image"></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/kuya1.png" alt="brand-image"></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/lucido.png" alt="brand-image"></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/lulea.png" alt="brand-image"></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/maxmillion.png" alt="brand-image"></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/Daddario.png" alt="brand-image"></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/elixir.png" alt="brand-image"></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/ernieball.png" alt="brand-image"></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/fender1.png" alt="brand-image"></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/ibanez1.png" alt="brand-image"></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/neo1.png" alt="brand-image"></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/sheldon1.png" alt="brand-image"></a>
                    </div>
                    <div class="single-brand">
                        <a href="#"><img src="img/brand/toledo.png" alt="brand-image"></a>
                    </div>
                </div>
                <!-- Brand Banner End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Brand Banner Area End Here -->
        
        <!-- Home & Kitchen Products Area Start Here -->
        {{-- <div class="home-kitchen pb-45">
            <div class="container">
                <div class="row">
                    <!-- Electronics Banner Start -->
                    <div class="col-xl-3 col-lg-4 col-md-5">
                        <!-- Post Title Start -->
                        <div class="post-title">
                            <h2><i class="ion-tshirt-outline" aria-hidden="true"></i>home & kitchen</h2>
                        </div>
                        <!-- Post Title End -->
                        <div class="single-banner">
                            <a href="shop.html"><img src="img/banner/9.jpg" alt=""></a>
                        </div>
                    </div>
                    <!-- Electronics Banner End -->
                    <div class="col-xl-9 col-lg-8 col-md-7">
                        <div class="main-product-tab-area"> 
                            <!-- Nav tabs -->
                            <ul class="nav tabs-area" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#lg-app">Large Appliances</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#sm-app">Small Appliances</a>
                                </li>
                            </ul>
                            <!-- Tab Contetn Start -->
                            <div class="tab-content">
                                <div id="lg-app" class="tab-pane fade show active">
                                    <!-- Electronics Product Activation Start Here -->
                                    <div class="electronics-pro-active owl-carousel">
                                        <!-- Double Product Start -->
                                        <div class="double-product">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/8.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/7.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">Printed Summer Dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <p><span class="price">$30</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/11.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/12.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">printed dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p><span class="price">$25.00</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <!-- Double Product End -->
                                        <!-- Double Product Start -->
                                        <div class="double-product">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/13.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/11.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                    <span class="sticker-sale">-8%</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">winter Dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <p><span class="price">$30</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/23.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/22.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">printed chiffon dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p><span class="price">$25.00</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <!-- Double Product End -->
                                        <!-- Double Product Start -->
                                        <div class="double-product">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/15.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/14.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">Printed festvie Dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <p><span class="price">$30</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/29.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/30.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">printeddress dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p><span class="price">$25.00</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <!-- Double Product End -->
                                    </div>
                                    <!-- Electronics Product Activation End Here -->
                                </div>
                                <!-- #g-desktop End Here -->
                                <div id="sm-app" class="tab-pane fade">
                                    <!-- Electronics Product Activation Start Here -->
                                    <div class="electronics-pro-active owl-carousel">
                                        <!-- Double Product Start -->
                                        <div class="double-product">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/30.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/29.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">Printed Summer Dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <p><span class="price">$30</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/10.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/9.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">printed dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p><span class="price">$25.00</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <!-- Double Product End -->
                                        <!-- Double Product Start -->
                                        <div class="double-product">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/14.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/15.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">winter Dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <p><span class="price">$30</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/11.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/12.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">printed chiffon dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p><span class="price">$25.00</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <!-- Double Product End -->
                                        <!-- Double Product Start -->
                                        <div class="double-product">
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/21.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/22.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">Printed festvie Dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <p><span class="price">$30</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                            <!-- Single Product Start -->
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/7.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/8.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <h4><a href="product.html">printeddress dress</a></h4>
                                                    <div class="product-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <p><span class="price">$25.00</span></p>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            <!-- Single Product End -->
                                        </div>
                                        <!-- Double Product End -->
                                    </div>
                                    <!-- Electronics Product Activation End Here -->
                                </div>
                                <!-- #towers End Here -->
                            </div>
                            <!-- Tab Content End -->
                        </div>
                        <!-- main-product-tab-area-->
                    </div>
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div> --}}
        <!-- Home & Kitchen Products Area End Here -->
        <!-- New & Featured Products Area Start Here -->

        {{-- include_terbaru_terbaik_old --}}

        <!-- New & Featured Products Area End Here -->
        <!-- Support Area Start Here -->
        <div class="support-area pb-45">
            <div class="container">
                <div class="col-sm-12">
                    <div class="row justify-content-md-between justify-content-sm-start">
                        <div class="single-support d-flex align-items-center">
                            <div class="support-icon">
                                <i class="ion-android-time"></i>
                            </div>
                            <div class="support-desc">
                                <h6>Mon - Fri / 8:00 - 17:00</h6>
                                <span>Working Days/Hours!</span>
                            </div>
                        </div>
                        <div class="single-support d-flex align-items-center">
                            <div class="support-icon">
                                <i class="ion-ios-telephone" ></i>
                            </div>
                            <div class="support-desc">
                                <h6>(+62) 21-55732369</h6>
                                <span>Free support line!</span>
                            </div>
                        </div>
                        <div class="single-support d-flex align-items-center">
                            <div class="support-icon">
                               <i class="ion-help-buoy"></i>
                            </div>
                            <div class="support-desc">
                                <h6>doremi.ecomm@gmail.com</h6>
                                <span>Orders Support!</span>
                            </div>
                        </div>
                    </div>
                    <!-- Row End -->
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Support Area End Here -->
        <!-- Quick View Content Start -->
        <div class="main-product-thumbnail quick-thumb-content">
            <div class="container">
                <!-- The Modal -->
                <div class="modal fade" id="myModal">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <div class="row">
                                    <!-- Main Thumbnail Image Start -->
                                    <div class="col-lg-5 col-md-6 col-sm-5">
                                        <!-- Thumbnail Large Image start -->
                                        <div class="tab-content">
                                            <div id="thumb1" class="tab-pane fade show active">
                                                <a data-fancybox="images" href="img/products/35.jpg"><img src="img/products/35.jpg" alt="product-view"></a>
                                            </div>
                                            <div id="thumb2" class="tab-pane fade">
                                                <a data-fancybox="images" href="img/products/13.jpg"><img src="img/products/13.jpg" alt="product-view"></a>
                                            </div>
                                            <div id="thumb3" class="tab-pane fade">
                                                <a data-fancybox="images" href="img/products/15.jpg"><img src="img/products/15.jpg" alt="product-view"></a>
                                            </div>
                                            <div id="thumb4" class="tab-pane fade">
                                                <a data-fancybox="images" href="img/products/4.jpg"><img src="img/products/4.jpg" alt="product-view"></a>
                                            </div>
                                            <div id="thumb5" class="tab-pane fade">
                                                <a data-fancybox="images" href="img/products/5.jpg"><img src="img/products/5.jpg" alt="product-view"></a>
                                            </div>
                                        </div>
                                        <!-- Thumbnail Large Image End -->
                                        <!-- Thumbnail Image End -->
                                        <div class="product-thumbnail">
                                            <div class="thumb-menu owl-carousel nav tabs-area" role="tablist">
                                                <a class="active" data-toggle="tab" href="#thumb1"><img src="img/products/35.jpg" alt="product-thumbnail"></a>
                                                <a data-toggle="tab" href="#thumb2"><img src="img/products/13.jpg" alt="product-thumbnail"></a>
                                                <a data-toggle="tab" href="#thumb3"><img src="img/products/15.jpg" alt="product-thumbnail"></a>
                                                <a data-toggle="tab" href="#thumb4"><img src="img/products/4.jpg" alt="product-thumbnail"></a>
                                                <a data-toggle="tab" href="#thumb5"><img src="img/products/5.jpg" alt="product-thumbnail"></a>
                                            </div>
                                        </div>
                                        <!-- Thumbnail image end -->
                                    </div>
                                    <!-- Main Thumbnail Image End -->
                                    <!-- Thumbnail Description Start -->
                                    <div class="col-lg-7 col-md-6 col-sm-7">
                                        <div class="thubnail-desc fix mt-sm-40">
                                            <h3 class="product-header">Printed Summer Dress</h3>
                                            <div class="pro-price mtb-30">
                                                <p class="d-flex align-items-center"><span class="prev-price">16.51</span><span class="price">$15.19</span><span class="saving-price">save 8%</span></p>
                                            </div>
                                            <p class="mb-20 pro-desc-details">Long printed dress with thin adjustable straps. V-neckline and wiring under the bust with ruffles at the bottom of the dress.</p>
                                            <div class="product-size mb-20 clearfix">
                                                <label>Size</label>
                                                <select class="">
                                                    <option>S</option>
                                                    <option>M</option>
                                                    <option>L</option>
                                                </select>
                                            </div>
                                            <div class="color mb-20">
                                                <label>color</label>
                                                <ul class="color-list">
                                                    <li>
                                                        <a class="orange active" href="#"></a>
                                                    </li>
                                                    <li>
                                                        <a class="paste" href="#"></a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="box-quantity d-flex">
                                                <form action="#">
                                                    <input class="quantity mr-40" type="number" min="1" value="1">
                                                </form>
                                                <a class="add-cart" href="cart.html">add to cart</a>
                                            </div>
                                            <div class="pro-ref mt-15">
                                                <p><span class="in-stock"><i class="ion-checkmark-round"></i> IN STOCK</span></p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Thumbnail Description End -->
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="custom-footer">
                                <div class="socila-sharing">
                                    <ul class="d-flex">
                                        <li>share</li>
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus-official" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Quick View Content End -->
        <!-- Footer Area Start Here -->
        @include('frontend.include.footer')
        <!-- Footer Area End Here -->
    </div>
    <!-- Main Wrapper End Here -->
</body>

</html>