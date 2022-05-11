@extends('_layouts.main')

@section('body')
    <h1 class="text-2xl font-extrabold">{{ $page->title }}</h1>
    <p><img class="w-full" src="https://images.weserv.nl/?url=https://world.taiwanexcellence.org/uploads/{{ $page->background }}&w=720"/></p>
    <hr>

    @php
      $children = !isset(${$page->award_collection}) ? collect() : ${$page->award_collection}->where('category_id', $page->id)->forPage(1, 12);
    @endphp
    @if ($children->isNotEmpty())
      <h2 class="text-xl font-extrabold">{{ __('Awarded products', $page->language) }}</h2>
      <div class="flex flex-wrap">
        @foreach ($children as $award)
          <x-project.awards.grid :item="$award"/>
        @endforeach
      </div>
    @endif
@endsection
