<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbBiayaLayanan extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'biaya', 'biaya_tambahan'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_biaya_layanans";
}
