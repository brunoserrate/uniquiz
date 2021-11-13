<x-guest-layout>
    <div class="w-full flex flex-wrap px-4 pt-4">

        <div class="w-full flex flex-col">
            <div class="flex items-center justify-center mb-5">
                <img src="../img/logo_02.png" width="25%" alt="logo">
            </div>
            <div class="mb-5">
                <form method="POST" class="flex flex-col items-center justify-center pt-3 gap-y-5" action="{{ route('password.update') }}">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    @csrf
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <!-- Email Address -->
                    <div class="w-3/12">
                        <x-input id="email" class="w-full input input-sm rounded-full input-bordered" placeholder="E-mail *" type="email" name="email" required autofocus />
                    </div>

                    <!-- Password -->
                    <div class="w-3/12">
                        <x-input id="password" class="w-full input input-sm rounded-full input-bordered" placeholder="Senha *"  type="password" name="password" required />
                    </div>

                    <!-- Confirm Password -->
                    <div class="w-3/12">
                        <x-input id="password_confirmation" class="w-full input input-sm rounded-full input-bordered" placeholder="Confirmar senha *"  type="password" name="password_confirmation" required />
                    </div>

                    <div class="w-3/12 flex items-center justify-end">
                        <button type="submit" class="uni-btn-primary rounded-full w-full">
                            {{ __('Redefinir senha') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>