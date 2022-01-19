<?php 

namespace App\Http\Controllers;

	use Session;
	use Request;
	use DB;
	use CRUDBooster;
	use App\User;
	use App\Models\TbToko;
	use Mail;

	class AdminCmsUsers1Controller extends \crocodicstudio\crudbooster\controllers\CBController {

	    public function cbInit() {

			# START CONFIGURATION DO NOT REMOVE THIS LINE
			$this->title_field = "name";
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
			$this->table = "cms_users";
			# END CONFIGURATION DO NOT REMOVE THIS LINE

			# START COLUMNS DO NOT REMOVE THIS LINE
			$this->col = [];
			$this->col[] = ["label"=>"Name","name"=>"name"];
			// $this->col[] = ["label"=>"Photo","name"=>"photo","image"=>true];
			$this->col[] = ["label"=>"Email","name"=>"email"];
			$this->col[] = ["label"=>"Detail","name"=>"id"];
			$this->col[] = ["label"=>"Sales Area","name"=>"id"];
			// $this->col[] = ["label"=>"Privileges","name"=>"id_cms_privileges","join"=>"cms_privileges,name"];
			# END COLUMNS DO NOT REMOVE THIS LINE

			# START FORM DO NOT REMOVE THIS LINE
			$this->form = [];
			$this->form[] = ['label'=>'Name','name'=>'name','type'=>'text','validation'=>'required|string|min:3|max:70','width'=>'col-sm-10','placeholder'=>'You can only enter the letter only'];
			// $this->form[] = ['label'=>'Photo','name'=>'photo','type'=>'upload','validation'=>'image|max:3000','width'=>'col-sm-10','help'=>'File types support : JPG, JPEG, PNG, GIF, BMP'];
			$this->form[] = ['label'=>'Email','name'=>'email','type'=>'email','validation'=>'required|min:1|max:255|email|unique:cms_users','width'=>'col-sm-10','placeholder'=>'Please enter a valid email address'];
			$this->form[] = ['label'=>'Password','name'=>'password','type'=>'password','validation'=>'min:3|max:32','width'=>'col-sm-10','help'=>'Minimum 5 characters. Please leave empty if you did not change the password.'];
			$this->form[] = ['label'=>'Cms Privileges','name'=>'id_cms_privileges','type'=>'hidden','validation'=>'required|integer|min:0','width'=>'col-sm-10', 'value' => 6];

			// Detail Toko
			if(Request::path() == 'admin/cms_users/add' || Request::path() == 'admin/cms_users/add-save') {
			$this->form[] = ["label"=>"Detail","type"=>"header","name"=>"detail_data_header"];
				$this->form[] = ['label'=>'Nama Toko','name'=>'nama_toko','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
				$this->form[] = ['label'=>'Nama Pemilik','name'=>'nama_pemilik','type'=>'text','validation'=>'required|min:1|max:255','width'=>'col-sm-10'];
				// $this->form[] = ['label'=>'Email','name'=>'email','type'=>'hidden','validation'=>'min:1|max:255|email','width'=>'col-sm-10','placeholder'=>'Please enter a valid email address'];
				$this->form[] = ['label'=>'No Telepon','name'=>'no_telepon','type'=>'text','validation'=>'','width'=>'col-sm-10'];
				$this->form[] = ['label'=>'No Handphone','name'=>'no_handphone','type'=>'text','validation'=>'','width'=>'col-sm-10'];
				$this->form[] = ['label'=>'Provinsi','name'=>'provinsi','type'=>'text','validation'=>'min:0','width'=>'col-sm-10'];
				$this->form[] = ['label'=>'Kota','name'=>'kota','type'=>'text','validation'=>'min:0','width'=>'col-sm-10'];
				$this->form[] = ['label'=>'Kode Pos','name'=>'kode_pos','type'=>'number','validation'=>'min:0','width'=>'col-sm-10'];
				$this->form[] = ['label'=>'Alamat','name'=>'alamat','type'=>'textarea','validation'=>'required|string|min:5|max:5000','width'=>'col-sm-10'];
			}
			// Detail Toko
			// $this->form[] = ['label'=>'Status','name'=>'status','type'=>'text','validation'=>'max:255','width'=>'col-sm-10'];
			
			# END FORM DO NOT REMOVE THIS LINE

			# OLD START FORM
			//$this->form = [];
			//$this->form[] = ["label"=>"Name","name"=>"name","type"=>"text","required"=>TRUE,"validation"=>"required|string|min:3|max:70","placeholder"=>"You can only enter the letter only"];
			//$this->form[] = ["label"=>"Photo","name"=>"photo","type"=>"upload","required"=>TRUE,"validation"=>"required|image|max:3000","help"=>"File types support : JPG, JPEG, PNG, GIF, BMP"];
			//$this->form[] = ["label"=>"Email","name"=>"email","type"=>"email","required"=>TRUE,"validation"=>"required|min:1|max:255|email|unique:cms_users","placeholder"=>"Please enter a valid email address"];
			//$this->form[] = ["label"=>"Password","name"=>"password","type"=>"password","required"=>TRUE,"validation"=>"min:3|max:32","help"=>"Minimum 5 characters. Please leave empty if you did not change the password."];
			//$this->form[] = ["label"=>"Cms Privileges","name"=>"id_cms_privileges","type"=>"select2","required"=>TRUE,"validation"=>"required|integer|min:0","datatable"=>"cms_privileges,name"];
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
	        $this->sub_module[] = ['label'=>'Detail Toko','path'=>'tb_tokos','parent_columns'=>'name','foreign_key'=>'id_user','button_color'=>'success','button_icon'=>'fa fa-bars'];


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
	        $sales = DB::table('cms_users')->where('id_cms_privileges', 5)->get();
	        
	        foreach ($sales as $key => $value) {
	        	$this->button_selected[] = ['label'=>$value->name,'icon'=>'fa fa-check','name'=>'sales_'.$value->id];
	        }

	                
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
	        $sales = DB::table('cms_users')->where('id_cms_privileges', 5)->get();
	        
	        foreach ($sales as $key => $value) {
	        	if($button_name == 'sales_'.$value->id) {
				    $toko = TbToko::where('id_user', $id_selected)->first();
				    $toko->id_sales = $value->id;
				    $toko->save();
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
	        $me = CRUDBooster::me();
	        	// dd($me->email);
	       	$query->where('id_cms_privileges', 6);
	        
	            
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate row of index table html 
	    | ---------------------------------------------------------------------- 
	    |
	    */    
	    public function hook_row_index($column_index,&$column_value) {	        
			//Your code here
			if ($column_index == 3) {
				$toko = TbToko::where('id_user', $column_value)->first();

				$column_value = '
					Nama Toko ; '.$toko->nama_toko.' <br>
					Nama Pemilik ; '.$toko->nama_pemilik.' <br>
					Email ; '.$toko->email.' <br>
					No. Telepon ; '.$toko->no_telepon.' <br>
					No. Handphone ; '.$toko->no_handphone.' <br>
					Alamat ; '.$toko->alamat.' <br>
					Kota ; '.$toko->kota.' <br>
					Provinsi ; '.$toko->provinsi.' <br>
					Kode Pos ; '.$toko->kode_pos.' <br>
				';
			}

			if ($column_index == 4) {
				$toko = TbToko::where('id_user', $column_value)->first();
				$cms_users = DB::table('cms_users')->find($toko->id_sales);

				$column_value = $cms_users->name;
			}
	    }

	    /*
	    | ---------------------------------------------------------------------- 
	    | Hook for manipulate data input before add data is execute
	    | ---------------------------------------------------------------------- 
	    | @arr
	    |
		*/
		var $nama_toko;
		var $nama_pemilik;
		var $email;
		var $no_telepon;
		var $no_handphone;
		var $provinsi;
		var $kota;
		var $kode_pos;
		var $alamat;
	    public function hook_before_add(&$postdata) {        
			//Your code here
			$this->nama_toko = $postdata['nama_toko'];
			$this->nama_pemilik = $postdata['nama_pemilik'];
			$this->email = $postdata['email'];
			$this->no_telepon = $postdata['no_telepon'];
			$this->no_handphone = $postdata['no_handphone'];
			$this->provinsi = $postdata['provinsi'];
			$this->kota = $postdata['kota'];
			$this->kode_pos = $postdata['kode_pos'];
			$this->alamat = $postdata['alamat'];

			// dd($postdata);

			unset($postdata['detail_data_header']);
			unset($postdata['nama_toko']);
			unset($postdata['nama_pemilik']);
			unset($postdata['no_telepon']);
			unset($postdata['no_handphone']);
			unset($postdata['provinsi']);
			unset($postdata['kota']);
			unset($postdata['kode_pos']);
			unset($postdata['alamat']);

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
			$user = User::latest()->first();

			$toko = new TbToko;
			$toko->id_user = $user->id;
			$toko->nama_toko = $this->nama_toko;
			$toko->nama_pemilik = $this->nama_pemilik;
			$toko->email = $this->email;
			$toko->no_telepon = $this->no_telepon;
			$toko->no_handphone = $this->no_handphone;
			$toko->provinsi = $this->provinsi;
			$toko->kota = $this->kota;
			$toko->kode_pos = $this->kode_pos;
			$toko->alamat = $this->alamat;
			$toko->timestamps = true;
			$toko->save();

	     //    $data = User::find($id);
	    	// // dd($data);
	     //    Mail::send('frontend.email',  ['data' => $data], function($message) use ($data) {
      //           $message->to($data->email);
      //           $message->from('admin@doremi.com');
      //           $message->subject('Notifikasi Akun');
      //       });

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
			$toko = TbToko::where('id_user', $id)->delete();

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