<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;
	use App\Models\TbProduk;
	use App\Models\TbHargaProduk;
	use App\Models\TbOrderWholesale;
	use App\Models\TbOrderWholesaleDetail;
	use App\Models\TbSubKategori;
	use App\Models\TbMasterManufaktur;

	class AdminTbOrderWholesaleDetailsController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

	    	$produk = TbProduk::all();

			for ($i=0; $i < sizeof($produk); $i++) { 
					
				$harga_produk = TbHargaProduk::where('id_produk', $produk[$i]->id)->first();

				$dummy = $dummy.";".$produk[$i]->id."|".$produk[$i]->judul." - Rp. ".number_format($harga_produk->harga);

				$data = substr($dummy,1);

			}

			$cek_status = TbOrderWholesale::find(g('parent_id'));

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
			$this->limit = "20";
			$this->orderby = "id,desc";
			$this->global_privilege = false;
			$this->button_table_action = true;
			$this->button_bulk_action = true;
			$this->button_action_style = "button_icon";

			if($cek_status->status == 'Hold') {
				$this->button_add = true;
				$this->button_edit = true;
				$this->button_delete = true;

				if(CRUDBooster::myPrivilegeName() != 'Admin Wholesales') {
					$readonly = false;
				} else {
					$readonly = true;
				}
			} elseif($cek_status->status == 'Proses' || $cek_status->status == 'Finish') {
				$this->button_add = false;
				$this->button_edit = true;
				$this->button_delete = false;

				if(CRUDBooster::myPrivilegeName() != 'Admin Wholesales') {
					$readonly = false;
				} else {
					$readonly = true;
				}
			}
			$this->button_detail = true;
			$this->button_show = true;
			$this->button_filter = true;
			$this->button_import = false;
			$this->button_export = false;
			$this->table = "tb_order_wholesale_details";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Nama Produk","name"=>"id_produk","join"=>"tb_produks,judul"];
			$this->col[] = ["label"=>"Harga Satuan","name"=>"harga_satuan","callback_php"=>"number_format([harga_satuan])"];
			$this->col[] = ["label"=>"Quantity","name"=>"qty"];
			$this->col[] = ["label"=>"Diskon 1","name"=>"diskon_1"];
			$this->col[] = ["label"=>"Diskon 2","name"=>"diskon_2"];
			$this->col[] = ["label"=>"Diskon 3","name"=>"diskon_3"];
			$this->col[] = ["label"=>"Jumlah Total","name"=>"jumlah_total","callback_php"=>"number_format([jumlah_total])"];
			$this->col[] = ["label"=>"Note","name"=>"note"];
			$this->col[] = ["label"=>"Note Acc","name"=>"note_acc"];
			$this->col[] = ["label"=>"Status","name"=>"status"];
			$this->col[] = ["label"=>"Updated By","name"=>"id_user","join"=>"cms_users,name"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Order','name'=>'id_order','type'=>'hidden','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			// $this->form[] = ['label'=>'Nama Produk','name'=>'id_produk','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'tb_produks,judul'];

			$this->form[] = ['label'=>'Note Approval','name'=>'note_acc','type'=>'textarea','validation'=>'min:0','width'=>'col-sm-10','help'=>'*Jika perlu approval khusus dari Pak Andrian'];
			$this->form[] = ['label'=>'Nama Produk','type'=>'select2','name'=>'id_produk','dataenum'=>$data,'validation'=>'','width'=>'col-sm-10','readonly'=>$readonly];
			$this->form[] = ['label'=>'Harga Satuan (Custom)','name'=>'harga_satuan','type'=>'money','validation'=>'','width'=>'col-sm-10','value'=>'0','readonly'=>$readonly];
			$this->form[] = ['label'=>'Quantity','name'=>'qty','type'=>'number','validation'=>'required|integer|min:1','width'=>'col-sm-10','value'=>'1','readonly'=>$readonly];
			$this->form[] = ['label'=>'Diskon 1','name'=>'diskon_1','type'=>'text','validation'=>'required|min:0|max:100','width'=>'col-sm-10','value'=>'0','readonly'=>$readonly];
			$this->form[] = ['label'=>'Diskon 2','name'=>'diskon_2','type'=>'text','validation'=>'min:0|max:100','width'=>'col-sm-10','value'=>'0','readonly'=>$readonly];
			$this->form[] = ['label'=>'Diskon 3','name'=>'diskon_3','type'=>'text','validation'=>'min:0|max:100','width'=>'col-sm-10','value'=>'0','readonly'=>$readonly];
			$this->form[] = ['label'=>'Jumlah Total','name'=>'jumlah_total','type'=>'hidden','validation'=>'required|min:1','width'=>'col-sm-10', 'value'=>'0','readonly'=>$readonly];
			$this->form[] = ['label'=>'Note','name'=>'note','type'=>'textarea','validation'=>'min:0','width'=>'col-sm-10','readonly'=>$readonly];
			$this->form[] = ['label'=>'Status','name'=>'status','type'=>'hidden','validation'=>'','width'=>'col-sm-10','value'=>'Hold'];
			$this->form[] = ['label'=>'ID User','name'=>'id_user','type'=>'hidden','validation'=>'','width'=>'col-sm-10','value'=>CRUDBooster::myId()];

			// if (Request::path() == "admin/tb_order_wholesale_details/add") {
				$this->form[] = ["label"=>"Add Produk (Custom)","type"=>"header","name"=>"detail_data_header"];
					$this->form[] = ['label'=>'Harga','name'=>'harga','type'=>'money','validation'=>'','width'=>'col-sm-10','value'=>'0','readonly'=>$readonly];
					$this->form[] = ['label'=>'Kategori','type'=>'select','name'=>'id_kategori','width'=>'col-sm-10','datatable'=>'tb_master_kategoris,nama_kategori','readonly'=>$readonly];
					$this->form[] = ['label'=>'Sub Kategori','name'=>'id_sub_kategori','type'=>'select','validation'=>'','width'=>'col-sm-10','datatable'=>'tb_sub_kategoris,nama_sub_kategori','parent_select'=>'id_kategori','readonly'=>$readonly];
					// $this->form[] = ['label'=>'Kategori','name'=>'kategori','type'=>'hidden','validation'=>'','width'=>'col-sm-10'];
					$this->form[] = ['label'=>'Manufaktur','name'=>'id_manufaktur','type'=>'select2','validation'=>'','width'=>'col-sm-10','datatable'=>'tb_master_manufakturs,nama','readonly'=>$readonly];
					// $this->form[] = ['label'=>'Merek','name'=>'manufaktur','type'=>'hidden','validation'=>'','width'=>'col-sm-10'];
					$this->form[] = ['label'=>'Kode SKU','name'=>'kode_sku','type'=>'text','validation'=>'','width'=>'col-sm-10','readonly'=>$readonly];
					$this->form[] = ['label'=>'Judul','name'=>'judul','type'=>'text','validation'=>'','width'=>'col-sm-10','placeholder'=>'You can only enter the letter only','readonly'=>$readonly];
					// $this->form[] = ['label'=>'Deskripsi Singkat','name'=>'deskripsi_singkat','type'=>'textarea','validation'=>'min:1','width'=>'col-sm-10','help'=>'- Tidak wajib di isi'];
					// $this->form[] = ['label'=>'Spesifikasi Produk','name'=>'spesifikasi_produk','type'=>'wysiwyg','validation'=>'required|string|min:5','width'=>'col-sm-10'];
					$this->form[] = ['label'=>'Berat','name'=>'berat','type'=>'hidden','validation'=>'','width'=>'col-sm-10','help'=>'- gram','value'=>'0','readonly'=>$readonly];
					$this->form[] = ['label'=>'Label Produk','name'=>'label_produk','type'=>'select2','validation'=>'','width'=>'col-sm-10','dataenum'=>'Baru;Promo;Pre Order;Populer;Harga Terbaik;Standar','readonly'=>$readonly];
					$this->form[] = ['label'=>'Label Owner','name'=>'label_owner','type'=>'select2','validation'=>'','width'=>'col-sm-10','dataenum'=>'DOREMI;MUSIKA','readonly'=>$readonly];
					$this->form[] = ['label'=>'Status','name'=>'status_produk','type'=>'hidden','validation'=>'','width'=>'col-sm-10','value'=>'TIdak Aktif'];
			// }
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Produk","name"=>"id_produk","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"produk,id"];
			//$this->form[] = ["label"=>"Harga Satuan","name"=>"harga_satuan","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Qty","name"=>"qty","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Diskon 1","name"=>"diskon_1","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Diskon 2","name"=>"diskon_2","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Diskon 3","name"=>"diskon_3","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Jumlah Total","name"=>"jumlah_total","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
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
				$this->addaction[] = ['label' => 'Set Proses', 'url' => CRUDBooster::mainpath('set-status-order-detail/proses/[id]'), 'icon' => 'fa fa-check', 'color' => 'success', 'showIf' => "[status] == 'Hold'", 'confirmation' => true];
				$this->addaction[] = ['label' => 'Set Hold', 'url' => CRUDBooster::mainpath('set-status-order-detail/hold/[id]'), 'icon' => 'fa fa-ban', 'color' => 'warning', 'showIf' => "[status] == 'Proses'", 'confirmation' => true];
				$this->addaction[] = ['label' => 'Set Finish', 'url' => CRUDBooster::mainpath('set-status-order-detail/finish/[id]'), 'icon' => 'fa fa-check', 'color' => 'success', 'showIf' => "[status] == 'Proses'", 'confirmation' => true];
			}

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
			$jumlah_total = TbOrderWholesaleDetail::where('id_order', g('parent_id'))->sum('jumlah_total');
			$dummy = '<div class="box">
                  <div class="box-body table-responsive no-padding">
                    <table class="table table-bordered">
                      <tbody>
                        <tr class="active">
                          <td colspan="2"><strong><i class="fa fa-bars"></i> Jumlah Total</strong></td>
						</tr>
						<tr>
                          <td width="25%"><strong>Total Order</strong></td>
                          <td> Rp. '.number_format($jumlah_total).'</td>
                        </tr>
                      </tbody>
                    </table>    
                  </div>
			</div>';
	        $this->post_index_html = $dummy;
	        
	        
	        
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
			$url_prev = explode('&', url()->previous());
			$orders_id_prev = explode('=', $url_prev[4]);
			$orders_id = $orders_id_prev[1];
			// dd($orders_id);
			if ($button_name == 'set_proses') {
				$orders = TbOrderWholesale::find($orders_id);
				$orders->status = 'Proses';
				$orders->save();
				
				DB::table('tb_order_wholesale_details')->whereIn('id', $id_selected)->update(['status' => 'Proses']);
			} elseif ($button_name == 'set_finish') {
				DB::table('tb_order_wholesale_details')->whereIn('id', $id_selected)->update(['status' => 'Finish']);
			} elseif ($button_name == 'set_hold') {
				DB::table('tb_order_wholesale_details')->whereIn('id', $id_selected)->update(['status' => 'Hold']);
			} 
	            
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
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
	    	//Your code here
	    	//Your code here
	    	if ($column_index == 2) {
	    		$column_value = 'Rp. '.$column_value;
	    	}

	    	if ($column_index == 4) {
	    		$column_value = $column_value." ". '%';
	    	}

	    	if ($column_index == 5) {
	    		$column_value = $column_value." ". '%';
	    	}

	    	if ($column_index == 6) {
	    		$column_value = $column_value." ". '%';
	    	}

	    	if ($column_index == 7) {
	    		$column_value = 'Rp. '.$column_value;
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
			// dd($postdata);
			if (empty($postdata['id_produk'])) {
				$kategori = TbSubKategori::find($postdata['id_sub_kategori']);
		        $manufaktur = TbMasterManufaktur::find($postdata['id_manufaktur']);

				$produk = new TbProduk;
				$produk->kode_sku = $postdata['kode_sku'];
				$produk->judul = $postdata['judul'];
				$produk->spesifikasi_produk = " ";
				$produk->berat = $postdata['berat'];
				$produk->id_kategori = $postdata['id_kategori'];
				$produk->id_sub_kategori = $postdata['id_sub_kategori'];
				$produk->kategori = $kategori->nama_sub_kategori;
				$produk->id_manufaktur = $postdata['id_manufaktur'];
				$produk->manufaktur = $manufaktur->nama;
				$produk->label_produk = $postdata['label_produk'];
				$produk->label_owner = $postdata['label_owner'];
				$produk->status = $postdata['status_produk'];
				$produk->timestamps = true;
				$produk->save();

				// harga
				$tipe = array(
					'0' => 'Retail',
					'1' => 'Wholesale',
				);				
				foreach($tipe as $v) {
					// dd($v);
					$harga_produk = new TbHargaProduk;
					$harga_produk->id_produk = $produk->id;
					$harga_produk->qty = 1;
					$harga_produk->harga = $postdata['harga'];
					$harga_produk->diskon = 0;
					$harga_produk->jenis_harga = $v;
					$harga_produk->timestamps = true;
					$harga_produk->save();
					// dd($harga_produk);
				}
				// harga

				$postdata['id_produk'] = $produk->id;
				$postdata['harga_satuan'] = $postdata['harga'];
			} else {
				if($postdata['harga_satuan']==0) {
					$harga_produk = TbHargaProduk::where('id_produk', $postdata['id_produk'])->first();
					$postdata['harga_satuan'] = $harga_produk->harga;
				}
			}

	        $total = $postdata['harga_satuan'] * $postdata['qty'];
	        $diskon_1 = $total * ($postdata['diskon_1']/100);
	        $total_harga_1 = $total - $diskon_1;

	        if ($postdata['diskon_2'] > 0) {
	        	$diskon_2 = $total_harga_1 * ($postdata['diskon_2']/100);
	        	$total_harga_2 = $total_harga_1 - $diskon_2;

	        	if ($postdata['diskon_3'] > 0) {
	        		$diskon_3 = $total_harga_2 * ($postdata['diskon_3']/100);
	        		$total_harga_3 = $total_harga_2 - $diskon_3;

	        		$postdata['jumlah_total'] = $total_harga_3;

	        	} else {
	        		$postdata['jumlah_total'] = $total_harga_2;
	        	}; 

	        } else {
	        	$postdata['jumlah_total'] = $total_harga_1;
	        };


	        $produk_id = $postdata['id_order'];
	        $toko = TbOrderWholesale::where('id', $produk_id)->first();
	        $jumlah = TbOrderWholesaleDetail::where('id_order', $toko['id'])->sum('jumlah_total');

	        $jumlah = $jumlah + $postdata['jumlah_total'];

	        $total_final =  $jumlah;
	        // $toko['tarif_ongkir']
	        $simpan = TbOrderWholesale::find($toko['id']);
	        $simpan['total_bayar'] = $total_final;
	        $simpan->save();
			// dd($simpan);
			
			 	// remove add produk
				unset($postdata['kode_sku']);
				unset($postdata['judul']);
				unset($postdata['berat']);
				unset($postdata['id_kategori']);
				unset($postdata['id_sub_kategori']);
				unset($postdata['id_manufaktur']);
				unset($postdata['label_produk']);
				unset($postdata['label_owner']);
				unset($postdata['status_produk']);
				unset($postdata['harga']);
				unset($postdata['detail_data_header']);
				// remove add produk
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

	    	// dd($postdata);
			if (empty($postdata['id_produk'])) {
				$kategori = TbSubKategori::find($postdata['id_sub_kategori']);
		        $manufaktur = TbMasterManufaktur::find($postdata['id_manufaktur']);

				$produk = new TbProduk;
				$produk->kode_sku = $postdata['kode_sku'];
				$produk->judul = $postdata['judul'];
				$produk->spesifikasi_produk = " ";
				$produk->berat = $postdata['berat'];
				$produk->id_kategori = $postdata['id_kategori'];
				$produk->id_sub_kategori = $postdata['id_sub_kategori'];
				$produk->kategori = $kategori->nama_sub_kategori;
				$produk->id_manufaktur = $postdata['id_manufaktur'];
				$produk->manufaktur = $manufaktur->nama;
				$produk->label_produk = $postdata['label_produk'];
				$produk->label_owner = $postdata['label_owner'];
				$produk->status = $postdata['status_produk'];
				$produk->timestamps = true;
				$produk->save();

				// harga
				$tipe = array(
					'0' => 'Retail',
					'1' => 'Wholesale',
				);				
				foreach($tipe as $v) {
					// dd($v);
					$harga_produk = new TbHargaProduk;
					$harga_produk->id_produk = $produk->id;
					$harga_produk->qty = 1;
					$harga_produk->harga = $postdata['harga'];
					$harga_produk->diskon = 0;
					$harga_produk->jenis_harga = $v;
					$harga_produk->timestamps = true;
					$harga_produk->save();
					// dd($harga_produk);
				}
				// harga

				$postdata['id_produk'] = $produk->id;
				$postdata['harga_satuan'] = $postdata['harga'];
			} else {
				if($postdata['harga_satuan']==0) {
					$harga_produk = TbHargaProduk::where('id_produk', $postdata['id_produk'])->first();
					$postdata['harga_satuan'] = $harga_produk->harga;
				}
			}

	        $total = $postdata['harga_satuan'] * $postdata['qty'];
	        $diskon_1 = $total * ($postdata['diskon_1']/100);
	        $total_harga_1 = $total - $diskon_1;

	        if ($postdata['diskon_2'] > 0) {
	        	$diskon_2 = $total_harga_1 * ($postdata['diskon_2']/100);
	        	$total_harga_2 = $total_harga_1 - $diskon_2;

	        	if ($postdata['diskon_3'] > 0) {
	        		$diskon_3 = $total_harga_2 * ($postdata['diskon_3']/100);
	        		$total_harga_3 = $total_harga_2 - $diskon_3;

	        		$postdata['jumlah_total'] = $total_harga_3;

	        	} else {
	        		$postdata['jumlah_total'] = $total_harga_2;
	        	}; 

	        } else {
	        	$postdata['jumlah_total'] = $total_harga_1;
	        };


	        $produk_id = $postdata['id_order'];
			$toko = TbOrderWholesale::where('id', $produk_id)->first();
			
			$data_old = TbOrderWholesaleDetail::where('id', $id)->first();
	        $jumlah = TbOrderWholesaleDetail::where('id_order', $toko['id'])->sum('jumlah_total');
	        $jumlah = $jumlah - $data_old->jumlah_total + $postdata['jumlah_total'];
	        $total_final =  $jumlah;
	        // $toko['tarif_ongkir']
	        $simpan = TbOrderWholesale::find($toko['id']);
	        $simpan['total_bayar'] = $total_final;
	        $simpan->save();
			// dd($simpan);
			
			 	// remove add produk
				unset($postdata['kode_sku']);
				unset($postdata['judul']);
				unset($postdata['berat']);
				unset($postdata['id_kategori']);
				unset($postdata['id_sub_kategori']);
				unset($postdata['id_manufaktur']);
				unset($postdata['label_produk']);
				unset($postdata['label_owner']);
				unset($postdata['status_produk']);
				unset($postdata['harga']);
				unset($postdata['detail_data_header']);
				// remove add produk

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
			
	        $detail = TbOrderWholesaleDetail::where('id', $id)->first();
	    	$toko = TbOrderWholesale::where('id', $detail['id_order'])->first();
	        // dd($toko);

	        $toko['total_bayar'] = $toko['total_bayar'] - $detail['jumlah_total'];
	        $toko->save();
	        // dd($total_final);
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


	}