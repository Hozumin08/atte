    <x-login-layout>
        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-text-input id="email" class="block mt-1 w-full"
                                type="email"
                                name="email" :value="old('email')"
                                required autofocus autocomplete="username"
                                placeholder="Eメールアドレス" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mt-4">

                <x-text-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password"
                                placeholder="パスワード" />

                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <div class="flex items-center justify-center mt-4">
                <x-primary-button class="block mt-1 w-full" style="background-color:blue;">
                    {{ __('ログイン') }}
                </x-primary-button>
            </div>
            <div style="text-align: center;">
                <p style="color: gray;">アカウントをお持ちでない方はこちらから</p>
            <a href ="/register" style="color: blue;">会員登録</a>
            </div>

            
        </form>
    </x-login-layout>
    