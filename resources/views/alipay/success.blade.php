@extends('layouts.page')
@section('content')
    <link rel="stylesheet" href="{{asset('assets/css/order.css')}}">
    <style>

        .table{
            margin-bottom:0;
        }
        .content{

            text-align: center;
        }
    </style>

    <section class="team-intro wrap clearfix top" >
        <div class="order-top">
            <div class="header-content">
                <div class="header-title">
                    <h2>支付结果</h2>
                </div>
            </div>
        </div>

        <div class="section-body clearfix content">
            <h2>支付成功！！！</h2>
            <a href="{{asset('my-order')}}">查看订单</a>
        </div>
    </section>
@endsection