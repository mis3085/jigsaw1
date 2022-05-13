@props([
  'contents' => [],
  'items' => [],
])
<section {{ $attributes }}>
  <div class="flex flex-wrap">
    @forelse($items as $item)
      <div class="p-4 md:w-1/2">
        <div class="h-full border-2 border-gray-200 border-opacity-60 rounded-lg overflow-hidden">
          <img class="lg:h-48 h-36 w-full object-cover object-center" src="https://images.weserv.nl/?w=480&url={{ $item['image'] }}" alt="{{ $item['title'] }}">
          <div class="p-6">
            <h3 class="title-font text-lg font-bold text-gray-900 mb-3">{{ $item['title'] }}</h3>
            <p class="leading-relaxed mb-3">{{ $item['description'] }}</p>
          </div>
        </div>
      </div>
    @empty
    @endforelse
  </div>
</section>
