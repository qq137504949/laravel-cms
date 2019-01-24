@extends('admin.layouts.app')
@section('content')
    <div class="wrapper wrapper-content">
            <div class="ibox-title">
                <h3>欢迎使用{{$system->title}}系统管理系统</h3>
            </div>

            <div class="ibox-content">

            </div>

        </div>
</div>
@endsection
@section('my-script')
    <script>
        function openWin() {
            layer.open({
                type: 2,
                title:'添加文档',
                area: ['90%', '90%'], //宽高
                content:'{{asset('admin/doc/create')}}'
            })
        }
    </script>
@endsection
