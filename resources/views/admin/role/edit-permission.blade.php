@extends('admin.main')
@section('content')
<!-- Main content -->
<section class="content">

    <div class="box">
        <!--内容头部-->
        <!--内容主体-->
        <div class="box-body" style="overflow-x: auto;">
            <form class="form-horizontal cmxform" name="addRoleForm" id="editRoleForm" action="{{ route('role.update.permission', ['id' => $role->getKey()]) }}" method="post">
                {!! csrf_field() !!}
                <input type="hidden" name="_method" value="put">
                <div class="box-body">
                    <div class="form-group">
                        <label for="role_name" class="col-sm-2 control-label">角色名称</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" value="{{ $role->name  }}" disabled />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">权限</label>
                        <div class="col-sm-7">
                            <div class="checkbox">
                                <?php
                                    $p_arr = [];
                                    if (count($role->perms) > 0)
                                        {
                                            foreach($role->perms as $permission)
                                            {
                                                $p_arr[] = $permission->id;
                                            }
                                        }
                                ?>
                                @foreach($permissions as $p_id=>$name)
                                <label>
                                    <input type="checkbox" name="permissions[]" value="{{ $p_id }}" @if(in_array($p_id, $p_arr)) checked @endif>
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
                            <button type="submit" class="btn btn-info btn-flat">提交</button>
                        </div>
                    </div>
                </div>
            </form>
        </div><!-- /.box-body -->
        <!--内容尾部-->
        <div class="box-footer clearfix">

        </div>
    </div>

</section><!-- /.content -->
<script>
    $(function(){
        $("#editRoleForm").validate();
    });
</script>
@endsection