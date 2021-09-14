
<x-layout>
    <x-setting :heading="'Edit Post:' . $post->title">
        <form method="post" action="/admin/posts/{{ $post->id }}" enctype="multipart/form-data">
            @csrf
            {{-- Tip to the server that we do Patch --}}
            @method('PATCH')
            <div class="mb-6">
                <x-form.label name="category"/>
                <select name="category_id" id="category_id">
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
                <x-form.error name="category"/>
            </div>
            <x-form.input name='title' :value="old('title', $post->title)"/>
            <x-form.input name='slug' :value="old('slug', $post->slug)"/>
            <div class="flex gap-3 my-6">
                <x-form.input name='thumbnail' type='file' :value="old('thumbnail', $post->thumbnail)"/>
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" width="100">
            </div>
            <x-form.textarea name='excerpt'>{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
            <x-form.textarea name='body'>{{ old('body', $post->body) }}</x-form.textarea>
            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>
</x-layout>