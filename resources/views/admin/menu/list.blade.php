@extends('admin.main')
@section('content')
    <!-- Main content -->
    <section class="content">

        <div class="box">
            <!--内容主体-->
            <div class="box-body" style="overflow-x: auto;">
                <table class="table table-hover text-center">
                    <tr class="row">
                        <th class="col-lg-1">菜单编号</th>
                        <th class="col-lg-2">菜单名称</th>
                        <th class="col-lg-4">菜单路由</th>
                        <th class="col-lg-1">菜单排序</th>
                        <th class="col-lg-2">是否显示</th>
                        <th>操作</th>
                    </tr>
                    @foreach($data as $item)
                        <tr class="row">
                            <td class="col-lg-1">
                                {{ $item->getKey() }}
                            </td>
                            <td class="col-lg-2">
                                {{ $item->name }}
                            </td>
                            <td class="col-lg-4">
                                {{ $item->route }}
                            </td>
                            <td class="col-lg-1">
                                {{ $item->sort }}
                            </td>
                            <td class="col-lg-2">
                                @if($item->hide == 0)<span style="color: green">显示</span>@else<span style="color: red">隐藏</span>@endif
                            </td>
                            <td>
                                <a href="{{ route('menu.edit', ['id' => $item->getKey()]) }}" class="btn btn-primary btn-flat">编辑</a> |
                                <button class="btn btn-danger btn-flat"
                                        data-url="{{route('menu.destroy', ['id' => $item->getKey()])}}"
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
    @include('admin.layout.delete',['title'=>'操作提示','content'=>'你确定要删除这个菜单吗?'])
@endsection