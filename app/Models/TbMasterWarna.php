<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbMasterWarna extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'warna', 'nama'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_master_warnas";
}
