<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TbDashboard extends Model
{
    //
    //
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'name' , 'id_cms_privileges' , 'content'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
    
    ];
    
    protected $table = "tb_dashboard";
}
