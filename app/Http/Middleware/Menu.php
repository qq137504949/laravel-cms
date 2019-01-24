<?php

namespace App\Http\Middleware;

use App\Services\Core;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class Menu
{
    use Core;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $admin = Auth::user();
        if($admin->admin_is_super == 1){
            $menus = \App\Models\Menu::orderBy('sort')->get()->toArray();
            //数据整理
            $menus = $this->createMenuDiGui($menus);
        }else{
            $menus = $admin->Gadmin->menus();
        }

        Cache::forever('menus',$menus);

        return $next($request);
    }
}
