@extends('admin.layouts.app')
@section('content')
    <div class="wrapper wrapper-content ">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>设置站点</h5>
                    </div>
                    <div class="ibox-content">
                        <form  action="{{asset('admin/set-system')}}" method="post" class="form-horizontal m-t" id="roleForm" enctype="multipart/form-data" >
                            <div class="form-group">
                                <label class="col-sm-3 control-label">域名：</label>
                                <div class="col-sm-8">
                                    <input id="url" value="{{isset($system)?$system->url:''}}" name="url" class="form-control required" type="text" aria-required="true" aria-invalid="true" class="error" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">标题：</label>
                                <div class="col-sm-8">
                                    <input id="title" value="{{isset($system)?$system->title:''}}" name="title" class="form-control required" type="text" aria-required="true" aria-invalid="true" class="error" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">关键字：</label>
                                <div class="col-sm-8">
                                    <input id="keywords" value="{{isset($system)?$system->keywords:''}}"  name="keywords" class="form-control required" type="text" aria-required="true" aria-invalid="true" class="error" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">描述：</label>
                                <div class="col-sm-8">
                                    <textarea id="description" name="description" class="form-control required">{{isset($system)?$system->description:''}}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">统计代码：</label>
                                <div class="col-sm-8">
                                    <textarea id="tongji"  name="tongji" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">备案号：</label>
                                <div class="col-sm-8">
                                    <input id="icp"  name="icp" value="{{isset($system)?$system->icp:''}}" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">举报热线：</label>
                                <div class="col-sm-8">
                                    <input id="mobile"  name="mobile" value="{{isset($system)?$system->mobile:''}}" class="form-control " type="text" aria-required="true" aria-invalid="true" class="error" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">投诉热线：</label>
                                <div class="col-sm-8">
                                    <input id="phone"  name="phone" value="{{isset($system)?$system->phone:''}}" class="form-control " type="text" aria-required="true" aria-invalid="true" class="error" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">地址：</label>
                                <div class="col-sm-8">
                                    <input id="address"  name="address" value="{{isset($system)?$system->address:''}}" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">E-mail：</label>
                                <div class="col-sm-8">
                                    <input id="email"  name="email" value="{{isset($system)?$system->email:''}}" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Logo：</label>
                                <div class="col-sm-8">
                                    <input id="logo"  name="logo"  class="form-control" type="file" aria-required="true" aria-invalid="true" class="error" >
                                    @if(isset($system))
                                    <img src="{{asset($system->logo)}}" width="64" alt="">
                                        @endif
                                </div>
                            </div>
                            {{csrf_field()}}
                            <div class="form-group">
                                <div class="col-sm-4 col-sm-offset-3">

                                    <input type="hidden" name="id" value="{{isset($system)?$system->id:''}}">
                                    <button class="btn btn-primary" type="submit">保 存</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
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


    </script><script>
        $().ready(function () {
            $("#roleForm").validate();

        })


    </script>
@endsection