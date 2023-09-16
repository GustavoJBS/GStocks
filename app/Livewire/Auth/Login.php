<?php

namespace App\Livewire\Auth;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public string $email;

    public string $password;

    public bool $rememberMe = false;

    protected array $rules = [
        'email' => 'required|email',
        'password' => 'required',
        'rememberMe' => 'boolean'
    ];

    public function login()
    {
        $this->validate();

        if (Auth::attempt($this->only('email', 'password'), $this->rememberMe)) {
            session()->regenerate();

            return redirect(route('home'));
        }

        $this->addError('username', __('auth.failed'));
    }

    public function render(): View
    {
        return view('livewire.auth.login');
    }
}
