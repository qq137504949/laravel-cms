<?php

namespace App\Http\Controllers\Admin;

use App\Models\Goods;
use App\Models\Purchase;
use App\Models\Sale;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\URL;

class BaseController extends Controller
{
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

    /**
     * 计算商品编号
     */
    public function goodsSn()
    {
        $count = Goods::whereBetween('created_at',[Carbon::now()->today(),Carbon::now()->tomorrow()])->count();
        return 'g-'.date('YmdHi',time()).'-'.($count+1);

    }
    /**
     * 计算商品编号
     */
    public function purchaseSn()
    {
        $count = Purchase::whereBetween('created_at',[Carbon::now()->today(),Carbon::now()->tomorrow()])->count();
        return 'rk-'.date('YmdHi',time()).'-'.($count+1);

    }

    /**
     * 计算商品编号
     */
    public function saleSn()
    {
        $count = Sale::whereBetween('created_at',[Carbon::now()->today(),Carbon::now()->tomorrow()])->count();
        return 'ck-'.date('YmdHi',time()).'-'.($count+1);

    }

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

    /**
     * 上传商品图片
     * @param $file  file名称
     * @return 返回路径
     */
    public function uploadImg($file)
    {
        $imgPath='uploadfile/'.Carbon::now()->format('Y').'/'.Carbon::now()->format('md').'/';
        $extension = $file->getClientOriginalExtension();
        $fileName = str_random(10).'.'.$extension;
        $file->move($imgPath, $fileName);
        return $imgPath.$fileName;
    }

    /**
     * summernote 编辑器上传图片
     */
    public function summernoteUploads(Request $request)
    {
        $imgPath='storage/uploads/summernote/';
        if($file = $request->file('file')){

            $extension = $file->getClientOriginalExtension();
            $fileName = time().str_random(4).'.'.$extension;
            $file->move($imgPath, $fileName);
            return asset($imgPath.$fileName);
        }

    }
}
