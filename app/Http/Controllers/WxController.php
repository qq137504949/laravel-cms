<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use EasyWeChat\Kernel\Messages\Text;

class WxController extends Controller
{
    public function index()
    {
        Log::info('request arrived.'); # 注意：Log 为 Laravel 组件，所以它记的日志去 Laravel 日志看，而不是 EasyWeChat 日志

        $app = app('wechat.official_account');
        $app->server->push(function ($message) {
            switch ($message['MsgType']) {
                case 'event':
                    if ($message['Event'] == 'subscribe') {
                        $hour = date('H');
                        if ($hour < 6) {
                            return "又是一个不眠夜！欢迎关注【旭宓科技】\n" . Carbon::now()->toDateTimeString();
                        } else if ($hour < 9) {
                            return "新的一天开始啦！欢迎关注【旭宓科技】\n" . Carbon::now()->toDateTimeString();
                        } else if ($hour < 12) {
                            return "上午工作顺利吗？欢迎关注【旭宓科技】\n" . Carbon::now()->toDateTimeString();
                        } else if ($hour < 14) {
                            return "中午好！欢迎关注【旭宓科技】\n" . Carbon::now()->toDateTimeString();
                        } else if ($hour < 17) {
                            return "下午好!别打盹哦！欢迎关注【旭宓科技】\n" . Carbon::now()->toDateTimeString();
                        } else if ($hour < 19) {
                            return "傍晚好!下班了！欢迎关注【旭宓科技】\n" . Carbon::now()->toDateTimeString();
                        } else if ($hour < 22) {
                            return "晚上好!夜色多美啊!欢迎关注【旭宓科技】\n" . Carbon::now()->toDateTimeString();
                        } else {
                            return "夜深了，还没睡呀?欢迎关注【旭宓科技】 \n" . Carbon::now()->toDateTimeString();
                        }
                       // return '感谢您的支持!!!\n' . Carbon::now()->toDateTimeString();
                    }
                    return '感谢您的支持!!!';
                    break;
                case 'text':
                    return $this->receiveText($message);
                    break;
                case 'image':
                    return '嘿嘿：图片暂时我还不知道怎么处理';
                    break;
                case 'voice':
                    return '收到语音消息';
                    break;
                case 'video':
                    return '收到视频消息';
                    break;
                case 'location':
                    return '收到坐标消息';
                    break;
                case 'link':
                    return '收到链接消息';
                    break;
                case 'file':
                    return '收到文件消息';
                // ... 其它消息
                default:
                    return '收到其它消息';
                    break;
            }
        });
        return $app->server->serve();
    }

    //文档消息处理
    protected function receiveText($obj)
    {

        return "你好：" . $obj['Content'];
    }

    public function menu()
    {
        $app = app('wechat.official_account');
        $buttons = [
            [
                "type" => "view",
                "name" => "旭宓官网",
                "url" => "http://www.shxumi.com/"
            ],
            [
                "name" => "菜单",
                "sub_button" => [
                    [
                        "type" => "view",
                        "name" => "天气",
                        "url" => "http://weather.html5.qq.com/"
                    ],
                    [
                        "type" => "view",
                        "name" => "视频",
                        "url" => "http://v.qq.com/"
                    ],
                    [
                        "type" => "click",
                        "name" => "赞一下我们",
                        "key" => "V1001_GOOD"
                    ],
                ],
            ],
        ];
        $app->menu->create($buttons);
    }
}
