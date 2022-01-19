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
            <!-- Header Top End Here -->
        </header>
        <!-- Main Header Area End Here -->
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="/">Home</a></li>
                        <li class="active"><a href="#">Online</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <div class="breadcrumb-area mt-20">
            <div class="container">
                <h5>Klik E-commerce ini sesuai sama yang kamu mau... </h5>
                <h5>Kemudian search deh produk yang kalian butuhkan...</h5>
                <br><br>
                <center><div class="social-icons">
                    <a href="https://www.tokopedia.com/ptdoremimusic" class="tokopedia" target="_blank" title="Tokopedia">
                        <img src="img/logo/online1.png" align="flex-center"></i>
                    </a> 
                    <a href="https://www.bukalapak.com/u/ptdoremimusicindonesia" class="bukalapak" target="_blank" title="Bukalapak">
                        <img src="img/logo/online2.png" align="flex-center"></i>
                    </a>
                    <a href="https://shopee.co.id/ptdoremimusicindonesia" class="Shopee" target="_blank" title="Shopee">
                        <br><td><img src="img/logo/online3.png" align="flex-center"></i></td><br><br>
                    </a>
                    <a href="https://www.blibli.com/merchant/doremi-musik/DOM-60030?page=1&start=0&pickupPointCode=&cnc=&multiCategory=true&excludeProductList=true&sort=7" class="Blibli" target="_blank" title="Blibli">
                       <br><td><img src="img/logo/online41.png" align="flex-center"></i></td><br>
                    </a>
                    <a href="https://www.ilotte.com/brandmall/Yamaha-Music/000000101809/main.do" class="iLotte" target="_blank" title="iLotte">
                        <br><img src="img/logo/online6.png" align="flex-center"></i>
                    </a>
                </div></center>
                <!-- End .social-icons -->
            </div>
        </div>
        <div class="contact-area ptb-45">
            <div class="container">
                <!-- <li><a href="Tokopedia">Tokopedia</a></li>
                <li><a href="Bukalapak">Bukalapak</a></li>
                <li><a href="Shopee">Shopee</a></li>
                <li><a href="Blibli">Blibli</a></li>
                <li><a href="Lotte">iLotte</a></li> -->
            </div>
        </div>
        <!-- Contact Email Area End -->
        <!-- Footer Area Start Here -->
        @include('frontend.include.footer')
        <!-- Footer Area End Here -->
    </div>
</body>

</html>