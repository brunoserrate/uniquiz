<div style="text-align: center">
    <div>
        <p class="bg-green-600 text-white {{ Session::get('success') }}">{{ Session::get('success') }}</p>
        <p class="bg-red-600 text-white {{ Session::get('error') }}">{{ Session::get('error') }}</p>
    </div>
    @if (!$finalizado)
    <div class="row">
        <div class="col">
            <h1>{{ $questionario_index + 1 }}º pergunta</h1>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <h3>{{ $questionario[$questionario_index]['pergunta'] }}</h3>
        </div>
    </div>
    <div class="row" style="
        width: 100%;
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        grid-template-rows: repeat(auto-fill, 30px);
        grid-row-gap: .5em;
        grid-column-gap: 0em;
    ">
        @foreach($respostas as $index => $resp)
        <div class="col">
            <input type="radio" wire:model="resposta" name="resposta" value="{{$index}}">{{ $index }} - {{ $resp['texto'] }}
        </div>
        @endforeach
    </div>
    @else
    <div class="row">
        <div class="col">
            <h2>Questinário finalizado!</h2>
            <h3>Você fez: <strong>{{ $pontos }} ponto(s)</strong></h3>
        </div>
    </div>
    @endif
    @if (!$finalizado)
    <div class="row">
        <div class="col">
            @if (!$respondido)
            <button wire:click="responder">Responder</button>
            @else
            <button wire:click="proximaPergunta">Próxima pergunta</button>
            @endif
        </div>
    </div>
    @else
    <div class="row">
        <div class="col">
            <button wire:click="reiniciar">Reiniciar</button>
        </div>
    </div>
    @endif
</div>