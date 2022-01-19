<!doctype html>
<html class="no-js" lang="zxx">

<head>    
    @include('frontend.include.header')
    <style>.embed-container { position: relative; padding-bottom: 36.25%; height: 0; overflow: hidden; max-width: 100%; } .embed-container iframe, .embed-container object, .embed-container embed { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }</style>
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
                        <li class="active"><a href="#">Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <!-- Container End -->
        </div>
        <!-- Breadcrumb End -->
        <!-- Google Map Start -->
        {{-- <div class="goole-map pt-45">
            <div class="container">
                <div id="map" style="height:400px"></div>
            </div>
        </div> --}}
        <div class="goole-map pt-15">
            <div class="container">
                <div class='embed-container'>
                    <!-- <iframe src='https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15865.127667963643!2d106.59195901230724!3d-6.22651224665225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xcbb324fe532fa222!2sDoremi+Music+Indonesia!5e0!3m2!1sen!2sid!4v1543819899698' width='600' height='300' frameborder='0' style='border:0' allowfullscreen></iframe> -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126928.89099144119!2d106.6456139362288!3d-6.193865241512417!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f9d2b34e9f1f%3A0x50a2d53d5973ab99!2sDoremi%20Music%20Indonesia%20Head%20Office!5e0!3m2!1sid!2sid!4v1569811459261!5m2!1sid!2sid" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                </div>
            </div>
        </div>
        <!-- Google Map End -->
        <!-- Contact Email Area Start -->
        <div class="contact-area ptb-45">
            <div class="container">
                <h3 class="mb-20">Contact Us</h3>
                <p class="text-capitalize mb-20">Hubungi kami jika ada pertanyaan, saran dan kritik.</p>
                <form id="contact-form" class="contact-form" action="{{ url('/frontend/submit-kontak') }}" method="post">
                    {{ csrf_field() }}
                    <div class="address-wrapper row">
                        <div class="col-md-12">
                            <div class="address-fname">
                                <input class="form-control" type="text" name="nama" placeholder="Nama">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="address-email">
                                <input class="form-control" type="email" name="email" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="address-web">
                                <input class="form-control" type="tel" name="no_handphone" placeholder="Nomor Handphone">
                            </div>
                        </div>
                        {{-- <div class="col-md-12">
                            <div class="address-subject">
                                <input class="form-control" type="text" name="subject" placeholder="Subject">
                            </div>
                        </div> --}}
                        <div class="col-md-12">
                            <div class="address-textarea">
                                <textarea name="messages" class="form-control" placeholder="Tulis pesan"></textarea>
                            </div>
                        </div>
                    </div>
                    <p class="form-message"></p>
                    <div class="footer-content mail-content clearfix">
                        <div class="send-email float-md-right">
                            <input value="Submit" class="return-customer-btn" type="submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Contact Email Area End -->
        <!-- Footer Area Start Here -->
        @include('frontend.include.footer')
        <!-- Footer Area End Here -->
    </div>
    <!-- Main Wrapper End Here -->
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAL4uqCqQDMYorDoS-Qpyga3ntYcQDaiCI"></script> --}}
    {{-- <script>
        // When the window has finished loading create our google map below
        google.maps.event.addDomListener(window, 'load', init);

        function init() {
            // Basic options for a simple Google Map
            // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
            var mapOptions = {
                // How zoomed in you want the map to start at (always required)
                zoom: 17,

                scrollwheel: false,

                // The latitude and longitude to center the map (always required)
                center: new google.maps.LatLng(-6.2243589, 106.5925943), // New York

                // How you would like to style the map. 
                // This is where you would paste any style found on Snazzy Maps.
                styles: [{
                        "featureType": "administrative",
                        "elementType": "labels.text.fill",
                        "stylers": [{
                            "color": "#444444"
                        }]
                    },
                    {
                        "featureType": "landscape",
                        "elementType": "all",
                        "stylers": [{
                            "color": "#f2f2f2"
                        }]
                    },
                    {
                        "featureType": "poi",
                        "elementType": "all",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "road",
                        "elementType": "all",
                        "stylers": [{
                                "saturation": -100
                            },
                            {
                                "lightness": 45
                            }
                        ]
                    },
                    {
                        "featureType": "road.highway",
                        "elementType": "all",
                        "stylers": [{
                            "visibility": "simplified"
                        }]
                    },
                    {
                        "featureType": "road.arterial",
                        "elementType": "labels.icon",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "transit",
                        "elementType": "all",
                        "stylers": [{
                            "visibility": "off"
                        }]
                    },
                    {
                        "featureType": "water",
                        "elementType": "all",
                        "stylers": [{
                                "color": "#314453"
                            },
                            {
                                "visibility": "on"
                            }
                        ]
                    },
                    {
                        "featureType": "water",
                        "elementType": "geometry.fill",
                        "stylers": [{
                                "lightness": "-12"
                            },
                            {
                                "saturation": "0"
                            },
                            {
                                "color": "#4bc7e9"
                            }
                        ]
                    }
                ]
            };

            // Get the HTML DOM element that will contain your map 
            // We are using a div with id="map" seen below in the <body>
            var mapElement = document.getElementById('map');

            // Create the Google Map using our element and options defined above
            var map = new google.maps.Map(mapElement, mapOptions);

            // Let's also add a marker while we're at it
            var marker = new google.maps.Marker({
                position: new google.maps.LatLng(-6.2243589, 106.5925943),
                map: map,
                title: 'Snazzy!'
            });
        }
    </script> --}}
</body>

</html>