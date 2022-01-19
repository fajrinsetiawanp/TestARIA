<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbTipeKategori extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_tipe_kategori', 'id_sub_kategori'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_tipe_kategoris";
}
