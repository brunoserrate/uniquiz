<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RankingResource extends JsonResource
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
            'pontuacao' => $this->pontuacao,
            'tentativas' => $this->tentativas,
            'data_criacao' => $this->data_criacao,
            'data_atualizacao' => $this->data_atualizacao,
            'usuario_id' => $this->usuario_id
        ];
    }
}
