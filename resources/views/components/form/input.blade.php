@props(['name', 'type' => 'text'])
<div class="mb-6">
    <x-form.label name="{{ $name }}"/>

    <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}" required class="border border-gray-300 rounded-sm w-full" value="{{ old('title') }}">

    <x-form.error name="{{ $name }}"/>
</div>