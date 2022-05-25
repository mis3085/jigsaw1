@props([
  'title' => null, //string
  'link' => null, //string
  'item' => null, //object
])
<li {{ $attributes->merge(['class' => 'flex items-center']) }}>
  <svg class="sm:hidden h-4 w-4 text-gray-500"  width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">  <path stroke="none" d="M0 0h24v24H0z"/>  <polyline points="15 6 9 12 15 18" /></svg>
  <a href="{{ $link ?: $item->getUrl() }}" class="inline-block text-xs font-medium truncate text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">{{ $title ?: $item->title }}</a>
  <svg class="h-4 w-4 text-gray-500"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round">  <polyline points="9 18 15 12 9 6" /></svg>
</li>
