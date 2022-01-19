<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbMasterKota extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_kota', 'nama', 'tipe', 'kode_pos', 'id_provinsi', 'id_primary'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_master_kotas";
}
