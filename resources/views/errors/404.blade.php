<!doctype html>
<html class="no-js" lang="zxx">

<head>    
    @include('frontend.include.header')
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
                        <li class="active"><a href="#">404</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- Error 404 Area Start -->
        <div class="error404-area ptb-45">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="error-wrapper text-center">
                            <div class="error-text">
                                <h1>404</h1>

                                <h2>Opps! PAGE NOT BE FOUND</h2>
                                <p>Sorry but the page you are looking for does not exist, have been removed, name changed or is temporarity unavailable.</p>
                            </div>
                            {{-- <div class="search-error">
                                <form id="search-form" action="#">
                                    <input type="text" placeholder="Search">
                                    <button><i class="fa fa-search"></i></button>
                                </form>
                            </div> --}}
                            <div class="error-button">
                                <a href="/">Back to home page</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Error 404 Area End -->
        <!-- Footer Area Start Here -->
        @include('frontend.include.footer')
        <!-- Footer Area End Here -->
    </div>
    <!-- Main Wrapper End Here -->
</body>

</html>