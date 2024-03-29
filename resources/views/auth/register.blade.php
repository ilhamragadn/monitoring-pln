<x-guest-layout>

    <div>
        <a href="/">
            <x-application-logo class="w-40 h-16 fill-current text-gray-500 mx-auto mb-6" />
        </a>
    </div>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="grid grid-cols-2 gap-4 mt-4">
            <div>
                <x-input-label for="role" :value="__('Choose Role')" />
                <x-select-input id="role" class="block mt-1 w-full" name="role">
                    <option value="Manager Perencanaan">Manager Perencanaan</option>
                    <option value="Manager Unit">Manager Unit</option>
                    <option value="TL Rensis">TL Rensis</option>
                    <option value="TL Teknik">TL Teknik</option>
                </x-select-input>
            </div>

            <div>
                <x-input-label for="ulp" :value="__('ULP')" />
                <x-select-input class="block mt-1 w-full" name="ulp" id="ulp">
                    <option value="ULP Bangil">ULP Bangil</option>
                    <option value="ULP Gondang Wetan">ULP Gondang Wetan</option>
                    <option value="ULP Grati">ULP Grati</option>
                    <option value="ULP Kraksaan">ULP Kraksaan</option>
                    <option value="ULP Pandaan">ULP Pandaan</option>
                    <option value="ULP Pasuruan Kota">ULP Pasuruan Kota</option>
                    <option value="ULP Prigen">ULP Prigen</option>
                    <option value="ULP Probolinggo">ULP Probolinggo</option>
                    <option value="ULP Sukorejo">ULP Sukorejo</option>
                </x-select-input>
                <x-input-error :messages="$errors->get('ulp')" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
