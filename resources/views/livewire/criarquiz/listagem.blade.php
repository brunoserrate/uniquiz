<div>
    <div class="flex flex-row mb-5">
        <div class="flex-1">
            <select name="categorias" id="categorias" class="select select-bordered select-sm select-primary w-full max-w-xs">
                <option disabled="disabled" selected="selected">Filtrar categoria</option>
                <option value="todos" wire:key="todos">Todas categorias</option>
                @foreach ($categorias as $categoria)
                <option wire:key="{{ $categoria['id'] }}" value="{{ $categoria['id'] }}">{{ $categoria['nome'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex-none justify-end">
            <button x-on:click="$dispatch('modulo', {modulo: 'formulario'})" class="uni-btn-success">
                <span class="fas fa-plus mr-3"></span>
                Criar quiz
            </button>
        </div>
    </div>
    <div>
        <table class="table w-full table-zebra table-compact">
            <thead>
                <tr>
                    <th>Nome do quiz</th>
                    <th>Categoria</th>
                    <th>Dt. Criação</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($quizzes as $quiz)
                <tr>
                    <td>{{ $quiz['nome'] }}</td>
                    <td>{{ $quiz['categoria_nome'] }}</td>
                    <td>{{ $quiz['data_criacao_formatado'] }}</td>
                    <td class="w-2">
                        <button x-on:click="$dispatch('modulo', {modulo: 'editar', formid: '{{$quiz['id']}}' })" class="btn btn-circle btn-sm">
                            <span class="fas fa-edit"></span>
                        </button>
                    </td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>

</div>