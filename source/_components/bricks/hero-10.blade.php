@props([
  'contents' => [],
  'items' => [],
])
<div class="flex flex-wrap sm:flex-row-reverse relative mb-10" >
  <img class="rounded-t-2xl w-full h-48 object-cover object-center sm:h-96 sm:w-5/6 sm:mt-16 sm:rounded-b-2xl" src="https://images.weserv.nl/?w=720&url={{ $contents['image'] }}" alt="{{ $contents['title'] }}"/>
  <div class="px-10 py-10 bg-green-500 shadow-2xl w-full opacity-90 rounded-b-2xl sm:z-10 sm:w-2/5 sm:absolute sm:top-0 sm:left-0 sm:rounded-t-2xl">
    <h1 class="text-white text-2xl font-extrabold">{{ $contents['title'] }}</h1>
    <div class="text-white">{{ $contents['description'] }}</div>
  </div>
</div>
