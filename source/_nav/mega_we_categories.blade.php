@php
  $megaColection = isset(${$locale . '_we_categories'}) ? ${$locale . '_we_categories'} : collect() ;
@endphp
@if(count($megaColection))
  <div x-data="{open: false}" x-on:click.away="open = false">
    <a title="Wexxxx" href="/{{ $locale }}/we_categories"
      class="ml-6  hover:text-blue-600 flex space-x-1 text-gray-700" x-on:click.prevent="open = ! open">
      Wexxxx <span x-text="open ? '-' : '+'" class="pl-2 text-gray-400 w-4">+</span>
    </a>

    <div class="absolute left-0 w-full bg-white mt-8 p-10 mx-auto shadow-xl border-t-2 border-gray-200" x-show="open" x-transition x-cloak>
      <div class="flex flex-wrap max-w-8xl mx-auto">
        @foreach ($zhtw_we_categories as $category)
          <div class="w-1/3 flex items-center p-2 space-x-2">
            <img src="https://images.weserv.nl/?output=webp&h=64&url={{ $category->image }}" class="rounded-lg w-16 h-16 object-cover"/>
            <div>
              <a href="{{ $category->getUrl() }}" class="block">
                <span class="text-gray-400 text-sm">{{ $category->sub_title }}</span><br/>
                <span>{{ $category->title }}</span>
              </a>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@else
  <a title="Wexxxx" href="/{{ $locale }}/we_categories"
    class="ml-6  hover:text-blue-600 flex space-x-1 {{ $page->isActive('/' . $locale . '/we_categories') ? 'active text-blue-600' : 'text-gray-700' }}" x-on:click.prevent="open = ! open">Wexxxx</a>
@endif
