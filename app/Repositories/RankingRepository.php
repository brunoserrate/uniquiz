<?php

namespace App\Repositories;

use App\Models\Ranking;
use App\Repositories\BaseRepository;

/**
 * Class RankingRepository
 * @package App\Repositories
 * @version October 29, 2021, 8:53 pm -03
*/

class RankingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'pontuacao',
        'tentativas',
        'usuario_id'
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
        return Ranking::class;
    }
}
