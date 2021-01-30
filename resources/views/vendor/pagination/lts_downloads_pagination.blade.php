@if ($paginator->hasPages())
<div class="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
        <a href="#" class="prev"><i class="fa fa-angle-left"></i></a>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="prev"><i class="fa fa-angle-left"></i></a>
    @endif
    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <a href="#">{{ $element }}</a>
        @endif
        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <a href="javascript:0;" class="active">{{ $page }}</a>
                @else
                    <a href="{{ $url }}">{{ $page }}</a>
                @endif
            @endforeach
        @endif
    @endforeach
    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="next"><i class="fa fa-angle-right"></i></a>
    @else
        <a href="#" class="next"><i class="fa fa-angle-right"></i></a>
    @endif
</div>
@endif                       