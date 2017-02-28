<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
<title>{{ $page_title or "PiKa-cms" }}</title>
<meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
<link href="{{ asset("/pika/css/bootstrap.min.css") }}" rel="stylesheet" type="text/css" />
<link href="{{ asset("/pika/lib/font-awesome/4.3.0/css/font-awesome.min.css") }}" rel="stylesheet" type="text/css" />
<link href="{{ asset("/pika/lib/ionicons/2.0.1/css/ionicons.min.css") }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset("/pika/css/select2.min.css") }}">
<link href="{{ asset("/pika/css/AdminLTE.min.css")}}" rel="stylesheet" type="text/css" />
<link href="{{ asset("/pika/css/skins/skin-blue.min.css")}}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="{{ asset("/pika/css/form_v.css") }}">
<script src="{{ asset ("/pika/js/jquery-2.2.3.min.js") }}"></script>
@yield('after.css')
</head>
<body class="hold-transition skin-blue sidebar-mini">
@include('layouts.topInfo')
<div class="wrapper">
    @inject('viewService','App\Services\ViewService')
    @include('admin.layout.header')
    @include('admin.layout.sidebar')
    <div class="content-wrapper">
        <section class="content-header">
            @include('admin.layout.breadcrumbs')
        </section>
        <section class="content">
            @yield('content')
        </section>
    </div>
    @include('admin.layout.footer')
</div><!-- ./wrapper -->
<script src="{{ asset ("/pika/js/bootstrap.min.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/pika/js/select2.full.min.js") }}"></script>
<script src="{{ asset ("/pika/js/app.min.js") }}" type="text/javascript"></script>
<script src="{{ asset ("/pika/js/jquery.validate.min.js" ) }}"></script>
<script src="{{ asset ("/pika/lib/layer/layer.js" ) }}"></script>
<script src="{{ asset ("/pika/js/form_v.js" ) }}"></script>
@yield('after.js')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>
</body>
</html>