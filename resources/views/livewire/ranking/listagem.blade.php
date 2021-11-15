<div class="p-5">
    <div class="flex flex-row mb-5">
        <div class="flex-1">
            <select wire:model="quiz_id" name="quizzes" id="quizzes" class="select select-bordered select-sm select-primary w-full max-w-xs">
                <option value="" disabled >Escolha um quiz</option>
                @foreach ($quizzes as $quiz)
                <option wire:key="{{ $quiz['id'] }}" value="{{ $quiz['id'] }}">{{ $quiz['nome'] }}</option>
                @endforeach
            </select>
        </div>
        <div class="flex-none justify-end">
            <button class="uni-btn-primary mr-3">
                <span class="fas fa-arrow-left mr-3"></span>
                Voltar
            </button>
        </div>
    </div>
    @if (!empty($quiz_id))
    <div>
        <table class="table w-full table-zebra table-compact">
            <thead>
                <tr>
                    <th>Ranking</th>
                    <th>Usuário</th>
                    <th>Pontuação final</th>
                    <th>Dt. Respondida</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($ranking['ranking'] as $rank)
                <tr>
                    <td>{{ $posicao++ }}</td>
                    <td>{{ $rank['nome'] }}</td>
                    <td>{{ $rank['pontuacao'] }} / {{ $ranking['pontuacao_maxima'] }}</td>
                    <td>{{ $rank['data_criacao_formatado'] }}</td>
                </tr>
                @empty
                @endforelse
            </tbody>
        </table>
    </div>
    @endif
</div>