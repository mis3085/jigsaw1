@php
$locale = $page->language ?: 'zhtw';
@endphp
<nav class="hidden lg:flex items-center justify-end text-lg">

    <a title="Categories" href="/{{ $locale }}"
        class="ml-6  hover:text-blue-600 {{ $page->isActive('/' . $locale) ? 'active text-blue-600' : 'text-gray-700' }}">
        Categories
    </a>

    <a title="Awards" href="/{{ $locale }}/ex_awards"
        class="ml-6  hover:text-blue-600 {{ $page->isActive('/' . $locale . '/ex_awards') ? 'active text-blue-600' : 'text-gray-700' }}">
        Awards
    </a>

    <a title="Companies" href="/{{ $locale }}/ex_companies"
        class="ml-6  hover:text-blue-600 {{ $page->isActive('/' . $locale . '/ex_companies') ? 'active text-blue-600' : 'text-gray-700' }}">
        Companies
    </a>

    <a title="Brandings" href="/{{ $locale }}/brandings"
        class="ml-6  hover:text-blue-600 {{ $page->isActive('/' . $locale . '/brandings') ? 'active text-blue-600' : 'text-gray-700' }}">
        Brandings
    </a>

    @include('_nav.mega_we_categories')

    <div class="ml-6 w-48 relative" x-data="{open:false}" x-on:click.away="open = false">
      <button x-on:click.prevent="open = ! open">{{ __('Language', $page->language) }}</button>
      <div class="absolute left-0 z-10 w-fit flex flex-col bg-white -ml-3 sm:shadow-md" x-show="open" x-cloak>
        @foreach ($page->siteLanguages as $slug => $text)
          @if ($page->language == $slug)
            <span class="block w-full px-3 py-1 text-gray-400">{{ $text }} &hearts; </span>
          @else
            <a class="block w-full px-3 py-1 text-gray-700 hover:text-blue-600" href="{{ $page->getLocaleUrl($slug) }}">{{ $text }}</a>
          @endif
        @endforeach
      </div>
    </div>
</nav>
