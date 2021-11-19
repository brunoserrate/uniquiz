<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="Quiz",
 *      required={"nome", "descricao", "categoria_id", "usuario_id"},
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
 *          property="descricao",
 *          description="descricao",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="categoria_id",
 *          description="categoria_id",
 *          type="integer",
 *          format="int32"
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
 *      ),
 *      @SWG\Property(
 *          property="usuario_id",
 *          description="usuario_id",
 *          type="integer",
 *          format="int32"
 *      )
 * )
 */
class Quiz extends Model
{
    // use SoftDeletes;

    use HasFactory;

    public $table = 'quiz';

    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = 'data_atualizacao';

    protected $dates = ['data_exclusao'];

    public $fillable = [
        'nome',
        'descricao',
        'categoria_id',
        'usuario_id',
        'ativo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'descricao' => 'string',
        'categoria_id' => 'integer',
        'usuario_id' => 'integer',
        'ativo' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required|string|max:100',
        'descricao' => 'required|string|max:300',
        'categoria_id' => 'required|integer',
        'data_criacao' => 'nullable',
        'data_atualizacao' => 'nullable',
        'usuario_id' => 'required'
    ];

}
