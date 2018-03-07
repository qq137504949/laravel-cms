﻿@extends('admin.layouts.app')

@section('content')
<div class="wrapper wrapper-content ">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <div class="col-sm-4">
                <h3>菜单管理</h3>
                <ol class="breadcrumb">
                    <li>
                        <a href="{{asset('admin/user')}}">用户列表</a>
                    </li>
                    <li>
                        <strong class="text-muted">添加用户</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="ibox-content">
            <form  action="{{asset('admin/user')}}" method="post" class="form-horizontal m-t" id="roleForm" >
                <div class="form-group">
                    <label class="col-sm-3 control-label">用户名：</label>
                    <div class="col-sm-8">
                        <input id="user_name"  name="user_name" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">Email(邮箱)：</label>
                    <div class="col-sm-8">
                        <input id="email"  name="email" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">密码：</label>
                    <div class="col-sm-8">
                        <input id="password"  name="password" class="form-control" type="password" aria-required="true" aria-invalid="true" class="error" >
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-3 control-label">权限管理：</label>
                    <div class="col-sm-8">
                        <select  class="form-control"  name="admin_gid" id="admin_gid" required>
                            <option value="">--请选择--</option>
                            @foreach($rules as $rule)
                                <option value="{{$rule->gid}}" >{{$rule->gname}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-4 col-sm-offset-3">
                        <button class="btn btn-primary" type="submit">保 存</button>
                    </div>
                </div>
                {{csrf_field()}}

            </form>
        </div>
    </div>
</div>
@endsection

@section('my-script')
<script>
$().ready(function () {
    var icon = "<i class='fa fa-times-circle'></i> ";
    $("#roleForm").validate({
        rules:{
            user_name:{
                required:true,
                minlength:4
            },
            password:{
              required:true,
              minlength:6
            },
            email:{
                required:true,
                email:true,
            },
            admin_gid:{
                required:true,
            }

        },
        messages:{
            user_name:{
                required:icon+"用户名必须填写",
                minlength:icon+"用户名长度4个字符以上",
            },
            password:{
                required:icon+'密码不能为空',
                minength:icon+'密码长度大于6个字符'
            },
        }
    });


    @if(count($errors)>0)
    @foreach($errors->all() as $error)
    layer.msg('{{$error}}', {icon: 5});
    @endforeach
    @endif
})


</script>
@endsection