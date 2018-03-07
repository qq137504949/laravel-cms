@extends('admin.layouts.app')

@section('content')
    <div class="wrapper wrapper-content">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h3>角色管理</h3>
                <ol class="breadcrumb">
                    <li><a href="{{asset('admin/role')}}">角色列表</a></li>
                    <li><strong class="text-muted">修改角色</strong></li>
                </ol>
            </div>
            <div class="ibox-content">
                <form action="{{asset('admin/role')}}/{{$role->gid}}" method="post" class="form-horizontal m-t" id="roleForm">
                    <div class="form-group">
                        <label for=""  class="col-sm-3 control-label">角色名称:</label>
                        <div class="col-sm-8">
                            <input id="gname" value="{{$role->gname}}" name="gname" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-8 col-sm-offset-3">
                            <button class="btn btn-primary" type="submit">保存</button>
                        </div>
                    </div>
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT">
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
                    }
                }
            });
        })
    </script>
@endsection
