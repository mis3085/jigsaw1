{{-- init Swiper via Alpine--}}
@props([
  'navigation' => true,
])
<div {{ $attributes }}>
  <div x-show="false" class="w-full h-64 bg-gray-300"><!--skeleton//--></div>
  <div class="swiper-container relative overflow-hidden" x-ref="container" x-cloak>
    {{ $slot }}

    <div class="swiper-pagination mb-2"></div>
    @if ($navigation)
      <x-swiper.navigation/>
    @endif
  </div>
</div>

<x-swiper.assets/>
