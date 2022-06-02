<h1>{{ __($page->title, $page->language) }}</h1>

<div x-data="{
        awards: [],
        filters: {
            language: '{{ $page->language }}',
            type: 'awards',
            medal: null,
            year: null,
        },
        pagination: {
            perPage: 12,
            current: 1,
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
        get queryFilter() {
            let results = this.awards.filter(
                item => (item.language == this.filters.language)
                    && (item.type == this.filters.type)
                    && (this.filters.medal ? item.medal == this.filters.medal : true)
                    && (this.filters.year ? item.year == this.filters.year : true)
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
    }"
    x-init="
        axios('/index.json').then(response => {
            awards = response.data.filter(item => item.type == 'awards');
        });
    ">
    <div class="inline-flex rounded-md shadow-sm mb-1" role="group">
        <button type="button" class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white" x-model="filters.medal" x-on:click.prevent="filters.medal = null;reset()" x-bind:class="{'text-blue-400' : !filters.medal }">
          {{ __('All medals', $page->language) }}
        </button>

        @foreach (['ex', 'gold', 'silver'] as $medal)
            <button type="button" class="py-2 px-4 text-sm font-medium text-gray-900 bg-white {{ $loop->last ? 'rounded-r-md' : '' }} border-t border-b border-r  border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white"  x-model="filters.medal" x-on:click.prevent="filters.medal = '{{ $medal }}';reset()" x-bind:class="{'text-blue-400' : filters.medal == '{{ $medal }}' }">
              {{ __('medals.' . $medal, $page->language) }}
            </button>
        @endforeach
    </div>
    <div class="inline-flex rounded-md shadow-sm" role="group">
        <button type="button" class="py-2 px-4 text-sm font-medium text-gray-900 bg-white rounded-l-lg border-t border-b border-r border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white"  x-model="filters.year" x-on:click.prevent="filters.year = null;reset()" x-bind:class="{'text-blue-400' : !filters.year }">
          {{ __('All years', $page->language) }}
        </button>
        @foreach (range(2021, date('Y')) as $year)
            <button type="button" class="py-2 px-4 text-sm font-medium text-gray-900 bg-white {{ $loop->last ? 'rounded-r-md' : '' }} border-t border-b border-r  border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white"  x-model="filters.year" x-on:click.prevent="filters.year = '{{ $year }}';reset()" x-bind:class="{'text-blue-400' : filters.year == '{{ $year }}' }">
            {{ $year }}
            </button>
        @endforeach
    </div>

    <div class="p-3">Total: <span x-text="queryFilter.length"></span> items</div>

    <div x-show="! queryFilter.length">
      <div class="flex flex-wrap">
          @foreach ($pagination->items as $item)
              <x-project.awards.grid :item="$item"/>
          @endforeach
      </div>
      <x-pagination :pagination="$pagination"/>
    </div>

    <div class="flex flex-wrap" id="grid-content">
        <template x-for="award in toPage">
            <div class="w-full sm:w-1/2 md:w-1/3 sm:p-3 mb-3">
                <a class="text-gray-900 font-extrabold w-full relative block"
                    x-bind:href="award.link"
                    x-bind:title="award.title"
                    x-data="{loaded: false}"
                    x-init="$watch('award', v => loaded = false)"
                    >
                        <img class="w-full h-64 object-cover" x-on:load="loaded = true" loading="lazy"
                            x-bind:src="'https://images.weserv.nl/?output=webp&h=300&url=https://world.taiwanexcellence.org/uploads/' + award.image"
                            x-bind:alt="award.title" />

                        <svg class="w-full h-full p-24 bg-white absolute inset-0 z-10" x-show="! loaded" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" vesion="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 232.322 232.322" style="enable-background:new 0 0 232.322 232.322;" xml:space="preserve">
                        <path d="M224.822,23.935H7.5c-4.142,0-7.5,3.357-7.5,7.5v169.451c0,4.143,3.358,7.5,7.5,7.5h217.322c4.142,0,7.5-3.357,7.5-7.5   V31.435C232.322,27.293,228.964,23.935,224.822,23.935z M217.322,38.936v143.091l-59.995-63.799   c-1.417-1.507-3.394-2.362-5.462-2.362c-0.001,0-0.001,0-0.001,0c-2.068,0-4.044,0.855-5.462,2.36l-25.62,27.227l-34.349-45.291   c-1.418-1.87-3.629-2.968-5.976-2.968c-0.002,0-0.004,0-0.006,0c-2.349,0.002-4.561,1.104-5.977,2.978L15,178.861V38.936H217.322z    M207.415,193.387H22.824l57.643-76.269l33.722,44.465c1.334,1.759,3.374,2.84,5.578,2.957c2.201,0.11,4.348-0.742,5.86-2.35   l26.234-27.879L207.415,193.387z"/><path d="M155.237,101.682c13.597,0,24.658-11.061,24.658-24.656c0-13.597-11.061-24.658-24.658-24.658   c-13.596,0-24.656,11.062-24.656,24.658C130.581,90.621,141.642,101.682,155.237,101.682z M155.237,67.367   c5.326,0,9.658,4.333,9.658,9.658c0,5.324-4.332,9.656-9.658,9.656c-5.325,0-9.656-4.332-9.656-9.656   C145.581,71.7,149.913,67.367,155.237,67.367z"/></svg>

                    <div class="text-lg mt-1 text-center truncate" x-text="award.title"></div>
                </a>
                <div class="flex items-center justify-center">
                    <span x-text="award.year"></span>
                    <span x-text="award.medal"></span>
                </div>
            </div>
        </template>

        <div class="fixed bottom-0 left-0 bg-white flex items-center justify-center w-full border-t-2 z-50" x-show="pagination.totalPages > 1">
            <div class="w-1/3 p-3 text-right">
                <a x-bind:href="'/{{ $page->language }}/ex_awards/' + pagination.previous" class="w-full md:w-48 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" x-model="pagination.current" x-on:click.prevent="pagination.current--;resetScroll()" x-show="pagination.current > 1">Previous</a>
            </div>
            <div class="flex-grow p-3 text-center">
                page <span x-text="pagination.current"></span> of <span x-text="pagination.totalPages"></span>
            </div>
            <div class="w-1/3 p-3">
                <a x-bind:href="'/{{ $page->language }}/ex_awards/' + pagination.next" class="w-full md:w-48 text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700" x-model="pagination.current" x-on:click.prevent="pagination.current++;resetScroll()" x-show="pagination.current < pagination.totalPages ">Next</a>
            </div>
        </div>
    </div>
</div>

<hr class="border-b my-6"/>

