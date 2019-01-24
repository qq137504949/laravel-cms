<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminLog;
use App\Models\Menu;
use App\Services\Core;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MenuController extends BaseController
{
    use Core;
    public function index(Request $request)
    {
        $where=[];
        if($keywords = $request->input('menu_name')){
            $where=[
                ['menu_name','like','%'.$keywords.'%']
            ];
        }
        $menulist = Menu::where($where)->paginate(10);
        return view('admin.menu-list',compact('menulist'));
    }

    public function create()
    {
        $menus = Menu::where('parent_id',0)->get();

        return view('admin.menu-add',compact('menus'));
    }

    public function store(Request $request)
    {
        $post = $request->input();
        if(Menu::create($post)){
            //日志开始
            $this->AdminLog('['.Auth::user()->user_name.']创建菜单-'.$post['menu_name']);

            //日志结束
            return $this->showMessage('保存成功！','admin/menu');
        }

        return $this->showMessage('保存失败！');
    }

    public function destroy(Menu $menu)
    {
        $is_menu = Menu::where('parent_id',$menu->menu_id)->first();
       if($is_menu){
           return response()->json("2");
       }
       //记录管理员日志
        $this->AdminLog('['.Auth::user()->user_name.']删除菜单-'.$menu->menu_name);

        if($menu->delete()){
            return response()->json("0");
        }
        return response()->json("-1");
    }

    public function edit(Menu $menu)
    {
        $menus = Menu::where('parent_id',0)->get();
        return view('admin/menu-edit',compact('menu','menus'));
    }

    public function update(Menu $menu,Request $request){
        $post = $request->input();
//        dd($post);
        //日志
        $this->AdminLog('['.Auth::user()->user_name.']修改菜单-'.$menu->menu_name.'->'.$post['menu_name']);
        if($menu->update($post)){
            return $this->output_data("修改成功");
        }
        return $this->output_error('修改失败');


    }
}
