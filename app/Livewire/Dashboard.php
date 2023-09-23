<?php

namespace App\Livewire;

use App\Facades\Services\Stocks;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class Dashboard extends Component
{
    public function mount () {
        dd(Stocks::getHistoricalPrice('B3SA3'));
    }

    public function logout() {
        auth()->logout();

        redirect(route('login'));
    }
    
    public function render(): View
    {
        return view('livewire.dashboard');
    }
}
