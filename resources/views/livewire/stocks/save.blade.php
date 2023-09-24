<div class="flex">
    <x-button 
        label="Adicionar" 
        icon="plus" 
        positive
        wire:click='toggleModal'
    />

    <x-modal wire:model="assetMomementToggle">
        <x-card title="Criar Movimentação de Ativo">
            <div class="flex flex-col gap-y-3">

                <div class="flex flex-col gap-3">
                    @if ($selectedAsset)
                        <span>
                            Ativo Selecionado:
                        </span>

                        <x-badge 
                            rounded
                            primary
                            lg
                            :label="$selectedAsset['code']"
                            class="w-fit hover:opacity-70 duration-300 cursor-pointer"
                            right-icon="x"
                            wire:click='removeAsset'
                        />
                    @else   
                        <x-input 
                            label="Pesquise e Selecione Código do Ativo"
                            wire:model.debounce.250ms='searchAssets'
                            class="w-full"
                            name="selectedAsset"
                        />

                        <div class="flex gap-2 flex-wrap">
                            @foreach ($assetsList as $assetIndex => $asset)
                                <x-badge 
                                    rounded
                                    primary
                                    lg
                                    :label="$asset['code']"
                                    class="w-fit hover:opacity-70 duration-300 cursor-pointer"
                                    right-icon="plus"
                                    wire:click='selectAsset({{ $assetIndex }})'
                                />
                            @endforeach
                        </div>
                    @endif
                </div>
    
                <x-native-select
                    label="Tipo de Movimentação do Ativo"
                    wire:model="assetMovement.type"
                    :options="$assetMovementTypes"
                    option-label="label"
                    option-value="value"
                />

                <div class="grid grid-cols-2 gap-4">
                    <x-inputs.number 
                        label="Quantidade"
                        wire:model='assetMovement.quantity'
                        class="flex" 
                    />

                    <x-input 
                        right-icon="cash" 
                        label="Preço por Ativo"
                        class="flex"
                        type="number"
                        wire:model="assetMovement.price"
                    />
                </div>
            </div>
            
            <x-slot name="footer">
                <div class="flex w-full justify-between">
                    <x-button 
                        label="Cancelar" 
                        wire:click='toggleModal' 
                    />
    
                    <x-button
                        label="Salvar"
                        primary 
                        wire:click='save' 
                    />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
