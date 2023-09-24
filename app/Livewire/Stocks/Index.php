<?php

namespace App\Livewire\Stocks;

use App\Models\Asset;
use App\Models\AssetMovement;
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

class Index extends Component implements HasTable
{
    use InteractsWithTable; 

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
            Tables\Columns\TextColumn::make('id'),
            Tables\Columns\TextColumn::make('asset.ticker')->label('Ativo'),
            Tables\Columns\TextColumn::make('quantity')->label('Quantidade'),
            Tables\Columns\TextColumn::make('price')->label('Preço')->money('brl')   
        ];
    }
 
    protected function getTableFilters(): array
    {
        return [];
    }
 
    protected function getTableActions(): array
    {
        return [
            DeleteAction::make()->label(''),
            EditAction::make()->label('')
        ];
    }
 
    protected function getTableBulkActions(): array
    {
        return [];
    } 

    public function render(): View
    {
        return view('livewire.stocks.index', [
            'assetMovements' => $this->assetMovements
        ]);
    }
}
