<?php

namespace App\Http\Livewire\Jogarquiz;

use Livewire\Component;
use App\Models\Quiz;
use App\Models\Ranking;
use Illuminate\Support\Facades\Auth;

class Questionario extends Component
{
    // Front
    public $quiz_id = 0;
    public $questionario = [];
    public $questionario_index = 0;
    public $questionario_tamanho = 0;
    public $respostas = [];
    public $resposta = '';
    public $respondido = false;
    public $pontos = 0;
    public $pontos_totais = 0;
    public $finalizado = false;
    public $tentativas = 0;
    // Front

    // Página
    public function mount() {
    }

    public function updatedQuizId($quizId){
        $quiz = [];
        $result = Quiz::select(
            'quiz.*',
            'quiz.id AS quiz_id',
            'pergunta.*'
        )
        ->leftJoin('pergunta', 'pergunta.quiz_id', '=', 'quiz.id')
        ->where('quiz.id', $quizId)
        ->get()
        ->toArray();

        foreach ($result as $value) {
            $this->pontos_totais += $value['pontos'];

            $quiz[] = [
                'pergunta' => $value['pergunta'],
                'pontos' => $value['pontos'],
                'respostas' => [
                    [
                        'texto' => $value['resposta_a'], // String
                        'certa' => $value['resposta_certa_a'] // Boolean
                    ],
                    [
                        'texto' => $value['resposta_b'], // String
                        'certa' => $value['resposta_certa_b'] // Boolean
                    ],
                    [
                        'texto' => $value['resposta_c'], // String
                        'certa' => $value['resposta_certa_c'] // Boolean
                    ],
                    [
                        'texto' => $value['resposta_d'], // String
                        'certa' => $value['resposta_certa_d'] // Boolean
                    ]
                ]
            ];

        }

        if(!empty($quiz)){
            $this->questionario = $this->embaralharPerguntas($quiz);

            $this->reiniciar();

            $this->questionario_tamanho = count($this->questionario);
            $this->respostas = $this->shuffle(
                $this->questionario[$this->questionario_index]['respostas']
            );
        }
    }

    public function render()
    {
        return view('livewire.jogarquiz.questionario');
    }

    public function shuffle($array)
    {
        $m = count($array) - 1;
        $t = 0;
        $i = '';
        $tratado = [];
        $sigla = 'A';

        while ($m) {
            $i = floor(rand(0, 1) * $m--);

            $t = $array[$m];
            $array[$m] = $array[$i];
            $array[$i] = $t;
        }

        foreach ($array as $v) {
            $tratado[$sigla] = $v;
            $sigla++;
        }

        return $tratado;
    }

    public function embaralharPerguntas($array)
    {
        $m = count($array) - 1;
        $t = 0;
        $i = '';

        while ($m) {
            $i = floor(rand(0, 1) * $m--);

            $t = $array[$m];
            $array[$m] = $array[$i];
            $array[$i] = $t;
        }

        return $array;
    }

    public function responder()
    {
        $this->respondido = true;

        if ($this->respostas[$this->resposta]['certa']) {
            $this->pontos += $this->questionario[$this->questionario_index]['pontos'];
            session()->flash('success', 'Resposta correta');
        } else {
            session()->flash('error', 'Resposta incorreta');
        }
    }

    public function proximaPergunta()
    {
        $this->questionario_index++;

        if ($this->questionario_index < $this->questionario_tamanho) {
            $this->respondido = false;
            $this->resposta = '';

            $this->respostas = $this->shuffle(
                $this->questionario[$this->questionario_index]['respostas']
            );
        } else {
            session()->flash('success', 'Fim do Quizz!');
            $this->finalizado = true;
        }
    }

    public function reiniciar()
    {
        $this->respondido = false;
        $this->pontos = 0;
        $this->resposta = '';
        $this->questionario_index = 0;
        $this->finalizado = false;
        $this->tentativas++;

        $this->respostas = $this->shuffle(
            $this->questionario[$this->questionario_index]['respostas']
        );
    }

    public function finalizarQuiz(){

        Ranking::create([
            'pontuacao' => $this->pontos,
            'usuario_id' => Auth::user()->id,
            'quiz_id' => $this->quiz_id,
            'tentativas' => $this->tentativas,
        ]);

    }
}
