<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\AdminLog;
use App\Models\Gadmin;
use App\Services\Core;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends BaseController
{
    use Core;

    public function index(Request $request)
    {
        $where = [];
        if($keywords = $request->input('user_name')){
            $where = [
                ['user_name','like','%'.$keywords.'%']
            ];
        }
        $userList = Admin::where($where)->paginate(10);
        return view('admin.user-list',compact('userList'));
    }

    public function create()
    {
        $rules = Gadmin::get();
        return view('admin.user-add',compact('rules'));
    }

    public function store(Request $request)
    {
        $post = $request->input();
        $validator = Validator::make($post,[
            'user_name'=>'unique:admin',
            'email'=>'email|unique:admin',
        ],[
            'user_name.unique'=>'用户名不能重复',
            'email.unique'=>'邮箱不能重复'
        ]);

        if($validator->fails()){
            return $this->output_error($validator->messages()->first());
        }


        $post['password'] = bcrypt($post['password']);
        if(Admin::create($post)){
            return $this->output_data("保存成功");
        }
        return $this->output_error("保存错误");

    }

    public function destroy(Admin $user)
    {
        //记录管理员日志
        $this->AdminLog('['.Auth::user()->user_name.']删除用户-'.$user->user_name);
        if($user->delete()){
            return response()->json("0");
        }
        return response()->json("-1");
    }

    public function edit(Admin $user)
    {
        $rules = Gadmin::get();
        return view('admin.user-edit',compact('user','rules'));
    }

    public function update(Admin $user,Request $request)
    {
        $post = $request->input();
        if($user->update($post)){
            return $this->output_data("更新成功");
        }
        return $this->output_error("更新失败");
    }

    public function userPwd()
    {
        return view('admin.user-password');
    }

    public function updatePassword(Admin $user,Request $request)
    {

        $this->validate($request, [
            'password'=>'required|min:6',
            'password_confirm' => 'required|min:6',
        ]);
        $result = $user->fill(['password'=>Hash::make($request->password)])->save();
        if($result){
           Auth::logout();
          return redirect('admin');
        }
    }

    public function adminLogs(Request $request)
    {
        $where=[];
        if($keywords = $request->input('admin_name')){
            $where=[
                ['content','like','%'.$keywords.'%']
            ];
        }
        $logs = AdminLog::where($where)->orderby('id','desc')->paginate(10);
        return view('admin.admin-log',compact('logs'));

    }

}
