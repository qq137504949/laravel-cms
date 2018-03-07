@extends('admin.layouts.app')
@section('content')
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>管理员日志列表</h5>
                </div>
                <div class="ibox-content">

                    <div class="col-sm-3">
                        <form action="admin-log" method="get" id="cheacform">
                            <div class="input-group">
                                <input type="text" name="admin_name" placeholder="请输入操作内容" class="input-sm form-control"> <span class="input-group-btn">
                                <button type="submit" class="btn btn-sm btn-info"> 搜索</button> </span>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="ibox-content">

                    <table class="table table-striped table-bordered table-hover dataTables-example">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>操作人</th>
                            <th>日志内容</th>
                            <th>操作时间</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($logs as $v)
                        <tr class="gradeX">
                            <td>{{$v->id}}</td>
                            <td>{{$v->admin_name}}</td>
                            <td>{{$v->content}}</td>
                            <td>{{$v->created_at}}</td>

                        </tr>
                       @endforeach

                        </tbody>
                    </table>
                    <!-- 分页代码 -->
                    <!-- 分页代码 -->
                    <div class="row">
                        <div class="page">
                            <div class="page-left" >
                                <div style="display: inline-block;" class="dataTables_info" id="editable_info" role="alert" aria-live="polite" aria-relevant="all">当前第{{$logs->toArray()['current_page']}}页，共{{$logs->toArray()['last_page']}} 页，共{{$logs->toArray()['total']}} 条</div>
                            </div>

                            {!! $logs->links() !!}

                        </div>


                    </div>
                    <!-- 分页代码结束 -->
                    <!-- 分页代码结束 -->
                </div>
            </div>
        </div>
    </div>

</div>
@endsection