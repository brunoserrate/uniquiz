<x-app-layout>
    <div x-cloak x-data="{ modulo: 'listagem' }" x-on:modulo.window="modulo = $event.detail.modulo" class="p-5">
        <div x-show="modulo == 'listagem'">
            <livewire:criarquiz.listagem />
        </div>
        <div x-show="modulo == 'formulario' || modulo == 'editar'">
            <livewire:criarquiz.formulario />
        </div>
    </div>
</x-app-layout>