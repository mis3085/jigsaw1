@props([
  'contents' => [],
  'items' => [],
])
<section {{ $attributes }}>
  <div class="flex md:flex-row flex-col items-center">
    <div class="flex flex-wrap w-full bg-gray-100 py-32 px-10 relative">
      <img class="w-full h-full object-cover object-center block absolute inset-0 opacity-25" src="https://images.weserv.nl/?w=720&url={{ $contents['image'] }}" alt="{{ $contents['title'] }}"/>
      <div class="lg:flex-grow md:flex-grow lg:pr-96 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center relative z-10">
        <h2 class="title-font sm:text-4xl text-3xl mb-4 font-medium text-gray-900">{{ $contents['title'] }}</h2>
        <p class="mb-8 leading-relaxed">{!! nl2br($contents['description']) !!}</p>
      </div>
    </div>
  </div>
</section>
