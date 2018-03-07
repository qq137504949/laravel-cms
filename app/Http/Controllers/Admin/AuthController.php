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

        if(\auth('admin')->attempt(['user_name'=>$post['user_name'],'password'=>$post['password']],1)){
            $user = \auth('admin')->user();
            $data=[
                'content'=>'管理员['.$user->user_name.']登录',
                'admin_name'=>$user->user_name,
                'admin_id'=>$user->admin_id,
                'ip'=>$this->getIp(),
            ];
            AdminLog::create($data);
            return redirect('admin');
        }else{
           return redirect('admin/login')->withInput($request->except('password'))->with('msg', '用户名或密码错误');
        }
    }

    public function logout()
    {
        $user = \auth('admin')->user();
        $data=[
            'content'=>'管理员['.$user->user_name.']退出登录',
            'admin_name'=>$user->user_name,
            'admin_id'=>$user->admin_id,
            'ip'=>$this->getIp(),
        ];
        AdminLog::create($data);
        \auth('admin')->logout();
        return redirect('admin/login');
    }
}
