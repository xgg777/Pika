@extends('admin.main')
@section('content')
        <!--引入markdown编辑器代码-->
@include('editor::head')
<style>
    .modal-backdrop {
        z-index: 999;
    }
</style>

    <!-- Main content -->
    <section class="content">

        <div class="box">
            <!--内容头部-->
            <!--内容主体-->
            <div class="box-body" style="overflow-x: auto;">
                <form class="form-horizontal" name="editArticleForm" id="form" action="/article/editmarkdown/{{$article->getKey()}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="box-body">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">文章标题</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="title" name="title" value="{{$article->title}}" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="is_recommend" class="col-sm-2 control-label">是否标为推荐</label>
                            <div class="col-sm-7">
                                {!! Form::select('is_recommend', array('' => '--请选择--')+App\Models\Article::$ARTICLE_IS_RECOMMEND, $article->is_recommend, array('class' => 'form-control', 'id' => 'is_recommend', 'required' => 'true', 'title' => '请选择是否推荐')) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">标签</label>
                            <div class="col-sm-7">
                                <select class="form-control select2" multiple="multiple" data-placeholder="选择标签" name="tags[]" style="width: 100%;">
                                    @foreach($tags as $id => $title)
                                        <option value="{{ $id }}" @if(in_array($id, $own_tags)) selected @endif>{{ $title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="content" class="col-sm-2 control-label">内容</label>
                            <div class="col-sm-7 editor">
                                <textarea class="form-control" rows="5"  id='myEditor' name="content">{{ $article->markdown_source }}</textarea>
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
@stop

