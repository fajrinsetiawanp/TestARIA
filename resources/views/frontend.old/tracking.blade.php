<!DOCTYPE html>
<html lang="en">
<head>
	@include('frontend.include.header')
	<link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/styles/shop_styles.css')}}">
	<link rel="stylesheet" type="text/css" href="{{URL::asset('frontend/styles/blog_single_responsive.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
	<meta name="facebook-domain-verification" content="9fqh8b6v5ssc4qkcb6kj5xompibqnt" />
</head>

<body>

<div class="super_container">
	
	<!-- Header -->
	@include('frontend.include.navbar')

	<!-- Home -->

	<!-- Home 

	<div class="home">
		<div class="home_background parallax-window" data-parallax="scroll" data-image-src="images/shop_background.jpg"></div>
		<div class="home_overlay"></div>
		<div class="home_content d-flex flex-column align-items-center justify-content-center">
			<h2 class="home_title">Doremi Music Blog</h2>
		</div>
	</div> -->

	<!-- Single Blog Post -->

	<div class="single_post">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="single_post_title">Lacak Pesanan</div>
					<div class="single_post_text">
						<p><strong>Selamat datang di halaman Cek Status Pesanan Doremi Music Indonesia!</strong>
						<br>Silahkan masukkan nomor pesanan Anda untuk melacak status pesanan. Jika Anda tidak mengetahui nomor pesanan Anda, mohon periksa email konfirmasi pesanan yang Doremi Music Indonesia kirimkan sebelumnya ke alamat email Anda.
						<br>
						<!--LACAK PESANAN-->
						<div class="table-responsive-sm">
							<table class="table table-striped" style="border:0px;">
							    <thead>
							      <tr>
							        <th>
							        	<div class="sidebar_section">	
												<div class="custom-select" style="width:250px; height: 45px;">
												  <select>
												  	@foreach($jasa_kirim as $jasa_kirims)
												    	<option value="{{ $jasa_kirims->nama_singkatan }}">{{ $jasa_kirims->nama }}</option>
												    @endforeach
												  </select>
											</div>
										</div>
							        </th>
							        <th><input class="form-control mr-lg-2" type="text" name="no_resi" id="no_resi" placeholder="Ex: 00001111"></th>
							        <th> <!-- <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
	  								Cari
	  								</a> -->
	  									<button type="submit" class="btn btn-primary" onclick="myFunction()">Cek</button>
	  								</th>
							      </tr>
							    </thead>
							</table>
						</div>
						<!--Collapes Lacak Pesanan-->

						<div class="collapse show" id="collapseExample">
							
  								<div class="card card-body">
  									<h3>Tracking Details</h3>
  									<br>
  									<div class="table-responsive-sm">
	 								   <table class="table">
										    <thead class="thead-light">
										      <tr>
										        <th>No AWB</th>
										        <th>Service</th>
										        <th>Date Of Shipment</th>
										        <th>Origin</th>
										        <th>Destination</th>
										      </tr>
										    </thead>
										    <tbody id="history">
										      <tr>
										        <td></td>
										        <td></td>
										        <td></td>
										        <td></td>
										        <td></td>
										      </tr>
										  </tbody>
										</table>
									</div>
									<div class="table-responsive-sm">
	 								   <table class="table">
										    <thead class="thead-light">
										      <tr>
										        <th colspan="2">History</th>
										      </tr>
										    </thead>
										    <tbody id="detail_history">
										      <tr>
										        <td></td>
										        <td></td>
										      </tr>
										  	</tbody>
										</table>
									</div>
 								 </div>
						</div>
						<p><strong>Info Pengiriman</strong>
							<br>Pengiriman melalui jasa pengiriman, status pesanan di website akan terupdate 1 hari kerja setelah notifikasi diterima.
						<!--Penghargaan-->
							<br>		
					</div>
				</div>
			</div>
		</div>
	</div>
 
	<!-- Footer -->

	@include('frontend.include.footerbar')
</div>

@include('frontend.include.footer')

<script src="{{URL::asset('frontend/plugins/parallax-js-master/parallax.min.js')}}"></script>
<script src="{{URL::asset('frontend/js/blog_single_custom.js')}}"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<script type="text/javascript">
	function myFunction() {
	  var jasa_kirim = 'rpx';
	  var no_resi = document.getElementById("no_resi").value;
	  if (no_resi) {
	  	$.ajax({
            url: '{{ url("/frontend/cek-pesanan") }}' + '/' + jasa_kirim + '/' + no_resi,
            success:function(data) {
            	// alert(data['DELIVERY_TO']);
            	$('#history').append('<tr><td>' + no_resi + '</td><td>' + "YES" + '</td><td>' + data['DELIVERY_DATE'] + '</td><td>' + data['DELIVERY_LOC'] + '</td><td>' + data['DELIVERY_TO'] + '</td></tr>');

            	var tr;
            	var obj = data['DATA'];
                var jumlahdata = obj.length;
                alert(data['DATA']);
            	for (var i=0;i<jumlahdata;i++){
					// $('#detail_history').append('<tr><td>' + "04-04-2018" + '</td><td>' + "SHIPMENT RECEIVED BY JNE COUNTER OFFICER AT [Tangerang]" + '</td></tr>');
					tr = $('<tr/>');
		            tr.append("<td>" + obj[i].TRACKING_DATE + "</td>");
		            tr.append("<td>" + json[i].TRACKING_DESC + "</td>");
		            $('#detail_history').append(tr);
				}
            }
        });
	  } else {
	  	toastr.info('Masukkan No. Resi Anda!', '', {timeOut: 10000});
	  }

	}
</script>

<script type="text/javascript">
	var x, i, j, selElmnt, a, b, c;
/*look for any elements with the class "custom-select":*/
x = document.getElementsByClassName("custom-select");
for (i = 0; i < x.length; i++) {
  selElmnt = x[i].getElementsByTagName("select")[0];
  /*for each element, create a new DIV that will act as the selected item:*/
  a = document.createElement("DIV");
  a.setAttribute("class", "select-selected");
  a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
  x[i].appendChild(a);
  /*for each element, create a new DIV that will contain the option list:*/
  b = document.createElement("DIV");
  b.setAttribute("class", "select-items select-hide");
  for (j = 1; j < selElmnt.length; j++) {
    /*for each option in the original select element,
    create a new DIV that will act as an option item:*/
    c = document.createElement("DIV");
    c.innerHTML = selElmnt.options[j].innerHTML;
    c.addEventListener("click", function(e) {
        /*when an item is clicked, update the original select box,
        and the selected item:*/
        var y, i, k, s, h;
        s = this.parentNode.parentNode.getElementsByTagName("select")[0];
        h = this.parentNode.previousSibling;
        for (i = 0; i < s.length; i++) {
          if (s.options[i].innerHTML == this.innerHTML) {
            s.selectedIndex = i;
            h.innerHTML = this.innerHTML;
            y = this.parentNode.getElementsByClassName("same-as-selected");
            for (k = 0; k < y.length; k++) {
              y[k].removeAttribute("class");
            }
            this.setAttribute("class", "same-as-selected");
            break;
          }
        }
        h.click();
    });
    b.appendChild(c);
  }
  x[i].appendChild(b);
  a.addEventListener("click", function(e) {
      /*when the select box is clicked, close any other select boxes,
      and open/close the current select box:*/
      e.stopPropagation();
      closeAllSelect(this);
      this.nextSibling.classList.toggle("select-hide");
      this.classList.toggle("select-arrow-active");
  });
}
function closeAllSelect(elmnt) {
  /*a function that will close all select boxes in the document,
  except the current select box:*/
  var x, y, i, arrNo = [];
  x = document.getElementsByClassName("select-items");
  y = document.getElementsByClassName("select-selected");
  for (i = 0; i < y.length; i++) {
    if (elmnt == y[i]) {
      arrNo.push(i)
    } else {
      y[i].classList.remove("select-arrow-active");
    }
  }
  for (i = 0; i < x.length; i++) {
    if (arrNo.indexOf(i)) {
      x[i].classList.add("select-hide");
    }
  }
}
/*if the user clicks anywhere outside the select box,
then close all select boxes:*/
document.addEventListener("click", closeAllSelect);
</script>

</body>

</html>