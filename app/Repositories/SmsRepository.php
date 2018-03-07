<?php

namespace App\Repositories;

class SmsRepository{

    function sendSMS($mobile,$content,$time='',$mid='')
    {
        $content = iconv('utf-8','gbk',$content);
        $http = 'http://http.yunsms.cn/tx/';
        //$uid = '2105111121';							//用户账号
        //$pwd = '545psc';
        $uid = '57226';
        $pwd = '3gb92g';
        $data = array
        (
            'uid'=>$uid,					//用户账号
            'pwd'=>strtolower(md5($pwd)),	//MD5位32密码
            'mobile'=>$mobile,				//号码
            'content'=>$content,			//内容 如果对方是utf-8编码，则需转码iconv('gbk','utf-8',$content); 如果是gbk则无需转码
            'time'=>$time,		//定时发送
            'mid'=>$mid						//子扩展号
        );
        $re= $this->postSMS($http,$data);			//POST方式提交
        if( trim($re) == '100' )
        {
           // return "发送成功!";
            return true;
        }
        else
        {
            //return "发送失败! 状态：".$re;
            return false;
        }
    }

    function postSMS($url,$data='')
    {
        $row = parse_url($url);
        $post='';
        $host = $row['host'];
        $port = 80;
        $file = $row['path'];
        while (list($k,$v) = each($data))
        {
            $post .= rawurlencode($k)."=".rawurlencode($v)."&";	//转URL标准码
        }
        $post = substr( $post , 0 , -1 );
        $len = strlen($post);
        $fp = @fsockopen( $host ,$port, $errno, $errstr, 10);
        if (!$fp) {
            return "$errstr ($errno)\n";
        } else {
            $receive = '';
            $out = "POST $file HTTP/1.1\r\n";
            $out .= "Host: $host\r\n";
            $out .= "Content-type: application/x-www-form-urlencoded\r\n";
            $out .= "Connection: Close\r\n";
            $out .= "Content-Length: $len\r\n\r\n";
            $out .= $post;
            fwrite($fp, $out);
            while (!feof($fp)) {
                $receive .= fgets($fp, 128);
            }
            fclose($fp);
            $receive = explode("\r\n\r\n",$receive);
            unset($receive[0]);
            return implode("",$receive);
        }
    }
}