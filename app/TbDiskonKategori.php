<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbDiskonKategori extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_diskon_group', 'qty', 'diskon', 'diskon2'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_diskon_kategoris";
}
