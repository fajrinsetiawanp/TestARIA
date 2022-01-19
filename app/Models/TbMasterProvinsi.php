<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbMasterProvinsi extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_provinsi', 'nama'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_master_provinsis";
}
