<?php
namespace App\Repositories;

class MapRepository{

    /**
     * 根据地址获取经纬度
     * @param $address
     * @return array
     */
    public function get_jwd($address)
    {
        $host='http://api.map.baidu.com/geocoder/v2/?address='.$address.'&output=json&ak=AF2923e054732cc2d320dda6e3c4247b&callback=showLocation';
        $ch = curl_init();
        curl_setopt ($ch, CURLOPT_URL, $host);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT,10);
        $result = curl_exec($ch);

        $result = strstr($result, ')', TRUE);
        $result = strstr($result, '{');

        $res = json_decode($result,true);
        return $res;
    }


    /**
     * 根据经纬度查询附近商户地址
     * @param $lat_lng
     * @return mixed|string
     */
    public function jwd_shop($lat_lng)
    {
        $host = 'http://api.map.baidu.com/geocoder/v2/?ak=AF2923e054732cc2d320dda6e3c4247b&location='.$lat_lng.'&output=json&pois=1';
        $result = file_get_contents($host);
        $result = json_decode($result,true);
        $result = $result['result']['pois'];
        return $result;
    }
    //根据经纬度返回地址
    public function getAddress($lat_lng){
        //$lat_lon = '31.298247284063569,120.66298796130684';
        $lat_lng = isset($lat_lng)?$lat_lng:'0,0';
        $result = $this->jwd_ads($lat_lng);
        if($result){
            return $result;
        }else{
            return '当前位置不能定位，请走动走动';
        }
    }

    //根据地址查询输入的地址查询附近地址
    public function ads_fjads($address){
        $city = '上海市';
        $host = 'http://api.map.baidu.com/place/v2/suggestion?query='.$address.'&region='.$city.'&output=json&ak=AF2923e054732cc2d320dda6e3c4247b';
        $result=file_get_contents($host);
        return json_decode($result);
    }

    protected function jwd_ads($lat_lng)
    {
        $host = 'http://api.map.baidu.com/geocoder/v2/?ak=AF2923e054732cc2d320dda6e3c4247b&location='.$lat_lng.'&output=json&pois=0';
        $result = file_get_contents($host);
        $result = json_decode($result,true);
        return $result['result']['formatted_address'];
    }
}