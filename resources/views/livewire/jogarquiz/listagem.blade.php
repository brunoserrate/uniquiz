<div>
    <div class="flex flex-row mb-5">
        <select wire:model="quiz_id" name="quizzes" id="quizzes" class="select select-bordered select-sm select-primary w-full max-w-xs">
            <option value="" disabled >Escolha um quiz</option>
            @foreach ($quizzes as $quiz)
            <option wire:key="{{ $quiz['id'] }}" value="{{ $quiz['id'] }}">{{ $quiz['nome'] }}</option>
            @endforeach
        </select>
        @if (!empty($quiz_id))
        <button x-on:click="$dispatch('modulo', {modulo: 'questionario', 'quizid': '{{ $quiz_id }}' })" class="uni-btn-success ml-3">
            <span class="fas fa-play mr-3"></span>
            Jogar
        </button>
        @endif
    </div>
</div>