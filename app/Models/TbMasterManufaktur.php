<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbMasterManufaktur extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'logo', 'deskripsi'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_master_manufakturs";
}
