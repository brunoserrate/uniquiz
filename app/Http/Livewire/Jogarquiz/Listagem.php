<?php

namespace App\Http\Livewire\Jogarquiz;

use Livewire\Component;
use App\Models\Quiz;

class Listagem extends Component {

    public $quizzes = [];
    public $quiz_id = '';

    public function mount(){
        $this->quizzes = Quiz::get()->toArray();
        $this->quiz_id = '';
    }

    public function render() {
        return view('livewire.jogarquiz.listagem');
    }

    public function updatedQuizId($quizId) {
    }
}
