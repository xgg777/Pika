@extends('admin.main')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <!--内容主体-->
            <div class="box-body" style="overflow-x: auto;">
                <form class="form-horizontal cmxform" name="addRoleForm" id="form" action="{{ route('permission.update', ['id' => $permission->getKey()]) }}" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="put">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="permission_name" class="col-sm-2 control-label">权限名称</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="name" name="name" placeholder="权限名称" value="{{ $permission->name  }}" minlength="2" required title="权限名称" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="label" class="col-sm-2 control-label">标签</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="display_name" name="display_name" placeholder="标签" value="{{ $permission->display_name  }}" required title="请输入标签" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">描述</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="description" name="description" placeholder="描述" value="{{ $permission->description  }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">权限类型</label>
                            <div class="col-sm-7">
                                {!! Form::select('type', array('' => '--请选择--')+App\Models\Permission::$PERMISSION_TYPES, $permission->type, array('class' => 'form-control', 'id' => 'type', 'required' => 'true', 'title' => '请选择权限类型')) !!}
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-7">
                                <button type="submit" class="btn btn-info btn-flat">提交</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- /.box-body -->
        </div>
    </section><!-- /.content -->
@endsection