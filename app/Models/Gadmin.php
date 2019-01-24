<?php

namespace App\Models;

use App\Services\Core;
use Illuminate\Database\Eloquent\Model;

class Gadmin extends Model
{
    use Core;
    protected $guarded=[];
    protected $table='gadmin';
    protected $primaryKey='gid';
    public $timestamps=false;

    public function menus()
    {
        $arr = explode(',',$this->limits);
        if($arr){
            $menus = Menu::whereIn('menu_id',$arr)->orderBy('sort')->get()->toArray();
            return $this->createMenuDiGui($menus);
        }
        return null;
    }



}
