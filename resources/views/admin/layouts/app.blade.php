<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title> 后台</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="_token" content="{{ csrf_token() }}"/>

    <link > <link href="{{asset('system/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('system/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('system/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('system/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('system/css/plugins/sweetalert/sweetalert.css')}}" rel="stylesheet">

</head>

<body class="gray-bg">

@yield('content')
<!-- 全局js -->
<script src="{{asset('system/js/jquery.min.js')}}"></script>
<script src="{{asset('system/js/bootstrap.min.js')}}"></script>
<script src="{{asset('system/js/content.js')}}"></script>
<script src="{{asset('system/js/plugins/layer/layer.min.js')}}"></script>

<!-- jQuery Validation plugin javascript-->
<script src="{{asset('system/js/plugins/validate/jquery.validate.min.js')}}"></script>
<script src="{{asset('system/js/plugins/validate/messages_zh.min.js')}}"></script>
<!-- Sweet alert -->
<script src="{{asset('system/js/plugins/sweetalert/sweetalert.min.js')}}"></script>
<script>
//    var index = layer.load(0, {
//        shade: [0.4,'#fff'] //0.1透明度的白色背景
//    });
//    setTimeout(function () {
//        layer.close(index);
//    },100)
</script>
@yield('my-script')
</body>
</html>

