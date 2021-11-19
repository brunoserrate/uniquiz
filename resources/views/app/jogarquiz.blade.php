<x-app-layout>
    <div x-cloak x-data="{ modulo: 'listagem' }" x-on:modulo.window="modulo = $event.detail.modulo" class="p-5">
        <div x-show="modulo == 'listagem'">
            <livewire:jogarquiz.listagem />
        </div>
        <div x-show="modulo == 'questionario'">
            <livewire:jogarquiz.questionario />
        </div>
    </div>
</x-app-layout>