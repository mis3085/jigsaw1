{{-- assets of Swiper, load this component when u need swiper --}}
@once
  @push('scripts')
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" media="print" onload="this.media='all'"/>
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
  @endpush
@endonce
