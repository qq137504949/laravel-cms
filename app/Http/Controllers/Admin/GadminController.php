<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use App\Models\Gadmin;
use App\Models\Menu;
use App\Services\Core;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class GadminController extends BaseController
{
    use Core;
    public function index(Request $request)
    {
        $where=[];
        if($keywords = $request->input('gname')){
            $where=[
                ['gname','like','%'.$keywords.'%']
            ];
        }
        $roles = Gadmin::where($where)->paginate(10);
        return view('admin.role-list',compact('roles'));
    }

    public function create()
    {
        return view('admin.role-add');
    }

    public function store(Request $request)
    {
        if(Gadmin::create($request->input())){
            $this->AdminLog('['.Auth::user()->user_name.']创建角色-'.$request->input('gname'));
            return $this->showMessage("保存成功",'admin/role');
        }

    }

    public function edit(Gadmin $role)
    {
        return view('admin.role-edit',compact('role'));
    }

    public function update(Gadmin $role,Request $request)
    {
        $post = $request->input();
        $this->AdminLog('['.Auth::user()->user_name.']修改角色-'.$role->gname.'->'.$post['gname']);
        if($role->update($post)){
            return $this->showMessage("修改成功",'admin/role');
        }

    }

    public function destroy(Gadmin $role)
    {
        $admin = Admin::where('admin_gid',$role->gid)->first();
        if($admin){
            return response()->json("2");
        }
        if($role->delete()){
            return response()->json("0");
        }
        return response()->json("-1");

    }

    public function privilege(Gadmin $role)
    {
        $menus = Menu::get()->toArray();
        $menus =$this->createMenuDiGui($menus);

        return view('admin.privilege',compact('role','menus'));
    }

    public function setPrivilege(Gadmin $role,Request $request)
    {
        $post = $request->input();
        $role_ids = '';
        foreach ($post as $k=>$v){
            if(strstr($k, 'chkGroup_')){
                $role_ids.= $v .',';
            }else if(strstr($k, 'action_')){
                $role_ids .= implode(',', $v) . ',';
            }
        }
        $limits = substr($role_ids, 0,strlen($role_ids)-1);
        $role->limits = $limits;
        if($role->update()){
            $this->AdminLog('['.Auth::user()->user_name.']修改权限-'.$role->gname.'->['.$limits.']');
            return $this->showMessage("设置成功",'admin/role');
        }
    }


}
