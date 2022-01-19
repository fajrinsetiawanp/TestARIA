<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbAlamatKirim extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_order', 'nama_depan', 'nama_belakang', 'email', 'no_handphone', 'alamat', 'id_kota', 'kota', 'id_provinsi', 'provinsi', 'kode_pos'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_alamat_pengirimen";
}
