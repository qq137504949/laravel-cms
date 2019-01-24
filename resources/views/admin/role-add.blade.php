@extends('admin.layouts.app')

@section('content')
<div class="wrapper wrapper-content">
    <div class="ibox float-e-margins">

        <div class="ibox-content">
            <form action="{{asset('admin/role')}}" method="post" class="form-horizontal m-t" id="roleForm">
                <div class="form-group">
                    <label for="" class="col-sm-3 control-label">角色名称:</label>
                    <div class="col-sm-8">
                        <input id="gname" name="gname" type="text" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-8 col-sm-offset-3">
                        <button class="btn btn-primary" type="submit">保存</button>
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
            $('#roleForm').validate({
               rules:{
                   gname:{
                       required:true,
                       minlength:2
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
