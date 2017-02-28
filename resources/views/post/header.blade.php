<nav class="main-navigation">
    {{--<p class="navbar-text"><strong>轻对我而言</strong></p>--}}
    <div class="container">
        <div class="row">
            <div class="col-xs-12" style="text-align: center">
                <ul class="nav nav-list">

                    <li><a href="{{ route('article.list', ['type' => 1]) }}">左手代码</a></li>
                    <li><a href="/"><strong>/</strong></a></li>
                    <li><a href="{{ route('article.list', ['type' => 2]) }}">右手诗</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>