<?php

namespace App\Http\Livewire\Jogarquiz;

use Livewire\Component;
use App\Models\Quiz;

class Listagem extends Component {

    public $quizzes = [];
    public $quiz_id = '';
    public $descricao = '';

    public function mount(){
        $this->quizzes = Quiz::where('ativo', 1)->get()->toArray();
        $this->quiz_id = '';
        $this->descricao = '';
    }

    public function render() {
        return view('livewire.jogarquiz.listagem');
    }

    public function updatedQuizId($quizId) {

        $this->descricao = Quiz::where('id', $quizId)->first()->descricao;
    }
}
