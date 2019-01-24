<?php

namespace App\Http\Controllers;

use App\Jobs\SendReminderEmail;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class HomeController extends BaseController
{

    public function index()
    {
       return view('welcome');
    }

    public function sendEmail(Request $request)
    {
         $this->validate($request,[
             'name'    => 'required',
             'email' => 'required|email',
             'message'=>'required',
             'mobile'=>'required'
         ],[
             'name.required'=>'请填写名字',
             'email.required'=>'请填写邮箱',
             'email.email'=>'邮箱格式不正确',
             'mobile.required'=>'手机号码必须填写'
         ]);
         $msg = Message::create($request->post());
         $this->dispatch(new SendReminderEmail($msg));
            return $this->showMessage("留言成功!","/");
//         return redirect('/')->with('msg', '留言成功！');
    }
}
