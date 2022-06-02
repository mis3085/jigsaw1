@extends('_layouts.main')

@section('body')
  <div class="mb-6" x-data="{}">
    <x-breadcrumb.index :page="$page">
      <x-breadcrumb.link :item="${$page->category_collection}->firstWhere('id', $page->category_id)"/>
    </x-breadcrumb.index>
  </div>

  <h1 class="text-2xl font-extrabold mb-6">{{ $page->title }}</h1>

  @if (count($page->images))
    <x-swiper.index class="mb-10" x-data="{swiper: null}"
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
    <div  x-ref="anchor" class="h-px"></div>
    <div class="flex border-b-2 border-gray-400 mb-4 sticky top-0 bg-white">
      <button class="px-6 py-3 -mb-2 font-bold text-xs sm:text-sm" x-on:click="$refs.anchor.scrollIntoView({behavior: 'smooth'});activeTab = 'overview'; " x-bind:class="{'border-b-8 border-cyan-600': activeTab == 'overview'}">Overview</button>
      <button class="ml-4 px-6 py-3 -mb-2 font-bold text-xs sm:text-sm" x-on:click="$refs.anchor.scrollIntoView({behavior: 'smooth'});activeTab = 'spec'; " x-bind:class="{'border-b-8 border-cyan-600': activeTab == 'spec'}">Specification</button>
    </div>

    <div class="py-3" x-show="activeTab == 'overview'" x-transition>
      <div x-data="">
        <x-button_groups.responsive.inline>
          <x-button_groups.responsive.item classType='first'
            x-bind:class="{'sm:rounded-r-lg': !$store.inquiryCart.items.length}"
            x-on:click="
              $store.inquiryCart.add({
                id: '{{ $page->id }}',
                title: '{{ $page->title }}',
                url: '{{ $page->getUrl() }}',
                image: '{{$page->image}}'
              })
            ">
            <span x-text="$store.inquiryCart.items.find(v => v.id == '{{ $page->id }}') ? 'Added!' : 'Add to inquiry cart'"></span>
          </x-button_groups.responsive.item>

          <a href="/form" class="py-1 px-2 w-full sm:w-48 text-center text-white text-sm rounded-b-lg sm:rounded-l-none sm:rounded-r-lg bg-cyan-600 hover:bg-green-700 hover:text-white" x-show="$store.inquiryCart.items.length" x-transition>Inquire Now</a>
        </x-button_groups.responsive.inline>

        <table class="w-full sm:w-96">
          <template x-for="item in $store.inquiryCart.items">
            <tr x-transition>
              <td class="px-3">
                <a x-bind:href="item.url"><span x-text="item.title"></span></a>
              </td>
              <td class="px-3">
                <button class="px-4 py-1 rounded-lg text-red-400 hover:bg-red-100 " x-on:click="$store.inquiryCart.items = $store.inquiryCart.items.filter(v => v.id != item.id)">
                  <svg class="h-4 w-4 "  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="1"  stroke-linecap="round"  stroke-linejoin="round"><polyline points="3 6 5 6 21 6" /><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2" /><line x1="10" y1="11" x2="10" y2="17" />  <line x1="14" y1="11" x2="14" y2="17" /></svg>
                </button>
              </td>
            </tr>
          </template>
        </table>
      </div>
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
              <th colspan="3" class="bg-cyan-600 p-3 text-white">Standard {{ $loop->index * 100 + 100}}</th>
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
      <h2 class="text-center"><span class="inline-block border-t-4 border-cyan-600 pt-4">Introductions</span></h2>
      @foreach ($page->introductions as $introduction)
        @if ($loop->odd)
          <x-bricks.hero-10 :contents="$introduction"/>
        @else
          <x-bricks.hero-9 :contents="$introduction"/>
        @endif
      @endforeach
    </div>
  @endif

  @if (count($page->faq))
    <div class="bg-gray-200 py-20 px-4 sm:px-20 rounded-lg mb-10">
      <h2 class="text-center font-extrabold text-2xl"><span class="inline-block border-t-4 border-cyan-600 pt-4">FAQ</span></h2>
      @foreach($page->faq as $faq)
        <div class="border-2 rounded-md shadow-lg bg-white mb-6" x-data="{openAnswer: false}"
          x-bind:class="{'border-cyan-600': openAnswer}">
          <div class="flex py-4 px-4 justify-between " x-on:click="openAnswer = ! openAnswer"
            x-bind:class="{'bg-cyan-600 text-white': openAnswer}">
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


  @push('scripts')
    <script>
      document.addEventListener('alpine:initializing', () => {
          Alpine.store('inquiryCart', {
              items: Alpine.$persist([]).as('inquiryCartItems'),
              add(item) {
                this.items.find(v => v.id == item.id)
                  ? null
                  : this.items.push({
                    id: item.id,
                    title: item.title,
                    url: item.url,
                    image: item.image
                  });
              },
          })
      })
    </script>
  @endpush
@endsection
