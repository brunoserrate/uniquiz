<div x-data="{ formtype: 'criar' , formid: @entangle('form_id') }" x-on:modulo.window="formid = $event.detail.formid, formtype = ($event.detail.modulo == 'editar' )? 'editar': 'criar' ">
    <div class="flex flex-col mb-5">
        <div class="flex flex-row w-full justify-end">
            <button x-on:click="$dispatch('modulo', {modulo: 'listagem'})" wire:click="limparForm" class="uni-btn-primary mr-3">
                <span class="fas fa-arrow-left mr-3"></span>
                Voltar
            </button>
            <button x-show="formtype == 'editar' " class="uni-btn-error mr-3">
                <span class="fas fa-times mr-3"></span>
                Desativar
            </button>
            <button class="uni-btn-success">
                <span class="fas fa-save mr-3"></span>
                Gravar
            </button>
        </div>
        <div class="w-full">
            <form action="" method="post">
                <div>
                    <label class="label">
                        <span class="label-text">Nome do quiz *</span>
                    </label>
                    <x-input id="nome_quiz" class="input input-bordered input-sm w-full mb-3" type="text" name="nomequiz" placeholder="Nome do quiz *" required />
                </div>
                <div>
                    <label class="label">
                        <span class="label-text">Descrição do quiz *</span>
                    </label>
                    <x-input id="descricao_quiz" class="input input-bordered input-sm w-full mb-3" type="text" name="descricao_quiz" placeholder="Descrição do quiz *" required />
                </div>
                <div>
                    <select {{ ($disabled) ? '' : 'disabled' }} name="categorias" id="categorias" class="select select-bordered select-sm select-primary w-full mb-3">
                        @if (empty($form['quiz']['categoria_id']))
                        <option disabled="disabled" selected="selected">Escolha uma categoria</option>
                        @endif
                        @foreach ($categorias as $categoria)
                        @if (!empty($form['quiz']['categoria_id']))
                        <option value="{{ $categoria['id'] }}" selected="selected">{{ $categoria['nome'] }}</option>
                        @else
                        <option value="{{ $categoria['id'] }}">{{ $categoria['nome'] }}</option>
                        @endif
                        @endforeach

                    </select>
                </div>
                <div class="flex justify-end w-full">
                    <button class="uni-btn-success mb-3">
                        <span class="fas fa-plus mr-3"></span>
                        Adicionar pergunta
                    </button>
                </div>
                <div class="collapse w-full border rounded-box border-base-100 collapse-arrow">
                    <input type="checkbox">
                    <div class="collapse-title text-xl font-medium">
                        Pergunta: Variavel da pergunta
                    </div>
                    <div class="collapse-content">
                        <div>
                            <label for="pergunta_00" class="label">
                                <span class="label-text">Pergunta *</span>
                            </label>
                            <div class="flex flex-row">
                                <x-input id="pergunta_00" class="input input-bordered input-sm w-full mb-3 mr-3" type="text" name="pergunta_00" placeholder="Pergunta *" required />
                                <button class="uni-btn-error">
                                    <span class="fas fa-times mr-3"></span>
                                    Remover pergunta
                                </button>
                            </div>
                        </div>
                        <div>
                            <label class="label">
                                <span class="label-text">Pontuação *</span>
                            </label>
                            <x-input id="pontuacao_00" class="input input-bordered input-sm w-full mb-3" type="number" name="pontuacao_00" placeholder="Pontuação *" required />
                        </div>

                        <!--  -->
                        <div>
                            <label class="label">
                                <span class="label-text">Resposta *</span>
                            </label>
                            <div class="flex flex-row">
                                <x-input id="resposta_a_00" class="input input-bordered input-sm w-full mb-3 mr-3" type="text" name="resposta_a_00" placeholder="Resposta *" required />
                                <label class="w-44 cursor-pointer label">
                                    <input type="radio" name="opt" checked="checked" class="radio" value="">
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
                                <x-input id="resposta_a_00" class="input input-bordered input-sm w-full mb-3 mr-3" type="text" name="resposta_a_00" placeholder="Resposta *" required />
                                <label class="w-44 cursor-pointer label">
                                    <input type="radio" name="opt" checked="checked" class="radio" value="">
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
                                <x-input id="resposta_a_00" class="input input-bordered input-sm w-full mb-3 mr-3" type="text" name="resposta_a_00" placeholder="Resposta *" required />
                                <label class="w-44 cursor-pointer label">
                                    <input type="radio" name="opt" checked="checked" class="radio" value="">
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
                                <x-input id="resposta_a_00" class="input input-bordered input-sm w-full mb-3 mr-3" type="text" name="resposta_a_00" placeholder="Resposta *" required />
                                <label class="w-44 cursor-pointer label">
                                    <input type="radio" name="opt" checked="checked" class="radio" value="">
                                    <span class="label-text">Resposta certa</span>
                                </label>
                            </div>
                        </div>
                        <!--  -->


                    </div>
                </div>

            </form>
        </div>
    </div>
</div>