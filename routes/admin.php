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
    Route::Resource('dict','DictController');//数据字典


    Route::resource('storage','StorageController');//仓库管理
    Route::resource('supplier','SupplierController');//供应商管理
    Route::resource('goods','GoodsController');//商品管理
    Route::resource('rk-order','RkOrderController');//入库单
    Route::get('select-goods','RkOrderController@getGoodsList');//select2获取商品
    Route::get('rk-order/print/{rkOrder}','RkOrderController@printOrder');//打印入库单

    Route::resource('draft-sale','DraftSaleController');//草稿箱
    Route::get('draft-sale/goods/{draftSale}','DraftSaleController@saleGoods');//销售商品
    Route::resource('sale-goods','SaleGoodsController');//销售商品
    Route::get('draft-sale/print/{draftSale}','DraftSaleController@printOrder');//打印销售单
    Route::get('draft-sale/sale-order/{draftSale}','DraftSaleController@saleOrder');//生成销售单
    Route::get('member/member-list','MemberController@memberList');//AJAX用户列表
    Route::resource('member','MemberController');//客户管理
    Route::get('storage-goods','StorageGoodsController@goods');//仓库商品列表
    Route::get('storage-goods-info/{storageGoods}','StorageGoodsController@goodsInfo');//仓库单个商品


    Route::resource('sale','SaleController');//销售单管理
    Route::get('production/select-goods/{sale}','SaleController@createSelectGoods');//选择生产订单商品
    Route::post('create-production-order/{sale}','SaleController@createProductionOrder');//生成生产订单
    Route::resource('production','ProductionOrderController');//生产订单管理
    Route::get('production/supplier-show/{order}/{supplier_id}','ProductionOrderController@supplierShow');//生产订单供应商详情
    Route::get('production/supplier-print/{order}/{supplier_id}','ProductionOrderController@supplierPrint');//生产订单打印给供应商
    Route::resource('production-order-goods-suppler','ProductionOrderGoodsSupplerController');//生成订单商品供应商管理


//    Route::get('production-order/{sale}','SaleController@productionOrder');//生成生产订单
//    Route::get('add-production-order/{sale}','SaleController@addProductionOrder');//生成生产订单
//    Route::get('select/supplier-list','SupplierController@supplierList');//select2 AJAX获取供应商列表
//    Route::post('production-order/save-production/{sale}','SaleController@saveProduction');//保存生产订单
//    Route::get('production-edit/{productionOrder}','SaleController@editProduction');//修改生产订单
//    Route::get('production-show/{productionOrder}','SaleController@showProduction');//显示生产订单详情
//    Route::get('production-supplier/{productionOrder}','SaleController@supplierProduction');//ajax 返回店铺信息
//    Route::get('production-print/{productionOrder}','SaleController@printProduction');//打印生产订单详情
//    Route::put('production-update/{productionOrder}','SaleController@updateProduction');//更新生产订单
//    Route::delete('production-del/{productionOrder}','SaleController@delProduction');//删除生产订单
    Route::get('production-rk/{productionOrder}','SaleController@rkProduction');//生产订单入库
//    Route::resource('production-order-goods','ProductionOrderGoodsController');//生成订单商品
    Route::get('production-order/goods/{productionOrder}','ProductionOrderController@goods');//生成订单商品列表
    Route::get('delivery-order-goods/goods-info','DeliveryOrderGoodsController@goodsInfo');//查询当时商品
    Route::get('delivery-order/goods-list','DeliveryOrderController@goodsList');//AJAX获取仓库商品或者生产订单商品
    Route::get('delivery-order/delivery/{deliveryOrder}','DeliveryOrderController@delivery');//发货操作
    Route::resource('delivery-order','DeliveryOrderController');//送货单
    Route::get('delivery-order/print/{deliveryOrder}','DeliveryOrderController@deliveryPrint');//打印送货单
    Route::resource('delivery-order-goods','DeliveryOrderGoodsController');//送货单商品
    Route::resource('receivable','ReceivableController');//收款管理

    Route::get('sale/sale-end-1/{sale}','SaleController@saleEnd1');//结单操作1
    Route::get('sale/sale-end-2/{sale}','SaleController@saleEnd2');//结单操作2
    Route::get('sale/sale-end/{sale}','SaleController@saleEnd');//结款
    Route::get('sale-all-end-1','SaleController@saleAllEnd1');//批量结单第一步
    Route::resource('album','AlbumController');//文件管理
    Route::resource('doc','DocController');//文档管理

    Route::post('uploads-img','BaseController@summernoteUploads');//公用图片上传接口

    Route::get('crk-statistic','CrkStatisticController@index');//出入库统计
    Route::get('get-year-zong','CrkStatisticController@getYearZong');//年销量
    Route::get('sale-statistic','CrkStatisticController@saleStatistic');//销售单统计
    Route::get('get-month-zong','CrkStatisticController@getMonthZong');//月销量
    Route::get('export-excel','CrkStatisticController@exportExcel');//excel导出
    Route::get('sale-all','CrkStatisticController@saleAll');//销售单全部记录
    Route::get('sale-all-order/{receivable}','CrkStatisticController@saleAllOrder');//销售单付款记录
    Route::get('payment-order','CrkStatisticController@paymentOrder');//应付款订单
    Route::get('payment-order/{payment}','CrkStatisticController@paymentOrderInfo');//明细

    Route::get('payment-open','CrkStatisticController@paymentOpen');//付款操作
    Route::post('payment-save','CrkStatisticController@paymentSave');//付款保存
    Route::get('payment-all-end-1','CrkStatisticController@paymentSAllEnd1');//批量付款第一步

});