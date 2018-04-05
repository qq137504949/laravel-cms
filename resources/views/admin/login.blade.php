<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title> {{$system->title}}管理系统- 登录</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <link href="{{asset('system/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('system/css/font-awesome.css?v=4.4.0')}}" rel="stylesheet">
    <link href="{{asset('system/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('system/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('system/css/login.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <script>
        if (window.top !== window.self) {
            window.top.location = window.location;
        }
    </script>

</head>

<body class="signin">
<div class="signinpanel">
    <div class="row">
        <div class="col-sm-12">
            <form method="post" action="{{url('admin/login_act')}}">
                <h4 class="no-margins">登录：</h4>
                <p class="m-t-md">{{$system->title}}后台管理系统</p>
                <input type="text" name="user_name" value="{{old('user_name')}}" class="form-control uname" placeholder="用户名" />
                <input type="password" name="password" value="{{old('password')}}"  class="form-control pword m-b" placeholder="密码" />
                <input type="checkbox" name="remember" value="1"> 记住密码
                {{--<a href="">忘记密码了？</a>--}}
                <button class="btn btn-success btn-block">登录</button>

                {!! csrf_field() !!}
            </form>
        </div>
    </div>
    <div class="signup-footer">
        <div class="pull-left">
            &copy; {{$system->title}}
        </div>
    </div>
</div>
</body>

</html>
<script src="{{asset('system/js/jquery.min.js')}}"></script>
<script src="{{asset('system/js/plugins/layer/layer.min.js')}}"></script>
<script>
    //layer.alert('你好么，体验者');
    //layer.msg('玩命提示中');
$(document).ready(function() {
    @if(session('msg'))
        setTimeout(function () {
            layer.msg('{{session('msg')}}', {icon: 5});
        },300)
    @endif
});

</script>
