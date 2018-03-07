<?php
namespace App\Services;


use App\Models\AdminLog;
use App\Models\Order;
use App\Models\Orders;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

trait Core{

    /**
     * 获取ID地址
     * @return mixed
     */
    public function getIp(){
        if(isset($_SERVER["HTTP_X_REAL_IP"]))
        {
            return $_SERVER["HTTP_X_REAL_IP"];
        }
        return $_SERVER["REMOTE_ADDR"];
    }


    /**
     * @desc 根据两点间的经纬度计算距离
     * @param float $lat 纬度值
     * @param float $lng 经度值
     */
    function getDistance($lat1, $lng1, $lat2, $lng2){
        $earthRadius = 6367000; //approximate radius of earth in meters
        $lat1 = ($lat1 * pi() ) / 180;
        $lng1 = ($lng1 * pi() ) / 180;
        $lat2 = ($lat2 * pi() ) / 180;
        $lng2 = ($lng2 * pi() ) / 180;
        $calcLongitude = $lng2 - $lng1;
        $calcLatitude = $lat2 - $lat1;
        $stepOne = pow(sin($calcLatitude / 2), 2) + cos($lat1) * cos($lat2) * pow(sin($calcLongitude / 2), 2);
        $stepTwo = 2 * asin(min(1, sqrt($stepOne)));
        $calculatedDistance = $earthRadius * $stepTwo;
        return round($calculatedDistance);
    }

    /**
     * 日志
     * @param $content
     * @return mixed
     */
    public function AdminLog($content)
    {
        $data=[
            'content'=>$content,
            'admin_name'=>Auth::user()->user_name,
            'admin_id'=>Auth::user()->admin_id,
            'ip'=>$this->getIp(),
        ];
        return AdminLog::create($data);
    }

    /**
     * 后台菜单整理
     * @param $caidan 菜单
     * @param int $parend_id  父ID
     * @return array  数组
     */
    public function createMenuDiGui($caidan,$parend_id=0){
        $menu = [];
        foreach ($caidan as $k=>$v){
            if($v['parent_id'] == $parend_id){
                $children = $this->createMenuDiGui($caidan,$v['menu_id']);
                if(!empty($children))$v['erji']=$children;
                $menu[] = $v;
            }
        }
        return $menu;
    }

    /**
     * 订单号
     * @return string
     */
    public function orderSn()
    {
        $order_num = Order::whereBetween('created_at',[Carbon::today(),Carbon::now()])->count()+1;
        return date('YmdHis',time()).'-'.sprintf("%03d", $order_num);
    }
}

