---
title: Home
description: The list of awards
language: zhtw
---
@extends('_layouts.main')

@section('body')
  @php
    $story = [
      'title' => "Changing and saving lives with digital well-being.",
      'description' => "70 countries, over 100 million lives impacted \n— We are still growing.",
      'image' => 'https://www.wellell.com/storage/media/global/banner/index-banner.jpg',
    ];
  @endphp
  <x-bricks.hero-7 :contents="$story" class="mb-10"/>

  <x-project.featured-products :collection="$zhtw_we_products"/>

  <div>
    @foreach ($zhtw_ex_categories as $category)
      <div class="flex w-full h-48 sm:h-64 md:h-96 mb-6 relative items-center justify-center">

              @if ($category->background)
                  <img src="https://images.weserv.nl/?w=720&url=https://world.taiwanexcellence.org/uploads/{{ $category->background }}" alt="{{ $category->title }} cover image" class="absolute inset-0 w-full h-full object-cover object-center">
              @endif

              <a href="{{ $category->getUrl() }}" title="Read - {{ $category->title }}"
                  class="text-3xl text-gray-600 z-10"
                  >
                  {{ $category->title }}
              </a>
      </div>
      @if (! $loop->last)
        <hr class="border-b my-6">
      @endif
    @endforeach
  </div>

@stop
