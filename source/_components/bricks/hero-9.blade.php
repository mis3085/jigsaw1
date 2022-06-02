@props([
  'contents' => [],
  'items' => [],
])
<div class="flex flex-wrap relative mb-10">
  <img class="rounded-t-2xl w-full h-48 object-cover object-center sm:h-96 sm:w-5/6 sm:mt-16 sm:rounded-b-2xl" src="https://images.weserv.nl/?output=webp&w=720&url={{ $contents['image'] }}" alt="{{ $contents['title'] }}"/>
  <div class="px-10 py-10 bg-cyan-600 shadow-2xl w-full opacity-90 rounded-b-2xl sm:z-10 sm:w-2/5 sm:absolute sm:right-0 sm:top-0 sm:rounded-t-2xl">
    <h2 class="text-white text-2xl font-extrabold before:block before:mb-4 before:bg-white before:w-6 before:h-[3px]">{{ $contents['title'] }}</h2>
    <div class="text-white">{{ $contents['description'] }}</div>
  </div>
</div>
