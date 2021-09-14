@props(['name'])
<div class="mb-6">
    <x-form.label name="{{ $name }}"/>

    <input {{ $attributes(['value' => old($name)]) }} name="{{ $name }}" id="{{ $name }}" class="border border-gray-300 rounded-sm w-full" >

    <x-form.error name="{{ $name }}"/>
</div>