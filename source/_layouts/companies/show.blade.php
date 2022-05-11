@extends('_layouts.main')

@section('body')

  <x-project.company-info :company="$page" />
  <p>{{ __('Telephone', $page->language) }}: {{ $page->tel }}</p>
  <p>{{ __('Fax', $page->language) }}: {{ $page->fax }}</p>
  <p>{{ __('Website', $page->language) }}: {{ $page->website }}</p>
  <p>{{ $page->brand_description }}</p>

  @php
    $children = !isset(${$page->award_collection}) ? collect() : ${$page->award_collection}->where('company_id', $page->id);
  @endphp
  @if ($children->isNotEmpty())
    <h2 class="text-xl  font-extrabold">{{ __('Awarded products', $page->language) }}</h2>
    <div class="flex flex-wrap">
      @foreach ($children as $award)
        <x-project.awards.grid :item="$award"/>
      @endforeach
    </div>
  @endif

@endsection
