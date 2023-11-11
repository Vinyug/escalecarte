<?php

namespace App\Http\Requests;

use App\Models\Carte;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreCarteRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('carte_create');
    }

    public function rules()
    {
        return [
            'ref' => [
                'string',
                'required',
                'unique:cartes',
            ],
            'montant' => [
                'required',
                'integer',
                'min:10',
                'max:1000',
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
                'string',
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
