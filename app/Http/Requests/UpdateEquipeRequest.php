<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEquipeRequest extends FormRequest
{

    public function rules()
    {
        return [
            'nom_equipe' => [
                'string',
                'nullable',
            ],
            'nombrequipe' => [
                'nullable',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'membres.*' => [
                'integer',
            ],
            'membres' => [
                'array',
            ],
            'nom_projets.*' => [
                'integer',
            ],
            'nom_projets' => [
                'array',
            ],
        ];
    }
    
}