<?php

namespace App\Models;

use Eloquent as Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * @SWG\Definition(
 *      definition="Pergunta",
 *      required={"pergunta", "resposta_a", "resposta_certa_a", "resposta_b", "resposta_certa_b", "resposta_c", "resposta_certa_c", "resposta_d", "resposta_certa_d", "quiz_id", "pontos"},
 *      @SWG\Property(
 *          property="id",
 *          description="id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="pergunta",
 *          description="pergunta",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="resposta_a",
 *          description="resposta_a",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="resposta_certa_a",
 *          description="resposta_certa_a",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="resposta_b",
 *          description="resposta_b",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="resposta_certa_b",
 *          description="resposta_certa_b",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="resposta_c",
 *          description="resposta_c",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="resposta_certa_c",
 *          description="resposta_certa_c",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="resposta_d",
 *          description="resposta_d",
 *          type="string"
 *      ),
 *      @SWG\Property(
 *          property="resposta_certa_d",
 *          description="resposta_certa_d",
 *          type="boolean"
 *      ),
 *      @SWG\Property(
 *          property="quiz_id",
 *          description="quiz_id",
 *          type="integer",
 *          format="int32"
 *      ),
 *      @SWG\Property(
 *          property="pontos",
 *          description="pontos",
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
 *      )
 * )
 */
class Pergunta extends Model
{

    use HasFactory;

    public $table = 'pergunta';
    
    const CREATED_AT = 'data_criacao';
    const UPDATED_AT = 'data_atualizacao';




    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'pergunta' => 'string',
        'resposta_a' => 'string',
        'resposta_certa_a' => 'boolean',
        'resposta_b' => 'string',
        'resposta_certa_b' => 'boolean',
        'resposta_c' => 'string',
        'resposta_certa_c' => 'boolean',
        'resposta_d' => 'string',
        'resposta_certa_d' => 'boolean',
        'quiz_id' => 'integer',
        'pontos' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'pergunta' => 'required|string|max:300',
        'resposta_a' => 'required|string|max:100',
        'resposta_certa_a' => 'required|boolean',
        'resposta_b' => 'required|string|max:100',
        'resposta_certa_b' => 'required|boolean',
        'resposta_c' => 'required|string|max:100',
        'resposta_certa_c' => 'required|boolean',
        'resposta_d' => 'required|string|max:100',
        'resposta_certa_d' => 'required|boolean',
        'quiz_id' => 'required',
        'pontos' => 'required|integer',
        'data_criacao' => 'nullable',
        'data_atualizacao' => 'nullable'
    ];

    
}
