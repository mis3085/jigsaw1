<div class="w-full sm:w-1/2 md:w-1/3 sm:p-3 mb-3">
  <a
    href="{{ $item->getUrl() }}"
    title="Read more - {{ $item->title }}"
    class="text-gray-900 font-extrabold">
    @if ($item->images)
        <img src="https://images.weserv.nl/?output=webp&?url={{ $item->image }}&h=300" class="w-full h-64 object-cover"
            alt="{{ $item->title }}" loading="lazy"/>
    @else
      <svg class="w-full h-full p-24 bg-white absolute inset-0 z-10" x-show="! loaded" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" vesion="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 232.322 232.322" style="enable-background:new 0 0 232.322 232.322;" xml:space="preserve">
      <path d="M224.822,23.935H7.5c-4.142,0-7.5,3.357-7.5,7.5v169.451c0,4.143,3.358,7.5,7.5,7.5h217.322c4.142,0,7.5-3.357,7.5-7.5   V31.435C232.322,27.293,228.964,23.935,224.822,23.935z M217.322,38.936v143.091l-59.995-63.799   c-1.417-1.507-3.394-2.362-5.462-2.362c-0.001,0-0.001,0-0.001,0c-2.068,0-4.044,0.855-5.462,2.36l-25.62,27.227l-34.349-45.291   c-1.418-1.87-3.629-2.968-5.976-2.968c-0.002,0-0.004,0-0.006,0c-2.349,0.002-4.561,1.104-5.977,2.978L15,178.861V38.936H217.322z    M207.415,193.387H22.824l57.643-76.269l33.722,44.465c1.334,1.759,3.374,2.84,5.578,2.957c2.201,0.11,4.348-0.742,5.86-2.35   l26.234-27.879L207.415,193.387z"/><path d="M155.237,101.682c13.597,0,24.658-11.061,24.658-24.656c0-13.597-11.061-24.658-24.658-24.658   c-13.596,0-24.656,11.062-24.656,24.658C130.581,90.621,141.642,101.682,155.237,101.682z M155.237,67.367   c5.326,0,9.658,4.333,9.658,9.658c0,5.324-4.332,9.656-9.658,9.656c-5.325,0-9.656-4.332-9.656-9.656   C145.581,71.7,149.913,67.367,155.237,67.367z"/></svg>
    @endif

    <div class="text-lg mt-1 text-center truncate">{{ $item->title }}</div>
  </a>
  <table>
    @foreach($item->features as $key => $value)
    <tr>
      <td class="table-row md:table-cell mb-1 p-2 text-left md:text-right"><strong>{{ \Illuminate\Support\Str::headline($key) }}:</strong></td>
      <td class="table-row md:table-cell mb-1 p-2 "><span class="pl-6 md:pl-2">{{ $value }}</span></td>
    </tr>
    @endforeach
  </table>
</div>
