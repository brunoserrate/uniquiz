<?php

namespace App\Http\Livewire\Criarquiz;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\Quiz;
use Illuminate\Support\Facades\Auth;
use DB;

class Listagem extends Component
{

    public $categorias = [];
    public $quizzes = [];
    public $categoria_id = 0;

    public function render()
    {

        return view('livewire.criarquiz.listagem');
    }

    public function mount(){

        $this->categorias = Categoria::get()->toArray();

        $this->quizzes = Quiz::select(
                            'quiz.*',
                            DB::RAW("CONCAT(quiz.categoria_id,'-',categoria.nome) as categoria_nome"),
                            DB::RAW("DATE_FORMAT(quiz.data_criacao, '%d/%m/%Y %H:%i:%s') as data_criacao_formatado")
                        )
                        ->leftJoin('categoria', 'categoria.id', '=', 'quiz.categoria_id')
                        ->where('usuario_id', Auth::user()->id)
                        ->get()
                        ->toArray();
        //
    }

    public function updatedCategoriaId($categoria_id){

        $this->quizzes = [];

        if($categoria_id == 'todos'){
            $this->quizzes = Quiz::select(
                'quiz.*',
                DB::RAW("CONCAT(quiz.categoria_id,'-',categoria.nome) as categoria_nome"),
                DB::RAW("DATE_FORMAT(quiz.data_criacao, '%d/%m/%Y %H:%i:%s') as data_criacao_formatado")
            )
                ->leftJoin('categoria', 'categoria.id', '=', 'quiz.categoria_id')
                ->where('usuario_id', Auth::user()->id)
                ->get()
                ->toArray();
        }
        else {
            $this->quizzes = Quiz::select(
                'quiz.*',
                DB::RAW("CONCAT(quiz.categoria_id,'-',categoria.nome) as categoria_nome"),
                DB::RAW("DATE_FORMAT(quiz.data_criacao, '%d/%m/%Y %H:%i:%s') as data_criacao_formatado")
            )
                ->leftJoin('categoria', 'categoria.id', '=', 'quiz.categoria_id')
                ->where('usuario_id', Auth::user()->id)
                ->where('categoria_id', $categoria_id)
                ->get()
                ->toArray();
        }
    }

}
