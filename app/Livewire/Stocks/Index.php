<?php

namespace App\Livewire\Stocks;

use App\Enums\AssetMovementType;
use App\Models\Asset;
use App\Models\AssetMovement;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;
use Filament\Tables;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Model;

class Index extends Component implements HasTable
{
    use InteractsWithTable; 

    protected $listeners = [
        'refresh' => '$refresh'
    ];

    public function getAssetMovementsProperty(): Collection 
    {
        return auth()->user()->assetMovements;
    }

    protected function getTableQuery(): Builder
    {
        return AssetMovement::query();
    }
 
    protected function getTableColumns(): array 
    {
        return [
            Tables\Columns\TextColumn::make('id')->sortable(),
            Tables\Columns\TextColumn::make('asset.code')->label('Ativo'),
            BadgeColumn::make('type')->label('Tipo de Movimentação')
                ->enum(AssetMovementType::getStrings())
                ->colors(AssetMovementType::getColors()),
            Tables\Columns\TextColumn::make('quantity')->label('Quantidade'),
            Tables\Columns\TextColumn::make('price')->label('Preço')->money('brl', true),
            Tables\Columns\TextColumn::make('totalAmount')->label('Valor Total')->money('brl', true)
        ];
    }
 
    protected function getTableFilters(): array
    {
        return [];
    }
 
    protected function getTableActions(): array
    {
        return [
            DeleteAction::make()
                ->iconButton(),
            EditAction::make()
                ->iconButton()
                ->action(fn (Model $record) => $this->emit('asset-movement:edit', $record->id))
        ];
    }
 
    protected function getTableBulkActions(): array
    {
        return [];
    } 

    public function edit() 
    {
        dd(request()->all());
    }

    public function render(): View
    {
        return view('livewire.stocks.index', [
            'assetMovements' => $this->assetMovements
        ]);
    }
}
