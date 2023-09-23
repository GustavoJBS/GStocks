@props([
    'name',
    'routeName',
    'icon' => null
])

<a 
    href="{{ route($routeName) }}"
    @class([
        'flex items-center p-2 hover:bg-primary-800 rounded-lg text-primary-50 hover:text-primary-50 duration-300',
        'text-primary-50 bg-primary-800' => str_contains(\Route::currentRouteName(), $routeName)
    ])
>
    @if ($icon)
        <x-icon :name="$icon" class="w-5 h-5 text-primary-350" />
    @endif

    {{ $slot }}


    <span class="mx-3 capitalize">
        {{ $name }}
    </span>
</a>