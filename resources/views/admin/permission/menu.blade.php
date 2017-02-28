@extends('admin.main')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <!--内容主体-->
            <div class="box-body">
                <form class="form-horizontal cmxform" name="registerForm" id="form" action="{{ route('permission.related.menu') }}" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" name="permission_id" value="{{ $id }}">
                    <div class="box-body">
                       <div class="form-group">
                            <div class="col-sm-12">
                                {!! $menus !!}
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            {{--<label class="col-sm-2 control-label"></label>--}}
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