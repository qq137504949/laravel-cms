@extends('layout.pc')
@section('content')

    <!--Hero_Section-->
    <section id="hero_section" class="top_cont_outer">
        <div class="hero_wrapper">
            <div class="container">
                <div class="hero_section">
                    <div class="row">
                        <div class="col-md-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Hero_Section-->

    <section id="aboutUs"><!--Aboutus-->
        <div class="inner_wrapper aboutUs-container fadeInLeft animated wow">
            <div class="container">
                <h2>关于我们---</h2>
                <h6>我们是定制开发为企业解决快速业务扩展！解决一站式服务</h6>
                <div class="inner_section">
                    <div class="row">
                        <div class="col-md-6"> <img class="img-responsive lazy"  data-original="{{asset('pc-static/img/about1.jpg')}}" align=""> </div>
                        <div class="col-md-6">
                            <h3>定制软件</h3>
                            <p>我们的主要领域互联网产品！专门定制企业网站，微信开发，APP开发，小程序开发，各平台活动开发等。</p><br/>
                            <h3>关于我们?</h3>
                            <p>上海旭宓信息科技有限公司位于上海浦东新区，我们技术应用领域是专研应用开发。旭宓长期专注于软件研发、软件设计、定制软件服务等开发领域，凭借多年在应用软件开发积累的经验，旭宓科技为你提供一站式建站定制解决方案。
                                　　旭宓科技倡导“专业、务实、高效、创新”的企业精神。</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 about-us">
                            <div class="row">
                                <div class="col-md-6">
                                    <h3>业务介绍</h3>
                                    <p>
                                        上海旭宓信息科技有限公司成立于2018年3月12日，本公司是对客户的业务应用需求而提供的软件产品及应用软件定制开发服务。<br/> <br/>
                                        旭宓在精准把握业务需求的基础上，在已有软件及解决方案的基础上，选择合适的技术框架为客户量身定制，构建特定业务应用软件，实现业务应用整合和数据整合，满足客户的特殊需要，推动业务的创新发展。

                                    </p>



                                </div><!-- /.col-md-6 -->
                                <div class="col-md-6">
                                    <h3>快速定制解决方案</h3>
                                    <p>
                                        快速开发选型：后台语言PHP  框架laravel  APP客户端 apicloud android+ios h5开发 前端sass  css3+html5 vue交互可快速定制开发，重心都在业务，框架成熟、稳定、可靠、快速！
                                    </p>

                                    <ul class="about-us-list">
                                        <li class="points">购物商城、促销活动、会员卡、积分商城、大转盘活动、推送、远程打印定制</li>
                                        <li class="points">企业建站、文章、咨询、社交、SNS定制 </li>
                                        <li class="points">房产、信息资讯、公共事业、律所业务定制 </li>
                                        <li class="points">web站点、APP、微信、小程序业务定制 </li>
                                        <li class="points">智能设备、电子秤远程系统、聊天、视频、长连接服务swoole定制</li>
                                    </ul><!-- /.about-us-list -->

                                </div><!-- /.col-md-6 -->

                            </div><!-- /.row -->
                        </div><!-- /.col-lg-12 -->
                    </div>

                </div>
            </div>
        </div>
    </section>
    <!--Aboutus-->


    <!--Service-->
    <section  id="service">
        <div class="container">
            <h2>服务类型</h2>
            <h6>定制开发服务项目</h6>
            <div class="service_wrapper">
                <div class="row">
                    <div class="col-md-3">
                        <div class="service_icon delay-03s animated wow  zoomIn"> <span><i class="fa fa-android"></i></span> </div>
                        <div class="service_block">

                            <h3 class="animated fadeInUp wow">Android</h3>
                            <p class="animated fadeInDown wow">适应Android4.0以上版本 </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="service_icon icon2  delay-03s animated wow zoomIn"> <span><i class="fa fa-apple"></i></span> </div>
                        <div class="service_block">
                            <h3 class="animated fadeInUp wow">Apple IOS</h3>
                            <p class="animated fadeInDown wow">IOS系统8以上版本  </p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="service_icon icon3  delay-03s animated wow zoomIn"> <span><i class="fa fa-html5"></i></span> </div>
                        <div class="service_block">

                            <h3 class="animated fadeInUp wow">WEB</h3>
                            <p class="animated fadeInDown wow">IE9以上、现在主流站点</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="service_icon icon3  delay-03s animated wow zoomIn"> <span><i class="fa fa-user"></i></span> </div>
                        <div class="service_block">

                            <h3 class="animated fadeInUp wow">微信/小程序</h3>
                            <p class="animated fadeInDown wow">微商城 通用版</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Service-->




    <!-- Portfolio -->
    <section id="Portfolio" class="content">

        <!-- Container -->
        <div class="container portfolio_title">

            <!-- Title -->
            <div class="section-title">
                <h2>合作案例</h2>
                <h6>因为有你们，才有我们的存在的意义！</h6>

            </div>
            <!--/Title -->

        </div>
        <!-- Container -->

        <div class="portfolio-top"></div>

        <!-- Portfolio Filters -->
        <div class="portfolio">

            <div id="filters" class="sixteen columns">
                <ul class="clearfix">
                    <li><a id="all" href="#" data-filter="*" class="active">
                            <h5>全部</h5>
                        </a></li>
                    <li><a class="" href="#" data-filter=".prototype">
                            <h5>网站</h5>
                        </a></li>
                    <li><a class="" href="#" data-filter=".design">
                            <h5>微信</h5>
                        </a></li>
                    <li><a class="" href="#" data-filter=".android">
                            <h5>安卓</h5>
                        </a></li>
                    <li><a class="" href="#" data-filter=".appleIOS">
                            <h5>IOS</h5>
                        </a></li>
                    <li><a class="" href="#" data-filter=".web">
                            <h5>小程序</h5>
                        </a></li>
                </ul>
            </div>
            <!--/Portfolio Filters -->

            <!-- Portfolio Wrapper -->
            <div class="isotope fadeInLeft animated wow grid" style="position: relative; overflow: hidden; height: 480px;" id="portfolio_wrapper">
                <!-- Portfolio Item -->
                <figure style="position: absolute; left: 0px; top: 0px; transform: translate3d(0px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four   prototype isotope-item effect-oscar">

                    <div class="portfolio_img">
                        <img class="lazy" data-original="{{asset('pc-static/img/zz_yh.png')}}"  alt="http://zz-yh.com"> </div>
                    <figcaption>
                        <div>
                            <a href="{{asset('pc-static/img/zz_yh.png')}}" class="fancybox">
                                <h2>郑州 <span>赢鸿</span></h2>
                                <p>郑州赢鸿地产有限公司</p>
                            </a>
                        </div>
                    </figcaption>
                </figure>
                <!--/Portfolio Item -->

                <!-- Portfolio Item-->
                <figure style="position: absolute; left: 0px; top: 0px; transform: translate3d(337px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four  prototype isotope-item effect-oscar">
                    <div class="portfolio_img"> <img class="lazy" data-original="{{asset('pc-static/img/yuheng.png')}}" alt="Portfolio 1"> </div>
                    <figcaption>
                        <div>
                            <a href="{{asset('pc-static/img/yuheng.png')}}" class="fancybox">
                                <h2>煜珩 <span>法律</span></h2>
                                <p>煜珩法律咨询有限公司</p>
                            </a>
                        </div>
                    </figcaption>
                </figure>
                <!--/Portfolio Item -->

                <!-- Portfolio Item -->
                <figure style="position: absolute; left: 0px; top: 0px; transform: translate3d(674px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four  prototype design isotope-item effect-oscar">
                    <div class="portfolio_img"> <img class="lazy" data-original="{{asset('pc-static/img/gat.png')}}" alt="Portfolio 1"> </div>
                    <figcaption>
                        <div>
                            <a href="{{asset('pc-static/img/gat.png')}}" class="fancybox">
                                <h2>中智 <span>关爱通</span></h2>
                                <p>中智关爱通（上海）</p>
                            </a>
                        </div>
                    </figcaption>
                </figure>
                <!--/Portfolio Item-->

                <!-- Portfolio Item-->
                <figure style="position: absolute; left: 0px; top: 0px; transform: translate3d(1011px, 0px, 0px) scale3d(1, 1, 1); width: 337px; opacity: 1;" class="portfolio-item one-four  android  prototype web isotope-item effect-oscar">
                    <div class="portfolio_img"> <img src="{{asset('pc-static/img/cb.png')}}" alt="Portfolio 1"> </div>
                    <figcaption>
                        <div>
                            <a href="{{asset('pc-static/img/cb.png')}}" class="fancybox">
                                <h2>曹博 <span>建材</span></h2>
                                <p>曹博建材管理系统</p>
                            </a>
                        </div>
                    </figcaption>
                </figure>


            </div>
            <!--/Portfolio Wrapper -->

        </div>
        <!--/Portfolio Filters -->

        <div class="portfolio_btm"></div>


        <div id="project_container">
            <div class="clear"></div>
            <div id="project_data"></div>
        </div>


    </section>
@endsection

@section('my-script')

@endsection