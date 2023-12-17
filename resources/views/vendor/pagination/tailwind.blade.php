@if ($paginator->hasPages())
    <div class ="paginationContainer "role="navigation" aria-label="{{ __('Pagination Navigation') }}">

        <div>
            <div class="pageInfo">
                <p>
                    {!! __('Showing') !!}
                    @if ($paginator->firstItem())
                        <span>{{ $paginator->firstItem() }}</span>
                        {!! __('to') !!}
                        <span>{{ $paginator->lastItem() }}</span>
                    @else
                        {{ $paginator->count() }}
                    @endif
                    {!! __('|') !!}
                    <span>{{ $paginator->total() }}</span>
                    {!! __('results') !!}
                </p>
            </div>

            <div class="previousNext">
                @if ($paginator->onFirstPage())
                <span class="previous">
                    {!! __('pagination.previous') !!}
                </span>
                @else
                <a class="prevNumLink" href="{{ $paginator->previousPageUrl() }}">
                    {!! __('pagination.previous') !!}
                </a>
                @endif

                @if ($paginator->hasMorePages())
                <a class="nextNumLink" href="{{ $paginator->nextPageUrl() }}">
                    {!! __('pagination.next') !!}
                </a>
                @else
                <span>
                    {!! __('pagination.next') !!}
                </span>
                @endif
            </div>

            <div class="three">

                    {{-- Pagination Elements --}}
                    @foreach ($elements as $element)
                        {{-- "Three Dots" Separator --}}
                        @if (is_string($element))
                            <span aria-disabled="true">
                                <span>{{ $element }}</span>
                            </span>
                        @endif

                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <span class="pageNum" aria-current="page">
                                        <span>{{ $page }}</span>
                                    </span>
                                @else
                                    <a class="pageNumLink" href="{{ $url }}" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
            </div>
        </div>
    </div>
@endif
