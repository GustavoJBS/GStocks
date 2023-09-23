<?php

namespace App\Livewire\Stocks;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Index extends Component
{
    public function render(): View
    {
        return view('livewire.stocks.index');
    }
}
