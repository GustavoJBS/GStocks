<?php

namespace App\Livewire;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Dashboard extends Component
{

    public function logout() {
        auth()->logout();

        redirect(route('login'));
    }
    
    public function render(): View
    {
        return view('livewire.dashboard');
    }
}
