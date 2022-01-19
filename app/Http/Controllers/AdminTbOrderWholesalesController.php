<?php namespace App\Http\Controllers;

use Session;
use Request;
use DB;
use CRUDBooster;
use App\Models\TbCustomer;
use App\Models\TbOrderWholesale;
use App\Models\TbOrderWholesaleDetail;
use App\Models\TbToko;
use App\Models\TbKonfirmasiBayar;

use Carbon\Carbon;
use Mail;

class AdminTbOrderWholesalesController extends \crocodicstudio\crudbooster\controllers\CBController
{

	public function cbInit()
	{

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "nama_customer";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";
			$this->button_add = true;
			$this->button_edit = true;
			$this->button_delete = true;
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "tb_order_wholesales";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Sales","name"=>"nama_sales"];
			$this->col[] = ["label"=>"No Invoice","name"=>"no_invoice"];
			$this->col[] = ["label"=>"No So","name"=>"no_so"];
			$this->col[] = ["label"=>"Tanggal","name"=>"tanggal"];
			$this->col[] = ["label"=>"Customer","name"=>"id_customer","join"=>"tb_tokos,nama_toko"];
			$this->col[] = ["label"=>"Jasa Kirim","name"=>"jasa_kirim"];
			$this->col[] = ["label"=>"Payment Terms","name"=>"payment_terms"];
			$this->col[] = ["label"=>"Payment Method","name"=>"payment_type"];
			$this->col[] = ["label"=>"Total Bayar","name"=>"total_bayar","callback_php"=>'number_format([total_bayar])'];
			$this->col[] = ["label"=>"Total Proses","name"=>"id"];
			$this->col[] = ["label"=>"Status","name"=>"status"];
			$this->col[] = ["label"=>"Tanggal Kirim","name"=>"id"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Sales','name'=>'nama_sales','type'=>'text','validation'=>'required','width'=>'col-sm-9'];
			$this->form[] = ['label'=>'Order To','name'=>'order_to','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'No So','name'=>'no_so','type'=>'hidden','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'No Invoice','name'=>'no_invoice','type'=>'hidden','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'No So','name'=>'no_so','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10','readonly'=>'1'];
			$this->form[] = ['label'=>'No Invoice','name'=>'no_invoice','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Tanggal','name'=>'tanggal','type'=>'hidden','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Customer','name'=>'id_customer','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Kota Tujuan','name'=>'kota_tujuan','type'=>'text','validation'=>'min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Payment Terms','name'=>'payment_terms','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Payment Type','name'=>'payment_type','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Jasa Kirim','name'=>'jasa_kirim','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Tarif Ongkir','name'=>'tarif_ongkir','type'=>'money','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Bayar Ditempat','name'=>'bayar_ditempat','type'=>'hidden','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Status','name'=>'status','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ['label'=>'Sales','name'=>'nama_sales','type'=>'text','validation'=>'required','width'=>'col-sm-9'];
			//$this->form[] = ['label'=>'Order To','name'=>'order_to','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'No So','name'=>'no_so','type'=>'hidden','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'No Invoice','name'=>'no_invoice','type'=>'hidden','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'No So','name'=>'no_so','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10','readonly'=>'1'];
			//$this->form[] = ['label'=>'No Invoice','name'=>'no_invoice','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tanggal','name'=>'tanggal','type'=>'hidden','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Customer','name'=>'id_customer','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Kota Tujuan','name'=>'kota_tujuan','type'=>'text','validation'=>'min:0','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Payment Terms','name'=>'payment_terms','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Payment Type','name'=>'payment_type','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Jasa Kirim','name'=>'jasa_kirim','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Tarif Ongkir','name'=>'tarif_ongkir','type'=>'money','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Bayar Ditempat','name'=>'bayar_ditempat','type'=>'hidden','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			//$this->form[] = ['label'=>'Status','name'=>'status','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			# OLD END FORM

			/* 
	        | ---------------------------------------------------------------------- 
	        | Sub Module
	        | ----------------------------------------------------------------------     
			| @label          = Label of action 
			| @path           = Path of sub module
			| @foreign_key 	  = foreign key of sub table/module
			| @button_color   = Bootstrap Class (primary,success,warning,danger)
			| @button_icon    = Font Awesome Class  
			| @parent_columns = Sparate with comma, e.g : name,created_at
	        | 
		 */
		$this->sub_module = array();
			// $this->sub_module[] = ['label'=>'Konfirmasi Bayar','path'=>'tb_konfirmasi_bayars','parent_columns'=>'no_so,no_invoice,tanggal','foreign_key'=>'no_invoice','button_color'=>'success','button_icon'=>'fa fa-money'];
		$this->sub_module[] = ['label' => 'Detail', 'path' => 'tb_order_wholesale_details', 'parent_columns' => 'no_so,no_invoice,tanggal', 'foreign_key' => 'id_order', 'button_color' => 'success', 'button_icon' => 'fa fa-shopping-cart'];


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Action Button / Menu
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @url         = Target URL, you can use field alias. e.g : [id], [name], [title], etc
	        | @icon        = Font awesome class icon. e.g : fa fa-bars
	        | @color 	   = Default is primary. (primary, warning, succecss, info)     
	        | @showIf 	   = If condition when action show. Use field alias. e.g : [id] == 1
	        | 
		 */
		$this->addaction = array();

		if(CRUDBooster::myPrivilegeName() != 'Admin Wholesales') {
			$this->addaction[] = ['label'=>'','url'=>CRUDBooster::mainpath('edit/[id]?return_url=http%3A%2F%2Flocalhost%3A8000%2Fadmin%2Ftb_order_wholesales%3Flabel%3Ddoremi&amp;parent_id=&amp;parent_field='),'icon'=>'fa fa-pencil','color'=>'success','showIf'=>"[status] == 'Hold'"];
			$this->addaction[] = ['label'=>'','url'=>CRUDBooster::mainpath('delete/[id]'),'icon'=>'fa fa-trash','color'=>'warning','showIf'=>"[status] == 'Hold'", 'confirmation' => true];
		}
	        // if (CRUDBooster::myPrivilegeName() == "Admin Wholesales" || CRUDBooster::myPrivilegeName() == "Super Administrator") {
		$this->addaction[] = ['label' => 'Print', 'url' => '/print-so/[id]?label='.g('label'), 'icon' => 'fa fa-print', 'color' => 'danger'];
		// $this->addaction[] = ['label' => 'Send Mail Invoice', 'url' => CRUDBooster::mainpath('send-mail-invoice/[id]'), 'icon' => 'fa fa-envelope', 'color' => 'success', 'confirmation' => true];
			// $this->addaction[] = ['label'=>'Konfirmasi Bayar','url'=>'/admin/tb_konfirmasi_bayars?no_invoice=[no_invoice]','icon'=>'fa fa-money','color'=>'primary'];
			// $this->addaction[] = ['label'=>'Export','url'=>'/export-so-xml/[no_invoice]','icon'=>'fa fa-download','color'=>'danger'];
		
		if(CRUDBooster::myPrivilegeName() != 'Admin Wholesales') {
			$this->addaction[] = ['label' => 'Set Proses', 'url' => CRUDBooster::mainpath('set-status-order/proses/[id]'), 'icon' => 'fa fa-check', 'color' => 'success', 'showIf' => "[status] == 'Hold'", 'confirmation' => true];
			$this->addaction[] = ['label' => 'Set Hold', 'url' => CRUDBooster::mainpath('set-status-order/hold/[id]'), 'icon' => 'fa fa-ban', 'color' => 'warning', 'showIf' => "[status] == 'Proses'", 'confirmation' => true];
			$this->addaction[] = ['label' => 'Set Finish', 'url' => CRUDBooster::mainpath('set-status-order/finish/[id]'), 'icon' => 'fa fa-check', 'color' => 'success', 'showIf' => "[status] == 'Proses'", 'confirmation' => true];

			$this->addaction[] = ['label' => 'Send Mail To Mr. Andrian', 'url' => CRUDBooster::mainpath('send-mail-invoice/[id]'), 'icon' => 'fa fa-envelope', 'color' => 'success', 'confirmation' => true];
		}
	        // }


	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add More Button Selected
	        | ----------------------------------------------------------------------     
	        | @label       = Label of action 
	        | @icon 	   = Icon from fontawesome
	        | @name 	   = Name of button 
	        | Then about the action, you should code at actionButtonSelected method 
	        | 
		 */
		$this->button_selected = array();
		$this->button_selected[] = ['label' => 'Set Hold', 'icon' => 'fa fa-ban', 'name' => 'set_hold'];
		$this->button_selected[] = ['label' => 'Set Proses', 'icon' => 'fa fa-check', 'name' => 'set_proses'];
		$this->button_selected[] = ['label' => 'Set Finish', 'icon' => 'fa fa-check', 'name' => 'set_finish'];

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
		 */
		$this->alert = array();
	                

	        
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add more button to header button 
	        | ----------------------------------------------------------------------     
	        | @label = Name of button 
	        | @url   = URL Target
	        | @icon  = Icon from Awesome.
	        | 
		 */
		$this->index_button = array();
			// $this->index_button[] = ['label'=>'Add Data','url'=>CRUDBooster::mainpath("add?return_url=".urlencode(url()->previous())."&parent_id=&parent_field=&label=".g('label')),"icon"=>"fa fa-plus-circle",'color'=>'success'];




	        /* 
	        | ---------------------------------------------------------------------- 
	        | Customize Table Row Color
	        | ----------------------------------------------------------------------     
	        | @condition = If condition. You may use field alias. E.g : [id] == 1
	        | @color = Default is none. You can use bootstrap success,info,warning,danger,primary.        
	        | 
		 */
		$this->table_row_color = array();     	          

	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | You may use this bellow array to add statistic at dashboard 
	        | ---------------------------------------------------------------------- 
	        | @label, @count, @icon, @color 
	        |
		 */
		$this->index_statistic = array();



	        /*
	        | ---------------------------------------------------------------------- 
	        | Add javascript at body 
	        | ---------------------------------------------------------------------- 
	        | javascript code in the variable 
	        | $this->script_js = "function() { ... }";
	        |
		 */
		$this->script_js = '
			function myFunction(id) {
				var date = document.getElementById("tgl_kirim"+id).value;

  				var form = document.getElementById("form-table");
				var elements = form.elements;
				for (var i = 0, len = elements.length; i < len; ++i) {
				    elements[i].disabled = true;
				}

				var form_tgl = document.getElementById("tgl_krm").action = "/admin/tb_order_wholesales/tanggal-kirim/" + id + "/" + date;
				document.getElementById("tgl_krm").submit();
			}
		';


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
		 */
		$label = g('label');
		if ($label == 'doremi') {
			$order = TbOrderWholesale::where('order_to', 'DOREMI')->where('status', '!=', 'Deleted')->get();
			$count = count($order);
		} elseif ($label == 'musika') {
			$order = TbOrderWholesale::where('order_to', 'MUSIKA')->where('status', '!=', 'Deleted')->get();
			$count = count($order);
		}else{
			$count = 0;
		}
				// $total_bayar = $order->sum('total_bayar');
		$dummy = '<div class="box">
                  <div class="box-body table-responsive no-padding">
                    <table class="table table-bordered">
                      <tbody>
                        <tr class="active">
                          <td colspan="2"><strong><i class="fa fa-bars"></i> ' . strtoupper($label) . '</strong></td>
						</tr>
						<tr>
                          <td width="25%"><strong>Total Order</strong></td>
                          <td>' . $count . ' Orders</td>
						</tr>
                      </tbody>
                    </table>    
                  </div>
			</div>

			<form method="GET" action="/admin/tb_order_wholesales/tanggal-kirim" id="tgl_krm">
			</form>
			';

		$this->pre_index_html = $dummy;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code after index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it after index table
	        | $this->post_index_html = "<p>test</p>";
	        |
		 */
		$this->post_index_html = null;
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include Javascript File 
	        | ---------------------------------------------------------------------- 
	        | URL of your javascript each array 
	        | $this->load_js[] = asset("myfile.js");
	        |
		 */
		$this->load_js = array();
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Add css style at body 
	        | ---------------------------------------------------------------------- 
	        | css code in the variable 
	        | $this->style_css = ".style{....}";
	        |
		 */
		$this->style_css = "
			.btn-edit, .btn-delete {
				display: none;
			}
		";
	        
	        
	        
	        /*
	        | ---------------------------------------------------------------------- 
	        | Include css File 
	        | ---------------------------------------------------------------------- 
	        | URL of your css each array 
	        | $this->load_css[] = asset("myfile.css");
	        |
		 */
		$this->load_css = array();


	}


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for button selected
	    | ---------------------------------------------------------------------- 
	    | @id_selected = the id selected
	    | @button_name = the name of button
	    |
	 */
	public function actionButtonSelected($id_selected, $button_name)
	{
			//Your code here
		if ($button_name == 'set_proses') {
			DB::table('tb_order_wholesales')->whereIn('id', $id_selected)->update(['status' => 'Proses']);

			DB::table('tb_order_wholesale_details')->whereIn('id_order', $id_selected)->update(['status' => 'Proses']);
		} elseif ($button_name == 'set_finish') {
			DB::table('tb_order_wholesales')->whereIn('id', $id_selected)->update(['status' => 'Finish']);

			DB::table('tb_order_wholesale_details')->whereIn('id_order', $id_selected)->update(['status' => 'Finish']);
		} elseif ($button_name == 'set_hold') {
			DB::table('tb_order_wholesales')->whereIn('id', $id_selected)->update(['status' => 'Hold']);

			DB::table('tb_order_wholesale_details')->whereIn('id_order', $id_selected)->update(['status' => 'Hold']);
		}

	}


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	 */
	public function hook_query_index(&$query)
	{
	        //Your code here
		if (g('label') == 'doremi') {
			$query->where('order_to', 'DOREMI')->where('tb_order_wholesales.status', '!=', 'Deleted');
		} else {
			$query->where('order_to', 'MUSIKA')->where('tb_order_wholesales.status', '!=', 'Deleted');
		}

	}

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	 */
	public function hook_row_index($column_index, &$column_value)
	{	        
	    	//Your code here
		if ($column_index == 9) {
			$column_value = '<strong>Rp. ' . $column_value . '</strong>';
		}

		if ($column_index == 10) {
			$detail = TbOrderWholesaleDetail::where('id_order', $column_value);

			$detail_total = $detail->count();
			$detail_proses = $detail->where('status', 'Proses')->count();
			$column_value = $detail_proses.' dari '.$detail_total;
		}

		if ($column_index == 12) {
			$date = TbOrderWholesale::find($column_value);
			if ($date->tanggal_kirim) {
				$date_create = date_create($date->tanggal_kirim);
				$date_new = date_format($date_create,"d F Y");
			} else {
				$date_new = '-';
			}

			if(CRUDBooster::myPrivilegeName() != 'Admin Wholesales') {
				$column_value = '
					<p>Telah di kirim pada tanggal: <h5><strong>'.$date_new.'</strong></h5></p>
					<div style="text-align:center;">
						<input type="date" class="form-control" name="tgl_kirim'.$column_value.'" id="tgl_kirim'.$column_value.'">
						<button class="btn btn-xs btn-primary" onclick="myFunction('.$column_value.')" style="margin-top: 5px">Update</button>
					</div>
				';
			} else {
				$column_value = '
					<p>Telah di kirim pada tanggal: <h5><strong>'.$date_new.'</strong></h5></p>';
			}
		}

		// if ($column_index == 11) {
		// 	$order = TbOrderWholesale::find($column_value);
		// 	$token = csrf_token();

		// 	$column_value = '
		// 	<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal'. $column_value .'"><span class="fa fa-file-text"></span> Send Mail</button>

		// 			<!-- Modal -->
		// 			<div class="modal fade" id="myModal'. $column_value .'" role="dialog">
		// 			<div class="modal-dialog modal-md">
		// 				<div class="modal-content">
		// 				<div class="modal-header">
		// 					<button type="button" class="close" data-dismiss="modal">&times;</button>
		// 					<h3 class="modal-title"><strong>No. Invoice: '. $order->no_invoice .'</strong></h3>
		// 				</div>
		// 				<div class="modal-body">
		// 				<form action="/send-mail-invoice" method="POST" id="form-mail" onsubmit="myFunction()">
		// 					<input type="hidden" name="_token" value="'. $token .'">
		// 					<input type="hidden" name="id_order_modal" id="id_order_modal" class="form-control" form="form-mail" value="'. $column_value .'">
		// 					<input type="text" name="email_modal" id="email_modal" form="form-mail">
		// 					<button type="submit" class="btn btn-success" form="form-mail">Send</button>
		// 				</form>
		// 				</div>
		// 				</div>
		// 			</div>
		// 			</div>
		// 	';
		// }
			
			// if ($column_index == 10) {
			// 	$order = TbOrderWholesale::find($column_value);
				
			// 	$cek_bayar = TbKonfirmasiBayar::where('no_invoice', $order->no_invoice)->first();
			// 	if (!empty($cek_bayar)) {
			// 		$image = env('APP_URL').'/'.$cek_bayar->file;
			// 		// dd($image);
			// 		$status_bayar = '
			// 			<a href="/admin/tb_konfirmasi_bayars?no_invoice='.$order->no_invoice.'" class="btn btn-success btn-xs"><span class="fa fa-money"></span> Sudah Bayar</a>
			// 			<br>
			// 			<br>
			// 			<a data-lightbox="roadtrip" rel="group_{tb_konfirmasi_bayars}" title="File: '.$cek_bayar->nama.'" href="'.$image.'"><img width="50px" height="40px" src="'.$image.'"></a>
			// 		';
			// 	} else {
			// 		$status_bayar = '<a href="/admin/tb_konfirmasi_bayars?no_invoice='.$order->no_invoice.'" class="btn btn-warning btn-xs"><span class="fa fa-money"></span> Konfirmasi Bayar</a>';
			// 	}

			// 	if (empty($order->note)) {
			// 		$column_value = '
			// 			<strong>Tidak Ada Catatan!</strong>
			// 			<hr style="border-top: 3px solid">'.$status_bayar;
			// 	} else {
			// 		$column_value = '
			// 		<button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal'. $column_value .'"><span class="fa fa-file-text"></span> Note!</button>

			// 		<!-- Modal -->
			// 		<div class="modal fade" id="myModal'. $column_value .'" role="dialog">
			// 		<div class="modal-dialog modal-md">
			// 			<div class="modal-content">
			// 			<div class="modal-header">
			// 				<button type="button" class="close" data-dismiss="modal">&times;</button>
			// 				<h3 class="modal-title"><strong>Note: '. $order->no_so .'</strong></h3>
			// 			</div>
			// 			<div class="modal-body">
			// 				<h5><b>'. $order->note .'</b></h5>
			// 			</div>
			// 			</div>
			// 		</div>
			// 		</div>
			// 		<hr style="border-top: 3px solid">'.$status_bayar;
			// 	}
			// }
	}

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	 */
	public function hook_before_add(&$postdata)
	{        
			//Your code here
			// dd($postdata);
		$now = Carbon::now('Asia/Jakarta');
		$date = Carbon::parse($now)->format('d-F-Y H:i:s');
		$postdata['tanggal'] = $date;
		// $postdata['no_invoice'] = rand(111111, 999999);

		$order = TbOrderWholesale::where('order_to', $postdata['order_to'])->latest()->first();
		
		if($postdata['order_to'] == 'DOREMI') {
			$dummy_no_invoice = 'INV/DRM/'.date('m').'/'.date('y').'/00001';
		} elseif($postdata['order_to'] == 'MUSIKA') {
			$dummy_no_invoice = 'INV/MIJ/'.date('m').'/'.date('y').'/00001';
		}

		$cek_no_invoice = TbOrderWholesale::where('no_invoice', $dummy_no_invoice)->latest()->first();
		if($cek_no_invoice) {

			$explode = explode('/', $order->no_invoice);
			$next_no = $explode[4] + 1;
			if ($postdata['order_to'] == 'DOREMI') {
				$postdata['no_invoice'] = 'INV/DRM/'.date('m').'/'.date('y') . '/' . sprintf("%05d", $next_no);
			} else {
				$postdata['no_invoice'] = 'INV/MIJ/'.date('m').'/'.date('y') . '/' . sprintf("%05d", $next_no);
			}
		} else {
			$postdata['no_invoice'] = $dummy_no_invoice;
		}
	    
		if ($order == null) {
			if ($postdata['order_to'] == 'DOREMI') {
				$postdata['no_so'] = 'WS' . '/' . 'DRM' . '/' . '00001';
			} else {
				$postdata['no_so'] = 'WS' . '/' . 'MIJ' . '/' . '00001';
			}
		} else {
			$explode = explode('/', $order->no_so);
			$next_no = $explode[2] + 1;
			if ($postdata['order_to'] == 'DOREMI') {
				$postdata['no_so'] = 'WS' . '/' . 'DRM' . '/' . sprintf("%05d", $next_no);
			} else {
				$postdata['no_so'] = 'WS' . '/' . 'MIJ' . '/' . sprintf("%05d", $next_no);
			}
		}

		    //form customer
		    // if ($postdata['id_customer'] == 0) {
	     //    	$customer = new TbCustomer;
	     //    	$customer->nama_depan = $postdata['nama_depan'];
	     //    	$customer->nama_belakang = $postdata['nama_belakang'];
	     //    	$customer->email = $postdata['email'];
	     //    	$customer->no_handphone = $postdata['no_handphone'];
	     //    	$customer->fax = $postdata['fax'];
	     //    	$customer->alamat = $postdata['alamat'];
	     //    	$customer->id_kota = $postdata['id_kota'];

	     //    		$kota = TbMasterKota::find($postdata['id_kota']);

	     //    	$customer->kota = $kota->nama;
	     //    	$customer->id_provinsi = $postdata['id_primary'];

	     //    		$provinsi = TbMasterProvinsi::find($postdata['id_primary']);

	     //    	$customer->provinsi = $provinsi->nama;
	     //    	$customer->kode_pos = $postdata['kode_pos'];
	     //    	$customer->timestamps = true;
	     //    	$customer->save();

	     //    	$postdata['id_customer'] = $customer->id;
	     //    	$postdata['nama_customer'] = $customer->nama_depan." ".$customer->nama_belakang;
	     //    } else {
	     //    	$customer = TbCustomer::find($postdata['id_customer']);
	     //    	$postdata['id_customer'] = $customer->id;
	     //    	$postdata['nama_customer'] = $customer->nama_depan." ".$customer->nama_belakang;
	     //    }

	     //    unset($postdata['detail_data_header']);
	     //    unset($postdata['nama_depan']);
	     //    unset($postdata['nama_belakang']);
	     //    unset($postdata['email']);
	     //    unset($postdata['no_handphone']);
	     //    unset($postdata['fax']);
	     //    unset($postdata['alamat']);
	     //    unset($postdata['id_kota']);
	     //    unset($postdata['id_primary']);
	     //    unset($postdata['kode_pos']);


	}

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	 */
	public function hook_after_add($id)
	{        
			//Your code here
		$order = TbOrderWholesale::latest()->first();

		if ($order->order_to == 'MUSIKA') {
			$to = "anggikumalaa@gmail.com";
		} elseif ($order->order_to == 'DOREMI') {
			$to = "tesalonicamichiko@gmail.com";
		}

		Mail::send('frontend.print.mailso', ['data' => 'data', 'to' => $to], function ($message) use ($data, $to) {
			$message->to($to);
			$message->from('administrator@doremimusik.com');
			$message->subject('Notifikasi Sales Order');
		});

	}

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	 */
	public function hook_before_edit(&$postdata, $id)
	{        
	        //Your code here

	}

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	 */
	public function hook_after_edit($id)
	{
	        //Your code here 

	}

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	 */
	public function hook_before_delete($id)
	{
			//Your code here
		$orderw = TbOrderWholesale::find($id);
		$orderw->status = 'Deleted';
		$orderw->save();

		$url_back = url()->previous();
		CRUDBooster::redirect($url_back, "Delete Success!", "success");
		exit();

	}

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	 */
	public function hook_after_delete($id)
	{
	        //Your code here

	}



	    //By the way, you can still create your own method in here... :) 


}