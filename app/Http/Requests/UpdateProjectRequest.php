<?php

namespace App\Http\Requests;

use App\Models\Project;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateProjectRequest extends FormRequest
{
    
    public function rules()
    {
       
        return [
            'nom_projet' => [
                'string',
                'nullable',
            ],
            'datedebut' => [
                'date',
                'nullable',
            ],
            'datefin' => [
                'date',
                'nullable',
                
            ],
             'chefequipe'=>[
                'string',
                'nullable',
            ],
            'etatprojet'=>[
                'string',
                'nullable',
            ],

            'commantaire' => [
                'string',
                'nullable',
            ],
           
            'materials.*' => [
                'integer',
            ],
            'materials' => [
                'array',
            ],
        ];

    }
}