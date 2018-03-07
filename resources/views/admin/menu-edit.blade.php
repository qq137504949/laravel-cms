@extends('admin.layouts.app')

@section('content')
    <div class="wrapper wrapper-content ">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <div class="col-sm-4">
                    <h3>菜单管理</h3>
                    <ol class="breadcrumb">
                        <li>
                            <a href="{{asset('admin/menu')}}">菜单列表</a>
                        </li>
                        <li>
                            <strong class="text-muted">修改菜单</strong>
                        </li>
                    </ol>
                </div>
            </div>
            <div class="ibox-content">
                <form  action="{{asset('admin/menu')}}/{{$menu->menu_id}}" method="post" class="form-horizontal m-t" id="roleForm" >
                    <div class="form-group">
                        <label class="col-sm-3 control-label">菜单名称：</label>
                        <div class="col-sm-8">
                            <input id="menu_name" value="{{$menu->menu_name}}"  name="menu_name" class="form-control" type="text" aria-required="true" aria-invalid="true" class="error" >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">顶级菜单图标：</label>
                        <div class="col-sm-8">
                            <input id="menu_icon"  value="{{$menu->menu_icon}}" name="menu_icon" class="form-control" type="text"  >
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
                                    @if($menu->parent_id == $item->menu_id)
                                    <option value="{{$item->menu_id}}" hassubinfo="true" selected="selected">{{$item->menu_name}}</option>
                                    @else
                                    <option value="{{$item->menu_id}}" hassubinfo="true">{{$item->menu_name}}</option>
                                    @endif
                                @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">二级菜单连接：</label>
                        <div class="col-sm-8">
                            <input id="menu_link" value="{{$menu->menu_link}}" name="menu_link" class="form-control" type="text"  >
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-3">
                            <button class="btn btn-primary" type="submit">提交</button>
                        </div>
                    </div>
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="PUT">

                </form>
            </div>
        </div>
    </div>

@endsection