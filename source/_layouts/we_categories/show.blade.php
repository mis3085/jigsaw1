@extends('_layouts.main')

@section('body')
  <div x-data="{}">
    <x-breadcrumb.index :page="$page">
      <x-breadcrumb.link  :link="'/' . $page->language . '/we_categories'" :title="__('We Categories', $page->language)"/>
    </x-breadcrumb.index>
  </div>

  <h1 class="text-2xl font-extrabold">{{ $page->title }}</h1>
  <p><img class="w-full h-64 sm:h-96 object-cover object-center" src="https://images.weserv.nl/?url={{ $page->feature_image }}&w=720"/></p>
  <hr>

  <div x-data="we_product_filters">
    <div class="grid grid-cols-12 gap-4">
      <div class="col-span-full sm:col-span-3 ">
        @php
          $collection = ${$page->product_collection}->where('category_id', $page->id);

          $filters = $collection->reduce(function ($filters, $item) {
            foreach ($item->features as $key => $value) {
              $filters[$key][$value] = 1;
            }
            return $filters;
          }, []);
        @endphp

        <div class="sticky top-4">
          @foreach ($filters as $key => $values)
            <x-button_groups.vertical.flex>
              <x-button_groups.vertical.item x-model="filters.{{ $key }}" x-on:click.prevent="filters.{{ $key }} = null;reset()" x-bind:class="{'bg-blue-400 text-white' : !filters.{{ $key }} }" classType="first">
                {{ \Illuminate\Support\Str::headline($key) }}: All
              </x-button_groups.vertical.item>

              @foreach ($values as $valueKey => $value)
                <x-button_groups.vertical.item x-model="filters.{{ $key }}" x-on:click.prevent="filters.{{ $key }} = '{{ $valueKey }}';reset()" x-bind:class="{'bg-blue-400 text-white' : filters.{{ $key }} == '{{ $valueKey }}' }" :classType="$loop->last ? 'last' : 'item'">
                  {{ $valueKey }}
                </x-button_groups.vertical.item>
              @endforeach
            </x-button_groups.vertical.flex>
          @endforeach

          <button x-on:click="resetFilters" class="w-full p-1 text-red-300 border border-red-300 rounded-lg text-sm hover:bg-red-400 hover:text-white">
            Reset
          </button>
        </div>
      </div>

      <div class="col-span-full sm:col-span-9">
        <div class="p-3">Total: <span x-text="queryFilter.length"></span> items</div>

          {{-- @php
            $children = !isset(${$page->product_collection}) ? collect() : ${$page->product_collection}->where('category_id', $page->id)->forPage(1, 12);
          @endphp
          @if ($children->isNotEmpty())
            <h2 class="text-xl font-extrabold">{{ __('Products', $page->language) }}</h2>
            <div class="flex flex-wrap">
              @foreach ($children as $product)
                <x-project.we_products.grid :item="$product"/>
              @endforeach
            </div>
          @endif --}}

        <div class="flex flex-wrap" id="grid-content">
          <template x-for="item in toPage">
            <div class="w-full sm:w-1/2 md:w-1/3 sm:p-3 mb-3">
              <a class="text-gray-900 font-extrabold w-full relative block"
                x-bind:href="item.link"
                x-bind:title="item.title"
                x-init="$watch('item', v => loaded = false)">

                <img class="w-full h-64 object-cover" loading="lazy"
                  x-bind:src="'https://images.weserv.nl/?h=300&url=' + item.image"
                  x-bind:alt="item.title" />
                <div class="text-lg mt-1 text-center truncate" x-text="item.title"></div>
              </a>

              {{-- <template x-for="fv in Object.entries(item.features)">
                <div>
                  <span x-text="fv[0].replace('_', ' ') + ':'"></span>
                  <span class="pl-2" x-text="fv[1]"></span>
                </div>
              </template> --}}

            </div>
          </template>

          <div class="fixed bottom-0 left-0 bg-white flex items-center justify-center w-full border-t-2 z-50" x-show="pagination.totalPages > 1">
            <div class="w-1/3 p-3 text-right">
                <a x-bind:href="'{{ $page->getUrl() }}?page=' + pagination.previous" class="w-full md:w-48 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" x-model="pagination.current" x-on:click.prevent="pagination.current--;resetScroll()" x-show="pagination.current > 1">Previous</a>
            </div>
            <div class="flex-grow p-3 text-center">
                page <span x-text="pagination.current"></span> of <span x-text="pagination.totalPages"></span>
            </div>
            <div class="w-1/3 p-3">
                <a x-bind:href="'{{ $page->getUrl() }}?page=' + pagination.next" class="w-full md:w-48 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" x-model="pagination.current" x-on:click.prevent="pagination.current++;resetScroll()" x-show="pagination.current < pagination.totalPages ">Next</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@push('scripts')
<script>
document.addEventListener('alpine:init', () => {
  Alpine.data('we_product_filters', () => ({
    init() {
      axios('/index_we_products.json').then(response => {
          this.items = response.data.filter(item => item.type == 'we_products');
      });
    },
    items: [],
    filters: {
        language: '{{ $page->language }}',
        category_id: '{{ $page->id }}',
        clinical_setting: null,
        function_type: null,
        device_type: null,
        mask_feature: null,
        mask_type: null
    },
    pagination: {
        perPage: 12,
        current: parseInt((new URLSearchParams(window.location.search)).get('page')) || 1,
        next: 1,
        previous: 1,
        totalPages: 0,
    },
    reset: function() {
        this.pagination.current = 1;
    },
    resetScroll: function() {
        document.getElementById('grid-content').scrollIntoView({behavior: 'smooth'});
    },
    resetFilters: function() {
      this.filters.clinical_setting = null;
      this.filters.function_type = null;
      this.filters.device_type = null;
      this.filters.mask_feature = null;
      this.filters.mask_type = null;
    },
    get queryFilter() {
        let results = this.items.filter(
            item => (item.language == this.filters.language)
                && (item.category_id == this.filters.category_id)
                && (this.filters.clinical_setting ? item.features.clinical_setting == this.filters.clinical_setting : true)
                && (this.filters.function_type ? item.features.function_type == this.filters.function_type : true)
                && (this.filters.device_type ? item.features.device_type == this.filters.device_type : true)
                && (this.filters.mask_feature ? item.features.mask_feature == this.filters.mask_feature : true)
                && (this.filters.mask_type ? item.features.mask_type == this.filters.mask_type : true)
        );
        this.pagination.totalPages = Math.ceil(results.length / this.pagination.perPage);
        return results;
    },
    get toPage() {
        let start = (this.pagination.current - 1) * this.pagination.perPage;
        let end = this.pagination.current * this.pagination.perPage;

        this.pagination.previous = this.pagination.current > 1 ? this.pagination.current - 1 : 1;
        this.pagination.next = this.pagination.current >= this.pagination.totalPages ? this.pagination.totalPages : this.pagination.current + 1;
        return this.queryFilter.slice(start, end);
    }
  }))
})
</script>
@endpush
@endsection
