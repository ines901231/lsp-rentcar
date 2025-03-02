<x-layout>
    <x-slot:title>a</x-slot>

    <article class="py-8 max-w-screen-sm">
            <h2 class="mb-1 text-3xl tracking-tight font-bold">{{ $post['title'] }}</h2>
        <div class="text-base text-gray-600">
            By
            <a href="/authors/{{ $post->author->name }}" class="text-orange-400 hover:text-orange-600 hover:transition-all hover:underline">{{ $post->author->name }}</a>
            in 
            <a href="/categories/{{ $post->category->slug }}" class="text-orange-400 hover:text-orange-600 hover:transition-all hover:underline">{{ $post->category->name }}</a> | {{ $post->created_at->format('l, j F Y') }} ({{ $post->created_at->diffForHumans() }})
        </div>
        <p class="my-4 font-light">{{ $post['isi'] }}</p>
        <a href="/blog" class="hover:text-orange-600 hover:transition-all">&laquo; Back</a>
    </article>

    
</x-layout>