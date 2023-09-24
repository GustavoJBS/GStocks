<div class="flex flex-col overflow-y-auto h-screen w-full">
    <x-navbar title="Meus Ativos">
        @slot('buttons')
            <div>
                <livewire:stocks.save />
            </div>
        @endslot
    </x-navbar>

    <div class="px-8 py-9">
        Hello World
    </div>
</div>