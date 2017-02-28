@extends('admin.main')
@section('content')
    <!-- Main content -->
    <section class="content">

        <div class="box">
            <!--内容头部-->
            <!--内容主体-->
            <div class="box-body" style="overflow-x: auto;">
                <form class="form-horizontal cmxform" name="addRoleForm" id="form" action="{{ route('role.store') }}" method="post">
                    {!! csrf_field() !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">角色名称</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="name" name="name" placeholder="用户名" value="{{ old('name') }}" minlength="2" required title="请输入至少两位字符的名称" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="label" class="col-sm-2 control-label">标签</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="display_name" name="display_name" placeholder="标签" value="{{ old('display_name') }}" required title="请输入显示标签"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">描述</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="description" name="description" placeholder="描述" value="{{ old('description') }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">权限</label>
                            <div class="col-sm-7">
                                <div class="checkbox">
                                    @foreach($permissions as $p_id=>$name)
                                        <label>
                                            <input type="checkbox" name="permissions[]" value="{{ $p_id }}">
                                            {{ $name }}
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <button type="button" class="btn btn-info btn-flat submit-form-sync">添加</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- /.box-body -->
        </div>
    </section><!-- /.content -->
@endsection