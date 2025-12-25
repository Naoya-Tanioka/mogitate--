@if ($paginator->hasPages())
<nav class="pager" role="navigation">
    {{-- Prev --}}
    @if ($paginator->onFirstPage())
        <span class="pager__item pager__item--disabled">&lt;</span>
    @else
        <a class="pager__item" href="{{ $paginator->previousPageUrl() }}" rel="prev">&lt;</a>
    @endif

    {{-- Pages --}}
    @foreach ($elements as $element)
        {{-- "..." --}}
        @if (is_string($element))
            <span class="pager__item pager__item--disabled">{{ $element }}</span>
        @endif

        {{-- Page links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <span class="pager__item pager__item--active">{{ $page }}</span>
                @else
                    <a class="pager__item" href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next --}}
    @if ($paginator->hasMorePages())
        <a class="pager__item" href="{{ $paginator->nextPageUrl() }}" rel="next">&gt;</a>
    @else
        <span class="pager__item pager__item--disabled">&gt;</span>
    @endif
</nav>
@endif