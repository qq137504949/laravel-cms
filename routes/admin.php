<?php

//后台登录入口
Route::group(['namespace'=>'Admin'],function (){
    Route::get('login','LoginController@index'); //登录
    Route::get('logout','AuthController@logout');//退出
    Route::post('login_act','AuthController@login');//提交登录
});


/**
 * 后台需要验证的路由
 */
Route::group(['namespace'=>'Admin','middleware'=>['auth:admin','menu']],function (){
    /**
     * 系统管理部分
     *
     */
    Route::get('/','MainController@index');     //主页菜单
    Route::resource('user','UserController');   //后台用户信息
    Route::get('user-pwd','UserController@userPwd');//修改密码页面
    Route::post('update-password/{user}','UserController@updatePassword');//修改用户密码
    Route::get('user-list','UserController@userList');//后台用户列表
    Route::get('zhuye','MainController@zhuye'); //主页右边
    Route::resource('menu','MenuController');   //菜单管理
    Route::get('admin-log','UserController@adminLogs');//管理员日志
    Route::resource('role','GadminController');//角色管理
    Route::get('privilege/{role}','GadminController@privilege');//设置权限页面
    Route::post('privilege/{role}','GadminController@setPrivilege');//设置权限
    Route::get('system','SystemController@index');//系统设置
    Route::post('set-system','SystemController@setSystem');//系统设置提交
    
});