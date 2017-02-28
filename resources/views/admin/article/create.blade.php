@extends('admin.main')
@section('content')
    @include('layouts.ueditor_admin')
    <!-- Main content -->
    <section class="content">

        <div class="box">
            <!--内容头部-->
            <!--内容主体-->
            <div class="box-body" style="overflow-x: auto;">
                <form class="form-horizontal cmxform" name="createArticleForm" id="form" action="{{ route('article.store') }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="box-body">

                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">文章标题</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="title" name="title" placeholder="文章标题" required title="请输入文章标题"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">作者</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="author" name="author" placeholder="作者" required value="{{ $_user->name }}"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="is_recommend" class="col-sm-2 control-label">是否标为推荐</label>
                            <div class="col-sm-7">
                                {!! Form::select('is_recommend', array('' => '--请选择--')+App\Models\Article::$ARTICLE_IS_RECOMMEND, '', array('class' => 'form-control', 'id' => 'is_recommend', 'required' => 'true', 'title' => '请选择是否推荐')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="is_recommend" class="col-sm-2 control-label">文章类型</label>
                            <div class="col-sm-7">
                                {!! Form::select('type', array('' => '--请选择--')+App\Models\Article::$ARTICLE_TYPE, '', array('class' => 'form-control', 'id' => 'type', 'required' => 'true', 'title' => '请选择文章类型')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">排序</label>
                            <div class="col-sm-7">
                                <input type="number" min="1" class="form-control" id="sort" name="sort" value="1" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">标签</label>
                            <div class="col-sm-7">
                                <select class="form-control select2" multiple="multiple" data-placeholder="选择标签" name="tags[]" style="width: 100%;">
                                    @foreach($tags as $id => $title)
                                        <option value="{{ $id }}">{{ $title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        {{--<div class="form-group">--}}
                            {{--<label for="email" class="col-sm-2 control-label">文章头部图片</label>--}}
                            {{--<div class="col-sm-7">--}}
                                {{--<input type="file" name="article_photo" />--}}
                            {{--</div>--}}
                        {{--</div>--}}
                        <div class="form-group">
                            <label for="cp_group_id" class="col-sm-2 control-label">文章内容</label>
                            <div class="col-sm-7">
                                <script id="editor" name="content" type="text/plain"></script>
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
@stop

