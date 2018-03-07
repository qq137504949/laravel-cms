@extends('admin.layouts.app')
@section('content')
    <div class="wrapper wrapper-content ">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>管理员列表</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="col-sm-9">
                            <a  href="{{url('admin/user/create')}}" class="btn btn-info ">添加管理员</a>
                        </div>
                        <div class="col-sm-3">
                            <form action="user" method="get" id="cheacform">
                                <div class="input-group">
                                    <input type="text" name="user_name" placeholder="请输入管理员名称" class="input-sm form-control"> <span class="input-group-btn">
		                            <button type="submit"  class="btn btn-sm btn-info"> 搜 索</button> </span>
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
                                <th>用户名</th>
                                <th>邮箱</th>
                                <th>最后一次登录时间</th>
                                <th>角色</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($userList as $item)
                                <tr class="gradeX">
                                    <td>{{$item->admin_id}}</td>
                                    <td>{{$item->user_name}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->updated_at}}</td>
                                    <td>{{$item->admin_gid?$item->Gadmin->gname:'超级管理员'}}</td>


                                    <td>
                                        @if($item->admin_is_super == 1)
                                            禁止删除
                                        @else
                                            <a  class="delete" data="{{$item->admin_id}}" ><i class="glyphicon glyphicon-trash" ></i> 删除</a> | <a href="{{asset('admin/user')}}/{{$item->admin_id}}/edit"><i class="glyphicon glyphicon-edit"></i> 修改</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                        <!-- 分页代码 -->
                        <div class="row">
                            <div class="page">
                                <div class="page-left" >
                                    <div style="display: inline-block;" class="dataTables_info" id="editable_info" role="alert" aria-live="polite" aria-relevant="all">当前第{{$userList->toArray()['current_page']}}页，共{{$userList->toArray()['last_page']}} 页，共{{$userList->toArray()['total']}} 条</div>
                                </div>

                                {!! $userList->links() !!}

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
                    url:'user/'+id,
                    type:'DELETE',
                    data:{ _token: '{{csrf_token()}}' },
                    success:function (data) {
                        if(data == '0'){
                            swal("删除成功！", "您已经永久删除了这条信息。", "success");
//                            layer.msg('删除成功', {icon: 1});
                            jQuery(_this).parent().parent().remove();

                        }else{
                            swal("删除错误", "请重新试一次", "error");
                        }

                    },

                });

            });
        });

    </script>
@endsection