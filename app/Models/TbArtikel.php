<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbArtikel extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'judul', 'deskripsi_singkat', 'deskripsi', 'gambar', 'id_kategori_artikel', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_artikels";
}
