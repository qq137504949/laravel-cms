<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',function (){
   return Redirect::to('admin');
});

Route::group(['middleware'=>['cache.response']],function () {
//    Route::get('/', 'HomeController@index');
//    Route::post('email','HomeController@sendEmail');
//    Route::any('wechat','WxController@index');
});



//Route::any('menu','WxController@menu');

//Route::group(['middleware' => ['web', 'wechat.oauth']], function () {
//    Route::get('/user', function () {
//        $user = session('wechat.oauth_user'); // 拿到授权用户资料
//
//        dd($user);
//    });
//});