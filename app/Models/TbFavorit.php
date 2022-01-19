<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbFavorit extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_produk', 'id_customer'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_favorits";
}
