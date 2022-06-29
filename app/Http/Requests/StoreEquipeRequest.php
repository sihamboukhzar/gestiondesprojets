<?php

namespace App\Http\Requests;

use App\Models\Equipe;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreEquipeRequest extends FormRequest
{





  public function rules()
    {
        return [
            'nomequipe' => [
                'string',
                'nullable',
            ],
            'nombrequipe' => [
                'nullable',
                'integer',
                'min:0',
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