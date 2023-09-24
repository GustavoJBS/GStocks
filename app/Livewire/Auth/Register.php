<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\User as FormsUser;
use App\Models\User;
use Livewire\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Livewire\Attributes\Rule;

class Register extends Component
{
    public ?string $name = null;
    public ?string $email = null;
    public ?string $password = null;
    public ?string $passwordConfirmation = null;

    protected function rules(): array
    {
        return [
            'name' => ['required', 'min:5'],
            'email' => ['required', 'unique:users,email'],
            'password'             => ['required', 'string', Password::defaults()],
            'passwordConfirmation' => ['required', 'same:password'],
        ];
    }

    public function register(): Redirector | RedirectResponse
    {
        $this->validate();

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password)
        ]);

        Auth::loginUsingId($user->id);

        return redirect(route('home'));
    }

    public function navigateToLogin(): Redirector | RedirectResponse
    {
        return redirect(route('login'));
    }

    public function render(): View
    {
        return view('livewire.auth.register')
            ->layout('components.layouts.auth');
        ;
    }
}
