@extends('admin.main')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <!--内容头部-->
            <!--内容主体-->
            <div class="box-body" style="overflow-x: auto;">
                <form class="form-horizontal cmxform" name="editUserForm" id="form" action="{{ route('user.update', ['id' => $user->getKey()]) }}" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="put">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">用户名</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="name" name="name" placeholder="用户名" value="{{ $user->name }}" minlength="2" required title="请输入至少两位字符的用户名" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">密码</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="password" name="password" placeholder="不修改则为原密码" minlength="6"  title="请输入至少6位字符的密码"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">邮箱</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" id="email" name="email" placeholder="邮箱" value="{{ $user->email }}" required title="请输入正确的邮箱地址"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">角色</label>
                            <div class="col-sm-7">
                                <div class="checkbox">
                                    <?php
                                        $role_arr = [];
                                        foreach($user->roles as $role)
                                            {
                                                $role_arr[] = $role->id;
                                            }
                                    ?>
                                    @foreach($role_list as $role_id=>$name)
                                        <label>
                                            <input type="checkbox" name="roles[]" value="{{ $role_id }}" @if(in_array($role_id, $role_arr)) checked @endif>
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
        </div>

    </section><!-- /.content -->
@endsection