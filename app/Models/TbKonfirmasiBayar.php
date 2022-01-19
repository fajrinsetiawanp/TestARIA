<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbKonfirmasiBayar extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama', 'email', 'tanggal_bayar', 'jumlah_bayar', 'bank_tujuan', 'nama_rekening_pengirim', 'no_invoice', 'catatan', 'file'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_konfirmasi_bayars";
}
