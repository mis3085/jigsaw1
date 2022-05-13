@props([
  'classType' => null,
  'shared' => 'w-full truncate py-1 px-2 text-sm font-medium text-gray-900 bg-white border-gray-200 hover:text-blue-700 focus:z-10 focus:ring-0 focus:text-blue-700',

  'first' =>  'rounded-t-lg border',
  'item' => 'border-r border-l border-b ',
  'last' => 'rounded-b-lg border border-t-0 ',
])
<button {{ $attributes->merge(['type' => 'button', 'class' => $shared . ' ' . ${$classType}]) }}>
  {{ $slot }}
</button>
