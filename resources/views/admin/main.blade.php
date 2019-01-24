<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">

    <title> {{$system->title}}管理系统</title>

    <meta name="keywords" content="">
    <meta name="description" content="">

    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->

    <link rel="shortcut icon" href="favicon.ico"> <link href="{{asset('system/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('system/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('system/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('system/css/style.css')}}" rel="stylesheet">


</head>

<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
<div id="wrapper">
    <!--左侧导航开始-->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="nav-close"><i class="fa fa-times-circle"></i>
        </div>
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                                <span class="clear">
                                    <span class="block m-t-xs" style="font-size:20px;">
                                        {{--<i class="fa fa-area-chart"></i>--}}
                                        <strong class="font-bold">{{$system->title}}</strong>
                                    </span>
                                </span>
                        </a>
                    </div>

                </li>

                <li>
                    <a class="J_menuItem" href="{{asset('admin/zhuye')}}">
                        <i class="fa fa-home"></i>
                        <span class="nav-label">主页</span>
                    </a>
                </li>

                @foreach($menus as $item)
                <li>
                    <a href="#"><i class="fa {{$item['menu_icon']}}"></i> <span class="nav-label">{{$item['menu_name']}}</span><span class="fa arrow"></span></a>
                    @if(isset($item['erji']))
                    <ul class="nav nav-second-level">
                        @foreach($item['erji'] as $value)
                        <li><a class="J_menuItem" href="{{asset($value['menu_link'])}}">{{$value['menu_name']}}</a>
                        </li>
                            @endforeach
                    </ul>
                    @endif
                </li>
                    @endforeach


            </ul>
        </div>
    </nav>
    <!--左侧导航结束-->
    <!--右侧部分开始-->
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
                <div class="navbar-header"><a class="navbar-minimalize minimalize-styl-2 btn btn-info " href="#"><i class="fa fa-bars"></i> </a>
                    {{--<form role="search" class="navbar-form-custom" method="post" action="#">--}}
                        {{--<div class="form-group">--}}
                            {{--<input type="text" placeholder="请输入您需要查找的内容 …" class="form-control" name="top-search" id="top-search">--}}
                        {{--</div>--}}
                    {{--</form>--}}
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    {{--<li class="dropdown">--}}
                        {{--<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">--}}
                            {{--<i class="fa fa-envelope"></i> <span class="label label-warning">16</span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu dropdown-messages">--}}
                            {{--<li class="m-t-xs">--}}
                                {{--<div class="dropdown-messages-box">--}}
                                    {{--<a href="profile.html" class="pull-left">--}}
                                        {{--<img alt="image" class="img-circle" src="{{asset('system/img/a7.jpg')}}">--}}
                                    {{--</a>--}}
                                    {{--<div class="media-body">--}}
                                        {{--<small class="pull-right">46小时前</small>--}}
                                        {{--<strong>小四</strong> 是不是只有我死了,你们才不骂爵迹--}}
                                        {{--<br>--}}
                                        {{--<small class="text-muted">3天前 2014.11.8</small>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li class="divider"></li>--}}
                            {{--<li>--}}
                                {{--<div class="dropdown-messages-box">--}}
                                    {{--<a href="#" class="pull-left">--}}
                                        {{--<img alt="image" class="img-circle" src="{{asset('system/img/a4.jpg')}}">--}}
                                    {{--</a>--}}
                                    {{--<div class="media-body ">--}}
                                        {{--<small class="pull-right text-navy">25小时前</small>--}}
                                        {{--<strong>二愣子</strong> 呵呵--}}
                                        {{--<br>--}}
                                        {{--<small class="text-muted">昨天</small>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                            {{--<li class="divider"></li>--}}
                            {{--<li>--}}
                                {{--<div class="text-center link-block">--}}
                                    {{--<a class="J_menuItem" href="#">--}}
                                        {{--<i class="fa fa-envelope"></i> <strong> 查看所有消息</strong>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="dropdown">--}}
                        {{--<a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">--}}
                            {{--<i class="fa fa-bell"></i> <span class="label label-primary">8</span>--}}
                        {{--</a>--}}
                        {{--<ul class="dropdown-menu dropdown-alerts">--}}
                            {{--<li>--}}
                                {{--<a href="mailbox.html">--}}
                                    {{--<div>--}}
                                        {{--<i class="fa fa-envelope fa-fw"></i> 您有16条未读消息--}}
                                        {{--<span class="pull-right text-muted small">4分钟前</span>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="divider"></li>--}}
                            {{--<li>--}}
                                {{--<a href="profile.html">--}}
                                    {{--<div>--}}
                                        {{--<i class="fa fa-qq fa-fw"></i> 3条新回复--}}
                                        {{--<span class="pull-right text-muted small">12分钟钱</span>--}}
                                    {{--</div>--}}
                                {{--</a>--}}
                            {{--</li>--}}
                            {{--<li class="divider"></li>--}}
                            {{--<li>--}}
                                {{--<div class="text-center link-block">--}}
                                    {{--<a class="J_menuItem" href="notifications.html">--}}
                                        {{--<strong>查看所有 </strong>--}}
                                        {{--<i class="fa fa-angle-right"></i>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</li>--}}
                        {{--</ul>--}}
                    {{--</li>--}}
                    {{--<li class="dropdown">--}}
                        {{--<a class="J_menuItem"  href="{{'admin/user'}}">--}}
                            {{--<i class="fa fa-user"></i> <span class="label label-info">{{auth()->user()->user_name}}</span>--}}
                        {{--</a>--}}
                    {{--</li>--}}
                    <li class="dropdown">

                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <span class="pull-right text-info" >{{auth()->user()->user_name}}</span><i class="fa fa-user text-success"></i> <span class="label label-info"></span>
                    </a>
                    <ul class="dropdown-menu">
                    <li>
                    <a  href="{{asset('admin/user-pwd')}}">
                    <div>
                    <i class="fa fa-envelope fa-fw"></i> 修改密码
                    </div>
                    </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                    <a href="{{asset('admin/logout')}}">
                    <div>
                    <i class="fa fa-qq fa-fw"></i> 退出登录

                    </div>
                    </a>
                    </li>

                    </ul>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="row J_mainContent" id="content-main">
            <iframe id="J_iframe" width="100%" height="100%" src="{{asset('admin/zhuye')}}" frameborder="0" data-id="{{asset('admin/zhuye')}}" seamless></iframe>
        </div>
    </div>
    <!--右侧部分结束-->
</div>

<!-- 全局js -->
<script src="{{asset('system/js/jquery.min.js')}}"></script>
<script src="{{asset('system/js/bootstrap.min.js')}}"></script>
<script src="{{asset('system/js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('system/js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>
{{--<script src="{{asset('system/js/plugins/layer/layer.min.js')}}"></script>--}}

<!-- 自定义js -->
<script src="{{asset('system/js/hAdmin.js')}}"></script>
<script type="text/javascript" src="{{asset('system/js/index.js')}}"></script>

<!-- 第三方插件 -->
<script src="{{asset('system/js/plugins/pace/pace.min.js')}}"></script>

</body>

</html>
