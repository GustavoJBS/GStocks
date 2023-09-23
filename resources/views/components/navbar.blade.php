@props([
    'title'
])

<nav
    {{
        $attributes->class([
            'w-full bg-neutral-0 px-8 py-8',
            'border-b border-neutral-200 space-y-4'
        ])
    }}
>
    <div
        @class([
            'flex justify-between items-center'
        ])
    >
        <button @click="sideBarOpen = !sideBarOpen" class="text-gray-500 lg:hidden focus:outline-none">
            <x-icon name="menu-alt-2" class="w-6 h-6 mr-4" />
        </button>

        <span class="text-4xl text-neutral-800 leading-10">
            {{ $title }}
        </span>

        @isset ($buttons)
            {{ $buttons }}
        @endisset
    </div>
</nav>