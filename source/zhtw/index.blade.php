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

  <x-project.featured-products :collection="$zhtw_we_products" class="mb-10"/>

  @php
    $solutions = [
      ['title' => 'Wellell 健康的泉源', 'description' => '30年來，Apex致力於改善全球病患和護理人員的生活品質。未來，Wellell將持續幫助病患和家屬擁有健康自在的生活。Wellell 作為全球健康源泉- 品牌蛻變已經展開。', 'image' => 'https://tw.wellell.com/storage/media/tw/index/our%20brand.jpg'],
      ['title' => '讓人們擁有健康自在的生活。', 'description' => 'Wellell 成立於 1990 年，致力於成為醫療產業的全球領導品牌。持續與全球值得信賴的合作夥伴攜手，一起改善患者的醫療品質，點亮人們的數位健康未來。', 'image' => 'https://tw.wellell.com/storage/media/tw/index/our%20transformation.jpg'],
      ['title' => 'Optima Prone 協助急性呼吸治療。', 'description' => '俯臥位氣墊床可協助重症及和 COVID-19 患者 進行俯臥通氣治療及高流量氧氣治療，改善肺部分泌物引流，增加氧合效率。降低初期面部壓瘡風險，提高治療效果。', 'image' => 'https://tw.wellell.com/storage/media/tw/index/optima_prone6_6617.jpg']
    ];
  @endphp
  @foreach ($solutions as $solution)
    <x-bricks.preview>
      @if ($loop->odd)
        <x-bricks.hero-10 :contents="$solution"/>
      @else
        <x-bricks.hero-9 :contents="$solution"/>
      @endif
    </x-bricks.preview>
  @endforeach

  {{-- <x-bricks.hero-10/>

  <x-bricks.hero-9/> --}}

  <div class="mb-10 select-none	" x-data="{
    active: 'id1',
    prev:'id0',
    next:'id2',
    isActive(id) {
      return this.active == id;
    },
    isClosest(id) {
      return this.active !== id && [this.prev, this.next].indexOf(id) >= 0;
    },
    isSibling(id) {
      return this.active !== id && [this.prev, this.next].indexOf(id) == -1;
    },
  }">
    <div x-show="false" class="w-full h-64 bg-gray-300"><!--skeleton//--></div>
    <template x-if="true">
      <div class="flex flex-wrap space-y-2 sm:flex-nowrap sm:space-x-2 sm:space-y-0">
        @foreach(range(1,10) as $id)
          <div class="transform transition-all rounded-xl shadow-md "
            x-on:click="active = 'id{{ $id }}'; prev = 'id{{ $id - 1 }}'; next = 'id{{ $id + 1 }}';"
            x-bind:class="{
              'h-64 w-full sm:w-64 sm:flex-grow': isActive('id{{ $id }}'),
              'h-8 w-full sm:h-64 sm:w-8 sm:scale-75 hover:scale-125 cursor-pointer': isClosest('id{{ $id }}'),
              'h-8 w-full sm:h-64 sm:w-8 sm:scale-50 hover:scale-125 cursor-pointer': isSibling('id{{ $id }}'),
            }">
            <img class="pointer-events-none w-full h-full rounded-xl object-cover object-center" src="https://picsum.photos/id/{{ $id }}/640/640" />
          </div>
        @endforeach
      </div>
    </template>
  </div>

  <div>
    @foreach ($zhtw_ex_categories as $category)
      <div class="flex w-full h-48 sm:h-64 md:h-96 mb-6 relative items-center justify-center">
        @if ($category->background)
          <img src="https://images.weserv.nl/?output=webp&w=720&url=https://world.taiwanexcellence.org/uploads/{{ $category->background }}" alt="{{ $category->title }} cover image" class="absolute inset-0 w-full h-full object-cover object-center">
        @endif

        <a href="{{ $category->getUrl() }}" title="Read - {{ $category->title }}"
          class="text-3xl text-gray-600 z-10">{{ $category->title }}</a>
      </div>
      @if (! $loop->last)
        <hr class="border-b my-6">
      @endif
    @endforeach
  </div>

@stop
