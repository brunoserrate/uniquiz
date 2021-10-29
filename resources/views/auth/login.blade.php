<x-guest-layout>
    <div class="w-full h-screen flex flex-wrap px-4 pt-4">
        <div class="w-full md:w-1/2 flex flex-col pb-4">
            <div class="flex items-center justify-center">
                <img src="img/logo.png" width="75%" alt="logo">
            </div>
            <div class="text-center text-white px-6">
                Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Ullam itaque incidunt facilis nesciunt dolorum necessitatibus, fugiat neque vitae est, deleniti asperiores
                in odio ratione.
                Incidunt odit soluta dolores perferendis facere!
            </div>
        </div>

        <div class="md:w-1/2 flex flex-col pb-4">
            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <!-- Session Status -->
                <x-auth-session-status class="mb-4" :status="session('status')" />

                <!-- Validation Errors -->
                <x-auth-validation-errors class="mb-4" :errors="$errors" />
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <!-- Email Address -->
                    <div>
                        <x-input id="email" type="email" name="email" placeholder="E-mail" required class="p-2 px-3 w-full rounded-full input-bordered" />
                    </div>

                    <!-- Password -->
                    <div class="mt-2">
                        <x-input id="password" class="p-2 px-3 w-full rounded-full input-bordered" type="password" name="password" required autocomplete="current-password" :value="__('Password')" />
                    </div>
                    <!-- Remember Me -->
                    <div class="block mt-2 ml-2">
                        <label for="remember_me" class="inline-flex items-center">
                            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                            <span class="ml-2 text-sm text-white">{{ __('Lembrar-me') }}</span>
                        </label>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-sm bg-uni_info border border-transparent hover:bg-uni_info-light active:bg-uni_info-dark rounded-full w-full">
                            Entrar
                        </button>
                    </div>
                    <div class="grid grid-flow-col gap-3 mt-2">
                        <a class="btn btn-sm border border-transparent hover:bg-uni_info-light active:bg-uni_info-dark bg-uni_info rounded-full w-full" href="{{ route('register') }}" >Criar conta</a>

                        @if (Route::has('password.request'))
                        <a class="btn btn-sm border border-transparent hover:bg-uni_info-light active:bg-uni_info-dark bg-uni_info rounded-full w-full" href="{{ route('password.request') }}">
                            {{ __('Esqueceu a senha?') }}
                        </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>

</x-guest-layout>