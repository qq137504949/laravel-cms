@extends('admin.layouts.app')

@section('content')
    <div class="wrapper wrapper-content ">
        <div class="ibox float-e-margins">

            <div class="ibox-content">
                <form  action="{{asset('admin/menu')}}" method="post" class="form-horizontal m-t" id="roleForm" >
                    <div class="form-group">
                        <label class="col-sm-3 control-label">菜单名称：</label>
                        <div class="col-sm-8">
                            <input id="menu_name"  name="menu_name" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">顶级菜单图标：</label>
                        <div class="col-sm-8">
                            <input id="menu_icon"  name="menu_icon" class="form-control" type="text"  >
                            <span class="help-block ">
                                    	<i class="fa fa-info-circle"></i> fa-info-circle
                                    	<i class="fa fa-bar-chart-o"></i> fa-bar-chart-o
										<i class="fa fa-home"></i> fa-home
										<i class="fa fa-envelope"></i> fa-envelope
										<i class="fa fa-desktop"></i> fa-desktop
										<i class="fa fa-picture-o"></i> fa-picture-o
										<i class="fa fa-cutlery"></i> fa-cutlery
										<i class="fa fa-magic"></i> fa-magic
										<i class="fa fa-edit"></i> fa-edit
										</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">菜单：</label>
                        <div class="col-sm-8">
                            <select  class="form-control"  name="parent_id" id="parent_id" >
                                <option value="0">--默认顶级菜单--</option>
                                @foreach($menus as $item)
                                    <option value="{{$item->menu_id}}" hassubinfo="true">{{$item->menu_name}}</option>
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">二级菜单连接：</label>
                        <div class="col-sm-8">
                            <input id="menu_link" value="" name="menu_link" class="form-control" type="text"  >
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">排序：</label>
                        <div class="col-sm-8">
                            <input id="sort"  name="sort" class="form-control" type="text"  >
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-3">
                            <button class="btn btn-primary" type="submit">提交</button>
                        </div>
                    </div>
                    {{csrf_field()}}

                </form>
            </div>
        </div>
    </div>

@endsection
@section("my-script")
    <script>
        $().ready(function () {
            var icon = "<i class='fa fa-times-circle'></i> ";
            $("#roleForm").validate({
                rules:{
                    menu_name:{
                        required:true,
                    },
                    sort:{
                        required:true,
                        number:true
                    }

                },
                messages:{
                    menu_name:{
                        required:icon+"请填写菜单名称",
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