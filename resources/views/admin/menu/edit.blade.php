@extends('admin.main')
@section('content')
    <!-- Main content -->
    <section class="content">

        <div class="box">
            <!--内容头部-->
            <!--内容主体-->
            <div class="box-body" style="overflow-x: auto;">
                <form class="form-horizontal cmxform" name="addRoleForm" id="form" action="{{ route('menu.update', ['id' => $menu->getKey()]) }}" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="put">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">父级菜单</label>
                            <div class="col-sm-7">
                                <select name="parent_id" id="parent_id" class="form-control">
                                    <option value="0" @if($menu->parent_id == 0) selected @endif>顶级分类</option>
                                    @foreach($menus_tree as $item)
                                            <option value="{{$item['id']}}" @if($menu->parent_id == $item['id']) selected @endif>
                                                {{ $item['html'] }}{{ $item['name'] }}
                                            </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="label" class="col-sm-2 control-label">菜单名称</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="name" name="name" placeholder="标签" value="{{ $menu->name }}" required title="请输入菜单名称"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">菜单描述</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="description" name="description" placeholder="菜单描述" value="{{ $menu->description }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">菜单路由</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="route" name="route" placeholder="菜单路由" value="{{ $menu->route }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">菜单图标</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="icon" name="icon" placeholder="菜单图标" value="{{ $menu->icon }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">菜单排序</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="sort" name="sort" value="{{ $menu->sort }}" placeholder="菜单排序"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">是否隐藏</label>
                            <div class="col-sm-7">
                                {!! Form::select('hide', array('' => '--请选择--')+App\Models\Menu::$MENU_HIDE, $menu->hide, array('class' => 'form-control', 'id' => 'hide', 'required' => 'required')) !!}
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <button type="button" class="btn btn-info btn-flat submit-form-sync">提交</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- /.box-body -->
        </div>

    </section><!-- /.content -->
@endsection