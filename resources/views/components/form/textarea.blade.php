@props(['name', 'label' => true])
<div class="mb-6">
    @if ($label)
        <x-form.label name="{{ $name }}"/>
    @endif

    <textarea name="{{ $name }}" id="{{ $name }}" required
    class="border border-gray-300 rounded-sm w-full {{ !$label ? 'mt-3' : '' }}">{{ old('body') }}</textarea>

    <x-form.error name="{{ $name }}"/>
</div>
