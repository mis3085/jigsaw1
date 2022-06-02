<div class="sm:w-1/2 md:w-1/3 p-3 mb-3">
    <img src="https://images.weserv.nl/?output=webp&h=300&url={{ $post->thumbnail }}" class="w-full h-64 object-cover" alt="{{ $post->title }}"/>
    <p class="text-gray-700 font-medium my-2">
        {{ $post->id }}
    </p>

    <h2 class="text-3xl mt-0">
        <a
            href="{{ $post->getUrl() }}"
            title="Read more - {{ $post->title }}"
            class="text-gray-900 font-extrabold"
        >{{ $post->title }}</a>
    </h2>

    <p class="mb-4 mt-0">{!! $post->getExcerpt(200) !!}</p>

    <a
        href="{{ $post->getUrl() }}"
        title="Read more - {{ $post->title }}"
        class="uppercase font-semibold tracking-wide mb-2"
    ><x-trans :locale="$post->language" key="Read"/></a>
</div>
