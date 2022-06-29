<?php

namespace App\Http\Requests;

use App\Models\Material;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateMaterialRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('material_edit');
    }

    public function rules()
    {
        return [
            'type_material' => [
                'string',
                'nullable',
            ],
            'date_achat' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
            'letat' => [
                'string',
                'nullable',
            ],
            'nom_material' => [
                'string',
                'nullable',
            ],
        ];
    }
}