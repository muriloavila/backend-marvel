<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\ApiFormRequest;


class ProducaoRequest extends ApiFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    // public function authorize()
    // {
    //     return false;
    // }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        switch($this->method()){
            case 'GET':
            return [];
            case 'POST':
            return [
                'name'              =>'required|string',
                'tipo'              =>'required|int|min:1|max:2',
                'data_lancamento'   =>'nullable|date',
                'fase'              =>'nullable|int',
                'link_picture'      =>'nullable|string',
                'descricao'         =>'nullable|string'
            ];
        }
    }
}
