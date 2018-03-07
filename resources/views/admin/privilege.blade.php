@extends('admin.layouts.app')
<link href="{{asset('system/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
@section('content')
    <div class="wrapper wrapper-content">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="col-sm-4">
                    <h3>设置权限</h3>
                    <ol class="breadcrumb">
                        <li><a href="{{asset('admin/role')}}">权限列表</a></li>
                        <li><strong class="text-muted">修改权限</strong></li>
                    </ol>
                </div>
            </div>
            <form action="{{asset('admin/privilege')}}/{{$role->gid}}" method="post">
                @foreach($menus as $item)
                <div class="ibox-content">

                    <div class="form-group">

                        <label class="col-sm-2 control-label i-checks" >

                            @if(in_array($item['menu_id'],explode(',',$role->limits)))
                            <input type="checkbox" value="{{$item['menu_id']}}" name="chkGroup_{{$item['menu_id']}}" checked="checked" >
                            {{$item['menu_name']}}
                            @else
                            <input type="checkbox" value="{{$item['menu_id']}}" name="chkGroup_{{$item['menu_id']}}"  >
                            {{$item['menu_name']}}
                            @endif
                        </label>
                        <div class="col-sm-10 marks">
                            @if(isset($item['erji']))
                            @foreach($item['erji'] as $val)
                            @if(in_array($val['menu_id'],explode(',',$role->limits)))
                            <label class="checkbox-inline i-checks"><input checked="checked" type="checkbox" value="{{$val['menu_id']}}" name="action_{{$item['menu_id']}}[]">{{$val['menu_name']}}</label>
                            @else
                            <label class="checkbox-inline i-checks"><input type="checkbox" value="{{$val['menu_id']}}" name="action_{{$item['menu_id']}}[]">{{$val['menu_name']}}</label>
                            @endif
                            @endforeach
                            @endif
                        </div>
                    </div>

                </div>
               @endforeach

                <div class="ibox-content">
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-info" type="submit">提交</button>
                        </div>
                    </div>
                </div>
                {{csrf_field()}}
            </form>
        </div>
    </div>
@endsection

@section('my-script')
    <script src="{{asset('system/js/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
        $(document).ready(function () {

            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
            $('.control-label input').on('ifClicked', function(event){

                setTimeout(function() {
                    if (event.currentTarget.checked) {
                        //全选
                        $(event.currentTarget).parents('.control-label').siblings('.marks').find('input').iCheck('check');
                    } else {
                        //取消全选
                        $(event.currentTarget).parents('.control-label').siblings('.marks').find('input').iCheck('uncheck');
                    }
                }, 100)
            });

            // 选中一个，总开关选中
            $('.marks input').on('ifChecked', function() {
                $(this).parents('.marks').siblings('.control-label').find('input').iCheck('check');
            })

            // 取消选中一个，如果同胞都未选中，总开关取消选中
            $('.marks input').on('ifUnchecked', function() {
                var par = $(this).parents('.marks');
                var sib = $(this).parents('.i-checks').siblings('.i-checks');
                var all = true;
                sib.map(function(index, item) {
                    if ($(item).find('input').is(':checked')) {
                        all = false;
                        return false;
                    };
                })
                setTimeout(function() {
                    if (all) {
                        par.siblings('.control-label').find('input').iCheck('uncheck');
                    }
                }, 50)
            })
        });
    </script>
@endsection