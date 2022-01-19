<!doctype html>
<html class="no-js" lang="zxx">


<head>
    @include('frontend.include.header')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<meta name="facebook-domain-verification" content="9fqh8b6v5ssc4qkcb6kj5xompibqnt" />

    
</head>

<body>
    <!--[if lte IE 9]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

    <!-- Main Wrapper Start Here -->
    <div class="wrapper">
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
                        <li><a href="/">Home</a></li>
                        <li><a href="{{ url('/frontend/toko/all') }}">Shop</a></li>
                        <li class="active">Products</li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- Product Thumbnail Start -->
        <div class="main-product-thumbnail ptb-45">
            <div class="container">
                <div class="thumb-bg">
                    <div class="row">
                        <!-- Main Thumbnail Image Start -->
                        <div class="col-lg-5 mb-all-40">
                            <!-- Thumbnail Large Image start -->
                            <div class="tab-content">
                                @foreach($produk->gambar as $v)
                                @php
                                    // dd($produk->gambar->get());
                                @endphp
                                @if($v->gambar_utama == 1)
                                    <div id="thumb{{ $v->id }}" class="tab-pane fade show active">
                                        <a data-fancybox="images" href="{{ env('DB_DATABASE') }}/{{ $v->gambar }}"><img src="{{ env('APP_URL') }}/{{ $v->gambar }}" alt="product-view"></a>
                                    </div>
                                @else
                                <div id="thumb{{ $v->id }}" class="tab-pane fade">
                                    <a data-fancybox="images" href="{{ env('APP_URL') }}/{{ $v->gambar }}"><img src="{{ env('APP_URL') }}/{{ $v->gambar }}" alt="product-view"></a>
                                </div>
                                @endif
                                @endforeach
                                {{-- <div id="thumb3" class="tab-pane fade">
                                    <a data-fancybox="images" href="{{ env('APP_URL') }}/{{ $produk->gambar[2]->gambar }}"><img src="{{ env('APP_URL') }}/{{ $produk->gambar[2]->gambar }}" alt="product-view"></a>
                                </div>
                                @if(count($produk->gambar) > 3)
                                    <div id="thumb4" class="tab-pane fade">
                                        <a data-fancybox="images" href="{{ env('APP_URL') }}/{{ $produk->gambar[3]->gambar }}"><img src="{{ env('APP_URL') }}/{{ $produk->gambar[3]->gambar }}" alt="product-view"></a>
                                    </div>
                                    <div id="thumb5" class="tab-pane fade">
                                        <a data-fancybox="images" href="{{ env('APP_URL') }}/{{ $produk->gambar[4]->gambar }}"><img src="{{ env('APP_URL') }}/{{ $produk->gambar[4]->gambar }}" alt="product-view"></a>
                                    </div>
                                @endif --}}
                            </div>
                            <!-- Thumbnail Large Image End -->
                            <!-- Thumbnail Image End -->
                            <div class="product-thumbnail">
                                <div class="thumb-menu owl-carousel nav tabs-area" role="tablist">
                                @foreach($produk->gambar as $k)
                                @if($k->gambar_utama == 1)
                                <a class="active" data-toggle="tab" href="#thumb{{ $k->id }}"><img src="{{ env('APP_URL') }}/{{ $k->gambar }}"></a>
                                @else
                                    <a data-toggle="tab" href="#thumb{{ $k->id }}"><img src="{{ env('APP_URL') }}/{{ $k->gambar }}"></a>
                                    @endif
                                    @endforeach
                                    {{-- <a data-toggle="tab" href="#thumb3"><img src="{{ env('APP_URL') }}/{{ $produk->gambar[2]->gambar }}"></a>
                                    @if(count($produk->gambar) > 3)
                                        <a data-toggle="tab" href="#thumb4"><img src="{{ env('APP_URL') }}/{{ $produk->gambar[3]->gambar }}"></a>
                                        <a data-toggle="tab" href="#thumb5"><img src="{{ env('APP_URL') }}/{{ $produk->gambar[4]->gambar }}"></a>
                                    @endif --}}
                                </div>
                            </div>
                            <!-- Thumbnail image end -->
                        </div>
                        <!-- Main Thumbnail Image End -->
                        <!-- Thumbnail Description Start -->
                        <div class="col-lg-7">
                            <div class="thubnail-desc fix">
                                <div class="d-flex justify-align-between">
                                    <h3 class="product-header">{{ $produk->judul }}</h3>
                                </div>
                                <div class="rating-summary fix mtb-10">
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    {{-- <div class="rating-feedback">
                                        <a href="#">(1 review)</a>
                                        <a href="#">add to your review</a>
                                    </div> --}}
                                </div>
                                <div class="pro-price mtb-30">
                                    <p class="d-flex align-items-center">
                                        @if(Auth::check())
                                            <span class="price">Rp. {{ number_format($produk->harga['harga']) }}</span>{{-- <del class="prev-price">Rp. {{ number_format($produks->harga['harga']) }}</del> --}}
                                            @if ($produk->label_produk != 'Standar')
                                                <span class="saving-price">Produk {{ $produk->label_produk }}</span>
                                            @endif
                                        @else
                                            @if($produk->harga['diskon'] != 0)
                                                <span class="prev-price">Rp. {{ number_format($produk->harga['harga']) }}</span>
                                                <span class="price">Rp. {{ number_format($produk->harga_diskon) }}</span>
                                                <span class="saving-price">save {{ $produk->harga['diskon'] }} %</span>
                                            @else
                                                <span class="price">Rp. {{ number_format($produk->harga['harga']) }}</span>
                                            @endif

                                            @if ($produk->label_produk != 'Standar')
                                                <span class="saving-price">{{ $produk->label_produk }}</span>
                                            @endif
                                        @endif
                                    </p>
                                </div>
                                <p class="mb-20 pro-desc-details">{!! $produk->deskripsi_singkat !!}</p>
                                {{-- <div class="product-size mb-20 clearfix">
                                    <label>Size</label>
                                    <select class="">
                                      <option>S</option>
                                      <option>M</option>
                                      <option>L</option>
                                    </select>
                                </div> --}}
                                <!-- <div class="color clearfix mb-20">
                                    <label>Price? Go To E-commerce!</label>
                                    <ul class="color-list">
                                        <li>
                                            <a class="orange active" href="#"></a>
                                        </li>
                                        <li>
                                            <a class="paste" href="#"></a>
                                        </li>
                                    </ul>
                                </div> -->
                                <h6>Price? Go To E-Commerce PT. Doremi Musik Indonesia!</h6>
                                <br>
                                <div class="row">
                                    <div class="col">
                                    @foreach($produk->ecommerce as $v)
                                            @if($v->nama == tokopedia)
                                                    <a href="{{ $v->url }}" target="_blank"><img src="{{ asset('frontend/img/ecommerce/tokopedia.png') }}" height="50" width="50"></a>
                                            @elseif($v->nama == bukalapak)
                                                    <a href="{{ $v->url }}" target="_blank"><img src="{{ asset('frontend/img/ecommerce/bukalapak.jpg') }}" height="50" width="50"></a>
                                            @elseif($v->nama == blibli)
                                                    <a href="{{ $v->url }}" target="_blank"><img src="{{ asset('frontend/img/ecommerce/blibli.png') }}" height="50" width="50"></a>
                                            @elseif($v->nama == shopee)
                                                    <a href="{{ $v->url }}" target="_blank"><img src="{{ asset('frontend/img/ecommerce/shopee.png') }}" height="50" width="50"></a>
                                            @elseif($v->nama == ilotte)
                                                    <a href="{{ $v->url }}" target="_blank"><img src="{{ asset('frontend/img/ecommerce/ilotte.png') }}" height="50" width="50"></a>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                                <div class="box-quantity d-flex">
                                    <form action="{{ url('/frontend/cart') }}" method="POST" id="formCart">
                                        {!! csrf_field() !!}
                                        <input type="hidden" name="kode_sku" value="{{ $produk->kode_sku }}">
                                        <input type="hidden" name="judul" value="{{ $produk->judul }}">
                                        @if(Auth::check())
                                            <input type="hidden" name="harga" value="{{ $produk->harga->harga }}">
                                        @else
                                            @if($produk->harga->diskon != 0)
                                                <input type="hidden" name="harga" value="{{ $produk->harga_diskon }}">
                                            @else
                                                <input type="hidden" name="harga" value="{{ $produk->harga->harga }}">
                                            @endif
                                        @endif
                                    </form>
                                    @if(Auth::check())
                                    <div class="actions-primary">
                                        <a href="#" title="Add to Cart" onclick="document.getElementById('formCart').submit();">Add To Cart</a>
                                    </div>
                                    @endif
                                </div>
                                {{-- <div class="pro-ref mt-15">
                                    <p><span class="in-stock"><i class="ion-checkmark-round"></i> IN STOCK</span></p>
                                </div> --}}
                                {{-- <div class="socila-sharing mt-25">
                                    <ul class="d-flex">
                                        <li>share</li>
                                        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus-official" aria-hidden="true"></i></a></li>
                                        <li><a href="#"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a></li>
                                    </ul>
                                </div> --}}
                                {{-- <div class="product-policy mt-20">
                                   <p><i class="fa fa-check-square-o" aria-hidden="true"></i>Security policy (edit with Customer reassurance module)
                                   <p><i class="fa fa-truck" aria-hidden="true"></i>Delivery policy (edit with Customer reassurance module)
                                   <p><i class="fa fa-exchange" aria-hidden="true"></i>Return policy (edit with Customer reassurance module)
                                </div> --}}
                            </div>
                        </div>
                        <!-- Thumbnail Description End -->
                    </div>
                    <!-- Row End -->
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Product Thumbnail End -->
        <!-- Product Thumbnail Description Start -->
        <div class="thumnail-desc pb-45">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="main-thumb-desc nav tabs-area" role="tablist">
                            <li><a class="active" data-toggle="tab" href="#dtail">Product Details</a></li>
                           {{--  <li><a data-toggle="tab" href="#review">Reviews 1</a></li> --}}
                        </ul>
                        <!-- Product Thumbnail Tab Content Start -->
                        <div class="tab-content thumb-content border-default">
                            <div id="dtail" class="tab-pane fade show active">
                                <p>{!! $produk->spesifikasi_produk !!}</p>
                            </div>
                            {{-- <div id="review" class="tab-pane fade">
                                <!-- Reviews Start -->
                                <div class="review border-default universal-padding">
                                    <div class="group-title">
                                        <h2>customer review</h2>
                                    </div>
                                    <h4 class="review-mini-title">Hastech</h4>
                                    <ul class="review-list">
                                        <!-- Single Review List Start -->
                                        <li>
                                            <span>Quality</span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <label>Hastech</label>
                                        </li>
                                        <!-- Single Review List End -->
                                        <!-- Single Review List Start -->
                                        <li>
                                            <span>price</span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <label>Review by <a href="https://themeforest.net/user/hastech">Hastech</a></label>
                                        </li>
                                        <!-- Single Review List End -->
                                        <!-- Single Review List Start -->
                                        <li>
                                            <span>value</span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <label>Posted on 7/20/18</label>
                                        </li>
                                        <!-- Single Review List End -->
                                    </ul>
                                </div>
                                <!-- Reviews End -->
                                <!-- Reviews Start -->
                                <div class="review border-default universal-padding mt-30">
                                    <h2 class="review-title mb-30">You're reviewing: <br><span>Faded Short Sleeves T-shirt</span></h2>
                                    <p class="review-mini-title">your rating</p>
                                    <ul class="review-list">
                                        <!-- Single Review List Start -->
                                        <li>
                                            <span>Quality</span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </li>
                                        <!-- Single Review List End -->
                                        <!-- Single Review List Start -->
                                        <li>
                                            <span>price</span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </li>
                                        <!-- Single Review List End -->
                                        <!-- Single Review List Start -->
                                        <li>
                                            <span>value</span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </li>
                                        <!-- Single Review List End -->
                                    </ul>
                                    <!-- Reviews Field Start -->
                                    <div class="riview-field mt-40">
                                        <form autocomplete="off" action="#">
                                            <div class="form-group">
                                                <label class="req" for="sure-name">Nickname</label>
                                                <input type="text" class="form-control" id="sure-name" required="required">
                                            </div>
                                            <div class="form-group">
                                                <label class="req" for="subject">Summary</label>
                                                <input type="text" class="form-control" id="subject" required="required">
                                            </div>
                                            <div class="form-group">
                                                <label class="req" for="comments">Review</label>
                                                <textarea class="form-control" rows="5" id="comments" required="required"></textarea>
                                            </div>
                                            <button type="submit" class="customer-btn">Submit Review</button>
                                        </form>
                                    </div>
                                    <!-- Reviews Field Start -->
                                </div>
                                <!-- Reviews End -->
                            </div> --}}
                        </div>
                        <!-- Product Thumbnail Tab Content End -->
                    </div>
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Product Thumbnail Description End -->
        <!-- Realted Products Start Here -->
        <!-- @php
            $items = $related->count();
        @endphp -->
        @if(count($related) > 0)
        <div class="second-featured-products related-pro pb-45">
            <div class="container">
               <!-- Post Title Start -->
               <div class="post-title">
                   <h2><i class="fa fa-trophy" aria-hidden="true"></i>Produk Terkait</h2>
               </div>
               <!-- Post Title End -->
                <!-- New Pro Tow Activation Start -->
                <div class="featured-pro-active owl-carousel">
                    <!-- Single Product Start -->
                    @foreach ($related as $k => $v)
                    @php
                        $url_new = urlencode($v->kode_sku);
                    @endphp
                    <div class="single-product">
                        <!-- Product Image Start -->
                        <div class="pro-img">
                            @if($v->gambar['gambar'])
                                <img style="height: 260px;width: 220px;" class="primary-img" src="{{ env('APP_URL') }}/{{ $v->gambar['gambar'] }}" alt="single-product">
                            @else
                                <img style="height: 260px;width: 220px;" class="primary-img" src="{{ asset('frontend/img/logo/default.jpg') }}" alt="single-product">
                            @endif

                            @if($v->harga->diskon != 0)
                            <span class="sticker-sale">-{{ number_format($v->harga->diskon) }}%</span>
                            @endif
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
                            </div>
                            <div class="pro-actions">
                                <form action="{{ url('/frontend/cart') }}" method="POST" id="formCartGrid{{ $v->id }}">
                                    {!! csrf_field() !!}
                                    <input type="hidden" name="kode_sku" value="{{ $v->kode_sku }}">
                                    <input type="hidden" name="judul" value="{{ $v->judul }}">
                                    @if(Auth::check())
                                        <input type="hidden" name="harga" value="{{ $v->harga['harga'] }}">
                                    @else
                                        @if($produk->harga->diskon != 0)
                                            <input type="hidden" name="harga" value="{{ $v->harga_diskon }}">
                                        @else
                                            <input type="hidden" name="harga" value="{{ $v->harga['harga'] }}">
                                        @endif
                                    @endif
                                </form>
                                 @if(Auth::check() && Auth::user()->id_cms_privileges != 8)
                                    <div class="actions-primary">
                                        <a href="javascript:;" title="Add to Cart" onclick="document.getElementById('formCartGrid{{ $v->id }}').submit();">Add To Cart</a>
                                    </div>
                                @endif
                                <!-- <div class="actions-secondary">
                                    <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                    <a href="{{URL('frontend/produk-detail', $url_new)}}" title="Details"><i class="fa fa-signal"></i></a>
                                </div> -->
                            </div>
                        </div>
                        <!-- Product Content End -->

                        @if ($v->label_produk != 'Standar')
                            <span class="sticker-sale">{{ $v->label_produk }}</span>
                        @endif
                    </div>
                    @endforeach
                    <!-- Single Product End -->
                    <!-- Single Product Start -->
                    {{-- <div class="single-product">
                        <!-- Product Image Start -->
                    <!-- @foreach{$gambar as $gambar} -->
                        <div class="pro-img">
                            <a href="produkdetail">
                                <img class="primary-img" src="img/products/14.jpg" alt="single-product">
                                <img class="secondary-img" src="img/products/15.jpg" alt="single-product">
                            </a>
                            <span class="sticker-new">new</span>
                        </div>
                    <!-- @endforeach -->
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                            <div class="pro-info">
                                <h4><a href="product.html">summer dress</a></h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <p><span class="price">$22.12</span></p>
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
                            <a href="produkdetail">
                                <img class="primary-img" src="img/products/4.jpg" alt="single-product">
                                <img class="secondary-img" src="img/products/6.jpg" alt="single-product">
                            </a>
                            <span class="sticker-new">new</span>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                            <div class="pro-info">
                                <h4><a href="product.html">winter dress</a></h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                                <p><span class="price">$25.45</span><del class="prev-price">$27.12</del></p>
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
                                <img class="primary-img" src="img/products/34.jpg" alt="single-product">
                                <img class="secondary-img" src="img/products/32.jpg" alt="single-product">
                            </a>
                            <span class="sticker-new">new</span>
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
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p><span class="price">$22.45</span><del class="prev-price">$25.20</del></p>
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
                                <img class="primary-img" src="img/products/8.jpg" alt="single-product">
                                <img class="secondary-img" src="img/products/9.jpg" alt="single-product">
                            </a>
                            <span class="sticker-new">new</span>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                            <div class="pro-info">
                                <h4><a href="product.html">winter hot dress</a></h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p><span class="price">$30.45</span></p>
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
                                <img class="primary-img" src="img/products/9.jpg" alt="single-product">
                                <img class="secondary-img" src="img/products/10.jpg" alt="single-product">
                            </a>
                            <span class="sticker-new">new</span>
                        </div>
                        <!-- Product Image End -->
                        <!-- Product Content Start -->
                        <div class="pro-content">
                            <div class="pro-info">
                                <h4><a href="product.html">printed small dress</a></h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <p><span class="price">$27.45</span><del class="prev-price">$30.50</del></p>
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
                </div>
                <!-- New Pro Tow Activation End -->
            </div>
            <!-- Container End -->
        </div>
        @endif
        <!-- Realated Products End Here -->
        <!-- Footer Area Start Here -->
        @include('frontend.include.footer')
        <!-- Footer Area End Here -->
</body>

</html>