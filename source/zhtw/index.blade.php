---
title: Home
description: The list of awards
language: zhtw
---
@extends('_layouts.main')

@section('body')
    {{-- <h1><x-trans :locale="$page->language" :key="$page->title"/></h1> --}}

    {{-- <hr class="border-b my-6"> --}}

    @foreach ($zhtw_ex_categories as $category)
        <div class="flex w-full h-96 mb-6 relative items-center justify-center">

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
@stop