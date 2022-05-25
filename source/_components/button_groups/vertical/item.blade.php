@props([
  'classType' => null,
  'shared' => 'w-full truncate py-1 px-2 text-sm font-medium bg-white border-gray-200 hover:bg-blue-500 hover:text-white focus:ring-0',

  'first' =>  'rounded-t-lg border',
  'item' => 'border-r border-l border-b ',
  'last' => 'rounded-b-lg border border-t-0 ',
])
<button {{ $attributes->merge(['type' => 'button', 'class' => $shared . ' ' . ${$classType}]) }}>
  {{ $slot }}
</button>
