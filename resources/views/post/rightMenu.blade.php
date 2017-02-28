<link rel="stylesheet" href="{{ asset("plugin/social-share/css/share.min.css") }}">
<script src="{{ asset("plugin/social-share/js/social-share.min.js") }}"></script>
<aside class="col-md-4 sidebar">

    {{--<div class="widget">--}}
        {{--<h4 class="title">交流</h4>--}}
        {{--<div class="content community">--}}
            {{--<p><a href="https://github.com/zenoZz" target="_blank" style="color: #f4645f"><i class="fa fa-fw fa-github"></i>GitHub</a></p>--}}
            {{--<p><a href="javascript:void (0)">QQ群：527278156</a></p>--}}
            {{--<p><a href="javascript:void (0)" style="color: #f4645f"><span class="glyphicon glyphicon-globe"></span> 交流社区</a></p>--}}

        {{--</div>--}}
    {{--</div>--}}

    <div class="widget">
        <h4 class="title">搜索</h4>
        <div class="content community">
            <form class="navbar-form" role="search" action="{{ route('post.index') }}" method="get">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="" name="title" value="">
                </div>
                <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
            </form>
        </div>
    </div>

    <!-- start tag cloud widget -->
    <div class="widget">
        <h4 class="title">Notice</h4>
        <div class="content community">
            <p style="color: #f4645f">网站制作、微信开发</p>
            <p><a href="javascript:void (0)" style="color: #f4645f"><span class="glyphicon glyphicon-envelope"></span></a>：77849093@qq.com</p>
            <p><a href="javascript:void (0)" style="color: #f4645f"><span class="glyphicon glyphicon-earphone"></span></a>：<a href="tel:15827535604">15827535604</a></p>
        </div>
    </div>

    <div class="widget">
        <h4 class="title">链接</h4>
        <div class="content community">
            <p><a target="_blank" href="https://laravel-china.org/" style="color: #f4645f"><span class="glyphicon glyphicon-link"></span></a> 中国最大laravel社区</p>
            <p><a target="_blank" href="http://www.laruence.com/" style="color: #f4645f"><span class="glyphicon glyphicon-link"></span></a> 鸟哥博客</p>
        </div>
    </div>
    <!-- end tag cloud widget -->

    <!-- start tag cloud widget -->
    <div class="widget">
        <h4 class="title">标签云</h4>
        <div class="content tag-cloud">
            @include('layouts.tag-cloud')
        </div>
    </div>

    <div class="widget">
        <h4 class="title">分享</h4>
        <div class="social-share" data-disabled="google,facebook,twitter,tencent,diandian"></div>
    </div>

    {{--<div class="widget">--}}
        {{--<h4 class="title">打赏</h4>--}}
        {{--<div class="content community text-center">--}}
            {{--<p><img src="{{ asset ("/pika/img/payme.jpg") }}" alt=""></p>--}}
        {{--</div>--}}
    {{--</div>--}}
</aside><!--end main right-->
