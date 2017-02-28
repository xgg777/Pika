@extends('admin.main')
@section('content')

    <!-- Main content -->
    <section class="content">

        <div class="box">
            <!--内容主体-->
            <div class="box-body" style="overflow-x: auto;">
                <form class="form-horizontal cmxform" name="addRoleForm" id="form" action="{{ route('action.update', ['id' => $action->getKey()]) }}" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="put">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">操作分组</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="group" name="group" placeholder="操作分组" value="{{ $action->group }}" required title="请输入操作分组" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">操作名称</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="name" name="name" placeholder="操作名称" value="{{ $action->name }}" minlength="2" required title="请输入操作名称" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description" class="col-sm-2 control-label">操作描述</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="description" name="description" placeholder="描述" value="{{ $action->description }}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="label" class="col-sm-2 control-label">操作标示</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="action" name="action" placeholder="标签" value="{{ $action->action }}" required title="请输入操作标示" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="label" class="col-sm-2 control-label">是否禁用</label>
                            <div class="col-sm-7">
                                <select name="state" id="state" class="form-control">
                                    <option value="0" @if($action->state == 0) selected @endif>禁用</option>
                                    <option value="1" @if($action->state == 1) selected @endif>启用</option>
                                </select>
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