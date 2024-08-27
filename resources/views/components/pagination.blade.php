@if ($paginator->lastPage() > 1)

<nav>
    <ul class="w3-pagination w3-margin-top">
        @if ($paginator->onFirstPage())
            <li class="w3-disabled"><span>&laquo; Previous</span></li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}" class="w3-button ">&laquo; Previous</a></li>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="w3-disabled"><span>{{ $element }}</span></li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="bg-app"><span>{{ $page }}</span></li>
                    @else
                        <li><a href="{{ $url }}" class="w3-button ">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" class="w3-button">Next &raquo;</a></li>
        @else
            <li class="w3-disabled"><span>Next &raquo;</span></li>
        @endif
    </ul>
</nav>
@endif

