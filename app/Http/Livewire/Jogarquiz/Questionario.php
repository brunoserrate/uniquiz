<?php

namespace App\Http\Livewire\Jogarquiz;

use Livewire\Component;
use DB;

class Questionario extends Component
{
    // Front
    public $questionario = [];
    public $questionario_index = 0;
    public $questionario_tamanho = 0;
    public $respostas = [];
    public $resposta = '';
    public $respondido = false;
    public $pontos = 0;
    public $finalizado = false;
    // Front

    // Página
    public function mount()
    {
        $this->questionario = require(__DIR__ . DIRECTORY_SEPARATOR . 'questionario_01.php');

        $this->questionario = $this->embaralharPerguntas($this->questionario);

        $this->reiniciar();

        $this->questionario_tamanho = count($this->questionario);
        $this->respostas = $this->shuffle(
            $this->questionario[$this->questionario_index]['respostas']
        );
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
            $this->pontos += 10;
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

        $this->respostas = $this->shuffle(
            $this->questionario[$this->questionario_index]['respostas']
        );
    }
}
