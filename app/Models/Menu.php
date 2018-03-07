<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable=[
        'menu_name','menu_icon','menu_link','parent_id'
    ];
    protected $table='admin_menus';
    protected $primaryKey='menu_id';
    public $timestamps=false;


}
