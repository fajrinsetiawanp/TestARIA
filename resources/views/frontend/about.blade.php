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
    <div class="wrapper white-bg">
        <!-- Main Header Area Start Here -->
        <header>
            <!-- Header Top Start Here -->
            @include('frontend.include.navbar')
            <!-- Header Top End Here -->
        </header>
        <!-- Main Header Area End Here -->
        <!-- Breadcrumb Start -->
        
        <!-- Breadcrumb End -->
        <!-- About Us Start Here -->
         <div class="about-us pt-45">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="sidebar-img sidebar-banner mb-all-30">
                            <img src="{{URL::asset('frontend/img/blog/aboutnew.jpeg')}}" alt="single-blog-img">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-desc text-center">
                            <h3 class="text-center mb-20 about-title">{{ $about->judul }}</h3>
                            <p class="mb-10">{!! $about->deskripsi !!}</p>
                            
                            {{-- <a href="#" class="return-customer-btn read-more">read more</a> --}}
                        </div>
                    </div>
                </div><br>
                <div class="row text-center">
                    <div class="col-lg-6">
                        <h3 class="mb-10 about-title">{{ $visi->judul }}</h3>
                        <p class="mb-20">{!! $visi->deskripsi !!}</p>
                    </div>
                    <div class="col-lg-6">
                        <h3 class="mb-10 about-title">{{ $misi->judul }}</h3>
                        <p class="mb-20">{!! $misi->deskripsi !!}</p>
                    </div>
                </div><br><br>
            </div>
            <!-- Container End -->
         </div>
        <!-- About Us End Here -->
        <!-- About Us Team Start Here -->
        {{-- <div class="about-team pt-45">
            <div class="container">
               <h3 class="mb-30 about-title">our exclusive team</h3>
                <div class="row text-center">
                    <!-- Single Team Start Here -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <div class="single-team mb-all-30">
                            <div class="team-img sidebar-img sidebar-banner">
                                <a href="#"><img src="img/team/2.jpg" alt="team-image"></a>
                                <div class="team-link">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-info">
                                <h4>Marcos Alonso</h4>
                                <p>web designer</p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Team End Here -->
                     <!-- Single Team Start Here -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <div class="single-team mb-all-30">
                            <div class="team-img sidebar-img sidebar-banner">
                                <a href="#"><img src="img/team/1.jpg" alt="team-image"></a>
                                <div class="team-link">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-info">
                                <h4>Luis Aragones</h4>
                                <p>web developer</p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Team End Here -->
                     <!-- Single Team Start Here -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <div class="single-team mb-xxs-30">
                            <div class="team-img sidebar-img sidebar-banner">
                                <a href="#"><img src="img/team/3.jpg" alt="team-image"></a>
                                <div class="team-link">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-info">
                                <h4>Maria Alessis</h4>
                                <p>class master</p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Team End Here -->
                     <!-- Single Team Start Here -->
                    <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                        <div class="single-team">
                            <div class="team-img sidebar-img sidebar-banner">
                                <a href="#"><img src="img/team/4.jpg" alt="team-image"></a>
                                <div class="team-link">
                                    <ul>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="team-info">
                                <h4>John Doe</h4>
                                <p>php developer</p>
                            </div>
                        </div>
                    </div>
                    <!-- Single Team End Here -->
                </div>
            </div>
            <!-- Container End -->
        </div> --}}
        <!-- About Us Team End Here -->
        <!-- About Us Skills Start Here -->
        {{-- <div class="about-skill ptb-45">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                       <h3 class="about-title mb-30">Our skills</h3>
                        <div class="skill-progress mb-all-40">
                            <div class="progress">
                                <div class="skill-title">Strategy 79%</div>
                                <div class="progress-bar wow fadeInLeft" data-wow-delay="0.2s" role="progressbar" style="width: 79%; visibility: visible; animation-delay: 0.2s; animation-name: fadeInLeft;">
                                </div>
                            </div>
                            <div class="progress">
                                <div class="skill-title">Marketing 96%</div>
                                <div class="progress-bar wow fadeInLeft" data-wow-delay="0.3s" role="progressbar" style="width: 96%; visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;">
                                </div>
                            </div>
                            <div class="progress">
                                <div class="skill-title">Wordpress Theme 65%</div>
                                <div class="progress-bar wow fadeInLeft" data-wow-delay="0.4s" role="progressbar" style="width: 65%; visibility: visible; animation-delay: 0.4s; animation-name: fadeInLeft;">
                                </div>
                            </div>
                            <div class="progress">
                                <div class="skill-title">Shopify Theme 75%</div>
                                <div class="progress-bar wow fadeInLeft" data-wow-delay="0.5s" role="progressbar" style="width: 75%; visibility: visible; animation-delay: 0.5s; animation-name: fadeInLeft;">
                                </div>
                            </div>
                            <div class="progress">
                                <div class="skill-title">UI/UX Design 92%</div>
                                <div class="progress-bar wow fadeInLeft" data-wow-delay="0.6s" role="progressbar" style="width: 89%; visibility: visible; animation-delay: 0.6s; animation-name: fadeInLeft;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ht-single-about mb-all-40">
                            <h3 class="about-title mb-30">our experiences</h3>
                            <h5>FUSCE FRINGILLA PORTTITOR IACULI SED QUAM LIBERO, ADIPISCING SED ERAT ID</h5>
                            <p class="mb-15">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac mi malesuada vestibulum. Phasellus tempor nunc eleifend cursus molestie. Mauris lectus arcu, pellentesque at sodales sit amet,</p>
                            <p>Donec ornare mattis suscipit. Praesent fermentum accumsan vulputate. Sed velit nulla, sagittis non erat id, dictum vestibulum ligula. Maecenas sed enim sem.</p>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="ht-single-about">
                            <h3 class="about-title mb-30">our works</h3>
                            <div class="ht-about-work">
                                <span>1</span>
                                <div class="ht-work-text">
                                    <h5><a href="#">LOREM IPSUM DOLOR SIT AMET</a></h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac mi</p>
                                </div>
                            </div>
                            <div class="ht-about-work">
                                <span>2</span>
                                <div class="ht-work-text">
                                    <h5><a href="#">DONEC FERMENTUM EROS</a></h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac mi</p>
                                </div>
                            </div>
                            <div class="ht-about-work">
                                <span>3</span>
                                <div class="ht-work-text">
                                    <h5><a href="#">LOREM IPSUM DOLOR SIT AMET</a></h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent eu nisi ac mi</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Container End -->
        </div> --}}
        <!-- About Us Skills End Here -->
        <!-- Footer Area Start Here -->
        @include('frontend.include.footer')
        <!-- Footer Area End Here -->
    </div>
    <!-- Main Wrapper End Here -->
</body>

</html>