<div class="flex min-h-full">
    <div class="flex flex-col justify-center p-4 w-full sm:max-w-md gap-4">
        <x-input
            right-icon="mail"
            label="E-Mail"
            placeholder="your e-mail address"
            wire:click='email'
        />

        <x-inputs.password label="Secret 🙈" value="I love WireUI ❤️" />

        <div class="flex gap-3 mt-4 w-full">
            <x-button class="w-full">
                Login
            </x-button>

            <x-button class="w-full">
                Register
            </x-button>
        </div>
    </div>

    <div class="relative hidden w-0 flex-1 lg:block">
        <img
            class="absolute inset-0 h-full w-full object-cover"
            src="{{ asset('img/login-background.png') }}"
        />
    </div>
</div>
