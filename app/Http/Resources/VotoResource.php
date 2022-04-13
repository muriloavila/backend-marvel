<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VotoResource extends JsonResource
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
            'id'   => $this->id,    
            'voto' => $this->voto,
            'user' => $this->user->toArray(),
            'producao' => $this->producao->toArray()
        ];
    }
}
