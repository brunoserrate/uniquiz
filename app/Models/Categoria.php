<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="Categoria",
 *      required={"nome"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="nome",
 *          description="nome",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="data_criacao",
 *          description="data_criacao",
 *          type="string",
 *          format="date-time"
 *      ),
 *      @SWG\Property(
 *          property="data_atualizacao",
 *          description="data_atualizacao",
 *          type="string",
 *          format="date-time"
 *      )
 * )
 */
class Categoria extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'categoria';

    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = 'data_atualizacao';

    protected $dates = ['data_exclusao'];

    public $fillable = [
        'nome'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required|string|max:50',
        'data_criacao' => 'nullable',
        'data_atualizacao' => 'nullable'
    ];


}
