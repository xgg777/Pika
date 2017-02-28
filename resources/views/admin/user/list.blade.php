@extends('admin.main')
@section('content')
     <!-- Main content -->
     <section class="content">
          <div class="box">
               <!--内容头部-->
               <!--内容主体-->
               <div class="box-body" style="overflow-x: auto;">
                    <table class="table table-hover">
                         <tr class="row">
                              <th class="col-lg-1 text-center">ID</th>
                              <th class="col-lg-2 text-center">姓名</th>
                              <th class="col-lg-4 text-center">email</th>
                              <th class="col-lg-2 text-center">管理组</th>
                              <th class="text-center">操作</th>
                         </tr>
                         @foreach($data as $item)
                              <tr class="row text-center">
                                   <td class="col-lg-1">
                                        {{ $item->id }}
                                   </td>
                                   <td class="col-lg-2">
                                        {{ $item->name }}
                                   </td>
                                   <td class="col-lg-4">
                                        {{ $item->email }}
                                   </td>
                                   <td class="col-lg-2">
                                        @foreach($item->roles as $role){{$role->display_name}}|@endforeach
                                   </td>
                                   <td>
                                        <a href="{{ route('user.edit', ['id' => $item->getKey()]) }}" class="btn btn-primary btn-flat">修改</a> |
                                        <button class="btn btn-danger btn-flat"
                                                data-url="{{route('user.destroy', ['id' => $item->getKey()])}}"
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
     @include('admin.layout.delete',['title'=>'操作提示','content'=>'你确定要删除这个用户吗?'])
@endsection