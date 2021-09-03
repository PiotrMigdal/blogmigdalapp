{{-- <x-layout>
  @foreach ($posts as $post)
    <article>
      <h1>
        <a href="/posts/{{ $post->slug }}">
          {{ $post->title }}
        </a>
      </h1>
      By <a href="/authors/{{ $post->author->username }}">{{ $post->author->name }}</a> in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a>
      <div>
      {{ $post->excerpt }}
      </div>
    </article>
  @endforeach
</x-layout> --}}

<x-layout>
  @include('_posts-header')

  <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
    @if ($posts->count())
    {{-- Passed to new component so it can be reuseabale --}}
      <x-posts-grid :posts="$posts" />
    @else
      <p class="text-center">Sorry, no posts yet</p>
    @endif
  </main>
</x-layout>