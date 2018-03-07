@extends('admin.layouts.app')

@section('content')
    <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>角色列表</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="col-sm-9">
                            <a class="btn btn-info" href="{{asset('admin/role/create')}}">添加角色</a>
                        </div>
                        <div class="col-sm-3">
                            <form action="role" method="get" id="keywords-form">
                                <div class="input-group">
                                <input type="text" name="gname" placeholder="请输入角色名" class="input-sm form-control"> <span class="input-group-btn">
		                            <button type="submit" class="btn btn-sm btn-info" > 搜索</button> </span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                                <tr>
                                    <th>角色ID</th>
                                    <th>角色名称</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($roles as $role)
                            <tr class="gradeX">
                                <td>{{$role->gid}}</td>
                                <td>{{$role->gname}}</td>
                                <td>
                                    <a href="{{asset('admin/privilege')}}/{{$role->gid}}" ><i class="glyphicon glyphicon-list"></i>设置权限 </a>
                                    |<a href="{{asset('admin/role')}}/{{$role->gid}}/edit" ><i class="glyphicon glyphicon-edit"></i>修改 </a>
                                    |<a href="javascript:void(0)" class="delete" data="{{$role->gid}}" ><i class="glyphicon glyphicon-trash"></i>删除 </a>
                                </td>
                            </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- 分页代码 -->
                        <div class="row">
                            <div class="page">
                                <div class="page-left" >
                                    <div style="display: inline-block;" class="dataTables_info" id="editable_info" role="alert" aria-live="polite" aria-relevant="all">当前第{{$roles->toArray()['current_page']}}页，共{{$roles->toArray()['last_page']}} 页，共{{$roles->toArray()['total']}} 条</div>
                                </div>

                                {!! $roles->links() !!}

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
                    url:'role/'+id,
                    type:'DELETE',
                    data:{ _token: '{{csrf_token()}}' },
                    success:function (data) {
                        if(data == '0'){
                            swal("删除成功！", "您已经永久删除了这条信息。", "success");
//                            layer.msg('删除成功', {icon: 1});
                            jQuery(_this).parent().parent().remove();

                        }else if(data == '2') {
                            swal("用户存在关联", "请先删除用户", "error");
                        }else{
                            swal("删除错误", "请重新试一次", "error");
                        }

                    },

                });

            });
        });

    </script>
@endsection