@extends('admin.main')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-hover text-center">
                    <thead>
                        <tr class="row">
                            <td class="col-lg-2"><strong>角色标签</strong></td>
                            <td class="col-lg-2"><strong>角色显示名称</strong></td>
                            <td class="col-lg-2"><strong>描述</strong></td>
                            <td><strong>操作</strong></td>
                        </tr>
                    </thead>
                    <tbody id="memberList">
                    @foreach($data as $item)
                        <tr class="row">
                            <td class="col-lg-2">
                                    {{ $item->name }}
                            </td>
                            <td class="col-lg-2">
                                    {{ $item->display_name }}
                            </td>
                            <td class="col-lg-2">
                                    {{ $item->description }}
                            </td>
                            <td>
                                <a href="{{ route('role.edit', ['id' => $item->getKey()]) }}" class="btn btn-primary btn-flat btn-xs">修改</a> |
                                <a href="{{ route('role.edit.permission', ['id' => $item->getKey()]) }}" class="btn btn-info btn-flat btn-xs">赋权</a> |
                                <button class="btn btn-danger btn-flat btn-xs"
                                        data-url="{{route('role.destroy', ['id' => $item->getKey()])}}"
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
    @include('admin.layout.delete',['title'=>'操作提示','content'=>'你确定要删除这个角色吗?'])
@endsection