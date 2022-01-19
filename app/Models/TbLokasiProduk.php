<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbLokasiProduk extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_lokasi', 'alamat', 'longitude', 'latitude', 'deskripsi', 'gambar', 'id_kota', 'kota', 'kode_pos'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_lokasi_produks";
}
