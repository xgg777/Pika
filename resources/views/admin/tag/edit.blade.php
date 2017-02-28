@extends('admin.main')
@section('content')
    <!-- Main content -->
    <section class="content">

        <div class="box">
            <!--内容头部-->
            <!--内容主体-->
            <div class="box-body" style="overflow-x: auto;">
                <form class="form-horizontal cmxform" name="addRoleForm" id="form" action="{{ route('tag.update', ['id' => $tag->getKey()]) }}" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" name="_method" value="put">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">名称</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="title" name="title" placeholder="名称" value="{{ $tag->title }}" required title="请输入名称" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="label" class="col-sm-2 control-label">标记</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="mark" name="mark" placeholder="标签" value="{{ $tag->mark }}" required title="请输入标签"/>
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