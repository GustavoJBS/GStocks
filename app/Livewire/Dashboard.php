<?php

namespace App\Livewire;

use App\Facades\Services\Stocks;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Dashboard extends Component
{
    public function mount () {
        // dd(Stocks::getHistoricalPrice('MXRF11'));
    }
    
    public function render(): View
    {
        return view('livewire.dashboard');
    }
}
