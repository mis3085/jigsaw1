@props([
  'classType' => null,
  'shared' => 'w-full sm:w-48 truncate py-1 px-2 text-sm font-medium text-gray-900 bg-white border-gray-200 hover:text-blue-700 focus:z-10 focus:ring-0 focus:text-blue-700',

  'first' =>  'rounded-t-lg border sm:rounded-l-lg sm:rounded-r-none',
  'item' => 'border-r border-l border-b sm:border-l-0 sm:border-t sm:border-b',
  'last' => 'rounded-b-lg border border-t-0 sm:border-r sm:border-t sm:border-l-0 sm:rounded-r-lg sm:rounded-l-none ',
])
<button {{ $attributes->merge(['type' => 'button', 'class' => $shared . ' ' . ${$classType}]) }}>
  {{ $slot }}
</button>
