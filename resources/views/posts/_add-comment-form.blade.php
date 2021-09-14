@auth
<x-panel>
    <form action="/posts/{{ $post->slug }}/comments" method="post">
        @csrf
        <header class="flex items-center">
            <img src="https://i.pravatar.cc/60?u={{ auth()->id() }}" alt="" width="60" height="60" class="rounded-full">
            <h2 class="ml-4">Want to participate?</h2>
        </header>
        <x-form.textarea name='body' :label="false"/>
        <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
            <x-form.button>
                Post
            </x-form.button>
        </div>
    </form>
  </x-panel>
  @else
    <p class="font-semibold">
        <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">log in</a> to leave a comment.
    </p>
  @endauth