@extends('admin.layouts.app')
@section('content')
    <div class="wrapper wrapper-content">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h4>欢迎使用{{$system->title}}系统管理系统</h4>
            </div>
            <div class="ibox">
                <div class="ibox-title">
                    <h5>使用说明</h5>
                </div>
                <div class="ibox-content">
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

                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
