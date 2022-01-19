<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbMasterKupon extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_kupon', 'kode_kupon', 'tanggal_awal', 'tanggal_akhir', 'diskon', 'jumlah_kupon', 'jumlah_kupon_customer', 'status', 'jenis_kupon'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_master_kupons";
}
