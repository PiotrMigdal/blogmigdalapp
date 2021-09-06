@props(['trigger'])
{{-- Note that x-data and @click methods come from alpine js framework --}}
<div x-data="{ show: false }" @click.away="show = false">
  {{-- trigger --}}
  <div @click="show = ! show">
      {{ $trigger }}
  </div>

  {{-- links --}}
  <div x-show="show" class="py-2 absolute bg-gray-100 mt-2 rounded-xl w-full z-50 top-full overflow-auto max-h-52" style="display: none">
    {{ $slot }}
  </div>
</div>