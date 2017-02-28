@extends('admin.main')

@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <!--内容主体-->
            <div class="box-body" style="overflow-x: auto;">
                <form class="form-horizontal cmxform" name="addRoleForm" id="form" action="{{ route('action.store') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">操作分组</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="group" name="group" placeholder="例：action、menu" value="{{ old('group') }}" required title="请输入操作分组" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">操作名称</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="name" name="name" placeholder="例：菜单列表显示" value="{{ old('name') }}" minlength="2" required title="请输入操作名称" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">操作描述</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="description" name="description" placeholder="描述" value="{{ old('description') }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="label" class="col-sm-2 control-label">操作标示</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="action" name="action" placeholder="例：App\Http\Controllers\Admin\MenuController@index" value="{{ old('action') }}" required title="请输入标签" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="label" class="col-sm-2 control-label">是否禁用</label>
                            <div class="col-sm-7">
                                <select name="state" id="state" class="form-control">
                                    <option value="0">禁用</option>
                                    <option value="1" selected>启用</option>
                                </select>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <button type="submit" class="btn btn-info btn-flat">添加</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- /.box-body -->
        </div>
    </section><!-- /.content -->
@endsection