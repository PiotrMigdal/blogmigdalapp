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