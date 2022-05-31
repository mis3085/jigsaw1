<div x-data="previewMode">
  <div class="flex justify-end mb-4 space-x-2">
    <button class="inline-flex  items-center space-x-1 rounded-md py-1 px-3 text-gray-700 border border-gray-300 " x-bind:class="isOn" x-on:click="on">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" /><path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" /></svg>
      <span>Preview</span></button>
    <button class="inline-flex items-center space-x-1 rounded-md py-1 px-3 text-gray-700 border border-gray-300 " x-bind:class="isOff" x-on:click="off">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4" /></svg>
      <span>Code</span></button>
  </div>
  <div x-show="!preview" x-cloak>
    <pre><code class="highlight" x-html="code"></code></pre>
  </div>
  <div x-show="preview" x-ref="source">{{ $slot }}</div>
</div>
<hr class="my-4"/>
@once
  @push('scripts')
  <script>
    document.addEventListener('alpine:init', () => {
      Alpine.data('previewMode', () => ({
        preview: true,
        on() {
          this.preview = true;
        },
        off() {
          this.preview = false;
        },
        get isOn() {
          return this.preview ? 'bg-white' : 'bg-gray-200';
        },
        get isOff() {
          return this.preview ? 'bg-gray-200' : 'bg-white';
        },
        get code() {
          return hljs.highlight(this.$refs.source.innerHTML, {language:'html'}).value;
        }
      }))
    })
  </script>
  @endpush
@endonce
