<x-app-layout>

    {{-- CONTENEDOR --}}
    <div class="container py-8">

        {{-- TITLE --}}
        <h1 class="uppercase text-center text-3xl font-bold pb-8">Publicaciones</h1>

        {{-- GRID --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
            @foreach ($posts as $post)
                <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif" 
                    style="background-image: url(@if($post->image) {{ asset('storage/'.$post->image->url) }} @else https://cdn.pixabay.com/photo/2022/06/02/11/12/felucca-7237715_960_720.jpg @endif)">

                    {{-- CONTENT --}}
                    <div class="w-full h-full px-8 flex flex-col justify-center">
                        {{-- TAGS --}}
                        <div class="">
                            @foreach ($post->tags as $tag)
                                <a href="{{ route('posts.tag', $tag) }}"  class="inline-block px-2 h-6 bg-gray-400 opacity-50 text-black text-sm rounded-full hover:opacity-100">
                                    #{{ $tag->name }}
                                </a>
                            @endforeach
                        </div>
                        {{-- TITLE --}}
                        <h1 class="text-2xl text-white font-bold">
                            <a href="{{ route('posts.show', $post) }}">
                                {{ $post->name }}
                            </a>
                        </h1>
                    </div>

                </article>
            @endforeach
        </div>

        {{-- PAGINACIÓN --}}
        @if ($posts->hasPages())
            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        @endif

    </div>

</x-app-layout> 