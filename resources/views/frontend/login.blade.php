<!doctype html>
<html class="no-js" lang="zxx">


<head>
    @include('frontend.include.header')

     <!-- <style type="text/css">
        body {
        background: url(frontend/img/slider/logodoremi1.png) no-repeat fixed;
           -webkit-background-size: 100% 100%;
           -moz-background-size: 100% 100%;
           -o-background-size: 100% 100%;
           background-size: 100% 100%;
        }
    </style> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
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
            <!-- Header Bottom End Here -->
        </header>
        <!-- Main Header Area End Here -->
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-area mt-30">
            <div class="container">
                <div class="breadcrumb">
                    <ul class="d-flex align-items-center">
                        <li><a href="home">Home</a></li>
                        <li class="active"><a href="register.html">Login</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->

        <!-- LogIn Page Start -->
        <div class="log-in ptb-45">
            <div class="container">
                <div class="row">
                    <!-- New Customer Start -->
                    <div class="col-md-3">
                        <div class="background-image">
                            <img src="/frontend/img/slider/logodoremi.png" style="position: absolute;" class="background-image" >
                        </div>
                        <!-- {{-- <div class="well mb-sm-30">
                            <div class="new-customer">
                                <h3 class="custom-title">new customer</h3>
                                <p class="mtb-10"><strong>Register</strong></p>
                                <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made</p>
                                <a class="customer-btn" href="register.html">continue</a>
                            </div>
                        </div> --}} -->
                    </div>
                    <!-- New Customer End -->
                    <!-- Returning Customer Start -->
                    <div class="col-md-6">
                        <div class="well">
                            @if(\Session::has('alert'))
                                <div class="alert alert-primary">
                                    <div>{{Session::get('alert')}}</div>
                                </div>
                            @endif
                            @if(\Session::has('alert-success'))
                                <div class="alert alert-success">
                                    <div>{{Session::get('alert-success')}}</div>
                                </div>
                            @endif
                       
                            <div class="return-customer">
                                <center><h3 class="mb-10 custom-title">Login</h3></center>
                                {{-- <p class="mb-10"><strong>I am a returning customer</strong></p> --}}
                                <form action="{{ url('/frontend/prosesLogin') }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" placeholder="Enter your email address..." id="input-email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" placeholder="Password" id="input-password" class="form-control">
                                    </div>
                                    {{-- <p class="lost-password"><a href="forgot-password.html">Forgot password?</a></p> --}}
                                    <input type="submit" class="return-customer-btn">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Returning Customer End -->
                    <!-- New Customer Start -->
                    <div class="col-md-3">
                        {{-- <div class="well mb-sm-30">
                            <div class="new-customer">
                                <h3 class="custom-title">new customer</h3>
                                <p class="mtb-10"><strong>Register</strong></p>
                                <p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made</p>
                                <a class="customer-btn" href="register.html">continue</a>
                            </div>
                        </div> --}}
                    </div>
                    <!-- New Customer End -->
                </div>
                <!-- Row End -->
            </div>
            <!-- Container End -->
        </div>
        <!-- LogIn Page End -->
        
        <!-- Footer Area Start Here -->
        @include('frontend.include.footer')
        <!-- Footer Area End Here -->
    </div>
    <!-- Main Wrapper End Here -->
</body>

</html>