<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-text-input
            id="name"
            class="block mt-1 w-full"
            type="text"
            name="name" :value="old('name')"
            required autofocus autocomplete="name"
            placeholder="名前" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-text-input
                id="email"
                class="block mt-1 w-full" 
                type="email" 
                name="email" :value="old('email')" 
                required autocomplete="username"
                placeholder="Eメールアドレス" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-text-input
                id="password"
                class="block mt-1 w-full"
                type="password"
                name="password"
                required autocomplete="new-password" 
                placeholder="パスワード"/>

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-text-input
                id="password_confirmation"
                class="block mt-1 w-full"
                type="password"
                name="password_confirmation"
                required autocomplete="new-password"
                placeholder="確認用パスワード" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-center mt-4">
            <x-primary-button class="block mt-1 w-full" style="background-color:blue;">
                {{ __('会員登録') }}
            </x-primary-button>
        </div>
        <div style="text-align: center;">
            <p style="color: gray;">アカウントをお持ちの方はこちらから</p>
            <a href ="/login" style="color: blue;">ログイン</a>
        </div>

    </form>
</x-guest-layout>
