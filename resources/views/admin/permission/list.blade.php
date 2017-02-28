@extends('admin.main')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-hover text-center">
                    <thead>
                    <tr class="row">
                        <td class="col-lg-1"><strong>权限ID</strong></td>
                        <td class="col-lg-2"><strong>权限名称</strong></td>
                        <td class="col-lg-1"><strong>权限类型</strong></td>
                        <td class="col-lg-2"><strong>标签</strong></td>
                        <td class="col-lg-2"><strong>描述</strong></td>
                        <td><strong>操作</strong></td>
                    </tr>
                    </thead>
                    <tbody id="memberList">
                    @foreach($data as $item)
                        <tr class="row">
                            <td class="col-lg-1">
                                    {{ $item->getKey() }}
                            </td>
                            <td class="col-lg-2">
                                    {{ $item->name }}
                            </td>
                            <td class="col-lg-1">
                                    {{ $item->type }}
                            </td>
                            <td class="col-lg-2">
                                    {{ $item->display_name }}
                            </td>
                            <td class="col-lg-2">
                                    {{ $item->description }}
                            </td>
                            <td>
                                <a href="{{ route('permission.edit', ['id' => $item->getKey()]) }}" class="btn btn-primary btn-flat">编辑</a> |
                                <a href="{{ route('permission.related', ['id' => $item->getKey()]) }}" class="btn btn-info btn-flat">关联</a> |
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
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div>
    </section><!-- /.content -->
@endsection
@section("after.js")
    @include('admin.layout.delete',['title'=>'操作提示','content'=>'你确定要删除这个权限吗?'])
@endsection