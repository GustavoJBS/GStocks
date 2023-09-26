<div class="flex flex-col overflow-y-auto h-screen w-full">
    <x-navbar title="Dashboard">
        @slot('buttons')
            <div class="flex flex-col flex-wrap items-baseline justify-between gap-x-4 bg-white">
                <span class="text-sm font-medium leading-6 text-gray-500">Saldo Atual</span>
                <span class="flex-none text-3xl font-medium leading-10 tracking-tight text-gray-900">
                    {{ auth()->user()->currentBalance }}
                </span>
            </div>
        @endslot
    </x-navbar>

    <div class="px-8 py-9">
        {{ $this->table }}
    </div>
</div>