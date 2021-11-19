<?php

namespace App\Repositories;

use App\Models\Categoria;
use App\Repositories\BaseRepository;

/**
 * Class CategoriaRepository
 * @package App\Repositories
 * @version October 29, 2021, 8:52 pm -03
*/

class CategoriaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome'
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
        return Categoria::class;
    }
}
