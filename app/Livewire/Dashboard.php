<?php

namespace App\Livewire;

use App\Facades\Services\Stocks;
use App\Models\Asset;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;

class Dashboard extends Component implements HasTable
{
    use InteractsWithTable; 
    
    protected function isTablePaginationEnabled(): bool
    {
        return false;
    }

    protected function getTableQuery(): Builder
    {
        return Asset::query()->whereHas('movements');
    }

    protected function getTableColumns(): array 
    {
        return [  
            TextColumn::make('name'),
            TextColumn::make('code'),
            TextColumn::make('assetQuantity')
                ->label('Quantidade'),
            TextColumn::make('assetValue')
                ->label('Preço')
                ->money('brl', true)
        ];
    }
    
    public function render(): View
    {
        return view('livewire.dashboard');
    }
}
