@extends('admin.layouts.app')

@section('content')
<div class="wrapper wrapper-content ">
    <div class="ibox float-e-margins">

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
                    <label class="col-sm-3 control-label">姓名：</label>
                    <div class="col-sm-8">
                        <input id="name"  name="name" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label">电话：</label>
                    <div class="col-sm-8">
                        <input id="mobile"  name="mobile" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" >
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
            },
            mobile:{
                required:true,
                number:true,
            },
            name:{
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
        },
        submitHandler:function (form) {
            var index = layer.load(1);
            $(form).ajaxSubmit({
                dataType:"json",
                success:function (res) {
                    if(res && res.code == 0){
                        layer.close(index);
                        layer.msg("保存成功");
                        setTimeout(function(){
                            window.parent.location.reload(); //刷新父页面
                        },500)
                    }else{
                        layer.close(index);
                        layer.msg(res.msg);
                    }
                }
            })
        }
    });


})


</script>
@endsection
