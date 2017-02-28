@extends('admin.main')
@section('content')
    <!-- Main content -->
    <section class="content">

        <div class="box">
            <!--内容主体-->
            <div class="box-body" style="overflow-x: auto;">
                <table class="table table-hover text-center">
                    <thead>
                        <tr class="row">
                            <th class="col-lg-1">ID</th>
                            <th>标题</th>
                            <th class="col-lg-2">标签</th>
                            <th class="col-lg-1">上线状态</th>
                            <th class="col-lg-1">作者</th>
                            <th class="col-lg-1">排序</th>
                            <th class="col-lg-2">最后更新时间</th>
                            <th class="col-lg-2">操作</th>
                        </tr>
                    </thead>
                    @foreach($articles as $article)
                        <tr class="row">
                            <td class="col-lg-1">
                                {{ $article->getKey() }}
                            </td>
                            <td>
                                <a href="{{ route('post.show', ['id' => $article->getKey()]) }}" target="_blank">{{ $article->title }}</a>
                            </td>
                            <td class="col-lg-2">
                                @foreach($article->tags as $tag) {{ $tag->title }}&nbsp;@endforeach
                            </td>
                            <td class="col-lg-1">
                                {!! App\Models\Article::$IS_ONLINE_HTML[$article->on_line] !!}
                            </td>
                            <td class="col-lg-1">
                                {{ $article->admin->name }}
                            </td>
                            <td class="col-lg-1">
                                {{ $article->sort }}
                            </td>
                            <td class="col-lg-2">
                                {{ $article->updated_at }}
                            </td>
                            <td class="col-lg-2">
                                <a href="{{ route('article.edit', ['id' => $article->getKey()]) }}" class="btn btn-primary btn-flat btn-xs">修改</a> |
                                <button class="btn btn-danger btn-flat btn-xs"
                                        data-url="{{route('article.destroy', ['id' => $article->getKey()])}}"
                                        data-toggle="modal"
                                        data-target="#delete-modal"
                                        >
                                    删除
                                </button> |
                                @if($article->on_line == 1)
                                    <a href="{{ route('article.check', ['id' => $article->getKey(), 'status' => 2]) }}" class="btn btn-success btn-flat btn-xs" onclick="return confirm('确定让文章上线吗？')">审核上线</a>
                                @elseif($article->on_line == 2)
                                    <a href="{{ route('article.check', ['id' => $article->getKey(), 'status' => 1]) }}"  class="btn btn-danger btn-flat btn-xs" onclick="return confirm('确定下线该文章吗？')">下线产品</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="pull-right" style="margin: 0;">
                    {!! $articles->render() !!}
                </div>
            </div><!-- /.box-body -->
        </div>
    </section><!-- /.content -->
@endsection
@section("after.js")
    @include('admin.layout.delete',['title'=>'操作提示','content'=>'你确定要删除这篇文章吗?'])
@endsection