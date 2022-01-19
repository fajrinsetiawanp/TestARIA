<?php 

	namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;
	use App\Models\TbSubKategori;
	use App\Models\TbMasterManufaktur;
	use App\Models\TbProduk;
 	use App\Models\TbHargaProduk;
  	use App\Models\TbGambarProduk;
	use App\TbDiskonGroup;

class AdminTbProduksController extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "judul";
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
			$this->table = "tb_produks";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Judul","name"=>"judul"];
			$this->col[] = ["label"=>"Kategori","name"=>"kategori"];
			$this->col[] = ["label"=>"Manufaktur","name"=>"manufaktur"];
			$this->col[] = ["label"=>"Label Produk","name"=>"label_produk"];
			$this->col[] = ["label"=>"Harga","name"=>"id"];
			$this->col[] = ["label"=>"Diskon Group","name"=>"id_diskon_group","join"=>"tb_diskon_groups,label_diskon_group"];
			$this->col[] = ["label"=>"Status","name"=>"status"];
			$this->col[] = ["label"=>"Label Owner","name"=>"label_owner"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			// $this->form[] = ['label'=>'Kode Produk','name'=>'kode_produk','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			if(Request::path() != 'admin/tb_produks/add') {
				// dd(Request::segments()[3]);
				$harga_produk = TbHargaProduk::where('id_produk', Request::segments()[3])->first();

				$this->form[] = ['label'=>'Harga','name'=>'harga','type'=>'money','validation'=>'required|min:1|max:255','width'=>'col-sm-10','value'=>$harga_produk->harga];
			} else {
				$this->form[] = ['label'=>'Harga','name'=>'harga','type'=>'money','validation'=>'required|min:1|max:255','width'=>'col-sm-10','value'=>'0'];
			}
			
			$this->form[] = ['label'=>'Diskon Group','type'=>'select2','name'=>'id_diskon_group','width'=>'col-sm-10','datatable'=>'tb_diskon_groups,label_diskon_group'];

			$this->form[] = ['label'=>'Kategori','type'=>'select','name'=>'id_kategori','width'=>'col-sm-10','datatable'=>'tb_master_kategoris,nama_kategori'];
			$this->form[] = ['label'=>'Sub Kategori','name'=>'id_sub_kategori','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'tb_sub_kategoris,nama_sub_kategori','parent_select'=>'id_kategori'];
			$this->form[] = ['label'=>'Tipe Kategori','name'=>'id_tipe_kategori','type'=>'select','validation'=>'','width'=>'col-sm-10','datatable'=>'tb_tipe_kategoris,nama_tipe_kategori','parent_select'=>'id_sub_kategori'];
			$this->form[] = ['label'=>'Kategori','name'=>'kategori','type'=>'hidden','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Manufaktur','name'=>'id_manufaktur','type'=>'select2','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'tb_master_manufakturs,nama'];
			$this->form[] = ['label'=>'Merek','name'=>'manufaktur','type'=>'hidden','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Kode SKU','name'=>'kode_sku','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Judul','name'=>'judul','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10','placeholder'=>'You can only enter the letter only'];
			$this->form[] = ['label'=>'Deskripsi Singkat','name'=>'deskripsi_singkat','type'=>'textarea','validation'=>'','width'=>'col-sm-10','help'=>'- Tidak wajib di isi'];
			$this->form[] = ['label'=>'Spesifikasi Produk','name'=>'spesifikasi_produk','type'=>'wysiwyg','validation'=>'','width'=>'col-sm-10'];
			$this->form[] = ['label'=>'Berat','name'=>'berat','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10','help'=>'- gram'];
			$this->form[] = ['label'=>'Label Produk','name'=>'label_produk','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','dataenum'=>'Baru;Promo;Pre Order;Populer;Harga Terbaik;Standar'];
			$this->form[] = ['label'=>'Label Owner','name'=>'label_owner','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','dataenum'=>'DOREMI;MUSIKA;DOREMI MUSIKA'];
			$this->form[] = ['label'=>'Status','name'=>'status','type'=>'select2','validation'=>'required|min:1|max:255','width'=>'col-sm-10','dataenum'=>'Aktif;Tidak Aktif'];

			// warna
			// $this->form[] = ["label"=>"Warna","type"=>"header","name"=>"detail_data_header"];
			// 	$columns = [];
			// 	$columns[]= ['label'=>'Warna','name'=>'id_warna','type'=>'select','validation'=>'required|min:1|max:255','width'=>'col-sm-10','datatable'=>'tb_master_warnas,nama'];
			// 	$this->form[] = ['label'=>'Warna Produk','name'=>'warna_produk','type'=>'child','controller'=>'AdminTbWarnaProduksController','columns'=>$columns,'table'=>'tb_warna_produks','foreign_key'=>'id_produk'];

			// gambar
			$this->form[] = ["label"=>"Gambar","type"=>"header","name"=>"detail_data_header"];
				$columns = [];
				$columns[]= ['label'=>'Gambar','name'=>'gambar','type'=>'upload','validation'=>'required|image','width'=>'col-sm-10','help'=>'File types support : JPG, JPEG, PNG, GIF, BMP'];
				$this->form[] = ['label'=>'Gambar Produk','name'=>'gambar_produk','type'=>'child','controller'=>'AdminTbGambarProduksController','columns'=>$columns,'table'=>'tb_gambar_produks','foreign_key'=>'id_produk'];

			// harga
			// $this->form[] = ["label"=>"Harga","type"=>"header","name"=>"detail_data_header"];
			// 	$columns = [];
			// 	$columns[]= ['label'=>'Qty','name'=>'qty','type'=>'number','validation'=>'integer|min:0','width'=>'col-sm-10'];
			// 	$columns[]= ['label'=>'Harga','name'=>'harga','type'=>'number','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
			// 	$columns[]= ['label'=>'Diskon','name'=>'diskon','type'=>'number','validation'=>'integer|min:0','width'=>'col-sm-10','value'=>0];
			// 	$columns[]= ['label'=>'Jenis Harga','name'=>'jenis_harga','type'=>'radio','validation'=>'required|min:1|max:255','width'=>'col-sm-10','dataenum'=>'Retail;Wholesale'];
			// 	$this->form[] = ['label'=>'Harga Produk','name'=>'harga_produk','type'=>'child','controller'=>'AdminTbHargaProduksController','columns'=>$columns,'table'=>'tb_harga_produks','foreign_key'=>'id_produk'];

			// lokasi dan stok
			// $this->form[] = ["label"=>"Lokasi dan Stok","type"=>"header","name"=>"detail_data_header"];
			// 	$columns = [];
			// 	$columns[]= ['label'=>'Lokasi','name'=>'id_lokasi','type'=>'select','validation'=>'required|integer|min:0','width'=>'col-sm-10','datatable'=>'tb_lokasi_produks,nama_lokasi'];
			// 	$columns[]= ['label'=>'Jumlah Stok','name'=>'jumlah_stok','type'=>'number','validation'=>'required|integer|min:0','width'=>'col-sm-10'];
			// 	$this->form[] = ['label'=>'Lokasi dan Stok Produk','name'=>'lokasi_stok_produk','type'=>'child','controller'=>'AdminTbLokasiStokProduksController','columns'=>$columns,'table'=>'tb_lokasi_stok_produks','foreign_key'=>'id_produk'];
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Kode Produk","name"=>"kode_produk","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Kode Sku","name"=>"kode_sku","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Judul","name"=>"judul","type"=>"text","required"=>TRUE,"validation"=>"required|string|min:3|max:70","placeholder"=>"You can only enter the letter only"];
			//$this->form[] = ["label"=>"Deskripsi Singkat","name"=>"deskripsi_singkat","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Spesifikasi Produk","name"=>"spesifikasi_produk","type"=>"textarea","required"=>TRUE,"validation"=>"required|string|min:5|max:5000"];
			//$this->form[] = ["label"=>"Berat","name"=>"berat","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Sub Kategori","name"=>"id_sub_kategori","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"sub_kategori,id"];
			//$this->form[] = ["label"=>"Kategori","name"=>"kategori","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Manufaktur","name"=>"id_manufaktur","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"manufaktur,id"];
			//$this->form[] = ["label"=>"Manufaktur","name"=>"manufaktur","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Label Produk","name"=>"label_produk","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
			//$this->form[] = ["label"=>"Status","name"=>"status","type"=>"text","required"=>TRUE,"validation"=>"required|min:1|max:255"];
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
	        // $this->sub_module[] = ['label'=>'','path'=>'tb_warna_produks','parent_columns'=>'kode_sku,judul','foreign_key'=>'id_produk','button_color'=>'success','button_icon'=>'fa fa-paint-brush'];
	        // $this->sub_module[] = ['label'=>'','path'=>'tb_master_ecommerces52','parent_columns'=>'judul','foreign_key'=>'id_produk','button_color'=>'success','button_icon'=>'fa fa-file'];
	        $this->sub_module[] = ['label'=>'','path'=>'tb_gambar_produks','parent_columns'=>'judul','foreign_key'=>'id_produk','button_color'=>'success','button_icon'=>'fa fa-image'];
	        $this->sub_module[] = ['label'=>'','path'=>'tb_harga_produks','parent_columns'=>'judul','foreign_key'=>'id_produk','button_color'=>'success','button_icon'=>'fa fa-money'];
	        // $this->sub_module[] = ['label'=>'','path'=>'tb_lokasi_stok_produks','parent_columns'=>'judul','foreign_key'=>'id_produk','button_color'=>'success','button_icon'=>'fa fa-building'];


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
				$this->addaction[] = ['label'=>'Set Aktif','url'=>CRUDBooster::mainpath('set-status-produk/aktif/[id]'),'icon'=>'fa fa-check','color'=>'success','showIf'=>"[status] == 'Tidak Aktif'", 'confirmation' => true];
	        	$this->addaction[] = ['label'=>'Set Tidak Aktif','url'=>CRUDBooster::mainpath('set-status-produk/tidak-aktif/[id]'),'icon'=>'fa fa-ban','color'=>'warning','showIf'=>"[status] == 'Aktif'", 'confirmation' => true];
	    	}
			
			// $produks 
			$this->addaction[] = ['url'=>'/frontend/produk-detail/[judul]','icon'=>'fa fa-file','color'=>'success'];

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

					$this->button_selected[] = ['label'=>'Kosongkan Diskon Group','icon'=>'fa fa-ban','name'=>'kosongkan_diskon'];
					$this->button_selected[] = ['label'=>'---Diskon Campur---'];
					$diskon_group = TbDiskonGroup::orderBy('label_diskon_group')->get();
					foreach($diskon_group as $v) {
						$this->button_selected[] = ['label'=>$v->label_diskon_group,'icon'=>'fa fa-check','name'=>'setdiskon_'.$v->id];
					}
					$this->button_selected[] = ['label'=>'---Diskon Campur---'];

	                
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
	        $jumlah_produk = TbProduk::count();
                $dummy = '<div class="box">
                  <div class="box-body table-responsive no-padding">
                    <table class="table table-bordered">
                      <tbody>
                        <tr class="active">
                          <td colspan="2"><strong><i class="fa fa-bars"></i> Summary </strong></td>
                        </tr>
                        <tr>
                          <td width="25%"><strong>Jumlah Produk</strong></td>
                          <td>'.$jumlah_produk.' Produk</td>
                        </tr>
                      </tbody>
                    </table>    
                  </div>
            </div>';

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
					if ($button_name == 'kosongkan_diskon') {
						DB::table('tb_produks')->whereIn('id', $id_selected)->update(['id_diskon_group' => null]);
					}

					$diskon_group = TbDiskonGroup::all();
					foreach($diskon_group as $v) {
						if ($button_name == 'setdiskon_'.$v->id) {
							DB::table('tb_produks')->whereIn('id', $id_selected)->update(['id_diskon_group' => $v->id]);
						}
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
	    	//if ($column_index == 3) {
	    	//	$column_value = $column_value.' gram';
				//}
				// if ($column_index == 2) {
				// 	$sub = TbSubKategori::where('id', $column_value)->first();
				// 	//	dd($sub);
				// 	$column_value = $sub->nama_sub_kategori;
				// }

				if ($column_index == 5) {
					$produk = TbProduk::find($column_value);
					$harga_produk = TbHargaProduk::where('id_produk', $column_value)->first();
					
					$column_value = 'Rp. '.number_format($harga_produk->harga);
				}
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
		*/
		var $harga;
	    public function hook_before_add(&$postdata) {        
	        //Your code here
	        $kategori = TbSubKategori::find($postdata['id_sub_kategori']);
	        $manufaktur = TbMasterManufaktur::find($postdata['id_manufaktur']);

	        $postdata['kategori'] = $kategori->nama_sub_kategori;
	        $postdata['manufaktur'] = $manufaktur->nama;

			$this->harga = $postdata['harga'];
	        // unset($postdata['id_kategori']);
			unset($postdata['detail_data_header']);
			unset($postdata['harga']);
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
			$produk = TbProduk::find($id);
			// dd($produk);
			$tipe = array(
				'0' => 'Retail',
				'1' => 'Wholesale',
			);
			
			foreach($tipe as $v) {
				// dd($v);
				$harga_produk = new TbHargaProduk;
				$harga_produk->id_produk = $produk->id;
				$harga_produk->qty = 1;
				$harga_produk->harga = $this->harga;
				$harga_produk->diskon = 0;
				$harga_produk->jenis_harga = $v;
				$harga_produk->timestamps = true;
				$harga_produk->save();
				// dd($harga_produk);
			}

			$gambar_produk = TbGambarProduk::where('id_produk', $produk->id)->get();
			// dd($gambar_produk);
			$env_path = env('APP_URL');

			foreach ($gambar_produk as $k) { 
				$path = str_replace($env_path, "", $k->gambar);

				$update_gambar = TbGambarProduk::find($k->id);
				$update_gambar->gambar = substr($path, 1);
				$update_gambar->timestamps = true;
				$update_gambar->save();
			}

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
	        $kategori = TbSubKategori::find($postdata['id_sub_kategori']);
	        $manufaktur = TbMasterManufaktur::find($postdata['id_manufaktur']);

	        $postdata['kategori'] = $kategori->nama_sub_kategori;
			$postdata['manufaktur'] = $manufaktur->nama;
			
			$harga_produk = TbHargaProduk::where('id_produk', $id)->get();

			if (count($harga_produk) > 0) {
				foreach($harga_produk as $v) {
					$harga_produk = TbHargaProduk::find($v->id);
					$harga_produk->harga = $postdata['harga'];
					$harga_produk->save();
				}
			} else {
				$tipe = array(
					'0' => 'Retail',
					'1' => 'Wholesale',
				);
				
				foreach($tipe as $v) {
					// dd($v);
					$harga_produk = new TbHargaProduk;
					$harga_produk->id_produk = $id;
					$harga_produk->qty = 1;
					$harga_produk->harga = $postdata['harga'];
					$harga_produk->diskon = 0;
					$harga_produk->jenis_harga = $v;
					$harga_produk->timestamps = true;
					$harga_produk->save();
					// dd($harga_produk);
				}
			}

	        // unset($postdata['id_kategori']);
			unset($postdata['detail_data_header']);
			unset($postdata['harga']);

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
			$gambar_produk = TbGambarProduk::where('id_produk', $id)->get();
			$env_path = env('APP_URL');

			foreach ($gambar_produk as $k) { 
				$cek_path = stristr($k->gambar, $env_path);
				// dd($k->gambar);
				if ($cek_path) {
					$replace_path = str_replace($env_path, "", $k->gambar);
					// dd($replace_path);
					$path = substr($replace_path, 1);
					// dd($path. 'true');
				} else {
					$path = $k->gambar;
					// dd($path. 'false');
				}

				$update_gambar = TbGambarProduk::find($k->id);
				$update_gambar->gambar = $path;
				$update_gambar->timestamps = true;
				$update_gambar->save();
			}

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
			$harga_produk = TbHargaProduk::where('id_produk', $id)->delete();

			$gambar_produk = TbGambarProduk::where('id_produk', $id)->delete();

			

	    }



	    //By the way, you can still create your own method in here... :) 


	}