<?php namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;
	use App\Models\TbHargaProduk;
	use App\Models\TbProduk;
	use App\Models\TbOrder;
	use App\Models\TbOrderDetail;
	use App\Models\TbSubKategori;
	use App\Models\TbMasterManufaktur;

	class AdminTbOrderDetailsController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

	    	$produk = TbProduk::all();

			for ($i=0; $i < sizeof($produk); $i++) { 
					
				$harga_produk = TbHargaProduk::where('id_produk', $produk[$i]->id)->where('jenis_harga', 'Retail')->first();

				$dummy = $dummy.";".$produk[$i]->id."|".$produk[$i]->judul." - Rp. ".number_format($harga_produk->harga);
				
				$data = substr($dummy,1);

			}

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "id";
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
			$this->table = "tb_order_details";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Produk","name"=>"id_produk","join"=>"tb_produks,judul"];
			// $this->col[] = ["label"=>"Warna","name"=>"id_warna","join"=>"tb_master_warnas,nama"];
			// $this->col[] = ["label"=>"Berat","name"=>"berat"];
			$this->col[] = ["label"=>"Harga Satuan","name"=>"harga_satuan","callback_php"=>"number_format([harga_satuan])"];
			$this->col[] = ["label"=>"Qty","name"=>"qty"];
			$this->col[] = ["label"=>"Diskon","name"=>"diskon"];
			$this->col[] = ["label"=>"Total","name"=>"total","callback_php"=>"number_format([total])"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Order','name'=>'id_order','type'=>'text','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Produk','name'=>'id_produk','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','dataenum'=>$data];
			$this->form[] = ['label'=>'Harga Satuan (Custom)','name'=>'harga_satuan','type'=>'money','validation'=>'','width'=>'col-sm-10','value'=>'0'];
			// $this->form[] = ['label'=>'Produk','name'=>'id_produk','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'tb_produks,judul'];
			// $this->form[] = ['label'=>'Warna','name'=>'id_warna','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'warna,id'];
			// $this->form[] = ['label'=>'Harga Satuan','name'=>'harga_satuan','type'=>'hidden','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'tb_harga_produks,harga','parent_select'=>'id_produk'];
			$this->form[] = ['label'=>'Berat','name'=>'berat','type'=>'hidden','validation'=>'required|min:1|max:255','width'=>'col-sm-10','value'=>'0'];
			$this->form[] = ['label'=>'Qty','name'=>'qty','type'=>'number','validation'=>'required|integer|min:1','width'=>'col-sm-10','value'=>'1'];
			$this->form[] = ['label'=>'Diskon','name'=>'diskon','type'=>'text','validation'=>'min:0','width'=>'col-sm-10','value'=>'0'];
			$this->form[] = ['label'=>'Total','name'=>'total','type'=>'hidden','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];

			if (Request::path() == "admin/tb_order_details/add") {
				$this->form[] = ["label"=>"Add Produk (Custom)","type"=>"header","name"=>"detail_data_header"];
					$this->form[] = ['label'=>'Harga','name'=>'harga','type'=>'money','validation'=>'','width'=>'col-sm-10','value'=>'0'];
					$this->form[] = ['label'=>'Kategori','type'=>'select','name'=>'id_kategori','width'=>'col-sm-10','datatable'=>'tb_master_kategoris,nama_kategori'];
					$this->form[] = ['label'=>'Sub Kategori','name'=>'id_sub_kategori','type'=>'select','validation'=>'','width'=>'col-sm-10','datatable'=>'tb_sub_kategoris,nama_sub_kategori','parent_select'=>'id_kategori'];
					// $this->form[] = ['label'=>'Kategori','name'=>'kategori','type'=>'hidden','validation'=>'','width'=>'col-sm-10'];
					$this->form[] = ['label'=>'Manufaktur','name'=>'id_manufaktur','type'=>'select2','validation'=>'','width'=>'col-sm-10','datatable'=>'tb_master_manufakturs,nama'];
					// $this->form[] = ['label'=>'Merek','name'=>'manufaktur','type'=>'hidden','validation'=>'','width'=>'col-sm-10'];
					$this->form[] = ['label'=>'Kode SKU','name'=>'kode_sku','type'=>'text','validation'=>'','width'=>'col-sm-10'];
					$this->form[] = ['label'=>'Judul','name'=>'judul','type'=>'text','validation'=>'','width'=>'col-sm-10','placeholder'=>'You can only enter the letter only'];
					// $this->form[] = ['label'=>'Deskripsi Singkat','name'=>'deskripsi_singkat','type'=>'textarea','validation'=>'min:1','width'=>'col-sm-10','help'=>'- Tidak wajib di isi'];
					// $this->form[] = ['label'=>'Spesifikasi Produk','name'=>'spesifikasi_produk','type'=>'wysiwyg','validation'=>'required|string|min:5','width'=>'col-sm-10'];
					$this->form[] = ['label'=>'Berat','name'=>'berat','type'=>'hidden','validation'=>'','width'=>'col-sm-10','help'=>'- gram','value'=>'0'];
					$this->form[] = ['label'=>'Label Produk','name'=>'label_produk','type'=>'select2','validation'=>'','width'=>'col-sm-10','dataenum'=>'Baru;Promo;Pre Order;Populer;Harga Terbaik;Standar'];
					$this->form[] = ['label'=>'Label Owner','name'=>'label_owner','type'=>'select2','validation'=>'','width'=>'col-sm-10','dataenum'=>'DOREMI;MUSIKA'];
					$this->form[] = ['label'=>'Status','name'=>'status','type'=>'hidden','validation'=>'','width'=>'col-sm-10','dataenum'=>'TIdak Aktif'];
			}
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Order","name"=>"id_order","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"order,id"];
			//$this->form[] = ["label"=>"Produk","name"=>"id_produk","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"produk,id"];
			//$this->form[] = ["label"=>"Warna","name"=>"id_warna","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"warna,id"];
			//$this->form[] = ["label"=>"Berat","name"=>"berat","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Qty","name"=>"qty","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Harga Satuan","name"=>"harga_satuan","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Diskon","name"=>"diskon","type"=>"number","required"=>TRUE,"validation"=>"required|integer|min:0"];
			//$this->form[] = ["label"=>"Total","name"=>"total","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
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
	        $jumlah_total = TbOrderDetail::where('id_order', g('parent_id'))->sum('total');
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
				$produk->status = $postdata['status'];
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

	        $total_beli = $postdata['harga_satuan'] * $postdata['qty'];
	        $diskon = $total_beli * $postdata['diskon'] / 100;

	        $postdata['total'] = $total_beli - $diskon;
			// dd($postdata['total']);

			$order = TbOrder::find($postdata['id_order']);
			$order->total_bayar += $postdata['total'];
			$order->save();
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
	        if($postdata['harga_satuan']==0) {
				$harga_produk = TbHargaProduk::where('id_produk', $postdata['id_produk'])->first();

				$postdata['harga_satuan'] = $harga_produk->harga;
			}

	        $total_beli = $postdata['harga_satuan'] * $postdata['qty'];
	        $diskon = $total_beli * $postdata['diskon'] / 100;

			$postdata['total'] = $total_beli - $diskon;
			
			$order = TbOrder::find($postdata['id_order']);
			$order->total_bayar += $postdata['total'];
			$order->save();

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
			$order_detail = TbOrderDetail::find($id);
			$order = TbOrder::find($order_detail->id_order);
			$order->total_bayar -= $order_detail->total;
			$order->save();
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