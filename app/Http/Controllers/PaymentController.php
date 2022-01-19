<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Artisaninweb\SoapWrapper\SoapWrapper;
use App\Soap\Request\GetConversionAmount;
use App\Soap\Response\GetConversionAmountResponse;

use Carbon\Carbon;
use Ixudra\Curl\Facades\Curl;
use Auth;
use \Cart as Cart;
use stdClass;
use Mail;
use DB;

use App\Http\Requests;
use App\Veritrans\Midtrans;

use App\User;
use App\Models\TbMasterKategori;
use App\Models\TbSubKategori;
use App\Models\TbSubscribe;
use App\Models\TbArtikel;

use App\Models\TbProduk;
use App\Models\TbGambarProduk;
use App\Models\TbHargaProduk;
use App\Models\TbWarnaProduk;
use App\Models\TbLokasiProduk;

use App\Models\TbMasterProvinsi;
use App\Models\TbMasterKota;
use App\Models\TbMasterJasaKirim;

use App\Models\TbMasterKupon;
use App\Models\TbMasterAkunBank;

use App\Models\TbCustomer;
use App\Models\TbOrder;
use App\Models\TbOrderDetail;
use App\Models\TbOrderCheck;
use App\Models\TbAlamatKirim;

use App\Models\TbBiayaLayanan;

use App\Models\TbOrderWholesale;
use App\Models\TbOrderWholesaleDetail;
use App\Models\TbToko;
use App\Models\TbKonfirmasiBayar;
use App\Models\TbJasaKirimWholesale;
use App\TbDiskonKategori;

use App\Models\TbOrderTeacher;
use App\Models\TbOrderDetailTeacher;

class PaymentController extends Controller
{

    public function __construct(){   
        Midtrans::$serverKey = 'SB-Mid-server-FX36l7Kk4sC8DqIn87s6i4Hz';
        //set is production to true for production mode
        Midtrans::$isProduction = false;
    }

    public function checkoutold(Request $request) {
        // $provinsi = TbMasterProvinsi::all();

        $jasa_kirim = TbMasterJasaKirim::all();

        $berat = 0;
        $total_cart = 0;
        $items = array();
        $harga = array();
        foreach (Cart::content() as $key) {
            $produk = TbProduk::where('kode_sku', $key->id)->first();

            $berat += $produk->berat * $key->qty;
            $total_cart += $key->subtotal;

            array_push($harga, $key->price);

            $data = new stdClass();
            $data->id = $key->id; 
            $data->name = $key->name;
            $data->price = $key->price;
            $data->url = "http://doremimusicstore.com";
            $data->type = "Music";
            $data->quantity = $key->qty;

            $subtotal += $key->price * $key->qty;

            array_push($items, $data);
        }

        if(!empty($harga)) {
            $harga_tertinggi = max($harga);
            if ($harga_tertinggi >= 1500000) {
                $myArr = array(
                    'server_key' => "mGephdrspSk6t3SCZDKFpYDxEnmJga",
                    'amount' => $subtotal,
                    'items' => $items
                );

                // dd($subtotal);
                // dd(json_encode($myArr));
                $response = Curl::to('https://sandbox.kredivo.com/kredivo/v2/payments')
                    ->withContentType('application/json')
                    ->withHeader('Accept: application/json')
                    ->withData( $myArr )
                    ->asJson()
                    ->post();
            }
        }

        $curl_provinsi = Curl::to('https://kodepos-2d475.firebaseio.com/list_propinsi.json?print=pretty')
                ->get();
        $provinsi = json_decode($curl_provinsi, true);

        $akun_bank = TbMasterAkunBank::all();

        $biaya_layanan = TbBiayaLayanan::all();
        // dd($provinsi);
        return view('frontend.checkout')
            ->with('response', $response)
            ->with('total_cart', $total_cart)
            ->with('berat', $berat)
            ->with('provinsi', $provinsi)
            ->with('jasa_kirim', $jasa_kirim)
            ->with('akun_bank', $akun_bank)
            ->with('biaya_layanan', $biaya_layanan);
    }

    public function apiKota($id_provinsi) {
        // $kota = TbMasterKota::where('id_provinsi', $id_provinsi)->get();
        $curl_kota = Curl::to('https://kodepos-2d475.firebaseio.com/list_kotakab/'.$id_provinsi.'.json?print=pretty')
                ->get();

        $kota = json_decode($curl_kota, true);

        return $kota;
    }

    public function apiKodePos($id_kota) {
        // $kota = TbMasterKota::where('id_provinsi', $id_provinsi)->get();
        $curl_kodepos = Curl::to('https://kodepos-2d475.firebaseio.com/kota_kab/'.$id_kota.'.json?print=pretty')
                ->get();

        $kode_pos = json_decode($curl_kodepos, true);

        return $kode_pos;
    }

    public function apiJenisKirim(SoapWrapper $soapWrapper, $origin, $destination, $weight, $courier) {
        // dd($weight);
        if ($courier == 'rpx') {
            $soapWrapper->add('Rpx', function ($service) {
            $service
                ->wsdl('http://api.rpxholding.com/wsdl/rpxwsdl.php?wsdl')
                ->trace(true);
            });

            // Without classmap
            $response = $soapWrapper->call('Rpx.getRatesPostalCode', [
              'user' => 'doremi',
              'password'   => 'Andrian123',
              'origin_postal_code' => $origin,
              'destination_postal_code' => $destination,
              'service_type' => "",
              'weight' => $weight,
              'disc' => 0,
              'format' => 'JSON',
              'account_number' => ""
            ]);

            $data = json_decode($response, true);

            $tempList = $data['RPX']['DATA'];
            
            return $tempList;
        } elseif ($courier == 'jne') {
            $response = Curl::to('http://apiv2.jne.co.id:10101/tracing/api/pricedev')
            ->withData( array( 
                'username' => 'DOREMIMUSICINDO',
                'api_key' => 'c6384b95e23da808c8d42e6732b8ea6c',
                'from' => $origin,
                'thru' => $destination,
                'weight' => $weight,
                ) )
            ->withHeader('Content-Type: application/x-www-form-urlencoded')
            ->withHeader('Accept: application/json')
            ->post();

            $arrayResponse = json_decode($response, true);

            return $arrayResponse;
        } else {
            $response = Curl::to('https://api.rajaongkir.com/starter/cost')
            ->withData( array( 
                'origin' => $origin,
                'destination' => $destination,
                'weight' => $weight,
                'courier' => $courier
                ) )
            ->withHeader('content-type: application/x-www-form-urlencoded')
            ->withHeader('key: b6f6a4aad376eaa447b9af670cf2b040')
            ->post();

            $arrayResponse = json_decode($response, true);

            $tempList = $arrayResponse['rajaongkir']['results'][0]['costs'];

            return $tempList;
        }
        dd($response);

        // $curl = curl_init();

        // curl_setopt_array($curl, array(
        //   CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
        //   CURLOPT_RETURNTRANSFER => true,
        //   CURLOPT_ENCODING => "",
        //   CURLOPT_MAXREDIRS => 10,
        //   CURLOPT_TIMEOUT => 30,
        //   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //   CURLOPT_CUSTOMREQUEST => "POST",
        //   CURLOPT_POSTFIELDS => "origin=501&destination=114&weight=1700&courier=".$jasa."",
        //   CURLOPT_HTTPHEADER => array(
        //     "content-type: application/x-www-form-urlencoded",
        //     "key: b6f6a4aad376eaa447b9af670cf2b040"
        //   ),
        // ));

        // $response = curl_exec($curl);
        // $err = curl_error($curl);

        // curl_close($curl);

        // if ($err) {
        //   echo "cURL Error #:" . $err;
        // } else {
        //   echo $response;
        // }
    }

    public function apiKupon($kode_kupon) {
        $kupon = TbMasterKupon::where('kode_kupon', $kode_kupon)->where('status', 'Aktif')->first();

        return $kupon;
    }

    public function apiIndomart(SoapWrapper $soapWrapper, $kodepos) {
        $soapWrapper->add('Rpx', function ($service) {
          $service
            ->wsdl('http://api.rpxholding.com/wsdl/rpxwsdl.php?wsdl')
            ->trace(true);
        });

        // Without classmap
        $response = $soapWrapper->call('Rpx.getStoreInfo', [
            'user' => "doremi",
            'password'   => "Andrian123",
            // 'origin' => "TAN",
            // 'destination' => "DPS",
            // 'service_type' => "",
            // 'weight' => 2,
            // 'disc' => 0,
            'format' => "JSON",
            'kode_toko' => "",
            'kode_pos' => $kodepos,
            'alamat' => "",
            'latitude' => "",
            'longitude' => "",
            'radius' => "",
            'var' => ""
        ]);

        $data = json_decode($response, true);

        $tempList = $data['RPX']['DATA'];
            
        return $tempList;

    }

    public function apiToko(SoapWrapper $soapWrapper, $kodetoko) {
        $soapWrapper->add('Rpx', function ($service) {
          $service
            ->wsdl('http://api.rpxholding.com/wsdl/rpxwsdl.php?wsdl')
            ->trace(true);
        });

        // Without classmap
        $response = $soapWrapper->call('Rpx.getStoreInfo', [
            'user' => "doremi",
            'password'   => "Andrian123",
            // 'origin' => "TAN",
            // 'destination' => "DPS",
            // 'service_type' => "",
            // 'weight' => 2,
            // 'disc' => 0,
            'format' => "JSON",
            'kode_toko' => $kodetoko,
            'kode_pos' => "",
            'alamat' => "",
            'latitude' => "",
            'longitude' => "",
            'radius' => "",
            'var' => ""
        ]);

        $data = json_decode($response, true);

        $tempList = $data['RPX']['DATA'];
            
        return $tempList;

    }

    public function apiMetodeKirim($metode_kirim) {
        if ($metode_kirim == 'SELF PICKUP') {
            $lokasi = TbLokasiProduk::all();
        } else {
            $lokasi = TbLokasiProduk::find([1, 2]);
        }

        return $lokasi;
    }

    public function submitOrder(Request $request) {
        $myArr = array(
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'email' => $request->email,
            'phone' => $request->phone,
            'alamat' => $request->alamat,
            'id_provinsi' => $request->provinsi,
            'id_kota' => $request->kota,
            'kode_pos' => $request->kode_pos,
            'metode_kirim' => $request->metode_kirim,
            'id_kota_lokasi_kirim' => $request->lokasi_kirim,
            'nickname_jasa_kirim' => $request->jasa_kirim,
            'jenis_kirim' => $request->jenis_kirim,
            'tarif_ongkir' => $request->value_tarif_jasa,
            'nominal_kupon' => $request->value_nominal_kupon,
            'id_kupon' => $request->id_kupon,
            'kode_kupon' => $request->kode_kupon,
            'order_id' => $request->order_id,
            'amount' => $request->amount,
            'transaction_time' => $request->transaction_time,
            'payment_type' => $request->payment_type,
            'keterangan' => $request->keterangan,
            'biaya_layanan' => $request->biaya_layanan,

            'nama_depan_ship' => $request->nama_depan_ship,
            'nama_belakang_ship' => $request->nama_belakang_ship,
            'email_ship' => $request->email_ship,
            'phone_ship' => $request->phone_ship,
            'alamat_ship' => $request->alamat_ship,
            'id_provinsi_ship' => $request->provinsi_ship,
            'id_kota_ship' => $request->kota_ship,
            'kode_pos_ship' => $request->kode_pos_ship,
            'tipe_alamats' => $request->tipe_alamats,
        );

        // $myArr = array(
        //     'nama_depan' => 'Rintis',
        //     'nama_belakang' => 'Mardika',
        //     'email' => 'rmsyf17@gmail.com',
        //     'phone' => '0896354657',
        //     'alamat' => 'Citra Raya',
        //     'id_provinsi' => 'p1_Bali',
        //     'id_kota' => 'k2_Tabanan',
        //     'kode_pos' => 82111,
        //     'metode_kirim' => 'SELF PICKUP',
        //     'id_kota_lokasi_kirim' => 15810,
        //     'nickname_jasa_kirim' => '',
        //     'jenis_kirim' => '',
        //     'tarif_ongkir' => 0,
        //     'nominal_kupon' => 0,
        //     'id_kupon' => 0,
        //     'kode_kupon' => '',
        //     'order_id' => 2,
        //     'amount' => 315000,
        //     'transaction_time' => 'tujbyuk',
        //     'payment_type' => 'cc',
        //     'keterangan' => '',
        //     'biaya_layanan' => 13972,

        //     'nama_depan_ship' => '',
        //     'nama_belakang_ship' => '',
        //     'email_ship' => '',
        //     'phone_ship' => '',
        //     'alamat_ship' => '',
        //     'id_provinsi_ship' => '',
        //     'id_kota_ship' => '',
        //     'kode_pos_ship' => '',
        //     'tipe_alamats' => '',
        // );

        $data = json_encode($myArr);
        // dd($data);
        $kota = explode("_", $myArr['id_kota']);
        $provinsi = explode("_", $myArr['id_provinsi']);
        // dd($provinsi);
        $customer = new TbCustomer;
        $customer->nama_depan = $myArr['nama_depan'];
        $customer->nama_belakang = $myArr['nama_belakang'];
        $customer->email = $myArr['email'];
        $customer->no_handphone = $myArr['phone'];
        $customer->alamat = $myArr['alamat'];
        // $customer->id_kota = $kota[0];

            // $kota = TbMasterKota::where('id_kota', $myArr['id_kota'])->first();

        $customer->kota = $kota[1];
        // $customer->id_provinsi = $provinsi[0];

            // $provinsi = TbMasterProvinsi::where('id_provinsi', $myArr['id_provinsi'])->first();

        $customer->provinsi = $provinsi[1];
        $customer->kode_pos = $myArr['kode_pos'];
        $customer->tipe_customer = 'General';
        $customer->timestamps = true;
        $customer->save();
        // dd($customer);
        $order = new TbOrder;
        $order->tanggal_order = $myArr['transaction_time'];
        $order->no_order = $myArr['order_id'];
        $order->id_customer = $customer->id;
        $order->nama_customer = $customer->nama_depan.' '.$customer->nama_belakang;
        $order->id_kode_kupon = $myArr['id_kupon'];

            $kupon = TbMasterKupon::find($myArr['id_kupon']);

        $order->nama_kupon = $kupon->nama_kupon;
        $order->nominal_kupon = $myArr['nominal_kupon'];

        if ($myArr['metode_kirim'] == 'SELF PICKUP') {
            $order->tipe_order = 'Self Pickup';
        } elseif ($myArr['metode_kirim'] == 'INDOMART') {
            $order->tipe_order = 'Ambil Di Indomart';
        } else {
            $order->tipe_order = 'Origin Shipment';
        }

        $order->lokasi_kirim = $myArr['id_kota_lokasi_kirim'];
        $order->keterangan = $myArr['keterangan'];
        $order->payment_type = $myArr['payment_type'];
        $order->biaya_layanan = $myArr['biaya_layanan'];
        $order->total_bayar = $myArr['amount'];
        $order->status = 'Pending';
        $order->tipe_harga_jual = 'Retail';
        $order->timestamps = true;
        $order->save();
        // dd($order);
        $alamat_pengiriman = new TbAlamatKirim;
        $alamat_pengiriman->id_order = $order->id;
        
        if ($myArr['tipe_alamats'] == "Shipping Address") {
            $kota_ship = explode("_", $myArr['id_kota_ship']);
            $provinsi_ship = explode("_", $myArr['id_provinsi_ship']);

            $alamat_pengiriman->nama_depan = $myArr['nama_depan_ship'];
            $alamat_pengiriman->nama_belakang = $myArr['nama_belakang_ship'];
            $alamat_pengiriman->email = $myArr['email_ship'];
            $alamat_pengiriman->no_handphone = $myArr['phone_ship'];
            $alamat_pengiriman->alamat = $myArr['alamat_ship'];
            // $alamat_pengiriman->id_kota = $kota_ship[0];

                // $kota_ship = TbMasterKota::where('id_kota', $myArr['id_kota_ship'])->first();

            $alamat_pengiriman->kota = $kota_ship[1];
            // $alamat_pengiriman->id_provinsi = $provinsi_ship[0];

                // $provinsi_ship = TbMasterProvinsi::where('id_provinsi', $myArr['id_provinsi_ship'])->first();

            $alamat_pengiriman->provinsi = $provinsi_ship[1];
            $alamat_pengiriman->kode_pos = $myArr['kode_pos_ship'];
        } else {
            $kota_lagi = explode("_", $myArr['id_kota']);
            $provinsi_lagi = explode("_", $myArr['id_provinsi']);

            $alamat_pengiriman->nama_depan = $myArr['nama_depan'];
            $alamat_pengiriman->nama_belakang = $myArr['nama_belakang'];
            $alamat_pengiriman->email = $myArr['email'];
            $alamat_pengiriman->no_handphone = $myArr['phone'];
            $alamat_pengiriman->alamat = $myArr['alamat'];
            // $alamat_pengiriman->id_kota = $kota_lagi[0];

                // $kota_lagi = TbMasterKota::where('id_kota', $myArr['id_kota'])->first();

            $alamat_pengiriman->kota = $kota_lagi[1];
            // $alamat_pengiriman->id_provinsi = $provinsi_lagi[0];

                // $provinsi_lagi = TbMasterProvinsi::where('id_provinsi', $myArr['id_provinsi'])->first();

            $alamat_pengiriman->provinsi = $provinsi_lagi[1];
            $alamat_pengiriman->kode_pos = $myArr['kode_pos'];
        }

        $alamat_pengiriman->timestamps = true;
        $alamat_pengiriman->save();

        if (!empty($myArr['nickname_jasa_kirim'])) {
            $order_check = new TbOrderCheck;
            $order_check->id_order = $order->id;

                $jasa_kirim = TbMasterJasaKirim::where('nama_singkatan', $myArr['nickname_jasa_kirim'])->first();

            $order_check->id_jasa_kirim = $jasa_kirim->id;

                $explode_service = explode("_", $myArr['jenis_kirim']);

            $order_check->jasa_kirim = $jasa_kirim->nama.' - '.$explode_service[0];
            $order_check->tarif_ongkir = $myArr['tarif_ongkir'];
            $order_check->timestamps = true;
            $order_check->save();
        }

        foreach (Cart::content() as $key) {
            $produk = TbProduk::where('kode_sku', $key->id)->first();

            $order_detail = new TbOrderDetail;
            $order_detail->id_order = $order->id;
            $order_detail->id_produk = $produk->id;
            $order_detail->berat = $key->qty * $produk->berat;
            $order_detail->qty = $key->qty;

                $harga_produk = TbHargaProduk::where('id_produk', $produk->id)->where('jenis_harga', 'Retail')->first();

            $order_detail->harga_satuan = $harga_produk->harga;
            $order_detail->diskon = $harga_produk->diskon;
            $order_detail->total = $key->subtotal;
            $order_detail->timestamps = true;
            $order_detail->save();

        }

        Cart::destroy();

        return $data;
    }

    public function thanksCicilan(Request $request) {

        return view('payment.complete-cicilan');
    }

    public function paymentGateway(Request $request) {
        // dd($request->all());
        // $cart = Cart::content();
        // dd($cart);
        $myArr = array(
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'email' => $request->email,
            'phone' => $request->phone,
            'alamat' => $request->alamat,
            'id_provinsi' => $request->provinsi,
            'id_kota' => $request->kota,
            'metode_kirim' => $request->metode_kirim,
            'id_kota_lokasi_kirim' => $request->lokasi_kirim,
            'nickname_jasa_kirim' => $request->jasa_kirim,
            'jenis_kirim' => $request->jenis_kirim,
            'tarif_ongkir' => $request->value_tarif_jasa,
            'nominal_kupon' => $request->value_nominal_kupon,
            'id_kupon' => $request->id_kupon,
            'kode_kupon' => $request->kode_kupon,
            'total' => $request->value_total,
            'payment_type_cicilan' => $request->paymenttypecicilan,
            'kode_pos' => $request->kode_pos,
            'biaya_layanan' => $request->biaya_layanan
        );

        if ($request->button_bayar == "button_bayar") {

            $midtrans = new Midtrans;

            // Populate items
            $items = array();
            $subtotal = 0;
            foreach (Cart::content() as $value) {
                //bikin object baru
                $data = new stdClass();
                $data->id = $value->id; 
                $data->price = $value->price;
                $data->quantity = $value->qty;
                $data->name = $value->name;

                $subtotal += $value->price * $value->qty;

                array_push($items, $data); //push object kota yang kita bikin ke array

            }
            // dd($subtotal);
                $biaya_layanan = TbBiayaLayanan::find($myArr['biaya_layanan']);
                $layanan = new stdClass();
                $layanan->id = $myArr['biaya_layanan'];

                if ($biaya_layanan->nama == 'Credit Card') {
                    if (!empty($biaya_layanan->biaya_tambahan)) {
                        $layanan->price = ceil($myArr['total'] * $biaya_layanan->biaya / 100 + $biaya_layanan->biaya_tambahan);
                    } else {
                        $layanan->price = ceil($myArr['total'] * $biaya_layanan->biaya / 100);
                    }
                } else {
                    if (!empty($biaya_layanan->biaya_tambahan)) {
                        $layanan->price = ceil($biaya_layanan->biaya + $biaya_layanan->biaya_tambahan);
                    } else {
                        $layanan->price = ceil($biaya_layanan->biaya);
                    }
                }

                $layanan->quantity = 1;
                $layanan->name = "Biaya Layanan";

                $subtotal += ceil($layanan->price);
                $data_layanan_price = ceil($layanan->price);

                array_push($items, $layanan);
            // dd($subtotal);
            if (!empty($myArr['nickname_jasa_kirim'])) {
                $explode_jenis = explode("_", $myArr['jenis_kirim']);

                $delivery_service = new stdClass();
                $delivery_service->id = $myArr['nickname_jasa_kirim'];
                $delivery_service->price = $myArr['tarif_ongkir'];
                $delivery_service->quantity = 1;
                $delivery_service->name = strtoupper($myArr['nickname_jasa_kirim']).' - '.$explode_jenis[0];

                $subtotal += $myArr['tarif_ongkir'];

                array_push($items, $delivery_service);
            }
            // dd($subtotal);

        if ($myArr['id_kupon'] != 0) {
            $myArr['nominal_kupon'] = -1 * abs($myArr['nominal_kupon']);
            // dd($myArr['nominal_kupon']);

            $kupon = new stdClass();
            $kupon->id = $myArr['kode_kupon'];
            $kupon->price = $myArr['nominal_kupon'];
            $kupon->quantity = 1;
            $kupon->name = $myArr['kode_kupon'];

            $subtotal += $myArr['nominal_kupon'];

            array_push($items, $kupon);
        }
        // dd($subtotal);

        $transaction_details = array(
            'order_id'      => rand(1111111111,9999999999),
            'gross_amount'  => $subtotal
        );

        // $kota = TbMasterKota::where('id_kota', $request->kota)->first();
        $kota = explode("_", $request->kota);
        // Populate customer's billing address
        $billing_address = array(
            'first_name'    => $request->nama_depan,
            'last_name'     => $request->nama_belakang,
            'address'       => $request->alamat,
            'city'          => $kota[1],
            'postal_code'   => $request->kode_pos,
            'phone'         => $request->phone,
            'country_code'  => 'IDN'
            );


        $shipping = array(
            'tipe_alamats' => $request->tipe_alamats,
            'nama_depan_ship' => $request->nama_depan_ship,
            'nama_belakang_ship' => $request->nama_belakang_ship,
            'email_ship' => $request->email_ship,
            'phone_ship' => $request->phone_ship,
            'alamat_ship' => $request->alamat_ship,
            'id_provinsi_ship' => $request->provinsi_ship,
            'id_kota_ship' => $request->kota_ship,
            'kode_pos_ship' => $request->kode_pos_ship
        );

        
        if ($request->tipe_alamats == "Shipping Address") {
            // $kota_ship = TbMasterKota::where('id_kota', $request->kota_ship)->first();
            $kota_ship = explode("_", $request->kota_ship);
            // Populate customer's shipping address
            $shipping_address = array(
                'first_name'    => $request->nama_depan_ship,
                'last_name'     => $request->nama_belakang_ship,
                'address'       => $request->alamat_ship,
                'city'          => $kota_ship[1],
                'postal_code'   => $request->kode_pos_ship,
                'phone'         => $request->phone_ship,
                'country_code'  => 'IDN'
                );

            // Populate customer's Info
            $customer_details = array(
                'first_name'    => $request->nama_depan_ship,
                'last_name'     => $request->nama_belakang_ship,
                'email'           => $request->email_ship,
                'phone'           => $request->phone_ship,
                'billing_address' => $billing_address,
                'shipping_address'=> $shipping_address
                );
        } else {
            $shipping_address = array(
                'first_name'    => $request->nama_depan,
                'last_name'     => $request->nama_belakang,
                'address'       => $request->alamat,
                'city'          => $kota[1],
                'postal_code'   => $request->kode_pos,
                'phone'         => $request->phone,
                'country_code'  => 'IDN'
                );

            // Populate customer's Info
            $customer_details = array(
                'first_name'    => $request->nama_depan,
                'last_name'     => $request->nama_belakang,
                'email'           => $request->email,
                'phone'           => $request->phone,
                'billing_address' => $billing_address,
                'shipping_address'=> $shipping_address
                );
        }
        // dd($shipping_address);

        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        //$credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit'       => 'day', 
            'duration'   => 1
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $items,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

        $snap_token = $midtrans->getSnapToken($transaction_data);
        // dd($data_layanan_price);
        return view('payment.review-payment-gateway')
            ->with('snap_token', $snap_token)
            ->with('myArr', $myArr)
            ->with('shipping', $shipping)
            ->with('biaya_layanan', $data_layanan_price);

        } elseif ($request->button_bayar == "button_cicilan") {
            
            $items = array();
            $subtotal = 0;
            foreach (Cart::content() as $value) {
                //bikin object baru
                $data = new stdClass();
                $data->id = $value->id; 
                $data->name = $value->name;
                $data->price = $value->price;
                $data->type = "Music";
                $data->url = "http://doremimusik.com/index.php/yamaha-guitalele-gl1-black.html";
                $data->quantity = $value->qty;

                $subtotal += $value->price * $value->qty;

                array_push($items, $data);
            }

            $data_cicilan = array(
                    'server_key' => "mGephdrspSk6t3SCZDKFpYDxEnmJga",
                    'payment_type' => $myArr['payment_type_cicilan'],
                    'transaction_details' => array(
                        'amount' => $subtotal,
                        'order_id' => rand(1111111111,9999999999),
                        'items' => $items
                    ),
                    'customer_details' => array(
                        'first_name' => $myArr['nama_depan'],
                        'last_name' => $myArr['nama_belakang'],
                        'email' => $myArr['email'],
                        'phone' => $myArr['phone']
                    ),
                    'billing_address' => array(
                        'first_name' => $myArr['nama_depan'],
                        'last_name' => $myArr['nama_belakang'],
                        'address' => $myArr['alamat'],
                        'city' => 'jakarta',
                        'postal_code' => '15710',
                        'phone' => $myArr['phone'],
                        'country_code' => 'IDN'
                    ),
                    'shipping_address' => array(
                        'first_name' => $myArr['nama_depan'],
                        'last_name' => $myArr['nama_belakang'],
                        'address' => $myArr['alamat'],
                        'city' => 'jakarta',
                        'postal_code' => '15710',
                        'phone' => $myArr['phone'],
                        'country_code' => 'IDN'
                    ),
                    'push_uri' => 'https://api.merchant.com/push.php',
                    'back_to_store_uri' => 'https://merchant.com'
                );

        // dd(json_encode($data_cicilan));

        $response = Curl::to('https://sandbox.kredivo.com/kredivo/v2/checkout_url')
                ->withContentType('application/json')
                ->withHeader('Accept: application/json')
                ->withData( $data_cicilan )
                ->asJson()
                ->post();

        // dd($response->redirect_url);
        return redirect()->to($response->redirect_url);
        }
    }

    // coba
    public function paymentTypeCicilan() {
        $items = array();
        $harga = array();
        $subtotal = 0;
        foreach (Cart::content() as $value) {
            //bikin object baru
            $data = new stdClass();
            $data->id = $value->id; 
            $data->name = $value->name;
            $data->price = 1500000;
            $data->url = "http://doremimusik.com/index.php/yamaha-guitalele-gl1-black.html";
            $data->type = "Music";
            $data->quantity = $value->qty;

            $subtotal += $data->price * $value->qty;

            array_push($items, $data);
        }
        // dd(max($harga));
        if (max($harga) >= 1500000) {
            $myArr = array(
                'server_key' => "mGephdrspSk6t3SCZDKFpYDxEnmJga",
                'amount' => $subtotal,
                'items' => $items
            );

            // dd($subtotal);
            // dd(json_encode($myArr));
            $response = Curl::to('https://sandbox.kredivo.com/kredivo/v2/payments')
                ->withContentType('application/json')
                ->withHeader('Accept: application/json')
                ->withData( $myArr )
                ->asJson()
                ->post();
            
            return json_encode($response);
        }
    }

    // checkout user
    public function checkout(Request $request) {
        // $provinsi = TbMasterProvinsi::all();
        $jasa_kirim = TbMasterJasaKirim::all();

        $berat = 0;
        $total_cart = 0;
        $items = array();
        $harga = array();
        foreach (Cart::content() as $key) {
            $produk = TbProduk::where('kode_sku', $key->id)->first();

            $berat += $produk->berat * $key->qty;
            $total_cart += $key->subtotal;

            array_push($harga, $key->price);

            $data = new stdClass();
            $data->id = $key->id; 
            $data->name = $key->name;
            $data->price = $key->price;
            $data->url = "http://doremimusik.com/index.php/yamaha-guitalele-gl1-black.html";
            $data->type = "Music";
            $data->quantity = $key->qty;

            $subtotal += $key->price * $key->qty;

            array_push($items, $data);
        }

        if(!empty($harga)) {
            $harga_tertinggi = max($harga);
            if ($harga_tertinggi >= 1500000) {
                $myArr = array(
                    'server_key' => "mGephdrspSk6t3SCZDKFpYDxEnmJga",
                    'amount' => $subtotal,
                    'items' => $items
                );

                // dd($subtotal);
                // dd(json_encode($myArr));
                $response = Curl::to('https://sandbox.kredivo.com/kredivo/v2/payments')
                    ->withContentType('application/json')
                    ->withHeader('Accept: application/json')
                    ->withData( $myArr )
                    ->asJson()
                    ->post();
            }
        }

        $curl_provinsi = Curl::to('https://kodepos-2d475.firebaseio.com/list_propinsi.json?print=pretty')
                ->get();
        $provinsi = json_decode($curl_provinsi, true);
        // dd($provinsi);

        $akun_bank = TbMasterAkunBank::all();

        $biaya_layanan = TbBiayaLayanan::all();
        // dd($provinsi);
        return view('frontend.checkout')
            ->with('response', $response)
            ->with('total_cart', $total_cart)
            ->with('berat', $berat)
            ->with('provinsi', $provinsi)
            ->with('jasa_kirim', $jasa_kirim)
            ->with('akun_bank', $akun_bank)
            ->with('biaya_layanan', $biaya_layanan);
    }

    // review checkout user
    public function reviewPayment(Request $request) {
        $keterangan = $request->all();
        // dd($keterangan);
        $rand = rand(111111,999999);
        $user = array();

        $lokasi = explode('_', $keterangan['lokasi_kirim']);
            $id_lokasi = $lokasi[0];
            $nama_lokasi = $lokasi[1]." - ".$lokasi[2];
            $kodepos_lokasi = $lokasi[3];
        // dd($kodepos_lokasi);

        $jenis_paket = explode('_', $keterangan['jenis_kirim']);
            $jenis_kirim_fix = $jenis_paket[0];
            $harga_paket = $jenis_paket[1];

        $data = new stdClass();
        $data->nama_depan = $request->nama_depan;
        $data->nama_belakang = $request->nama_belakang;
        $data->email = $request->email;
        $data->no_handphone =  $request->phone;
        $data->alamat = $request->alamat;
            $provinsi = explode('_', $request->provinsi);
            // dd($provinsi);
            $data->provinsi_id = $provinsi[0];
            $data->provinsi = $provinsi[1];
            
            $kota = explode('_', $request->kota);
            $data->kota_id = $kota[0];
            $data->kota = $kota[1];
        $data->kode_pos = $request->kode_pos;
        $data->catatan = $request->catatan;
        $data->metode_kirim = $request->metode_kirim;
        $data->lokasi_kirim = $id_lokasi;
        $data->kodepos_lokasi = $kodepos_lokasi;
        $data->jasa_kirim = $request->jasa_kirim;
        $data->jenis_kirim = $jenis_kirim_fix;
        $data->harga_kirim = $harga_paket;
        array_push($user, $data);
        //dd($user);


        $kota_tujuan = TbMasterKota::find($keterangan['kota_tujuan']);
        // dd($kota_tujuan->nama);
        // $payment_term = $request->payment_term;
        // $jenis_jasa = $request->jasa_kirim;
        // $catatan = $request->note;
        // dd($jenis_jasa);
        $jasa_kirim = TbMasterJasaKirim::all();
        $curl_provinsi = Curl::to('https://kodepos-2d475.firebaseio.com/list_propinsi.json?print=pretty')
                ->get();
        $provinsi = json_decode($curl_provinsi, true);
        $biaya_layanan = TbBiayaLayanan::all();
        $kategori = TbMasterKategori::all();

        $berat = 0;
        $total_cart = 0;
        $subtotal = 0;
        $items = array();

        // $doremi = array();
        // $musika = array();
        $harga = array();

        // $payment_term = $request->payment_term;

        foreach (Cart::content() as $key) {
            $produk = TbProduk::where('kode_sku', $key->id)->first();
            $produk_diskon = TbHargaProduk::where('id_produk', $produk->id)->where('jenis_harga', 'Retail')->first();
            // dd($produk_diskon);
            $berat += $produk->berat * $key->qty;
            $total_cart += $key->subtotal;

            array_push($harga, $key->price);

            $item = new stdClass();
            $item->id = $key->id;
            $item->name = $key->name;
            $item->quantity = $key->qty;
            $item->berat = $produk->berat;
            $item->diskon = $produk_diskon->diskon;
            $item->price = $key->price;
            $item->total += $key->subtotal;
            array_push($items, $item);
        }

        // dd($items);
            // if ($produk->label_owner == 'DOREMI') {
            //     $data->price = $key->price;

            //     $data->total += $key->subtotal;

            //     array_push($doremi, $data);
                
            //     array_push($items, $data);

        //     } elseif ($produk->label_owner == 'MUSIKA') {
        //         if ($payment_term == 'cash') {
        //             // if ($key->qty == 1) {
        //             //     $diskon_1 = $key->price - $key->price * 30 / 100;
        //             //     $diskon_2 = $diskon_1 - $diskon_1 * 10 / 100;
        //             //     $diskon_3 = $diskon_2 - $diskon_2 * 10 / 100;
        //             // } else {
        //                 $diskon = $key->price - $key->price * 10 / 100;
        //                 // $diskon_3 = $diskon_2 - $diskon_2 * 10 / 100;
        //             // }
        //             $price_fix = $diskon;
        //         // } elseif ($payment_term == 'tempo') {
        //         } else {
        //             // if ($key->qty == 1) {
        //             //     $diskon_1 = $key->price - $key->price * 30 / 100;
        //             //     $diskon_2 = $diskon_1 - $diskon_1 * 10 / 100;
        //             // } else {
        //             //     $diskon_2 = $key->price - $key->price * 10 / 100;
        //             // }
        //             $price_fix = $key->price;
        //         }

        //         $data->price = $price_fix;

        //         $data->total += $key->qty * $price_fix;

        //         array_push($musika, $data);
        //         array_push($items, $data);
        //     }
        // }
        // dd($items);
        
        // midtrans
        $midtrans = new Midtrans;
        // Populate items
        foreach ($items as $value) {
            $subtotal += $value->price * $value->quantity;
        }

            $biaya_cc = TbBiayaLayanan::where('nama', 'Credit Card')->first();
            // dd($biaya_cc);
            // dd($subtotal);

            // ongkir
            $biaya_ongkir = new stdClass();
            $biaya_ongkir->id = $biaya_cc->id;
            $biaya_ongkir->price = $data->harga_kirim;

            // dd($data);
            $biaya_ongkir->quantity = 1;
            $biaya_ongkir->name = "Biaya Kirim";

            $subtotal += ceil($biaya_ongkir->price);
            $data_layanan_price = ceil($biaya_ongkir->price);

            array_push($items, $biaya_ongkir);
            // ongkir

            // biaya layanan
            $layanan = new stdClass();
            $layanan->id = $biaya_cc->id;

                if (!empty($biaya_cc->biaya_tambahan)) {
                    $layanan->price = ceil($subtotal * $biaya_cc->biaya / 100 + $biaya_cc->biaya_tambahan);
                } else {
                    $layanan->price = ceil($subtotal * $biaya_layanan['biaya'] / 100);
                }
            // dd($layanan->price);
            $layanan->quantity = 1;
            $layanan->name = "Biaya Layanan";

            $subtotal += ceil($layanan->price);
            $data_layanan_price = ceil($layanan->price);

            array_push($items, $layanan);
            // biaya layanan
            
        // dd($data);
        // dd($subtotal);

        $rand = rand(111111,999999);
        $transaction_details = array(
            'order_id'      => $rand,
            'gross_amount'  => $subtotal
        );
        // $toko = TbToko::where('id_user', Auth::id())->first();
        // dd($toko);
        // $nama_pemilik = explode(" ", $data->nama_pemilik);
        // dd($nama_pemilik);

        // Populate customer's billing address
        $billing_address = array(
            'first_name'    => $data->nama_depan,
            'last_name'     => $data->nama_belakang,
            'address'       => $data->alamat,
            'city'          => $data->kota,
            'postal_code'   => $data->kode_pos,
            'phone'         => $data->no_handphone,
            'country_code'  => 'IDN'
        );
        
        $shipping_address = array(
            'first_name'    => $data->nama_depan,
            'last_name'     => $data->nama_belakang,
            'address'       => $data->alamat,
            'city'          => $data->kota,
            'postal_code'   => $data->kode_pos,
            'phone'         => $data->no_handphone,
            'country_code'  => 'IDN'
        );

        // Populate customer's Info
        $customer_details = array(
            'first_name'    => $data->nama_depan,
            'last_name'     => $data->nama_belakang,
            'email'           => $data->email,
            'phone'           => $data->no_handphone,
            'billing_address' => $billing_address,
            'shipping_address'=> $shipping_address
        );
        // dd($shipping_address);

        // Data yang akan dikirim untuk request redirect_url.
        $credit_card['secure'] = true;
        //ser save_card true to enable oneclick or 2click
        $credit_card['save_card'] = true;

        $time = time();
        $custom_expiry = array(
            'start_time' => date("Y-m-d H:i:s O",$time),
            'unit'       => 'day',
            'duration'   => 1
        );
        
        $transaction_data = array(
            'transaction_details'=> $transaction_details,
            'item_details'       => $items,
            'customer_details'   => $customer_details,
            'credit_card'        => $credit_card,
            'expiry'             => $custom_expiry
        );

        $snap_token = $midtrans->getSnapToken($transaction_data);
        // midtrans

        // kredivo
        // if(!empty($harga)) {
        //     $harga_tertinggi = max($harga);
        //     if ($harga_tertinggi >= 1500000) {
        //         $myArr = array(
        //             'server_key' => "mGephdrspSk6t3SCZDKFpYDxEnmJga",
        //             'amount' => $subtotal,
        //             'items' => $items
        //         );

        //         // dd($subtotal);
        //         // dd(json_encode($myArr));
        //         $response = Curl::to('https://sandbox.kredivo.com/kredivo/v2/payments')
        //             ->withContentType('application/json')
        //             ->withHeader('Accept: application/json')
        //             ->withData( $myArr )
        //             ->asJson()
        //             ->post();
        //     }
        // }
        // kredivo

        return view('frontend.review')
            ->with('rand', $rand)
            ->with('snap_token', $snap_token)
            ->with('response', $response)
            ->with('user', $user)
            ->with('data', $data)
            ->with('items', $items)
            ->with('payment_term', $payment_term)
            ->with('jenis_jasa', $jenis_jasa)
            ->with('keterangan', $keterangan)
            ->with('kategori', $kategori)
            ->with('total_cart', $total_cart)
            ->with('berat', $berat)
            ->with('provinsi', $provinsi)
            ->with('jasa_kirim', $jasa_kirim)
            ->with('akun_bank', $akun_bank)
            ->with('biaya_layanan', $biaya_layanan)
            ->with('kota_tujuan', $kota_tujuan);
    }

    // payment user
    public function paymentGateways(Request $request) {
        
        // dd($request->all());
        $user = json_decode($request->user, true);
        $items = json_decode($request->items, true);
        // $keterangan = json_decode($request->keterangan, true);        
        $randominvoice = $request->rand;
        $payment_type = $request->button_bayar;
        
        $now = Carbon::now('Asia/Jakarta');
        $date = Carbon::parse($now)->format('d-F-Y H:i:s');

        foreach ($user as $key) {
            $customer = new TbCustomer;
            $customer->nama_depan = $key['nama_depan'];
            $customer->nama_belakang = $key['nama_belakang'];
            $customer->email = $key['email'];
            $customer->no_handphone = $key['no_handphone'];
            $customer->alamat = $key['alamat'];
            $customer->id_provinsi = $key['provinsi_id'];
            $customer->provinsi = $key['provinsi'];
            $customer->id_kota = $key['kota_id'];
            $customer->kota = $key['kota'];
            $customer->kode_pos = $key['kode_pos'];
            $customer->save();

            $data_customer = TbCustomer::where('nama_depan', $key['nama_depan'])->latest()->first();

            $order = new TbOrder;
            $order->tanggal_order = $date;
            $order->no_order = $randominvoice;
            $order->id_customer = $data_customer->id;
            $order->nama_customer = $data_customer->nama_depan;
            $order->tipe_order = $key['metode_kirim'];
            $order->lokasi_kirim = $key['lokasi_kirim'];
            $order->keterangan = $key['catatan'];
            $order->payment_type = $payment_type;
            $order->total_bayar = 0;
            $order->status = 'Pending';
            $order->tipe_harga_jual = 'Retail';
            $order->label = 'Website';

            // nomer so auto
            $so = TbOrder::where('label', 'Website')
            ->latest()->first();

                if ($so['no_so'] == null) {
                        $order->no_so = 'RTL/DRM/00001';
                } else {
                        $explode = explode('/', $so['no_so']);
                        // dd($explode);
                        $next_no = (int)$explode[2] + (int)1;

                        $order->no_so = 'RTL'.'/'.'DRM'.'/'.sprintf("%05d", $next_no);
                }
            $order->save();

            $order = TbOrder::where('no_order', $randominvoice)->first();
        
            $jasaKirim = new TbOrderCheck;
            $jasaKirim->id_order = $order->id;
            // $jasaKirim->id_jasa_kirim = $order->id;
            $jasaKirim->jasa_kirim = $key['jasa_kirim'].' - '.$key['jenis_kirim'];
            $jasaKirim->tarif_ongkir = $key['harga_kirim'];
            $jasaKirim->save();

        }

        // error
        $orders = TbOrder::where('id_customer', $data_customer->id)->latest()->first();

        foreach ($items as $value) {
            $data_produk = TbProduk::where('kode_sku', $value['name'])->first();

            $order_detail = new TbOrderDetail;
            $order_detail->id_order = $orders->id;
            $order_detail->id_produk = $data_produk->id;
            $order_detail->berat = $value['berat'];
            $order_detail->qty = $value['quantity'];
            $order_detail->harga_satuan = $value['price'];
            $order_detail->diskon = $value['diskon'];
            $order_detail->total = $value['total'];
            $order_detail->timestamps = true;
            $order_detail->save();

            $total_harga += $order_detail->total;
        }
        $orders->total_bayar = $total_harga;
        $orders->save();
        // error

        // $order = TbOrder::where('no_order', $randominvoice)->first();
        // $order['detail'] = TbOrderDetail::where('id_order', $order->id)->get();

        // $customer = TbCustomer::where('id', $order->id_customer)->first();
        // $pengiriman = TbOrderCheck::where('id_order', $order->id)->first();
        // $lokasi = TbLokasiProduk::where('id', $order->lokasi_kirim)->first();
        // // email
        // Mail::send('frontend.invoice_email_user',  ['order' => $order, 'customer' => $customer, 'pengiriman' => $pengiriman, 'lokasi' => $lokasi], function($message) use ($order, $customer, $pengiriman, $lokasi) {
        //         $message->to($customer->email);
        //         $message->from('no-reply@doremi.com');
        //         $message->subject('Invoice');
        // });
        // // email
        // Mail::send('frontend.invoice_email_user',  ['order' => $order, 'customer' => $customer, 'pengiriman' => $pengiriman, 'lokasi' => $lokasi], function($message) use ($order, $customer, $pengiriman, $lokasi) {
        //     $message->to('doremi.ecomm@gmail.com');
        //     $message->from('no-reply@doremi.com');
        //     $message->subject('Notifikasi Order Ecomm || Invoice #'.$order->no_order);
        // });
        // Cart::destroy();

        if ($payment_type == 'Bank Transfer') {
            return redirect('frontend/invoices/'.$randominvoice);
        } elseif ($payment_type == 'Credit Card') {
            return $randominvoice;
        }
    }

    // invoice user
    public function invoices(Request $request, $no_invoice) {

        $order = TbOrder::where('no_order', $no_invoice)->first();
        $order['detail'] = TbOrderDetail::where('id_order', $order->id)->get();

        $lokasi = TbLokasiProduk::where('id', $order->lokasi_kirim)->first();
        // dd($lokasi['kota']);

        $order_cek = TbOrderCheck::where('id_order', $order->id)->first();
        // dd($order_cek);
        
        // $toko = TbToko::where('id_user', Auth::id())->first();
        $customer = TbCustomer::where('id', $order->id_customer)->first();
        // dd($customer);

        return view('frontend.invoices')
            ->with('order', $order)
            ->with('order_cek', $order_cek)
            ->with('lokasi', $lokasi)
            ->with('customer', $customer);
    }

    // checkout toko
    public function checkoutToko(Request $request) {
        $jasa_kirim = TbJasaKirimWholesale::all();
        $curl_provinsi = Curl::to('https://kodepos-2d475.firebaseio.com/list_propinsi.json?print=pretty')
                ->get();
        $provinsi = json_decode($curl_provinsi, true);
        $biaya_layanan = TbBiayaLayanan::all();
        $kategori = TbMasterKategori::all();

        // Update Qty
            $rowId = $request->rowId;
            $qty = $request->quantity;
            
            for ($i=0; $i < sizeof($rowId); $i++) {
                // dd($qty[$i]);
                Cart::update($rowId[$i], $qty[$i]);
            }
        // Update Qty

        $items = array();
        foreach (Cart::content() as $key) {
            $produk = TbProduk::where('kode_sku', $key->id)->first();

            $data = new stdClass();
            $data->id = substr($key->id, 0, 50);
            $data->name = substr($key->name, 0, 50);
            $data->id_produk = $produk->id;
            $data->price = $key->price;
            $data->quantity = $key->qty;
            $data->id_sub_kategori = $produk->id_sub_kategori;
            $data->id_tipe_kategori = $produk->id_tipe_kategori;
            $data->id_diskon_group = $produk->id_diskon_group;
            // $data->url = "http://doremimusik.com/index.php/yamaha-guitalele-gl1-black.html";
            // $data->type = "Music";
            array_push($items, $data);
        }

        // function cek dan hitung diskon
        $items_group = array();
        foreach($items as $val) {
            $items_group[$val->id_diskon_group]['total_qty'] += $val->quantity;
            $items_group[$val->id_diskon_group][] = $val;
        }
        // dd($items_group);

        $items_fix = array(); 
        foreach($items_group as $key => $val) {
            $diskon_campur = TbDiskonKategori::where('id_diskon_group', $key)->where('qty', '<=', $val['total_qty'])->latest()->first();
            unset($val['total_qty']);
            
            if($diskon_campur) {
                foreach($val as $v) {
                    // sementara untuk ukulele R aja // nanti di hapus yaa
                    if ($v->id_produk == 994) {
                        $diskon3 = ' + 40';
                    } else {
                        $diskon3 = '';
                    }

                    $v->diskon = $diskon_campur->diskon;
                    if($diskon_campur->diskon2 > 0) {
                        $v->diskon = $diskon_campur->diskon .' + '. $diskon_campur->diskon2.$diskon3;
                    }

                    $v->cek_diskon = $diskon_campur->diskon / 100 * $v->price;
                    $v->cek_diskon2 = ($diskon_campur->diskon2 / 100 * ($v->price - $v->cek_diskon));

                    // sementara untuk ukulele R aja // nanti di hapus yaa
                    if ($v->id_produk == 994) {
                        $v->cek_diskon3 = (40 / 100 * ($v->price - ($v->cek_diskon + $v->cek_diskon2)));
                    } else {
                        $v->cek_diskon3 = 0;
                    }

                    $v->diskon_real = $v->cek_diskon + $v->cek_diskon2 + $v->cek_diskon3;
                    
                    $v->price_diskon = $v->price - $v->diskon_real;
                    $v->total = $v->price_diskon * $v->quantity;

                    $items_fix[] = $v;
                }
            } else {
                foreach($val as $v) {
                    $diskon_non_campur = TbHargaProduk::where('id_produk', $v->id_produk)->where('jenis_harga', 'Wholesale')->where('qty', '<=',$v->quantity)->latest()->first();
                    
                    // sementara untuk ukulele R aja // nanti di hapus yaa
                    if ($v->id_produk == 994) {
                        $diskon3 = ' + 40';
                    } else {
                        $diskon3 = '';
                    }

                    $v->diskon = $diskon_non_campur->diskon;
                    if($diskon_non_campur->diskon2 > 0) {
                        $v->diskon = $diskon_non_campur->diskon .' + '. $diskon_non_campur->diskon2.$diskon3;
                    }

                    $v->cek_diskon = $diskon_non_campur->diskon / 100 * $v->price;
                    $v->cek_diskon2 = ($diskon_non_campur->diskon2 / 100 * ($v->price - $v->cek_diskon));

                    // sementara untuk ukulele R aja // nanti di hapus yaa
                    if ($v->id_produk == 994) {
                        $v->cek_diskon3 = (40 / 100 * ($v->price - ($v->cek_diskon + $v->cek_diskon2)));
                    } else {
                        $v->cek_diskon3 = 0;
                    }

                    $v->diskon_real = $v->cek_diskon + $v->cek_diskon2 + $v->cek_diskon3;

                    $v->price_diskon = $v->price - $v->diskon_real;
                    $v->total = $v->price_diskon * $v->quantity;

                    $items_fix[] = $v;
                }
            }
        }

        session(['items_fix' => $items_fix]);
        // dd($items_fix);

        // function cek dan hitung diskon

        return view('frontend.checkoutToko')
            ->with('kategori', $kategori)
            ->with('provinsi', $provinsi)
            ->with('jasa_kirim', $jasa_kirim)
            ->with('biaya_layanan', $biaya_layanan)
            ->with('items_fix', $items_fix);
    }
    
    // review checkout toko
    public function reviewPaymentToko(Request $request) {
        $kategori = TbMasterKategori::all();
        
        $items_fix = session('items_fix');
        $keterangan = $request->all();
        
        $total_price = 0;
        $total_quantity = 0;
        $total_diskon = 0;
        $total_price_diskon = 0;

        $items = array();
        $doremi = array();
        $musika = array();
        
        if($items_fix!=null){
            foreach ($items_fix as $k => $v) {
                $produk = TbProduk::find($v->id_produk);

                $total_price += $v->price;
                $total_quantity += $v->quantity;
                $total_diskon += $v->diskon;
                $total_price_diskon += $v->total;

                $data = new stdClass();
                $data->id = $v->id;
                $data->name = $v->name;
                $data->id_produk = $produk->id;
                $data->price = $v->price;
                $data->quantity = $v->quantity;
                $data->id_sub_kategori = $produk->id_sub_kategori;
                $data->diskon = $v->diskon;
                $data->note = $request->note[$k];

                if ($produk->label_owner == 'DOREMI') {
                    $diskon_cash = $v->price_diskon;
                    $data->diskon_cash = 0;

                    $data->price_diskon = $diskon_cash;
                    $data->total = $diskon_cash * $v->quantity;
    
                    array_push($doremi, $data);
                    array_push($items, $data);
                } elseif ($produk->label_owner == 'MUSIKA') {
                    if ($request->payment_term == 'cash') {
                        // if ($key->qty == 1) {
                        //     $diskon_1 = $key->price - $key->price * 30 / 100;
                        //     $diskon_2 = $diskon_1 - $diskon_1 * 10 / 100;
                        //     $diskon_3 = $diskon_2 - $diskon_2 * 10 / 100;
                        // } else {
                            $diskon_cash = $v->price_diskon - $v->price_diskon * 10 / 100;
                            $data->diskon_cash = 10;
                            // $diskon_3 = $diskon_2 - $diskon_2 * 10 / 100;
                        // }
                    // } elseif ($payment_term == 'tempo') {
                    } else {
                        // if ($key->qty == 1) {
                        //     $diskon_1 = $key->price - $key->price * 30 / 100;
                        //     $diskon_2 = $diskon_1 - $diskon_1 * 10 / 100;
                        // } else {
                        //     $diskon_2 = $key->price - $key->price * 10 / 100;
                        // }
                        $diskon_cash = $v->price_diskon;
                        $data->diskon_cash = 0;
                    }
    
                    $data->price_diskon = $diskon_cash;
                    $data->total = $diskon_cash * $v->quantity;
    
                    array_push($musika, $data);
                    array_push($items, $data);
                } elseif ($produk->label_owner == 'DOREMI MUSIKA') {
                    $data->diskon_cash = 0;
                    $data->price_diskon = $v->price_diskon;
                    $data->total = $v->total;
    
                    array_push($musika, $data);
                    array_push($items, $data);
                }
            }
        
        }
        session(['doremi' => $doremi]);
        session(['musika' => $musika]);

        // // midtrans
        // $midtrans = new Midtrans;
        // // Populate items

        // $subtotal = 0;
        // foreach ($items as $v) {
        //     $subtotal += $v->total;
        // }

        //     $biaya_cc = TbBiayaLayanan::where('nama', 'Credit Card')->first();
        //     $layanan = new stdClass();
        //     $layanan->id = $biaya_cc->id;

        //         // if (!empty($biaya_layanan->biaya_tambahan)) {
        //             $layanan->price = ceil($subtotal * $biaya_cc->biaya / 100 + $biaya_cc->biaya_tambahan);
        //         // } else {
        //         //     $layanan->price = ceil($subtotal * $biaya_layanan->biaya / 100);
        //         // }
        //     // dd($layanan->price);
        //     $layanan->quantity = 1;
        //     $layanan->name = "Biaya Layanan";

        //     $subtotal += ceil($layanan->price);
        //     $data_layanan_price = ceil($layanan->price);

        //     array_push($items, $layanan);
        // // dd($items);
        // // dd($subtotal);
        $rand = rand(111111,999999);
        // $transaction_details = array(
        //     'order_id'      => $rand,
        //     'gross_amount'  => $subtotal
        // );

        // $toko = TbToko::where('id_user', Auth::id())->first();
        // // dd($toko);
        // $nama_pemilik = explode(" ", $toko->nama_pemilik);
        // // Populate customer's billing address
        // $billing_address = array(
        //     'first_name'    => $nama_pemilik[0],
        //     'last_name'     => $nama_pemilik[1],
        //     'address'       => $toko->alamat,
        //     'city'          => $toko->kota,
        //     'postal_code'   => $toko->kode_pos,
        //     'phone'         => $toko->no_handphone,
        //     'country_code'  => 'IDN'
        //     );
        
        //     $shipping_address = array(
        //         'first_name'    => $nama_pemilik[0],
        //         'last_name'     => $nama_pemilik[1],
        //         'address'       => $toko->alamat,
        //         'city'          => $toko->kota,
        //         'postal_code'   => $toko->kode_pos,
        //         'phone'         => $toko->no_handphone,
        //         'country_code'  => 'IDN'
        //         );

        //     // Populate customer's Info
        //     $customer_details = array(
        //         'first_name'    => $nama_pemilik[0],
        //         'last_name'     => $nama_pemilik[1],
        //         'email'           => $toko->email,
        //         'phone'           => $toko->no_handphone,
        //         'billing_address' => $billing_address,
        //         'shipping_address'=> $shipping_address
        //         );
        // // dd($shipping_address);

        // // Data yang akan dikirim untuk request redirect_url.
        // $credit_card['secure'] = true;
        // //ser save_card true to enable oneclick or 2click
        // //$credit_card['save_card'] = true;

        // $time = time();
        // $custom_expiry = array(
        //     'start_time' => date("Y-m-d H:i:s O",$time),
        //     'unit'       => 'day',
        //     'duration'   => 1
        // );
        
        // $transaction_data = array(
        //     'transaction_details'=> $transaction_details,
        //     'item_details'       => $items,
        //     'customer_details'   => $customer_details,
        //     'credit_card'        => $credit_card,
        //     'expiry'             => $custom_expiry
        // );

        // $snap_token = $midtrans->getSnapToken($transaction_data);
        // // midtrans

        // // kredivo
        // if(!empty($harga)) {
        //     $harga_tertinggi = max($harga);
        //     if ($harga_tertinggi >= 1500000) {
        //         $myArr = array(
        //             'server_key' => "mGephdrspSk6t3SCZDKFpYDxEnmJga",
        //             'amount' => $subtotal,
        //             'items' => $items
        //         );

        //         // dd($subtotal);
        //         // dd(json_encode($myArr));
        //         $response = Curl::to('https://sandbox.kredivo.com/kredivo/v2/payments')
        //             ->withContentType('application/json')
        //             ->withHeader('Accept: application/json')
        //             ->withData( $myArr )
        //             ->asJson()
        //             ->post();
        //     }
        // }
        // // kredivo
        // dd($musika);
        if ($request->id_cms_privileges == 8) {
            // dd($doremi);

            $now = Carbon::now('Asia/Jakarta');
            $date = Carbon::parse($now)->format('Y-m-d H:i:s');

            $order_teacher = new TbOrderTeacher;
            $order_teacher->tanggal_order = $date;

                $cek_order_teacher = TbOrderTeacher::latest()->first();
                
                if ($cek_order_teacher == null) {
                        $order_teacher->no_order =  'RTL'.'/'.'TCR'.'/'.'00001';
                } else {
                        $explode = explode('/', $cek_order_teacher->no_order);
                        $next_no = $explode[2] + 1;

                        $order_teacher->no_order =  'RTL'.'/'.'TCR'.'/'.sprintf("%05d", $next_no);
                }

                if($cek_order_teacher) {
                    $explode = explode('/', $cek_order_teacher->no_invoice);
                    $next_no = $explode[4] + 1;

                    $order_teacher->no_invoice = 'INV/TCR/'.date('m').'/'.date('y') . '/' . sprintf("%05d", $next_no);
                } else {
                    $order_teacher->no_invoice = 'INV/TCR/'.date('m').'/'.date('y').'/00001';
                }

            $order_teacher->unique_invoice = $rand;
            $order_teacher->keterangan = $request->keterangan_customer;
            $order_teacher->metode_bayar = $request->metode_bayar_customer;
            $order_teacher->status = 'Hold';
            $order_teacher->order_by = Auth::id();
            $order_teacher->nama_customer = $request->nama_customer;
            $order_teacher->email_customer = $request->email_customer;
            $order_teacher->phone_customer = $request->phone_customer;
            $order_teacher->alamat_customer = $request->alamat_customer;
            $order_teacher->timestamps = true;
            $order_teacher->save();

            if ($order_teacher) {
                foreach ($doremi as $v) {
                    $order_teacher_detail = new TbOrderDetailTeacher;
                    $order_teacher_detail->id_order = $order_teacher->id;
                    $order_teacher_detail->id_produk = $v->id_produk;
                    $order_teacher_detail->qty = $v->quantity;
                    $order_teacher_detail->harga_satuan = $v->price;
                    $order_teacher_detail->diskon = $v->diskon;
                    $order_teacher_detail->total = $v->total;

                    $order_teacher_detail->reward_percent = 2;
                    $order_teacher_detail->reward_total = $v->total * (2/100); // saat ini hanya dua %

                    $order_teacher_detail->timestamps = true;
                    $order_teacher_detail->save();

                    $total_teacher += $order_teacher_detail->total;
                    $total_reward_teacher += $order_teacher_detail->reward_total;
                }
            }

            $data = TbOrderTeacher::where('order_by', Auth::id())->latest()->first();
                // dd($total);
            $data->total_bayar = $total_teacher;
            $data->total_reward = $total_reward_teacher;
            $data->save();

            return redirect('frontend/invoice/'.$order_teacher->unique_invoice.'?type=t');
        } else {
            return view('frontend.reviewToko')
                ->with('rand', $rand)
                ->with('snap_token', $snap_token)
                ->with('response', $response)
                ->with('doremi', $doremi)
                ->with('musika', $musika)
                ->with('data', $data)
                ->with('keterangan', $keterangan)
                ->with('kategori', $kategori);
        }
    }

    // payment toko
    public function paymentGatewayToko(Request $request) {
        // dd($request->all());
        $data_doremi = json_decode($request->doremi, true);
        $data_musika = json_decode($request->musika, true);
        // dd($data_doremi);
        $randominvoice = $request->rand;
        $payment_term = $request->payment_term;
        $jasa_kirim = $request->jasa_kirim;
        $kota_tujuan = $request->kota_tujuan;
        // $catatan = $request->note;
        $payment_type = $request->button_bayar;
        $bayar_ditempat = $request->bayar_ditempat;
        $status = $request->status;
        
        $now = Carbon::now('Asia/Jakarta');
        $date = Carbon::parse($now)->format('d-F-Y H:i:s');
        $toko = TbToko::where('id_user', Auth::id())->first();
        // dd($randominvoice);
        if (!empty($data_doremi)) {
            $order = TbOrderWholesale::where('id_customer', $toko->id)
            ->where('order_to', 'DOREMI')->latest()->first();
            
            $cek_order = TbOrderWholesale::where('order_to', 'DOREMI')->latest()->first();

            $dummy_no_invoice = 'INV/DRM/'.date('m').'/'.date('y').'/00001';
            $cek_no_invoice = TbOrderWholesale::where('no_invoice', $dummy_no_invoice)->latest()->first();

            $wholesale = new TbOrderWholesale;

            if($cek_no_invoice) {
                $explode = explode('/', $cek_order->no_invoice);
                $next_no = $explode[4] + 1;

                $wholesale->no_invoice = 'INV/DRM/'.date('m').'/'.date('y') . '/' . sprintf("%05d", $next_no);
            } else {
                $wholesale->no_invoice = $dummy_no_invoice;
            }

            $wholesale->unique_invoice = $randominvoice;
            $wholesale->order_to = 'DOREMI';
            $wholesale->tanggal = $date;
            $wholesale->id_sales = $toko->id_sales;
            $wholesale->id_customer = $toko->id;
            $wholesale->payment_terms = $payment_term;
            $wholesale->payment_type = $payment_type;
            $wholesale->jasa_kirim = $jasa_kirim;
            $wholesale->kota_tujuan = $kota_tujuan;
            $wholesale->tarif_ongkir = 0;
            $wholesale->bayar_ditempat = $bayar_ditempat;
            // $wholesale->note = $catatan;
            $wholesale->status = $status;
            $wholesale->timestamps = true;
            $so = TbOrderWholesale::where('order_to', 'DOREMI')->latest()->first();
            // dd($so);
            if ($so['no_so'] == null) {
                    $wholesale->no_so = 'WS'.'/'.'DRM'.'/'.'00001';
                    // $wholesale->save();
            } else {
                    $explode = explode('/', $so['no_so']);
                    $next_no = $explode[2] + 1;

                    $wholesale->no_so = 'WS'.'/'.'DRM'.'/'.sprintf("%05d", $next_no);
                    // $wholesale->save();
            }
            $wholesale->save();


            foreach ($data_doremi as $v) {
                $produk = TbProduk::find($v['id_produk']);

                $detail = new TbOrderWholesaleDetail;
                $detail->id_order = $wholesale->id;
                $detail->id_produk = $produk->id;
                $detail->harga_satuan = $v['price'];
                $detail->qty = $v['quantity'];

                $diskon_explode = explode("+", $v['diskon']);
                $detail->diskon_1 = (int) $diskon_explode['0'];
                $detail->diskon_2 = (int) $diskon_explode['1'];

                if (!empty($diskon_explode['2'])) {
                    $detail->diskon_3 = (int) $diskon_explode['2'];    
                }
                
                $detail->status = "Hold";
                $detail->note = $v['note'];

                $detail->jumlah_total = $v['total'];
                $detail->timestamps = true;
                $detail->save();

                $total_doremi += $detail->jumlah_total;
            }

            $data = TbOrderWholesale::where('id_customer', $toko->id)
                ->where('order_to', 'DOREMI')->latest()->first();
                // dd($total);
            $data->total_bayar = $total_doremi;
            $data->save();

            $to = "tesalonicamichiko@gmail.com";
            Mail::send('frontend.print.mailso', ['data' => 'data', 'to' => $to], function ($message) use ($data, $to) {
                $message->to($to);
                $message->from('administrator@doremimusik.com');
                $message->subject('Notifikasi Sales Order');
            });

        }
        // dd($data);
        if (!empty($data_musika)) {
            $order = TbOrderWholesale::where('id_customer', $toko->id)
                ->where('order_to', 'MUSIKA')->latest()->first();

            $cek_order = TbOrderWholesale::where('order_to', 'MUSIKA')->latest()->first();

            $dummy_no_invoice = 'INV/MIJ/'.date('m').'/'.date('y').'/00001';
            $cek_no_invoice = TbOrderWholesale::where('no_invoice', $dummy_no_invoice)->latest()->first();

            $wholesale = new TbOrderWholesale;

            if($cek_no_invoice) {
                $explode = explode('/', $cek_order->no_invoice);
                $next_no = $explode[4] + 1;
                
                $wholesale->no_invoice = 'INV/MIJ/'.date('m').'/'.date('y') . '/' . sprintf("%05d", $next_no);
            } else {
                $wholesale->no_invoice = $dummy_no_invoice;
            }
            
            $wholesale->unique_invoice = $randominvoice;
            $wholesale->order_to = 'MUSIKA';
            $wholesale->tanggal = $date;
            $wholesale->id_sales = $toko->id_sales;
            $wholesale->id_customer = $toko->id;
            $wholesale->payment_terms = $payment_term;
            $wholesale->payment_type = $payment_type;
            $wholesale->jasa_kirim = $jasa_kirim;
            $wholesale->kota_tujuan = $kota_tujuan;
            $wholesale->tarif_ongkir = 0;
            $wholesale->bayar_ditempat = $bayar_ditempat;
            // $wholesale->note = $catatan;
            $wholesale->status = $status;
            $wholesale->timestamps = true;
            $so = TbOrderWholesale::where('order_to', 'MUSIKA')->latest()->first();
            if ($so['no_so'] == null) {
                    $wholesale->no_so = 'WS'.'/'.'MIJ'.'/'.'00001';
                    $wholesale->save();
            } else {
                    $explode = explode('/', $so['no_so']);
                    $next_no = $explode[2] + 1;

                    $wholesale->no_so = 'WS'.'/'.'MIJ'.'/'.sprintf("%05d", $next_no);
                    $wholesale->save();
            }
            $wholesale->save();

            // dd($order);
            foreach ($data_musika as $v) {
                $produk = TbProduk::find($v['id_produk']);
                
                // dd($v['diskon']);
                $detail = new TbOrderWholesaleDetail;
                $detail->id_order = $wholesale->id;
                $detail->id_produk = $produk->id;
                $detail->harga_satuan = $v['price'];
                $detail->qty = $v['quantity'];

                $diskon_explode = explode("+", $v['diskon']);
                $detail->diskon_1 = (int) $diskon_explode['0'];
                $detail->diskon_2 = (int) $diskon_explode['1'];

                if (!empty($diskon_explode['2'])) {
                    $detail->diskon_3 = (int) $diskon_explode['2'];
                } else {
                    if($v['diskon_cash'] != 0) {
                        $detail->diskon_3 = $v['diskon_cash'];
                    }
                }

                $detail->status = "Hold";
                $detail->note = $v['note'];
                $detail->jumlah_total = $v['total'];
                $detail->timestamps = true;
                $detail->save();

                $total_musika += $detail->jumlah_total;
            }

            $data = TbOrderWholesale::where('id_customer', $toko->id)
                ->where('order_to', 'MUSIKA')->latest()->first();
                // dd($total);
            $data->total_bayar = $total_musika;
            $data->save();

            $to = "anggikumalaa@gmail.com";
            Mail::send('frontend.print.mailso', ['data' => 'data', 'to' => $to], function ($message) use ($data, $to) {
                $message->to($to);
                $message->from('administrator@doremimusik.com');
                $message->subject('Notifikasi Sales Order');
            });

        }

        // email
        // $order_doremi = TbOrderWholesale::where('id_customer', $toko->id)->where('no_invoice', $randominvoice)->where('order_to', 'DOREMI')->first();
        // $order_doremi['detail'] = TbOrderWholesaleDetail::where('id_order', $order_doremi->id)->get();

        // $order_musika = TbOrderWholesale::where('id_customer', $toko->id)->where('no_invoice', $randominvoice)->where('order_to', 'MUSIKA')->first();
        // $order_musika['detail'] = TbOrderWholesaleDetail::where('id_order', $order_musika->id)->get();
        
        // $cms_user = DB::table('cms_users')->where('id', Auth::id())->first();
        // Mail::send('frontend.invoice_email',  ['order_doremi' => $order_doremi, 'order_musika' => $order_musika, 'cms_user' => $cms_user, 'toko' => $toko], function($message) use ($order_doremi, $order_musika, $cms_user, $toko) {
        //         $message->to($cms_user->email, 'doremi.ecomm@gmail.com');
        //         $message->from('no-reply@doremi.com');
        //         $message->subject('Invoice');
        // });
        // email

        Cart::destroy();
        session()->forget('items_fix');
        session()->forget('doremi');
        session()->forget('musika');

        // if ($payment_type == 'Bank Transfer') {
            return redirect('frontend/invoice/'.$randominvoice.'?type=s');
        // } elseif ($payment_type == 'Credit Card') {
        //     return $randominvoice;
        // }
    }

    // invoice toko
    public function invoice(Request $request, $random_invoice) {
        // dd($id_order_wholesale);
        // doremi
        $toko = TbToko::where('id_user', Auth::id())->first();
        $type = $_GET['type'];
        // dd($type);
        if ($type == 't') {
            $order_doremi = TbOrderTeacher::where('order_by', Auth::id())->where('no_invoice', $random_invoice)->orWhere('unique_invoice', $random_invoice)->first();
            $order_doremi['detail'] = TbOrderDetailTeacher::where('id_order', $order_doremi->id)->get();
        } else {

            // $order_doremi = TbOrderWholesale::where('id_customer', $toko->id)->where('no_invoice', $random_invoice)->orWhere('unique_invoice', $random_invoice)->where('order_to', 'DOREMI')->first();
            // $order_doremi['detail'] = TbOrderWholesaleDetail::where('id_order', $order_doremi->id)->get();
            
            $order_doremi = \DB::select("SELECT tbowd.*,tbow.payment_terms,tbow.total_bayar,tbow.no_invoice,tbow.no_so,tbow.status,tbow.note,tbow.tanggal  
                                        FROM tb_order_wholesales as tbow
                                        LEFT JOIN tb_order_wholesale_details as tbowd ON tbowd.id_order = tbow.id
                                        WHERE tbow.id_customer='$toko->id' and tbow.no_invoice='$random_invoice' 
                                        OR tbow.unique_invoice='$random_invoice' and tbow.order_to='DOREMI' ");


            // $order_musika = TbOrderWholesale::where('id_customer', $toko->id)->where('no_invoice', $random_invoice)->orWhere('unique_invoice', $random_invoice)->where('order_to', 'MUSIKA')->first();
            // $order_musika['detail'] = TbOrderWholesaleDetail::where('id_order', $order_musika->id)->get();

            $order_musika = \DB::select("SELECT tbowd.*,tbow.payment_terms,tbow.total_bayar,tbow.no_invoice,tbow.no_so,tbow.status,tbow.note,tbow.tanggal 
                                        FROM tb_order_wholesales as tbow
                                        LEFT JOIN tb_order_wholesale_details as tbowd ON tbowd.id_order = tbow.id
                                        WHERE tbow.id_customer='$toko->id' and tbow.no_invoice='$random_invoice' 
                                        OR tbow.unique_invoice='$random_invoice' and tbow.order_to='MUSIKA' ");
        }

        $bank_musika = TbMasterAkunBank::where('deskripsi', 'MUSIKA');
        $bank_doremi = TbMasterAkunBank::where('deskripsi', 'DOREMI');

        // dd($order_doremi);

        return view('frontend.invoice')
            ->with('order_doremi', $order_doremi)
            ->with('bank_doremi', $bank_doremi)
            ->with('order_musika', $order_musika)
            ->with('bank_musika', $bank_musika)
            ->with('toko', $toko)
            ->with('type', $type);
    }

    public function invoiceBank(Request $request, $no_invoice, $label) {
        // dd($id_order_wholesale);
        // doremi
        $toko = TbToko::where('id_user', Auth::id())->first();

        $order_doremi = TbOrderWholesale::where('id_customer', $toko->id)->where('no_invoice', $no_invoice)->where('order_to', $label)->first();
        $order_doremi->payment_type = $_GET['metode'];
        $order_doremi->save();

        $order_doremi['detail'] = TbOrderWholesaleDetail::where('id_order', $order_doremi->id)->get();

        return view('frontend.invoice_bank')
            ->with('order_doremi', $order_doremi)
            ->with('toko', $toko);
    }

    public function konfirmasi(Request $request) {
        $kategori = TbMasterKategori::all();

        return view('frontend.konfirmasi')
            ->with('kategori', $kategori);
    }

    public function SubmitKonfirmasi(Request $request) {
        $data = $request->all();
        // dd($request->all());

        $bayar = new TbKonfirmasiBayar;
        $bayar->nama = $request->nama;
        $bayar->email = $request->email;
        $bayar->tanggal_bayar = Carbon::parse($request->tanggal_bayar)->format('d-F-Y');
        $bayar->jumlah_bayar = $request->jumlah_bayar;
        $bayar->bank_tujuan = $request->bank_tujuan;
        $bayar->nama_rekening_pengirim = $request->nama_rekening_pengirim;
        $bayar->no_invoice = $request->no_invoice;
        $bayar->catatan = $request->catatan;
        // if ($request->hasFile('image')){ 
        //    // processing codes 
        // $name = $request->no_invoice.'.'.$request->image->getClientOriginalExtension();
        // // dd($name);
        // $image = $request->image->move(public_path('/konfirmasi'), $name);
        // $bayar->file = $image;
        // }
        $date = date('Y-m');
        // dd($date);
        $nama_file = $request->no_invoice;
        $file = $request->file('image');
        $path = $file->store('uploads/1/'.$date);
        $bayar->file = $path;
        $bayar->save();

        // Mail::send('frontend.invoice_email',  ['data' => $data,'wholesale' => $wholesale, 'detail' => $detail, 'toko' => $toko], function($message) use ($wholesale,$detail,$toko) {
        //         $message->to($toko->email);
        //         $message->from('no-reply@doremi.com');
        //         $message->subject('Invoice');
        // });

        return redirect('frontend/home');
    }
}