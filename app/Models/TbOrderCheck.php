<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbOrderCheck extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_order', 'id_jasa_kirim', 'jasa_kirim', 'tarif_ongkir', 'no_resi', 'tanggal_kirim', 'tanggal_terima'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_order_checks";
}
