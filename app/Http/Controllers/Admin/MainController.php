<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class MainController extends BaseController
{


    public function index(Request $request)
    {
        $menus = Cache::get('menus');
        return view('admin.main',compact('menus'));
    }

    public function zhuye()
    {
        //dd(Auth::user());
        return view('admin.zhuye');
    }
}
