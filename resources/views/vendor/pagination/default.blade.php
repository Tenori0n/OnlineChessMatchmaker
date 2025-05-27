@if ($paginator->hasPages())
    <nav>
        <ul class="pagination pagination-sm">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled " aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="bg-dark text-light page-link border-dark" aria-hidden="true">&lsaquo;</span>
                </li>
            @else
                <li class="page-item">
                    <a class="bg-dark text-light page-link border-dark" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-link disabled" aria-disabled="true"><span class="page-link bg-dark text-light border-dark">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><span class="page-link bg-dark text-light border-warning">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link bg-dark text-light border-dark" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link bg-dark text-light border-dark" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">&rsaquo;</a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link bg-dark text-light border-dark" aria-hidden="true">&rsaquo;</span>
                </li>
            @endif
        </ul>
    </nav>

@endif
<form class="d-flex flex-row justify-content-center align-items-center" method="get" action="{{$paginator->previousPageUrl()}}">
    <label class="mx-2">Элементов на странице:</label>
    <select class="mx-2 bg-transparent text-light" name="perpage">
        <option class="dropdown-item bg-transparent" value="5" @if($paginator->perPage() == 5) selected @endif>5</option>
        <option class="dropdown-item bg-transparent" value="10" @if($paginator->perPage() == 10) selected @endif>10</option>
        <option class="dropdown-item bg-transparent" value="15" @if($paginator->perPage() == 15) selected @endif>15</option>
    </select>
    <input class="btn btn-outline-warning py-0 mx-2" type="submit" value="Изменить">
</form>
