<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Quiz;

class BsDev extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'uni:bsdev';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Testes dev Bruno Serrate';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle() {

        $quiz = Quiz::select(
            'quiz.*',
            'quiz.id AS quiz_id',
            'pergunta.*'
        )
        ->leftJoin('pergunta', 'pergunta.quiz_id', '=', 'quiz.id')
        ->where('quiz.id', 6)
        ->get()
        ->toArray();

        $form = [
            'quiz' => $quiz[0],
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
                'reposta_certa' => $resposta_certa,
            ];
        }

        $form['perguntas'] = $perguntas;

        var_dump($form);
    }
}
