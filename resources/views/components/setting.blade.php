@props(['heading'])
<section class="max-w-4xl m-auto py-8">
    <h1 class="font-bold text-lg mb-8 border-b">
        {{ $heading }}
    </h1>
    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <ul>
                <li><a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">All Posts</a></li>
                <li><a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">New Post</a></li>
            </ul>
        </aside>
        <main class="flex-1">
            <x-panel class="my-3">
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>