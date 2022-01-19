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
        <!-- <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="#">Home</a></li>
                        <li class="active"><a href="#">Shop</a></li>
                    </ul>
                </div>
            </div> -->
            <!-- Container End -->
        <!-- </div> -->
        <!-- Breadcrumb End -->
        <!-- Shop Page Start -->
        <div class="main-shop-page ptb-45">
            <div class="container">
                <!-- Row End -->
                <div class="row">
                    <!-- Sidebar Shopping Option Start -->
                    @php
                        $kategori = App\Models\TbMasterKategori::orderBy('nama_kategori')->get();
                    @endphp
                    <div class="col-lg-3 order-2 order-lg-1">
                        <div class="sidebar">
                            <!-- Sidebar Electronics Categorie Start -->
                            <div class="electronics mb-30">
                                <h3 class="sidebar-title e-title">Kategori</h3>
                                <div id="shop-cate-toggle" class="category-menu sidebar-menu sidbar-style">
                                    <ul>
                                        @foreach($kategori as $kategoris)
                                        <li class="has-sub"><a href="#">{{ $kategoris->nama_kategori }}</a>
                                            @php
                                                $subKategori = App\Models\TbSubKategori::where('id_kategori', $kategoris->id)->orderBy('nama_sub_kategori')->get();
                                            @endphp
                                            <ul class="category-sub">
                                                @foreach($subKategori as $subKategoris)
                                                <li><a href="{{ url('/frontend/toko/sub-kategori', $subKategoris->id) }}">{{ $subKategoris->nama_sub_kategori }}</a></li>
                                                @endforeach
                                                {{-- <li><a href="shop.html">gps accessories</a></li>
                                                <li><a href="shop.html">Microphones</a></li>
                                                <li><a href="shop.html">Wireless Transmitters</a></li> --}}
                                            </ul>
                                            <!-- category submenu end-->
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- category-menu-end -->
                            </div> 
                            <!-- Sidebar Electronics Categorie End -->
                            <!-- Price Filter Options Start -->
                            {{-- <div class="search-filter mb-30">
                                <h3 class="sidebar-title">filter by price</h3>
                                <form action="#" class="sidbar-style">
                                    <div id="slider-range"></div>
                                    <input type="text" id="amount" class="amount-range" readonly>
                                </form>
                            </div> --}}
                            <!-- Price Filter Options End -->
                            <!-- Sidebar Categorie Start -->
                            {{-- <div class="sidebar-categorie mb-30">
                                <h3 class="sidebar-title">Filter kategori</h3>
                                <ul class="sidbar-style">
                                    @foreach($kategori as $kategoris)
                                        @php
                                            $stok = App\Models\TbProduk::where('id_kategori', $kategoris->id)->count();
                                            // dd($stok);
                                        @endphp
                                    <li class="form-check">
                                        <input class="form-check-input" value="#" id="camera" type="checkbox">
                                        <label class="form-check-label" for="camera">{{ $kategoris->nama_kategori }} ({{ $stok }})</label>
                                    </li>
                                    @endforeach --}}
                                    {{-- <li class="form-check">
                                        <input class="form-check-input" value="#" id="GamePad" type="checkbox">
                                        <label class="form-check-label" for="GamePad">GamePad (8)</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="form-check-input" value="#" id="Digital" type="checkbox">
                                        <label class="form-check-label" for="Digital">Digital Cameras (8)</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="form-check-input" value="#" id="Virtual" type="checkbox">
                                        <label class="form-check-label" for="Virtual"> Virtual Reality (8) </label>
                                    </li> --}}
                                {{-- </ul>
                            </div> --}}
                            <!-- Sidebar Categorie Start -->
                            <!-- Product Size Start -->
                            {{-- <div class="size mb-30">
                                <h3 class="sidebar-title">size</h3>
                                <ul class="size-list sidbar-style">
                                    <li class="form-check">
                                        <input class="form-check-input" value="" id="small" type="checkbox">
                                        <label class="form-check-label" for="small">S (6)</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="form-check-input" value="" id="medium" type="checkbox">
                                        <label class="form-check-label" for="medium">M (9)</label>
                                    </li>
                                    <li class="form-check">
                                        <input class="form-check-input" value="" id="large" type="checkbox">
                                        <label class="form-check-label" for="large">L (8)</label>
                                    </li>
                                </ul>
                            </div> --}}
                            <!-- Product Size End -->
                            <!-- Product Color Start -->
                            {{-- <div class="color mb-30">
                                <h3 class="sidebar-title">color</h3>
                                <ul class="color-option sidbar-style">
                                    <li>
                                        <span class="white"></span>
                                        <a href="#">white (4)</a>
                                    </li>
                                    <li>
                                        <span class="orange"></span>
                                        <a href="#">Orange (2)</a>
                                    </li>
                                    <li>
                                        <span class="blue"></span>
                                        <a href="#">Blue (6)</a>
                                    </li>
                                    <li>
                                        <span class="yellow"></span>
                                        <a href="#">Yellow (8)</a>
                                    </li>
                                </ul>
                            </div> --}}
                            <!-- Product Color End -->
                            <!-- Single Banner Start -->
                            <div class="sidebar-banner">
                                <a href="#"><img src="{{URL::asset('frontend/img/banner/BEATME 6.jpg')}}" alt="slider-banner"></a>
                            </div>
                            <!-- Single Banner End -->
                        </div>
                    </div>
                    <!-- Sidebar Shopping Option End -->
                    <!-- Product Categorie List Start -->
                    <div class="col-lg-9 order-1 order-lg-2">
                        <!-- Grid & List View Start -->
                        <div class="grid-list-top border-default universal-padding d-md-flex justify-content-md-between align-items-center mb-30">
                            <div class="grid-list-view  mb-sm-15">
                                <ul class="nav tabs-area d-flex align-items-center">
                                    <li>{{-- <a data-toggle="tab" href="#grid-view" class="active"><i class="fa fa-th"></i></a> --}}</li>
                                    <li>{{-- <a class="active" data-toggle="tab" href="#list-view"><i class="fa fa-list-ul"></i></a> --}}</li>
                                    <li><span class="grid-item-list">{{-- There are 8 products. --}}</span></li>
                                </ul>
                            </div>
                            <!-- Toolbar Short Area Start -->
                            <div class="main-toolbar-sorter clearfix">
                                <!-- <div class="toolbar-sorter d-md-flex align-items-center">
                                    @if (\Request::is('frontend/toko/sub-kategori/*'))
                                    @php
                                        $tipe_data =  App\Models\TbTipeKategori::where('id_sub_kategori', $produk['id_sub'])->get();
                                    @endphp
                                    <label>Type:</label>
                                    <select class="sorter wide" id="typeby" name="typeby">
                                        {{-- @if (\Request::is('frontend/toko/sort-by/asc')) --}}
                                        @if (\Request::is('frontend/toko/sub-kategori/type-by/*'))
                                            @php
                                                $tipe =  App\Models\TbTipeKategori::where('id', $produk['id_tipe'])->first();
                                            @endphp
                                                    <option value="{{ $tipe->id }}">{{ $tipe->nama_tipe_kategori }}</option>
                                                @foreach ($tipe_data as $tipes)
                                                    <option value="{{ $tipes->id }}">{{ $tipes->nama_tipe_kategori }}</option>
                                                @endforeach
                                        @else
                                            <option value="All">All</option>
                                            @foreach ($tipe_data as $tipes)
                                                <option value="{{ $tipes->id }}">{{ $tipes->nama_tipe_kategori }}</option>
                                            @endforeach
                                        @endif
                                        {{-- <option value="all">Relevance</option> --}}
                                        {{-- <option value="Product Name">Name, A to Z</option>
                                        <option value="Product Name">Name, Z to A</option> --}}
                                        {{-- <option id="asc" value="asc" selected>Price low to high</option> --}}
                                        {{-- <option id="desc" value="desc">Price high to low</option> --}}
                                        {{-- @elseif (\Request::is('frontend/toko/sort-by/desc')) --}}
                                        {{-- <option value="all">Relevance</option> --}}
                                        {{-- <option value="Product Name">Name, A to Z</option>
                                        <option value="Product Name">Name, Z to A</option> --}}
                                        {{-- <option id="asc" value="asc">Price low to high</option>
                                        <option id="desc" value="desc" selected>Price high to low</option> --}}
                                        {{-- @else --}}
                                        {{-- <option value="all" selected>Relevance</option> --}}
                                        {{-- <option value="Product Name">Name, A to Z</option>
                                        <option value="Product Name">Name, Z to A</option> --}}
                                        {{-- <option id="asc" value="asc">Price low to high</option>
                                        <option id="desc" value="desc">Price high to low</option> --}}
                                        {{-- @endif --}}
                                    </select>

                                    @else
                                    <label>Sort By:</label>
                                    <select class="sorter wide" id="sortby" name="sortby">
                                        @if (\Request::is('frontend/toko/sort-by/asc'))
                                        <option value="all">Relevance</option>
                                        {{-- <option value="Product Name">Name, A to Z</option>
                                        <option value="Product Name">Name, Z to A</option> --}}
                                        <option id="asc" value="asc" selected>Price low to high</option>
                                        <option id="desc" value="desc">Price high to low</option>
                                        @elseif (\Request::is('frontend/toko/sort-by/desc'))
                                        <option value="all">Relevance</option>
                                        {{-- <option value="Product Name">Name, A to Z</option>
                                        <option value="Product Name">Name, Z to A</option> --}}
                                        <option id="asc" value="asc">Price low to high</option>
                                        <option id="desc" value="desc" selected>Price high to low</option>
                                        @else
                                        <option value="all" selected>Relevance</option>
                                        {{-- <option value="Product Name">Name, A to Z</option>
                                        <option value="Product Name">Name, Z to A</option> --}}
                                        <option id="asc" value="asc">Price low to high</option>
                                        <option id="desc" value="desc">Price high to low</option>
                                        @endif
                                    </select>
                                    @endif
                                </div> -->
                            </div>
                            
                            <!-- Toolbar Short Area End -->
                        </div>
                        <!-- Grid & List View End -->
                        <div class="main-categorie mb-all-40">
                            <!-- Grid & List Main Area End -->
                            <div class="tab-content border-default fix">
                                <div id="grid-view" class="tab-pane fade show active">
                                    <div class="row">
                                        <!-- Single Product Start -->
                                        {{-- @php
                                            dd($produk);
                                        @endphp --}}
                                        @if (count($produk) > 0)
                                        @foreach($produk as $k => $v)
                                            @php
                                            $j++;
                                                $url_new = urlencode($v->kode_sku);
                                            @endphp
                                        <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                @if($v->gambar['gambar'])
                                                    <img style="height: 230px;width: 200px;" class="primary-img" src="{{ env('APP_URL') }}/{{ $v->gambar['gambar'] }}" alt="single-product">
                                                @else
                                                    <img style="height: 230px;width: 200px;" class="primary-img" src="{{ asset('frontend/img/logo/default.jpg') }}" alt="single-product">
                                                @endif

                                                @if ($v->label_produk != 'Standar')
                                                    <span class="sticker-sale">{{ $v->label_produk }}</span>
                                                @endif
                                                {{-- </a> --}}
                                                 {{-- @if($v->harga->diskon != 0)
                                                    <span class="sticker-sale"> {{ number_format($v->harga->diskon) }}%</span>
                                                @endif --}}
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
                                                                {{-- <del class="prev-price">
                                                                    Rp. {{ number_format($v->harga->harga) }}
                                                                </del> --}}
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
                                                        {{-- <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal{{ $produks->id }}" title="" data-original-title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="{{ url('/frontend/produk-detail', $url_new) }}" title="" data-original-title="Details"><i class="fa fa-signal"></i></a>
                                                        </div> --}}
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                            @if($j==2)
                                                @php
                                                    $j = 0;
                                                @endphp
                                            @endif
                                        </div>
                                        @endforeach
                                        @else
                                            Tidak ada produk item yang tersedia
                                        @endif
                                        <!-- Single Product End -->
                                        <!-- Single Product Start -->
                                        {{-- <div class="col-lg-4 col-md-4 col-sm-6 col-6">
                                            <div class="single-product">
                                                <!-- Product Image Start -->
                                                <div class="pro-img">
                                                    <a href="product.html">
                                                        <img class="primary-img" src="img/products/14.jpg" alt="single-product">
                                                        <img class="secondary-img" src="img/products/11.jpg" alt="single-product">
                                                    </a>
                                                    <span class="sticker-new">new</span>
                                                </div>
                                                <!-- Product Image End -->
                                                <!-- Product Content Start -->
                                                <div class="pro-content">
                                                    <div class="pro-info">
                                                        <h4><a href="product.html">hot summer dress</a></h4>
                                                        <div class="product-rating">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star-o"></i>
                                                        </div>
                                                        <p><span class="price">$22.45</span><del class="prev-price">$30.50</del></p>
                                                    </div>
                                                    <div class="pro-actions">
                                                        <div class="actions-primary">
                                                            <a href="cart.html" title="" data-original-title="Add to Cart">Add To Cart</a>
                                                        </div>
                                                        <div class="actions-secondary">
                                                            <a href="#" data-toggle="modal" data-target="#myModal" title="" data-original-title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                            <a href="product.html" title="" data-original-title="Details"><i class="fa fa-signal"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Product Content End -->
                                            </div>
                                        </div> --}}
                                        <!-- Single Product End -->
                                    </div>
                                    <!-- Row End -->
                                </div>
                                <!-- #grid view End -->
                                <div id="list-view" class="tab-pane fade ">
                                    <!-- Single Product Start -->
                                    <div class="row single-product">         
                                        <!-- Product Image Start -->
                                        <!-- @foreach($produk as $k => $v)
                                        @php 
                                            $url_new = urlencode($v->kode_sku);
                                        @endphp
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-5 col-4">
                                            <div class="pro-img">
                                                @if($v->gambar['gambar'])
                                                <img style="height: 224px;width: 224px;" class="primary-img" src="{{ env('APP_URL') }}/{{ $v->gambar['gambar'] }}" alt="single-product">
                                            @else
                                                <img style="height: 224px;width: 224px;" class="primary-img" src="{{ asset('frontend/img/logo/default.jpg') }}" alt="single-product">
                                            @endif
                                                {{-- <span class="sticker-new">new</span>
                                                <span class="sticker-sale">{{ $produks->harga['diskon'] }} %</span> --}}
                                            </div>
                                        </div> -->
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        
                                        <div class="col-xl-9 col-lg-8 col-md-8 col-sm-7 col-8">
                                            <div class="pro-content">
                                                <h4><a href="product.html">{{ $produks->judul }}</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">Rp. {{ number_format($produks->harga_diskon) }}</span>
                                                    {{-- <del class="prev-price">Rp. {{ number_format($produks->harga['harga']) }}</del> --}}
                                                </p>
                                                <p>{!! $produks->deskripsi_singkat !!}</p>
                                                <div class="pro-actions">
                                                    <div class="actions-primary">
                                                        <a href="cart.html" title="Add to Cart">Add To Cart</a>
                                                    </div>
                                                    <div class="actions-secondary">
                                                        <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                        <a href="{{ url('/frontend/produk-detail', $produks->kode_sku) }}" title="Details"><i class="fa fa-signal"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!-- Product Content End -->
                                    </div>
                                    <!-- Single Product End -->
                                    <!-- Single Product Start -->
                                    {{-- <div class="row single-product">         
                                        <!-- Product Image Start -->
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-5 col-4">
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="img/products/14.jpg" alt="single-product">
                                                    <img class="secondary-img" src="img/products/15.jpg" alt="single-product">
                                                </a>
                                                <span class="sticker-new">new</span>
                                                <span class="sticker-sale">-8%</span>
                                            </div>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="col-xl-9 col-lg-8 col-md-8 col-sm-7 col-8">
                                            <div class="pro-content">
                                                <h4><a href="product.html">Printed Summer Dress</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                                <p><span class="price">$22.00</span></p>
                                                <p>Sleeveless knee-length chiffon dress. V-neckline with elastic under the bust lining.</p>
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
                                        </div>
                                        <!-- Product Content End -->
                                    </div> --}}
                                    <!-- Single Product End -->
                                    <!-- Single Product Start -->
                                    {{-- <div class="row single-product">         
                                        <!-- Product Image Start -->
                                        <div class="col-xl-3 col-lg-4 col-md-4 col-sm-5 col-4">
                                            <div class="pro-img">
                                                <a href="product.html">
                                                    <img class="primary-img" src="img/products/12.jpg" alt="single-product">
                                                    <img class="secondary-img" src="img/products/11.jpg" alt="single-product">
                                                </a>
                                                <span class="sticker-new">new</span>
                                                <span class="sticker-sale">-8%</span>
                                            </div>
                                        </div>
                                        <!-- Product Image End -->
                                        <!-- Product Content Start -->
                                        <div class="col-xl-9 col-lg-8 col-md-8 col-sm-7 col-8">
                                            <div class="pro-content">
                                                <h4><a href="product.html">Printed Hot Dress</a></h4>
                                                <div class="product-rating">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                                <p><span class="price">$35.00</span><del class="prev-price">$46.50</del></p>
                                                <p>Sleeveless knee-length chiffon dress. V-neckline with elastic under the bust lining.</p>
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
                                        </div>
                                        <!-- Product Content End -->
                                    </div> --}}
                                    <!-- Single Product End -->
                                </div>
                                <!-- #list view End -->
                                <!-- Product Pagination Info -->
                                <div class="product-pagination mb-20 pb-15">
                                    {{-- <span class="grid-item-list">Showing 1-8 of 8 item(s)</span> --}}
                                </div>
                                {{-- @if ($produk->lastPage() > 1)
                                    <ul class="blog-pagination ptb-20">
                                        @if($produk->currentPage() == 1)
                                            <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                        @else
                                            <li><a href="{{ $produk->url($produk->currentPage()-1) }}"><i class="fa fa-angle-left"></i></a></li>
                                        @endif
                                        @for ($i = 1; $i <= $produk->lastPage(); $i++)
                                            @if($produk->currentPage() == $i)
                                                <li class="active"><a href="#">{{ $i }}</a></li>
                                            @else
                                                <li><a href="{{ $produk->url($i) }}">{{ $i }}</a></li>
                                            @endif
                                        @endfor
                                        @if($produk->currentPage() == $produk->lastPage())
                                            <li><a href="#"><i class="fa fa-angle-right"></i></a></li>
                                        @else
                                            <li><a href="{{ $produk->url($produk->currentPage()+1) }}"><i class="fa fa-angle-right"></i></a></li>
                                        @endif
                                    </ul>
                                @endif --}}
                                <!-- End of .blog-pagination -->
                                    @if (\Request::is('frontend/toko/sort-by/*'))                                     
                                    {{-- @if(Request::url() === 'frontend/toko/sort-by/*')
                                    // code
                                    dd(Request::url()); --}}
                                        
                                    @else
                                        @if ($produk->hasPages())
                                            <ul class="blog-pagination ptb-20">
                                                {{-- Previous Page Link --}}
                                                @if ($produk->onFirstPage())
                                                    <li><a href="#"><i class="fa fa-angle-left"></i></a></li>
                                                @else
                                                    <li><a href="{{ $produk->previousPageUrl() }}&q={{ $query }}" rel="prev"><i class="fa fa-angle-left"></i></a></li>
                                                @endif
        
                                                @if($produk->currentPage() > 3)
                                                    <li class="hidden-xs"><a href="{{ $produk->url(1) }}">1</a></li>
                                                @endif
                                                @if($produk->currentPage() > 4)
                                                    <li><span>...</span></li>
                                                @endif
                                                @foreach(range(1, $produk->lastPage()) as $i)
                                                    @if($i >= $produk->currentPage() - 2 && $i <= $produk->currentPage() + 2)
                                                        @if ($i == $produk->currentPage())
                                                            <li class="active"><a href="#"><span>{{ $i }}</span></a></li>
                                                        @else
                                                            <li><a href="{{ $produk->url($i) }}&q={{ $query }}">{{ $i }}</a></li>
                                                        @endif
                                                    @endif
                                                @endforeach
                                                @if($produk->currentPage() < $produk->lastPage() - 3)
                                                    <li><span>...</span></li>
                                                @endif
                                                @if($produk->currentPage() < $produk->lastPage() - 2)
                                                    <li class="hidden-xs"><a href="{{ $produk->url($produk->lastPage()) }}&q={{ $query }}">{{ $produk->lastPage() }}</a></li>
                                                @endif
        
                                                {{-- Next Page Link --}}
                                                @if ($produk->hasMorePages())
                                                    <li><a href="{{ $produk->nextPageUrl() }}&q={{ $query }}" rel="next"><i class="fa fa-angle-right"></i></a></li>
                                                @else
                                                    <li class="disabled"><span><i class="fa fa-angle-right"></i></span></li>
                                                @endif
                                            </ul>
                                        @endif
                                    @endif
                            </div>
                            <!-- Grid & List Main Area End -->
                        </div>
                    </div>
                    <!-- product Categorie List End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- Shop Page End -->
        
        <!-- Quick View Content Start -->
        
        <!-- Quick View Content End -->
        <!-- Footer Area Start Here -->
        @include('frontend.include.footer')
        <script>
                $(document).ready(function() {
                    $('select[name="sortby"]').on('change', function() {
                        var query = $(this).val();
                        //alert(query);

                        if(query != 'all') {
                            //alert(query);
                            window.location = '{{ url("/frontend/toko/sort-by") }}' + '/' + query;
                        } else {
                            window.location = '{{ url("/frontend/toko/") }}' + '/' + query;
                        }
                    });
                });
        </script>
        <script>
            $(document).ready(function() {
                $('select[name="typeby"]').on('change', function() {
                    var query = $(this).val();
                    //alert(query);

                    if(query != 'all') {
                        //alert(query);
                        window.location = '{{ url("/frontend/toko/sub-kategori/type-by") }}' + '/' + query;
                    } else {
                        window.location = '{{ url("/frontend/toko/") }}' + '/' + query;
                    }
                });
            });
        </script>
        <!-- Footer Area End Here -->
    </div>
    <!-- Main Wrapper End Here -->
</body>
</html>