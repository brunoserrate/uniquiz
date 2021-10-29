<x-guest-layout>
    <div class="w-full h-full flex flex-wrap px-4 pt-4">

        <div class="w-full flex flex-col">
            <div class="flex items-center justify-center mb-5">
                <img src="img/logo_02.png" width="25%" alt="logo">
            </div>
            <div class="mb-5">
                <!-- Validation Errors -->
                <form method="POST" class="flex flex-col items-center justify-center pt-3 gap-y-5" action="{{ route('register') }}">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    @csrf
                    <div class="w-3/12">
                        <x-input id="name" name="name" type="text" placeholder="Nome *" class="w-full input input-sm rounded-full input-bordered" required />
                    </div>
                    <div class="w-3/12">
                        <x-input id="apelido" name="apelido" type="text" placeholder="Apelido" class="w-full input input-sm rounded-full input-bordered" />
                    </div>
                    <div class="w-3/12">
                        <x-input id="email" name="email" type="text" placeholder="E-mail *" class="w-full input input-sm rounded-full input-bordered" required />
                    </div>
                    <!-- <div class="w-3/12">
                        <x-input id="email_confirmation" name="email_confirmation" type="text" placeholder="Confirmar e-mail *" class="w-full input input-sm rounded-full input-bordered" required />
                    </div> -->
                    <div class="w-3/12">
                        <x-input id="password" name="password" type="password" placeholder="Senha *" class="w-full input input-sm rounded-full input-bordered" required />
                    </div>
                    <div class="w-3/12">
                        <x-input id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirmar senha *" class="w-full input input-sm rounded-full input-bordered" required />
                    </div>
                    <div class="w-3/12 flex items-center justify-end">
                        <a class="underline text-white" href="{{ route('login') }}">
                            {{ __('Já cadastrado?') }}
                        </a>
                        <button type="submit" class="ml-4 btn btn-sm btn-info rounded-full">Cadastrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</x-guest-layout>