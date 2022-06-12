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
                    <img class="w-full" src="{{ asset('storage/'.$post->image->url) }}" alt="Imagen del post">
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
                                <img class="w-36 h-20 object-cover col-span-1" src="{{ asset('storage/'.$post->image->url) }}" alt="Imagen del post">
                                <span class="ml-2 text-gray-600 col-span-2">{{ $related->name }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>

        </div>

    </div>

</x-app-layout>