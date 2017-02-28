@extends('admin.main')
@section('content')
    <!-- Main content -->
    <section class="content">

        <div class="box">
            <!--内容头部-->
            <!--内容主体-->
            <div class="box-body" style="overflow-x: auto;">
                <form class="form-horizontal cmxform" name="editAccessForm" id="editAccessForm" action="/user/rolePermission/{{ $role->id }}" method="post">
                    {!! csrf_field() !!}
                    <div class="box-body">
                        <div class="form-group" id="checkboxList">
                            @foreach($permissions as $permission)
                                <label class="col-sm-2">
                                     <input type="checkbox" name="access[]" value="{{ $permission->id }}">{{ $permission->display_name }}
                                 </label>
                            @endforeach
                        </div>

                    </div><!-- /.box-body -->
                    <div class="box-footer">
                        <div class="form-group">
                            <label class="col-sm-1">
                                <input type="checkbox" id="selectAll" onclick="selectAll()">全选
                            </label>
                            <div class="col-sm-11">
                                <button type="submit" class="btn btn-info">提交</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div><!-- /.box-body -->
        </div>

    </section><!-- /.content -->
    <script>
        function selectAll(){
            if ($("#selectAll").attr("checked")) {
                $("#checkboxList :checkbox").attr("checked", true);
            } else {
                $("#checkboxList :checkbox").attr("checked", false);
            }
        }
        $(function(){

            $("#editAccessForm").validate();
        });
    </script>
@endsection