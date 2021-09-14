<x-layout>
    <section class="max-w-sm m-auto py-8">
        <h1 class="font-bold">Publish New Post</h1>
        <x-panel class="my-3">
                <form action="/admin/posts" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-6">
                        <x-form.label name="category"/>
                        <select name="category_id" id="category_id">
                            @foreach (\App\Models\Category::all() as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                            @endforeach
                        </select>
                        <x-form.error name="category"/>
                    </div>
                    <x-form.input name='title'/>
                    <x-form.input name='slug'/>
                    <x-form.input name='thumbnail' type='file'/>
                    <x-form.textarea name='excerpt'/>
                    <x-form.textarea name='body'/>
                    <x-form.button>Publish</x-form.button>
                </form>
        </x-panel>
    </section>
</x-layout>