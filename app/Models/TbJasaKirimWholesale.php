<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbJasaKirimWholesale extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'kota'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_jasa_kirim_wholesales";
}
