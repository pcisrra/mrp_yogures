<?php

namespace App\Http\Requests;

use App\Presentacione;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class StorePresentacioneRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('presentacione_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'capacidad' => [
                'required',
            ],
        ];
    }
}
