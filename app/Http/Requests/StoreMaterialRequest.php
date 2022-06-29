<?php

namespace App\Http\Requests;

use App\Models\Material;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreMaterialRequest extends FormRequest
{
   

    public function rules()
    {
        return [
            'nom_material' => [
                'string',
                'nullable',
            ],
            'type_marterial' => [
                'string',
                'nullable',
            ],
            'cout' => [
                'numeric',
            ],
            'date_achat' => [
                'date' ,
                'nullable',
            ],
            'etat' => [
                'string',
                'nullable',
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