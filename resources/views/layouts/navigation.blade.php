<nav x-data="{ open: false }" class="navbar shadow-lg bg-uni_primary text-neutral-content">
    <div class="flex-none px-2 mx-2">
        <span class="w-16 h-10 flex flex-1 items-center justify-center">
            <a href="{{ route('inicio') }}">
                <img src="../img/logo_menu.png" width="100%" alt="logo">
            </a>
        </span>
    </div>
    <div class="flex-1 px-2 mx-2">
        <div class="items-stretch hidden lg:flex gap-x-2">
            <a class="btn btn-ghost btn-sm rounded-btn {{ ($params == 'inicio') ? 'btn-active' : '' }}" href="{{ route('inicio') }}">
                <span class="fas fa-home mr-2"></span>
                Início
            </a>
            <a class="btn btn-ghost btn-sm rounded-btn {{ ($params == 'jogarquiz') ? 'btn-active' : '' }}" href="{{ route('jogarquiz') }}">
                <span class="fas fa-question mr-2"></span>
                Quiz (jogar)
            </a>
            <a class="btn btn-ghost btn-sm rounded-btn {{ ($params == 'criarquiz') ? 'btn-active' : '' }}" href="{{ route('criarquiz') }}">
                <span class="fas fa-file-medical mr-2"></span>
                Criar quiz
            </a>
            <a class="btn btn-ghost btn-sm rounded-btn {{ ($params == 'ranking') ? 'btn-active' : '' }} " href="{{ route('ranking') }}">
                <span class="fas fa-crown mr-2"></span>
                Ranking
            </a>
        </div>
    </div>
    <div class="flex-none">
        <div class="dropdown dropdown-end">
            <div class="avatar">
                <livewire:avatar />
            </div>
            <ul tabindex="0" class="p-2 shadow menu dropdown-content bg-base-100 text-uni_primary rounded-box w-52">
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Sair') }}
                        </x-responsive-nav-link>

                    </form>
                </li>
            </ul>
        </div>
    </div>
</nav>