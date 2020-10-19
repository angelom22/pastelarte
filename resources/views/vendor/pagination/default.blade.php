@if ($paginator->hasPages())
    <div class="mbp_pagination">
        <ul class="page_navigation">
            
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span aria-hidden="true">&lsaquo;</span>
                </li>
                
            @else
                <li class="page-item disabled">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" tabindex="-1" aria-label="@lang('pagination.previous')" aria-disabled="true"> <span class="flaticon-left-arrow"></span> Prev</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span>{{ $element }}</span></li>     
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <!-- <li class="page-item active" aria-current="page"><span>{{ $page }}</span></li> -->
                            <li class="page-item active" aria-current="page">
                                <span class="sr-only">{{ $element }}</span>
                            </li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}"><span class="sr-only">{{ $page }}</span></a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">Next <span  aria-hidden="true" class="flaticon-right-arrow-1"></span></a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span aria-hidden="true">&rsaquo;</span>
                </li>
                <!-- <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <a class="page-link" href="#">Next <span  aria-hidden="true" class="flaticon-right-arrow-1"></span></a>
                </li> -->
            @endif
        </ul>
    </div>

  
@endif
