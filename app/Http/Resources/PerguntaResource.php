<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PerguntaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'pergunta' => $this->pergunta,
            'resposta_a' => $this->resposta_a,
            'resposta_certa_a' => $this->resposta_certa_a,
            'resposta_b' => $this->resposta_b,
            'resposta_certa_b' => $this->resposta_certa_b,
            'resposta_c' => $this->resposta_c,
            'resposta_certa_c' => $this->resposta_certa_c,
            'resposta_d' => $this->resposta_d,
            'resposta_certa_d' => $this->resposta_certa_d,
            'quiz_id' => $this->quiz_id,
            'pontos' => $this->pontos,
            'data_criacao' => $this->data_criacao,
            'data_atualizacao' => $this->data_atualizacao
        ];
    }
}
