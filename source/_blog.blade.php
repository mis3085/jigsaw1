---
title: Blog
description: The list of blog posts for the site
pagination:
    collection: posts
    perPage: 4
---
@extends('_layouts.main')

@section('body')
    <h1>Blog</h1>

    <hr class="border-b my-6">

    @foreach ($pagination->items as $post)
        @include('_components.post-preview-inline')

        @if ($post != $pagination->items->last())
            <hr class="border-b my-6">
        @endif
    @endforeach

    <x-pagination :pagination="$pagination"/>
@stop
