<?php

namespace App\Repositories;

use App\Models\Pergunta;
use App\Repositories\BaseRepository;

/**
 * Class PerguntaRepository
 * @package App\Repositories
 * @version October 29, 2021, 8:52 pm -03
*/

class PerguntaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pergunta',
        'resposta_a',
        'resposta_certa_a',
        'resposta_b',
        'resposta_certa_b',
        'resposta_c',
        'resposta_certa_c',
        'resposta_d',
        'resposta_certa_d',
        'quiz_id',
        'pontos'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pergunta::class;
    }
}
