@extends('admin.main')
@section('content')

    <!-- Main content -->
    <section class="content">

        <div class="box">
            <!--内容主体-->
            <div class="box-body" style="overflow-x: auto;">
                <table class="table table-striped">
                    <tr class="row">
                        <th class="col-lg-1">ID</th>
                        <th class="col-lg-2">评论文章</th>
                        <th>评论内容</th>
                        <th class="col-lg-1">评论人</th>
                        <th class="col-lg-1">邮箱</th>
                        <th class="col-lg-2">评论时间</th>
                        <th class="col-lg-1">上线/下线</th>
                        <th class="col-lg-2">操作</th>
                    </tr>
                    @foreach($data as $comment)
                        <tr class="row">
                            <td class="col-lg-1">
                                {{ $comment->getKey() }}
                            </td>
                            <td class="col-lg-2">
                                <a href="{{ route('post.show', ['id' => $comment->article_id]) }}" target="_blank">{{ $comment->article->title }}</a>
                            </td>
                            <td>
                                <span data-toggle="tooltip" data-original-title="{{ $comment->content }}">{{ str_limit($comment->content,50) }}</span>
                            </td>
                            <td class="col-lg-1">
                                {{ $comment->nickname }}
                            </td>
                            <td class="col-lg-1">
                                {{ $comment->email }}
                            </td>
                            <td class="col-lg-2">
                                {{ $comment->created_at }}
                            </td>
                            <td class="col-lg-1">
                                {!! App\Models\Article::$IS_ONLINE_HTML[$comment->on_line] !!}
                            </td>
                            <td class="col-lg-2">
                                @if($comment->on_line == 1)
                                    <a href="{{ route('comment.check', ['id' => $comment->getKey(), 'status' => 2]) }}" class="btn btn-success btn-flat btn-xs" onclick="return confirm('确定让该评论上线吗？')">审核上线</a>
                                @elseif($comment->on_line == 2)
                                    <a href="{{ route('comment.check', ['id' => $comment->getKey(), 'status' => 1]) }}"  class="btn btn-danger btn-flat btn-xs" onclick="return confirm('确定下线该评论吗？')">下线产品</a>
                                @endif
                                    <button class="btn btn-danger btn-flat btn-xs"
                                            data-url="{{route('comment.destroy', ['id' => $comment->getKey()])}}"
                                            data-toggle="modal"
                                            data-target="#delete-modal"
                                    >
                                        删除
                                    </button>
                            </td>
                        </tr>
                    @endforeach
                </table>
                <div class="pull-right" style="margin: 0;">
                    {!! $data->render() !!}
                </div>
            </div><!-- /.box-body -->
            <!--内容尾部-->
            {{--<div class="box-footer clearfix">--}}
                {{--<div class="pull-right" style="margin: 0;">--}}
                    {{--{!! $comments->render() !!}--}}
                {{--</div>--}}
            {{--</div>--}}
        </div>

    </section><!-- /.content -->
    <script>
        function resetinput()
        {
            $("#commentSearchForm input").val('');
            $("#commentSearchForm select").val('');
        }
    </script>
@endsection
@section("after.js")
    @include('admin.layout.delete',['title'=>'操作提示','content'=>'你确定要删除这个评论吗?'])
@endsection