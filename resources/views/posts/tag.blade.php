<x-app-layout>
    <div class="py-8 max-w-5xl mx-auto px-2 sm:px-6 lg:px-8">

        {{-- TITLE --}}
        <h1 class="uppercase text-center text-3xl font-bold pb-8">Etiqueta: {{ $tag->name }}</h1>

        {{-- ARTICLE --}}
        @foreach ($posts as $post)
            <x-card-post :post="$post" />
        @endforeach

        {{-- PAGINACIÓN --}}
        @if ($posts->hasPages())
            <div class="mt-4">
                {{ $posts->links() }}
            </div>
        @endif

    </div>
</x-app-layout>