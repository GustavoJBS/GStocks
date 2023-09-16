<div class="flex min-h-full">
    <div class="flex flex-col justify-center p-8 w-full sm:max-w-md gap-4">
        <img class="w-72 mx-auto" src="{{ asset('img/logo.png') }}" />

        <x-input
            right-icon="mail"
            label="E-Mail"
            placeholder="your e-mail address"
            wire:model='email'
        />

        <x-input
            type="password"
            label="Password"
            wire:model='password'
            placeholder="your password"
        />

        <x-toggle
            label="Remember Me"
            wire:model="rememberMe"
        />

        <div class="flex gap-3 mt-4 w-full">
            <x-button primary class="w-full" wire:click='login'>
                Login
            </x-button>

            <x-button outline primary class="w-full">
                Register
            </x-button>
        </div>
    </div>

    <div class="relative hidden w-0 flex-1 sm:block">
        <img
            class="absolute inset-0 h-full w-full object-cover"
            src="{{ asset('img/login-background.png') }}"
        />
    </div>
</div>
