<?php

namespace App\Http\Requests;

use App\Models\Carte;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateCarteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('carte_edit');
    }

    public function rules()
    {
        return [
            'ref' => [
                'string',
                'required',
                'unique:cartes,ref,' . request()->route('carte')->id,
            ],
            'montant' => [
                'required',
                'integer',
                'min:-2147483648',
                'max:2147483647',
            ],
            'aprenom' => [
                'string',
                'required',
            ],
            'anom' => [
                'string',
                'required',
            ],
            'amail' => [
                'string',
                'required',
            ],
            'amsg' => [
                'required',
            ],
            'deprenom' => [
                'string',
                'required',
            ],
            'denom' => [
                'string',
                'required',
            ],
            'demail' => [
                'string',
                'required',
            ],
            'institut_id' => [
                'required',
                'integer',
            ],
            'stripeid' => [
                'string',
                'nullable',
            ],
            'statut' => [
                'string',
                'nullable',
            ],
            'use' => [
                'date_format:' . config('panel.date_format'),
                'nullable',
            ],
        ];
    }
}
