---
title: Brandings
description: The list of api posts for the site
language: zhtw
pagination:
  collection: zhtw_brandings
  perPage: 12
---
@extends('_layouts.main')

@section('body')
  <h1>{{ __($page->title, $page->language) }}</h1>

  <hr class="border-b my-6">

  <div class="flex flex-wrap">
    @foreach ($pagination->items as $post)
      @include('_components.case-grid')
    @endforeach
  </div>

  <x-pagination :pagination="$pagination" />
@stop
