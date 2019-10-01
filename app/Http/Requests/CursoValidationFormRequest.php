<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CursoValidationFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nomecurso' => 'required|string|unique:curso|max:20',
            'valorcurso' => 'required|numeric',
            

        ];
    }
}
