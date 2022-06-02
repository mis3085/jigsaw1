@extends('_layouts.main')

@section('body')

  <x-bricks.preview>
    <div class="mx-auto bg-[url(/assets/img/grid.svg)] p-3">
      <div class="grid grid-cols-1 space-y-3 sm:space-y-0 sm:grid-cols-2 sm:space-x-3">
        <div class="relative h-[448px]">
          <div class="absolute inset-0 flex h-full w-full flex-col items-center bg-gray-100 px-6 py-12">
            <div class="h-2/5"><!--fake placeholder//--></div>
            <img class="h-3/5 w-full object-cover" src="https://picsum.photos/id/321/480/480" alt="image" />
          </div>
          <div class="relative flex flex-col items-center py-8">
            <div class="mb-3 font-extrabold text-gray-800">Main Title</div>
            <div class="mb-3 font-bold text-gray-800">Slogan</div>
            <div class="mb-3 flex items-center space-x-4">
              <a class="rounded-md border border-gray-400 bg-gray-100 py-1 px-3 text-gray-600" href="#">Button1</a>
              <a class="inline-flex items-center text-gray-600" href="#">Button2 + &lt;svg&gt;</a>
            </div>
          </div>
        </div>

        <div class="relative h-[448px]">
          <div class="absolute inset-0 flex h-full w-full flex-col items-center bg-gray-100 px-6 py-12">
            <div class="h-2/5"><!--fake placeholder//--></div>
            <img class="h-3/5 w-full object-cover" src="https://picsum.photos/id/321/480/480" alt="image" />
          </div>
          <div class="relative flex flex-col items-center py-8">
            <div class="mb-3 font-extrabold text-gray-800">Main Title</div>
            <div class="mb-3 font-bold text-gray-800">Slogan</div>
            <div class="mb-3 flex items-center space-x-4">
              <a class="rounded-md border border-gray-400 bg-gray-100 py-1 px-3 text-gray-600" href="#">Button1</a>
              <a class="inline-flex items-center text-gray-600" href="#">Button2 + &lt;svg&gt;</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </x-bricks.preview>

  <x-bricks.preview>
    <div class="mx-auto bg-[url(/assets/img/grid.svg)] p-3">
      <div class="bg-white/50 pt-12" x-data="{
        isStart: true,
        isEnd: false,
        slide(forward = true) {
          let distance = forward ? $refs.scroller.clientWidth/2 : -$refs.scroller.clientWidth/2;
          let gap = $refs.scroller.scrollLeft % distance;
          $refs.scroller.scrollBy(distance, 0);
          this.navigationVisibility($refs.scroller.scrollLeft + distance, gap);
        },
        navigationVisibility(position, gap) {
          this.isEnd = (position >= $refs.scroller.scrollWidth - $refs.scroller.clientWidth - gap);
          this.isStart = position <= gap;
        }
      }">
        <div class="mb-3 text-center text-3xl font-bold">Campaign Title</div>
        <div class="mb-6 text-center">
          <a class="inline-flex items-center text-blue-600" href="#">Links svg</a>
        </div>
        <div class="relative">
          <div class="flex scroll-smooth snap-mandatory  snap-x overflow-x-auto relative"  x-ref="scroller">
            <div class="hidden sm:block flex-shrink-0 basis-1/4"><!--非必要區塊，首尾各一個。顯示可捲動的提示，讓第一個與最後一個元素永遠在中間，並顯示下一個或前一個元素的一半寬度//--></div>
            <!-- 重複性區塊 * n //-->
            <div class="snap-center flex-shrink-0 basis-full p-3 sm:basis-1/2">
              <img class="h-64 w-full object-cover" src="https://picsum.photos/id/1/480/256" />
              <div class="mt-3 bg-gray-200 py-3 px-4 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni labore atque nesciunt harum, provident praesentium, est maiores dolorem ut, enim nulla dolor. Quasi ullam eum, possimus incidunt consequuntur tempora harum!</div>
            </div>

            <div class="snap-center flex-shrink-0 basis-full p-3 sm:basis-1/2">
              <img class="h-64 w-full object-cover" src="https://picsum.photos/id/2/480/256" />
              <div class="mt-3 bg-gray-200 py-3 px-4 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni earum pariatur eveniet, deleniti vel ex. Perferendis at illo pariatur accusamus unde cum nesciunt, iure eaque consequatur magnam tenetur dicta dolorem.</div>
            </div>

            <div class="snap-center flex-shrink-0 basis-full p-3 sm:basis-1/2">
              <img class="h-64 w-full object-cover" src="https://picsum.photos/id/3/480/256" />
              <div class="mt-3 bg-gray-200 py-3 px-4 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni earum pariatur eveniet, deleniti vel ex. Perferendis at illo pariatur accusamus unde cum nesciunt, iure eaque consequatur magnam tenetur dicta dolorem.</div>
            </div>

            <div class="snap-center flex-shrink-0 basis-full p-3 sm:basis-1/2">
              <img class="h-64 w-full object-cover" src="https://picsum.photos/id/4/480/256" />
              <div class="mt-3 bg-gray-200 py-3 px-4 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni earum pariatur eveniet, deleniti vel ex. Perferendis at illo pariatur accusamus unde cum nesciunt, iure eaque consequatur magnam tenetur dicta dolorem.</div>
            </div>

            <div class="hidden sm:block flex-shrink-0 basis-1/4 "><!--scollable hint--></div>
          </div>

          <!--navigation//-->
          <div class="absolute top-0 left-2 h-full w-10 cursor-pointer flex items-center justify-center z-10 hover:text-white" x-on:click="slide(false)" x-show="!isStart">
            <svg xmlns="http://www.w3.org/2000/svg" class="bg-gray-400/50 rounded-full h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"  stroke-width="2"><path stroke-lineca="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
          </div>
          <div class="absolute top-0 right-2 h-full w-10 cursor-pointer flex items-center justify-center z-10 hover:text-white" x-on:click="slide(true)" x-show="!isEnd">
            <svg xmlns="http://www.w3.org/2000/svg" class="bg-gray-400/50 rounded-full h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
          </div>
        </div>
      </div>
    </div>
  </x-bricks.preview>

  <x-bricks.preview>
    <div class="mx-auto bg-[url(/assets/img/grid.svg)] p-3">
      <div class="bg-white/50 pt-12" x-data="{
        isStart: true,
        isEnd: false,
        slide(forward = true) {
          let distance = forward ? $refs.scroller.clientWidth : -$refs.scroller.clientWidth;
          let gap = $refs.scroller.scrollLeft % distance;
          $refs.scroller.scrollBy(distance, 0);
          this.navigationVisibility($refs.scroller.scrollLeft + distance, gap);
        },
        navigationVisibility(position, gap) {
          this.isEnd = (position >= $refs.scroller.scrollWidth - $refs.scroller.clientWidth - gap);
          this.isStart = position <= gap;
        }
      }">
        <div class="mb-3 text-center text-3xl font-bold">Campaign Title</div>
        <div class="mb-6 text-center">
          <a class="inline-flex items-center text-blue-600" href="#">Links svg</a>
        </div>
        <div class="relative">
          <div class="flex scroll-smooth snap-mandatory  snap-x overflow-x-auto relative"  x-ref="scroller">
            <div class="snap-start flex-shrink-0 basis-full p-3 sm:basis-1/2">
              <img class="h-64 w-full object-cover" src="https://picsum.photos/id/1/480/256" />
              <div class="mt-3 bg-gray-200 py-3 px-4 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni labore atque nesciunt harum, provident praesentium, est maiores dolorem ut, enim nulla dolor. Quasi ullam eum, possimus incidunt consequuntur tempora harum!</div>
            </div>

            <div class="snap-start flex-shrink-0 basis-full p-3 sm:basis-1/2">
              <img class="h-64 w-full object-cover" src="https://picsum.photos/id/2/480/256" />
              <div class="mt-3 bg-gray-200 py-3 px-4 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni earum pariatur eveniet, deleniti vel ex. Perferendis at illo pariatur accusamus unde cum nesciunt, iure eaque consequatur magnam tenetur dicta dolorem.</div>
            </div>

            <div class="snap-start flex-shrink-0 basis-full p-3 sm:basis-1/2">
              <img class="h-64 w-full object-cover" src="https://picsum.photos/id/3/480/256" />
              <div class="mt-3 bg-gray-200 py-3 px-4 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni earum pariatur eveniet, deleniti vel ex. Perferendis at illo pariatur accusamus unde cum nesciunt, iure eaque consequatur magnam tenetur dicta dolorem.</div>
            </div>

            <div class="snap-start flex-shrink-0 basis-full p-3 sm:basis-1/2">
              <img class="h-64 w-full object-cover" src="https://picsum.photos/id/4/480/256" />
              <div class="mt-3 bg-gray-200 py-3 px-4 text-gray-600">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni earum pariatur eveniet, deleniti vel ex. Perferendis at illo pariatur accusamus unde cum nesciunt, iure eaque consequatur magnam tenetur dicta dolorem.</div>
            </div>

          </div>

          <!--navigation//-->
          <div class="absolute top-0 left-2 h-full w-10 cursor-pointer flex items-center justify-center z-10 hover:text-white" x-on:click="slide(false)" x-show="!isStart">
            <svg xmlns="http://www.w3.org/2000/svg" class="bg-gray-400/50 rounded-full h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"  stroke-width="2"><path stroke-lineca="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
          </div>
          <div class="absolute top-0 right-2 h-full w-10 cursor-pointer flex items-center justify-center z-10 hover:text-white" x-on:click="slide(true)" x-show="!isEnd">
            <svg xmlns="http://www.w3.org/2000/svg" class="bg-gray-400/50 rounded-full h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
          </div>
        </div>
      </div>
    </div>
  </x-bricks.preview>

  <x-bricks.preview>
    <div class=" mx-auto bg-[url(/assets/img/grid.svg)] p-3">
      <div class="bg-white pt-12" x-data="{
        activeTab: 'tab1',
        isStart: true,
        isEnd: false,
        slide(forward = true) {
          let distance = forward ? $refs.scroller.clientWidth : -$refs.scroller.clientWidth;
          let gap = $refs.scroller.scrollLeft % distance;
          $refs.scroller.scrollBy(distance, 0);
          this.navigationVisibility($refs.scroller.scrollLeft + distance, gap);
        },
        navigationVisibility(position, gap) {
          this.isEnd = (position >= $refs.scroller.scrollWidth - $refs.scroller.clientWidth - gap);
          this.isStart = position <= gap;
        }
      }">
        <div class="mb-10 text-center text-3xl font-extrabold">Title</div>

        <div>
          <div class="flex mb-4 justify-center bg-white">
            <button class="inline-flex w-24 flex-col items-center justify-center p-2"  x-on:click="activeTab = 'tab1'">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
              </svg>
              <div class="mt-2">Tab1</div>
            </button>
            <button class="inline-flex w-24 flex-col items-center justify-center p-2"  x-on:click="activeTab = 'tab2'">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
              </svg>
              <div class="mt-2">Tab2</div>
            </button>
            <button class="inline-flex w-24 flex-col items-center justify-center p-2"  x-on:click="activeTab = 'tab3'">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
              </svg>
              <div class="mt-2">Tab3</div>
            </button>
            <button class="inline-flex w-24 flex-col items-center justify-center p-2" x-on:click="activeTab = 'tab4'">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
              </svg>
              <div class="mt-2">Tab4</div>
            </button>
          </div>

          <div class="bg-gray-50 py-12 px-0 sm:px-12">
            <div class="relative" x-show="activeTab == 'tab1'"  x-transition>
              <div class="flex relative snap-x snap-mandatory overflow-x-auto scroll-smooth gap-3 pb-3" x-ref="scroller">

                <div class="flex relative flex-shrink-0 basis-full snap-start flex-col items-center justify-center rounded-2xl bg-white p-6 sm:basis-1/3">
                  <div class="flex relative w-full flex-col items-center">
                    <div class="absolute top-0 left-0 w-full">
                      <span class="rounded-md border border-red-400 p-0.5 text-xs text-red-400">LABEL1</span>
                      <span class="rounded-md border border-red-400 p-0.5 text-xs text-red-400">LABEL2</span>
                    </div>
                    <img class="mt-12 h-32 w-32 rounded-lg object-cover" src="https://picsum.photos/id/1/480/256" />
                  </div>

                  <div class="mb-3 mt-3 font-bold">Title</div>
                  <div class="w-full border-t-2 border-b-2 border-b-gray-200 border-t-gray-200 py-2 text-center">
                    <div class="text-sm">Text</div>
                    <div class="text-lg font-bold">USD$99.99</div>
                  </div>
                  <div class="py-12 text-gray-600 sm:px-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni labore atque nesciunt harum, provident praesentium, est maiores dolorem ut, enim nulla dolor. Quasi ullam eum, possimus incidunt consequuntur tempora harum!</div>
                  <div class="flex w-full flex-col gap-3">
                    <a class="block w-full rounded-md border border-blue-700 bg-blue-700 py-1 text-center text-white">Button1</a>
                    <a class="block w-full rounded-md border border-blue-700 bg-white py-1 text-center text-blue-700">Button1</a>
                  </div>
                </div>

                <div class="flex relative flex-shrink-0 basis-full snap-start flex-col items-center justify-center rounded-2xl bg-white p-6 sm:basis-1/3">
                  <div class="flex relative w-full flex-col items-center">
                    <div class="absolute top-0 left-0 w-full">
                      <span class="rounded-md border border-red-400 p-0.5 text-xs text-red-400">LABEL1</span>
                      <span class="rounded-md border border-red-400 p-0.5 text-xs text-red-400">LABEL2</span>
                    </div>
                    <img class="mt-12 h-32 w-32 rounded-lg object-cover" src="https://picsum.photos/id/1/480/256" />
                  </div>

                  <div class="mb-3 mt-3 font-bold">Title</div>
                  <div class="w-full border-t-2 border-b-2 border-b-gray-200 border-t-gray-200 py-2 text-center">
                    <div class="text-sm">Text</div>
                    <div class="text-lg font-bold">USD$99.99</div>
                  </div>
                  <div class="py-12 text-gray-600 sm:px-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni labore atque nesciunt harum, provident praesentium, est maiores dolorem ut, enim nulla dolor. Quasi ullam eum, possimus incidunt consequuntur tempora harum!</div>
                  <div class="flex w-full flex-col gap-3">
                    <a class="block w-full rounded-md border border-blue-700 bg-blue-700 py-1 text-center text-white">Button1</a>
                    <a class="block w-full rounded-md border border-blue-700 bg-white py-1 text-center text-blue-700">Button1</a>
                  </div>
                </div>

                <div class="flex relative flex-shrink-0 basis-full snap-start flex-col items-center justify-center rounded-2xl bg-white p-6 sm:basis-1/3">
                  <div class="flex relative w-full flex-col items-center">
                    <div class="absolute top-0 left-0 w-full">
                      <span class="rounded-md border border-red-400 p-0.5 text-xs text-red-400">LABEL1</span>
                      <span class="rounded-md border border-red-400 p-0.5 text-xs text-red-400">LABEL2</span>
                    </div>
                    <img class="mt-12 h-32 w-32 rounded-lg object-cover" src="https://picsum.photos/id/1/480/256" />
                  </div>

                  <div class="mb-3 mt-3 font-bold">Title</div>
                  <div class="w-full border-t-2 border-b-2 border-b-gray-200 border-t-gray-200 py-2 text-center">
                    <div class="text-sm">Text</div>
                    <div class="text-lg font-bold">USD$99.99</div>
                  </div>
                  <div class="py-12 text-gray-600 sm:px-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni labore atque nesciunt harum, provident praesentium, est maiores dolorem ut, enim nulla dolor. Quasi ullam eum, possimus incidunt consequuntur tempora harum!</div>
                  <div class="flex w-full flex-col gap-3">
                    <a class="block w-full rounded-md border border-blue-700 bg-blue-700 py-1 text-center text-white">Button1</a>
                    <a class="block w-full rounded-md border border-blue-700 bg-white py-1 text-center text-blue-700">Button1</a>
                  </div>
                </div>

                <div class="flex relative flex-shrink-0 basis-full snap-start flex-col items-center justify-center rounded-2xl bg-white p-6 sm:basis-1/3">
                  <div class="flex relative w-full flex-col items-center">
                    <div class="absolute top-0 left-0 w-full">
                      <span class="rounded-md border border-red-400 p-0.5 text-xs text-red-400">LABEL1</span>
                      <span class="rounded-md border border-red-400 p-0.5 text-xs text-red-400">LABEL2</span>
                    </div>
                    <img class="mt-12 h-32 w-32 rounded-lg object-cover" src="https://picsum.photos/id/1/480/256" />
                  </div>

                  <div class="mb-3 mt-3 font-bold">Title</div>
                  <div class="w-full border-t-2 border-b-2 border-b-gray-200 border-t-gray-200 py-2 text-center">
                    <div class="text-sm">Text</div>
                    <div class="text-lg font-bold">USD$99.99</div>
                  </div>
                  <div class="py-12 text-gray-600 sm:px-8">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni labore atque nesciunt harum, provident praesentium, est maiores dolorem ut, enim nulla dolor. Quasi ullam eum, possimus incidunt consequuntur tempora harum!</div>
                  <div class="flex w-full flex-col gap-3">
                    <a class="block w-full rounded-md border border-blue-700 bg-blue-700 py-1 text-center text-white">Button1</a>
                    <a class="block w-full rounded-md border border-blue-700 bg-white py-1 text-center text-blue-700">Button1</a>
                  </div>
                </div>

              </div>

              <!--navigation//-->
              <div class="flex absolute top-0 left-0 sm:-left-10 z-10 h-full w-10 cursor-pointer items-center justify-center hover:text-white" x-on:click="slide(false)" x-show="!isStart">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 rounded-full bg-gray-400/50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-lineca="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" /></svg>
              </div>
              <div class="flex absolute top-0 right-0 sm:-right-10 z-10 h-full w-10 cursor-pointer items-center justify-center hover:text-white" x-on:click="slide(true)" x-show="!isEnd">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 rounded-full bg-gray-400/50" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" /></svg>
              </div>
            </div>

            <div x-show="activeTab == 'tab2'" x-transition>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni labore atque nesciunt harum, provident praesentium, est maiores dolorem ut, enim nulla dolor. Quasi ullam eum, possimus incidunt consequuntur tempora harum!</div>
            <div x-show="activeTab == 'tab3'" x-transition>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam quia inventore minima iste officiis? Enim voluptates quia laudantium qui, voluptatum, modi et consequuntur, autem ea repellendus beatae omnis aperiam molestias.</div>
            <div x-show="activeTab == 'tab4'" x-transition>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Ipsum expedita voluptates vel velit incidunt quaerat repellendus sint tempora, repellat optio laborum eaque quibusdam cum fugiat eius distinctio fuga nulla exercitationem.</div>
          </div>
        </div>
      </div>
    </div>
  </x-bricks.preview>

@endsection


