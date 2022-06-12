<x-app-layout>

    {{-- CONTAINER --}}
    <div class="container py-8">
        
        {{-- TITULO --}}
        <h1 class="text-3xl font-bold text-gray-800">{{ $post->name }}</h1>

        {{-- EXTRACTO --}}
        <div class="text-base mb-4">
            {{ $post->extract }}
        </div>

        {{-- CONTENIDO --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- PRINCIPAL --}}
            <div class="lg:col-span-2">
                <figure>
                    <img class="w-full" src="@if($post->image) {{ asset('storage/'.$post->image->url) }} @else https://cdn.pixabay.com/photo/2022/06/02/11/12/felucca-7237715_960_720.jpg @endif" alt="Imagen del post">
                </figure>
                <div class="text-base mt-4">
                    {{ $post->body }}
                </div>
            </div>

            {{-- RELACIONADO --}}
            <aside>
                <h1 class="text-xl font-bold text-gray-600 mb-4">Más en {{ $post->category->name }}</h1>

                {{-- POSTS SIMILARES --}}
                <ul>
                    @foreach ($relateds as $related)
                        <li class="mb-4">
                            <a href="{{ route('posts.show', $related )}}" class="grid grid-cols-3">
                                <img class="w-36 h-20 object-cover col-span-1" src="@if($related->image) {{ asset('storage/'.$related->image->url) }} @else https://cdn.pixabay.com/photo/2022/06/02/11/12/felucca-7237715_960_720.jpg @endif" alt="Imagen del post">
                                <span class="ml-2 text-gray-600 col-span-2">{{ $related->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>

        </div>

    </div>

</x-app-layout>