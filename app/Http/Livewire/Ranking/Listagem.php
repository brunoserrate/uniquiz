<?php

namespace App\Http\Livewire\Ranking;

use Livewire\Component;
use App\Models\Quiz;
use App\Models\Ranking;
use DB;

class Listagem extends Component
{
    public $quizzes = [];
    public $quiz_id = '';
    public $ranking = [
        'ranking' => [],
        'pontuacao_maxima' => 0
    ];
    public $posicao = 1;

    public function mount(){
        $this->quizzes = Quiz::get()->toArray();
        $this->quiz_id = '';
    }

    public function render() {

        return view('livewire.ranking.listagem');
    }

    public function updatedQuizId($quizId) {

        $quiz = [];
        $pontuacao_maxima = 0;

        $this->ranking['ranking'] = Ranking::select(
                            'ranking.pontuacao',
                            DB::RAW("DATE_FORMAT(ranking.data_criacao, '%d/%m/%Y %H:%i:%s') as data_criacao_formatado"),
                            'users.name AS nome'
                        )
                        ->leftJoin('users', 'users.id', '=', 'ranking.usuario_id')
                        ->leftJoin('quiz', 'quiz.id', '=', 'ranking.quiz_id')
                        ->where('ranking.quiz_id', $quizId)
                        ->orderBy('ranking.pontuacao', 'DESC')
                        ->orderBy('ranking.data_criacao', 'ASC')
                        ->get()->toArray();

        $quiz = Quiz::select(
            'quiz.*',
            'quiz.id AS quiz_id',
            'pergunta.*'
        )
        ->leftJoin('pergunta', 'pergunta.quiz_id', '=', 'quiz.id')
        ->where('quiz.id', $quizId)
        ->get()
        ->toArray();

        foreach ($quiz as $value) {
            $pontuacao_maxima += $value['pontos'];
        }

        $this->ranking['pontuacao_maxima'] = $pontuacao_maxima;

    }

}
