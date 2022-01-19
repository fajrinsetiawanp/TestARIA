<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;
	use Carbon\Carbon;

	use App\Models\TbCustomer;
	use App\Models\TbMasterProvinsi;
	use App\Models\TbMasterKota;

	use App\Models\TbOrder;

	class AdminTbOrdersController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

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
			$this->table = "tb_orders";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"SO to","name"=>"so_to"];
			$this->col[] = ["label"=>"No SO","name"=>"no_so"];
			$this->col[] = ["label"=>"Tanggal Order","name"=>"tanggal_order"];
			$this->col[] = ["label"=>"Customer","name"=>"nama_customer","join"=>"tb_tokos,nama_toko"];
			$this->col[] = ["label"=>"Tipe Order","name"=>"tipe_order"];
			$this->col[] = ["label"=>"Tipe Bayar","name"=>"payment_type"];
			$this->col[] = ["label"=>"Label","name"=>"label"];
			$this->col[] = ["label"=>"Keterangan","name"=>"keterangan"];
			$this->col[] = ["label"=>"Total","name"=>"total_bayar","callback_php"=>'number_format([total_bayar])'];
			$this->col[] = ["label"=>"Customer","name"=>"nama_customer"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];

			if(Request::path() != 'admin/tb_orders/add') {
				// $this->form[] = ['label'=>'Tanggal Approve','name'=>'tanggal_approve','type'=>'date','validation'=>'min:1|max:255','width'=>'col-sm-10'];
				// $this->form[] = ['label'=>'Tanggal Bayar','name'=>'tanggal_bayar','type'=>'date','validation'=>'min:1|max:255','width'=>'col-sm-10'];
				// $this->form[] = ['label'=>'No So','name'=>'no_so','type'=>'number','validation'=>'min:1|max:255','width'=>'col-sm-10'];
				$this->form[] = ['label'=>'No Invoice','name'=>'no_invoice','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
				// $this->form[] = ['label'=>'Privilleges','name'=>'id_privilleges','type'=>'select2','validation'=>'integer|min:0','width'=>'col-sm-10'];
				// $this->form[] = ['label'=>'SO to','name'=>'so_to','type'=>'select','validation'=>'required|min:1|max:255','width'=>'col-sm-10','dataenum'=>'DRM|DOREMI;MIJ|MUSIKA','readonly'=>true];
				$this->form[] = ['label'=>'No Order','name'=>'no_order','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10','readonly'=>true];
				$this->form[] = ['label'=>'Total Bayar','name'=>'total_bayar','type'=>'money','validation'=>'required|min:1|max:255','width'=>'col-sm-10','readonly'=>true];
				// $this->form[] = ['label'=>'Biaya Layanan','name'=>'biaya_layanan','type'=>'money','validation'=>'min:1|max:255','width'=>'col-sm-10','readonly'=>true];
			}

			$this->form[] = ['label'=>'SO To','name'=>'so_to','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','dataenum'=>'DOREMI;MUSIKA'];
			$this->form[] = ['label'=>'Tanggal Order','name'=>'tanggal_order','type'=>'datetime','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'No Order','name'=>'no_order','type'=>'hidden','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'No SO','name'=>'no_so','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
			// $this->form[] = ['label'=>'Kode Kupon','name'=>'id_kode_kupon','type'=>'select2','validation'=>'integer','width'=>'col-sm-10','datatable'=>'tb_master_kupons,kode_kupon'];
			$this->form[] = ['label'=>'Tipe Order','name'=>'tipe_order','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','dataenum'=>'Origin Shipment;Self Pickup'];
			$this->form[] = ['label'=>'Tipe Pembayaran','name'=>'payment_type','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Label','name'=>'label','type'=>'select2','validation'=>'required|string','width'=>'col-sm-10','dataenum'=>'Tokopedia;Bukalapak;Blibli;iLotte'];
			$this->form[] = ['label'=>'Keterangan','name'=>'keterangan','type'=>'textarea','validation'=>'string','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Total Bayar','name'=>'total_bayar','type'=>'hidden','validation'=>'required|min:1|max:255','width'=>'col-sm-10','value'=>0];
			$this->form[] = ['label'=>'Status','name'=>'status','type'=>'hidden','validation'=>'required|min:1|max:255','width'=>'col-sm-10','value'=>'Pending'];
			$this->form[] = ["label"=>"Privilleges","name"=>"id_privilleges","type"=>"hidden","required"=>TRUE,"validation"=>"required|integer|min:0"];
			$this->form[] = ["label"=>"Order By","name"=>"order_by","type"=>"hidden","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			$this->form[] = ["label"=>"Tipe Harga Jual","name"=>"tipe_harga_jual","type"=>"hidden","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			
			$customer = TbCustomer::all();
			for ($i=0; $i < sizeof($customer); $i++) { 
				$dummy = $dummy.";".$customer[$i]->id."|".$customer[$i]->nama_depan." ".$customer[$i]->nama_belakang;
				$data_cust = substr($dummy,1);
			}
			$this->form[] = ['label'=>'Customer Existing','name'=>'id_customer','type'=>'select2','validation'=>'integer|min:0','width'=>'col-sm-10','dataenum'=>$data_cust];
			$this->form[] = ['label'=>'Customer Existing','name'=>'nama_customer','type'=>'hidden','validation'=>'','width'=>'col-sm-10'];
			
			// customer
			$this->form[] = ["label"=>"New Customer","type"=>"header","name"=>"detail_data_header"];
				$this->form[] = ['label'=>'Nama Depan','name'=>'nama_depan','type'=>'text','validation'=>'min:1|max:255','width'=>'col-sm-10'];
				$this->form[] = ['label'=>'Nama Belakang','name'=>'nama_belakang','type'=>'text','validation'=>'','width'=>'col-sm-10'];
				$this->form[] = ['label'=>'Email','name'=>'email','type'=>'email','validation'=>'email','width'=>'col-sm-10','placeholder'=>'Please enter a valid email address'];
				$this->form[] = ['label'=>'No Handphone','name'=>'no_handphone','type'=>'text','validation'=>'','width'=>'col-sm-10'];
				$this->form[] = ['label'=>'Fax','name'=>'fax','type'=>'text','validation'=>'','width'=>'col-sm-10'];
				$this->form[] = ['label'=>'Alamat','name'=>'alamat','type'=>'textarea','validation'=>'string','width'=>'col-sm-10'];
				$this->form[] = ['label'=>'Provinsi','name'=>'id_primary','type'=>'select','validation'=>'integer','width'=>'col-sm-10','datatable'=>'tb_master_provinsis,nama'];
				$this->form[] = ['label'=>'Kota','name'=>'id_kota','type'=>'select','validation'=>'integer','width'=>'col-sm-10','datatable'=>'tb_master_kotas,nama','parent_select'=>'id_primary'];
				$this->form[] = ['label'=>'Kode Pos','name'=>'kode_pos','type'=>'number','validation'=>'integer','width'=>'col-sm-10','value'=>0];

			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Tanggal Order","name"=>"tanggal_order","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"No Order","name"=>"no_order","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Customer","name"=>"id_customer","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"customer,id"];
			//$this->form[] = ["label"=>"Nama Customer","name"=>"nama_customer","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Kode Kupon","name"=>"id_kode_kupon","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"kode_kupon,id"];
			//$this->form[] = ["label"=>"Tipe Order","name"=>"tipe_order","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Keterangan","name"=>"keterangan","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Metode Bayar","name"=>"metode_bayar","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Status","name"=>"status","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Tanggal Approve","name"=>"tanggal_approve","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Tanggal Bayar","name"=>"tanggal_bayar","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"No So","name"=>"no_so","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"No Invoice","name"=>"no_invoice","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Privilleges","name"=>"id_privilleges","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"privilleges,id"];
			//$this->form[] = ["label"=>"Order By","name"=>"order_by","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Tipe Harga Jual","name"=>"tipe_harga_jual","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
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
	        $this->sub_module[] = ['label'=>'Details','path'=>'tb_order_details','parent_columns'=>'no_order,no_so,nama_customer','foreign_key'=>'id_order','button_color'=>'success','button_icon'=>'fa fa-bars'];
	        $this->sub_module[] = ['label'=>'Checking','path'=>'tb_order_checks','parent_columns'=>'no_order,no_so,nama_customer','foreign_key'=>'id_order','button_color'=>'success','button_icon'=>'fa fa-bars'];
	        // $this->sub_module[] = ['label'=>'Alamat Kirim','path'=>'tb_alamat_pengirimen','parent_columns'=>'no_order,nama_customer','foreign_key'=>'id_order','button_color'=>'success','button_icon'=>'fa fa-bars'];


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
			$this->addaction[] = ['label'=>'Print','url'=>'/print-so-enduser/[no_order]','icon'=>'fa fa-print','color'=>'danger'];
	        // $this->addaction[] = ['label'=>'Approve','url'=>CRUDBooster::mainpath('set-status-order/approve/[id]'),'icon'=>'fa fa-check','color'=>'success','showIf'=>"[status] == 'Pending'", 'confirmation' => true];
	        // $this->addaction[] = ['label'=>'Finish','url'=>CRUDBooster::mainpath('set-status-order/finish/[id]'),'icon'=>'fa fa-check','color'=>'warning','showIf'=>"[status] == 'Process'", 'confirmation' => true];
	        // $this->addaction[] = ['label'=>'Cancel','url'=>CRUDBooster::mainpath('set-status-order/cancel/[id]'),'icon'=>'fa fa-ban','color'=>'warning','showIf'=>"[status] == 'Process'", 'confirmation' => true];


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

	                
	        /* 
	        | ---------------------------------------------------------------------- 
	        | Add alert message to this module at overheader
	        | ----------------------------------------------------------------------     
	        | @message = Text of message 
	        | @type    = warning,success,danger,info        
	        | 
	        */
	        $this->alert        = array();
	                

	        
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
	        $this->script_js = NULL;


            /*
	        | ---------------------------------------------------------------------- 
	        | Include HTML Code before index table 
	        | ---------------------------------------------------------------------- 
	        | html code to display it before index table
	        | $this->pre_index_html = "<p>test</p>";
	        |
	        */
	        $this->pre_index_html = null;
	        
	        
	        
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
	        $this->style_css = NULL;
	        
	        
	        
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
	    public function actionButtonSelected($id_selected,$button_name) {
	        //Your code here
	            
	    }


	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate query of index result 
	    | ---------------------------------------------------------------------- 
	    | @query = current sql query 
	    |
	    */
	    public function hook_query_index(&$query) {
	        //Your code here
	        // if (CRUDBooster::myPrivilegeName() == 'Admin Wholesales' || CRUDBooster::myPrivilegeName() == 'Admin Ecomm') {
	        // 	$query->where('order_by',CRUDBooster::myId());
	        // }
	        // $query->where('so_to', 'DRM');
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
			//Your code here
			if($column_index == 4) {
				$customer = TbCustomer::find($column_value);

				$column_value = $customer->nama_depan.' '.$customer->nama_belakang.' - '.$customer->no_handphone.'<br> Alamat:'.$customer->alamat;
			}
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
	    */
	    public function hook_before_add(&$postdata) {        
	        //Your code here
	        // $now = Carbon::now('Asia/Jakarta');
	        // $date = Carbon::parse($now)->format('d-m-Y H:i:s');
	        // $postdata['tanggal_order'] = $date;

	        $random_order = rand(111111, 999999);
	        $postdata['no_order'] = $random_order;
	        $postdata['id_privilleges'] = CRUDBooster::myPrivilegeId();
	        $postdata['order_by'] = CRUDBooster::myId();

	        // $month = Carbon::parse($now)->format('m');
	        // $years = Carbon::parse($now)->format('y');
	        // $order = TbOrder::where('so_to', $postdata['so_to'])->latest()->first();
	        // // dd($order);
	        // if ($order == 0) {
	        // 	if (CRUDBooster::myPrivilegeName()	== 'Admin Wholesales') {
	        // 		$postdata['tipe_harga_jual'] = 'Wholesale';

	        // 		$postdata['no_order'] = 'WS'.'/'.$postdata['so_to'].'/'.'00001';
	        // 	} else {
	        // 		$postdata['tipe_harga_jual'] = 'Retail';

	        // 		$postdata['no_order'] = 'RTL'.'/'.$postdata['so_to'].'/'.'00001';
	        // 	}
		    // } else {
		    // 		$explode = explode('/', $order->no_order);
			//     	$next_no = $explode[2] + 1;

			//     	if (CRUDBooster::myPrivilegeName()	== 'Admin Wholesales') {
		    //     		$postdata['tipe_harga_jual'] = 'Wholesale';

		    //     		$postdata['no_order'] = 'WS'.'/'.$postdata['so_to'].'/'.sprintf("%05d", $next_no);
		    //     	} else {
		    //     		$postdata['tipe_harga_jual'] = 'Retail';

			//     		$postdata['no_order'] = 'RTL'.'/'.$postdata['so_to'].'/'.sprintf("%05d", $next_no);
			//     	}
		    // }
		    // dd($postdata['no_order']);

	        if ($postdata['id_customer'] == 0) {
	        	$customer = new TbCustomer;
	        	$customer->nama_depan = $postdata['nama_depan'];
	        	$customer->nama_belakang = $postdata['nama_belakang'];
	        	$customer->email = $postdata['email'];
	        	$customer->no_handphone = $postdata['no_handphone'];
	        	$customer->fax = $postdata['fax'];
	        	$customer->alamat = $postdata['alamat'];
	        	$customer->id_kota = $postdata['id_kota'];

	        		$kota = TbMasterKota::find($postdata['id_kota']);

	        	$customer->kota = $kota->nama;
	        	$customer->id_provinsi = $postdata['id_primary'];

	        		$provinsi = TbMasterProvinsi::find($postdata['id_primary']);

	        	$customer->provinsi = $provinsi->nama;
	        	$customer->kode_pos = $postdata['kode_pos'];
	        	$customer->timestamps = true;
	        	$customer->save();

	        	$postdata['id_customer'] = $customer->id;
	        	$postdata['nama_customer'] = $customer->nama_depan." ".$customer->nama_belakang;
	        } else {
	        	$customer = TbCustomer::find($postdata['id_customer']);
	        	$postdata['id_customer'] = $customer->id;
	        	$postdata['nama_customer'] = $customer->nama_depan." ".$customer->nama_belakang;
	        }

	        unset($postdata['detail_data_header']);
	        unset($postdata['nama_depan']);
	        unset($postdata['nama_belakang']);
	        unset($postdata['email']);
	        unset($postdata['no_handphone']);
	        unset($postdata['fax']);
	        unset($postdata['alamat']);
	        unset($postdata['id_kota']);
	        unset($postdata['id_primary']);
	        unset($postdata['kode_pos']);

	        // dd($postdata);

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after add public static function called 
	    | ---------------------------------------------------------------------- 
	    | @id = last insert id
	    | 
	    */
	    public function hook_after_add($id) {        
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before update data is execute
	    | ---------------------------------------------------------------------- 
	    | @postdata = input post data 
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_edit(&$postdata,$id) {        
	        //Your code here
	        $postdata['id_privilleges'] = CRUDBooster::myPrivilegeId();
	        $postdata['order_by'] = CRUDBooster::myId();

	        if (CRUDBooster::myPrivilegeName()	== 'Admin Wholesales') {
	        	$postdata['tipe_harga_jual'] = 'Wholesale';
	        } else {
	        	$postdata['tipe_harga_jual'] = 'Retail';
	        }

	        if ($postdata['id_customer'] == 0) {
	        	$customer = new TbCustomer;
	        	$customer->nama_depan = $postdata['nama_depan'];
	        	$customer->nama_belakang = $postdata['nama_belakang'];
	        	$customer->email = $postdata['email'];
	        	$customer->no_handphone = $postdata['no_handphone'];
	        	$customer->fax = $postdata['fax'];
	        	$customer->alamat = $postdata['alamat'];
	        	$customer->id_kota = $postdata['id_kota'];

	        		$kota = TbMasterKota::find($postdata['id_kota']);

	        	$customer->kota = $kota->nama;
	        	$customer->id_provinsi = $postdata['id_primary'];

	        		$provinsi = TbMasterProvinsi::find($postdata['id_primary']);

	        	$customer->provinsi = $provinsi->nama;
	        	$customer->kode_pos = $postdata['kode_pos'];
	        	$customer->timestamps = true;
	        	$customer->save();

	        	$postdata['id_customer'] = $customer->id;
	        	$postdata['nama_customer'] = $customer->nama_depan." ".$customer->nama_belakang;
	        } else {
	        	$customer = TbCustomer::find($postdata['id_customer']);
	        	$postdata['id_customer'] = $customer->id;
	        	$postdata['nama_customer'] = $customer->nama_depan." ".$customer->nama_belakang;
	        }

	        unset($postdata['detail_data_header']);
	        unset($postdata['nama_depan']);
	        unset($postdata['nama_belakang']);
	        unset($postdata['email']);
	        unset($postdata['no_handphone']);
	        unset($postdata['fax']);
	        unset($postdata['alamat']);
	        unset($postdata['id_kota']);
	        unset($postdata['id_primary']);
	        unset($postdata['kode_pos']);

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after edit public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_edit($id) {
	        //Your code here 

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command before delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_before_delete($id) {
	        //Your code here

	    }

	    /* 
	    | ---------------------------------------------------------------------- 
	    | Hook for execute command after delete public static function called
	    | ----------------------------------------------------------------------     
	    | @id       = current id 
	    | 
	    */
	    public function hook_after_delete($id) {
	        //Your code here

	    }



		//By the way, you can still create your own method in here... :) 
		
		public function getDetail($id) {
                
			//dd($id);

			$data = [];
			$data['id'] = $id;
			$data['page_title'] = 'Detail Orders';
			$data['command'] = 'detail';
			$data['row'] = DB::table('tb_orders')->find($id);
			$data['customer'] = DB::table('tb_customers')->find($data['row']->id_customer);

			$data['row']->nama_depan = $data['customer']->nama_depan;
			$data['row']->nama_belakang = $data['customer']->nama_belakang;
			$data['row']->email = $data['customer']->email;
			$data['row']->no_handphone = $data['customer']->no_handphone;
			$data['row']->fax = $data['customer']->fax;
			$data['row']->alamat = $data['customer']->alamat;
			$data['row']->kota = $data['customer']->kota;
			$data['row']->provinsi = $data['customer']->provinsi;
			$data['row']->kode_pos = $data['customer']->kode_pos;

			// dd($data);
			$this->cbView('crudbooster::default.form',$data);
		}


	}