<?php

namespace App\Http\Livewire\Criarquiz;

use Livewire\Component;
use App\Models\Quiz;
use App\Models\Categoria;

class Formulario extends Component
{
    public $form_id = 0;
    public $form = [];
    public $categorias = [];
    public $disabled = true;

    public function render()
    {
        return view('livewire.criarquiz.formulario');
    }

    public function mount(){
        $this->categorias = Categoria::get()->toArray();
    }

    public function updatedFormId($value){
        $quiz = [];

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
                'quiz' => $quiz[0],
                'perguntas' => $quiz,
            ];

            $this->disabled = false;
        }

    }

    public function limparForm(){
        $this->form = [];
        $this->disabled = true;
    }
}
