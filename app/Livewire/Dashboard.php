<?php

namespace App\Livewire;

use App\Facades\Services\Stocks;
use App\Models\Asset;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
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
            TextColumn::make('code'),
            TextColumn::make('assetQuantity')
                ->label('Quantidade'),
            TextColumn::make('assetValue')
                ->label('Preço')
                ->money('brl', true),
            TextColumn::make('currentBalance')
                ->label('Saldo Atual')
                ->money('brl', true),
            TextColumn::make('assetProfit')
                ->label('Rendimento')
                ->color(fn (Model $record) => match (true) {
                    $record->assetProfit > 0 => 'success',
                    $record->assetProfit < 0 => 'danger',
                    default => 'warning'
                })
                ->money('brl', true)
        ];
    }

    public function render(): View
    {
        return view('livewire.dashboard');
    }
}
