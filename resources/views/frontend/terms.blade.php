<!doctype html>
<html class="no-js" lang="zxx">



<head>    
    @include('frontend.include.header')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
<meta name="facebook-domain-verification" content="ne72moz88sckdwpz9p01oi9g7was3g" />
    
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
                        <li class="active"><a href="#">Terms & Condition    </a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- About Us Start Here -->
        <div class="about-us pt-45">
            <!-- Container Start -->
            <div class="container">
                <div class="col-lg-12">
                    <div class="about-desc text-center">
                        <h3 class="text-center mb-20 about-title">Terms & Condition</h3>
                        <p class="mb-10">{!! $terms->deskripsi !!}</p><br>
                    </div>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- About Us End Here -->
        <!-- Footer Area Start Here -->
        @include('frontend.include.footer')
        <!-- Footer Area End Here -->
    </div>
    <!-- Main Wrapper End Here -->
</body>

</html>