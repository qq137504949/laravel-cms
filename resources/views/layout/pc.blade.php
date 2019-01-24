<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">
    <title>{{$system->title}}-官网首页</title>
    <meta name="_token" content="{{ csrf_token() }}"/>
    <meta name="description" content="{{$system->description}}" />
    <meta name="keywords" content="{{$system->keywords}}" />
    <link rel="icon" href="favicon.png" type="image/png">
    <link href="{{asset('pc-static/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('pc-static/js/fancybox/jquery.fancybox.css')}}" type="text/css" media="screen" />
    <link href="{{asset('pc-static/css/style.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('pc-static/css/font-awesome.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('pc-static/css/animate.css')}}" rel="stylesheet" type="text/css">

    <!--[if lt IE 9]>
    <script src="{{asset('pc-static/js/respond-1.1.0.min.js')}}"></script>
    <script src="{{asset('pc-static/js/html5shiv.js')}}"></script>
    <script src="{{asset('pc-static/js/html5element.js')}}"></script>
    <![endif]-->

</head>
<body>

<!--Header_section-->
<header id="header_wrapper">
    <div class="container">
        <div class="header_box">
            <div class="logo"><a href="/"><img src="{{asset('pc-static/img/logo.png')}}" alt="logo"></a></div>
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="navbar-header">
                    <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                </div>
                <div id="main-nav" class="collapse navbar-collapse navStyle">
                    <ul class="nav navbar-nav" id="mainNav">
                        <li class="active"><a href="#hero_section" class="scroll-link">主页</a></li>
                        <li><a href="#aboutUs" class="scroll-link">关于我们</a></li>
                        <li><a href="#service" class="scroll-link">服务</a></li>
                        <li><a href="#Portfolio" class="scroll-link">合作案例</a></li>
                        <!-- <li><a href="#clients" class="scroll-link">Clients</a></li> -->
                        <!-- <li><a href="#team" class="scroll-link">我们的团队</a></li> -->
                        <li><a href="#contact" class="scroll-link">联系我们</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<!--Header_section-->

@yield('content')

<!--Footer-->
<footer class="footer_wrapper" id="contact">
    <div class="container">
        <section class="page_section contact" id="contact">
            <div class="contact_section">
                <h2>联系我们</h2>
                <h6>满足你的需求，就是我们的使命！</h6>

            </div>
            <div class="row">
                <div class="col-lg-4 wow fadeInLeft">
                    <div class="contact_info">
                        <div class="detail">
                            <h4>公司名称</h4>
                            <p>上海旭宓科技信息有限公司</p>
                        </div>
                        <div class="detail">
                            <h4>联系电话</h4>
                            <p>+86 13052104672</p>
                        </div>
                        <div class="detail">
                            <h4>联系邮箱</h4>
                            <p>shxumi@163.com</p>
                        </div>
                    </div>



                    <ul class="social_links">
                        <li class="twitter animated bounceIn wow delay-02s"><a href="javascript:void(0)"><i class="fa fa-twitter"></i></a></li>
                        <li class="facebook animated bounceIn wow delay-03s"><a href="javascript:void(0)"><i class="fa fa-facebook"></i></a></li>
                        <li class="pinterest animated bounceIn wow delay-04s"><a href="javascript:void(0)"><i class="fa fa-pinterest"></i></a></li>
                        <li class="gplus animated bounceIn wow delay-05s"><a href="javascript:void(0)"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-8 wow fadeInLeft delay-06s">
                    <div class="form">

                        <!--NOTE: Update your email Id in "contact_me.php" file in order to receive emails from your contact form-->
                        <form name="sentMessage" id="contactForm" action="email" method="post"  >
                            <h3 style="color: #fff;">联系我们</h3>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="text" class="form-control input-text"
                                           placeholder="请输入您的名字" name="name" id="name" required
                                           data-validation-required-message="请输入您的名字" value="{{old('name')}}" />
                                    <p class="help-block"></p>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="email" name="email" class="form-control input-text" placeholder="请输入您的邮箱地址"
                                           id="email" required value="{{old('email')}}"
                                           data-validation-required-message="请输入邮箱" />
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="controls">
                                    <input type="number" maxlength="11" name="mobile" class="form-control input-text" placeholder="请输入您的手机号码"
                                           id="mobile" required value="{{old('mobile')}}"
                                           data-validation-required-message="请输入手机号码" />
                                </div>
                            </div>

                            <div class="control-group">
                                <div class="controls">
		<textarea rows="10" cols="100" class="form-control input-text"
                  placeholder="请留言" id="message"  name="message" required
                  data-validation-required-message="请留言" minlength="5"
                  data-validation-minlength-message="请大于5个字符"
                  maxlength="999" style="resize:none"></textarea>
                                </div>
                            </div>
                            <div id="success"> </div> <!-- For success/fail messages -->
                            <button type="submit" class="btn btn-primary input-btn pull-right">提交</button><br />
                            {{csrf_field()}}
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div class="container">
        <div class="footer_bottom"> &copy; 旭宓信息科技有限公司 备案号：{{$system->icp}} 公司地址：{{$system->address}}</div>{!! $system->tongji !!}
    </div>
</footer>

<script type="text/javascript" src="{{asset('pc-static/js/jquery-1.11.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('pc-static/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('pc-static/js/jquery-scrolltofixed.js')}}"></script>
<script type="text/javascript" src="{{asset('pc-static/js/jquery.nav.js')}}"></script>
<script type="text/javascript" src="{{asset('pc-static/js/jquery.easing.1.3.js')}}"></script>
<script type="text/javascript" src="{{asset('pc-static/js/jquery.isotope.js')}}"></script>
<script src="{{asset('pc-static/js/fancybox/jquery.fancybox.pack.js')}}" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('pc-static/js/wow.js')}}"></script>
<script type="text/javascript" src="{{asset('pc-static/js/custom.js')}}"></script>

<script src="{{asset('system/js/plugins/layer/layer.min.js')}}"></script>
<script src="{{asset('pc-static/js/jquery.lazyload.min.js')}}"></script>
@yield('my-script')
<script>
    $(document).ready(function() {
        @if(count($errors)>0)
        setTimeout(function () {
            @foreach ($errors->all() as $error)
            layer.msg('{{$error}}', {icon: 5});
            @endforeach
        },300)
        @endif
    });

    {{--@if(session('msg'))--}}
    {{--setTimeout(function () {--}}
        {{--layer.msg('{{session('msg')}}', {icon: 1});--}}
    {{--},500)--}}
    {{--@endif--}}


    $("img.lazy").lazyload({
        placeholder: "{{asset('pc-static/img/loading-round.gif')}}",
    });
</script>
</body>
</html>