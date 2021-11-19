<div x-data="{ formtype: 'criar' , formid: @entangle('form_id') }" x-on:modulo.window="formid = $event.detail.formid, formtype = ($event.detail.modulo == 'editar' )? 'editar': 'criar' ">
    <form>
        <p class="bg-red-600 text-white {{ Session::get('error') }}">{{ Session::get('error') }}</p>
        <div class="flex flex-col mb-5">
            <div class="flex flex-row w-full justify-end">
                <button x-on:click="$dispatch('modulo', {modulo: 'listagem'})" wire:click="limparForm" class="uni-btn-primary mr-3">
                    <span class="fas fa-arrow-left mr-3"></span>
                    Voltar
                </button>

                @if ($form['quiz']['ativo'] == 1)
                <button x-on:click="$dispatch('modulo', {modulo: 'listagem'})" wire:click="desativarQuiz({{ $form['quiz']['id'] }})" x-show="formtype == 'editar'" class="uni-btn-error">
                    <span class="fas fa-times mr-3"></span>
                    Desativar
                </button>
                @elseif ($form['quiz']['ativo'] == 0)
                <button x-on:click="$dispatch('modulo', {modulo: 'listagem'})" wire:click="reativarQuiz({{ $form['quiz']['id'] }})" x-show="formtype == 'editar'" class="uni-btn-success">
                    <span class="fas fa-redo mr-3"></span>
                    Reativar
                </button>
                @endif
                <button type="submit" x-on:click="$dispatch('modulo', {modulo: 'listagem'})" x-show="formtype != 'editar'" wire:click="gravarQuiz" class="uni-btn-success">
                    <span class="fas fa-save mr-3"></span>
                    Gravar
                </button>
            </div>
            <div class="w-full">
                <div>
                    <label class="label">
                        <span class="label-text">Nome do quiz *</span>
                    </label>
                    <x-input id="nome_quiz" class="input input-bordered input-sm w-full mb-3" type="text" name="nomequiz" placeholder="Nome do quiz *" wire:model="form.quiz.nome_quiz" required />
                </div>
                <div>
                    <label class="label">
                        <span class="label-text">Descrição do quiz *</span>
                    </label>
                    <x-input id="descricao_quiz" class="input input-bordered input-sm w-full mb-3" type="text" name="descricao_quiz" placeholder="Descrição do quiz *" wire:model="form.quiz.descricao_quiz" required />
                </div>
                <div>
                    <select {{ ($disabled) ? '' : 'disabled' }} class="select select-bordered select-sm select-primary w-full mb-3" name="categoria_id" id="categoria_id" wire:model.lazy="categoria_id">
                        @if (empty($form['quiz']['categoria_id']))
                        <option disabled="disabled" selected="selected" wire:key="" value="">Escolha uma categoria</option>
                        @endif
                        @foreach ($categorias as $categoria)
                        <option wire:key="{{  $categoria['id'] }}" value="{{ $categoria['id'] }}">{{ $categoria['nome'] }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="flex justify-end w-full">
                    <button type="button" wire:click="adicionarPergunta" class="uni-btn-success mb-3">
                        <span class="fas fa-plus mr-3"></span>
                        Adicionar pergunta
                    </button>
                </div>

                @foreach ($form['perguntas'] as $key => $input)
                <div class="collapse w-full border rounded-box border-base-300 collapse-arrow mb-3">
                    <input type="checkbox">
                    <div class="collapse-title text-xl font-medium">
                        Pergunta: {{ $input['pergunta'] }}
                    </div>
                    <div class="collapse-content">
                        <div>
                            <label class="label">
                                <span class="label-text">Pergunta *</span>
                            </label>
                            <div class="flex flex-row">
                                <x-input id="pergunta_{{$key}}" class="input input-bordered input-sm w-full mb-3 mr-3" type="text" name="pergunta_{{$key}}" placeholder="Pergunta *" wire:model="form.perguntas.{{$key}}.pergunta" required />
                                <button type="button" wire:click="removerPergunta({{ $key }})" class="uni-btn-error">
                                    <span class="fas fa-times mr-3"></span>
                                    Remover pergunta
                                </button>
                            </div>
                        </div>
                        <div>
                            <label class="label">
                                <span class="label-text">Pontuação *</span>
                            </label>
                            <x-input id="pontuacao_{{$key}}" class="input input-bordered input-sm w-full mb-3" type="number" name="pontuacao_{{$key}}" wire:model="form.perguntas.{{$key}}.pontuacao" placeholder="Pontuação *" required />
                        </div>

                        <!--  -->
                        <div>
                            <label class="label">
                                <span class="label-text">Resposta *</span>
                            </label>
                            <div class="flex flex-row">
                                <x-input id="resposta_a_{{$key}}" class="input input-bordered input-sm w-full mb-3 mr-3" type="text" name="resposta_a_{{$key}}" placeholder="Resposta *" wire:model="form.perguntas.{{$key}}.resposta_a" required />
                                <label class="w-44 cursor-pointer label">
                                    <input type="radio" name="resposta_certa_{{$key}}" wire:model="form.perguntas.{{$key}}.resposta_certa" {{ ($input['resposta_certa']) == 'a' ? 'checked' : '' }} class="radio" value="a" required>
                                    <span class="label-text">Resposta certa</span>
                                </label>
                            </div>
                        </div>
                        <!--  -->

                        <!--  -->
                        <div>
                            <label class="label">
                                <span class="label-text">Resposta *</span>
                            </label>
                            <div class="flex flex-row">
                                <x-input id="resposta_b_{{$key}}" class="input input-bordered input-sm w-full mb-3 mr-3" type="text" name="resposta_b_{{$key}}" placeholder="Resposta *" wire:model="form.perguntas.{{$key}}.resposta_b" required />
                                <label class="w-44 cursor-pointer label">
                                    <input type="radio" name="resposta_certa_{{$key}}" wire:model="form.perguntas.{{$key}}.resposta_certa" {{ ($input['resposta_certa']) == 'b' ? 'checked' : '' }} class="radio" value="b" required>
                                    <span class="label-text">Resposta certa</span>
                                </label>
                            </div>
                        </div>
                        <!--  -->

                        <!--  -->
                        <div>
                            <label class="label">
                                <span class="label-text">Resposta *</span>
                            </label>
                            <div class="flex flex-row">
                                <x-input id="resposta_c_{{$key}}" class="input input-bordered input-sm w-full mb-3 mr-3" type="text" name="resposta_c_{{$key}}" placeholder="Resposta *" wire:model="form.perguntas.{{$key}}.resposta_c" required />
                                <label class="w-44 cursor-pointer label">
                                    <input type="radio" name="resposta_certa_{{$key}}" wire:model="form.perguntas.{{$key}}.resposta_certa" {{ ($input['resposta_certa']) == 'c' ? 'checked' : '' }} class="radio" value="c" required>
                                    <span class="label-text">Resposta certa</span>
                                </label>
                            </div>
                        </div>
                        <!--  -->

                        <!--  -->
                        <div>
                            <label class="label">
                                <span class="label-text">Resposta *</span>
                            </label>
                            <div class="flex flex-row">
                                <x-input id="resposta_d_{{$key}}" class="input input-bordered input-sm w-full mb-3 mr-3" type="text" name="resposta_d_{{$key}}" placeholder="Resposta *" wire:model="form.perguntas.{{$key}}.resposta_d" required />
                                <label class="w-44 cursor-pointer label">
                                    <input type="radio" name="resposta_certa_{{$key}}" wire:model="form.perguntas.{{$key}}.resposta_certa" {{ ($input['resposta_certa']) == 'd' ? 'checked' : '' }} class="radio" value="d" required>
                                    <span class="label-text">Resposta certa</span>
                                </label>
                            </div>
                        </div>
                        <!--  -->


                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </form>
</div>