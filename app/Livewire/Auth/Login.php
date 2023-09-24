<?php

namespace App\Livewire\Auth;

use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
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

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->rememberMe)) {
            session()->regenerate();

            return redirect(route('home'));
        }

        $this->addError('email', __('auth.failed'));
    }

    public function navigateToRegister(): Redirector | RedirectResponse
    {
        return redirect(route('register'));
    }

    public function render(): View
    {
        return view('livewire.auth.login')
            ->layout('components.layouts.auth');
    }
}
