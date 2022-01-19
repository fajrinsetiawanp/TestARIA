<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbToko extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_sales', 'nama_sales', 'nama_toko', 'nama_pemilik', 'no_telepon', 'no_handphone', 'provinsi', 'kota', 'kode_pos', 'alamat', 'id_user'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_tokos";
}
