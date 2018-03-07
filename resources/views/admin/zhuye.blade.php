@extends('admin.layouts.app')
@section('content')
    <div class="wrapper wrapper-content">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h4>欢迎使用关爱通CMS系统管理系统</h4>
            </div>
            <div class="ibox">
                <div class="ibox-title">
                    <h5>使用说明</h5>
                </div>
                <div class="ibox-content">
                    {{--<p>欢迎使用关爱通CMS系统管理系统</p>--}}
                    <ul>
                        <li>系统管理
                            <ul>
                                <li>角色管理</li>
                                <p>->权限管理设置角色权限</p>
                                <li>用户管理</li>
                                <p>->后台用户关系</p>
                                <li>菜单管理</li>
                                <p>->设置后台菜单</p>
                                <li>管理员日志</li>
                                <p>->记录管理操作</p>
                            </ul>
                        </li>


                        {{--<li>商品管理->添加商品->选择相应的供应商(商品可随时修改。如：价格)</li>--}}
                        {{--<li>采购入库->添加采购单->入库(点击入库到仓库后信息无法修改(入库完成))</li>--}}
                        {{--<li>销售出库->添加出库单->发货(点击发货后不能修改信息)</li>--}}
                        {{--<li>统计->销售统计->财务总账(出入库所有总额，月季度经销存总额)</li>--}}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
