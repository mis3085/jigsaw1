@props([
  'company' => null,
])
@if ($company)
  <div class="flex flex-wrap">
    <div class="w-full sm:w-36 sm:mr-3 mb-3">
      <a href="{{ $company->getUrl() }}" class="flex flex-col justify-center items-center">
        <img class="w-36 h-36 object-scale-down bg-white rounded-lg" src="https://images.weserv.nl/?output=webp&?h=300&url=https://world.taiwanexcellence.org/uploads/{{ $company->logo }}" alt="{{ $company->title }}"/>
      </a>
    </div>
    <div class="w-full sm:w-36 sm:flex-grow mb-3">
      <h2 class="text-lg font-extrabold">{{ $company->title }}</h2>
      {{ $company->description }}
    </div>
  </div>
@endif
