@props([
  'collection'
])

{{-- <div>{{ count($collection) }}</div>
@forelse($collection->where('featured', true)->take(4) as $product)
  <p>{{$product->title}}</p>
@empty
@endforelse --}}

<section class="mb-10">
  <h2 class="text-center"><span class="inline-block border-t-4 border-cyan-600 pt-4">Featured Products</span></h2>
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
      @foreach($collection->where('featured', true)->take(4) as $product)
        <x-swiper.slide class="">
          <div class="flex flex-wrap w-full bg-gray-100 relative h-64">
              <img class="h-full w-full object-cover object-center block opacity-25 absolute inset-0" src="https://images.weserv.nl/?w=480&url={{ $product->image }}" alt="{{ $product->title }}"/>
              <div class="text-left z-10 px-12 py-6 w-full">
                <h2 class="title-font text-2xl mb-4 font-medium text-gray-900 truncate">
                  <a href="{{ $product->getUrl() }}">{{ $product->title }}</a>
                </h2>
                <p class="mb-4 leading-relaxed line-clamp-4">{{ \Illuminate\Support\Str::limit($product->description, 100) }}</p>
              </div>
            </div>
        </x-swiper.slide>
      @endforeach
    </div>
  </x-swiper.index>
</section>
