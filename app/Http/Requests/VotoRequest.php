<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\ApiFormRequest;

class VotoRequest extends ApiFormRequest
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
        switch ($this->method()) {
            case 'GET':
            return [];
            case 'POST':
                return [
                    'voto'          => 'required|int|min:0|max:10',
                    'id_user'       => 'required|int',
                    'id_producao'   => 'required|int'
                ];
        }
    }
}
