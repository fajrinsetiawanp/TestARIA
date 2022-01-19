<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbMasterJasaKirim extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'nama_singkatan', 'deskripsi'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_master_jasa_kirims";
}
