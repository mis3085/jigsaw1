@extends('_layouts.main')

@section('body')
  <div x-data="{}">
    <x-breadcrumb.index :page="$page">
      <x-breadcrumb.link :item="${$page->category_collection}->firstWhere('id', $page->category_id)"/>
    </x-breadcrumb.index>
  </div>

  <h1 class="text-2xl font-extrabold">{{ $page->title }}</h1>

  @if (count($page->images))
    <x-swiper.index class="mb-10" x-cloak x-data="{swiper: null}"
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
        @foreach($page->images as $image)
          <x-swiper.slide class="">
            <div class="flex flex-col overflow-hidden">
              <div class="flex-shrink-0">
                <img class="h-64 sm:h-96 md:h-[32rem] w-full object-cover" src="https://images.weserv.nl/?url={{ $image }}&w=720" alt="{{ $page->title }}" @if (! $loop->first) loading="lazy" @endif>
              </div>
            </div>
          </x-swiper.slide>
        @endforeach
      </div>
    </x-swiper.index>
  @endif

  <div class="mb-10" x-data="{activeTab: 'overview'}">
    <div class="flex border-b-2 border-gray-400 mb-4">
      <button class="px-6 py-3 -mb-2 font-bold" x-on:click="activeTab = 'overview'" x-bind:class="{'border-b-8 border-green-500': activeTab == 'overview'}">Overview</button>
      <button class="ml-4 px-6 py-3 -mb-2 font-bold" x-on:click="activeTab = 'spec'" x-bind:class="{'border-b-8 border-green-500': activeTab == 'spec'}">Specification</button>
    </div>

    <div class="py-3" x-show="activeTab == 'overview'" x-transition>
      <p class="px-3">{!! nl2br($page->description) !!}</p>
      @if (count($page->overviews))
        <x-bricks.blog-1 :items="$page->overviews"/>
      @endif
    </div>

    <div class="py-3" x-show="activeTab == 'spec'" x-transition>
      @foreach (range(1, 3) as $fake)
        <table class="mb-4 w-full">
          <thead>
            <tr>
              <th colspan="3" class="bg-green-500 p-3 text-white">Standard {{ $loop->index * 100 + 100}}</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th class="text-right p-3" @class(['bg-green-50' => $loop->even])>Mattress Dimension</th>
              <td class="p-3">78.7 x 35.4 x 8 in</td>
              <td class="p-3">2000 x 900 x 200 mm</td>
            </tr>
            <tr>
              <th class="text-right p-3 bg-green-50">Mattress Weight</th>
              <td class="p-3 bg-green-50">30.8 lb</td>
              <td class="p-3 bg-green-50">14 kg</td>
            </tr>
            <tr>
              <th class="text-right p-3">Maximum Patient Weight</th>
              <td class="p-3">550 lb</td>
              <td class="p-3">250 kg</td>
            </tr>
          </tbody>
        </table>
      @endforeach
    </div>
  </div>

  @if (count($page->introductions))
    <div class="mb-10">
      <h2 class="text-center"><span class="inline-block border-t-4 border-green-500 pt-4">Introductions</span></h2>
      @foreach($page->introductions as $introduction)
        @if ($loop->odd)
          <x-bricks.hero-7 :contents="$introduction" class="mb-10 "/>
        @else
          <x-bricks.hero-8 :contents="$introduction" class="mb-10 "/>
        @endif
      @endforeach
    </div>
  @endif

  @if (count($page->faq))
    <div class="container bg-gray-200 py-20 px-4 sm:px-20 rounded-lg mb-10">
      <h2 class="text-center font-extrabold text-2xl"><span class="inline-block border-t-4 border-green-500 pt-4">FAQ</span></h2>
      @foreach($page->faq as $faq)
        <div class="border-2 rounded-md shadow-lg bg-white mb-6" x-data="{openAnswer: false}"
          x-bind:class="{'border-green-500': openAnswer}">
          <div class="flex py-4 px-4 justify-between " x-on:click="openAnswer = ! openAnswer"
            x-bind:class="{'bg-green-500 text-white': openAnswer}">
            <div>{{ $faq['question'] }}</div>
            <div><span x-text="openAnswer ? '-' : '+'"></span></div>
          </div>
          <div class="py-4 px-4 " x-show="openAnswer" x-transition>{{ $faq['answer'] }}</div>
        </div>
      @endforeach
    </div>
  @endif

  <div class="mb-10">
    <x-project.we_products.similar :collection="${$page->language . '_we_products'}" :categoryId="$page->category_id"/>
  </div>
@endsection
