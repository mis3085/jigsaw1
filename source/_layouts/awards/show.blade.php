@extends('_layouts.main')

@section('body')

  <div x-data="{}">
    <x-breadcrumb.index :page="$page">
      <template x-if="document.referrer.match(/categories/)">
        <x-breadcrumb.link :item="${$page->category_collection}->firstWhere('id', $page->category_id)"/>
      </template>
      <template x-if="document.referrer.match(/companies/)">
        @if (${$page->parent_collection}->firstWhere('id', $page->company_id))
        <x-breadcrumb.link :item="${$page->parent_collection}->firstWhere('id', $page->company_id)"/>
        @endif
      </template>
      <x-breadcrumb.link  x-show="!document.referrer.match(/categories|companies/)" link="javascript:history.back()" :title="__('Awards', $page->language)"/>
    </x-breadcrumb.index>
  </div>

  <div class="flex items-center mb-3">
      <img src="https://world.taiwanexcellence.org/assets0/images/{{ $page->language . '-' . $page->medal . '-' . $page->year }}.svg" class="w-1/4 mr-4"/>
      <h1 class="text-xl my-1">{{ $page->title }} {{ $page->model_number }}</h1>
  </div>

  @php
    $parent = !isset(${$page->parent_collection}) ? null : ${$page->parent_collection}->firstWhere('id', $page->company_id);
  @endphp
  @if ($parent)
    <x-project.company-info :company="$parent"/>
  @endif

  <p>{{ $page->description }}</p>

  @forelse($page->images as $image)
    <p><img src="https://images.weserv.nl/?output=webp&url=https://world.taiwanexcellence.org/uploads/{{ $image }}&w=720" class="w-full" alt="{{ $page->title }}"/></p>
  @empty
  @endforelse
@endsection
