<?php

namespace App\Http\Controllers\Admin;

use App\Models\System;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SystemController extends BaseController
{
    public function index()
    {
        $system = System::find(1);
        return view('admin.system',compact('system'));
    }

    public function setSystem(Request $request)
    {
        $post = $request->all();

        if($post['id']){
            //更新
            $system = System::where('id',$post['id'])->first();
            if($file = $request->file('logo')){
                //判断图片格式
                $allowed_extensions = ["png", "jpg", "gif","PNG","JPG","JPEG","GIF","jpeg"];
                if ($file->getClientOriginalExtension() && !in_array($file->getClientOriginalExtension(), $allowed_extensions)) {
                    return $this->showMessage('图片格式png,jpg,gif,jpeg');
                }
                $post['logo'] = $this->uploadImg($file,'logo');
                $logo= public_path().'/'.$system->logo;
                // 图片存在的删除图片
                if(is_file($logo)){
                    @unlink ($logo);
                }
            }
            if($system->update($post)){
                return $this->showMessage("保存成功");
            }
        }else{
            if($file = $request->file('logo')){
                $post['logo'] = $this->uploadImg($file,'logo');
            }
            //保存
            if(System::create($post)){

                return $this->showMessage("保存成功");
            }
        }
        return $this->showMessage("保存失败，请重试");
    }
}
