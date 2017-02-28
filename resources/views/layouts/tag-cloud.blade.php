@foreach($_tags as $mark=> $title)
    <a href="{{ route('article-by-tag', ['tag' => $mark]) }}">{{ $title }}</a>
@endforeach
<a href="javascript:void (0)">...</a>