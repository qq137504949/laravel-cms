<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Config;

class ApiBaseController extends Controller{

    /**
     * 正确JSON格式输出
     * @param $data
     * @return array
     */
    public function output_data($data)
    {
        $arr = [];
        $arr['code'] = Config::get('system.SUCCESS');
        $arr['data'] = $data;
        $arr['msg'] = '成功';
        return response()->json($arr);
    }

    /**
     * transFormer  json数据整理
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    public function output_transFormer($data)
    {
        $arr = [];
        $arr['code'] = Config::get('system.SUCCESS');
        $arr['data'] = $data['data'];
        $arr['msg'] = '成功';
        if(isset($data['meta'])){
        $arr['pagination'] = $data['meta']['pagination'];
        }
        return response()->json($arr);
    }

    /**
     * 错误JSON格式输出
     * @param $err 错误消息 string
     * @return array
     */
    public function output_error($err)
    {
        $arr = [];
        $arr['code'] = Config::get('system.ERROR');
        $arr['err'] = $err;
        $arr['msg'] = '失败';
        return response()->json($arr);
    }
}