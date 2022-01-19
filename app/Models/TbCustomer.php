<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbCustomer extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user', 'nama_depan', 'nama_belakang', 'email', 'no_handphone', 'fax', 'alamat', 'id_kota', 'kota', 'id_provinsi', 'provinsi', 'kode_pos', 'tipe_customer'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_customers";
}
