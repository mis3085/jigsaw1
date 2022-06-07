
<div {{ $attributes }} x-data="{
  openModal:false,
  open() {
    this.openModal = true;
    document.body.style.overflow='hidden';
  },
  close() {
    this.openModal = false;
    document.body.style.overflow='auto';
  }
}">
  <button x-on:click="open" class="border rounded-lg p-2 bg-white mx-auto w-48 flex justify-center items-center space-x-0.5 hover:invert">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path></svg>
    <span>{{ $trigger }}</span>
  </button>
  <div class="p-3 sm:p-0 fixed inset-0 w-full h-full bg-black/75 backdrop-blur-md flex items-center justify-center z-50" x-show="openModal" x-transition.opacity="" x-cloak>
    <div class="w-full h-5/6 sm:w-1/2 sm:h-3/4 bg-white border rounded-lg flex flex-col divide-y" x-on:click.away="close">
      <div class="p-3 flex justify-between">
        <div>{{ $header }}</div>
        <button x-on:click="close" class="flex items-center justify-center space-x-0.5">
          <div>{{ $close }}</div>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"></path></svg>
        </button>
      </div>
      <div class="p-3 grow overflow-y-auto">{{ $body }}</div>
      <div class="p-3">{{ $footer }}</div>
    </div>
  </div>
</div>
