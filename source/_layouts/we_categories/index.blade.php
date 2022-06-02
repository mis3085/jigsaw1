<h1>{{ __($page->title, $page->language) }}</h1>

<hr class="border-b my-6">

<div class="flex flex-wrap">
  @foreach ($pagination->items as $post)
    <div class="w-full sm:w-1/2 md:w-1/3 p-3 mb-3">
      <a class="text-gray-900 font-extrabold block"
        href="{{ $post->getUrl() }}"
        title="{{ $post->title }}">
        <img class="w-full h-64 object-cover bg-white rounded-full p-3 mb-2"
          src="https://images.weserv.nl/?output=webp&h=300&url={{ $post->image }}" alt="{{ $post->title }}"
          @if ($loop->index > 6) loading="lazy" @endif />

        <h2 class="text-base text-center truncate">{{ $post->title }}</h2>
      </a>
    </div>
  @endforeach
</div>

<x-pagination :pagination="$pagination" />
