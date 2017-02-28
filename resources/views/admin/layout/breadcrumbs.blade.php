@if(!empty($title[$route]['name']))
    <h1>
        {{ $title[$route]['name'] or "" }}
        <small>{{ $title[$route]['description'] or "" }}</small>
    </h1>
@endif
{!! $viewService->renderBreadcrumbs($menus,$route) !!}