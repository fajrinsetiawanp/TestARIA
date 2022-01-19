<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Doremi Music Indonesia">
  <meta name="author" content="">
  <link rel="icon" href="{{URL::asset('frontend/images/fav.png')}}" type="image/png" sizes="16x16">

  <title>Checkout | Doremi Music Indonesia</title>

  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
    crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="{{URL::asset('frontend/styles/form-validation.css')}}" rel="stylesheet">

  <meta name="csrf-token" content="{{ csrf_token() }}"> {{--
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script> --}}
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary ">
    <a href="index.html" class="navbar-brand" style="padding-left: 40px;" href="/">DOREMI</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
      aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#"> <span class="sr-only">(current)</span></a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
      </form>
    </div>
  </nav>

  <div class="container ">
    <div class="row">
      <div class="col-md-7 order-md-1">
        <h4 class="mb-3">Alamat</h4>
        <form class="needs-validation" novalidate>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="firstName">Nama Depan</label>
              <input type="text" class="form-control" id="nama_depan" name="nama_depan" placeholder="" value="" form="payment-gateway"
                required>
              <div class="invalid-feedback">
                Nama depan harus diisi.
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <label for="lastName">Nama Belakang</label>
              <input type="text" class="form-control" id="nama_belakang" name="nama_belakang" placeholder="" value="" form="payment-gateway"
                required>
            </div>
          </div>

          <div class="mb-3">
            <label for="email">Email <span class="text-muted"></span></label>
            <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" form="payment-gateway" required>
            <div class="invalid-feedback">
              Masukan alamat email Anda.
            </div>
          </div>

          <div class="mb-3">
            <label for="email">No Handphone <span class="text-muted"></span></label>
            <input type="phone" class="form-control" id="phone" name="phone" placeholder="0888889988" form="payment-gateway" required>
            <div class="invalid-feedback">
              Masukan No Handphone Anda.
            </div>
          </div>

          <div class="mb-3">
            <label for="address">Alamat</label>
            <textarea class="form-control" rows="2" id="alamat" name="alamat" placeholder="Alamat" form="payment-gateway" required></textarea>
            <div class="invalid-feedback">
              Masukan Alamat Anda.
            </div>
          </div>

          {{--
          <div class="mb-3">
            <label for="address2">Alamat 2 <span class="text-muted">Pilihan</span></label>
            <textarea class="form-control" id="alamat2" name="alamat2" placeholder="Alamat"></textarea>
          </div> --}}

          <div class="row">
            {{--
            <div class="col-md-4 mb-3">
              <label for="country">Negara</label>
              <select class="custom-select d-block w-100" id="country" required>
                  <option value="">Pilih Negara</option>
                  <option>Indonesia</option>
                </select>
              <div class="invalid-feedback">
                Pilih Negara Anda.
              </div>
            </div> --}} {{-- @php sort($provinsi); dd($provinsi); 
@endphp --}}
            <div class="col-md-6 mb-3 dropdown_container">
              <label for="state">Provinsi</label>
              <select class="custom-select d-block w-100 my_dropdown" id="provinsi" name="provinsi" form="payment-gateway" required>
                  <option value=""></option>
                  @foreach($provinsi as $k => $v)
                    <option value="{{ $k }}_{{ $v }}">{{ $v }}</option>
                  @endforeach
                </select>
              <div class="invalid-feedback">
                Masukan Provinsi Anda.
              </div>
            </div>
            <div class="col-md-6 mb-3 dropdown_container">
              <label for="city">Kota</label>
              <select class="custom-select d-block w-100 my_dropdown" id="kota" name="kota" form="payment-gateway" required>
                </select>
              <div class="invalid-feedback">
                Masukan Kota Anda.
              </div>
            </div>

            <div class="col-md-6 mb-3 dropdown_container">
              <label for="city">Kode Pos</label>
              <select class="custom-select d-block w-100 my_dropdown" id="kode_pos" name="kode_pos" form="payment-gateway" required>
                </select>
              <div class="invalid-feedback">
                Masukan Kode Pos Anda.
              </div>
            </div>
            {{--
            <div class="col-md-3 mb-3">
              <label for="zip">Kode Pos</label>
              <input type="text" class="form-control" id="zip" placeholder="" required>
              <div class="invalid-feedback">
                Zip code required.
              </div>
            </div> --}}
          </div>

          <hr class="mb-4">
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="tipe_alamat" name="tipe_alamat" data-toggle="collapse" href="#shipping_address"
              role="button" aria-expanded="false" aria-controls="alama" onclick="shipping()">
            <label class="custom-control-label" for="tipe_alamat">Kirim Ke Alamat Berbeda</label>
          </div>
          <input type="hidden" name="tipe_alamats" id="tipe_alamats" value="" form="payment-gateway">
          <div class="collapse" id="shipping_address">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label for="firstName">Nama Depan</label>
                <input type="text" class="form-control" id="nama_depan_ship" name="nama_depan_ship" placeholder="" value="" form="payment-gateway"
                  disabled>
                <div class="invalid-feedback">
                  Nama depan harus diisi.
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <label for="lastName">Nama Belakang</label>
                <input type="text" class="form-control" id="nama_belakang_ship" name="nama_belakang_ship" placeholder="" value="" form="payment-gateway"
                  disabled>
              </div>
            </div>

            <div class="mb-3">
              <label for="email">Email <span class="text-muted"></span></label>
              <input type="email" class="form-control" id="email_ship" name="email_ship" placeholder="you@example.com" form="payment-gateway"
                disabled>
              <div class="invalid-feedback">
                Masukan alamat email Anda.
              </div>
            </div>

            <div class="mb-3">
              <label for="email">No Handphone <span class="text-muted"></span></label>
              <input type="phone" class="form-control" id="phone_ship" name="phone_ship" placeholder="0888889988" form="payment-gateway"
                disabled>
              <div class="invalid-feedback">
                Masukan No Handphone Anda.
              </div>
            </div>

            <div class="mb-3">
              <label for="address">Alamat</label>
              <textarea class="form-control" rows="2" id="alamat_ship" name="alamat_ship" placeholder="Alamat" form="payment-gateway" disabled></textarea>
              <div class="invalid-feedback">
                Masukan Alamat Anda.
              </div>
            </div>

            <div class="row">
              <div class="col-md-6 mb-3 dropdown_container">
                <label for="state">Provinsi</label>
                <select class="custom-select d-block w-100 my_dropdown" id="provinsi_ship" name="provinsi_ship" form="payment-gateway" disabled>
                    <option value=""></option>
                    @foreach($provinsi as $k => $v)
                      <option value="{{ $k }}_{{ $v }}">{{ $v }}</option>
                    @endforeach
                  </select>
                <div class="invalid-feedback">
                  Masukan Provinsi Anda.
                </div>
              </div>
              <div class="col-md-6 mb-3 dropdown_container">
                <label for="city">Kota</label>
                <select class="custom-select d-block w-100 my_dropdown" id="kota_ship" name="kota_ship" form="payment-gateway" disabled>
                  </select>
                <div class="invalid-feedback">
                  Masukan Kota Anda.
                </div>
              </div>
              <div class="col-md-6 mb-3 dropdown_container">
                <label for="city">Kode Pos</label>
                <select class="custom-select d-block w-100 my_dropdown" id="kode_pos_ship" name="kode_pos_ship" form="payment-gateway" disabled>
                  </select>
                <div class="invalid-feedback">
                  Masukan Kode Pos Anda.
                </div>
              </div>
            </div>
          </div>
          <!--<hr class="mb-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="same-address">
              <label class="custom-control-label" for="same-address">Shipping address is the same as my billing address</label>
            </div>
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input" id="save-info">
              <label class="custom-control-label" for="save-info">Save this information for next time</label>
            </div> -->
          <hr class="mb-4">
          <h4 class="mb-3">Metode Pengiriman</h4>
          <div class="row">
            <div class="col-md-5 mb-3">
              <label for="state">Pilih Metode Pengiriman</label>
              <select class="custom-select d-block w-100 my_dropdown" id="metode_kirim" name="metode_kirim" form="payment-gateway" required>
                  <option value=""></option>
                  <option value="SELF PICKUP" id="self_pickup">SELF PICKUP</option>
                  <option value="ORIGIN SHIPMENT">ORIGIN SHIPMENT</option>
                  @if($berat <= 5)
                    <option value="INDOMART">AMBIL DI INDOMART</option>
                  @else
                    <option value="INDOMART" disabled>AMBIL DI INDOMART</option>
                  @endif
                </select>
              <div class="invalid-feedback">
                Pilih Metode Pengiriman.
              </div>
            </div>
            <div class="col-md-7 mb-3" id="umum">
              <label for="state">Pilih Lokasi</label>
              <select class="custom-select d-block w-100 my_dropdown" id="lokasi_kirim" name="lokasi_kirim" form="payment-gateway" required>
                </select>
              <div class="invalid-feedback">
                Pilih Lokasi.
              </div>
            </div>
            <div class="col-md-7 mb-3" id="indomart" style="display: none;">
              <label for="state">Pilih Lokasi</label>
              <select class="custom-select d-block w-100 my_dropdown" id="lokasi_indomart" name="lokasi_indomart" form="payment-gateway">
                </select>
              <div class="invalid-feedback">
                Pilih Lokasi.
              </div>
            </div>
          </div>
          <div class="row" id="info_indomart" style="display: none;">
            <div class="col-md-12 mb-6">
              <textarea class="form-control" rows="2" id="alamat_indomart" name="alamat_indomart" form="payment-gateway" readonly></textarea>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4 mb-3" id="sh_jasa" style="display: none;">
              <label for="state">Pilih Jasa Pengiriman</label>
              <select class="custom-select d-block w-100 my_dropdown" id="jasa_kirim" form="payment-gateway" name="jasa_kirim">
                  <option value=""></option>
                  @foreach($jasa_kirim as $jasa_kirims)
                    <option value="{{ $jasa_kirims->nama_singkatan }}">{{ $jasa_kirims->nama }}</option>
                  @endforeach
                </select>
              <div class="invalid-feedback">
                Pilih Jasa Pengiriman.
              </div>
            </div>
            <div class="col-md-8 mb-3" id="sh_jenis" style="display: none;">
              <label for="state">Pilih Jenis Pengiriman</label>
              <select class="custom-select d-block w-100 my_dropdown" id="jenis_kirim" name="jenis_kirim" form="payment-gateway">
                </select>
              <div class="invalid-feedback">
                Pilih Jenis Pengiriman.
              </div>
            </div>
          </div>
          <!-- Metode Pengiriman-->
        </form>
      </div>

      <!-- RINGKASAN PEMESANAN -->
      <div class="col-md-5 order-md-2 mb-4">
        <h6 class="d-flex justify-content-between align-items-center mb-3">
          <span class="text-muted">Ringkasan Pemesanan</span>
        </h6>
        <ul class="list-group mb-3">
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Total Pemesanan</h6>
              {{-- <small class="text-muted">Deskripsi</small> --}}
            </div>
            <span class="text-muted">Rp. {{ Cart::instance('default')->subtotal() }}</span>
            <input type="hidden" id="total_cart" name="total_cart" value="{{ $total_cart }}" form="payment-gateway">
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Biaya Pengiriman</h6>
              <small class="text-muted" id="courier"></small>
            </div>
            <span class="text-muted" id="tarif_jasa"></span>
            <input type="hidden" id="value_tarif_jasa" name="value_tarif_jasa" value="0" form="payment-gateway">
          </li>
          <li class="list-group-item d-flex justify-content-between bg-light">
            <div class="text-primary">
              <h6 class="my-0">Kode Kupon</h6>
              <small id="nama_kupon"></small>
            </div>
            <span class="text-primary" id="nominal_kupon"></span>
            <input type="hidden" id="id_kupon" name="id_kupon" value="0" form="payment-gateway">
            <input type="hidden" id="value_nominal_kupon" name="value_nominal_kupon" value="0" form="payment-gateway">
          </li>
          <li class="list-group-item d-flex justify-content-between lh-condensed">
            <div>
              <h6 class="my-0">Total Transaksi</h6>
              {{-- <small class="text-muted">Deskripsi</small> --}}
            </div>
            <span class="text-muted"><strong id="total"></strong></span>
            <input type="hidden" id="value_total" name="value_total" form="payment-gateway">
          </li>
        </ul>
        <div class="input-group" id="form_kupon">
          <input type="text" class="form-control" placeholder="Kode Kupon" id="kode_kupon" name="kode_kupon" form="payment-gateway">
          <div class="input-group-append">
            <button class="btn btn-primary" onclick="myFunction()" id="gunakan">Gunakan</button>
            <button class="btn btn-danger" onclick="myFunctionHapus()" id="hapus" style="display: none;">Hapus</button>
          </div>
        </div>
        <hr class="mb-4">
        <div id="metode_bayar" style="display: none;">
          <h6 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Metode Pembayaran</span>
          </h6>
          {{-- <button class="subscribe btn btn-primary btn-block" type="button" class="btn btn-primary btn-sm" data-toggle="modal"
            data-target="#transfer_bank" name="transfer_bank" value="TRANSFER BANK"> TRANSFER BANK  </button> --}} {{--
          <button
            type="submit" form="payment-gateway" class="subscribe btn btn-primary btn-block" class="btn btn-primary btn-sm"
            name="button_bayar" value="button_bayar"> BAYAR </button> --}}
            <button class="subscribe btn btn-primary btn-block" type="button" class="btn btn-primary btn-sm" id="bayar"> BAYAR  </button>            @if(!empty($response))
            <button class="subscribe btn btn-primary btn-block" type="button" class="btn btn-primary btn-sm" id="cicilan"> CICILAN  </button>            @endif
        </div>
      </div>
    </div>
    <input type="hidden" name="harga_tertinggi" id="harga_tertinggi" value="{{ $harga_tertinggi }}">
    <form id="payment-gateway" method="post" action="{{ url('/frontend/review-payment') }}">
      <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    </form>
    <div class="modal fade" id="midtrans" tabindex="-1" role="dialog" aria-labelledby="midtrans" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">BIAYA LAYANAN</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
          </div>
          <div class="modal-body">
            <select class="custom-select d-block w-100 my_dropdown" id="biaya_layanan" name="biaya_layanan" form="payment-gateway">
                                <option></option>
                                @foreach($biaya_layanan as $key)
                                  <option value="{{ $key->id }}">{{ $key->nama }} - {{ $key->biaya }} 
                                    @if(!empty($key->biaya_tambahan))
                                      + {{ $key->biaya_tambahan }}
                                    @endif
                                  </option>
                                @endforeach
                              </select>
          </div>
          <div class="modal-footer">
            <button type="submit" form="payment-gateway" class="btn btn-primary" name="button_bayar" value="button_bayar">Bayar</button>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="kredivo" tabindex="-1" role="dialog" aria-labelledby="kredivo" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Cicilan</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
          </div>
          <div class="modal-body">
            @if(!empty($response))
            <select class="custom-select d-block w-100 my_dropdown" id="paymenttypecicilan" name="paymenttypecicilan" form="payment-gateway">
                                <option></option>
                                @foreach($response->payments as $key)
                                  <option value="{{ $key->id }}">{{ $key->tenure }} bulan - Rp. {{ number_format($key->monthly_installment) }}.00</option>
                                @endforeach
                              </select> @endif
          </div>
          <div class="modal-footer">
            <button type="submit" form="payment-gateway" class="btn btn-primary" name="button_bayar" value="button_cicilan">Bayar</button>
          </div>
        </div>
      </div>
    </div>
    {{-- modal transfer bank --}} {{--
    <div class="modal fade" id="transfer_bank" tabindex="-1" role="dialog" aria-labelledby="transferbank"
      aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Transfer Bank</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
          </div>
          <div class="modal-body">
            <select class="custom-select d-block w-100 my_dropdown" id="id_akun_bank" name="id_akun_bank">
                                <option value=""></option>
                                @foreach($akun_bank as $akun_banks)
                                  <option value="{{ $akun_banks->id }}"> PT. Doremi Musik Indonesia : {{ $akun_banks->no_rekening }} - {{ $akun_banks->bank }}</option>
                                @endforeach
                              </select>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary" onclick="function_tf()">Proses Pesanan Saya!</button>
          </div>
        </div>
      </div>
    </div> --}}
    <!-- FOOTER -->
    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1"></p>
    </footer>
  </div>

  <script src="{{URL::asset('frontend/js/jquery-3.3.1.min.js')}}"></script>
  <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

  <script>
    $(document).ready(function(){
          $("#bayar").click(function(){
              document.getElementById("biaya_layanan").required = true;

              $("#midtrans").modal();
          });
      });
  </script>

  <script>
    $(document).ready(function(){
          $("#cicilan").click(function(){
              document.getElementById("paymenttypecicilan").required = true;

              $("#kredivo").modal();
          });
      });
  </script>

  <script type="text/javascript">
    $('#kredivo').on('hidden.bs.modal', function () {
        document.getElementById("paymenttypecicilan").required = false;
      })
  </script>

  <script>
    function shipping() {
        var x = document.getElementById("tipe_alamat");
        if (x.checked) {

            document.getElementById("tipe_alamats").value = "Shipping Address";

            document.getElementById("self_pickup").disabled = true;

            document.getElementById("nama_depan_ship").disabled = false;
            document.getElementById("nama_depan_ship").required = true;

            document.getElementById("nama_belakang_ship").disabled = false;
            document.getElementById("nama_belakang_ship").required = true;

            document.getElementById("email_ship").disabled = false;
            document.getElementById("email_ship").required = true;

            document.getElementById("phone_ship").disabled = false;
            document.getElementById("phone_ship").required = true;

            document.getElementById("alamat_ship").disabled = false;
            document.getElementById("alamat_ship").required = true;

            document.getElementById("provinsi_ship").disabled = false;
            document.getElementById("provinsi_ship").required = true;

            document.getElementById("kota_ship").disabled = false;
            document.getElementById("kota_ship").required = true;

            document.getElementById("kode_pos_ship").disabled = false;
            document.getElementById("kode_pos_ship").required = true;

            document.getElementById("jasa_kirim").value = "";
            $('select[name="jenis_kirim"]').empty();
        } else {
            document.getElementById("tipe_alamats").value = "";

            document.getElementById("self_pickup").disabled = false;

            document.getElementById("nama_depan_ship").disabled = true;
            document.getElementById("nama_depan_ship").required = false;

            document.getElementById("nama_belakang_ship").disabled = true;
            document.getElementById("nama_belakang_ship").required = false;

            document.getElementById("email_ship").disabled = true;
            document.getElementById("email_ship").required = false;

            document.getElementById("phone_ship").disabled = true;
            document.getElementById("phone_ship").required = false;

            document.getElementById("alamat_ship").disabled = true;
            document.getElementById("alamat_ship").required = false;

            document.getElementById("provinsi_ship").disabled = true;
            document.getElementById("provinsi_ship").required = false;

            document.getElementById("kota_ship").disabled = true;
            document.getElementById("kota_ship").required = false;

            document.getElementById("kode_pos_ship").disabled = true;
            document.getElementById("kode_pos_ship").required = false;

            document.getElementById("jasa_kirim").value = "";
            $('select[name="jenis_kirim"]').empty();
        }
      }
  </script>

  <script type="text/javascript">
    function function_tf() {
        var nama_depan = document.getElementById("nama_depan").value;
        var nama_belakang = document.getElementById("nama_belakang").value;
        var email = document.getElementById("email").value;
        var phone = document.getElementById("phone").value;
        var alamat = document.getElementById("alamat").value;
        var provinsi = document.getElementById("provinsi").value;
        var kota = document.getElementById("kota").value;

        var metode_kirim = document.getElementById("metode_kirim").value;
        var lokasi_kirim = document.getElementById("lokasi_kirim").value;
        var jasa_kirim = document.getElementById("jasa_kirim").value;
        var jenis_kirim = document.getElementById("jenis_kirim").value;

        var total_cart = document.getElementById("total_cart").value;
        var value_tarif_jasa = document.getElementById("value_tarif_jasa").value;
        var value_nominal_kupon = document.getElementById("value_nominal_kupon").value;
        var id_kupon = document.getElementById("id_kupon").value;
        var value_total = document.getElementById("value_total").value;

        var id_akun_bank = document.getElementById("id_akun_bank").value;
        // alert(id_kupon);

                $.ajaxSetup({
                  headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                if (id_akun_bank && nama_depan && nama_belakang && email && phone && alamat && provinsi && kota && metode_kirim && value_total) {
                  $.ajax({
                    type: "POST",
                      url: '{{ url("/frontend/api/submit-order") }}',
                      data: {
                      'nama_depan': nama_depan,
                      'nama_belakang': nama_belakang,
                      'email': email,
                      'phone': phone,
                      'alamat': alamat,
                      'provinsi': provinsi,
                      'kota': kota,

                      'metode_kirim': metode_kirim,
                      'lokasi_kirim': lokasi_kirim,
                      'jasa_kirim': jasa_kirim,
                      'jenis_kirim': jenis_kirim,

                      'value_tarif_jasa': value_tarif_jasa,
                      'value_nominal_kupon': value_nominal_kupon,
                      'id_kupon': id_kupon,
                      'value_total': value_total,

                      'id_akun_bank': id_akun_bank,
                    },
                      success:function(data) {
                          // alert(data);
                          window.location.href = '{{ url('/frontend/thanks') }}';
                      }
                  });
                } else {
                  alert('Mohon Lengkapi Data Anda!');
                }
      }
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
          $('select[name="lokasi_indomart"]').on('change', function() {
            var kode_toko = $(this).val();

            $.ajax({
              url: '{{ url("/frontend/api/toko") }}' + '/' + kode_toko,
              success:function(data) {
                // alert(data);
                document.getElementById("alamat_indomart").value = data['ALAMATTOKO'] + ' - KEC. ' + data['KECAMATAN'] + ' - KEL. ' + data['KELURAHAN'] + ' - ' + data['NOTELPTOKO'];
              }
            });
          });
      });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
          $('select[name="metode_kirim"]').on('change', function() {
              var metode_kirim = $(this).val();

              var x = document.getElementById("tipe_alamat");
              if (x.checked) {
                var kota = document.getElementById("kota_ship").value;
                var alamat = document.getElementById("alamat_ship").value;
                var kode_pos = document.getElementById("kode_pos_ship").value;
                // alert(destination);
              } else {
                var kota = document.getElementById("kota").value;
                var alamat = document.getElementById("alamat").value;
                var kode_pos = document.getElementById("kode_pos").value;
              }

              var total_cart = document.getElementById("total_cart").value;
              var explode_total_cart = total_cart.split(".");
              var explode_total_cart_lagi = explode_total_cart[0].split(",");
              var fix_total_cart = explode_total_cart_lagi[0] + explode_total_cart_lagi[1];
              
              if(metode_kirim) {
                  $.ajax({
                      url: '{{ url("/frontend/api/metode_kirim") }}' + '/' + metode_kirim,
                      success:function(data) {
                              // alert(data);
                              $('select[name="lokasi_kirim"]').empty();
                              var obj = data;
                              var jumlahdata = obj.length;
                              for (var i=0;i<jumlahdata;i++){
                                 $('select[name="lokasi_kirim"]').append('<option value="'+ obj[i].kode_pos +'">'+  obj[i].nama_lokasi + ' - ' + obj[i].kota +'</option>');
                                 // console.log("test");
                              }
                              // alert(document.getElementById("lokasi_kirim").value);
                              if (metode_kirim == 'SELF PICKUP') {
                                  var y = document.getElementById("sh_jasa");
                                  var z = document.getElementById("sh_jenis");
                                  document.getElementById("jasa_kirim").required = false;
                                  document.getElementById("jenis_kirim").required = false;

                                  y.style.display = "none";
                                  z.style.display = "none";

                                  document.getElementById("courier").innerHTML = '';
                                  document.getElementById("tarif_jasa").innerHTML = '';
                                  document.getElementById("value_tarif_jasa").value = 0;

                                  var fix_total = total_cart;
                                  var reversee = fix_total.toString().split('').reverse().join(''),
                                  costss  = reversee.match(/\d{1,3}/g);
                                  costss  = costss.join('.').split('').reverse().join('');
                                  document.getElementById("total").innerHTML = 'Rp. ' + costss + ',00';
                                  document.getElementById("value_total").value = fix_total;

                                  if (kode_pos) {
                                    var x = document.getElementById("metode_bayar");
                                    x.style.display = "block";
                                    $('select[name="lokasi_indomart"]').empty();
                                    document.getElementById("lokasi_indomart").required = false;
                                    document.getElementById("lokasi_kirim").required = true;
                                    document.getElementById("indomart").style.display = "none";
                                    document.getElementById("info_indomart").style.display = "none";
                                    document.getElementById("umum").style.display = "block";
                                  } else {
                                    document.getElementById("metode_kirim").value = "";
                                    $('select[name="lokasi_kirim"]').empty();
                                    $('select[name="lokasi_indomart"]').empty();
                                    document.getElementById("lokasi_indomart").required = false;
                                    document.getElementById("lokasi_kirim").required = true;
                                    document.getElementById("indomart").style.display = "none";
                                    document.getElementById("info_indomart").style.display = "none";
                                    document.getElementById("umum").style.display = "block";
                                    toastr.info('Masukkan Kode Pos Anda!', '', {timeOut: 10000});
                                  }

                                  document.getElementById("kode_kupon").readOnly = false;
                                  document.getElementById("jasa_kirim").value = "";
                                  $('select[name="jenis_kirim"]').empty();
                              } else if (metode_kirim == 'INDOMART') {
                                  document.getElementById("umum").style.display = "none";
                                  document.getElementById("lokasi_kirim").required = false;

                                  document.getElementById("indomart").style.display = "block";
                                  document.getElementById("lokasi_indomart").required = true;

                                  var y = document.getElementById("sh_jasa");
                                  var z = document.getElementById("sh_jenis");
                                  document.getElementById("jasa_kirim").required = false;
                                  document.getElementById("jenis_kirim").required = false;

                                  y.style.display = "none";
                                  z.style.display = "none";

                                  document.getElementById("courier").innerHTML = 'RPX - AMBIL DI INDOMART';
                                  var weight = {{ $berat }};
                                  var weight_kg = weight / 1000;
                                  var tarif = 12000 * weight_kg;
                                  // alert(tarif);
                                  var reverse = tarif.toString().split('').reverse().join(''),
                                  costs  = reverse.match(/\d{1,3}/g);
                                  costs  = costs.join('.').split('').reverse().join('');
                                  document.getElementById("tarif_jasa").innerHTML = 'Rp. ' + costs + ',00';
                                  document.getElementById("value_tarif_jasa").value = tarif;

                                  var fix_total = parseInt(total_cart) + parseInt(tarif);
                                  var reversee = fix_total.toString().split('').reverse().join(''),
                                  costss  = reversee.match(/\d{1,3}/g);
                                  costss  = costss.join('.').split('').reverse().join('');
                                  document.getElementById("total").innerHTML = 'Rp. ' + costss + ',00';
                                  document.getElementById("value_total").value = fix_total;
                                  // alert(kode_pos);
                                  if (kode_pos) {
                                            $.ajax({
                                              url: '{{ url("/frontend/api/indomart") }}' + '/' + kode_pos,
                                              success:function(data) {
                                                // alert(data);
                                                if (!$.trim(data)) {
                                                  document.getElementById("metode_kirim").value = "";
                                                  $('select[name="lokasi_indomart"]').empty();
                                                  toastr.info('Maaf, Layanan Tidak Tersedia!', '', {timeOut: 10000});
                                                } else {
                                                  // alert(data);
                                                  document.getElementById("info_indomart").style.display = "block";

                                                  $('select[name="lokasi_indomart"]').empty();
                                                  var objs = data;
                                                  var jumlahdatas = objs.length;
                                                  for (var j=0;j<jumlahdatas;j++){
                                                     $('select[name="lokasi_indomart"]').append('<option value="'+ objs[j].KODETOKO +'">'+  objs[j].NAMATOKO +'</option>');
                                                     // console.log(objs[j].KODETOKO + " - " + objs[j].NAMATOKO);
                                                  }

                                                  var x = document.getElementById("metode_bayar");
                                                  x.style.display = "block";
                                                }
                                              }
                                            });
                                  } else {
                                    document.getElementById("metode_kirim").value = "";
                                    $('select[name="lokasi_indomart"]').empty();
                                    $('select[name="lokasi_kirim"]').empty();
                                    document.getElementById("lokasi_indomart").required = false;
                                    document.getElementById("lokasi_kirim").required = true;
                                    document.getElementById("indomart").style.display = "none";
                                    document.getElementById("info_indomart").style.display = "none";
                                    document.getElementById("umum").style.display = "block";
                                    toastr.info('Masukkan Kode Pos Anda!', '', {timeOut: 10000});
                                  }
                              } else {
                                if (kode_pos) {
                                  document.getElementById("courier").innerHTML = '';
                                  document.getElementById("tarif_jasa").innerHTML = '';
                                  document.getElementById("value_tarif_jasa").value = 0;
                                  
                                  var y = document.getElementById("sh_jasa");
                                  var z = document.getElementById("sh_jenis");
                                  document.getElementById("jasa_kirim").required = true;
                                  document.getElementById("jenis_kirim").required = true;

                                  document.getElementById("kode_kupon").readOnly = true;
                                  y.style.display = "block";
                                  z.style.display = "block";

                                    $('select[name="lokasi_indomart"]').empty();
                                    document.getElementById("lokasi_indomart").required = false;
                                    document.getElementById("lokasi_kirim").required = true;
                                    document.getElementById("indomart").style.display = "none";
                                    document.getElementById("info_indomart").style.display = "none";
                                    document.getElementById("umum").style.display = "block";
                                } else {
                                    document.getElementById("metode_kirim").value = "";
                                    $('select[name="lokasi_indomart"]').empty();
                                    $('select[name="lokasi_kirim"]').empty();
                                    document.getElementById("lokasi_indomart").required = false;
                                    document.getElementById("lokasi_kirim").required = true;
                                    document.getElementById("indomart").style.display = "none";
                                    document.getElementById("info_indomart").style.display = "none";
                                    document.getElementById("umum").style.display = "block";
                                    toastr.info('Masukkan Kode Pos Anda!', '', {timeOut: 10000});
                                }

                                var x = document.getElementById("metode_bayar");
                                x.style.display = "none";
                              }
                      }
                  });
              } else {
                                    document.getElementById("metode_kirim").value = "";
                                    $('select[name="lokasi_indomart"]').empty();
                                    $('select[name="lokasi_kirim"]').empty();
                                    document.getElementById("lokasi_indomart").required = false;
                                    document.getElementById("lokasi_kirim").required = true;
                                    document.getElementById("indomart").style.display = "none";
                                    document.getElementById("info_indomart").style.display = "none";
                                    document.getElementById("umum").style.display = "block";

                                document.getElementById("jasa_kirim").value = "";
                                $('select[name="jenis_kirim"]').empty();

                                var x = document.getElementById("metode_bayar");
                                var y = document.getElementById("sh_jasa");
                                var z = document.getElementById("sh_jenis");

                                x.style.display = "none";
                                y.style.display = "none";
                                z.style.display = "none";
              }
          });
      });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
          $('select[name="lokasi_kirim"]').on('change', function() {
              document.getElementById("jasa_kirim").value = "";
              $('select[name="jenis_kirim"]').empty();
          });
      });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
          $('select[name="provinsi"]').on('change', function() {
              var id_provinsi_value = $(this).val();
              var id_provinsi = id_provinsi_value.split("_");
              
              if(id_provinsi) {
                // alert(id_provinsi);
                  $.ajax({
                      url: '{{ url("/frontend/api/kota") }}' + '/' + id_provinsi[0],
                      success:function(data) {
                              // alert(data);
                              // console.log("apa");
                              $('select[name="kota"]').empty();
                              // $('select[name="kota"]').append('<option value="">Pilih Kota</option>');
                              var obj = data;
                              var jumlahdata = obj.length;
                              // alert(data);
                              // for (var i=0;i<jumlahdata;i++){
                              for (var key in obj) {
                                 $('select[name="kota"]').append('<option value="'+ key + '_' + obj[key] +'">'+  obj[key] +'</option>');
                                 // console.log("test");
                                 // console.log(key + " -> " + obj[key]);
                              }

                              document.getElementById("jasa_kirim").value = "";
                              $('select[name="jenis_kirim"]').empty();
                              $('select[name="kode_pos"]').empty();

                              document.getElementById("metode_kirim").value = "";
                              $('select[name="lokasi_kirim"]').empty();

                              $('select[name="lokasi_indomart"]').empty();
                              document.getElementById("lokasi_indomart").required = false;
                              document.getElementById("indomart").style.display = "none";
                              document.getElementById("info_indomart").style.display = "none";
                              document.getElementById("umum").style.display = "block";
                              document.getElementById("lokasi_kirim").required = true;

                              var x = document.getElementById("metode_bayar");
                              x.style.display = "none";
                      }
                  });
              }else{
                  $('select[name="kota"]').empty();
              }
          });
      });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
          $('select[name="kota"]').on('change', function() {
                var id_kota_value = document.getElementById("kota").value;
                var id_kota = id_kota_value.split("_");
                // alert(id_kota);
                  $.ajax({
                      url: '{{ url("/frontend/api/kodepos") }}' + '/' + id_kota[0],
                      success:function(data) {
                              // alert(data);
                              // console.log("apa");
                              $('select[name="kode_pos"]').empty();
                              // $('select[name="kota"]').append('<option value="">Pilih Kota</option>');
                              var seenNames = {};

                              array = data.filter(function(currentObject) {
                                if (currentObject.kodepos in seenNames) {
                                  return false;
                                } else {
                                  seenNames[currentObject.kodepos] = true;
                                  return true;
                                }
                              });
                              // console.log(array);
                              var sort = array.sort(function(a, b){return a.kodepos - b.kodepos});
                              var obj = sort;
                              var jumlahdata = obj.length;
                              for (var i=0;i<jumlahdata;i++){
                              // for (var key in obj) {
                                 $('select[name="kode_pos"]').append('<option value="'+ obj[i].kodepos +'">'+  obj[i].kodepos +'</option>');
                                 // console.log("test");
                                 // console.log(obj[i].kodepos);
                              }

                              document.getElementById("jasa_kirim").value = "";
                              $('select[name="jenis_kirim"]').empty();

                              document.getElementById("metode_kirim").value = "";
                              $('select[name="lokasi_kirim"]').empty();

                              $('select[name="lokasi_indomart"]').empty();
                              document.getElementById("lokasi_indomart").required = false;
                              document.getElementById("indomart").style.display = "none";
                              document.getElementById("info_indomart").style.display = "none";
                              document.getElementById("umum").style.display = "block";
                              document.getElementById("lokasi_kirim").required = true;

                              var x = document.getElementById("metode_bayar");
                              x.style.display = "none";
                      }
                  });
          });
      });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
          $('select[name="kode_pos"]').on('change', function() {
                              document.getElementById("jasa_kirim").value = "";
                              $('select[name="jenis_kirim"]').empty();

                              document.getElementById("metode_kirim").value = "";
                              $('select[name="lokasi_kirim"]').empty();

                              $('select[name="lokasi_indomart"]').empty();
                              document.getElementById("lokasi_indomart").required = false;
                              document.getElementById("indomart").style.display = "none";
                              document.getElementById("info_indomart").style.display = "none";
                              document.getElementById("umum").style.display = "block";
                              document.getElementById("lokasi_kirim").required = true;

                              var x = document.getElementById("metode_bayar");
                              x.style.display = "none";
          });
      });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
          $('select[name="kode_pos_ship"]').on('change', function() {
                              document.getElementById("jasa_kirim").value = "";
                              $('select[name="jenis_kirim"]').empty();

                              document.getElementById("metode_kirim").value = "";
                              $('select[name="lokasi_kirim"]').empty();

                              $('select[name="lokasi_indomart"]').empty();
                              document.getElementById("lokasi_indomart").required = false;
                              document.getElementById("indomart").style.display = "none";
                              document.getElementById("info_indomart").style.display = "none";
                              document.getElementById("umum").style.display = "block";
                              document.getElementById("lokasi_kirim").required = true;

                              var x = document.getElementById("metode_bayar");
                              x.style.display = "none";
          });
      });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
          $('select[name="kota_ship"]').on('change', function() {
              var id_kota_value = document.getElementById("kota_ship").value;
              var id_kota = id_kota_value.split("_");
                // alert(id_kota);
                  $.ajax({
                      url: '{{ url("/frontend/api/kodepos") }}' + '/' + id_kota[0],
                      success:function(data) {
                              // alert(data);
                              // console.log("apa");
                              $('select[name="kode_pos_ship"]').empty();
                              // $('select[name="kota"]').append('<option value="">Pilih Kota</option>');
                              var seenNames = {};

                              array = data.filter(function(currentObject) {
                                if (currentObject.kodepos in seenNames) {
                                  return false;
                                } else {
                                  seenNames[currentObject.kodepos] = true;
                                  return true;
                                }
                              });
                              // console.log(array);
                              var sort = array.sort(function(a, b){return a.kodepos - b.kodepos});
                              var obj = sort;
                              var jumlahdata = obj.length;
                              for (var i=0;i<jumlahdata;i++){
                              // for (var key in obj) {
                                 $('select[name="kode_pos_ship"]').append('<option value="'+ obj[i].kodepos +'">'+  obj[i].kodepos +'</option>');
                                 // console.log("test");
                                 // console.log(obj[i].kodepos);
                              }

                              document.getElementById("jasa_kirim").value = "";
                              $('select[name="jenis_kirim"]').empty();

                              document.getElementById("metode_kirim").value = "";
                              $('select[name="lokasi_kirim"]').empty();

                              $('select[name="lokasi_indomart"]').empty();
                              document.getElementById("lokasi_indomart").required = false;
                              document.getElementById("indomart").style.display = "none";
                              document.getElementById("info_indomart").style.display = "none";
                              document.getElementById("umum").style.display = "block";
                              document.getElementById("lokasi_kirim").required = true;

                              var x = document.getElementById("metode_bayar");
                              x.style.display = "none";
                      }
                  });
          });
      });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
          $('select[name="provinsi_ship"]').on('change', function() {
              var id_provinsi_value = $(this).val();
              var id_provinsi = id_provinsi_value.split("_");
              
              if(id_provinsi) {
                // alert(id_provinsi);
                  $.ajax({
                      url: '{{ url("/frontend/api/kota") }}' + '/' + id_provinsi[0],
                      success:function(data) {
                              // alert(data);
                              // console.log("apa");
                              $('select[name="kota_ship"]').empty();
                              // $('select[name="kota"]').append('<option value="">Pilih Kota</option>');
                              var obj = data;
                              var jumlahdata = obj.length;
                              // for (var i=0;i<jumlahdata;i++){
                              for (var key in obj) {
                                $('select[name="kota_ship"]').append('<option value="'+ key + '_' + obj[key] +'">'+  obj[key] +'</option>');
                                // console.log("test");
                                // console.log(key + " -> " + obj[key]);
                              }

                              document.getElementById("jasa_kirim").value = "";
                              $('select[name="jenis_kirim"]').empty();
                              $('select[name="kode_pos_ship"]').empty();

                              document.getElementById("metode_kirim").value = "";
                              $('select[name="lokasi_kirim"]').empty();

                              $('select[name="lokasi_indomart"]').empty();
                              document.getElementById("lokasi_indomart").required = false;
                              document.getElementById("indomart").style.display = "none";
                              document.getElementById("info_indomart").style.display = "none";
                              document.getElementById("umum").style.display = "block";
                              document.getElementById("lokasi_kirim").required = true;

                              var x = document.getElementById("metode_bayar");
                              x.style.display = "none";
                      }
                  });
              }else{
                  $('select[name="kota_ship"]').empty();
              }
          });
      });
  </script>

  {{--  jasa kirim  --}}
  <script type="text/javascript">
    $(document).ready(function() {
          $('select[name="jasa_kirim"]').on('change', function() {
              var origin = document.getElementById("lokasi_kirim").value;

              var x = document.getElementById("tipe_alamat");
              if (x.checked) {
                var destination = document.getElementById("kode_pos_ship").value;
              } else {
                var destination = document.getElementById("kode_pos").value;
              }
              // alert(explode_destination[0]);
              var weight = {{ $berat }};
              var weight_kg = weight / 1000;

              var courier = $(this).val();

              var total_cart = document.getElementById("total_cart").value;
              var explode_total_cart = total_cart.split(".");
              var explode_total_cart_lagi = explode_total_cart[0].split(",");
              var fix_total_cart = explode_total_cart_lagi[0] + explode_total_cart_lagi[1];
              // alert(destination);
              if(destination) {
                // alert(id_provinsi);
                if (courier) {
                  // alert(weight_kg);
                  if (courier == 'rpx' || courier == 'jne') {
                    var uri = '{{ url("/frontend/api/jasa-kirim") }}' + '/' + origin + '/' + destination + '/' + weight_kg + '/' + courier;
                  } else {
                    var uri = '{{ url("/frontend/api/jasa-kirim") }}' + '/' + origin + '/' + destination + '/' + weight + '/' + courier;
                  }
                  // alert(uri);
                  $.ajax({
                      url: uri,
                      success:function(data) {
                              // alert(data);
                              // console.log("apa");
                              $('select[name="jenis_kirim"]').empty();
                              var obj = data;
                              var jumlahdata = obj.length;
                              for (var i=0;i<jumlahdata;i++){

                                if (courier == 'rpx') {
                                    var reverse = obj[i].PRICE.toString().split('').reverse().join(''),
                                    cost  = reverse.match(/\d{1,3}/g);
                                    cost  = cost.join('.').split('').reverse().join('');

                                    $('select[name="jenis_kirim"]').append('<option value="'+ obj[i].SERVICE + '_' + obj[i].PRICE +'">'+ obj[i].SERVICE + ' - Rp. ' + cost + ',00' +'</option>');
                                } else {
                                    var reverse = obj[i].cost[0]['value'].toString().split('').reverse().join(''),
                                    cost  = reverse.match(/\d{1,3}/g);
                                    cost  = cost.join('.').split('').reverse().join('');

                                    $('select[name="jenis_kirim"]').append('<option value="'+ obj[i].service + '_' + obj[i].cost[0]['value'] +'">'+ obj[i].service + ' - Rp. ' + cost + ',00' +'</option>');
                                }
                                // console.log("test");
                              }

                              var service = document.getElementById("jenis_kirim").value;
                              var service_explode = service.split("_");
                              document.getElementById("courier").innerHTML = courier.toUpperCase() + ' - ' + service_explode[0];

                              var reversee = service_explode[1].toString().split('').reverse().join(''),
                              costs  = reversee.match(/\d{1,3}/g);
                              costs  = costs.join('.').split('').reverse().join('');
                              document.getElementById("tarif_jasa").innerHTML = 'Rp. ' + costs + ',00';

                              var value_nominal_kupon = document.getElementById("value_nominal_kupon").value;
                              var fix_total = parseInt(total_cart) + parseInt(service_explode[1]) - parseInt(value_nominal_kupon);
                              var reverseee = fix_total.toString().split('').reverse().join(''),
                              costss  = reverseee.match(/\d{1,3}/g);
                              costss  = costss.join('.').split('').reverse().join('');
                              document.getElementById("total").innerHTML = 'Rp. ' + costss + ',00';
                              document.getElementById("value_total").value = fix_total;
                              document.getElementById("value_tarif_jasa").value = parseInt(service_explode[1]);

                              document.getElementById("kode_kupon").readOnly = false;

                              var x = document.getElementById("metode_bayar");
                              x.style.display = "block";
                      }
                  });
                } else {
                  document.getElementById("jasa_kirim").value = "";
                  $('select[name="jenis_kirim"]').empty();

                  document.getElementById("courier").innerHTML = '';
                  document.getElementById("tarif_jasa").innerHTML = '';
                  document.getElementById("value_tarif_jasa").value = 0;

                  var reverseeee = total_cart.toString().split('').reverse().join(''),
                  costsss  = reverseeee.match(/\d{1,3}/g);
                  costsss  = costsss.join('.').split('').reverse().join('');
                  document.getElementById("total").innerHTML = 'Rp. ' + costsss + ',00';
                  document.getElementById("value_total").value = total_cart;
                  // alert(test);
                  var x = document.getElementById("metode_bayar");
                  x.style.display = "none";
                }
              }else{
                  document.getElementById("jasa_kirim").value = "";
                  $('select[name="jenis_kirim"]').empty();
                  document.getElementById("kode_kupon").readOnly = true;
                  toastr.info('Masukkan Kode Pos Anda!', '', {timeOut: 10000});
              }
          });
      });
  </script>

  {{--  jenis kirim  --}}
  <script type="text/javascript">
    $(document).ready(function() {
          $('select[name="jenis_kirim"]').on('change', function() {
              var jenis = $(this).val();
              var courier = document.getElementById("jasa_kirim").value;

              var total_cart = document.getElementById("total_cart").value;
              var explode_total_cart = total_cart.split(".");
              var explode_total_cart_lagi = explode_total_cart[0].split(",");
              var fix_total_cart = explode_total_cart_lagi[0] + explode_total_cart_lagi[1];
              // alert(courier);
              if(jenis) {
                // alert(id_provinsi);
                              var service = jenis;
                              var service_explode = service.split("_");
                              document.getElementById("courier").innerHTML = courier.toUpperCase() + ' - ' + service_explode[0];

                              var reversee = service_explode[1].toString().split('').reverse().join(''),
                                costs  = reversee.match(/\d{1,3}/g);
                                costs  = costs.join('.').split('').reverse().join('');
                              document.getElementById("tarif_jasa").innerHTML = 'Rp. ' + costs + ',00';

                              var value_nominal_kupon = document.getElementById("value_nominal_kupon").value;
                              var fix_total = parseInt(total_cart) + parseInt(service_explode[1]) - parseInt(value_nominal_kupon);
                              var reversee = fix_total.toString().split('').reverse().join(''),
                              costss  = reversee.match(/\d{1,3}/g);
                              costss  = costss.join('.').split('').reverse().join('');
                              document.getElementById("total").innerHTML = 'Rp. ' + costss + ',00';
                              document.getElementById("value_total").value = fix_total;
                              document.getElementById("value_tarif_jasa").value = parseInt(service_explode[1]);
              }else{
                  $('select[name="jenis_kirim"]').empty();
              }
          });
      });
  </script>

  <script type="text/javascript">
    function myFunction() {
          var kode_kupon = document.getElementById("kode_kupon").value;
          var jenis_kirim = document.getElementById("jenis_kirim").value;
          var metode_kirim = document.getElementById("metode_kirim").value;

          var total_cart = document.getElementById("total_cart").value;
          var explode_total_cart = total_cart.split(".");
          var explode_total_cart_lagi = explode_total_cart[0].split(",");
          var fix_total_cart = explode_total_cart_lagi[0] + explode_total_cart_lagi[1];

          // alert(fix_total_cart);
          // if (metode_kirim == 'ORIGIN SHIPMENT') {
          //   if (jenis_kirim) {
              if (kode_kupon) {
              // alert(kode_kupon);
                      $.ajax({
                          url: '{{ url("/frontend/api/kupon") }}' + '/' + kode_kupon,
                          success:function(data) {
                                  // alert(data);
                                  if (!$.trim(data)){   
                                      document.getElementById("nama_kupon").innerHTML = 'Maaf, Kupon Tidak Tersedia!';
                                      toastr.error('Maaf, Kupon Tidak Tersedia!', '', {timeOut: 10000});
                                  }
                                  else{   
                                      // alert("What follows is not blank: " + data);
                                      if (data['jenis_kupon'] == 'Nominal') {
                                        var reversee = data['diskon'].toString().split('').reverse().join(''),
                                        costs  = reversee.match(/\d{1,3}/g);
                                        costs  = costs.join('.').split('').reverse().join('');
                                        document.getElementById("nominal_kupon").innerHTML = 'Rp. ' + costs + ',00';
                                        document.getElementById("nama_kupon").innerHTML = kode_kupon;
                                        var value_nominal_kupon = document.getElementById("value_nominal_kupon").value = data['diskon'];
                                        var id_kupon = document.getElementById("id_kupon").value = data['id'];

                                        var value_tarif_jasa = document.getElementById("value_tarif_jasa").value;
                                        var fix_total = parseInt(total_cart) + parseInt(value_tarif_jasa) - parseInt(value_nominal_kupon);
                                        var reversee = fix_total.toString().split('').reverse().join(''),
                                        costss  = reversee.match(/\d{1,3}/g);
                                        costss  = costss.join('.').split('').reverse().join('');
                                        document.getElementById("total").innerHTML = 'Rp. ' + costss + ',00';
                                        document.getElementById("value_total").value = fix_total;
                                      } else {

                                        var diskon = total_cart * data['diskon'] / 100;
                                        var reversee = diskon.toString().split('').reverse().join(''),
                                        costs  = reversee.match(/\d{1,3}/g);
                                        costs  = costs.join('.').split('').reverse().join('');
                                        document.getElementById("nominal_kupon").innerHTML = 'Rp. ' + costs + ',00';
                                        document.getElementById("nama_kupon").innerHTML = kode_kupon;
                                        var value_nominal_kupon = document.getElementById("value_nominal_kupon").value = diskon;
                                        var id_kupon = document.getElementById("id_kupon").value = data['id'];

                                        var value_tarif_jasa = document.getElementById("value_tarif_jasa").value;
                                        var fix_total = parseInt(total_cart) + parseInt(value_tarif_jasa) - parseInt(value_nominal_kupon);
                                        var reversee = fix_total.toString().split('').reverse().join(''),
                                        costss  = reversee.match(/\d{1,3}/g);
                                        costss  = costss.join('.').split('').reverse().join('');
                                        document.getElementById("total").innerHTML = 'Rp. ' + costss + ',00';
                                        document.getElementById("value_total").value = fix_total;
                                      }

                                      var y = document.getElementById("gunakan");
                                      var z = document.getElementById("hapus");

                                      document.getElementById("kode_kupon").readOnly = true;
                                      y.style.display = "none";
                                      z.style.display = "block";
                                      toastr.success('Kupon berhasil di tambahkan!', '', {timeOut: 10000});
                                  }
                          }
                      });
              } else {
                alert('Masukan Kode Kupon!');
              }
          //   } else {
          //     alert('Pilih Jasa Pengiriman!');
          //   }
          // } else {
          //   if (kode_kupon) {
          //     // alert(kode_kupon);
          //             $.ajax({
          //                 url: '{{ url("/frontend/api/kupon") }}' + '/' + kode_kupon,
          //                 success:function(data) {
          //                         // alert(data);
          //                         if (!$.trim(data)){   
          //                             document.getElementById("nama_kupon").innerHTML = 'Maaf, Kupon Tidak Tersedia!';
          //                         }
          //                         else{   
          //                             // alert("What follows is not blank: " + data);
          //                             if (data['jenis_kupon'] == 'Nominal') {
          //                               var reversee = data['diskon'].toString().split('').reverse().join(''),
          //                               costs  = reversee.match(/\d{1,3}/g);
          //                               costs  = costs.join('.').split('').reverse().join('');
          //                               document.getElementById("nominal_kupon").innerHTML = 'Rp. ' + costs + ',00';
          //                               document.getElementById("nama_kupon").innerHTML = kode_kupon;
          //                               var value_nominal_kupon = document.getElementById("value_nominal_kupon").value = data['diskon'];
          //                               var id_kupon = document.getElementById("id_kupon").value = data['id'];

          //                               var value_tarif_jasa = document.getElementById("value_tarif_jasa").value;
          //                               var fix_total = parseInt(fix_total_cart) + parseInt(value_tarif_jasa) - parseInt(value_nominal_kupon);
          //                               var reversee = fix_total.toString().split('').reverse().join(''),
          //                               costss  = reversee.match(/\d{1,3}/g);
          //                               costss  = costss.join('.').split('').reverse().join('');
          //                               document.getElementById("total").innerHTML = 'Rp. ' + costss + ',00';
          //                               document.getElementById("value_total").value = fix_total;
          //                             } else {

          //                               var diskon = fix_total_cart * data['diskon'] / 100;
          //                               var reversee = diskon.toString().split('').reverse().join(''),
          //                               costs  = reversee.match(/\d{1,3}/g);
          //                               costs  = costs.join('.').split('').reverse().join('');
          //                               document.getElementById("nominal_kupon").innerHTML = 'Rp. ' + costs + ',00';
          //                               document.getElementById("nama_kupon").innerHTML = kode_kupon;
          //                               var value_nominal_kupon = document.getElementById("value_nominal_kupon").value = diskon;
          //                               var id_kupon = document.getElementById("id_kupon").value = data['id'];

          //                               var value_tarif_jasa = document.getElementById("value_tarif_jasa").value;
          //                               var fix_total = parseInt(fix_total_cart) + parseInt(value_tarif_jasa) - parseInt(value_nominal_kupon);
          //                               var reversee = fix_total.toString().split('').reverse().join(''),
          //                               costss  = reversee.match(/\d{1,3}/g);
          //                               costss  = costss.join('.').split('').reverse().join('');
          //                               document.getElementById("total").innerHTML = 'Rp. ' + costss + ',00';
          //                               document.getElementById("value_total").value = fix_total;
          //                             }

          //                             var y = document.getElementById("gunakan");
          //                             var z = document.getElementById("hapus");

          //                             document.getElementById("kode_kupon").readOnly = true;
          //                             y.style.display = "none";
          //                             z.style.display = "block";
                                      
          //                         }
          //                 }
          //             });
          //     } else {
          //       alert('Masukan Kode Kupon!');
          //     }
          // }
      }
  </script>

  <script type="text/javascript">
    function myFunctionHapus() {
          document.getElementById("nama_kupon").innerHTML = "";
          document.getElementById("nominal_kupon").innerHTML = "";

          var kupon = document.getElementById("value_nominal_kupon").value;
          var value_total = document.getElementById("value_total").value;
          // var value_tarif_jasa = document.getElementById("value_tarif_jasa").value;
          var fix_total = parseInt(value_total) + parseInt(kupon);
          // alert(value_total,value_tarif_jasa);
          var reversee = fix_total.toString().split('').reverse().join(''),
          costss  = reversee.match(/\d{1,3}/g);
          costss  = costss.join('.').split('').reverse().join('');
          document.getElementById("total").innerHTML = 'Rp. ' + costss + ',00';
          document.getElementById("value_total").value = fix_total;

          var y = document.getElementById("gunakan");
          var z = document.getElementById("hapus");

          document.getElementById("kode_kupon").readOnly = false;
          y.style.display = "block";
          z.style.display = "none";

          document.getElementById("id_kupon").value = 0;
          document.getElementById("value_nominal_kupon").value = 0;
          document.getElementById("kode_kupon").value = "";
          // alert(document.getElementById("value_tarif_jasa").value);
          toastr.error('Kupon berhasil di hapus!', '', {timeOut: 10000});
      }
  </script>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

  <!-- Back To Top-->
  <script>
    jQuery(document).ready(function() {
       
      var offset = 250;
       
      var duration = 300;
       
      jQuery(window).scroll(function() {
       
      if (jQuery(this).scrollTop() > offset) {
       
      jQuery('.back-to-top').fadeIn(duration);
       
      } else {
       
      jQuery('.back-to-top').fadeOut(duration);
       
      }
      });
       
       
       
      jQuery('.back-to-top').click(function(event) {
       
      event.preventDefault();
       
      jQuery('html, body').animate({scrollTop: 0}, duration);
       
      return false;
       
      })
       
      });
  </script>
  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
  </script>
</body>

</html>