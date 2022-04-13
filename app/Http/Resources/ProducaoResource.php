<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProducaoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'tipo' => $this->retornaTipo($this->tipo),
            'data_lancamento' => $this->data_lancamento,
            'fase' => $this->fase,
            'link_picture' => $this->link_picture,
            'descricao' => $this->descricao
        ];
    }

    private function retornaTipo($tipo){
        return $tipo == 1 ? 'Filme' : 'Serie';
    }
}
