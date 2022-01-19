<!doctype html>
<html lang="en">
	<head>
	    <!-- Required meta tags -->
	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <link rel="icon" href="{{URL::asset('frontend/images/fav.png')}}" type="image/png" sizes="16x16">
		<link href="{{URL::asset('frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css')}}" rel="stylesheet" type="text/css">
	    <!-- Bootstrap CSS -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	    <link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/styles/review.css')}}">

	    <title>Pesanan Selesai | Doremi Music Indonesia</title>
  	</head>

  	<body>
  		<nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
	        <a href="index.html" class="navbar-brand" href="/" style="padding-left: 40px;">DOREMI</a>
	        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	        </button>
	        <div class="collapse navbar-collapse" id="navbarSupportedContent">
	            <ul class="navbar-nav mr-auto">
	              <li class="nav-item active">
	                <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
	              </li>
	            </ul>
	           <!-- <form class="form-inline my-2 my-lg-0">
					<div class="progress">
		        		<div class="one danger-color">
		        		</div>
		        		<div class="two danger-color">	
		        		</div>
		        		<div class="three no-color">
		        		</div>
		  				<div class="progress-bar progress-bar-danger" style="width: 25%">	
		  				</div>
					</div>
	            </form> --> 	
	        </div>
	    </nav>

	    <div class="container" style="margin-top: 2px;">
	    		<div class="row">
		    		<div class="col-2"></div>
			    		<div class="col-8 row justify-content-center">
			    			<div class="alert alert-primary" role="alert" style="width: 30rem;">
		 						<h1><center> <i class="far fa-check-circle">Terima Kasih</i> </center></h1>
		 						<p>Pesanan sedang diverifikasi dan akan segera kami proses. </p>
							</div>
			    		</div>
					    <div class="col-2">

					    </div>
  				</div>
  				<div class="row" style="margin-top: 10px;">
		    		<div class="col-2"></div>
			    		<div class="col-8 row justify-content-center">
			     			<div class="card bg-light mb-6" style="width: 30rem;">
								{{-- <h5><div class="card-header">Panduan Pembayaran</div></h5> --}}
									<div class="card-body">	
										<a href="{{ url('frontend/toko/all') }}"><button class="subscribe btn btn-primary btn-block" type="button" class="btn btn-primary btn-sm"> Kembali Berbelanja  </button></a><br>
										<a href="{{ url('frontend/lacak-pesanan') }}"><button class="subscribe btn btn-outline-primary btn-block" type="button" class="btn btn-primary btn-sm"> Cek Status Pesanan </button></a>
									</div>
							</div>
			    		</div>
					    <div class="col-2">

					    </div>
  				</div>
	  			<footer class="my-5 pt-5 text-muted text-center text-small">
					<p class="mb-1"> &nbsp; </p>
				</footer>
		</div>



	 <!-- Optional JavaScript -->
    	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  	</body>