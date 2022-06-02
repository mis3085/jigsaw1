@props([
  'page' => null,
  'parents' => []
])
<nav aria-label="Breadcrumb">
  <ol class="flex items-center list-none">
    {{-- <li class="hidden sm:flex items-center">
      <a href="/{{ $page->language }}" class="flex items-center text-xs font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
        <svg class="mr-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>
        <span class="inline-block">{{ __('Home', $page->language) }}</span>
      </a>
      <svg class="h-4 w-4 text-gray-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polyline points="9 18 15 12 9 6" /></svg>
    </li> --}}

    {{ $slot }}
    <x-breadcrumb.current>{{ $page->title }}</x-breadcrumb.current>
  </ol>
</nav>
