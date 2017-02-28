
@extends('post.post')

@section('content')
    @if(isset($articles) && !empty($articles) && count($articles) > 0)
        @foreach($articles as $article)
        <article id="{$val['id']}" class="post tag-laravel tag-laravel-5-1 tag-xin-ban-ben-fa-bu" style="margin-bottom:20px;">
            @if($article->is_recommend == App\Models\Article::ARTICLE_IS_RECOMMEND_YES)
                <div class="featured" title="推荐文章">
                    <span class="glyphicon glyphicon-star"></span>
                </div>
            @endif
            <div class="post-head">
                <h1 class="post-title"><a href="{{ route('post.show', ['id' => $article->getKey()]) }}">{{$article->title}}</a></h1>
                <div class="post-meta">
                    <span class="author">作者：<a target="_blank" href="http://weibo.com/2962035201/profile?topnav=1&wvr=6&is_all=1" style="color: #f4645f">{{$article->author}}</a></span> &bull;
                    <time class="post-date"  title="{$val['updated_at']}">{{ str_limit($article->created_at, 10, '')}}</time> |
                    <span class="author">浏览：{{ $article->views_count }}</span> &bull;
                    <span class="author">评论：{{ $article->comment_count }}</span>
                </div>
            </div>
            <div class="featured-media">
            </div>
            <div class="post-content">
                <p>{{ str_limit(strip_tags($article->content), 250, '') }}</p>
            </div>
            <div class="post-permalink">
                <a href="{{ route('post.show', ['id' => $article->getKey()]) }}" class="btn btn-default">阅读全文</a>
            </div>

            <footer class="post-footer clearfix">
                <div class="pull-left tag-list">
                    <span class="glyphicon glyphicon-folder-open"></span>
                    @foreach($article->tags as $tag)<a href="{{ route('article-by-tag', ['tag' => $tag->mark]) }}">{{ $tag->title }}</a>@endforeach
                    {{--<a href="/post/articles/{{ $article->article_type }}">{{App\Article::$ARTICLE_TYPE[$article->article_type]}}</a><a href="/tag/laravel-5-1/"></a><a href="/tag/xin-ban-ben-fa-bu/"></a>--}}
                </div>
                <div class="pull-right share">
                </div>
            </footer>
        </article>
        @endforeach

        <div class="text-center" style="margin-bottom: 10px;">
            {!! $articles->appends(['title' => $title])->render() !!}
        </div>
    @else
        <article class="post tag-laravel tag-laravel-5-1 tag-xin-ban-ben-fa-bu">
            <div class="post-content text-center">
               <p class="post-title">抱歉，暂时没有相关文章</p>
            </div>
        </article>
    @endif
@stop

