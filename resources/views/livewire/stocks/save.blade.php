<div class="flex">
    <x-button 
        label="Adicionar" 
        icon="plus" 
        positive
        wire:click='toggleModal'
    />

    <x-modal wire:model="assetMomementToggle">
        <x-card title="Criar Movimentação de Ativo">

            <x-select
                label="Search a Ticker"
                wire:model.defer="selectedAsset"
                placeholder="Select some user"
                :async-data="route('stocks.search-assets')"
                option-label="label"
                option-value="value"
            />

            <x-slot name="footer">
                <div class="flex w-full justify-between">
                    <x-button 
                        label="cancel" 
                        wire:click='toggleModal' 
                    />
    
                    <x-button
                        label="Save"
                        primary 
                        wire:click='save' 
                    />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
