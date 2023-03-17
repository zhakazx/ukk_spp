@if ($paginator->hasPages())
    @if ($paginator->onFirstPage())
        <button class="btn btn-sm btn-white d-sm-block d-none mb-0" 
                disabled
                aria-label="@lang('pagination.previous')"
        >Previous</button>       
    @else
        <a href="{{ $paginator->previousPageUrl() }}"
            rel="prev" 
            class="btn btn-sm btn-white d-sm-block d-none mb-0"
            aria-label="@lang('pagination.previous')"
        >Previous</a>
    @endif
    <nav aria-label="..." class="d-flex justify-content-center align-items-center">
        @foreach ($elements as $element)
            <ul class="pagination pagination-light mb-0">
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        {{-- Use three dots when current page is greater than 4. --}}
                        @if ($paginator->currentPage() > 4 && $page === 2)
                        <li class="page-item">
                            <a class="page-link border-0 font-weight-bold" href="javascript:void(0)">...</a>
                        </li>
                        @endif

                        {{-- Show active page else show the first and last two pages from current page. --}}
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page">
                                <span class="page-link font-weight-bold">{{ $page }}</span>
                            </li>
                        @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() + 2 || $page === $paginator->currentPage() - 1 || $page === $paginator->currentPage() - 2 || $page === $paginator->lastPage() || $page === 1)
                            <li class="page-item">
                                <a class="page-link border-0 font-weight-bold" href="{{ $url }}">{{ $page }}</a>
                            </li>
                        @endif

                        {{-- Use three dots when current page is away from end. --}}
                        @if ($paginator->currentPage() < $paginator->lastPage() - 3 && $page === $paginator->lastPage() - 1)
                        <li class="page-item">
                            <a class="page-link border-0 font-weight-bold" href="javascript:void(0)">...</a>
                        </li>
                        @endif
                    @endforeach
                @endif
            </ul>
        @endforeach
    </nav>
    @if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" 
        rel="next" 
        aria-label="@lang('pagination.next')" 
        class="btn btn-sm btn-white d-sm-block d-none mb-0"
    >Next</a>
    @else
    <button class="btn btn-sm btn-white d-sm-block d-none mb-0"
        disabled
        aria-label="@lang('pagination.next')"
    >Next</button>
    @endif
@endif