<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbProduk extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kode_sku', 'judul', 'deskripsi_singkat', 'spesifikasi_produk', 'berat', 'id_sub_kategori', 'kategori', 'id_manufaktur', 'manufaktur', 'label_produk', 'label_owner', 'status', 'id_kategori', 'gambar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_produks";
}
