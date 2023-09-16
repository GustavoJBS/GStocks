<div class="flex min-h-full">
    <div class="relative hidden w-0 flex-1 sm:block">
        <img
            class="absolute inset-0 h-full w-full object-cover"
            src="{{ asset('img/login-background.png') }}"
        />
    </div>

    <div class="flex flex-col justify-center p-8 w-full sm:max-w-md gap-4">
        <img class="w-72 mx-auto" src="{{ asset('img/logo.png') }}" />

        <x-input
            right-icon="user"
            label="Name"
            placeholder="Your name"
            wire:model='name'
        />
        
        <x-input
            right-icon="mail"
            label="E-Mail"
            placeholder="Your e-mail address"
            wire:model='email'
        />

        <x-input
            type="password"
            label="Password"
            wire:model='password'
            placeholder="Your password"
        />

        <x-input
            type="password"
            label="Confirm Password"
            wire:model='passwordConfirmation'
            placeholder="Confirm your password"
        />

        <div class="flex gap-3 mt-4 w-full">
            <x-button
                primary
                class="w-full"
                wire:click='register'
            >
                Register
            </x-button>

            <x-button
                outline
                primary
                class="w-full"
                wire:click='navigateToLogin'
            >
                Login
            </x-button>
        </div>
    </div>
</div>
