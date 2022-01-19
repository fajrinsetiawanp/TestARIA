<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbWarnaProduk extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_produk', 'id_warna'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_warna_produks";
}
