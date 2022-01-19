@if(count($produkBaru) > 0 || count($produkHargaTerbaik) > 0)
        <div class="new-featured-pro pb-45">
            <div class="container">
                <div class="row">
                    <!-- New Products Area Start Here -->
                    <div class="col-lg-6">
                        <!-- Main Product Wrpper Start Here -->
                        <div class="main-pro-wrapper">
                            <div class="new-products">
                                <!-- Post Title Start -->
                                <div class="post-title">
                                    <h2><i class="ion-ribbon-b" aria-hidden="true"></i>Produk Terbaru</h2>
                                </div>
                                <!-- Post Title End -->
                                {{-- <div class="single-banner">
                                    <a href="shop.html"><img src="img/banner/11.jpg" alt=""></a>
                                </div> --}}
                            </div>
                            <!-- New Products Activation Start -->
                            <div class="new-products-active owl-carousel">
                                <!-- Single Product Start -->
                                @foreach($produkBaru as $k => $v)
                                @php
                                    $url_new = urlencode($v->kode_sku);
                                @endphp
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{ url('/frontend/produk-detail', $url_new) }}">
                                            <img style="height: 224px;width: 224px;" class="primary-img" src="{{ env('APP_URL') }}/{{ $v->gambar['gambar'] }}" alt="single-product">
                                            {{-- <img class="secondary-img" src="img/products/15.jpg" alt="single-product"> --}}
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="{{ url('/frontend/produk-detail', $v->kode_sku) }}">{{ $v->judul1 }} {{ $v->judul2 }}</a></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            @if($v->harga->diskon != 0)
                                                <p><span class="price">
                                                        Rp. {{ number_format($v->harga_diskon) }}
                                                    </span>
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
                                            {{-- <p><span class="price">$27.45</span><del class="prev-price">$30.50</del></p> --}}
                                        </div>
                                        <div class="pro-actions">
                                            <form action="{{ url('/frontend/cart') }}" method="POST" id="formCartTerbaru{{ $v->id }}">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="kode_sku" value="{{ $v->kode_sku }}">
                                                <input type="hidden" name="judul" value="{{ $v->judul }}">
                                                @if($v->harga->diskon != 0)
                                                    <input type="hidden" name="harga" value="{{ $v->harga_diskon }}">
                                                @else
                                                    <input type="hidden" name="harga" value="{{ $v->harga->harga }}">
                                                @endif
                                            </form>
                                            <div class="actions-primary">
                                                <a href="#" title="Add to Cart" onclick="document.getElementById('formCartTerbaru{{ $v->id }}').submit();">Add To Cart</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                <a href="{{ url('/frontend/produk-detail', $url_new) }}" title="Details"><i class="fa fa-signal"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Product Content End -->
                                    <span class="sticker-new">new</span>
                                </div>
                                @endforeach
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                {{-- <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="img/products/14.jpg" alt="single-product">
                                            <img class="secondary-img" src="img/products/15.jpg" alt="single-product">
                                        </a>
                                    </div>
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
                                    <span class="sticker-new">new</span>
                                </div> --}}
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                {{-- <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="img/products/4.jpg" alt="single-product">
                                            <img class="secondary-img" src="img/products/6.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="product.html">printed summer dress</a></h4>
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
                                    <span class="sticker-new">new</span>
                                </div> --}}
                                <!-- Single Product End -->
                            </div>
                            <!-- New Products Activation End -->
                        </div>
                        <!-- Main Product Wrpper Start Here -->
                    </div>
                    <!-- New Products Area End Here -->
                    <!-- Featured Products Area Start Here -->
                    @if(count($produkHargaTerbaik) > 0)
                    <div class="col-lg-6">
                        <!-- Main Product Wrpper Start Here -->
                        <div class="main-pro-wrapper">
                            <div class="featured-products">
                                <!-- Post Title Start -->
                                <div class="post-title">
                                    <h2><i class="ion-trophy" aria-hidden="true"></i>Produk Pilihan</h2>
                                </div>
                                <!-- Post Title End -->
                                {{-- <div class="single-banner">
                                    <a href="shop.html"><img src="img/banner/12.jpg" alt=""></a>
                                </div> --}}
                            </div>
                            <!-- Featured Products Activation Start -->
                            <div class="new-products-active owl-carousel">
                                <!-- Single Product Start -->
                                @foreach($produkHargaTerbaik as $k => $v)
                                @php
                                    $url_baru = urlencode($v->kode_sku);
                                @endphp
                                <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="{{ url('/frontend/produk-detail', $url_new) }}">
                                            <img style="height: 224px;width: 224px;" class="primary-img" src="{{ env('APP_URL') }}/{{ $v->gambar['gambar'] }}" alt="single-product">
                                            {{-- <img class="secondary-img" src="img/products/32.jpg" alt="single-product"> --}}
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="{{ url('/frontend/produk-detail',$url_baru) }}">{{ $v->judul1 }} {{ $v->judul2 }}</a></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                             @if($v->harga->diskon != 0)
                                                <p><span class="price">
                                                        Rp. {{ number_format($v->harga_diskon) }}
                                                    </span>
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
                                        </div>
                                        <div class="pro-actions">
                                            <form action="{{ url('/frontend/cart') }}" method="POST" id="formCartTerbaik{{ $v->id }}">
                                                {!! csrf_field() !!}
                                                <input type="hidden" name="kode_sku" value="{{ $v->kode_sku }}">
                                                <input type="hidden" name="judul" value="{{ $v->judul }}">
                                                @if($v->harga->diskon != 0)
                                                    <input type="hidden" name="harga" value="{{ $v->harga_diskon }}">
                                                @else
                                                    <input type="hidden" name="harga" value="{{ $v->harga->harga }}">
                                                @endif
                                            </form>
                                            <div class="actions-primary">
                                                <a href="#" title="Add to Cart" onclick="document.getElementById('formCartTerbaik{{ $v->id }}').submit();">Add To Cart</a>
                                            </div>
                                            <div class="actions-secondary">
                                                <a href="#" data-toggle="modal" data-target="#myModal" title="Quick View"><i class="fa fa-heart-o"></i></a>
                                                <a href="{{ url('/frontend/produk-detail', $url_baru) }}" title="Details"><i class="fa fa-signal"></i></a>
                                            </div>
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
                                            <img class="primary-img" src="img/products/8.jpg" alt="single-product">
                                            <img class="secondary-img" src="img/products/9.jpg" alt="single-product">
                                        </a>
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
                                    <span class="sticker-new">new</span>
                                </div> --}}
                                <!-- Single Product End -->
                                <!-- Single Product Start -->
                                {{-- <div class="single-product">
                                    <!-- Product Image Start -->
                                    <div class="pro-img">
                                        <a href="product.html">
                                            <img class="primary-img" src="img/products/33.jpg" alt="single-product">
                                            <img class="secondary-img" src="img/products/16.jpg" alt="single-product">
                                        </a>
                                    </div>
                                    <!-- Product Image End -->
                                    <!-- Product Content Start -->
                                    <div class="pro-content">
                                        <div class="pro-info">
                                            <h4><a href="product.html">printed summer dress</a></h4>
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
                                    <span class="sticker-new">new</span>
                                </div> --}}
                                <!-- Single Product End -->
                            </div>
                            <!-- Featured Products Activation End -->
                        </div>
                        <!-- Main Product Wrpper Start Here -->
                    </div>
                    @endif
                    <!-- Featured Products Area End Here -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        @endif