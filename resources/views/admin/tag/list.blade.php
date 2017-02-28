@extends('admin.main')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <!--内容主体-->
            <div class="box-body">
                <table class="table table-hover text-center">
                    <tr class="row">
                        <th class="col-lg-1">ID</th>
                        <th class="col-lg-2">名称</th>
                        <th class="col-lg-2">标记</th>
                        <th class="col-lg-2">最后更新时间</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $item)
                        <tr class="row">
                            <td class="col-lg-1">
                                {{ $item->getKey() }}
                            </td>
                            <td class="col-lg-2">
                                {{ $item->title }}
                            </td>
                            <td class="col-lg-2">
                                {{ $item->mark }}
                            </td>
                            <td class="col-lg-2">
                                {{ $item->updated_at }}
                            </td>
                            <td>
                                <a href="{{ route('tag.edit', ['id' => $item->getKey()]) }}" class="btn btn-primary btn-flat btn-xs">修改</a> |
                                <button class="btn btn-danger btn-flat btn-xs"
                                        data-url="{{route('tag.destroy', ['id' => $item->getKey()])}}"
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
        </div>
    </section><!-- /.content -->
@endsection
@section("after.js")
    @include('admin.layout.delete',['title'=>'操作提示','content'=>'你确定要删除这个标签吗?'])
@endsection