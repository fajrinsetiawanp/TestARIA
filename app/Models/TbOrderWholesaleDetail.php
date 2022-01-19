<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbOrderWholesaleDetail extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_order', 'id_produk', 'harga_satuan', 'qty', 'diskon_1', 'diskon_2', 'diskon_3', 'jumlah_total', 'note', 'status', 'note_acc', 'id_user'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_order_wholesale_details";
}
