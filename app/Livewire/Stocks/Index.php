<?php

namespace App\Livewire\Stocks;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Livewire\Component;

class Index extends Component
{
    public function getAssetMovementsProperty(): Collection 
    {
        return auth()->user()->assetMovements;
    }

    public function render(): View
    {
        return view('livewire.stocks.index', [
            'assetMovements' => $this->assetMovements
        ]);
    }
}
