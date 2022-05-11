@props([
    'pagination'
])
@php
    $side = 3;
    $min = ($pagination->currentPage - $side) > 1 ? ($pagination->currentPage - $side) : 1;
    $max = ($min + $side * 2) < $pagination->totalPages ? ($min + $side * 2) : $pagination->totalPages;
    $leftSkip = $min > 1 ? true : false;
    $rightSkip = $max < $pagination->totalPages ? true : false;
@endphp
@if ($pagination->pages->count() > 1)
    <nav class="flex text-base my-8">
        @if ($previous = $pagination->previous)
            <a
                href="{{ $previous }}"
                title="Previous Page"
                class="bg-gray-200 hover:bg-gray-400 rounded mr-3 px-5 py-3"
            >&LeftArrow;</a>
        @endif

        @if ($leftSkip)
            <span class="rounded mr-3 px-5 py-3 text-blue-700 bg-gray-200">...</span>
        @endif

        @foreach ($pagination->pages as $pageNumber => $path)
            @if ($pageNumber < $min || $pageNumber > $max)
                @continue
            @else
                <a
                    href="{{ $path }}"
                    title="Go to Page {{ $pageNumber }}"
                    class=" hover:bg-gray-400 rounded mr-3 px-5 py-3 text-blue-700 {{ $pagination->currentPage == $pageNumber ? 'bg-gray-400' : 'bg-gray-200' }}"
                >{{ $pageNumber }}</a>
            @endif
        @endforeach

        @if ($rightSkip)
            <span class="rounded mr-3 px-5 py-3 text-blue-700 bg-gray-200">...</span>
        @endif

        @if ($next = $pagination->next)
            <a
                href="{{ $next }}"
                title="Next Page"
                class="bg-gray-200 hover:bg-gray-400 rounded mr-3 px-5 py-3"
            >&RightArrow;</a>
        @endif
    </nav>
@endif