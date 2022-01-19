<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbGambarProduk extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_produk', 'gambar', 'gambar_utama'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_gambar_produks";
}
