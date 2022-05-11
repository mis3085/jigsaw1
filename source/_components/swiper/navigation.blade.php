{{-- Swiper: navigation,
  @requires alpine.js, iconify.js
--}}

<div class="absolute inset-y-0 left-0 z-10 flex items-center">
  <button x-on:click.stop="swiper.slidePrev()" class="mx-2 flex justify-center items-center w-16 h-full focus:outline-none ">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--akar-icons w-16 h-16 p-4 text-slate-600 hover:invert bg-white bg-opacity-30 rounded-full" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" data-icon="akar-icons:chevron-left"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m15 4l-8 8l8 8"></path></svg>
  </button>
</div>

<div class="absolute inset-y-0 right-0 z-10 flex items-center">
  <button x-on:click.stop="swiper.slideNext()" class="mx-2 flex justify-center items-center w-16 h-full focus:outline-none ">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--akar-icons w-16 h-16 p-4 text-slate-600 hover:invert bg-white bg-opacity-30 rounded-full" width="1em" height="1em" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24" data-icon="akar-icons:chevron-right"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m8 4l8 8l-8 8"></path></svg>
  </button>
</div>
