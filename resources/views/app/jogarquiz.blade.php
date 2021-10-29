<x-app-layout>
    <div class="m-4">

        <select name="quizzes" id="quizzes" class="select select-bordered select-primary w-full max-w-xs">
            <option disabled="disabled" selected="selected">Escolha um quiz</option>
            @foreach ($quizzes as $quiz)
            <option value="{{ $quiz['nome'] }}">{{ $quiz['nome'] }}</option>
            @endforeach
        </select>
    </div>
</x-app-layout>
