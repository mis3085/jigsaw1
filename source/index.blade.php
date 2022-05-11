@extends('_layouts.main')

@section('body')
  {{-- Warning! Different sites, different rules. --}}
  <script>
    location.href = window.navigator.language.match(/^zh/) ? '/zhtw' : '/en';
  </script>
  <noscript>
    <div style="text-align:center;">
        <p>Please select the preferred language</p>

        @foreach ($page->siteLanguages as $slug => $text)
            <p><a href="/{{ $slug }}">{{ $text }}</a></p>
        @endforeach
    </div>
  </noscript>
@endsection
