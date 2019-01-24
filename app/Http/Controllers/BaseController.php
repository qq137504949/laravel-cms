<?php

namespace App\Http\Controllers;

use App\Models\System;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    protected $system;
    protected $menu;
    public function __construct()
    {
        $this->system = System::find(1);
        view()->share(['system'=>$this->system]);
    }



    /**
     * @param $message 消息
     * @param string $url  路径
     * @param int $time 时间
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    function showMessage($message,$url='',$time=2)
    {

        //验证参数
        if ($message) {
            if($url){
                $data = [
                    'message' => $message,
                    'url' => url($url),
                    'jumpTime' => $time
                ];
            }else{
                $data = [
                    'message' => $message,
                    'url' => 'javascript:history.back();',
                    'jumpTime' => $time
                ];
            }
        } else {
            $data = [
                'message' => '非法访问！',
                'url' => 'javascript:history.back();',
                'jumpTime' => 2,
            ];
        }
        return view('admin.message', ['data' => $data]);
    }


}
