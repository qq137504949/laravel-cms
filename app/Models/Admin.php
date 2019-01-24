<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';
//    protected $redirectTo = '/admin/login';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'email', 'password','admin_login_time','admin_login_num','admin_is_super','admin_gid','name','mobile',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $table='admin';
    protected $primaryKey='admin_id';
    protected $dates=[
        'admin_login_time'
    ];


    public function Gadmin()
    {
       return $this->hasOne(Gadmin::class,'gid','admin_gid');
    }
}
