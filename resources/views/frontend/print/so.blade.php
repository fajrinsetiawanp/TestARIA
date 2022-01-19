<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>INVOICE #{{ $order_doremi->no_invoice }}</title>
    <!-- <title>INVOICE #{{ $order_musika->no_invoice }}</title> -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
    <style>
        .invoice-box {
            max-width: 800px;
            margin: auto;
            padding: 30px;
            border: 1px solid #eee;
            box-shadow: 0 0 10px rgba(0, 0, 0, .15);
            font-size: 16px;
            line-height: 24px;
            font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color: #555;
        }
        
        .invoice-box table {
            width: 100%;
            line-height: inherit;
            text-align: left;
        }
        
        .invoice-box table td {
            padding: 5px;
            vertical-align: top;
        }
        
        .invoice-box table tr td:nth-child(2) {
            text-align: right;
        }
        
        .invoice-box table tr.top table td {
            {{-- edited 20px--}}
            padding-bottom: 1px;
        }
        
        .invoice-box table tr.top table td.title {
            font-size: 45px;
            line-height: 45px;
            color: #333;
        }
        
        .invoice-box table tr.information table td {
            {{-- edited 40px --}}
            padding-bottom: 1px;
        }
        
        .invoice-box table tr.heading td {
            background: #95a5a6;
            border-bottom: 1px solid #ddd;
            font-weight: bold;
        }
        
        .invoice-box table tr.details td {
            padding-bottom: 20px;
        }
        
        .invoice-box table tr.item td{
            border-bottom: 1px solid #eee;
        }
        
        .invoice-box table tr.item.last td {
            border-bottom: none;
        }
        
        .invoice-box table tr.total td:nth-child(2) {
            border-top: 2px solid #eee;
            font-weight: bold;
        }
        
        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td {
                width: 100%;
                display: block;
                text-align: center;
            }
            
            .invoice-box table tr.information table td {
                width: 100%;
                display: block;
                text-align: center;
            }
        }
        
        /** RTL **/
        .rtl {
            direction: rtl;
            font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        }
        
        .rtl table {
            text-align: right;
        }
        
        .rtl table tr td:nth-child(2) {
            text-align: left;
        }
    </style>
</head>

<body>
    <div class="invoice-box" style="background-color:#ecf0f1; font-size: 12px;">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <!-- <div class="checkbox-form mb-sm-40">
                                    @if($order)
                                    <img src="{{URL::asset('frontend/img/logo/doremi_new_white.png')}}" style="width:260px; height:55px;">
                                    @else
                                    <img src="{{URL::asset('frontend/img/logo/Musika1.jpg')}}" style="width:260px; height:55px;">
                                    @endif
                                    <hr><br> -->
                                {{-- <h5>DOREMI MUSIK</h5> --}}
                                   <!--  @if ($order_musika != null)
                                    <h5>INVOICE : #{{ $order_doremi->no_invoice }}</h5><br>
                                    @else
                                    <h5>INVOICE : #{{ $order_musika->no_invoice }}</h5><br>
                                    @endif -->
                                </div>
                            </td>
                            
                            <!-- @php
                                $sales = App\User::where('id', $order->id_sales)->first();
                            @endphp -->
                            <td>
                                <strong> Invoice : {{ $order->no_invoice }} </strong><br>
                                Created : {{ $order->tanggal }}<br>
                                Sales : {{ $sales->id_sales }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                @if ($order->order_to == 'DOREMI')
                                    
                                PT. Doremi Musik Indonesia  <br>
                                Pergudangan Jaya Niaga <br>
                                Jl.Halim Perdanakusuma No.1, <br>
                                Jurumudi Baru, Kec. Benda, Tangerang - 15124 <br>
                                Phone: (021) 557 323 68/69 <br>
                                Email: doremi.ecomm@gmail.com
                                
                                @elseif ($order->order_to == 'MUSIKA')
                                
                                PT. Musika Indonesia Jaya <br>
                                Pergudangan Jaya Niaga <br>
                                Jl.Halim Perdanakusuma No.1, <br>
                                Jurumudi Baru, Kec. Benda, Tangerang - 15124 <br>
                                Phone: (021) 557 323 68/69 <br>
                                Email: accmusika@gmail.com / accmusika_indonesia@yahoo.com
                                
                                @endif
                            </td>
                            
                            <td>
                                <p style="text-transform: uppercase;">
				                    {{ $toko->nama_sales }} <br>
                                    {{ $toko->nama_pemilik }}  <br>
                                    {{ $toko->nama_toko }}  <br>
                                    {{ $toko->alamat }} <br>

                                    @if (is_null($toko->no_telepon))
                                    {{ $toko->no_handphone }}
                                    @elseif (is_null($toko->no_handphone))
                                    {{ $toko->no_telepon }}
                                    @else
                                    {{ $toko->no_handphone }} / {{ $toko->no_telepon }}
                                    @endif
                                </p>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="heading">
                <td>
                    Payment Infomation
                </td>
                
                <td>
                    
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    Payment Term
                </td>
                <td>
                    {{ strtoupper($order->payment_terms) }}
                </td>
            </tr>
            <tr class="item">
                <td>
                    Jasa Kirim
                </td>
                <td>
                    {{ $order->jasa_kirim }}
                </td>
            </tr>
            <tr class="item">
                <td>
                    Kota Tujuan
                </td>
                <td>
                    {{ $order->kota_tujuan }}
                </td>
            </tr>
            <!-- <tr class="heading">
                <td>
                    NOTE!
                </td>
                
                <td>
                    
                </td>
            </tr>
            <tr class="item">
                <td>
                    <strong>{{ $order->note }}</strong>
                </td>
            </tr> -->
        </table>
        <br>
        <table class="table table-hover">
                <h3>Invoice Items </h3>
                {{-- <strong>CATATAN: {{ $order->note }} </strong> --}}
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Diskon %</th>
                        <th>Total</th>
                        <th>Catatan</th>

                        @if(CRUDBooster::myPrivilegeName() != 'Admin Wholesales')
                            <th>Catatan Approval</th>
                            <th>Updated By</th>
                        @endif

                        <th>Created at</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($order->detail as $doremi)
                    @php
                        $produk_doremi = App\Models\TbProduk::where('id', $doremi->id_produk)->first();

                        $user = App\User::find($doremi['id_user']);
                    @endphp
                        <tr>
                            <td>{{ $produk_doremi['judul'] }}</td>
                            <td>Rp. {{ number_format($doremi['harga_satuan']) }}</td>
                            <td>{{ $doremi['qty'] }}</td>
                            <td>
                                {{ $doremi->diskon_1 }}
                                @if($doremi->diskon_2 != null || $doremi->diskon_2 > 0)
                                    + {{ $doremi->diskon_2 }}
                                @endif    
                                @if($doremi->diskon_3 != null || $doremi->diskon_3 > 0)
                                    + {{ $doremi->diskon_3 }}
                                @endif
                            </td>
                            <td>Rp. {{ number_format($doremi['jumlah_total']) }}</td>
                            <td>{{ $doremi['note'] }}</td>

                            @if(CRUDBooster::myPrivilegeName() != 'Admin Wholesales')
                                <th>{{ $doremi['note_acc'] }}</th>
                                <th>{{ $user->name }}</th>
                            @endif

                            <td>{{ $doremi['created_at'] }}</td>
                        </tr>  
                @endforeach 
                </tbody>
                <tfoot>
                    <tr>
                        <th>Order Total</th>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><span class=" total amount">Rp. {{ number_format($total_order) }}</span>
                        </td>
                    </tr>
                </tfoot>
        </table>
        <table>
            <tr>
                @foreach ($bank as $banks)
                <td>
                    <tr class="heading">
                        <td>
                            <b>{{ $banks->nama }}</b> <br>
                            {{ $banks->bank }} <br>
                            {{ $banks->no_rekening }}
                        </td>
                    </tr>
                </td>
                @endforeach
            </tr>
        </table>
    </div>
</body>
</html>
