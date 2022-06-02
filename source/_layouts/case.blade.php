@extends('_layouts.main')

@php
    $page->type = 'article';
@endphp

@section('body')
    @if ($page->cover_image)
        <img src="{{ $page->cover_image }}" alt="{{ $page->title }} cover image" class="mb-2">
    @endif

    <h1 class="leading-none mb-2">{{ $page->title }} ({{ $page->language }})</h1>

    @if ($page->categories)
        @foreach ($page->categories as $i => $category)
            <a
                href="{{ '/blog/categories/' . $category }}"
                title="View posts in {{ $category }}"
                class="inline-block bg-gray-300 hover:bg-blue-200 leading-loose tracking-wide text-gray-800 uppercase text-xs font-semibold rounded mr-4 px-3 pt-px"
            >{{ $category }}</a>
        @endforeach
    @endif

    <div class="border-b border-blue-200 mb-10 pb-4" v-pre>
        @yield('content')

        @if ($page->content_images)
            {{-- @foreach($page->content_images as $image)
                <img class="mb-6 w-full h-96" src="https://images.weserv.nl/?output=webp&?w=720&url={{ $image }}"
                    alt="{{ $page->title }}" loading="lazy" onload="this.style.height='auto'"/>
            @endforeach --}}

            <x-swiper.index x-data="{swiper: null}"
            x-init="$nextTick(() => {
              swiper = new Swiper($refs.container, {
                loop: true,
                pagination:{
                  el: '.swiper-pagination',
                },
                slidesPerView: 1,
                spaceBetween: 0,
              });
            })">
              <div class="swiper-wrapper">
                @foreach($page->content_images as $image)
                  <x-swiper.slide class="">
                    <div class="flex flex-col overflow-hidden">
                      <div class="flex-shrink-0">
                        {{-- change h-* to adjust height, ex: h-96 or h-[30rem] --}}
                        <img class="h-64 sm:h-96 md:h-[32rem] w-full object-cover" src="https://images.weserv.nl/?output=webp&?w=720&url={{ $image }}" alt="{{ $page->title }}" loading="lazy">
                      </div>
                    </div>
                  </x-swiper.slide>
                @endforeach
              </div>
            </x-swiper.index>
        @endif
    </div>

    <nav class="flex justify-between text-sm md:text-base">
        <div>
            @if ($previous = $page->getPrevious())
                <a href="{{ $previous->getUrl() }}" title="Newer Post: {{ $previous->title }}">
                    &LeftArrow; {{ $previous->title }}
                </a>
            @endif
        </div>

        <div>
            @if ($next = $page->getNext())
                <a href="{{ $next->getUrl() }}" title="Older Post: {{ $next->title }}">
                    {{ $next->title }} &RightArrow;
                </a>
            @endif
        </div>
    </nav>
@endsection
