<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Form Teacher Doremi</title>
	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<!-- Font-->
	<link rel="stylesheet" type="text/css" href="{{URL::asset('form-teacher/css/opensans-font.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('form-teacher/fonts/line-awesome/css/line-awesome.min.css')}}">
	<!-- Jquery -->
	<link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
	<!-- Main Style Css -->
    <link rel="stylesheet" href="{{URL::asset('form-teacher/css/style.css')}}"/>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body class="form-v4">
	<div class="page-content">
		<div class="form-v4-content">
			<div class="form-left">
				<h2 class="text-center"><img src="{{URL::asset('frontend/img/logo/logonew.png')}}" alt="logo-image"></h2>
				<p class="text-1">Selamat datang di Web Aplikasi Doremi Group!</p>
				<p class="text-2">Ini adalah form pendaftaran yang di khususkan untuk guru yang mengajar di Doremi Group! <br> Dimana dengan adanya akun ini anda bisa melakukan transaksi penjualan barang dari Doremi Group di website resmi <a href="https://doremimusicstore.com" target="_blank">Doremi Musik Indonesia</a> dan anda akan mendapatkan komisi dari setiap penjualan sesuai dengan syarat dan ketentuan yang berlaku.</p>
				<p class="text-1">Salam Doremi Group!</p>
				<div class="form-left-last">
					<input type="submit" name="account" class="account" value="Sudah Punya Akun ?" onclick="window.open('https://doremimusicstore.com/frontend/login')">
				</div>
			</div>

			<form class="form-detail" action="/frontend/save-teacher-registration" method="post" id="myform">
			
			<div class="form-row-last">
				@if (session('success'))
				<div class="alert alert-success alert-dismissible">
				    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
				    <strong>Success!</strong> {{ session('success') }}
				</div>
				@endif
			</div>
			
				<!-- <h2>REGISTER FORM</h2> -->
				{{ csrf_field() }}
				<div class="form-group">
					<div class="form-row form-row-1">
						<label for="first_name">Nama Lengkap</label>
						<input type="text" name="name" id="name" class="input-text" required>
					</div>
					<div class="form-row form-row-1">
						<label for="first_name">No. Handphone</label>
						<input type="text" name="phone_number" id="phone_number" class="input-text" required>
					</div>
				</div>
				<div class="form-row">
					<label for="your_email">Email</label>
					<input type="text" name="email" id="email" class="input-text" required pattern="[^@]+@[^@]+.[a-zA-Z]{2,6}">
				</div>
				<div class="form-row">
					<label for="your_email">Alamat</label>
					<input type="text" name="address" id="address" class="input-text" required>
				</div>
				<div class="form-group">
					<div class="form-row form-row-1 ">
						<label for="password">Password</label>
						<input type="password" name="password" id="password" class="input-text" required>
					</div>
					<div class="form-row form-row-1">
						<label for="comfirm-password">Confirm Password</label>
						<input type="password" name="confirm_password" id="comfirm_password" class="input-text" required>
					</div>
				</div>
				<div class="form-group">
					<div class="form-row form-row-1">
						<label for="first_name">No. Rekening</label>
						<input type="text" name="account_number" id="account_number" class="input-text" required>
					</div>
					<div class="form-row form-row-1">
						<label for="first_name">Bank</label>
						<input type="text" name="bank" id="bank" class="input-text" required>
					</div>
				</div>
				<div class="form-row">
					<label for="your_email">Lokasi</label>
					<select class="form-control" required name="location_branch">
						<option></option>
						<option value="Villa Permata">Villa Permata</option>
						<option value="Beryl">Beryl</option>
						<option value="Greenlake">Greenlake</option>
						<option value="Balikpapan">Balikpapan</option>
					</select>
				</div>
				<br>
				<!-- <div class="form-checkbox">
					<label class="container"><p>I agree to the <a href="#" class="text">Terms and Conditions</a></p>
					  	<input type="checkbox" name="checkbox">
					  	<span class="checkmark"></span>
					</label>
				</div> -->
				<div class="form-row-last">
					<input type="submit" name="register" class="register" value="Register">
				</div>
			</form>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
	<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
	<script>
		// just for the demos, avoids form submit
		jQuery.validator.setDefaults({
		  	debug: false,
		  	success:  function(label){
        		label.attr('id', 'valid');
   		 	},
		});
		$( "#myform" ).validate({
		  	rules: {
			    password: "required",
		    	confirm_password: {
		      		equalTo: "#password"
		    	}
		  	},
		  	messages: {
		  		first_name: {
		  			required: "Please enter a firstname"
		  		},
		  		last_name: {
		  			required: "Please enter a lastname"
		  		},
		  		your_email: {
		  			required: "Please provide an email"
		  		},
		  		password: {
	  				required: "Please enter a password"
		  		},
		  		confirm_password: {
		  			required: "Please enter a password",
		      		equalTo: "Wrong Password"
		    	}
		  	}
		});
	</script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>