<?php

namespace App\Livewire\Auth;

use Illuminate\Contracts\View\View;
use Livewire\Component;

class Login extends Component
{
    public string $email;

    public string $password;

    protected array $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];

    public function render(): View
    {
        return view('livewire.auth.login');
    }
}
