<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<title>Print All {{ g('status') }}</title>
	<style type="text/css">
		body {
		  background: rgb(204,204,204); 
		}
		page {
		/*ini watermark*/
		  /*background: url(logo-daarul-huda-watermark-tranparant2.png);*/
		  /*background-repeat: no-repeat;*/
  		  /*background-size: 70% auto;*/
  		  /*background-position: center;*/
  		  /*background-color: rgba(0,0,0,0.5); */
  		  /*cari yang coklat*/
  		/*end watermark*/

  		  background: white;
		  display: block;
		  margin: 0 auto;
		  margin-bottom: 0.5cm;
		  box-shadow: 0 0 0cm rgba(0,0,0,0);
		}
		page[size="A4"] {  
		  width: 21cm;
		  height: 29.7cm; 
		}
		page[size="A4"][layout="landscape"] {
		  width: 29.7cm;
		  height: 21cm;  
		}
		page[size="A3"] {
		  width: 29.7cm;
		  height: 42cm;
		}
		page[size="A3"][layout="landscape"] {
		  width: 42cm;
		  height: 29.7cm;  
		}
		page[size="A5"] {
		  width: 14.8cm;
		  height: 21cm;
		}
		page[size="A5"][layout="landscape"] {
		  width: 21cm;
		  height: 14.8cm;  
		}
		page[size="F4"]{
		  width: 21.5cm;
		  height: 33cm;  
		}
		@media print {
		  body, page {
		    margin: 0;
		    box-shadow: 0;
		  }
		}

		img.fotomurid{
			width: 90px;
			height: 90px;
		}

		p {
			text-align: center;
			font-family: Arial, Helvetica, sans-serif;
			font-weight: bold;
			font-size: 14px;
			margin: 3mm 25mm 3mm 3mm;
		}

		p.kiri {
			text-align: left;
			font-size: 11px;
		}

		p.fotosiswa {
			margin-top: 5px;
			margin: 1mm 3mm 3mm 3mm; float: left
		}

		p.atas {
			margin-top: 0px;
			margin-bottom: 0px;
		}

		p.bawah{
			margin-bottom: 0px;
		}

		p.besar{
			font-size: 30px;
		}

		p.garis {
			border-bottom: 2px solid black;
			margin: auto;
			width: 765px;
		}

		p.marginkiri {
  			border: 1px solid black;
  			margin: -19mm 3mm 0mm 0mm;
    		float: right;
    		text-align: left;
		}

		p.marginkiribawah {
			/*margin: 3mm 0mm 3mm 71mm;*/
			margin: 3mm 0mm 3mm 90mm;
			text-align: left;
			font-weight: normal;
			font-size: 11px;
		}

		table {
			font-family: Arial, Helvetica, sans-serif;
			font-size: 11px;
			margin-top: 25px;
		}

		table.atas {
			/*margin-top: 0px;*/
		}

		table.marginkiri {
			margin-left: 9px;
		}

		td.fonttengah {
			text-align: justify;
		}

		td.tebal {
			font-weight: bold;
		}

		td.tengah {
			text-align: center;
		}

		td.garisbawah {
			text-decoration: underline;
		}

		tr.warnaabu {
			background-color:#f5f5f5;
		}
		div.bingkai {
			border: 2px double black;
			/*width: 100%;*/
			/*height: 100px;*/
		}

	</style>
</head>
<body>
<page size="F4">
<div class="container">
  <h5>Data Order Guru Status {{ g('status') }} <br> Periode : {{ g('tanggal_awal') }} - {{ g('tanggal_akhir') }}</h5>
  <table class="table">
    <thead class="thead-dark">
      <tr>
        <th>Nama</th>
        <th>Total Penjualan</th>
        <th>Total Reward</th>
      </tr>
    </thead>
    <tbody>
    @foreach($teacher as $v)
      <tr>
        <td>{{ $v->name }}</td>
        <td>Rp. {{ number_format($v->total_penjualan) }}</td>
        <td>Rp. {{ number_format($v->total_reward) }}</td>
      </tr>
    @endforeach
    </tbody>
  </table>
</div>

</body>
</html>

</page>
</body>
</html>