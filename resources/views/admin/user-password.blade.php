@extends('admin.layouts.app')
@section('content')
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>修改密码</h5>
                </div>
                <div class="ibox-content">
                    <form class="form-horizontal m-t" id="commentForm" action="{{asset('admin/update-password').'/'.auth()->user()->admin_id}}" method="post">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">密码：</label>
                            <div class="col-sm-8">
                                <input id="password" type="password"  class="form-control" name="password">
                            </div>
                        </div><div class="form-group">
                            <label class="col-sm-3 control-label">确认密码：</label>
                            <div class="col-sm-8">
                                <input id="password_confirm"  type="password" class="form-control" name="password_confirm">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-3">
                                <button class="btn btn-primary" type="submit">提交</button>
                            </div>
                        </div>
                        {{csrf_field()}}
                        {{--<input type="hidden" name="_method" value="PUT">--}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('my-script')
<!-- 自定义js -->

<script>
    $().ready(function () {
        var icon = "<i class='fa fa-times-circle'></i> ";
        $("#commentForm").validate({
            rules:{
                password:{
                    required:true,
                    minlength:6
                },
                password_confirm:{
                    required:true,
                    minlength:6,
                    equalTo: "#password"
                }
            },
            messages:{
                password:{
                    required: icon + "请输入您的密码",
                    minlength: icon + "密码必须6个字符以上"
                },
                password_confirm: {
                    required: icon + "请再次输入密码",
                    minlength: icon + "密码必须6个字符以上",
                    equalTo: icon + "两次输入的密码不一致"
                },
            }
        });
    })
</script>
@endsection