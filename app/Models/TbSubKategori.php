<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbSubKategori extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_sub_kategori', 'id_kategori'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_sub_kategoris";
}
