<?php

namespace App\Repositories;

use App\Models\Quiz;
use App\Repositories\BaseRepository;

/**
 * Class QuizRepository
 * @package App\Repositories
 * @version October 25, 2021, 1:15 am -03
*/

class QuizRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'nome',
        'descricao',
        'categoria_id',
        'usuario_id',
        'ativo'
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
        return Quiz::class;
    }
}
