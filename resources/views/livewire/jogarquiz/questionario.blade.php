<div style="text-align: center" x-data="{ quizid: @entangle('quiz_id') }" x-on:modulo.window="quizid = $event.detail.quizid">
@if (true)
    @if (!empty($quiz_id))
    <div class="mb-4">
        <p class="bg-green-600 text-white {{ Session::get('success') }}">{{ Session::get('success') }}</p>
        <p class="bg-red-600 text-white {{ Session::get('error') }}">{{ Session::get('error') }}</p>
    </div>
    @if (!$finalizado)
    <div class="row bg-blue-200 p-8 shadow-md font-black mb-8 mx-40">
        <div class="col">
            <p class="text-2xl">{{ $questionario_index + 1 }} / {{ $questionario_tamanho }} pergunta(s)</p></br>
            <p class="text-4xl">{{ $questionario[$questionario_index]['pergunta'] }}</p>
        </div>
    </div>
    <div class="row mb-8" style="
        width: 100%;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: repeat(auto-fill, 80px);
        grid-row-gap: .5em;
        grid-column-gap: 0em; "
        class="" >
        @foreach($respostas as $index => $resp)
        <div class="col px-40 mt-auto">
            <input class="hidden" id="resposta_{{$index}}" type="radio" wire:model="resposta" name="resposta" value="{{$index}}">
			<label class="flex flex-rows border-4 rounded-md border-uni_info-dark bg-uni_info-dark cursor-pointer label-checked:bg-uni_info-light label-checked:border-uni_info-light" for="resposta_{{$index}}">
                <span class="flex justify-center items-center w-28 text-3xl font-black text-white">{{ $index }}</span>
                <p class="p-2 bg-white font-black text-lg rounded-r-md w-full">{{ $resp['texto'] }}</p>
			</label>
        </div>
        @endforeach
    </div>
    @else
    <div class="row">
        <div class="col">
            <p class="font-semibold text-3xl mb-2">Questinário finalizado!</p>
            <p class="text-4xl mb-4">Você fez: <span class="font-black">{{ $pontos }} ponto(s)</span></p>
        </div>
    </div>
    @endif
    @if (!$finalizado)
    <div class="row">
        <div class="col">
            @if (!$respondido)
            <button class="uni-btn-primary-md" wire:click="responder">Responder</button>
            @else
            <button class="uni-btn-primary-md" wire:click="proximaPergunta">Próxima pergunta</button>
            @endif
        </div>
    </div>
    @else
    <div class="row">
        <div class="col">
            <button class="uni-btn-primary-md w-48" wire:click="reiniciar">Reiniciar</button>
            <button class="uni-btn-success-md ml-4 w-48" wire:click="finalizarQuiz" x-on:click="$dispatch('modulo', {modulo: 'listagem'})">Finalizar</button>
        </div>
    </div>
    @endif
    @endif
@endif

</div>