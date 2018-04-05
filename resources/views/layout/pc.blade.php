<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="renderer" content="webkit">
    <meta name="description" content="描述" />
    <meta name="keywords" content="关键词" />
    <title>首页</title>
    <link rel="stylesheet" href="{{asset('pc-static/css/default.css')}}">
</head>

<body>
<div id="topMain">
    <div class="wrap">
        <div class="header">
            <a class="logo" href="#">
                <img src="./pc-static/images/logo.png" alt="">
            </a>
            <ul class="nav">
                <li>
                    <a href="/">首页</a>
                </li>
                <li class='active'>
                    <a href='#'>豪宅出售</a>
                </li>
                <li class=''>
                    <a href='#'>豪宅租赁</a>
                </li>
                <li class=''>
                    <a href='#'>商业出售</a>
                </li>
                <li class=''>
                    <a href='#'>商业租赁</a>
                </li>
                <li class=''>
                    <a href='#'>豪宅动态</a>
                </li>
            </ul>
        </div>
        <h1>戎马半生 当以豪宅慰风尘</h1>
        <div class="search">
            <input type="text" placeholder="请输入小区名称">
            <input type="submit" value="查找豪宅">
        </div>
    </div>
</div>

@yield('content')


<div class="footer">
    <div class="wrap">
        <ul>
            <li>
                <a href="">关于我们</a>
            </li>
            <li>
                <a href="#">服务热线 400-888-8888</a>
            </li>
        </ul>
        <div class="info">
            <div>
                <p>举报热线：0371-60166618</p>
                <p>投诉热线：18037698368</p>
                <p>企业邮箱：873366181@qq.com</p>
                <p>企业地址：郑州市郑东新区地润路5-3号</p>
                <p>网络经营许可证 豫ICP备16020419号-2 赢泓网版权所有</p>
            </div>
            <img src="./pc-static/images/yao.png" alt="">
        </div>
    </div>
</div>
<script src="{{asset('pc-static/script/jquery.min.js')}}"></script>
@yield('my-script')
</body>

</html>