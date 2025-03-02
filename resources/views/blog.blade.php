<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    
    
    <div class="bg-white">
        <div class="mx-auto max-w-7xl px-6 lg:px-8">
          <div class="mx-auto mt-10 grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 sm:mt-16 sm:pt-16 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @foreach ($posts as $post)
            <article class="flex max-w-xl flex-col items-start justify-between border border-gray-300 shadow-lg rounded-lg p-6 bg-white">
              <div class="flex items-center gap-x-4 text-xs">
                <time datetime="2020-03-16" class="text-gray-500">{{ $post->created_at->format('l, j F Y') }} ({{ $post->created_at->diffForHumans() }})</time>
                <a href="/categories/{{ $post->category->slug }}" class="text-orange-400 hover:text-orange-600 hover:transition-all hover:underline">{{ $post->category->name }}</a>
              </div>
              <div class="group relative">
                <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
                  <a href="#">
                    <span class="absolute inset-0"></span>
                    {{ $post['title'] }}
                  </a>
                </h3>
                <p class="mt-5 line-clamp-3 text-sm/6 text-gray-600">{{ Str::limit ($post['isi'], 200) }}</p>
              </div>
              <div class="relative mt-8 flex items-center gap-x-4">
                <img src="https://scontent.fdps2-1.fna.fbcdn.net/v/t39.30808-6/473001125_1285233319193289_162042056181735447_n.jpg?_nc_cat=109&ccb=1-7&_nc_sid=6ee11a&_nc_eui2=AeHFTI09OIgqzrKcc9Ad42uADcnqxTGERPANyerFMYRE8B8rVkqgWeofqqU7VTHRIou6KYR12_j66surhibRB5VN&_nc_ohc=gZB7eo79ZNkQ7kNvgEOjGYJ&_nc_oc=AdiAbJvYwqGbEYhRYRjt5B4NCthk_ZrhqVJ7xWFglNv6O1c-wg4TPc09SwA68GZ-IUk&_nc_zt=23&_nc_ht=scontent.fdps2-1.fna&_nc_gid=AqYmgeQX8mc3QqxI3ZAFaYZ&oh=00_AYDjTIAIyoo9v0VdW9RpYcuy4PEfuntFVWZiydTTgI6WUQ&oe=67C98481" alt="" class="size-10 rounded-full bg-gray-50">
                <div class="text-sm/6">
                  <p class="font-semibold text-gray-900">
                    <a href="/authors/{{ $post->author->name }}" class="text-orange-400 hover:text-orange-600 hover:transition-all hover:underline">{{ $post->author->name }}</a>
                  </p>
                  <a href="/posts/{{ $post['slug'] }}" class="hover:text-orange-600 hover:transition-all">Read More &raquo;</a>
                </div>
              </div>
            </article>
            @endforeach
      
            <!-- More posts... -->
          </div>
        </div>
      </div>
      

    {{-- @foreach ($posts as $post)
    <article class="py-8 max-w-screen-sm border-b border-gray-400">
        <a href="/posts/{{ $post['slug'] }}">
            <h2 class="mb-1 text-3xl tracking-tight font-bold">{{ $post['title'] }}</h2>
        </a>
        <div class="text-base text-gray-600">
            By
            <a href="/authors/{{ $post->author->name }}" class="text-orange-400 hover:text-orange-600 hover:transition-all hover:underline">{{ $post->author->name }}</a>
            in 
            <a href="/categories/{{ $post->category->slug }}" class="text-orange-400 hover:text-orange-600 hover:transition-all hover:underline">{{ $post->category->name }}</a> | {{ $post->created_at->format('l, j F Y') }} ({{ $post->created_at->diffForHumans() }})
        </div>
        <p class="my-4 font-light">{{ Str::limit ($post['isi'], 200) }}</p>
        <a href="/posts/{{ $post['slug'] }}" class="hover:text-orange-600 hover:transition-all">Read More &raquo;</a>
    </article>
    @endforeach --}}
    
</x-layout>