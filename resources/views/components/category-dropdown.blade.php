<x-dropdown>
    <x-slot name="trigger">
        <button id="btnCategories" class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">
            {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'All' }}
              <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                    height="22" viewBox="0 0 22 22">
                  <g fill="none" fill-rule="evenodd">
                      <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                      </path>
                      <path fill="#222"
                            d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                  </g>
              </svg>
            </button>
    </x-slot>
    <a href="/"
    class="block text-left px-3 text-sm leading-6 hover:bg-blue-600 focus:bg-blue-500 hover:text-white focus:text-white">
    All
    </a>
    @foreach ($categories  as $category)
    <a href="/?category={{ $category->slug }}"
    class="block text-left px-3 text-sm leading-6 hover:bg-blue-600 focus:bg-blue-500 hover:text-white focus:text-white
    {{ isset($currentCategory) && $currentCategory->is($category) ? 'bg-blue-600 text-white' : '' }}">
    {{  ucwords($category->name) }}
    </a>
    @endforeach
</x-dropdown>