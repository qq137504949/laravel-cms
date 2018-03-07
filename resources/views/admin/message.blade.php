<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="maximum-scale=1.0,minimum-scale=1.0,user-scalable=0,width=device-width,initial-scale=1.0"/>
    <style>
        .bjse{
            display: block; background-image: url('{{asset('system/img/404.png')}}');width:160px; height:160px
        }
    </style>

    <link rel="stylesheet" type="text/css" href="{{asset('system/css/sweetalert.css')}}"/>

</head>
<body>

<div style="opacity: 1; display: block;" class="sweet-overlay" tabindex="-1"></div>
<div style="display: block; margin-top: -182px;" data-timer="50000" data-animation="pop" data-has-done-function="false" data-allow-outside-click="false" data-has-confirm-button="false" data-has-cancel-button="false" data-custom-class="" class="sweet-alert showSweetAlert visible"><div style="display: none;" class="sa-icon sa-error">

    </div>

    <div style="" class="sa-icon sa-custom bjse"></div><h2>{{$data['message']}}!</h2>
    <p style="display: block;"><span id="time">{{$data['jumpTime']}}</span> 秒后跳转
    </p>
</div>
</body>
<script src="{{asset('system/js/jquery.min.js')}}"></script>

<script type="text/javascript">
    delayURL();
    function delayURL() {
        var delay = document.getElementById("time").innerHTML;
        var t = setTimeout("delayURL()",500);
        if (delay >= 1) {
            delay--;
            document.getElementById("time").innerHTML = delay;
        } else {
            clearTimeout(t);
            window.location.href = "{{$data['url']}}";
        }
    }
</script>
</html>