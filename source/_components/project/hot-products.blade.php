@props([
  'collection'
])

<x-swiper.index class="mb-10" x-data="{swiper: null}"
  x-init="$nextTick(() => {
    swiper = new Swiper($refs.container, {
      loop: true,
      pagination:{
        el: '.swiper-pagination',
      },
      breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 0,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 10,
        }
      },
    });
  })">
  <div class="swiper-wrapper">
    @foreach($collection->where('hot', true)->take(4) as $product)
      <x-swiper.slide>
        <div class="w-full bg-white h-96 py-2">
            <div class="h-44 text-left z-10 px-12 py-6 w-full">
              <h2 class="title-font text-2xl mb-4 font-medium text-gray-900 truncate">
                <a href="{{ $product->getUrl() }}">{{ $product->title }}</a>
              </h2>
              <p class="mb-4 leading-relaxed line-clamp-4">{{ \Illuminate\Support\Str::limit($product->description, 100) }}</p>
            </div>
            <img class="h-48 w-full object-scale-down object-center" src="https://images.weserv.nl/?w=480&url={{ $product->image }}" alt="{{ $product->title }}"/>
          </div>
      </x-swiper.slide>
    @endforeach
  </div>
</x-swiper.index>
