<?php

namespace App\Http\Controllers\Admin;

use App\Models\Group;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends BaseController
{
    public function index(Request $request)
    {
        $where = [];
        if($keywords = $request->input('name')){
            $where=[
              ['name','like','%'.$keywords.'%']
            ];
        }
        $user = Group::where($where)->paginate(10);
        return view('admin.group-list',compact('user'));
    }

    public function create()
    {
        return view('admin.group-add');
    }

    public function store(Request $request)
    {
        $post = $request->except(['files']);
        if(!$file = $request->file('z_img')){
            return $this->showMessage('请选择头像');
        }
        $post['z_img'] = $this->uploadImg($file,'touxiang');
        if(Group::create($post)){
            return $this->showMessage('保存成功','admin/group');
        }
        return $this->showMessage('保存失败');
    }

    public function destroy(Group $group)
    {
        if($group->delete()){
            return response()->json("0");
        }
        return response()->json("-1");
    }

    public function edit(Group $group)
    {
        return view('admin.group-edit',compact('group'));
    }

    public function update(Group $group,Request $request)
    {
        $post = $request->except(['files']);
        if($file = $request->file('z_img')){
            $post['z_img'] = $this->uploadImg($file,'touxiang');
            // 图片存在的删除图片
            $z_img = public_path().'/'.$group->z_img;
            if(is_file($z_img)){
                @unlink ($z_img);
            }
        }
        if($group->update($post)){
            return $this->showMessage('保存成功','admin/group');
        }
        return $this->showMessage('保存失败');
    }
}
