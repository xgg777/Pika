@extends('admin.main')
@section('content')
    <!-- Main content -->
    <section class="content">

        <div class="box">
            <!--内容头部-->
            <!--内容主体-->
            <div class="box-body" style="overflow-x: auto;">
                <form class="form-horizontal" name="editCommentForm" id="form" action="/comment/edit/{{$comment->getKey()}}" method="post">
                    {!! csrf_field() !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">所属文章</label>
                            <div class="col-sm-7">
                                <a href="/post/article/{{ $comment->article_id }}" target="_blank">{{ $comment->article->title }}</a>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">评论人</label>
                            <div class="col-sm-7">
                                <input class="form-control" value="{{ $comment->nickname }}" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">内容</label>
                            <div class="col-sm-7">
                                <textarea name="content" class="form-control" required title="请输入评论内容">{{ $comment->content }}</textarea>
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
@stop

