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
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Contracts\Database\Eloquent\Builder as EloquentBuilder;
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
            Tables\Columns\TextColumn::make('id')->sortable()->searchable(),
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
        return [
            SelectFilter::make('asset_id')
                ->label('Ativo')
                ->options(Asset::whereHas('movements')->get()->pluck('code', 'id')),
            SelectFilter::make('type')
                ->label('Tipo de Movimentação')
                ->options(AssetMovementType::getStrings()),
        ];
    }
 
    protected function getTableActions(): array
    {
        return [
            DeleteAction::make()
                ->iconButton()
                ->modalHeading('Deletar Movimentação de Ativo'),
            EditAction::make()
                ->iconButton()
                ->action(fn (Model $record) => $this->emit('asset-movement:edit', $record->id))
        ];
    }

    public function render(): View
    {
        return view('livewire.stocks.index', [
            'assetMovements' => $this->assetMovements
        ]);
    }
}
