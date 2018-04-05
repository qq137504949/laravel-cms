@extends('admin.layouts.app')
@section('content')
    <div class="wrapper wrapper-content ">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>菜单列表</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="col-sm-9">
                            <a  href="{{url('admin/menu/create')}}" class="btn btn-info ">添加菜单</a>
                        </div>
                        <div class="col-sm-3">
                            <form action="menu" method="get" id="cheacform">
                                <div class="input-group">
                                    <input type="text" name="menu_name" placeholder="请输入菜单名称" class="input-sm form-control"> <span class="input-group-btn">
		                            <button type="submit" onclick="check_submit()" class="btn btn-sm btn-info"> 搜 索</button> </span>
                                </div>
                                {{csrf_field()}}
                            </form>
                        </div>
                    </div>

                    <div class="ibox-content">

                        <table class="table table-striped table-bordered table-hover dataTables-example" style="margin-bottom: 0;">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>菜单名称</th>
                                <th>图标</th>
                                <th>菜单链接</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($menulist as $item)
                            <tr class="gradeX">
                                <td>{{$item->menu_id}}</td>
                                @if ($item->parent_id >0)
                                <td>　𠃊{{$item->menu_name}}</td>
                                @else
                                <td>{{$item->menu_name}}</td>
                                @endif
                                <td><i class="fa {{$item->menu_icon}}"></i></td>
                                <td>{{$item->menu_link}}</td>

                                <td><a  class="delete" data="{{$item->menu_id}}" ><i class="glyphicon glyphicon-trash" ></i> 删除</a> | <a href="{{asset('admin/menu')}}/{{$item->menu_id}}/edit"><i class="glyphicon glyphicon-edit"></i> 修改</a> </td>
                            </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <!-- 分页代码 -->
                        <div class="row">
                            <div class="page">
                                <div class="page-left" >
                                        <div style="display: inline-block;" class="dataTables_info" id="editable_info" role="alert" aria-live="polite" aria-relevant="all">当前第{{$menulist->toArray()['current_page']}}页，共{{$menulist->toArray()['last_page']}} 页，共{{$menulist->toArray()['total']}} 条</div>
                                </div>

                                    {!! $menulist->links() !!}

                            </div>
                            

                        </div>
                        <!-- 分页代码结束 -->
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

@section('my-script')

<script>

    $('.delete').click(function () {
        var _this = this;
        swal({
            title: "您确定要删除这条信息吗",
            text: "删除后将无法恢复，请谨慎操作！",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "删除",
            closeOnConfirm: false,
            cancelButtonText: "再考虑一下…",
        }, function () {
            var id = jQuery(_this).attr('data');
            $.ajax({
                url:'menu/'+id,
                type:'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                },
                success:function (data) {
                    if(data == '0'){
                        swal("删除成功！", "您已经永久删除了这条信息。", "success");
//                            layer.msg('删除成功', {icon: 1});
                        jQuery(_this).parent().parent().remove();

                    }else if(data == '2') {
                        swal("请先删除子菜单", "删除错误", "error");
                    }else{
                        swal("删除错误", "请重新试一次", "error");
                    }

                },

            });

        });
    });

</script>
@endsection