<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbLokasiStokProduk extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_lokasi', 'id_produk', 'id_lokasi', 'jumlah_stok'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_lokasi_stok_produks";
}
