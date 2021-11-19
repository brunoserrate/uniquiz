<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="Ranking",
 *      required={"pontuacao", "tentativas", "usuario_id"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="pontuacao",
 *          description="pontuacao",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="tentativas",
 *          description="tentativas",
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
class Ranking extends Model
{

    use HasFactory;

    public $table = 'ranking';

    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = 'data_atualizacao';

    public $fillable = [
        'pontuacao',
        'tentativas',
        'quiz_id',
        'usuario_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'pontuacao' => 'integer',
        'tentativas' => 'integer',
        'usuario_id' => 'integer',
        'quiz_id' => 'integer',
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'pontuacao' => 'required|integer',
        'tentativas' => 'required|integer',
        'data_criacao' => 'nullable',
        'data_atualizacao' => 'nullable',
        'usuario_id' => 'required',
        'quiz_id' => 'required'
    ];

}
