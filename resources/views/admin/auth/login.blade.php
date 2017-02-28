<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>admin</title>
    <link href="{{ asset("/pika/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/pika/lib/font-awesome/4.3.0/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/pika/lib/ionicons/2.0.1/css/ionicons.min.css") }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset("/pika/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
    <script src="{{ asset ("/pika/js/jquery-2.2.3.min.js") }}"></script>
    <script src="{{ asset ("/pika/js/form-submit-sync.js") }}"></script>
    <script src="{{ asset ("/pika/lib/layer/layer.js") }}"></script>
</head>
<body class="login-page">
@include('layouts.topInfo')
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>PiKa</b>cms</a>
    </div><!-- /.login-logo -->
    <div class="login-box-body">
        <p class="login-box-msg">后台管理系统</p>
        <form action="{{ route('login.post') }}" method="post" class="cmxform">
            {!! csrf_field() !!}
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="Email" required title="请输入登录邮箱" value="{{ old('email') }}"/>
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password" required title="请输入密码"/>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    {{--<div class="checkbox icheck">--}}
                        {{--<label>--}}
                            {{--<input type="checkbox"> Remember Me--}}
                        {{--</label>--}}
                    {{--</div>--}}
                </div>
                <div class="col-xs-4">
                    <button type="button" class="btn btn-primary btn-block btn-flat submit-form-sync">登录</button>
                </div><!-- /.col -->
            </div>
        </form>
        {{--<a href="javascript:void (0)">忘记密码?</a><br>--}}
    </div><!-- /.login-box-body -->
</div><!-- /.login-box -->
</body>
</html>