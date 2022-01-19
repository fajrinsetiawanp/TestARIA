<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbOrderWholesale extends Model
{
    //
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_user', 'id_sales', 'nama_sales', 'no_invoice' ,'order_to', 'no_so', 'no_order', 'tanggal', 'payment_terms', 'payment_type', 'jasa_kirim', 'kota_tujuan', 'tarif_ongkir', 'bayar_ditempat', 'total_bayar', 'note', 'status', 'unique_invoice', 'id_customer'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_order_wholesales";
}
