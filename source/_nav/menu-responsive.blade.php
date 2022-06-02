@php
$locale = isset($page->language) ? $page->language : 'zhtw';
@endphp
<nav id="js-nav-menu" class="w-auto px-2 pt-6 pb-2 bg-gray-200 shadow hidden lg:hidden">
  <ul class="my-0">
    <li class="pl-4"><a title="Categories" href="/{{ $locale }}"
      class="block mt-0 mb-4 text-sm no-underline {{ $page->isActive('/' . $locale) ? 'active text-blue-600' : 'text-gray-700' }}">
      Categories
    </a></li>

    <li class="pl-4"><a title="Awards" href="/{{ $locale }}/ex_awards"
        class="block mt-0 mb-4 text-sm no-underline {{ $page->isActive('/' . $locale . '/ex_awards') ? 'active text-blue-600' : 'text-gray-700' }}">
        Awards
      </a></li>

    <li class="pl-4"><a title="Companies" href="/{{ $locale }}/ex_companies"
        class="block mt-0 mb-4 text-sm no-underline {{ $page->isActive('/' . $locale . '/ex_companies') ? 'active text-blue-600' : 'text-gray-700' }}">
        Companies
      </a></li>

    <li class="pl-4"><a title="Brandings" href="/{{ $locale }}/brandings"
        class="block mt-0 mb-4 text-sm no-underline {{ $page->isActive('/' . $locale . '/brandings') ? 'active text-blue-600' : 'text-gray-700' }}">
        Brandings
      </a></li>

    <li class="pl-4"><a title="Wexxxx" href="/{{ $locale }}/we_categories"
        class="block mt-0 mb-4 text-sm no-underline {{ $page->isActive('/' . $locale . '/we_categories') ? 'active text-blue-600' : 'text-gray-700' }}">
        Wexxxx
      </a></li>

    <li class="pl-4">
      <div class="mb-2 text-sm">{{ __('Language', $locale) }}</div>
      @foreach ($page->siteLanguages as $slug => $text)
        @if ($page->language == $slug)
          <span class="mb-2 block w-full px-3 py-1 text-sm text-gray-400">{{ $text }} &hearts; </span>
        @else
          <div class="mb-2"><a class="block w-full px-3 py-1 text-sm text-gray-700 hover:text-blue-600" href="{{ $page->getLocaleUrl($slug) }}">{{ $text }}</a></div>
        @endif
      @endforeach
    </li>

  </ul>
</nav>
