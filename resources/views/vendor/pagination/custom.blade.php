@if ($paginator->hasPages())
    <div class="biolife-panigations-block">
        <ul class="panigation-contain">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li><span class="current-page">1</span></li>
            @else
                <li><a href="{{ $paginator->previousPageUrl() }}" class="link-page"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li><span class="sep">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li><span class="current-page">{{ $page }}</span></li>
                        @else
                            <li><a href="{{ $url }}" class="link-page">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li><a href="{{ $paginator->nextPageUrl() }}" class="link-page next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
            @else
                <li><span class="current-page">{{ $paginator->lastPage() }}</span></li>
            @endif
        </ul>
    </div>
@endif
