@if ($paginator->hasPages())
<div class="row justify-content-between">
    {{-- Texto --}}
    <div class="d-md-flex justify-content-between align-items-center dt-layout-start col-md-auto mt-0">
        <span class="text-body-secondary mb-5">
            Exibindo de {{ $paginator->firstItem() }}
            até {{ $paginator->lastItem() }}
            de {{ $paginator->total() }}
        </span>
    </div>

    {{-- Paginação --}}
    <div class="d-md-flex justify-content-between align-items-center dt-layout-end col-md-auto mt-0">
        <nav aria-label="Page navigation">
            <ul class="pagination pagination-rounded">

                {{-- First --}}
                <li class="page-item first {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link waves-effect"
                       href="{{ $paginator->url(1) }}">
                        <i class="icon-base ti tabler-chevrons-left icon-sm"></i>
                    </a>
                </li>

                {{-- Prev --}}
                <li class="page-item prev {{ $paginator->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link waves-effect"
                       href="{{ $paginator->previousPageUrl() }}">
                        <i class="icon-base ti tabler-chevron-left icon-sm"></i>
                    </a>
                </li>

                {{-- Números --}}
                @foreach ($elements as $element)
                    {{-- "..." --}}
                    @if (is_string($element))
                        <li class="page-item disabled">
                            <span class="page-link">{{ $element }}</span>
                        </li>
                    @endif

                    {{-- Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            <li class="page-item {{ $page == $paginator->currentPage() ? 'active' : '' }}">
                                <a class="page-link waves-effect"
                                   href="{{ $url }}">
                                    {{ $page }}
                                </a>
                            </li>
                        @endforeach
                    @endif
                @endforeach

                {{-- Next --}}
                <li class="page-item next {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link waves-effect"
                       href="{{ $paginator->nextPageUrl() }}">
                        <i class="icon-base ti tabler-chevron-right icon-sm"></i>
                    </a>
                </li>

                {{-- Last --}}
                <li class="page-item last {{ $paginator->hasMorePages() ? '' : 'disabled' }}">
                    <a class="page-link waves-effect"
                       href="{{ $paginator->url($paginator->lastPage()) }}">
                        <i class="icon-base ti tabler-chevrons-right icon-sm"></i>
                    </a>
                </li>

            </ul>
        </nav>
    </div>
</div>
@endif
