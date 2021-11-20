<?php

namespace App\Http\Livewire\Criarquiz;

use Livewire\Component;
use App\Models\Quiz;
use App\Models\Pergunta;
use App\Models\Categoria;
use Illuminate\Support\Facades\Auth;

class Formulario extends Component
{
    public $form_id = 0;
    public $form = [];
    public $categorias = [];
    public $categoria_id = '';
    public $disabled = true;

    public function render()
    {
        return view('livewire.criarquiz.formulario');
    }

    public function mount(){
        $this->form = [
            'quiz' => [
                'id' => 0,
                'nome_quiz' => '',
                'descricao_quiz' => '',
                'categoria_id' => '',
                'ativo' => 1,
            ],
            'perguntas' => [
                [
                    'pergunta' => '',
                    'pontuacao' => 0,
                    'resposta_a' => '',
                    'resposta_b' => '',
                    'resposta_c' => '',
                    'resposta_d' => '',
                    'resposta_certa' => '',
                ],
            ]

        ];

        $this->categorias = Categoria::get()->toArray();
    }

    public function updatedFormId($value){
        $quiz = [];

        $this->form = [
            'quiz' => [
                'id' => 0,
                'nome_quiz' => '',
                'descricao_quiz' => '',
                'categoria_id' => '',
                'ativo' => 1,
            ],
            'perguntas' => [
                [
                    'pergunta' => '',
                    'pontuacao' => 0,
                    'resposta_a' => '',
                    'resposta_b' => '',
                    'resposta_c' => '',
                    'resposta_d' => '',
                    'resposta_certa' => '',
                ],
            ]

        ];

        if($value != 0){
            $quiz = Quiz::select(
                'quiz.*',
                'quiz.id AS quiz_id',
                'pergunta.*'
            )
            ->leftJoin('pergunta', 'pergunta.quiz_id', '=', 'quiz.id')
            ->where('quiz.id', $value)
            ->get()
            ->toArray();

            $this->form = [
                'quiz' => [
                    'id' => $quiz[0]['quiz_id'],
                    'nome_quiz' => $quiz[0]['nome'],
                    'descricao_quiz' => $quiz[0]['descricao'],
                    'ativo' => $quiz[0]['ativo'],
                ],
            ];

            foreach ($quiz as $value) {

                if($value['resposta_certa_a']){
                    $resposta_certa = 'a';
                }

                if($value['resposta_certa_b']){
                    $resposta_certa = 'b';
                }

                if($value['resposta_certa_c']){
                    $resposta_certa = 'c';
                }

                if($value['resposta_certa_d']){
                    $resposta_certa = 'd';
                }

                $perguntas[] = [
                    'pergunta' => $value['pergunta'],
                    'resposta_a' => $value['resposta_a'],
                    'resposta_b' => $value['resposta_b'],
                    'resposta_c' => $value['resposta_c'],
                    'resposta_d' => $value['resposta_d'],
                    'pontuacao' => $value['pontos'],
                    'resposta_certa' => $resposta_certa,
                ];
            }

            $this->form['perguntas'] = $perguntas;
            $this->categoria_id = $quiz[0]['categoria_id'];

            $this->disabled = false;
        }

    }

    public function updatedCategoriaId($value){

        if(!empty($value)){
            $this->form['quiz']['categoria_id'] = $value;
        }
    }

    public function limparForm(){
        $this->form = [
            'quiz' => [
                'id' => 0,
                'nome_quiz' => '',
                'descricao_quiz' => '',
                'categoria_id' => '',
                'ativo' => 1,
            ],
            'perguntas' => [
                [
                    'pergunta' => '',
                    'pontuacao' => 0,
                    'resposta_a' => '',
                    'resposta_b' => '',
                    'resposta_c' => '',
                    'resposta_d' => '',
                    'resposta_certa' => '',
                ],
            ]
        ];
        $this->disabled = true;
    }

    public function adicionarPergunta(){
        $this->form['perguntas'][] = [
            'pergunta' => '',
            'pontuacao' => 0,
            'resposta_a' => '',
            'resposta_b' => '',
            'resposta_c' => '',
            'resposta_d' => '',
            'resposta_certa' => '',
        ];
    }

    public function removerPergunta($index){
        unset($this->form['perguntas'][$index]);
    }

    public function gravarQuiz(){
        $quiz = Quiz::create([
            'nome' => $this->form['quiz']['nome_quiz'],
            'descricao' => $this->form['quiz']['descricao_quiz'],
            'categoria_id' => $this->form['quiz']['categoria_id'],
            'usuario_id' => Auth::user()->id,
        ]);

        $quiz->save();

        foreach ($this->form['perguntas'] as $key => $value) {

            $resposta_certa_a = false;
            $resposta_certa_b = false;
            $resposta_certa_c = false;
            $resposta_certa_d = false;

            switch ($value['resposta_certa']) {
                case 'a':
                    $resposta_certa_a = true;
                    $resposta_certa_b = false;
                    $resposta_certa_c = false;
                    $resposta_certa_d = false;
                    break;
                case 'b':
                    $resposta_certa_a = false;
                    $resposta_certa_b = true;
                    $resposta_certa_c = false;
                    $resposta_certa_d = false;
                    break;
                case 'c':
                    $resposta_certa_a = false;
                    $resposta_certa_b = false;
                    $resposta_certa_c = true;
                    $resposta_certa_d = false;
                    break;
                case 'd':
                    $resposta_certa_a = false;
                    $resposta_certa_b = false;
                    $resposta_certa_c = false;
                    $resposta_certa_d = true;
                    break;

                default:
                break;
            }

            $pergunta = Pergunta::create([
                'pergunta' => $value['pergunta'],
                'resposta_a' => $value['resposta_a'],
                'resposta_certa_a' => $resposta_certa_a,
                'resposta_b' => $value['resposta_b'],
                'resposta_certa_b' => $resposta_certa_b,
                'resposta_c' => $value['resposta_c'],
                'resposta_certa_c' => $resposta_certa_c,
                'resposta_d' => $value['resposta_d'],
                'resposta_certa_d' => $resposta_certa_d,
                'quiz_id' => $quiz->id,
                'pontos' => $value['pontuacao'],
            ]);

            $pergunta->save();

            $pergunta = null;

        }

        $this->limparForm();

    }

    public function desativarQuiz($quiz_id){

        Quiz::where('id', $quiz_id)
        ->update([
            'ativo' => 0,
            'data_atualizacao' => date('Y-m-d H:i:s'),
        ]);

    }

    public function reativarQuiz($quiz_id){

        Quiz::where('id', $quiz_id)
        ->update([
            'ativo' => 1,
            'data_atualizacao' => date('Y-m-d H:i:s'),
        ]);

    }
}
