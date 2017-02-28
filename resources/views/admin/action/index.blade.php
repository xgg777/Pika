@extends('admin.main')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="box-body">
                <table class="table table-hover">
                    <thead>
                    <tr class="row">
                        <td class="col-lg-1"><strong>操作ID</strong></td>
                        <td class="col-lg-1"><strong>操作名称</strong></td>
                        <td class="col-lg-2"><strong>操作描述</strong></td>
                        <td class="col-lg-1"><strong>操作分组</strong></td>
                        <td><strong>操作标示</strong></td>
                        <td class="col-lg-1"><strong>状态</strong></td>
                        <td class="col-lg-2"><strong>操作</strong></td>
                    </tr>
                    </thead>
                    <tbody id="memberList">
                    @foreach($actions as $action)
                        <tr class="row">
                            <td class="col-lg-1">
                                    {{ $action->getKey() }}
                            </td>
                            <td class="col-lg-1">
                                    {{ $action->name }}
                            </td>
                            <td class="col-lg-2">
                                    {{ $action->description }}
                            </td>
                            <td class="col-lg-1">
                                    {{ $action->group }}
                            </td>
                            <td>
                                    {{ $action->action }}
                            </td>
                            <td class="col-lg-1">
                                    @if($action->state == 0)<span style="color: red">禁用</span>@else<span style="color: green">启用</span>@endif
                            </td>
                            <td class="col-lg-1">
                                <a href="{{ route('action.edit', ['id' => $action->getKey()]) }}" class="btn btn-primary btn-flat btn-xs">修改</a> |
                                <button class="btn btn-danger btn-flat btn-xs"
                                        data-url="{{route('action.destroy', ['id' => $action->getKey()])}}"
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
                <div class="pull-right" style="margin: 0;">
                    {!! $actions->render() !!}
                </div>
            </div><!-- /.box-body -->
        </div>
    </section><!-- /.content -->
@endsection
@section("after.js")
    @include('admin.layout.delete',['title'=>'操作提示','content'=>'你确定要删除这个操作吗?'])
@endsection