@props(['post'])

<article class="mb-5 bg-white shadow-lg rounded-lg overflow-hidden">
    <img class="w-full h-72 object-cover object-center" src="@if($post->image) {{ asset('storage/'.$post->image->url) }} @else https://cdn.pixabay.com/photo/2022/06/02/11/12/felucca-7237715_960_720.jpg @endif" alt="Imagen">
    <div class="py-4 px-6">
        <h1 class="font-bold text-xl mb-2">
            <a href="{{ route('posts.show', $post)}}">{{ $post->name }}</a>
        </h1>
        <div class="text-gray-700 text-base">
            {{ $post->extract }}
        </div>
        <div class="pt-2 pb-2">
            @foreach ($post->tags as $tag)
                <a href="{{ route('posts.tag', $tag) }}" class="inline-block px-2 h-6 bg-gray-400 opacity-50 text-black text-sm rounded-full hover:opacity-100">
                    #{{ $tag->name }}
                </a>
            @endforeach
        </div>
    </div>
</article>