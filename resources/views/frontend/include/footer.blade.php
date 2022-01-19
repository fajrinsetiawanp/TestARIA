{{-- footer --}}
<!-- Signup Newsletter Start -->
    <div class="newsletter light-blue-bg">
        <div class="container">
            <div class="row">
                 <div class="col-xl-5 col-lg-6">
                     <div class="main-news-desc mb-all-30">
                         <div class="news-desc">
                             <h3>Mau Dapat Info Diskon?</h3>
                             <p>Berlangganan Newslatter Doremi Musik Sekarang!</p>
                         </div>
                     </div>
                 </div>
                 <div class="col-xl-7 col-lg-6">
                     <div class="newsletter-box">
                         <form action="{{ url('/frontend/subscribe') }}" method="post">
                            {{ csrf_field() }}
                              <input class="subscribe" placeholder="Masukkan Alamat Email Kamu..." name="email_subscribe" id="subscribe" type="email">
                              <button type="submit" class="submit">Berlangganan</button>
                         </form>
                     </div>
                 </div>
            </div>
        </div>
    </div>
    <!-- Signup-Newsletter End -->
        <footer class="white-bg pt-45">
            <!-- Footer Top Start -->
            <div class="footer-top">
                <div class="container">
                    <div class="row">
                        <!-- Single Footer Start -->
                        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title"></h3>
                                    <a href="download/COMPRO.pdf" download="COMPRO.pdf"><button class ="btn"><i class="fa fa-download"></i> Company Profile</button></a>
                                    <br>
                                    <br>
                                    <a href="download/DOREMI CATALOGUE.pdf" download="CATALOGUE.pdf"><button class ="btn"><i class="fa fa-download"></i> i-Catalog</button></a>

                                <!-- @php
                                    $quicklink = App\Models\TbMasterKategori::inRandomOrder()
                                        ->limit(6)
                                        ->get();
                                @endphp
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        @foreach($quicklink as $quicklinks)
                                        @php
                                            $linktoko = App\Models\TbSubKategori::where('id_kategori', $quicklinks->id);
                                        @endphp
                                        <li><a href="{{ url('/frontend/toko', $quicklinks->id) }}">{{ $quicklinks->nama_kategori }}</a></li>
                                        @endforeach
                                        {{-- <li><a href="#">new products</a></li>
                                        <li><a href="#">best sale</a></li>
                                        <li><a href="contact.html">contact us</a></li>
                                        <li><a href="account.html">My Account</a></li> --}}
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer style-change mb-sm-40">
                                <h3 class="footer-title">Info Perusahaan</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                        <li><a href="{{ url('frontend/tentang-kami') }}">Tentang Kami</a></li>
                                        <li><a href="{{ url('frontend/kontak') }}">Hubungi Kami</a></li>
                                        <!-- <script type='text/javascript' src='https://www.freevisitorcounters.com/auth.php?id=2ca6c85afde78344153b45b368cd91a8cd7e1473'></script>
                                        <script type="text/javascript" src="https://www.freevisitorcounters.com/en/home/counter/724846/t/5"></script> -->
                                        {{-- <li><a href="#">Karir</a></li>
                                        <li><a href="about.html">Service</a></li> --}}
                                        {{-- <li><a href="contact.html">contact us</a></li> --}}
                                        {{-- <li><a href="#">Departemen</a></li> --}}
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                            <div class="single-footer mb-sm-40">
                                <h3 class="footer-title">Pelayanan Pelanggan</h3>
                                <div class="footer-content">
                                    <ul class="footer-list">
                                    @if (Auth::check())
                                        <li><a href="#">Akun Saya</a></li>
                                    @endif
                                        <li><a href="#">Lacak Pesanan</a></li>
                                        {{-- <li><a href="#">Favoritku</a></li>
                                        <li><a href="#">Customer Services</a></li> --}}
                                        <li><a href="#">FAQs</a></li>
                                        <li><a href="{{ url('frontend/terms') }}">Terms & Condition</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- Single Footer Start -->
                        <!-- Single Footer Start -->
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                            <div class="single-footer">
                                <h3 div class="footer-title">Contact Info</h3>
                                    <div class="footer-content">
                                    <!-- <h5 class="contact-info mtb-10">Contact Info:</h5> -->
                                        <p>Pergudangan Jaya Niaga </p>
                                        <p>JL. Halim Perdana Kusuma No.1, </p>
                                        <p>Jurumudi Baru, Kec. Benda, Tangerang - 15124</p>
                                    </div>
                                <div class="widget-social">
                                    <div class="social-icons">
                                        <a href="https://www.facebook.com/DoremiMusikID/?ref=bookmarks" class="social-icon" target="facebook">
                                            <img src={{URL::asset('frontend/img/logo/facebook.png')}}><i class="icon-facebook"></i></a>&nbsp; &nbsp;
                                        <a href="https://www.instagram.com/doremimusicstore/" class="social-icon" target="instagram"><i class="icon-instagram">
                                            <img src={{URL::asset('frontend/img/logo/instagram.png')}}></i></a>&nbsp; &nbsp;
                                        <a href="https://www.youtube.com/channel/UCWbAztZUYS5uHBoXiJZbyeA/videos" class="social-icon" target="_blank">
                                            <img src={{URL::asset('frontend/img/logo/youtube.png')}}></i></a>
                                    </div><!-- End .social-icons -->
                                </div>
                            </div>
                            <!-- Single Footer Start -->
                        </div>
                        <!-- Row End -->
                    </div>
                    <!-- Container End -->
                </div>
                <!-- <a href='https://freehitcounters.org/'>Visitor and Hit Counter</a> -->
            <!-- Footer Top End -->
            <!-- Footer Middle Start -->
            {{-- <div class="footer-middle text-center pb-20">
                <div class="container">
                    <div class="footer-middle-content ptb-45">
                        <div class="tag-content"><a href="#">Online Shopping</a> <a href="#">Promotions</a> <a href="#">My Orders</a> <a href="#">Help</a> <a href="#">Customer Service</a> <a href="#">Support</a> <a href="#">Most Populars</a> <a href="#">New Arrivals</a> <a href="#">Special Products</a> <a href="#">Manufacturers</a> <a href="#">Our Stores</a> <a href="#">Shipping</a> <a href="#">Payments</a> <a href="#">Warantee</a> <a href="#">Refunds</a> <a href="#">Checkout</a> <a href="#">Discount</a> <a href="#">Terms & Conditions</a> <a href="#">Policy</a> <a href="#">Shipping</a> <a href="#">Payments</a> <a href="#">Returns</a> <a href="#">Refunds</a></div>
                        <div class="payment mt-25">
                            <a href="#"><img class="img" src="img/payment/1.png" alt="payment-image"></a>
                        </div>
                    </div>
                </div>
                <!-- Container End -->
            </div> --}}
            <!-- Footer Middle End -->
            <!-- Footer Bottom Start -->
            <div class="footer-bottom off-white-bg ptb-25">
                <div class="container-fluid">
                     <div class="col-sm-12">
                         <div class="row justify-content-md-between justify-content-center footer-bottom-content">                    
                            <p>Copyright &copy; <a target="_blank" href="/">PT Doremi Music Indonesia.</a> <script>document.write(new Date().getFullYear());</script>. All Rights Reserved</p>
                            <div class="footer-bottom-nav mt-sm-15">
                                <nav>
                                    <ul class="footer-nav-list">
                                        <li><a href="/">Beranda</a></li>
                                        <li><a href="{{ url('/frontend/toko/all') }}">Toko</a></li>
                                        <li><a href="{{ url('frontend/tentang-kami') }}">Tentang Kami</a></li>
                                        {{-- <li><a href="{{ url('frontend/kontak') }}">Kontak</a></li> --}}
                                    </ul>
                                </nav>
                            </div>
                         </div>
                         <!-- Row End -->
                     </div>
                </div>
                <!-- Container End -->
            </div>
            <!-- Footer Bottom End -->
        </footer>

{{-- script --}}
        <!-- jquery 3.2.1 -->
        <script src="{{URL::asset('frontend/js/vendor/jquery-3.2.1.min.js')}}"></script>
        <!-- Countdown js -->
        <script src="{{URL::asset('frontend/js/jquery.countdown.min.js')}}"></script>
        <!-- Mobile menu js -->
        <script src="{{URL::asset('frontend/js/jquery.meanmenu.min.js')}}"></script>
        <!-- ScrollUp js -->
        <script src="{{URL::asset('frontend/js/jquery.scrollUp.js')}}"></script>
        <!-- Nivo slider js -->
        <script src="{{URL::asset('frontend/js/jquery.nivo.slider.js')}}"></script>
        <!-- Fancybox js -->
        <script src="{{URL::asset('frontend/js/jquery.fancybox.min.js')}}"></script>
        <!-- Jquery nice select js -->
        {{-- <script src="{{URL::asset('frontend/js/jquery.nice-select.min.js')}}"></script> --}}
        <!-- Jquery ui price slider js -->
        <script src="{{URL::asset('frontend/js/jquery-ui.min.js')}}"></script>
        <!-- Owl carousel -->
        <script src="{{URL::asset('frontend/js/owl.carousel.min.js')}}"></script>
        <!-- Bootstrap popper js -->
        <script src="{{URL::asset('frontend/js/popper.min.js')}}"></script>
        <!-- Bootstrap js -->
        <script src="{{URL::asset('frontend/js/bootstrap.min.js')}}"></script>
        <!-- Plugin js -->
        <script src="{{URL::asset('frontend/js/plugins.js')}}"></script>
        <!-- Main activaion js -->
        <script src="{{URL::asset('frontend/js/main.js')}}"></script>

        <!-- WhatsHelp.io widget -->
        <script type="text/javascript">
            (function () {
                var options = {
                    whatsapp: "+628811518381", // WhatsApp number
                    call_to_action: "Hello, welcome!", // Call to action
                    position: "right", // Position may be 'right' or 'left'
                };
                var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
                var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
                s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
                var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
            })();
        </script>
        <!-- /WhatsHelp.io widget -->