<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminLog;
use App\Services\Core;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{

    use Core;

    public function login(Request $request)
    {
        $post = $request->input();

        if(\auth('admin')->attempt(['user_name'=>$post['user_name'],'password'=>$post['password']],$request->input('remember',0))){
            $user = \auth('admin')->user();
            $this->AdminLog('管理员['.$user->user_name.']登录');
            return redirect('admin');
        }else{
           return redirect('admin/login')->withInput($request->except('password'))->with('msg', '用户名或密码错误');
        }
    }

    public function logout()
    {
        $user = auth('admin')->user();
        $this->AdminLog('管理员['.$user->user_name.']退出登录');
        auth('admin')->logout();
        return redirect('admin/login');
    }
}
