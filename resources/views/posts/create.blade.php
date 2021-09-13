<x-layout>
    <section class="max-w-sm m-auto py-8">
        <h1 class="font-bold">Publish New Post</h1>
        <x-panel class="my-3">
                <form action="/admin/posts" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <label for="category_id" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Category
                        </label>
                        <select name="category_id" id="category_id">
                            @foreach (\App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                            @endforeach
                        </select>
                        @error('category')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="title" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Title
                        </label>
                        <input type="text" name="title" id="title" required class="border border-gray-300 rounded-sm w-full" value="{{ old('title') }}">
                        @error('title')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="slug" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Slug
                        </label>
                        <input type="text" name="slug" id="slug" required class="border border-gray-300 rounded-sm w-full" value="{{ old('slug') }}">
                        @error('slug')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="thumbnail" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Thumbnail
                        </label>
                        <input type="file" name="thumbnail" id="thumbnail" required class="border border-gray-300 rounded-sm w-full" value="{{ old('slug') }}">
                        @error('thumbnail')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="excerpt" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Excerpt
                        </label>
                        <textarea type="text" name="excerpt" id="excerpt" required class="border border-gray-300 rounded-sm w-full">{{ old('body') }}</textarea>
                        @error('excerpt')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label for="body" class="block mb-2 uppercase font-bold text-xs text-gray-700">
                            Body
                        </label>
                        <textarea type="text" name="body" id="body" required class="border border-gray-300 rounded-sm w-full">{{ old('body') }}</textarea>
                        @error('body')
                            <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                    <x-submit-button>Publish</x-submit-button>
                </form>
        </x-panel>
    </section>
</x-layout>