<?php

namespace App\Http\Requests;

use App\Models\Tache;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateTacheRequest extends FormRequest
{
public function rules()
    {
        return [
            'nom_tache' => [
                'string',
                'nullable',
            ],
            'participants.*' => [
                'integer',
            ],
            'participants' => [
                'array',
            ],
            'date_debut' => [
                'date',
                'nullable',
            ],
            'date_fin' => [
                'date',
                'nullable',
            ],
        ];
    }
}