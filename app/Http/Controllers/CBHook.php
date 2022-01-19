<?php 
namespace App\Http\Controllers;

use DB;
use Session;
use Request;
use App\Models\TbMasterAkunBank;
use App\Models\TbArtikel;
use App\Models\TbBannerCarousel;
use App\Models\TbProduk;
use App\Models\TbGambarProduk;
use App\Models\TbMasterKupon;
use App\Models\TbOrder;
use App\Models\TbOrderDetail;
use App\Models\TbOrderCheck;
use App\Models\TbToko;
use App\Models\TbOrderWholesale;
use App\Models\TbOrderWholesaleDetail;
use App\Models\TbCustomer;
use App\Models\TbOrderTeacher;
use App\User;

use Mail;
use Auth;
use Spatie\ArrayToXml\ArrayToXml;
use crocodicstudio\crudbooster\helpers\CRUDBooster;

class CBHook extends Controller
{

	/*
	| --------------------------------------
	| Please note that you should re-login to see the session work
	| --------------------------------------
	|
	 */
	public function afterLogin()
	{

	}

	public function setTglKirim($id, $date, Request $request) {
		$order = TbOrderWholesale::find($id);
		$order->tanggal_kirim = $date;
		$order->save();

		CRUDBooster::redirect('/admin/tb_order_wholesales?label='.strtolower($order->order_to),'Tanggal Kirim Berhasil di Update','success');
		exit();
	}

	// toko
	public function printSo($no_invoice)
	{
		$label = strtoupper(g('label'));

		$order = TbOrderWholesale::where('id', $no_invoice)
						->where('order_to', $label)
						->first();
		$order['detail'] = TbOrderWholesaleDetail::where('id_order', $order->id)->get();
		$total_order = $order['detail']->sum('jumlah_total');
		
		$toko = TbToko::where('id', $order->id_customer)->first();
		
		if ($order->order_to == "DOREMI") {
			$bank = TbMasterAkunBank::where('deskripsi', 'DOREMI')->get();
			// dd($bank);
		} elseif ($order->order_to == "MUSIKA") {
			$bank = TbMasterAkunBank::where('deskripsi', 'MUSIKA')->get();
		}

		return view('frontend.print.so')
			->with('order', $order)
			->with('bank', $bank)
			->with('toko', $toko)
			->with('total_order', $total_order);
	}

	// umum
	public function printSoUser($no_order)
	{
		$order = TbOrder::where('no_so', $no_order)->first();
		// dd($order);

		// $kurir = TbOrderCheck::where('id_order', $order->id)->get();
		// dd($kurir);
		$customer = TbCustomer::where('id', $order->id_customer)->first();
		// dd($toko);

		$order['detail'] = TbOrderDetail::where('id_order', $order->id)->get();

		if ($order->so_to == "DOREMI") {
			$bank = TbMasterAkunBank::where('deskripsi', 'DOREMI')->get();
			// dd($bank);
		} elseif ($order->so_to == "MUSIKA") {
			$bank = TbMasterAkunBank::where('deskripsi', 'MUSIKA')->get();
		}

		return view('frontend.print.so_user')
			->with('order', $order)
			->with('kurir', $kurir)
			->with('bank', $bank)
			->with('customer', $customer);
	}

	public function exportSoXml($no_invoice)
	{
		// $array = [
		// 	'HEADER' => [
		// 		'TALLYREQUEST' => 'Import Data'
		// 	],
		// 	'BODY' =>[
		// 		'IMPORTDATA' =>[
		// 			'REQUESTDES' => [
		// 				'REPORTNAME' => 'Voucers',
		// 				'STATICVARIABLES' =>[
		// 					'SVCURRENTCOMPANY' => 'PT. Musika Indonesia Jaya'
		// 				],
		// 			],
		// 			'TALLYMESSAGE' =>[
		// 				'VOUCER' => [
		// 					'ADDRESS.LIST' =>[
		// 						'ADDRESS' => 'RUKO VILLA PERMATA BLOK C1 NO.11'
		// 					],
		// 					'BASICBUYERADDRESS.LIST' =>[
		// 						'BASICBUYERADDRESS' => 'RUKO VILLA PERMATA BLOK C1 NO.11'
		// 					],
		// 					'BASICORDERTERMS.LIST' =>[
		// 						'BASICORDERTERMS' => 'Ecomm'
		// 					],
		// 					'OLDAUDITENTRYIDS.LIST' =>[
		// 						'OLDAUDITENTRYIDS' => '-1'
		// 					],
		// 					'DATE' =>'20181126',
		// 					'GUID' => '5b84a82f-0d6d-484f-af88-c4014bab7de4-00002fe6',
		// 					'PRICELEVEL' => 'Price List',
		// 					'PARTYNAME' => 'DOREMI',
		// 					'VOUCERTYPENAME' => 'Sales Order',
		// 					'REFERENCE' => 'SO/MIJ/18/XI/0076',
		// 					'VOUCERNUMBER' => 'SO/MIJ/18/XI/0076',
		// 					'PARTYLEDGERNAME' => 'DOREMI',
		// 					'BASICBASEPARTYNAME' => 'DOREMI',
		// 					'CSTFORMISSUETYPE' => '',
		// 					'CSTFORMRECVTYPE' => '',
		// 					'FBTPAYMENTTYPE' => 'Default',
		// 					'PERSISTEDVIEW' => 'Invoice Voucer View',
		// 					'BASICBUYERNAME' => 'DOREMI',
		// 					'BASICFINALDESTINATION' => 'Ecomm',
		// 					'BASICORDERREF' => 'Podl18110021',
		// 					'BASICDUEDATEOFPYMT' => '14 Days',
		// 					'VCHGSTCLASS' => '',
		// 					'COSTCENTRENAME' => 'Andrian Harli',
		// 					'ENTEREDBY' => 'anggi',
		// 					'DIFFACTUALQTY' => 'Yes',
		// 					'ISMSTFROMSYNC' => 'No',
		// 					'ASORIGINAL' => 'No',
		// 					'AUDITED' => 'No',
		// 					'FORJOBCOSTING' => 'No',
		// 					'ISOPTIONAL' => 'No',
		// 					'EFFECTIVEDATE' => '20181126',
		// 					'USEFOREXCISE' => 'No',
		// 					'ISFORJOBWORKIN' => 'No',
		// 					'ALLOWCONSUMPTION' => 'No',
		// 					'USEFORINTEREST' => 'No',
		// 					'USEFORGAINLOSS' => 'No',
		// 					'USEFORGODOWNTRANSFER' => 'No',
		// 					'USEFORCOMPOUND' => 'No',
		// 					'USEFORSERVICETAX' => 'No',
		// 					'ISEXCISEVOUCHER' => 'No',
		// 					'EXCISETAXOVERRIDE' => 'No',
		// 					'USEFORTAXUNITTRANSFER' => 'No',
		// 					'EXCISEOPENING' => 'No',
		// 					'USEFORFINALPRODUCTION' => 'No',
		// 					'ISTDSOVERRIDDEN' => 'No',
		// 					'ISTCSOVERRIDDEN' => 'No',
		// 					'ISTDSTCSCASHVCH' => 'No',
		// 					'INCLUDEADVPYMTVCH' => 'No',
		// 					'ISSUBWORKSCONTRACT' => 'No',
		// 					'ISVATOVERRIDDEN' => 'No',
		// 					'IGNOREORIGVCHDATE' => 'No',
		// 					'ISSERVICETAXOVERRIDDEN' => 'No',
		// 					'ISISDVOUCHER' => 'No',
		// 				],
		// 			],
		// 		],
		// 	],
		// ];

		// $result = ArrayToXml::convert($array,'ENVELOPE');

		// return response::make($result, 200)->header('Content-Type', 'application/xml');

		// return Response($result)
  //           ->withHeaders([
  //               'Content-Type' => "application/xml",
  //               'Content-Disposition' => 'attachment;filename=tes.xml',
  //           ]);
		$data['order'] = TbOrderWholesale::where('no_invoice', $no_invoice)->first();

		$data['orderWholesale'] = TbOrderWholesaleDetail::where('id_order',$data['order']->id)
			->leftJoin('tb_produks','tb_order_wholesale_details.id_produk','=','tb_produks.id')
			->get();

		// dd($data['orderWholesale']);

		if ($data['order']->order_to == 'DOREMI') {
			
			$data['orderPT'] = "DOREMI MUSIK INDONESIA";
			$data['orderUser'] = "tessa";
		}else{

			$data['orderPT'] = "MUSIKA INDONESIA JAYA";
			$data['oderUser'] = "anggi";


		}

		return response()->view('frontend.print.soXML',$data)
				->withHeaders([
                'Content-Type' => "application/xml",
                // 'Content-Disposition' => 'attachment;filename='.$data['order']->no_so.'.xml',
            ]);

	}
	// Artikel
	public function SetAktifArtikel($id)
	{
		$artikel = TbArtikel::find($id);
		$artikel->status = 'Aktif';
		$artikel->save();

		return redirect()->back();
	}

	public function SetTidakAktifArtikel($id)
	{
		$artikel = TbArtikel::find($id);
		$artikel->status = 'Tidak Aktif';
		$artikel->save();

		return redirect()->back();
	}
	// Artikel

	// Banner
	public function SetAktifBanner($id)
	{
		$artikel = TbBannerCarousel::find($id);
		$artikel->status = 'Aktif';
		$artikel->save();

		return redirect()->back();
	}

	public function SetTidakAktifBanner($id)
	{
		$artikel = TbBannerCarousel::find($id);
		$artikel->status = 'Tidak Aktif';
		$artikel->save();

		return redirect()->back();
	}
	// Banner

	// produk
	public function SetAktifProduk($id)
	{
		$artikel = TbProduk::find($id);
		$artikel->status = 'Aktif';
		$artikel->save();

		return redirect()->back();
	}

	public function SetTidakAktifProduk($id)
	{
		$artikel = TbProduk::find($id);
		$artikel->status = 'Tidak Aktif';
		$artikel->save();

		return redirect()->back();
	}
	// produk

	// gambar
	public function SetYesGambar($id)
	{
		$artikel = TbGambarProduk::find($id);
		$artikel->gambar_utama = 1;
		$artikel->save();

		return redirect()->back();
	}

	public function SetNoGambar($id)
	{
		$artikel = TbGambarProduk::find($id);
		$artikel->gambar_utama = 0;
		$artikel->save();

		return redirect()->back();
	}
	// gambar

	// kupon
	public function SetAktifKupon($id)
	{
		$artikel = TbMasterKupon::find($id);
		$artikel->status = 'Aktif';
		$artikel->save();

		return redirect()->back();
	}

	public function SetTidakAktifKupon($id)
	{
		$artikel = TbMasterKupon::find($id);
		$artikel->status = 'Tidak Aktif';
		$artikel->save();

		return redirect()->back();
	}
	// kupon

	// order
	public function SetApproveAdmin($id)
	{
		$order = TbOrder::find($id);
		$order->status = 'Process';
		$order->save();

		return redirect()->back();
	}

	public function SetFinish($id)
	{
		$order = TbOrder::find($id);
		$order->status = 'Finish';
		$order->save();

		return redirect()->back();
	}

	public function SetCancel($id)
	{
		$order = TbOrder::find($id);
		$order->status = 'Cancel';
		$order->save();

		return redirect()->back();
	}


	// order wholesales
	public function SetProsesWholesale($id)
	{
		$order = TbOrderWholesale::find($id);
		$order->status = 'Proses';
		$order->save();

		DB::table('tb_order_wholesale_details')->where('id_order', $id)->update(['status' => 'Proses']);

		$order['detail'] = TbOrderWholesaleDetail::where('id_order', $order->id)->get();
			// if($order->order_to = 'DOREMI'){
			// 	$bank = TbMasterAkunBank::
			// }
		
		// email
		$toko = TbToko::find($order->id_customer);
		$cms_user = DB::table('cms_users')->where('id', $toko->id_user)->first();
		// dd($cms_user);
		Mail::send('frontend.invoice_email', ['order' => $order, 'cms_user' => $cms_user, 'toko' => $toko], function ($message) use ($order, $cms_user, $toko) {
			$message->to($cms_user->email);
			$message->from('no-reply@doremimusik.com');
			$message->subject('Invoice - #' . $order->no_invoice);
		});
		// email

		Mail::send('frontend.invoice_email', ['order' => $order, 'cms_user' => $cms_user, 'toko' => $toko], function ($message) use ($order, $cms_user, $toko) {
			$message->to(['doremialfa@gmail.com', 'doremiomega@gmail.com']);
			$message->from('wholesales@doremimusik.com');
			$message->subject('Notifikasi Order Wholesales || Invoice - #' . $order->no_invoice);
		});

		return redirect()->back();
	}

	public function SetHoldWholesale($id)
	{
		$order = TbOrderWholesale::find($id);
		$order->status = 'Hold';
		$order->save();

		DB::table('tb_order_wholesale_details')->where('id_order', $id)->update(['status' => 'Hold']);

		return redirect()->back();
	}

	public function SetFinishWholesale($id)
	{
		$order = TbOrderWholesale::find($id);
		$order->status = 'Finish';
		$order->save();

		DB::table('tb_order_wholesale_details')->where('id_order', $id)->update(['status' => 'Finish']);

		return redirect()->back();
	}
	
	// Order Wholesale Detail
	public function SetProsesWholesaleDetail($id)
	{
		$order = TbOrderWholesaleDetail::find($id);
		// dd($order);
		$order->status = 'Proses';
		$order->save();

		return redirect()->back();
	}

	public function SetHoldWholesaleDetail($id)
	{
		$order = TbOrderWholesaleDetail::find($id);
		$order->status = 'Hold';
		$order->save();

		return redirect()->back();
	}

	public function SetFinishWholesaleDetail($id)
	{
		$order = TbOrderWholesaleDetail::find($id);
		$order->status = 'Finish';
		$order->save();

		return redirect()->back();
	}

	// order teacher
	public function SetStatusTeacher($status, $id)
	{
		$order = TbOrderTeacher::find($id);
		$order->status = $status;
		$order->save();

		if ($order) {
			return redirect()->back();	
		}
	}

	// akun teacher
	public function SetStatusAkunTeacher($status, $id)
	{
		$teacher = User::find($id);

		if ($status == "NotActive") {
			$arr = preg_split('/(?=[A-Z])/',$status);
			$status = $arr[1].' '.$arr[2];

			$teacher->status = $status;
		} else {
			$teacher->status = $status;	
		}
		
		$teacher->save();

		if ($teacher) {
			return redirect()->back();	
		}
	}

	public function printOrderTeacher() {
		$teacher = User::where('id_cms_privileges', 8)->get();
		
		foreach ($teacher as $k => $v) {
			$order_teacher = TbOrderTeacher::where('order_by', $v->id)->where('tb_order_teachers.status', g('status'))->whereBetween('tanggal_order', [g('tanggal_awal'), g('tanggal_akhir')])->get();
			
			$teacher[$k]['total_penjualan'] = $order_teacher->sum('total_bayar');
			$teacher[$k]['total_reward'] = $order_teacher->sum('total_reward');
		}

		return view('print_order_teacher')
					->with('teacher', $teacher);
	}

	public function sendMailInvoice($id) {
		$order = TbOrderWholesale::find($id);

		$order['detail'] = TbOrderWholesaleDetail::where('id_order', $order->id)->get();
			// if($order->order_to = 'DOREMI'){
			// 	$bank = TbMasterAkunBank::
			// }
		$label = strtolower($order->order_to);
		
		// email
		$toko = TbToko::find($order->id_customer);
		$cms_user = DB::table('cms_users')->where('id', $toko->id_user)->first();

		$sales = DB::table('cms_users')->where('id', $order->id_sales)->first();
		// dd($cms_user);
		Mail::send('frontend.invoice_email', ['order' => $order, 'cms_user' => $cms_user, 'toko' => $toko, 'sales' => $sales], function ($message) use ($order, $cms_user, $toko, $sales) {
			$message->to('andrian_harli@yahoo.com','jopiest@yahoo.com');
			$message->from('no-reply@doremimusik.com');
			$message->subject('Invoice - ' . $order->no_invoice);
		});
		// email

		CRUDBooster::redirect('/admin/tb_order_wholesales?label='.$label,'Email telah terkirim!','success');
		exit();

	}
}