<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

use Artisaninweb\SoapWrapper\SoapWrapper;
use App\Soap\Request\GetConversionAmount;
use App\Soap\Response\GetConversionAmountResponse;

use Carbon\Carbon;
use Ixudra\Curl\Facades\Curl;
use stdClass;

use App\Models\TbMasterProvinsi;
use App\Models\TbMasterKota;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function apiRex(Request $request) {
        $password = "DOREMIAPI";

        $test = array(
            'customer_id' => "1440000005", 
            'customer_password' => md5($password),
            'zip_origin' => "15710",
            'zip_destination' => "15810",
            'weight' => 1200
        );

        $json = json_encode($test);
        // dd($json);

        $response = Curl::to('https://api.rex.co.id/KonosWs/v2/GetRate.aspx')
            ->withContentType('application/json')
            ->withHeader('Accept: application/json')
            ->withData( $json )
            ->asJson()
            ->post();

        dd($response);
    }

    public function apiRpx(SoapWrapper $soapWrapper, $kodepos) {
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

        // $data = json_decode($response, true);
        
        return $response;

    }

    public function KodePos(Request $request) {
        $curl_provinsi = Curl::to('https://kodepos-2d475.firebaseio.com/list_propinsi.json?print=pretty')
                ->get();
        $provinsi = json_decode($curl_provinsi, true);

        foreach ($provinsi as $key => $value) {
            $curl_kota = Curl::to('https://kodepos-2d475.firebaseio.com/list_kotakab/'.$key.'.json?print=pretty')
                ->get();

            $kota = json_decode($curl_kota, true);

            echo $key .' - '.$value.'<br>';

            foreach ($kota as $k => $v) {
                $curl_kodepos = Curl::to('https://kodepos-2d475.firebaseio.com/kota_kab/'.$k.'.json?print=pretty')
                ->get();

                $kode_pos = json_decode($curl_kodepos, true);

                echo $k .' - '.$v.'<br>';

                foreach (array_unique($kode_pos) as $ke => $val) {
                    echo $val['kodepos'].'<br>';
                }

                echo "<br>";
            }

            echo "<br>";
        }
    }

    public function ApiRajaOngkir(Request $request) {

    	$response = Curl::to('https://api.rajaongkir.com/starter/city')
	        ->withHeader('key: b6f6a4aad376eaa447b9af670cf2b040')
	        ->get();

	    $listData = array();

	    $arrayResponse = json_decode($response, true);

	    $tempList = $arrayResponse['rajaongkir']['results'];

	    foreach ($tempList as $value) {
            //bikin object baru
            $data = new stdClass();
            $data->id_kota = $value['city_id']; //id kotanya
            $data->nama_kota = $value['city_name']; //nama kotanya
            $data->id_provinsi = $value['province_id'];
            $data->nama_provinsi = $value['province'];
            $data->tipe = $value['type'];
            $data->kode_pos = $value['postal_code'];

            array_push($listData, $data); //push object kota yang kita bikin ke array yang nampung list kota

        }

        foreach ($listData as $datas) {

        	$cek = TbMasterProvinsi::where('id_provinsi', $datas->id_provinsi)->first();

        	$kota = new TbMasterKota;

        	if (count($cek) == 0) {

	        	$provinsi = new TbMasterProvinsi;
	        	$provinsi->id_provinsi = $datas->id_provinsi;
	        	$provinsi->nama = $datas->nama_provinsi;
	        	$provinsi->timestamps = true;
	        	$provinsi->save();

	        	$kota->id_primary = $provinsi->id;

	        } else {

	        	$kota->id_primary = $cek->id;

	        }

        	$kota->id_kota = $datas->id_kota;
        	$kota->nama = $datas->nama_kota;
        	$kota->tipe = $datas->tipe;
        	$kota->kode_pos = $datas->kode_pos;
        	$kota->id_provinsi = $datas->id_provinsi;
        	$kota->timestamps = true;
        	$kota->save();

        }

        return "ok";
    }


    public function pageDoku() {
        $data = array(
            'shared_key' => 'u6F7W6r6W8f2',
            'mall_id' => '10853559',
            'amount' => '100000',
            'trans_id' => 'inv111'
        );

        $words = sha1($data['amount'] + $data['mall_id'] + $data['shared_key'] + $data['trans_id']);

        return view('testpage-doku')
            ->with('data', $data)
            ->with('words', $words);
    }

}
