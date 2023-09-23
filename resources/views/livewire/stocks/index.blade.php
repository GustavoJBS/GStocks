<div class="flex flex-col overflow-y-auto h-screen w-full">
    <x-navbar 
        title="Movimentações de Ativos" 
    >
        @slot('buttons')
            <x-button label="Adicionar" icon="plus" positive />
        @endslot
    </x-navbar>

    <div class="px-8 py-9">
        Hello World
    </div>
</div>