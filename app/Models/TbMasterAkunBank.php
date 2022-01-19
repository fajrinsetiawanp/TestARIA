<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbMasterAkunBank extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'no_rekening', 'bank', 'deskripsi'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_master_akun_banks";
}
